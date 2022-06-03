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

$dishes = getDishes($db,$id);

$category= getRestaurantCategory($db, $restaurant['category']);

drawHeader();

//drawDishesList($dishes);

drawRestaurantInfo($category, $restaurant, $avgRev);
?>

<section class="menu">
    <h2>Menu</h2>
    <?php foreach( $dishes as $dish) {?>
        <article>
            <span id="dish-name"><?=$dish['name']?></span>
            <hr id="menuHr">
            <span id="dish-price"><?=$dish['price']?>&euro;</span>
        </article>
        <?php }?>
</section>

<div class="rate-table">
    <h2>Rating table </h2>

    <p><?= $avgRev. " average based on ".$numRev." reviews." ?> </p>
    <hr>
    <?php for($i=5; $i>0; $i-=1){?>
        <div id="line">
            <span><?=$i?>&nbsp;star</span>
            <div id="middle">
                <span id="bar-<?=$i?>" style="width: <?=(int) (($storeRev[$i]*100)/$numRev)?>%"></span>
            </div>
            <span id="right" ><?=$storeRev[$i]?></span>
        </div>
    <?php } ?>

<?php drawFooter(); ?>

