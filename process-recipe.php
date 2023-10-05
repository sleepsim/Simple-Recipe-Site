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
                        
                    }else{//If successful store input
                        $data += array($varName => $_POST[$varName]);
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
                    
                    if((!$check1 && !$check2) &&
                        isset($_POST["ingr_quantity$i"], $_POST["ingr_measurement$i"], $_POST['ingr_name0'])){
                        // Quantity
                        if(empty($_POST["ingr_quantity$i"]) || (strlen(trim($_POST["ingr_quantity$i"])) == 0)){
                            $_SESSION['add_recipe']['errorCancel'] = false;
                            $_SESSION['add_recipe']['errorCode'] = "ERROR: Ingredient $i 's quantity cannot be empty";
                            header('Location: add-recipe.php');
                            exit();
                        }elseif(!is_numeric($_POST["ingr_quantity$i"])){
                            $_SESSION['add_recipe']['errorCancel'] = false;
                            $_SESSION['add_recipe']['errorCode'] = "ERROR: Ingredient $i 's quantity has to be an integer" . $_POST["ingr_quantity$i"];
                            header('Location: add-recipe.php');
                            exit();
                        }elseif($_POST["ingr_quantity$i"] <= 0){
                            $_SESSION['add_recipe']['errorCancel'] = false;
                            $_SESSION['add_recipe']['errorCode'] = "ERROR: Ingredient $i 's quantity must be a number bigger than 0";
                            header('Location: add-recipe.php');
                            exit();
                        }else{
                            $check1 = true;
                        }

                        //Measurement cannot fail (has default cup) so we check name after
                        if(empty($_POST["ingr_name$i"]) || strlen(trim($_POST["ingr_name$i"])) == 0){
                            $_SESSION['add_recipe']['errorCancel'] = false;
                            $_SESSION['add_recipe']['errorCode'] = "ERROR: Ingredient $i 's name cannot be empty"; 
                            header('Location: add-recipe.php');
                            exit();
                        }else{
                            $check2 = true;
                        }
                        // $data += array($ingr_name => $_POST[$varName]);

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

            echo '  The name is' . $_POST['recipeName'];
            echo '  Description is' . $_POST['recipeDesc'];
            echo '  The serving size is ' . $_POST['servingSize'];
            echo '  The prep time is ' . $_POST['prepTime'];
            echo '  The cook time is ' . $_POST['cookTime'];
        ?>



    </body>

</html>