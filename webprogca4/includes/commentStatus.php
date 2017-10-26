<?php

require_once("database.php");

$id =  $_POST["id"];
$commentsEnabled = $_POST["comments"];

$query = "UPDATE article SET comments = :comments WHERE id = :id";
                                           
$statement = $db->prepare($query); 
$statement->bindValue(":id", $id);
$statement->bindValue(":comments", $commentsEnabled);
 $statement->execute(); 
$statement->closeCursor(); 

header("location: ../fullArticle.php?&id=$id");
exit(); 
