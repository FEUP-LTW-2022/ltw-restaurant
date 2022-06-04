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

function  drawRestaurantInfo($category, $restaurant, $avgRev){ ?>
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




