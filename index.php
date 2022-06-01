<?php
  session_start();
  require_once('./database/connection.php');
  require_once('./database/restaurants.php');
  
  require_once('./templates/elements.tpl.php');
  require_once('./templates/restaurant.tpl.php');

  $db = getDatabaseConnection();
  $restaurants = getAllRestaurants($db);

  drawHeader();
  drawRestaurantList($db, $restaurants);
  drawFooter();

   