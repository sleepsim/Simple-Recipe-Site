<!DOCTYPE html>

<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>Pocholo's Recipes</title>

        <!-- CSS files -->
        <link rel="stylesheet" href="css/main.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;600&family=Roboto+Slab:wght@700&family=Sofia+Sans:ital,wght@0,300;0,600;1,300;1,400&display=swap" rel="stylesheet">
        
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
        echo '<h1>IAT 352 - Fall 2023</h1>';
        echo '<h2>Pocholo Andres</h2>';
        
        generateFooter();

        divEnd();

    ?>

</body>