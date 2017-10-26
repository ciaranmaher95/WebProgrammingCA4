<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'database.php';

//gets id of artical to be deleted
$articleid = $_POST['id']; 

//displays options for user
$message = "<h3>Are you sure</h3>";
$yes = "<button id='yes'>YES</button>";
$no = "<button id='no'>NO</button>";
echo $message . $yes . ' ' . $no;

echo '<script src="https://code.jquery.com/jquery-3.2.0.min.js"></script>';
echo '<script> $("#no").on("click", function(){window.location="../fullArticle.php?id='.$articleid.'"});</script>';

echo '<script> $("#yes").on("click", function(){window.location = "deleteArticle.php?id='.$articleid.'"}); </script>';