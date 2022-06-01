<?php
   require_once('./database/restaurants.php');
?>

<?php function drawRestaurantList(PDO $db, array $restaurants){ ?>

    <h1>Our Restaurants</h1>
         <section class="restaurants-list" >
          <?php foreach( $restaurants as $restaurant) {  
            $rate = getAverageRate($db, $restaurant['id']) ?> 
              <article>
                <a  href="/restaurant.php?id=<?=$restaurant['id']?>">
                  <img src="https://picsum.photos/200?<?=$restaurant['id']?>" alt="restaurant photo">
                  <span id="restaurant-category">categoria</span>
                  <div id="rest_info_rate">
                    <div id="restaurant-info"><b><?=$restaurant['name']?> </b> </div>
                    <div id="restaurant-rating"><b><?= $rate?></b></div>
                  </div>
                  <span id="restaurant-city"><b>cidade</b></span>
               </a>
              </article>
          <?php }?>
        </section>

<?php } ?>

<?php function drawDishesList(array $dishes){ ?>
    <section class="dishes-list">
      <?php foreach( $dishes as $dish) {
        // $rate = getAverageRate($db, $dish['id']) ?>
          <article>
              <div id="dish-info">
                  <div id="dish-name"><b><?=$dish['name']?> </b> </div>
              </div>
          </article>
          <?php }?>
    </section>
<?php 
}


