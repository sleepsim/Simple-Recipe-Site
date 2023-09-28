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
            //Validation

            function checkName(){
                if(isset($_POST['recipeName'])){
                    if(empty($_POST['recipeName']) || (strlen(trim($_POST['recipeName'])) == 0)){
                        echo 'Error: Variable RecipeName empty';
                    }else{
                        echo '<p>haha i work i guess</p>';
                        echo '<p>variable a is </p>' . trim($_POST['recipeName']);
                    }
                }
            }


            

        ?>    

    </body>

</html>