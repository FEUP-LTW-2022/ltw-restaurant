<?php


function getDatabaseConnection(): PDO
{
    $db = new PDO('sqlite:' . __DIR__ . '/database.db');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $db;
}

class account{

    public static function login($email,$password){
        $db = getDatabaseConnection();
        $stmt = $db->prepare("SELECT password,id FROM users WHERE email=:email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $value = $stmt->fetch(PDO::FETCH_ASSOC);
        if (security::checkPassword($value["password"],$password)){
            $aa = security::generateToken();
            setcookie("token", $aa ,time()+60*60*24*30);
            setcookie("email", $email,time()+60*60*24*30);
            $_SESSION["token"] = $_COOKIE["token"]; 
            error_log("session ".$_SESSION["token"]);
            error_log("token ".$_COOKIE["token"]);


            $stmt = $db->prepare("INSERT INTO user_login_token VALUES (:token,:id)");
            $stmt->bindParam(":token",$_COOKIE["token"]);
            $stmt->bindParam(":id",$value["id"]);
            $stmt->execute();
            error_log("session ".$_SESSION["token"]);
            error_log("cookie is ".$_COOKIE["token"]);
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
        error_log("cookie is ".$_COOKIE["token"]);
        error_log("cookie is ".$_COOKIE["token"]);
        if (isset($_SESSION["token"]) and isset($_COOKIE["email"])){
            $stmt = getDatabaseConnection()->prepare("SELECT id FROM users WHERE email = :email");
            $stmt->bindParam(":email",$_COOKIE["email"]);
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


}

class security{
    private static $algo = '$2a';
    private static $cost = '$10';
    private static $pepper = 'eMI8MHpEByw/M4c9o7sN3d';

    public static function generateSalt($length) {
        try {
            $randomBinaryString = random_bytes($length);
        } catch (Exception $e) {
        }
        $randomEncodedString = str_replace('+', '.', base64_encode($randomBinaryString));
        return substr($randomEncodedString, 0, $length);
    }

    public static function generateHash($password) {
        if (!defined('CRYPT_BLOWFISH'))
            die('The CRYPT_BLOWFISH algorithm is required (PHP 5.3).');
        $password = hash_hmac('sha256', $password, self::$pepper);
        return crypt($password, self::$algo . self::$cost . '$' . self::generateSalt(22));
    }

    public static function checkPassword($hash, $password): bool
    {
        $salt = substr($hash, 0, 29);
        $password = hash_hmac('sha256', $password, self::$pepper);
        $new_hash = crypt($password, $salt);
        return ($hash == $new_hash);
    }

    public static function generateToken(){
        try {
            $randomBinaryString = random_bytes(22);
        } catch (Exception $e) {
        }
        $randomEncodedString = str_replace('+', '.', base64_encode($randomBinaryString));
        return substr($randomEncodedString, 0,22);
    }
}
