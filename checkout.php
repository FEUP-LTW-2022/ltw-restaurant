<?php
session_start();
require_once('./templates/elements.tpl.php');
include_once ('./database/dishes.php');
drawHeader();

$price = 0;
CreateRequest($_REQUEST);
?>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div class="checkout">
        <div class="col-75">
            <div class="container">
                <form action="">
                    <div class="col-50">
                            <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>
                                <?php foreach ($_REQUEST['dishes'] as $dishID => $quantity){
                                   $dishID = htmlspecialchars($dishID);
                                   $quantity = htmlspecialchars($quantity);

                                    $dish = getDish($dishID);
                                   $dishprice = getDish($dishID)['price'] * $quantity;
                                   $price += $dishprice;
                                ?>
                                    <p><span><?= getDish($dishID)['name'] ?></span> <span class="price"><?= $dishprice ?></span></p>
                                <?php } ?>
                            <hr>
                            <p>Total <span class="price" style="color:black"><b><?= $price ?> </b></span></p>

                    </div>
                </form>
            </div>
        </div>

    </div>
<?php drawFooter();


