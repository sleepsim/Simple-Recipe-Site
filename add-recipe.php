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
            //Load Functions
            require'functions.php';

            //If processing failed, load previous values
            session_start();
            if (isset($_SESSION['add_recipe']) && !empty($_SESSION['add_recipe'])) {
                $form_data = $_SESSION['add_recipe'];
                unset($_SESSION['add_recipe']);
                session_destroy();

                reloadTop();
                if(!$form_data['errorCancel']){ //this is really only matters if you back after sucessful input
                    generateErrorMessage($form_data['errorCode']);
                }
                generateRecipeName($form_data['recipeName']);
                generateRecipeDesc($form_data['recipeDesc']);
                generateServingSize($form_data['servingSize']);
                reloadBottom();
            }else{
                //First load
                generateNavbar(); 
                divStart();
                generateTitle();
                formStart();
                generateRecipeName();
                generateRecipeDesc();
                generateServingSize();
                generatePrepTime();
                generateCookTime();
                generateIngredients();
                generateInstructions();
                generateTags();
                generateSubmitButton();
                formEnd();
                divEnd();
                generateFooter();
            }
        ?>
        
    </body>
    
</html>