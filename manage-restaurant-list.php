<?php
session_start();

include_once("database/account.class.php");
include_once("database/connection.php");
include_once ('templates/elements.tpl.php');
include_once ('templates/restaurant.tpl.php');
include_once ('database/upload-image.php');

$db=getDatabaseConnection();
$id= account::getUserID();
$restaurants = account::getUserRestaurants($id);

drawHeader();
?>

<span class="my-restaurants">
    <h1>Your Restaurants</h1>

     <section class="my-restaurants-list" >
          <?php foreach( $restaurants as $restaurant) {
              $rate = getAverageRate($db, $restaurant['id']) ;
              $category= getRestaurantCategory($db, $restaurant['category']); ?>
              <article>
                <a  href="/restaurant.php?id=<?=$restaurant['id']?>">
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
        </section>
</span>

<?php
drawFooter(); ?>
