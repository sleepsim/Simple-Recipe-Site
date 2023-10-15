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
            //Load Functions
            require'functions.php';
            require'functions2.php';

            generateNavbar(); 
            divStart();

            //
            // echo 'index is: '. $_GET["index"];

            //load files

            $testing24 = fopen('recipe.csv', 'r');

            // $array = fgetcsv($testing24);
            
            while($array = fgetcsv($testing24)){
                echo $array[0] . ",";
                echo $array[1] . ",";
                echo $array[2] . ",";
                echo $array[3] . ",";
                echo $array[4] . ",";
                echo $array[5] . ",";
                echo $array[6] . ",";
                echo $array[7] . "<br>";
            }

            


            divEnd();
            generateFooter();
        ?>
        
    </body>
    
</html>