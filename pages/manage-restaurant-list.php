<?php
session_start();

include_once(__DIR__ .'/../database/account.class.php');
include_once(__DIR__ .'/../database/connection.php');
include_once(__DIR__ .'/../templates/elements.tpl.php');
include_once(__DIR__ .'/../templates/restaurant.tpl.php');
include_once(__DIR__ .'/../database/upload-image.php');

$db=getDatabaseConnection();
$id= account::getUserID();
$restaurants = account::getUserRestaurants($id);

if (!account::isLoggedIn()){
    ob_start();
    header('Location: login.php');
    die();
}
if(!account::isRestaurantOwner()){
    ob_start();
    header('Location: index.php');
    die();
}
drawHeader();
?>

<span class="my-restaurants">
    <h1>Your Restaurants</h1>

     <span class="my-restaurants-list" >

          <?php foreach( $restaurants as $restaurant) {?>
              <div id="rest-options">
                  <article>
                    <a  href="/pages/restaurant.php?id=<?=$restaurant['id']?>">
                        <img src="<?=getimage($restaurant['logo'])?>" alt="restaurant photo" style="width: 200px; height: 200px;">
                        <div id="my-rest-name"><b><?=$restaurant['name']?> </b> </div>
                        <span id="my-rest-city"><b><?=$restaurant['city']?></b></span>
                   </a>
                  </article>
                  <span id="rest-list-btns">
                      <h2>Manage your:</h2>
                      <button onclick="location.href='edit-restaurant.php?id=<?=$restaurant['id']?>'">Restaurant</button>
                      <button onclick="location.href='index.php?id=<?=$restaurant['id']?>'">Menu</button>
                      <button onclick="location.href='manage-orders.php?id=<?=$restaurant['id']?>'">Orders</button>
                  </span>
              </div>
          <?php }?>
     </span>
</span>

<?php
drawFooter(); ?>
