<?php

include_once ("password.php");

class account{
    public static function getUserRequest($count){
        $db = getDatabaseConnection();
        $stmt = $db->prepare("SELECT id FROM users WHERE email=:email");
        $stmt->bindParam(":email",$_SESSION["email"]);
        $stmt->execute();
        $userID = $stmt->fetch();
        $stmt = $db->prepare("SELECT * FROM request WHERE userID = :userID ORDER BY date LIMIT :count");
        $stmt->bindParam(":userID",$userID);
        $stmt->bindParam(":count",$count);
        $stmt->execute();
        return $stmt->fetchAll();

    }

    public static function login($email,$password){
        $db = getDatabaseConnection();
        $stmt = $db->prepare("SELECT password,id FROM users WHERE email=:email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $value = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (security::checkPassword($value["password"],$password)){
            $_SESSION["token"] = security::generateToken();
            $_SESSION["email"] = $email;
            $stmt = $db->prepare("INSERT INTO user_login_token VALUES (:token,:id)");
            $stmt->bindParam(":token",$_SESSION["token"]);
            $stmt->bindParam(":id",$value["id"]);
            $stmt->execute();
            header("Location:index.php");
        }else{
            $_SESSION["error"] = "bad credentials";
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

    public static function register(&$info){
        try {
            $db = getDatabaseConnection();
            $stmt = $db->prepare("INSERT INTO Users (email, name, address, password,birthDate,phoneNumber)
                                        VALUES (:email,:name, :address, :password,:birthdate,:phoneNumber)");
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
    /*public static  function updateUserInfo(&$info){
            $db = getDatabaseConnection();
            $stmt = $db->prepare("UPDATE Users SET (name, address, phoneNumber)
                                        VALUES (:name, :address, :phoneNumber)");
            $stmt->bindParam(':name' , $info['name']);
            $stmt->bindParam(':address' , $info['address']);
            $stmt->execute();
    }*/

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




}