<?php
session_start();
include_once('databases/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Title</title>
    <meta charset="UTF-8">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">
</head>
<body>
    <header>
        <a href="index.php">
            <img src="logo.jpeg" alt="logo">
        </a>
        <div id="signup">
            <a href="register.php">Register</a>
            <a href="login.php">Login</a>
        </div>
    </header>
    <div id="register">

        <p>Create Account</p>
        <form method="post" action="register.php">
            <p>*Name <input name="name" type="text" required="required"></p>
            <p>*Surname <input name="surname" type="text" required="required"></p>
            <p>*Email <input name="email" type="email" required="required"></p>
            <p>*Date of Birth <input name="Date of birth" type="date" required="required" "></p>
            <p>*Password <input name="Password" type="password" required="required" value=""></p>
            <p>*Phone Number <input name="Phone number" type="number" max="999999999"min="100000000"></p>
            <p><input name="termsofservice" type="checkbox" required="required" checked>* I Accept the terms of service</p>
            <p><input name="consenttopromotions" type="checkbox" checked>I Want to Receive Emails with promotional material</p>
            <p>*mandatory fields</p>
            <?php
                if ($_SESSION['error'] = 'email already registered'){?>
                   <p>email already registered</p>
            <?php
                }
            ?>
            <button formaction="" type="submit" name="submit" value="submit">Register</button>
        </form>
    </div>
</body>
</html>