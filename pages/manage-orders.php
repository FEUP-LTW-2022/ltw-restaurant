<?php
session_start();

include_once(__DIR__ .'/../database/account.class.php');
include_once(__DIR__ .'/../database/connection.php');
include_once(__DIR__ .'/../templates/elements.tpl.php');
include_once(__DIR__ .'/../templates/restaurant.tpl.php');

$db=getDatabaseConnection();
$id= $_GET['id'];

if (!account::isLoggedIn()){
    ob_start();
    header('Location: login.php');
    die();
}
if(!account::isRestaurantOwner()){
    ob_start();
    header('Location: index.php');
    die();
}
drawHeader();
//era preciso fazerem alguma coisa para eu conseguir fazer isto
?>

<?php drawFooter();