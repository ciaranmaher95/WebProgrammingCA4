<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'database.php';

header('Content-Type: application/json');

$query = "SELECT * FROM users";
$statement = $db->prepare($query);
try {
$statement->execute();
} catch (Exception $ex) {
header("Location: ../view/error.php?msg=" . $ex->getMessage());
exit();
}
$users = $statement->fetchAll();
$statement->closeCursor();

//returns all user details as json encoded array
echo json_encode($users);