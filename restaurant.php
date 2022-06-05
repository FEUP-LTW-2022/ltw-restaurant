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
$comments=getComments($db, $id);

$dishes = getDishes($db,$id);
$randDishes= getRandDishes($db, $id);

$category= getRestaurantCategory($db, $restaurant['category']);
$dish_cat=  orderDishes($db, $id);

drawHeader();
drawRestaurantInfo($category, $restaurant, $avgRev);
drawAboutRestaurant($randDishes,$avgRev, $numRev, $randComments, $storeRev);
drawRestaurantMenu($dish_cat,$dishes);
//drawRestaurantReviews()
?>


    <div id="reviewsRest" class="tabcontent">
        <div class="comments">
            <?php foreach ($comments as $comment){?>

                <article>
                    <div class="comment-info">
                        <div>
                            <img src="<?=$comment['photo']?>" alt="user photo">
                            <div id="name-date">
                                <span id="comment-name"><b><?=$comment['name']?></b></span>
                                <span id="comment-date"><?=date($comment['date'])?></span>
                            </div>
                        </div>
                        <div>
                            <span id="comment-rate"><?=$comment['rate']?></span>
                            <span id="comment-max">/5</span>
                        </div>
                    </div>
                    <span id="comment-text"><?=$comment['text']?></span>

                </article>
                <hr>
            <?php } ?>

        </div>
    </div>

<script src="./javascript/restaurant.js"></script>

<?php drawFooter(); ?>

