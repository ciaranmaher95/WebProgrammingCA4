<?php 
 session_start();
?>

<html>
    <head>
        <title></title>
      
<link href="css/style.css" rel="stylesheet" type="text/css"/>    
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<link href="css/signup.css" rel="stylesheet" type="text/css"/>
<link href="css/images.css" rel="stylesheet" type="text/css"/>

 <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<script src="js/formSubmit.js" type="text/javascript"></script>
<script src="js/formValidation.js" type="text/javascript"></script>-->
<script src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
<script src="js/duplicates.js" type="text/javascript"></script>


</head>
    <body>
        <?php
     
if($_SESSION['userid'] != null)
    {
        require_once "includes/headersignedin.php"; 
    }
    else 
    {
        require_once "includes/header.php"; 
    }
?>
<div class="cfa">
                <div class="container">
                    <h1>Register</h1>
                    
                </div>
            </div>
      
<div  class="wrapper">
    <form action="includes/addusers.php" method="post" class="ccform" id="signupForm" enctype='multipart/form-data'>
       
    <div class="ccfield-prepend">
        <span class="ccform-addon"><i id='firsticon' class="fa fa-user fa-2x"></i></span>
        <input name="name" id ="fname" class="ccformfield" type="text" placeholder="Full Name" required>
    </div>
    <div class="ccfield-prepend">
        <span class="ccform-addon"><i class="fa fa-envelope fa-2x"></i></span>
        <input name="email" id ="email" class="ccformfield" type="text" placeholder="Email">
    </div> 
     <div class="ccfield-prepend">
        <span class="ccform-addon"><i class="fa fa-user fa-2x"></i></span>
        <input name="username" id ="username" class="ccformfield" type="text" placeholder="Username" required>
    </div>
         <div class="ccfield-prepend">
        <span class="ccform-addon"><i class="fa fa-star fa-2x"></i></span>
        <input name="password" id ="password"  class="ccformfield" type="password" placeholder="Password: At Least Six Characters " required>
    </div>
        <div class="ccfield-prepend">
        <span class="ccform-addon"><i class="fa fa-calendar fa-2x"></i></span>
        <input name="date" id ="dob" class="ccformfield" type="date" required>
    </div>
        <h3> Add a profile Picture</h3><input type="file" name="fileUpload" accept="image/*"/>
    
    <div class="ccfield-prepend">
        <input class="ccbtn" type="submit" id="signup" value="Submit">
    </div>
    </form>
    
</div>


<?php include 'includes/footer.php' ?>


    </body>
</html>