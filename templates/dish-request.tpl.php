<?php

include_once ("database/account.php");

function drawUserReceipt(){
    $requests = account::getUserRequest(10);
    $db = getDatabaseConnection();
    foreach ($requests as $request){
        $stmt = $db->prepare("SELECT name FROM restaurant WHERE id = :id");
        $stmt->execute(array($request["id"]));
        $restaurant = $stmt->fetch();


        $stmt = $db->prepare("SELECT * FROM request_dish WHERE request = :request");
        $stmt->execute();
        $dishes = $stmt->fetchAll();

        ?><article>
            <p><?php echo $restaurant["name"] ?></p>
        <?php

        foreach ($dishes as $dish){?>
            <div about="">
                <p><?php echo $dish["name"] ?></p>
                <img src="database/generateimage.php?photo_id=<?php echo is_null($dish['photo_id']) ?  "0" : $dish['name'] ?>">
                <p class="dish-price"><?php echo $dish["price"] ?></p>
            </div>

        <?php }

        ?></article><?php
    }
}
