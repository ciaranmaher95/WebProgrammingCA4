<?php
session_start();

require_once("database.php");
require_once('../Comment.php');

//Retrieves data from comment form and stores it in variables 
    $userid = $_POST['userid'];
    $username = $_POST['username'];
    $articleid = $_POST['articleid'];
    $date = $_POST['date'];
    $commentText = $_POST['comment'];
    $useravatar = $_SESSION['avatar'];
    
    //Instansiates new Comment object
    $comment = new Comment($commentText,$date,$userid,$username); 
    
    //List of words not allowe on comment
    $prohibitedWords = ['swans','waffle','trump','kek'];
    
    //calls fucntion validate() from Comment class 
    $prohibited = $comment->validate($commentText, $prohibitedWords);
    
    //if prohibited word is found redirect back to article 
    if($prohibited == true)
    { 
      $message = 'Comment contains spam: failed to post';
      header('location:../fullArticle.php?&id='.$articleid.'&message='.$message);
      
    }
    
    else
    {
       $query = "INSERT INTO comments(userid, articleid, username, comment, date, useravatar) VALUES(:userid, :articleid, :username, :comment, :date, :useravatar)";
        $statement = $db->prepare($query);
        $statement->bindValue(":userid", $comment->userid);
        $statement->bindValue(":articleid", $articleid);
        $statement->bindValue(":username", $comment->username);
        $statement->bindValue(":comment", $comment->comment);
        $statement->bindValue(":date", $comment->date);
        $statement->bindValue(":useravatar", $useravatar);
        try {
            $statement->execute();
        } catch (Exception $ex) {
           echo $ex;
          exit();
        }
        $statement->closeCursor();
    
        $commentList = array();
        array_push($commentList, $comment);

        header('location: ../fullArticle.php?&id='.$articleid);
    }