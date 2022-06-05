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

$storeRev= countReviews($db, $id);
$avgRev=getAverageRate($db, $id);
$numRev=sumReviews($storeRev);
$randComments= getRandComments($db, $id);

$dishes = getDishes($db,$id);
$randDishes= getRandDishes($db, $id);

$category= getRestaurantCategory($db, $restaurant['category']);
$dish_cat= array("starters", "meat", );
drawHeader();

drawRestaurantInfo($category, $restaurant, $avgRev);
drawAboutRestaurant($randDishes,$avgRev, $numRev, $randComments);
//drawRestaurantMenu()
//drawRestaurantReviews()
?>
<!-- dar print de 3/4 pratos -->

    <div id="menuRest" class="tabcontent">
        <h1>Menu</h1>
        <section class="fullMenu">
        <?php foreach( $dishes as $dish) {?>
            <article>
                <span id="dish-name"><?=$dish['name']?></span>
                <hr id="menuHr">
                <span id="dish-price"><?=$dish['price']?>&euro;</span>
            </article>
        <?php }?>
        </section>
    </div>

    <div id="reviewsRest" class="tabcontent">
        test2
    </div>
</div>
<script src="./javascript/restaurant.js"></script>

<?php drawFooter(); ?>

