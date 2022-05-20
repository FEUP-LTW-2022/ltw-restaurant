<?php declare(strict_types = 1); ?>


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
        <?php
            if (account::isLoggedIn()){

        ?>
                <p>vdibmdibgf</p>
        <?php }
            else{
        ?>
        <div id="signup">
            <a href="register.php">Sign Up</a>
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
                <a href="contact-info.php">Contact Info</a>
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