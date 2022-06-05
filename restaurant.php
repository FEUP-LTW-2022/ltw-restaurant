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

drawHeader();

drawRestaurantInfo($category, $restaurant, $avgRev);
?>


<!-- dar print de 3/4 pratos -->
<div id="aboutRest" class="tabcontent">

    <section class="partial-menu">
        <h2>Menu</h2>

        <?php foreach( $randDishes as $dish) {?>
            <article>
                <span id="dish-name"><?=$dish['name']?></span>
                <hr id="menuHr">
                <span id="dish-price"><?=$dish['price']?>&euro;</span>
            </article>
            <?php }?>

        <span id="menuBtn"><button onclick="openTab(1,'menuRest')">Complete Menu</button></span>
    </section>

    <!-- dar print de alguns comments-->
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
    </div>
    <div class="rand-comments">
        <?php foreach ($randComments as $comment){?>
            <article>
                <span id="dish-name"><?=$comment['name']?></span>
                <span id="dish-name"><?=$comment['text']?></span>
                <span id="dish-price"><?=$comment['rate']?>/5</span>
                <span id="dish-price"><?=date($comment['date'])?></span>
                <hr id="commentHr">
            </article>
        <?php } ?>
    </div>

</div>

<div id="menuRest" class="tabcontent">
    test
</div>

<div id="reviewsRest" class="tabcontent">
    test2
</div>

<?php drawFooter(); ?>

<script src="./javascript/restaurant.js"></script>