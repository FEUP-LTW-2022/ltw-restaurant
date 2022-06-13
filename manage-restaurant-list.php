<?php
session_start();

include_once('templates/restaurant.tpl.php');
include_once('templates/elements.tpl.php');

drawHeader();

drawUserOwnedRestaurant();

drawFooter();