<html>
    <head>
        <title></title>
        
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
                    
                    
                </div>
            </div>
      
<div  class="wrapper">
    <form class="ccform" id="updateForm" action="includes/updateAvatar.php" method="post" enctype='multipart/form-data'>
       
    <h3> Update profile Picture</h3><input type="file" name="fileUpload" accept="image/*"/>
    
    <div class="ccfield-prepend">
         <p>Your Avatar will update when you next log in</p>
        <input class="ccbtn" type="submit" id="submit" value="Submit">
    </div>
   
    </form>
    
</div>

<?php include 'includes/footer.php' ?>


    </body>
</html>