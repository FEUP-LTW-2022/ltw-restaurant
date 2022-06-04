<?php
session_start();

include_once ('templates/elements.tpl.php');
include_once ('database/connection.php');
include_once ('templates/dish-request.tpl.php');
include_once('database/account.class.php');
 $user = account::getPhoto();

drawHeader();


?>
<div class="vertical-menu">
    <?php
    if (account::isLoggedIn()) { ?>
        <img alt="user pic" src=<?=$user['photo'] ?> width="100" height="100">
    <?php }?>
    <a href="change-password.php">Change password</a>
    <a href="register-restaurant.php">Register restaurant</a>
    <a href="favourites.php">Favourites</a>
    <a href="edit-profile.php">Edit  Profile</a>
    <form action="database/logout.php" method="post">
        <button formaction="database/logout.php">Logout</button>
    </form>

</div>

<div>

</div>

<?php

drawFooter();
