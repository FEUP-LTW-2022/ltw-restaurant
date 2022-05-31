<?php
require_once('./database/connection.php');
require_once('./database/restaurants.php');

require_once('./templates/elements.tpl.php');
require_once('./templates/restaurant.tpl.php');

$id=intval($_GET['id']);
$db = getDatabaseConnection();
$restaurant = getRestaurant($db, $id);
$storeRev= countReviews($db, $id);

drawHeader();
$dishes = getDishes($id);
drawDishesList($db,$dishes);

?>

<div>
    <p><?= $restaurant['name']?> </p>
    <p><?php
    for($i=0; $i<sizeof($storeRev); $i+=1){ //para fazer tabela com nr de reviews
        echo $storeRev[$i]. " ";
    }
    ?>
    </p>
</div>

<?php drawFooter(); ?>

