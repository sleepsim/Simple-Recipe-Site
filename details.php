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
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;600&family=Roboto+Slab:wght@700&family=Sofia+Sans:ital,wght@0,300;0,600;1,300;1,400&display=swap" rel="stylesheet">
        
        <!-- Icons for design -->
        <script src="https://kit.fontawesome.com/4c3e80f479.js" crossorigin="anonymous"></script>

    </head>

    <body>

        <?php 
            //Load Functions
            require'functions.php';
            require'functions2.php';

            generateNavbar(); 

            if(isset($_GET['index'])){
                // echo 'index is: '. $_GET["index"] . " ";
            }else{
                header('Location: index.php');
            }
            
            $recipeNo = $_GET['index'];
            $allRecipes = array_map('str_getcsv', file('recipes/recipe.csv'));

            if(empty($allRecipes[$recipeNo])){
                divStart();
                $error = "ERROR: Recipe not found!";
                recipePageName($error);
                echo 'its joever, make sure u got the right link';
                divEnd();
                //add buttons here
            }else{

                $currRecipe = $allRecipes[$recipeNo];

                recipeDivStart();
                recipePageName($currRecipe[1]);
                recipeImg();
                recipePageDesc($currRecipe[2]);
                recipePageServes($currRecipe[3]);
                recipePagePrepCook($currRecipe[4], $currRecipe[5]);
                recipePageIngredients($currRecipe[6]);
                recipePageInstructions($currRecipe[7]);
                recipePageTags($currRecipe[8]);

                // $allIngredients = explode("|", $currRecipe[6]);

                
                divEnd();
            }

            generateFooter();
        ?>
        
    </body>
    
</html>