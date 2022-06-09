<?php
session_start();
include_once('database/connection.php');
include_once('database/account.class.php');
require_once('templates/elements.tpl.php');

drawHeader();
if (!account::isLoggedIn()){
    header("Content: index.php");
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

        <label for="newPassword"><b>New Password</b>
            <input name="newPassword" type="password" placeholder="Type your new password .." minlength="8" required>
        </label>

        <label for="newPasswordConfirmation">
            <b>New Password Confirmation</b>
            <input name="newPasswordConfirmation" type="password" placeholder="Confirm your new password .." minlength="8" required>
        </label>

        <button type="submit">Change Password</button>
    </form>
<div/>
<?php drawFooter(); ?>




<form>
    <label> old Password<input type="password" name="oldPassword"></label>

</form>
