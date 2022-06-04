<?php
const REST_DISHES='SELECT * FROM dish WHERE restaurant_id = ?';

const RAND_DISHES='SELECT * FROM dish WHERE restaurant_id=?
GROUP BY dish.id
ORDER BY RANDOM() LIMIT 3';

function getDishes(PDO $db, int $id){
$stmt = $db->prepare(REST_DISHES);
$stmt->execute(array($id));

return $stmt->fetchAll();
}

function getRandDishes(PDO $db, int $id){
    $stmt = $db->prepare(RAND_DISHES);
    $stmt->execute(array($id));

    return $stmt->fetchAll();
}

