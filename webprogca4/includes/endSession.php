<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//returns all session variables to null on logout
session_start();

    $_SESSION['userid'] = null;
    $_SESSION['name'] = null;
    $_SESSION['dob'] = null;
    $_SESSION['email'] = null;
    $_SESSION['username'] = null;
    $_SESSION['password'] = null;
    $_SESSION['avatar'] = null;
    
   
    
    header('location: ../home.php');