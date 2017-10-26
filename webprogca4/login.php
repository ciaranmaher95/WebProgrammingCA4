<html>
    <head>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>    
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<link href="css/signup.css" rel="stylesheet" type="text/css"/>
<link href="css/images.css" rel="stylesheet" type="text/css"/>
    </head>
<body>
    
   
<?php 

 session_start();

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
                    <h1>Log In</h1>
                    
                </div>
            </div>
<div class="wrapper">
    <form action="includes/loginvalidation.php" method="post" id="loginform" class="ccform" >
        
        <div class="ccfield-prepend">
            <span class="ccform-addon"><i id='firsticon' class="fa fa-user fa-2x"></i></span>
            <input id="memberUsername" name="memberUsername" class="ccformfield" type="text" placeholder="Username" required>
        </div>
        <div class="ccfield-prepend">
            <span class="ccform-addon"><i class="fa fa-star fa-2x"></i></span>
            <input id="memberPassword" name="memberPassword" class="ccformfield" type="password" placeholder="Password" required>
        </div>
        <div class="ccfield-prepend">
            <input class="ccbtn" type="submit" name="submit" id="submit" value="Login">
        </div>
    </form>
</div>   
 <?php include 'includes/footer.php' ?>
    
    
    <script src="js/formValidation.js" type="text/javascript"></script>

</body>
</html>