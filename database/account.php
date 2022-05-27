<?php

include_once ("password.php");

class account{

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
        error_log("session is ".$_SESSION["token"]);
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
            $stmt = $db->prepare("INSERT INTO Users (email, name, password,type,birthDate,phoneNumber)
                                        VALUES (:email,:name,:password,:type,:birthdate,:phoneNumber)");
            $stmt->bindParam(':email', $info['email']);
            $stmt->bindParam(':name' , $info['name']);
            $stmt->bindValue(':password' ,  security::generateHash($info['password']));
            $stmt->bindValue(':type', 'costumer');
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

    public static function getUsername(){
        $stmt = getDatabaseConnection()->prepare("SELECT name FROM users WHERE email=:email");
        $stmt->bindParam(":email",$_SESSION["email"]);
        $stmt->execute();
        return $stmt->fetch()["name"];
    }



}