<?php

include_once ("password.php");

class account{
    public static function getUserRequest($count): array
    {
        $db = getDatabaseConnection();
        $stmt = $db->prepare("SELECT id FROM users WHERE email=:email");
        $email = htmlspecialchars($_SESSION["email"],ENT_QUOTES);
        $stmt->bindParam(":email",$email);
        $stmt->execute();
        $userID = $stmt->fetch();
        $stmt = $db->prepare("SELECT * FROM request WHERE userID = :userID ORDER BY date LIMIT :count");
        $stmt->bindParam(":userID",$userID['id']);
        $stmt->bindParam(":count",$count);
        $stmt->execute();
        return $stmt->fetchAll();

    }

    public static function login($email, $password){
        $email = htmlspecialchars($email,ENT_QUOTES);
        $password = htmlspecialchars($password,ENT_QUOTES);

        $db = getDatabaseConnection();
        $stmt = $db->prepare("SELECT password,id FROM users WHERE email=:email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $value = $stmt->fetch(PDO::FETCH_ASSOC);
        if (isset($value['password'])) {
            if (security::checkPassword($value["password"], $password)) {
                $_SESSION["token"] = security::generateToken();
                $_SESSION["email"] = $email;
                $stmt = $db->prepare("INSERT INTO user_login_token VALUES (:token,:id)");
                $stmt->bindParam(":token", $_SESSION["token"]);
                $stmt->bindParam(":id", $value["id"]);
                $stmt->execute();
                header("Location:index.php");
            } else {
                $_SESSION["error"] = "wrong email or password";
                header("Location:login.php");
            }
        }else{
            $_SESSION["error"] = "email is not registered";
            header("Location:login.php");
        }
        exit();
    }

    public static function isLoggedIn(): bool
    {
        if (isset($_SESSION["token"]) and isset($_SESSION["email"])){
            $stmt = getDatabaseConnection()->prepare("SELECT id FROM users WHERE email = :email");
            $stmt->bindParam(":email",$_SESSION["email"]);
            $stmt->execute();
            $id = $stmt->fetch();
            $stmt = getDatabaseConnection()->prepare("SELECT token FROM user_login_token WHERE userID = :id");
            $stmt->bindParam(":id",$id["id"]);
            $stmt->execute();
            $tokens = $stmt->fetchAll();
            foreach ($tokens as $token){
                    if ($token['token'] == $_SESSION["token"])return true;
            }
        }
        return false;
    }

    public static function register(&$info): void
    {
        try {
            $db = getDatabaseConnection();
            $stmt = $db->prepare("INSERT INTO Users (email, name, address, password,birthDate,phoneNumber)
                                        VALUES (:email,:name, :address, :password,:birthdate,:phoneNumber)");

            foreach ($info as &$item){
                $item = htmlspecialchars($item,ENT_QUOTES);
            }
            $stmt->bindParam(':email', $info['email']);
            $stmt->bindParam(':name' , $info['name']);
            $stmt->bindParam(':address' , $info['address']);
            $stmt->bindValue(':password' ,  security::generateHash($info['password']));
            $stmt->bindParam(':birthdate',$info['birthdate']);
            $stmt->bindParam(':phoneNumber', $info['phoneNumber']);
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
    public static  function updateUserInfo(&$info){
            $db = getDatabaseConnection();
            $stmt = $db->prepare("UPDATE Users 
                            SET name = :name, address =  :address, phoneNumber = :phoneNumber
                                        WHERE email = :email");
            foreach ($info as $item){
                $item = htmlspecialchars($item,ENT_QUOTES);
            }
            $stmt->bindParam(':name' , $info['name']);
            $stmt->bindParam(':phoneNumber',$info['phoneNumber']);
            $stmt->bindParam(':address' , $info['address']);
            $stmt->bindParam(':email',$_SESSION["email"]);
            $stmt->execute();
    }


    public static  function updateRestaurantInfo(&$info){
        $db = getDatabaseConnection();
        $stmt = $db->prepare("UPDATE restaurant 
                            SET name = :name, category = :category, address =  :address, openHour = :openHour, closeHour = :closeHour
                                        WHERE email = :email");
        foreach ($info as $item){
            $item = htmlspecialchars($item,ENT_QUOTES);
        }
        $stmt->bindParam(':name' , $info['name']);
        $stmt->bindParam(':category',$info['category']);
        $stmt->bindParam(':address' , $info['address']);
        $stmt->bindParam(':openHour',$info['openHour']);
        $stmt->bindParam(':closeHour',$info['closeHour']);
        $stmt->bindParam(':email',$_SESSION["email"]);
        $stmt->execute();
    }


    public static function getUserInfo($info){
        $stmt = getDatabaseConnection()->prepare("SELECT * FROM users WHERE email=:email");
        $stmt->bindParam(":email",$_SESSION["email"]);
        $stmt->execute();
        $value = $stmt->fetch();
        error_log($value[$info]);
        return $value[$info];
    }

    public static function getRestaurantInfo($info){
        $stmt = getDatabaseConnection()->prepare("SELECT * FROM restaurant WHERE email=:email");
        $stmt->bindParam(":email",$_SESSION["email"]);
        $stmt->execute();
        $value = $stmt->fetch();
        error_log($value[$info]);
        return $value[$info];
    }

    public static function getUserID(){
        $stmt = getDatabaseConnection()->prepare("SELECT id FROM users WHERE email=:email");
        $stmt->bindParam(":email",$_SESSION["email"]);
        $stmt->execute();
        return $stmt->fetch()["id"];
    }
    public static function getUsername(){
        $stmt = getDatabaseConnection()->prepare("SELECT name FROM users WHERE email=:email");
        $stmt->bindParam(":email",$_SESSION["email"]);
        $stmt->execute();
        return $stmt->fetch()["name"];
    }

    public static function getPhoto(){
        $stmt = getDatabaseConnection()->prepare("SELECT users.* FROM users WHERE email=:email");
        $stmt->bindParam(":email",$_SESSION["email"]);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function isRestaurantOwner(): bool
    {
        $stmt = getDatabaseConnection()->prepare("SELECT COUNT(*) FROM restaurant INNER JOIN users ON restaurant.ownerID = users.id WHERE users.email = :email");
        $stmt->bindParam(':email',$_SESSION['email']);
        $stmt->execute();
        return $stmt->fetch()["COUNT(*)"] > 0;
    }

    public static function changePassword(&$info): void
    {
        error_log($info["newPassword"]);
        foreach ($info as &$item){
            $item = htmlspecialchars($item,ENT_QUOTES);
        }
        error_log($info["newPassword"]);
         $db = getDatabaseConnection();
        $stmt = $db->prepare("SELECT password,id FROM users WHERE email=:email");
        $email = htmlspecialchars($_SESSION["email"]);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $value = $stmt->fetch();
        error_log($value["password"]);
        if (security::checkPassword($value["password"],$info["oldPassword"])){
            if ($info['newPassword'] == $info['newPasswordConfirmation']) {
                $stmt = $db->prepare("UPDATE users SET password = :password where email= :email");
                $newPassword = htmlspecialchars($info["newPassword"]);
                $stmt->bindParam(":password", $newPassword);
                $stmt->bindParam(":email", $_SESSION["email"]);
                header("location: user.php");
                exit();
            }else{
                $_SESSION['error'] = "new password different from confirmation";
            }
        }else{
            $_SESSION["error"] = "invalid password";
        }
    }


    public static function getUserRestaurants($id):array
    {
        $stmt = getDatabaseConnection()->prepare("SELECT * FROM restaurant WHERE restaurant.ownerID = ? ");
        $stmt->execute(array($id));
        return $stmt->fetchAll();
    }



}