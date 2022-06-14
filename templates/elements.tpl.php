<?php declare(strict_types = 1);
    include_once(__DIR__ ."/../database/connection.php");
    include_once(__DIR__ ."/../database/account.class.php");
    include_once(__DIR__ ."/../database/upload-image.php");

function drawHeader(): void
{?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Food Boutique</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/javascript/restaurant.js">
</head>
<body> 

    <header id="myHeader">
        <a href="/pages/index.php">
            <img src="/images/logo.png" alt="logo">
        </a>

        <form id="search-bar" action="../pages/search-results.php" method="get">
            <label>
                <input type="text" name="search" placeholder="Restaurant, city, ...">
            </label>
        </form>
        <div id="signup">
        <?php
            if (account::isLoggedIn()){
            echo "<a href='../pages/user.php'> <img id='userLogo' src='".getimage(account::getUserInfo("logo"))."'  alt='user logo'> </a>"
        ?>
            <div class="dropdown">
                <button class="dropbtn"><img src="/images/cart.svg" alt="shopping cart"></button>
                <div class="dropdown-content">

                </div>

            </div>
        <?php }else{ ?>
            <span id="logedOut">
                <a href="/pages/register.php">Register</a>
                <a href="/pages/login.php">Login</a>
            </span>
        </div>
        <?php }?>
    </header>
    <script src="/javascript/header.js"></script>
    <main>

<?php }

function drawFooter(): void
{ ?>
     
</main>
    <footer>
        <div class="footer">
            <span id="footer-logo">
                <img src="/images/logo.png" alt="logo">
            </span>
            <div class="footerCont">
                <ul id="footer-table">
                    <li>
                        <a href="/pages/about-us.php">About Us</a>
                    </li>
                    <li>
                        <a href="/pages/contact-us.php">Contact Us</a>
                    </li>
                    <li>
                        <a href="/pages/faq.php">FAQ's</a>
                    </li>
                </ul>
                <ul id="footer-table2">
                    <li>
                        <a href="/pages/index.php">Home</a>
                    </li>
                    <li>
                        <a href="/pages/login.php">Login</a>
                    </li>
                    <li>
                        <a href="/pages/register.php">Register</a>
                    </li>
                </ul>
            </div>
            </div>
    </footer>
</body>
</html>
<?php } ?>