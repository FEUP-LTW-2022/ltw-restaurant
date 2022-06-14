<?php
session_start();
require_once(__DIR__.'/../database/connection.php');
require_once(__DIR__.'/../database/restaurants.php');
require_once(__DIR__.'/../database/dishes.php');

require_once(__DIR__ .'/../templates/elements.tpl.php');
require_once(__DIR__ .'/../templates/restaurant.tpl.php');

$id=intval($_GET['id']);
$db = getDatabaseConnection();

if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {
    registerReview($_POST, $id);
}

$restaurant = getRestaurant($db, $id);
$category= getRestaurantCategory($db, $restaurant['category']);
$avgRev=getAverageRate($db, $id);

$randDishes= getRandDishes($db, $id);
$storeRev= countReviews($db, $id);

$randComments= getRandComments($db, $id);

$dishes = getDishes($db,$id);
$comments=getComments($db, $id);
$dish_cat=  orderDishes($db, $id);

drawHeader();
drawRestaurantInfo($category, $restaurant, $avgRev);
drawAboutRestaurant($randDishes,$avgRev, $randComments, $storeRev);
drawRestaurantMenu($dish_cat,$dishes,$restaurant);
drawRestaurantReviews($comments);
drawFooter();

