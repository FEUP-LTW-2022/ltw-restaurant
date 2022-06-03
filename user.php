<?php
include_once ('templates/elements.tpl.php');
include_once ('templates/dish-request.tpl.php');
session_start();

drawHeader();


?>
<div>
    <a href="change-password.php">change password</a>
    <a href="register-restaurant.php">register restaurant</a>
    <a href="favourites.php">Favourites</a>
    <a href="change-info.php">change info</a>
    <button formaction="database/logout.php">logout</button>
</div>

<div>
    
</div>

<?php


drawFooter();
