<?php
const REST_DISHES='SELECT * FROM dish WHERE restaurant_id = ?
ORDER BY dish.category';

const RAND_DISHES='SELECT * FROM dish WHERE restaurant_id=?
GROUP BY dish.id
ORDER BY RANDOM() LIMIT 3';

function getDishes(PDO $db, int $id):array
{
$stmt = $db->prepare(REST_DISHES);
$stmt->execute(array($id));

return $stmt->fetchAll();
}

function getRandDishes(PDO $db, int $id):array
{
    $stmt = $db->prepare(RAND_DISHES);
    $stmt->execute(array($id));

    return $stmt->fetchAll();
}

