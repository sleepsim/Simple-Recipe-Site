<!DOCTYPE html>

<html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>Pocholo's Recipes</title>

        <!-- CSS files -->
        <link rel="stylesheet" href="css/main.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;600&family=Roboto+Slab:wght@700&family=Sofia+Sans:wght@600&display=swap" rel="stylesheet">
        
        <!-- Icons for design -->
        <script src="https://kit.fontawesome.com/4c3e80f479.js" crossorigin="anonymous"></script>

    </head>

    <body>

        <?php

            //Array to store variables
            $data = array();

            //Load Functions
            require'functions.php';

            //Start session to store variables for first 3 (Name, Desc, Serving Size)
            session_start();

            if (!empty($_POST)) {
                foreach($_POST as $key => $value) {
                    $_SESSION['add_recipe'][$key] = $value;
                }
            }

            function noError(){
                $_SESSION['add_recipe']['errorCancel'] = true;
            };


            //Validation
            function checkData($varName = ""){
                global $data;

                if(isset($_POST[$varName])){
                    if(empty($_POST[$varName]) || (strlen(trim($_POST[$varName])) == 0)){
                        $_SESSION['add_recipe']['errorCancel'] = false;
                        //Error code then send back to add-recipe page
                        switch($varName){
                            case "recipeName":
                                $_SESSION['add_recipe']['errorCode'] = 'ERROR: Recipe name empty';
                                break;
                            case "recipeDesc":
                                $_SESSION['add_recipe']['errorCode'] = 'ERROR: Recipe description empty';
                                break;
                            case "servingSize":
                                $_SESSION['add_recipe']['errorCode'] = 'ERROR: Must select serving size';
                                break;
                            case "prepTime":
                                $_SESSION['add_recipe']['errorCode'] = 'ERROR: Must input prep time';
                                break;
                            case "cookTime":
                                $_SESSION['add_recipe']['errorCode'] = 'ERROR: Must input cooking time';
                                break;
                            default:
                                $_SESSION['add_recipe']['errorCode'] = 'ERROR: Processing Failed';
                        }
                        header('Location: add-recipe.php');
                        exit();

                    }elseif(($varName == "prepTime" || $varName == "cookTime") && $_POST[$varName] <= 0){
                        $_SESSION['add_recipe']['errorCancel'] = false;
                        switch($varName){
                            case "prepTime":
                                $_SESSION['add_recipe']['errorCode'] = "ERROR: Prep time must be a number bigger than 0";
                                break;
                            case "cookTime":
                                $_SESSION['add_recipe']['errorCode'] = "ERROR: Cook time must be a number bigger than 0";
                                break;
                            default:
                                $_SESSION['add_recipe']['errorCode'] = "ERROR: $varName must be a number bigger than 0";
                        }
                        header('Location: add-recipe.php');
                        exit();
                        
                    }else{//If successful, sanitize data then store input
                        $cleanData = filter_input(INPUT_POST, $varName, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $data += array($varName => $cleanData);
                    }

                }else{ //First check fail
                    $_SESSION['add_recipe']['errorCancel'] = false;
                    $_SESSION['add_recipe']['errorCode'] = 'Error: '. $varName . ' Input failed';
                    header('Location: add-recipe.php');
                    exit();
                }
            }

            function checkIngredients(){
                global $data;

                //If both true, means we have atleast one ingredient = PASS
                $check1 = false;
                $check2 = false;

                //Check if there is atleast one ingredient
                for($i = 0; $i < 10; $i++){
                    $j = $i+1;
                    if((!$check1 && !$check2) &&
                        isset($_POST["ingr_quantity$i"], $_POST["ingr_measurement$i"], $_POST["ingr_name$i"])){
                        // Quantity
                        if(empty($_POST["ingr_quantity$i"]) || (strlen(trim($_POST["ingr_quantity$i"])) == 0)){
                            $_SESSION['add_recipe']['errorCancel'] = false;
                            $_SESSION['add_recipe']['errorCode'] = "ERROR: Ingredient $j 's quantity cannot be empty";
                            header('Location: add-recipe.php');
                            exit();
                        }elseif(!is_numeric($_POST["ingr_quantity$i"])){
                            $_SESSION['add_recipe']['errorCancel'] = false;
                            $_SESSION['add_recipe']['errorCode'] = "ERROR: Ingredient $j 's quantity has to be an integer, Input is: " . $_POST["ingr_quantity$i"];
                            header('Location: add-recipe.php');
                            exit();
                        }elseif($_POST["ingr_quantity$i"] <= 0){
                            $_SESSION['add_recipe']['errorCancel'] = false;
                            $_SESSION['add_recipe']['errorCode'] = "ERROR: Ingredient $j 's quantity must be a number bigger than 0, Input is: " . $_POST["ingr_quantity$i"];
                            header('Location: add-recipe.php');
                            exit();
                        }else{
                            $check1 = true;
                        }

                        //Measurement cannot fail (has default cup) so we check name after
                        if(empty($_POST["ingr_name$i"]) || strlen(trim($_POST["ingr_name$i"])) == 0){
                            $_SESSION['add_recipe']['errorCancel'] = false;
                            $_SESSION['add_recipe']['errorCode'] = "ERROR: Ingredient $j 's name cannot be empty"; 
                            header('Location: add-recipe.php');
                            exit();
                        }else{
                            $check2 = true;
                        }

                        //If both checks pass (atleast one valid ingredient), start adding values and cancel loop
                        if($check1 && $check2){
                            addIngredients();
                            break;
                        }else {
                            $check1 = false;
                            $check2 = false;
                        }
                        // $data += array($ingr_name => $_POST[$varName]);

                    }
                    
                }
            }

            function addIngredients(){
                global $data;
                for($i = 0; $i<10; $i++){
                    $j = $i+1;
                    if(isset($_POST["ingr_quantity$i"], $_POST["ingr_measurement$i"], $_POST["ingr_name$i"])){
                        if(!empty($_POST["ingr_quantity$i"]) || !empty($_POST["ingr_name$i"])){
                            if(empty($_POST["ingr_quantity$i"])){
                                $_SESSION['add_recipe']['errorCancel'] = false;
                                $_SESSION['add_recipe']['errorCode'] = "ERROR: Ingredient $j's quantity cannot be empty";
                                header('Location: add-recipe.php');
                                exit();
                            }elseif(!is_numeric($_POST["ingr_quantity$i"])){
                                $_SESSION['add_recipe']['errorCancel'] = false;
                                $_SESSION['add_recipe']['errorCode'] = "ERROR: Ingredient $j 's quantity has to be an integer, Input is: " . $_POST["ingr_quantity$i"];
                                header('Location: add-recipe.php');
                                exit();
                            }elseif($_POST["ingr_quantity$i"] <= 0){
                                $_SESSION['add_recipe']['errorCancel'] = false;
                                $_SESSION['add_recipe']['errorCode'] = "ERROR: Ingredient $j 's quantity has to be an integer, Input is: " . $_POST["ingr_quantity$i"];
                                header('Location: add-recipe.php');
                                exit();
                            }elseif(empty($_POST["ingr_name$i"])){
                                $_SESSION['add_recipe']['errorCancel'] = false;
                                $_SESSION['add_recipe']['errorCode'] = "ERROR: Ingredient $j 's name cannot be empty";
                                header('Location: add-recipe.php');
                                exit();
                            }else{ //Sanitize data then add to array list
                                $cleanQty = filter_input(INPUT_POST, "ingr_quantity$i", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                                $cleanMsr = filter_input(INPUT_POST, "ingr_measurement$i", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                                $cleanNme = filter_input(INPUT_POST, "ingr_name$i", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                                $data += array("ingr_quantity$i" => $cleanQty);
                                $data += array("ingr_measurement$i" => $cleanMsr);
                                $data += array("ingr_name$i" => $cleanNme);
                            }

                        }
                    }
                }

            }

        ?>   
        
        <?php 
            checkData('recipeName');
            checkData('recipeDesc');
            checkData('servingSize');
            checkData('prepTime');
            checkData('cookTime');

            checkIngredients();

            noError();

            generateNavbar();
            divStart();

            // echo '  The name is' . $_POST['recipeName'];
            // echo '  Description is' . $_POST['recipeDesc'];
            // echo '  Filtered description is ' . $data['recipeDesc'];
            // echo '  The serving size is ' . $_POST['servingSize'];
            // echo '  The prep time is ' . $_POST['prepTime'];
            // echo '  The cook time is ' . $_POST['cookTime'];

            $testout = implode("", $data);
            echo $testout;
        ?>



    </body>

</html>