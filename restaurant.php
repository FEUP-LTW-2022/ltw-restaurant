<?php
session_start();
require_once('./database/connection.php');
require_once('./database/restaurants.php');
require_once ('./database/dishes.php');

require_once('./templates/elements.tpl.php');
require_once('./templates/restaurant.tpl.php');

$id=intval($_GET['id']);
$db = getDatabaseConnection();


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
drawRestaurantMenu($dish_cat,$dishes);
drawRestaurantReviews($comments);
 drawFooter();

