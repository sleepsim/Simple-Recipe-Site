<?php 

    //Recipe page functions

    function recipePageName($var){
        echo "<h1>$var</h1>";
    }

    function recipePageDesc($desc){
        echo "<h2>Description</h2>";
        echo "<p class='softer-font ml-small'>$desc</p>";
    }

    function recipePageServes($num){
        echo "<h2>Serves: <span class='softer-font'>$num</span></h2>";
    }

    function recipePagePrepCook($prep, $cook){
        echo "<h2>Prep Time: <span class='softer-font'>$prep</span></h2>";
        echo "<h2>Cooking Time: <span class='softer-font'>$cook</span></h2>";
    }

    function recipePageIngredients(){
        echo "<h2>Ingredients</h2>";
        //figure this out
    }

    function recipePageInstructions(){
        echo "<h2>Instructions</h2>";
    }
    
    function recipePageTags(){
        
    }

?>