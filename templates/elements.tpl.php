<?php declare(strict_types = 1);
    include_once("database/connection.php");
    include_once ("database/account.php");

function drawHeader(){?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Title</title>
    <meta charset="UTF-8">
    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/layout.css" rel="stylesheet">
    
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
        <?php
            if (account::isLoggedIn()){
            echo "<a href='user.php'>".account::getUsername()."</a>";
        ?>
            <div class="dropdown">
                <button class="dropbtn"><img src="cart.svg"></button>
                <div class="dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            </div>
        <?php }else{ ?>

            <a href="register.php">Register</a>
            <a href="login.php">Login</a>
        </div>
        <?php }?>
    </header>
    <script src="/javascript/header.js"></script>
    <main>

<?php }

function drawFooter(){ ?>
     
</main>
    <footer>
        <div id="footer-main">
            <div id="footer-logo">
            <img src="logo.jpeg" alt="logo">
            </div>
            <ul id="footer-table">
            <li>
                <a href="about-us.php">About Us</a>
            </li>
            <li>
                <a href="contact-us.php">Contact Us</a>
            </li>
            <li>
                <a href="faq.php">FAQ's</a>
            </li>
            
            </ul>
        </div>
    </footer>
</body>
</html>
<?php } ?>