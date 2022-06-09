<?php
session_start();

include_once ('templates/elements.tpl.php');
include_once ('database/connection.php');
include_once ('templates/dish-request.tpl.php');
include_once('database/account.class.php');
include_once('database/upload-image.php');
if(!account::isLoggedIn()){
    header("Content: index.php");
    exit();
}
 $user = account::getPhoto();

drawHeader();

?>
<div class="vertical-menu">

    <img alt="user pic" src="<?=getimage($user['logo']) ?>" style="width: 100px; height: 100px">

    <a href="change-password.php">Change password</a>
    <?php if (account::isRestaurantOwner()){ ?>
        <a href="manage-restaurant.php">Manage Restaurant</a>
    <?php }?>
    <a href="register-restaurant.php">Register restaurant</a>
    <a href="favourites.php">Favourites</a>
    <a href="edit-profile.php">Edit  Profile</a>
    <form action="database/logout.php" method="post">
        <button formaction="database/logout.php">Logout</button>
    </form>

</div>

<div>
    <?php
    drawUserReceipt();
    ?>
</div>

<?php

drawFooter();
