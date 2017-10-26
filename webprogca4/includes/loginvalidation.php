<?php
include 'database.php';

session_start();
//gets username and password from log in form and searches for them in the database

    $memberUsername = filter_input(INPUT_POST, 'memberUsername');
    $memberPassword = filter_input(INPUT_POST, 'memberPassword');
    $memberPassword_hash = md5($memberPassword);
    
    $boolean = false; 

    $memberUsername = strtolower($memberUsername);
    $query = "SELECT * FROM users
		WHERE (LOWER(username) = :username 
		OR LOWER(email) = :email)
		AND password = :password";


    $statement = $db->prepare($query);
    $statement->bindValue(":username", $memberUsername);
    $statement->bindValue(":email", $memberUsername);
    $statement->bindValue(":password", $memberPassword_hash);
    try {
        $statement->execute();
            
    } catch (Exception $ex) {
       echo $ex;
        exit();
    }

    $members = $statement->fetch();
    $statement->closeCursor();
    
    //sets values of session variable with current user data
    
    $_SESSION['userid'] = $members['userid'];
    $_SESSION['name'] = $members['name'];
    $_SESSION['dob'] = $members['dob'];
    $_SESSION['email'] = $members['email'];
    $_SESSION['username'] = $members['username'];
    $_SESSION['password'] = $members['password'];
    $_SESSION['avatar'] = $members['avatar'];
    
   header('location: ../home.php');