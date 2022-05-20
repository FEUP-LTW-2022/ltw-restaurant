<?php
session_start();
include_once('templates/elements.tpl.php');
include_once ('database/connection.php');

drawHeader();

if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {
    account::login($_POST["email"],$_POST["password"]);
}
?>
    <form method="post">
        <p>email:<input name="email" required="required" type="email"></p>
        <p>password<input name="password" type="password" required="required"></p>
        <p><input type="checkbox" checked name="stayloggedin">Stay logged in</p>
        <p><input type="submit"></p>
    </form>

<?php drawFooter() ?>