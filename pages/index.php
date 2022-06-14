<?php
  session_start();
  require_once(__DIR__ .'/../database/connection.php');
  require_once(__DIR__ .'/../database/restaurants.php');
  
  require_once(__DIR__ .'/../templates/elements.tpl.php');
  require_once(__DIR__ .'/../templates/restaurant.tpl.php');

  $db = getDatabaseConnection();
  $restaurants = getAllRestaurants($db);

  drawHeader();
  drawRestaurantList($db, $restaurants);
  drawFooter();

   