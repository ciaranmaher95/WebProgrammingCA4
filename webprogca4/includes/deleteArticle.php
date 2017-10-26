<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'database.php';

//extracts artical id from page url
$articleid = str_split($_SERVER['QUERY_STRING'],3)[1];

$query1 = "DELETE FROM article WHERE id = :id";
$statement1 = $db->prepare($query1);
$statement1->bindValue(":id", $articleid);
$statement1->execute();
$statement1->closeCursor();

$query2 = "DELETE FROM comments WHERE articleid = :id";
$statement2 = $db->prepare($query2);
$statement2->bindValue(":id", $articleid);
$statement2->execute();
$statement2->closeCursor();


header('location: ../home.php');