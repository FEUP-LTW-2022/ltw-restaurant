<?php
include_once ('templates/elements.tpl.php');
include_once ('database/connection.php');
include_once ('templates/dish-request.tpl.php');
include_once('database/account.class.php');
session_start();
 $user = account::getPhoto();

drawHeader();
?>


<div class="vertical-menu">
    <?php
    if (account::isLoggedIn()) { ?>
    <img alt="user pic" src=<?=$user['photo']?> width="100" height="100">
    <?php }?>
  <a href="edit-profile.php">Edit profile</a>
  <a href="change-password.php">Change password</a>
  <a href="register-restaurant.php">Register restaurant</a>

</div>


<?php
drawFooter();
?>