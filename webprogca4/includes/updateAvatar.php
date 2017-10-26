<?php

session_start();

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

require_once("database.php");

//gets current user with session user id 
$userid = $_SESSION['userid'];

$file_location = $_FILES['fileUpload']['tmp_name'];
$file_data = file_get_contents($file_location);
$avatar = base64_encode($file_data);

//updates avatar is user table and in comments table

$query1 = "UPDATE users SET avatar = :avatar WHERE userid = :id";
$statement1 = $db->prepare($query1);
$statement1->bindValue(":id", $userid);
$statement1->bindValue(":avatar", $avatar);
try {
    $statement1->execute();
} catch (Exception $ex) {
    header("Location: ../view/error.php?msg=" . $ex->getMessage());
    exit();
}
$statement1->closeCursor();

$query2 = "UPDATE comments SET useravatar = :avatar WHERE userid = :id";
$statement2 = $db->prepare($query2);
$statement2->bindValue(":id", $userid);
$statement2->bindValue(":avatar", $avatar);
try {
    $statement2->execute();
} catch (Exception $ex) {
    header("Location: ../view/error.php?msg=" . $ex->getMessage());
    exit();
}
$statement2->closeCursor();

header('location:../home.php');
