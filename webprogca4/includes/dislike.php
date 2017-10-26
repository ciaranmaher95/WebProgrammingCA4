<?php

session_start();

require_once("database.php");

//extracts user id, artical id and vote from page url
$firstsplit = explode("=",$_SERVER['QUERY_STRING'])[1];
$commentid = explode("&dislike",$firstsplit)[0];
$dislike = explode("=",$_SERVER['QUERY_STRING'])[2];
$articleid = explode("&articleid=",$_SERVER['QUERY_STRING'])[1];
$userid = $_SESSION['userid'];
$vote = 'dislike';

//gets number of dislike for relevent comment
$query1 = "SELECT dislikes FROM comments WHERE commentid = :commentid";
                                           
$statement1 = $db->prepare($query1); 
$statement1->bindValue(":commentid", $commentid);
$statement1->execute(); 
$dislikes = $statement1->fetch(); 
$statement1->closeCursor(); 

//adds the new dislike vote to the current total 
$dislikeVotes = $dislikes['dislikes'] + $dislike;

//updates number of dislikes
$query2 = "UPDATE comments SET dislikes = :likes WHERE commentid = :commentid";
                                           
$statement2 = $db->prepare($query2); 
$statement2->bindValue(":commentid", $commentid);
$statement2->bindValue(":likes", $dislikeVotes);
$statement2->execute(); 
$statement2->closeCursor();

//Keeps track of which comments a particular user has already voted on
$query3 = "INSERT INTO votedcomment(userid,commentid,vote) VALUES(:userid, :commentid, :dislike)";
                                           
$statement3 = $db->prepare($query3); 
$statement3->bindValue(":userid", $userid);
$statement3->bindValue(":commentid", $commentid);
$statement3->bindValue(":dislike", $vote);
$statement3->execute(); 
$statement3->closeCursor();


header('location: ..\fullArticle.php?id='.$articleid);

