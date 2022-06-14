<?php
const REST_DISHES='SELECT * FROM dish WHERE restaurant_id = ?
ORDER BY dish.category';

const RAND_DISHES='SELECT * FROM dish WHERE restaurant_id=?
GROUP BY dish.id
ORDER BY RANDOM() LIMIT 3';

const DISHES_CAT='SELECT category FROM dish WHERE restaurant_id=?
group by category';

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

function getDishesCat(PDO $db, int $id):array
{
    $stmt = $db->prepare(DISHES_CAT);
    $stmt->execute(array($id));
    return $stmt->fetchAll();
}
function orderDishes(PDO $db, int $id): array
{
    $cat=getDishesCat($db, $id);
    $cat_array=array();
    foreach($cat as $c){
        $cat_array[] = $c['category'];
    }
    $dish_cat_order= array("starters", "meat","fish", "vegetarian","dessert");
    return array_intersect($dish_cat_order, $cat_array);
}


function getDish($id){
    $stmt = getDatabaseConnection()->prepare("SELECT * FROM dish WHERE id = ?");
    $stmt->execute(array($id));
    return $stmt->fetch();
}


function CreateRequest($request){
    $db = getDatabaseConnection();
    $userID = account::getUserID();

    $restaurantID = null;
    foreach ($request['dishes'] as $key => $dish){
        $key = htmlspecialchars($key);
        $dish = htmlspecialchars($dish);
        $stmt = $db->prepare('SELECT restaurant_id FROM dish WHERE id = ?');
        $stmt->execute(array($key));
        $restaurantID = $stmt->fetch();
        break;
    }

    $stmt = $db->prepare("INSERT INTO request (userID, restaurantID) VALUES (?,?)");
    $stmt->execute(array($userID,$restaurantID['restaurant_id']));
    $requestID = $db->lastInsertId();

    foreach ($request['dishes'] as $key => $quantity){
        $key = htmlspecialchars($key);
        $quantity = htmlspecialchars($quantity);

        $stmt = $db->prepare('INSERT INTO request_dish VALUES (?,?,?)');
        $stmt->execute(array($key,$requestID,$quantity));
    }

    return $requestID;
}




