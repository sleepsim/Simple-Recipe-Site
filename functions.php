<!-- Functions for generating html webpage -->
<?php

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

    function generateRecipeName($recipeName = ""){

        if(isset($recipeName)){
            if(empty($recipeName)){
                echo '<label for="recipeName">Recipe Details</label>';
                echo '<input type="text" id="recipeName" name="recipeName" placeholder="Enter Recipe Name" required>';
            }else{
                echo '<label for="recipeName">Recipe Details</label>';
                echo '<input type="text" id="recipeName" name="recipeName" placeholder="Enter Recipe Name" value="'.$recipeName.'" required>';
            }
        }
    }

    function generateRecipeDesc($recipeDesc = ""){
        if(isset($recipeDesc)){
            if(empty($recipeDesc)){
                echo '<textarea rows="5" name="recipeDesc" placeholder="Recipe Description" required></textarea>';
            }else{
                echo '<textarea rows="5" name="recipeDesc" placeholder="Recipe Description" required>'. $recipeDesc .'</textarea>';
            }
        }
    }

    function generateServingSize(){
        echo '<label for="">Serving Size</label>';
        echo '<div class="serving-container">
                <input type="radio" id="serving1" name="servingSize" value="1" checked>
                <label for="serving1">1 Person</label>
                <input type="radio" id="serving2" name="servingSize" value="2">
                <label for="serving2">2 People</label>
                <input type="radio" id="serving3" name="servingSize" value="3">
                <label for="serving3">3 People</label>
            </div>';
    }

    function generatePrepTime(){
        echo '<label for="prepTime">Prep Time</label>';
        echo '<input type="number" id="prepTime" name="prepTime" placeholder="in minutes" value="1">';
    }

    function generateCookTime(){
        echo '<label for="cookTime">Cooking Time (Minutes)</label>';
        echo '<input type="number" name="cookTime" id="cookTime" placeholder="in minutes" value="1">';
    }

    function generateIngredients(){
        for($i=0; $i<10; $i++){
            echo '<label for="ingr_measurement' . $i .'">Ingredient '. $i+1 . '</label>';
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

    function generateInstructions(){
        echo '<label for="instructions">Instructions (separate steps by lines)</label>';
        echo '<textarea name="instructions" id="instructions" placeholder="Add Instructions"></textarea>';
    }

    function generateTags(){
        echo '<label for="">Tags (separate tags by comma or ",")</label>';
        echo '<textarea name="" id="" placeholder="Add Tags"></textarea>';
    }

    function generateSubmitButton(){
        echo '<div class="flex-container justify-center align-center">  
        <input type="submit" />  
        </div>';
    }

    function generateFooter(){
        echo '<div class="foot">';
        echo '<div class="flex-container justify-center align-center">';
        echo '<p>IAT352-A1</p>';
        echo '</div>';
        echo '</div>';
    }

    function generateErrorMessage($error = ""){
        echo '<h2 class="red-text">'. $error .'</h2>';
    }

    //If we want to change title,desc,serving size we load everything above it and below it
    function reloadTop(){
        generateNavbar(); 
        divStart();
        generateTitle();
        formStart();
    }

    function reloadBottom(){
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


    //hackers, script kiddies begone
    function sanitizeInput(array $inputs, array $fields){
    }
?>