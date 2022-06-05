<?php
require_once('./database/restaurants.php');

 function drawRestaurantList(PDO $db, array $restaurants){ ?>
    <h1>Our Restaurants</h1>
         <section class="restaurants-list" >
          <?php foreach( $restaurants as $restaurant) {  
            $rate = getAverageRate($db, $restaurant['id']) ;
             $category= getRestaurantCategory($db, $restaurant['category']); ?>
              <article>
                <a  href="/restaurant.php?id=<?=$restaurant['id']?>">
                  <img src="https://picsum.photos/200?<?=$restaurant['id']?>" alt="restaurant photo">
                  <span id="restaurant-category"><?=$category['name']?></span>
                  <div id="rest_info_rate">
                    <div id="restaurant-info"><b><?=$restaurant['name']?> </b> </div>
                    <div id="restaurant-rating"><b><?= $rate?></b></div>
                  </div>
                  <span id="restaurant-city"><b><?=$restaurant['city']?></b></span>
               </a>
              </article>
          <?php }?>
        </section>

<?php }

function  drawRestaurantInfo($category, $restaurant, $avgRev): void
{ ?>
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

    <div class="restTab">
        <button class="tablinks" onclick="openTab(0,'aboutRest')">About</button>
        <button class="tablinks" onclick="openTab(1,'menuRest')">Menu</button>
        <button class="tablinks" onclick="openTab(2,'reviewsRest')">Reviews</button>
    </div>
    <hr id="tabLine">

<?php }

function drawAboutRestaurant($randDishes, $avgRev, $numRev, $randComments):void
{ ?>
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
                <hr>
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
            <?php } ?>
            <span id="reviewsBtn"><button onclick="openTab(2,'reviewsRest')">All reviews</button></span>
        </div>
    </div>

<?php }





