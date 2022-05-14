<?php

include_once ('connection.php');


if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {


    try {
        $dbh = getDatabaseConnection();
        $stmt = $dbh->prepare('INSERT INTO Users (email, name, password,type,birthDate,phoneNumber)
                                        VALUES (:email,:name, :password,:type,:birthdate,:phoneNumber)');
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':name' , $_POST['name']);
        $stmt->bindValue(':password' ,  password::generateHash($_POST['password']));
        $stmt->bindValue(':type', 'costumer');
        $stmt->bindParam(':birthdate',$_POST['birthdate']);
        $stmt->bindParam(':phoneNumber', $_POST['phoneNumber']);
        $stmt->execute();
    }catch (PDOException $e){
        error_log($e);
        if (strpos($e->getMessage(),"UNIQUE constraint failed: users.email")) {
            $_SESSION['error'] = "email already registered";
            header('Location: ../register.php');
            exit();
        }
    }

    header('Location: ../login.php');
    exit();
}

