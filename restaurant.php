<?php
require_once('./database/connection.php');
require_once('./database/restaurants.php');

require_once('./templates/elements.tpl.php');
require_once('./templates/restaurant.tpl.php');

$id=intval($_GET['id']);
$db = getDatabaseConnection();

$restaurant = getRestaurant($db, $id);

$storeRev= countReviews($db, $id);
$avgRev=getAverageRate($db, $id);
$numRev=sumReviews($storeRev);

$dishes = getDishes($db,$id);



drawHeader();

//drawDishesList($dishes);
?>

<div class="restaurant-page">
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
    <h2>Rating table</h2>

    <p><?= $avgRev. " average based on ".$numRev." reviews." ?> </p>
    <hr>

    <div id="row">

        <div id="side">
            <div>5 star</div>
        </div>
        <div id="middle">
            <div id="bar-container">
            <div id="bar-5"></div>
            </div>
        </div>
        <div id="right">
            <div><?=$storeRev[5]?></div>
        </div>
    </div>
</div>

<?php drawFooter(); ?>

