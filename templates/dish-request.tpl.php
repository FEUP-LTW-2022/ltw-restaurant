<?php

include_once ("database/account.class.php");

function drawUserReceipt(): void
{
    $requests = account::getUserRequest(10);
    $db = getDatabaseConnection();
    foreach ($requests as $request){
        $stmt = $db->prepare("SELECT name,logo FROM restaurant WHERE id = :id");
        $stmt->execute(array($request["id"]));
        $restaurant = $stmt->fetch();

        ?><article>
            <p><?php echo $restaurant["name"] ?></p>
            <img src="<?php getimage($restaurant['id']);?>">
        <?php


        $stmt = $db->prepare("SELECT * FROM request_dish WHERE request = :request");
        $stmt->execute(array($request["id"]));
        $dishes = $stmt->fetchAll();


        foreach ($dishes as $dish){?>
            <div about="">
                <p><?php echo $dish["name"] ?></p>
                <p class="dish-price"><?php echo $dish["price"]*$request["quantity"] ?></p>
            </div>

        <?php }

        ?></article><?php
    }
}
