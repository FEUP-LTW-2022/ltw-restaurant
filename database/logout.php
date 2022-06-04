<?php
session_start();
include_once("connection.php");
$token = $_SESSION["token"];
$email = $_SESSION["email"];
$stmt = getDatabaseConnection()->prepare("SELECT id FROM users WHERE email=:email");
$stmt->bindParam(":email",$email);
$id = $stmt->fetch();
getDatabaseConnection()->prepare("DELETE FROM user_login_token WHERE token = ? AND userID=?")->execute(array($token,$id));

session_destroy();
header("Location: ../index.php");