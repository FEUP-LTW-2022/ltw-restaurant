<?php
session_start();
include_once('database/connection.php');
include_once ('database/account.php');
require_once('templates/elements.tpl.php');
if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {
    account::register($_POST);
}
drawHeader();
?>

        <div id="register">
            <p>Create Account</p>
            <form method="post" action="register.php">
                <p>*Name <input name="name" type="text" required="required"></p>
                <p>Surname <input name="surname" type="text"></p>
                <p>*Email <input name="email" type="email" required="required"></p>
                <p>*Date of Birth <input name="birthdate" type="date" required="required"></p>
                <p>*Password <input name="password" type="password" required="required"></p>
                <p>*Phone Number <input name="phoneNumber" type="number" max="999999999" min="100000000"></p>
                <p><input name="termsOfService" type="checkbox" required="required" checked>I Accept the terms of service*</p>
                <p><input name="consentToPromotions" type="checkbox" checked>I Want to Receive Emails with promotional material</p>
                <?php
                    if ($_SESSION["error"] = "email already registered"){
                        echo "email already registered try logging in or a different email";
                        unset($_SESSION["error"]);
                    }
                ?>
                <p>*mandatory fields</p>
                <button type="submit">Register</button>
            </form>
        </div>
        
<?php drawFooter() ?>