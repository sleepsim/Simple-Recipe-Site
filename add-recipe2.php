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
            //Declare functions here

            function generateNavbar(){
                echo'<div class="navbar">
                        <ul>
                            <li><a id="logo" href="index.php"><i class="fa-solid fa-kitchen-set"></i> iatPlate</a></li>
                            <li><a href="">Recipes</a></li>
                            <li><a href="add-recipe.php">Add Recipe</a></li>
                            <li><a href="">About</a></li>
                        </ul>
                    </div>';
            }

            function generateTitle(){
                echo '<h1>Add A New Recipe</h1> ';
            }

            function divStart(){
                echo '<div class="flex-container justify-center align-center">';
            }

            function divEnd(){
                echo '</div>';
            }

            function formStart(){
                echo '<form method="post" action="process-recipe.php">';
            }

            function formEnd(){
                echo '</form>';
            }

            function generateRecipeNameDesc(){
                echo '<label for="recipeName">Recipe Details</label>';
                echo '<input type="text" id="recipeName" name="recipeName" placeholder="Enter Recipe Name">';
                echo '<textarea rows="5" name="recipeDesc" placeholder="Recipe Description"></textarea>';
            }

            function generateServingSize(){
                echo '<label for="">Serving Size</label>';
                echo '<div class="serving-container">
                        <input type="radio" id="serving1" name="servingSize" value="1" checked>
                        <label for="serving1">1-2 People</label>
                        <input type="radio" id="serving2" name="servingSize" value="2">
                        <label for="serving2">3-4 People</label>
                        <input type="radio" id="serving3" name="servingSize" value="3">
                        <label for="serving3">5-6 People</label>
                    </div>';
            }

            function generatePrepTime(){
                echo '<label for="prepTime">Prep Time</label>';
                echo '<input type="number" id="prepTime" name="prepTime">';
            }

            function generateCookTime(){
                echo '<label for="cookTime">Cooking Time (Minutes)</label>';
                echo '<input type="number" name="cookTime" id="cookTime">';
            }

            function generateIngredients(){
                for($i=0; $i<10; $i++){
                    echo '<label for="ingr_measurement' . $i .'">Ingredients</label>';
                    echo '<div class="ingredient-container">';
                    echo '<input class="no-mr smaller type="text" id="ingr_quantity' . $i . '" name="ingr_quantity' . $i . '" placeholder="Qty.">';
                    echo '<select class="no-mr" name="ingr_measurement' . $i . '" id="ingr_measurement' . $i . '">';
                    echo '<option value="cup">cup</option>
                        <option value="ml">ml</option>
                        <option value="litre">litre</option>
                        <option value="spoon">spoon</option>
                        <option value="tspoon">tspoon</option>
                        <option value="galoon">galloon</option>';
                    echo '</select>';
                    echo '<input class="bigger" type="text" id="ingr_name'. $i . '" name="ingr_name'. $i .'" placeholder="item name">';
                    echo '</div>';
                }
            }
        
        ?>

        <?php
            //Code Execution
            generateNavbar();
            divStart();
            generateTitle();
            formStart();
            generateRecipeNameDesc();
            generateServingSize();
            generatePrepTime();
            generateCookTime();
            generateIngredients();
            
        ?>

        <div class="flex-container justify-center align-center">

            <form method="post" action="process-recipe.php">
                                                                
                

                <label for="instructions">Instructions (separate steps by lines)</label>
                <textarea name="instructions" id="instructions" placeholder="Add Instructions"></textarea>

                <label for="">Tags (separate tags by comma or ",")</label>
                <textarea name="" id="" placeholder="Add Tags"></textarea>

                <input type="submit" value="submit">
                
            </form>

        </div>

        <div class="foot">
            <div class="flex-container justify-center align-center">
                <p>IAT352-A1</p>
            </div>
        </div>

        
    </body>
    
</html>