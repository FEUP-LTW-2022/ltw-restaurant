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
?>

<div class="restaurant-page">
    <a id="header-category"><?= $category['name']?></a> <!-- href -> search de todos restaurantes da categoria -->
    <h1><?= $restaurant['name']?> </h1>
    <section class="dishes-list">
        <?php foreach( $dishes as $dish) {?>
            <article>
                <div id="dish-info">
                    <div id="dish-name"><b><?=$dish['name']?> </b> </div>
                </div>
            </article>
            <?php }?>
    </section>

<div class="rate-table">
    <h2>Rating table </h2>

    <p><?= $avgRev. " average based on ".$numRev." reviews." ?> </p>
    <hr>
    <div id="row">
        <?php for($i=5; $i>0; $i-=1){?>

        <div id="side">
                <div> <?= $i?> star</div>
            </div>
            <div id="middle">
                <div id="bar-container">
                <div id="bar-<?=$i?>" style="width: <?=(int) (($storeRev[$i]*100)/$numRev)?>%"></div>
                </div>
            </div>
            <div id="right">
                <div><?=$storeRev[$i]?></div>
            </div>
         <?php } ?>
    </div>
</div>

<?php drawFooter(); ?>

