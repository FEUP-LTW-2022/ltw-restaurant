<?php
session_start();

include_once(__DIR__ .'/../templates/elements.tpl.php');
include_once(__DIR__ .'/../database/connection.php');
include_once(__DIR__ .'/../templates/dish-request.tpl.php');
include_once(__DIR__ .'/../database/account.class.php');
include_once(__DIR__ .'/../database/upload-image.php');
include_once(__DIR__ .'/../templates/user.tpl.php');
if (!account::isLoggedIn()){
    ob_start();
    header('Location: login.php');
    die();
}
 $user = account::getPhoto();

drawHeader();
drawUserPage($user);
drawFooter();
