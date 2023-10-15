<?php 

    //Recipe page functions

    function recipeDivStart(){
        echo '<div class="flex-container justify-center align-start margin-recipe no-gap">';
    }

    function recipePageName($var){
        echo "<h1>$var</h1>";
    }

    function recipePageDesc($desc){
        echo "<h2>Description</h2>";
        echo "<p class='softer-font ml-small'>$desc</p>";
    }

    function recipePageServes($num){
        echo "<h2>Serves: <span class='softer-font'>$num people</span></h2>";
    }

    function recipePagePrepCook($prep, $cook){
        echo "<h2>Prep Time: <span class='softer-font'>$prep minute/s</span></h2>";
        echo "<h2>Cooking Time: <span class='softer-font'>$cook minute/s</span></h2>";
    }

    function recipePageIngredients($input){
        echo "<h2>Ingredients:";
        $allIngredients = explode("|", $input);

        for($i = 0; $i< count($allIngredients); $i++){

            $curr = explode("+", $allIngredients[$i]);

            echo "<h3 class='ml-small softer-font'> $curr[0] $curr[1] $curr[2] </h2>";
        }

        echo '</h2>';
    }

    function recipePageInstructions(){
        echo "<h2>Instructions</h2>";
    }
    
    function recipePageTags(){
        
    }


?>