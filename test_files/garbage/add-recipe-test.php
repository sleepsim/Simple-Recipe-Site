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

            <form action="add-recipe-test.php" method="post">
                <input type="text"name="recipeName">
            
            
                

                <input type="submit">
                
            </form>

            <?php 
            if(isset($_POST['recipeName'])){
                echo '<p>haha i work i guess</p>';
                echo '<p>variable a is </p>' . $_POST['recipeName'];
                echo isset($_POST['recipeName']);
            }else if (empty($_POST['recipeName'])){
                echo 'variable recipe name is empty';
            } 
            ?>


        </div>

        <div class="foot">
            <div class="flex-container justify-center align-center">
                <p>IAT352-A1</p>
            </div>
        </div>
        
    </body>
    
</html>