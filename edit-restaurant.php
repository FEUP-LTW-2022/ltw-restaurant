<?php
session_start();

include_once('database/connection.php');
include_once('database/account.class.php');
require_once('templates/elements.tpl.php');
include_once ("templates/elements.tpl.php");
include_once ("database/connection.php");
include_once ("database/restaurants.php");
include_once ("database/account.class.php");

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

$db=getDatabaseConnection();
$categories=getCategories($db);

if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {
    account::updateRestaurantInfo($_POST);
}

drawHeader();
?>

<div class="edit-restaurant">
    <form method="post" action="edit-restaurant.php">
        <h1>Edit restaurant</h1>
        <label for="name">
            <b>Name</b>
            <input name="name" type="text" placeholder="Restaurant name .." value="<?php echo account::getRestaurantInfo("name")?>"  required>
        </label>


        <label><b>Category</b>
            <select name="category">
                <?php foreach ($categories as $category){ ?>
                    <option value="<?=$category['id']?>"><?=$category['name']?></option>
                <?php  } ?>
            </select>
        </label>

        <label for="address">
            <b>Address</b>
            <input name="address" type="text" placeholder="Restaurant address .." value="<?php echo account::getRestaurantInfo("address")?>"  required>
        </label>

        <label for="openHours"><b>Open hours</b>
            <input name="openHour" type="time" value="<?php echo account::getRestaurantInfo("openHour")?>" required>
            <input name="closeHour" type="time" value="<?php echo account::getRestaurantInfo("closeHour")?>" required>
        </label>
        <br>

        <button type="submit">Update</button>
    </form>
</div>

<?php drawFooter(); ?>
