<?php
session_start();

include_once ('templates/elements.tpl.php');
include_once ('database/connection.php');
include_once ('templates/dish-request.tpl.php');
include_once('database/account.class.php');
 $user = account::getPhoto();

drawHeader();


?>
<div>
    <a href="change-password.php">change password</a>
    <a href="register-restaurant.php">register restaurant</a>
    <a href="favourites.php">Favourites</a>
    <a href="change-info.php">change info</a>
    <form action="database/logout.php" method="post">
        <button formaction="database/logout.php">logout</button>
    </form>
<?php
if (account::isLoggedIn()) { ?>
   <img alt="user pic" src=<?=$user['photo']?>>
<?php }?>
</div>

<div>

</div>

<?php

drawFooter();
