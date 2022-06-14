<?php
session_start();
include_once(__DIR__ .'/../database/connection.php');
include_once(__DIR__ .'/../database/account.class.php');
require_once(__DIR__ .'/../templates/elements.tpl.php');
require_once(__DIR__ .'/../templates/user.tpl.php');
drawHeader();
if (!account::isLoggedIn()){
    ob_start();
    header('Location: login.php');
    die();
}
if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST' && $_POST['token'] == $_SESSION['token']) {
    account::changePassword($_POST);
}
drawChangePassword();
 drawFooter();
