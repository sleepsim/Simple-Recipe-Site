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

            //Validation
            function checkName(){
                global $data;
                if(isset($_POST['recipeName'])){
                    if(empty($_POST['recipeName']) || (strlen(trim($_POST['recipeName'])) == 0)){
                        //Error code then send back to add-recipe page
                        $_SESSION['add_recipe']['errorCode'] = 'ERROR: Recipe Name Empty';
                        header('Location: add-recipe.php');
                    }else{
                        //If successful store input
                        $data += array('recipeName' => $_POST['recipeName']);
                    }
                }
            }

            function checkDesc(){
                global $data;
                if(isset($_POST['recipeDesc'])){
                    if(empty($_POST['recipeDesc']) || (strlen(trim($_POST['recipeDesc'])) == 0)){
                        //Error Code
                        $_SESSION['add_recipe']['errorCode'] = 'ERROR: Recipe Description Empty';
                        header('Location: add-recipe.php');
                    }else{
                        //Success
                        $data += array('recipeDesc' => $_POST['recipeDesc']);
                    }
                }
            }

            function checkServingSize(){
                global $data;
                if(isset($_POST['servingSize'])){
                    if(empty($_POST['servingSize']) || (strlen(trim($_POST['servingSize']))== 0)){
                        $_SESSION['add-recipe']['errorCode'] = 'ERROR: Serving Size not selected';
                    }else{
                        $data += array('servingSize' => $_POST['servingSize']);
                    }
                }
            }

            function checkPrepTime(){
                global $data;
                if(isset($_POST['prepTime'])){
                    if(empty($_POST['prepTime']) || (strlen(trim($_POST['prepTime'])) == 0)){

                    }
                }
            }


            function checkIngredients(){
                global $data;

                //Check if there is atleast one ingredient
                for($i = 0; $i < 10; $i++){
                    if(isset($_POST["ingr_quantity$i"], $_POST["ingr_measurement$i"], $_POST['ingr_name0'])){
                        // Quantity
                        if(empty($_POST["ingr_quantity$i"]) || (strlen(trim($_POST["ingr_quantity$i"])) == 0)){
                            $_SESSION['add_recipe']['errorCancel'] = false;
                            $_SESSION['add-recipe']['errorCode'] = "ERROR: Ingredient $i 's quantity cannot be empty";
                            // header('Location: add-recipe.php');
                            exit();
                            break;
                        }
                        //Measurement cannot fail (has default cup) so we check name after
                        // if(empty($_POST["ingr_name$i"]) || strlen(trim($_POST["ingr_name$i"])) == 0){
                        //     $_SESSION['add_recipe']['errorCancel'] = false;
                        //     $_SESSION['add-recipe']['errorCode'] = "ERROR: Ingredient $i 's quantity cannot be empty"; 
                        //     header('Location: add-recipe.php');
                        //     exit();
                        //     break;
                        // }

                        // $data += array($ingr_name => $_POST[$varName]);
                    }
                }
            }


        ?>   
        
        <?php 

            checkName();
            checkDesc();
            checkServingSize();

        ?>



    </body>

</html>