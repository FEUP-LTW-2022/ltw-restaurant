<?php
require_once(__DIR__ .'/../database/restaurants.php');
require_once (__DIR__ .'/../database/upload-image.php');

function checkStoreRev($storeRev, $numRev):float{
    if($numRev!=0){
        return ($storeRev*100)/$numRev;
    }
    else{
        return 0;
    }
}

 function drawRestaurantList(PDO $db, array $restaurants):void{ ?>
 <span id="index">
     <h1>Our Restaurants</h1>
         <span class="restaurants-list" >
          <?php foreach( $restaurants as $restaurant) {  
            $rate = getAverageRate($db, $restaurant['id']) ;
             $category= getRestaurantCategory($db, $restaurant['category']); ?>
              <article>
                <a  href="/pages/restaurant.php?id=<?=$restaurant['id']?>">
                  <img src="<?=getimage($restaurant['logo'])?>" alt="restaurant photo" style="width: 200px; height: 200px;">
                  <span id="restaurant-category"><?=$category['name']?></span>
                  <div id="rest_info_rate">
                    <div id="restaurant-info"><b><?=$restaurant['name']?> </b> </div>
                    <div id="restaurant-rating"><b><?= $rate?></b></div>
                  </div>
                  <span id="restaurant-city"><b><?=$restaurant['city']?></b></span>
               </a>
              </article>
          <?php }?>
        </span>
</span>

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

    <span id="maps"> <a href="https://www.google.com/maps/search/?api=1&query=<?=$restaurant['address']?>" target="_blank" rel="noopener noreferrer" ><u><?= $restaurant['address']?></u></a></span>
    <br>
    <span id="email"><?=$restaurant['email']?></span>
    <br>
    <span id="number"><?=$restaurant['phoneNumber']?></span>
    <img src="<?=getImage($restaurant['logo'])?>" alt="restaurant photo" style="  width: 50%; height: 300px;">

    <div class="restTab">
        <button class="tablinks" onclick="openTab(0,'aboutRest')">About</button>
        <button class="tablinks" onclick="openTab(1,'menuRest')">Menu</button>
        <button class="tablinks" onclick="openTab(2,'reviewsRest')">Reviews</button>
    </div>
    <hr id="tabLine">

<?php }

function drawAboutRestaurant($randDishes, $avgRev,$randComments, $storeRev):void
{ $numRev=sumReviews($storeRev); ?>
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
                        <span id="bar-<?=$i?>" style="width: <?= (int) checkStoreRev($storeRev[$i], $numRev)?>%"></span>
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
                            <img src="<?=getimage($comment['logo'])?>" alt="user photo">
                            <div id="name-date">
                                <span id="comment-name"><b><?=$comment['name']?></b></span>
                                <span id="comment-date"><?=date('Y-m-d',$comment['date'])?></span>
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

function drawRestaurantMenu($dish_cat, $dishes,$restaurant):void{ ?>
   <div id="menuRest" class="tabcontent">
    <h1>Menu</h1>
    <section class="fullMenu">

        <?php  for($i=0; $i<=sizeof($dish_cat); $i++) {
                echo "<h2>". ucfirst($dish_cat[$i])."</h2>";
                    foreach( $dishes as $dish) {
                        if($dish['category']==$dish_cat[$i]){
                        ?>
                        <article>
                            <button id="dish-name" onclick="addToCart('<?= $dish['name']?>', <?= $dish['id']?>, <?= $dish['price']?>, <?= $restaurant['id']?>)"><?=$dish['name']?></button>
                            <hr id="menuHr">
                            <span id="dish-price"><?=$dish['price']?>&euro;</span>
                        </article>
                    <?php }
                    }
        }?>
    </section>
</div>
<?php }


function drawRestaurantReviews($comments): void{ ?>
 <div id="reviewsRest" class="tabcontent">
    <?php if(account::isLoggedIn()){
     drawReviewsForm();} ?>
    <div class="write-comment">
        <form method="post" action="../pages/restaurant.php" enctype="multipart/form-data">

        </form>
    </div>
    <div class="comments">
        <?php foreach ($comments as $comment){?>

            <article>
                <div class="comment-info">
                    <div>
                        <img src="<?=getImage($comment['logo'])?>" alt="user photo">
                        <div id="name-date">
                            <span id="comment-name"><b><?=$comment['name']?></b></span>
                            <span id="comment-date"><?=date('Y-m-d',$comment['date'])?></span>
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

<script src="../javascript/restaurant.js"></script>

<?php }

function drawReviewsForm(){ ?>
<form id="feedback" method="post" action="../pages/restaurant.php?id=<?=$_GET['id']?>" enctype="multipart/form-data">

 <div class="pinfo">Rate our overall services.</div>

   <label for="rate" class="reviewRate">
       <span id="rateText">Rate</span>
       <select  id="rate" name="rate" required>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
    </label>


    <label for="review" class="reviewLabel">
        Leave your feedback
        <textarea id="reviewText" rows="3" name="reviewText"></textarea>
    </label>


     <button type="submit" class="reviewBtn">Submit</button>

</form>
<?php }






