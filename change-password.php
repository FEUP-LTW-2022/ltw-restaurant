<?php
session_start();
include_once('database/connection.php');
include_once('database/account.class.php');
require_once('templates/elements.tpl.php');

drawHeader();
if (!account::isLoggedIn()){
    ob_start();
    header('Location: login.php');
    die();
}
if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {
    account::changePassword($_POST);
}
?>
<div class="change-password">
    <form method="post" action="change-password.php">
        <h1>Change password</h1>
        <label for="oldPassword">
            <b>Old Password</b>
            <input name="oldPassword" type="password" placeholder="Type your old password .." minlength="8" required>
        </label>
        <?php
        if ($_SESSION["error"] == "invalid password"){
            echo "<p class='error'>invalid password</p>";
            unset($_SESSION["error"]);
        }
        ?>



        <label for="newPassword"><b>New Password</b>
            <input name="newPassword" type="password" placeholder="Type your new password .." minlength="8" required>
        </label>

        <label for="newPasswordConfirmation">
            <b>New Password Confirmation</b>
            <input name="newPasswordConfirmation" type="password" placeholder="Confirm your new password .." minlength="8" required>
        </label>
            <?php
                if ($_SESSION["error"] == "new password different from confirmation"){
                    echo "<p class='error'>new password different from confirmation</p>";
                    unset($_SESSION["error"]);
                }
            ?>

        <button type="submit">Change Password</button>
    </form>
</div>
<?php drawFooter(); ?>




<form>
    <label> old Password<input type="password" name="oldPassword"></label>

</form>
