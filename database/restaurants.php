<?php
include_once("upload-image.php");

const ALL_RESTAURANTS_Q= 'SELECT restaurant.* FROM restaurant
GROUP BY restaurant.id
ORDER BY RANDOM() LIMIT 9';

const REVIEWS_Q='SELECT reviews.rate FROM reviews
WHERE restaurant_id = ?
GROUP BY reviews.id';

const RESTAURANT='SELECT restaurant.* FROM restaurant WHERE id=?';


/**
 * @throws Exception
 */
function registerRestaurant($values, $files){
    $db = getDatabaseConnection();

        $photo_id = upload($files);

    $stmt = $db->prepare("INSERT INTO restaurant (ownerID,name,city,address,website,openHour,closeHour,email,phoneNumber,restaurant_logo) 
                            VALUES (?,?,?,?,?,?,?,?,?,?)");

    $stmt->execute(array(account::getUserID(),$values["RestaurantName"],$values["city"],$values["address"],$values["website"],$values["open-time"],
                            $values["close-time"],$values["email"],$values["phoneNumber"],$photo_id));

    header("Location: ../manage-restaurant.php");
}

function getAllRestaurants(PDO $db){
    $stmt = $db->prepare(ALL_RESTAURANTS_Q);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getRestaurant(PDO $db, int $id){
    $stmt = $db->prepare(RESTAURANT);
    $stmt->execute(array($id));
    return $stmt->fetch();
}

function getAverageRate(PDO $db, int $id){
    $reviews = getRestaurantRate($db, $id) ;
    $i=0;
    $j=0;
    foreach ( $reviews as $review){
      $i= $i + $review['rate'];
      $j= $j +1;
    }
    if($i==0){
        return 0; 
    }
    return number_format($i/$j , 1, ',','.');
}

function getRestaurantRate(PDO $db, int $id){
    $stmt = $db->prepare(REVIEWS_Q);
    $stmt->execute(array($id));
    return $stmt->fetchAll();
}

function countReviews(PDO $db, int $id){
    $reviews = getRestaurantRate($db, $id);
    $storeRev=[0,0,0,0,0,0];
    
    foreach ( $reviews as $review){
        $storeRev[$review['rate']]=$storeRev[$review['rate']]+1;
      } 
      return $storeRev;
}

?>