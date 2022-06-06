<?php 

const ALL_RESTAURANTS_Q= 'SELECT * FROM restaurant
GROUP BY restaurant.id
ORDER BY RANDOM() LIMIT 9';

const RATE_Q='SELECT reviews.rate FROM reviews
WHERE restaurant_id = ?
GROUP BY reviews.id';

const RAND_REVIEWS_Q='SELECT reviews.*, name, photo FROM reviews 
JOIN users on reviews.id_author = users.id
WHERE restaurant_id = ?
GROUP BY reviews.id
ORDER BY RANDOM() LIMIT 5';

const REVIEWS_Q='SELECT reviews.*, name, photo FROM reviews 
JOIN users on reviews.id_author = users.id
WHERE restaurant_id = ?
GROUP BY reviews.id
order by date DESC';

const RESTAURANT='SELECT * FROM restaurant WHERE id=?';

const RESTAURANT_CAT= 'SELECT * FROM categories WHERE id=?';


function registerRestaurant(&$info): void
{
    try {
        $db = getDatabaseConnection();
        $stmt = $db->prepare("INSERT INTO restaurant (ownerID,name,category,address,city,website,openHour,closeHour,email,phoneNumber,photo) 
                                        VALUES (:ownerID,:name,:category,:address,:city,:website,:openHour,:closeHour,:email,:phoneNumber,:photo)");
        $userID = account::getUserID();
        $stmt->bindParam(':ownerId', $userID);
        $stmt->bindParam(':name', $info['name']);
        $stmt->bindParam(':category', $info['category']);
        $str = $info['address'] . ", ".$info['zip'];
        $stmt->bindParam(':address', $str);
        $stmt->bindParam(':city', $info['city']);
        $stmt->bindParam(':website', $info['website']);
        $stmt->bindParam(':openHour', $info['openHour']);
        $stmt->bindParam(':closeHour', $info['closeHour']);
        $stmt->bindParam(':email', $info['email']);
        $stmt->bindParam(':phoneNumber', $info['phoneNumber']);
        $stmt->bindParam(':photo', $info['photo']);

        $stmt->execute();
    }catch (PDOException $e){
        error_log($e->getMessage());
        if (strpos($e->getMessage(),"UNIQUE constraint failed: users.email")) {
            $_SESSION['error'] = "email already registered";

            header('Location: ../register.php');
            exit();
        }
    }
    header('Location: ../login.php');
    exit();
}

function getAllRestaurants(PDO $db): array
{
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
    $stmt = $db->prepare(RATE_Q);
    $stmt->execute(array($id));
    return $stmt->fetchAll();
}

function countReviews(PDO $db, int $id): array
{
    $reviews = getRestaurantRate($db, $id);
    $storeRev=[0,0,0,0,0,0];
    
    foreach ( $reviews as $review){
        $storeRev[$review['rate']]=$storeRev[$review['rate']]+1;
    }
      return $storeRev;
}

function sumReviews(array $reviews){
    $counter=0;
    for($i=0; $i<sizeof($reviews); $i+=1){
        $counter+=$reviews[$i];
    }
    return $counter;
}

function getRestaurantCategory(PDO $db, int $id){
    $stmt = $db->prepare(RESTAURANT_CAT);
    $stmt->execute(array($id));
    return $stmt->fetch();
}

function getRandComments(PDO $db, int $id): array
{
    $stmt = $db->prepare(RAND_REVIEWS_Q);
    $stmt->execute(array($id));
    return $stmt->fetchAll();
}

function getComments(PDO $db, int $id): array
{
    $stmt = $db->prepare(REVIEWS_Q);
    $stmt->execute(array($id));
    return $stmt->fetchAll();
}

function getCategories(PDO $db):array
{
    $stmt = $db->prepare('SELECT * FROM categories GROUP BY id');
    $stmt->execute();
    return $stmt->fetchAll();
}
