<?php
session_start();
require_once(__DIR__ .'/../database/connection.php');
require_once(__DIR__ .'/../database/search.php');

require_once(__DIR__ .'/../templates/elements.tpl.php');
require_once(__DIR__ .'/../templates/restaurant.tpl.php');

$search=$_GET['search'];
$db =getDatabaseConnection();

$restaurants= getSearchRestaurants($search, $db);
$cityRest=getCityRestaurants($search, $db);
drawHeader();
?>
<div class="searchResults">

    <?php if(sizeof($cityRest)>0){?>
        <h1>Restaurants in <?= $search?>:</h1>

    <?php drawRestaurantList($db,$cityRest);
    }

    if(sizeof($restaurants)>0){?>
        <h1>Restaurants result:</h1>
        <?php drawRestaurantList($db, $restaurants);
     }

    if(sizeof($cityRest)==0 && sizeof($restaurants)==0 ){?>
            <h1>No results found, try again</h1>
    <?php } ?>

</div>

