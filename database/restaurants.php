<?php 

const ALL_RESTAURANTS_Q= 'SELECT restaurant.* FROM restaurant
LEFT JOIN reviews ON reviews.restaurant_id=restaurant.id 
LEFT JOIN dish ON dish.restaurant_id=restaurant.id
GROUP BY restaurant.id';


function getAllRestaurants(PDO $db){
    $stmt = $db->prepare(ALL_RESTAURANTS_Q);
    $stmt->execute();
    return $stmt->fetchAll();
}

?>