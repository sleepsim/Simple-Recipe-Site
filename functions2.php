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

            echo "<h3 class='ml-small softer-font'> $curr[0] 
            <span class='ing-font'>$curr[1]</span> 
            <span class='softest-font'>$curr[2]</span></h3>";
        }

        echo '</h2>';
    }

    function recipePageInstructions($input){
        echo "<h2>Instructions: ";
        $allInstructions = explode("+", $input);

        for($i = 0; $i< count($allInstructions); $i++){
            $j = $i+1;
            echo "<h3 class='ml-small softer-font'> $j. $allInstructions[$i] </h3>";
        }
        echo '</h2>';
    }
    
    function recipePageTags($tags){
        echo "<h2>Tags: <span class='softer-font'>$tags</span></h2>";
    }

    function recipeImg(){
        echo '<img src="img/placeholder.png" alt="placeholder image">';
    }


    //index page

    function generateList($input){

        for($i = 0; $i<count($input); $i++){
            $recipeName = $input[$i][1];
            $serves = $input[$i][3];
            $prep = $input[$i][4];
            $cook = $input[$i][5];
            echo "<a href='details.php?index=$i'><dt>$recipeName</dt></a>";
            echo "<dd>Serves: $serves</dd>";
            echo "<dd>Prep Time: $prep min</dd>";
            echo "<dd>Cook Tme: $cook min</dd>";
        }

    }


?>


<!-- 

    <dd>Serves:</dd>
    <dd>Prep Time:</dd>
    <dd>Cook Tme:</dd>

 -->