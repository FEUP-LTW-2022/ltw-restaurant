<?php


if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {


    try {
        $dbh = getDatabaseConnection();
        $stmt = $dbh->prepare('INSERT INTO Users (username, password)
                                        VALUES (:name, :password)');
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':password', $_POST['password']);
        $stmt->execute();
    }catch (PDOException $e){
        $_SESSION['error'] = 'email already registered';
        header('Location: register.php');
        exit();
    }

    header('Location: login.php');
    exit();
}

// Include HTML sign up form

