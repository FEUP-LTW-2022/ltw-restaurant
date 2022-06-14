<?php
session_start();
include_once('database/connection.php');
include_once('database/account.class.php');
require_once('templates/elements.tpl.php');

if (account::isLoggedIn()){
    ob_start();
    header('Location: index.php');
    die();
}
if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {
    account::register($_POST);
}
drawHeader();
?>
    <div class="register">
        <form method="post" action="register.php">
            <h1>Create a new account</h1>

            <label for="name">
                <b>Name</b>
                <input name="name" type="text" placeholder="Your name .." required>
            </label>
            
            <label for="email"><b>Email</b>
            <input name="email" type="email" placeholder="Your email .." required>
            </label>

            <label for="password"><b>Password</b>
            <input name="password" type="password" placeholder="Password .." minlength="8" required>
            </label>

            <label for="phoneNumber"><b>Phone Number</b>
            <input name="phoneNumber" type="number" max="999999999" min="900000000" placeholder="Your phone number ..">
            </label>

            <label for="address">
                <b>Address</b>
                <input name="address" type="text" placeholder="Your address .." required>
            </label>
           
            <label for="birthDate"><b>Birth date</b>
            <input name="birthdate" type="date" id="date" max ='' required>
            </label>

            <?php
                if ($_SESSION["error"] == "email already registered"){
                    echo "email already registered try logging in or a different email";
                    unset($_SESSION["error"]);
                }
            ?>
            <button type="submit">Register</button>
        </form>
        <hr id="register-bar">
        <div id="regToLogin">
            <h2>Already have an account?</h2>
            <button onclick=RegToLogin()>Login</button>
        </div>
    </div>
<?php drawFooter()?>

<script src="./javascript/login&register.js">
RegToLogin()
 </script>
