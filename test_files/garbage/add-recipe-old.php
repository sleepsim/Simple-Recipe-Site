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

        <div class="navbar">
            <ul>
                <li><a id="logo" href="index.php"><i class="fa-solid fa-kitchen-set"></i> iatPlate</a></li>
                <li><a href="">Recipes</a></li>
                <li><a href="add-recipe.php">Add Recipe</a></li>
                <li><a href="">About</a></li>
            </ul>
        </div>

        <div class="flex-container justify-center align-center">

            <h1>Add A New Recipe</h1>  

            <form method="post" action="process-recipe.php">
                <label for="recipeName">Recipe Details</label>
                <input type="text" id="recipeName" name="recipeName" placeholder="Enter Recipe Name">
            
                <textarea rows="5" name="recipeDesc" placeholder="Recipe Description"></textarea>
            
                <label for="">Serving Size</label>

                <div class="serving-container">
                    <input type="radio" id="serving1" name="servingSize" value="1" checked>
                    <label for="serving1">1-2 People</label>
                    <input type="radio" id="serving2" name="servingSize" value="2">
                    <label for="serving2">3-4 People</label>
                    <input type="radio" id="serving3" name="servingSize" value="3">
                    <label for="serving3">5-6 People</label>
                </div>

                <label for="prepTime">Prep Time</label>
                <input type="number" id="prepTime" name="prepTime">
            
                <label for="cookTime">Cooking Time (Minutes)</label>
                <input type="number" name="cookTime" id="cookTime">

                <!-- Ingredients -->
                <label for="ingr1_measurement">Ingredients</label>
                <div class="ingredient-container">
                    <input class="no-mr smaller" type="text" id="ingr_quantity1" name="ingr_quantity1" placeholder="Qty.">
                    <select class="no-mr" name="ingr_measurement1" id="ingr_measurement1">
                        <option value="cup">cup</option>
                        <option value="ml">ml</option>
                        <option value="litre">litre</option>
                        <option value="spoon">spoon</option>
                        <option value="tspoon">tspoon</option>
                        <option value="galoon">galloon</option>
                    </select>
                    <input class="bigger" type="text" id="ingr_name1" name="ingr_name1" placeholder="item name">
                </div> 
                
                <div class="ingredient-container">
                    <input class="no-mr smaller" type="text" id="ingr_quantity2" name="ingr_quantity2" placeholder="Qty.">
                    <select class="no-mr" name="ingr_measurement2" id="ingr_measurement2">
                        <option value="cup">cup</option>
                        <option value="ml">ml</option>
                        <option value="litre">litre</option>
                        <option value="spoon">spoon</option>
                        <option value="tspoon">tspoon</option>
                        <option value="galoon">galloon</option>
                    </select>
                    <input class="bigger" type="text" id="ingr_name2" name="ingr_name2" placeholder="item name">
                </div> 

                <div class="ingredient-container">
                    <input class="no-mr smaller" type="text" id="ingr_quantity3" name="ingr_quantity3" placeholder="Qty.">
                    <select class="no-mr" name="ingr_measurement3" id="ingr_measurement3">
                        <option value="cup">cup</option>
                        <option value="ml">ml</option>
                        <option value="litre">litre</option>
                        <option value="spoon">spoon</option>
                        <option value="tspoon">tspoon</option>
                        <option value="gallon">galloon</option>
                    </select>
                    <input class="bigger" type="text" id="ingr_name3" name="ingr_name3" placeholder="item name">
                </div> 

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