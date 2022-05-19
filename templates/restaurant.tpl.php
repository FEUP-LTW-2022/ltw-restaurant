<?php
   require_once('./database/restaurants.php');
?>

<?php function drawRestaurantList(PDO $db, array $restaurants){ ?>

    <h1>Our Restaurants</h1>
         <section id="restaurants-list" >
          <?php foreach( $restaurants as $restaurant) {  
            $rate = getAverageRate($db, $restaurant['id']) ?> 
              <article>
                <a  href="restaurant.php?id=<?=$restaurant['id']?>">
                  <img src="https://picsum.photos/200?<?=$restaurant['id']?>">
                  <div id="restaurant-category">categoria</div>
                  <div id="restaurant-name"><?=$restaurant['name']?> </div>
                  <div id="restaurant-rating"><?= drawRating($rate)?></div>
               </a>
              </article>
          <?php }?>
        </section>

<?php } ?>