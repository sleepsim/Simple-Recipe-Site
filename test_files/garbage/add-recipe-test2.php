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

            <form action="add-recipe-test2.php" method="post">
            <!-- School name -->
            School Name: <input type="text" name="school_name"><br>

            <!-- Gender -->
            Gender: <input type="radio" name="gender" value="male" checked>
            <label for="male">Male</label>
            <input type="radio" name="gender" value="female">
            <label for="female">Female</label>
            <input type="radio" name="gender" value="other">
            <label for="other">Other</label><br>

            <!-- School year -->
            <label for="school">School Year:</label>
            <select name="school_year" id="school">
                <option value="First">First</option>
                <option value="Second">Second</option>
                <option value="Third">Third</option>
                <option value="Fourth">Fourth</option>
            </select>

            <input type="submit">
        </form>

        <?php 
            if(isset($_POST["school_name"]) && isset($_POST["gender"]) && isset($_POST["school_year"])){
                if(empty($_POST["school_name"])){
                    echo "ERROR: School name empty.";
                }else if(empty($_POST["gender"])){
                    echo "ERROR: Gender Empty"; //Should not ever happen
                }else if(empty($_POST["school_year"])){
                    echo "ERROR: School year empty";
                }else{
                    echo "School name: " . $_POST["school_name"] . $_POST["gender"] . $_POST["school_year"];
                }
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