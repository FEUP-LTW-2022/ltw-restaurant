<?php
const REST_DISHES='SELECT * FROM dish WHERE restaurant_id = ?';

function getDishes(PDO $db, int $id){

$stmt = $db->prepare(REST_DISHES);
$stmt->execute(array($id));

return $stmt->fetchAll();

}

