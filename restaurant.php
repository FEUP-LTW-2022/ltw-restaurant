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
<div>

</div>
<div class="restaurant-page">
    <span><a id="header-category"><?= $category['name']  ?></a> </span> <!-- href -> search de todos restaurantes da categoria -->
    <div class="res-page-name">
        <span id="r_name"><b><?= $restaurant['name']." - ".$restaurant['city']?> </b></span>
        <div>
            <span id="r_rate"><?=$avgRev?></span>
            <span>/5</span>
        </div>
    </div>
    <span id="maps"> <a href="https://www.google.com/maps/search/?api=1&query=<?=$restaurant['address']?>"><u><?= $restaurant['address']?></u></a></span>
    <img src="<?=$restaurant['photo']?>" alt="restaurant photo" style="  width: 50%; height: 300px;">

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

