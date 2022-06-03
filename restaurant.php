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

drawRestaurantInfo($category, $restaurant, $avgRev);
?>
<div class="restTab">
    <button class="tablinks" onclick="openTab(0,'aboutRest')">About</button>
    <button class="tablinks" onclick="openTab(1,'menuRest')">Menu</button>
    <button class="tablinks" onclick="openTab(2,'reviewsRest')">Reviews</button>
</div>
<hr id="tabLine">

<!-- dar print de 3/4 pratos -->
<div id="aboutRest" class="tabcontent">
    <section class="partial-menu">
        <h2>Menu</h2>
        <?php foreach( $dishes as $dish) {?>
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
</div>
<div id="menuRest" class="tabcontent">
    test
</div>
<div id="reviewsRest" class="tabcontent">
    test2
</div>

<?php drawFooter(); ?>

<script>
    function openTab(x, TabName) {
        let i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
            tablinks[i].style.borderBottom="none";}

       tablinks[x].style.borderBottom="4px solid green";
        document.getElementById(TabName).style.display = "block";

    }
</script>