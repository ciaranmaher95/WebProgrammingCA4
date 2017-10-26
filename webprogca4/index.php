<?php

//starts initial session with userid as null and redirects to home page

session_start();

$_SESSION['userid'] = null;

header('location: home.php');