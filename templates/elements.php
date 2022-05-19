<?php function drawHeader(){?>
    


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Title</title>
    <meta charset="UTF-8">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body> 

    <header id="myHeader">
        <a href="index.php">
            <img src="logo.jpeg" alt="logo">
        </a>
        <form id="search-bar" action="search-results.php" method="get">
            <input type="text" name="search-bar" placeholder="Restaurant, city, ...">
        </form>
        <div id="signup">
            <a href="register.php">Register</a>
            <a href="login.php">Login</a>
      </div>
    </header>
    <script src="/javascript/header.js"></script>
    <main>

<?php }

function generateFooter(){}

function generateRestaurantElement(){}

function generateDishElement(){}
