<?php

session_start();
//same as dislikes
require_once("database.php");

//extracts user id, artical id and vote from page url
$firstsplit = explode("=",$_SERVER['QUERY_STRING'])[1];
$commentid = explode("&like",$firstsplit)[0];
$like = explode("=",$_SERVER['QUERY_STRING'])[2];
$articleid = explode("&articleid=",$_SERVER['QUERY_STRING'])[1];
$userid = $_SESSION['userid'];
$vote = 'like';

$query1 = "SELECT likes FROM comments WHERE commentid = :commentid";
                                           
$statement1 = $db->prepare($query1); 
$statement1->bindValue(":commentid", $commentid);
$statement1->execute(); 
$likes = $statement1->fetch(); 
$statement1->closeCursor(); 

$likeVotes = $likes['likes'] + 1;

$query2 = "UPDATE comments SET likes = :likes WHERE commentid = :commentid";
                                           
$statement2 = $db->prepare($query2); 
$statement2->bindValue(":commentid", $commentid);
$statement2->bindValue(":likes", $likeVotes);
$statement2->execute(); 
$statement2->closeCursor(); 

$query3 = "INSERT INTO votedcomment(userid,commentid,vote) VALUES(:userid, :commentid, :like)";
                                           
$statement3 = $db->prepare($query3); 
$statement3->bindValue(":userid", $userid);
$statement3->bindValue(":commentid", $commentid);
$statement3->bindValue(":like", $vote);
$statement3->execute(); 
$statement3->closeCursor(); 


header('location: ..\fullArticle.php?id='.$articleid);
