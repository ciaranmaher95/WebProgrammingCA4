<?php
$dsn = "mysql:host=localhost;dbname=webprogramming"; 
$username = "root";
$password = "";

try
{
  $db = new PDO($dsn, $username, $password); 
  $db->setAttribute(PDO:: ATTR_EMULATE_PREPARES, false); 
  $db->setAttribute(PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION); 
    
 error_reporting(E_ALL);
  
} 
catch (Exception $ex) 
{
   $errorMessage = $ex->getMessage();
  echo $ex;
   exit();
}