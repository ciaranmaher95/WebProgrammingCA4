<?php
session_start();

$date = date('d-M-y h:i');

include "includes/database.php";

$id = $_GET['id'];

//Queries to retrieve all article data, usercdata and comment data for the chosen article 

$query = "SELECT * FROM article where id=:id";
$statement = $db->prepare($query);
$statement->bindValue(":id", $id);
try {
$statement->execute();
} catch (Exception $ex) {
header("Location: ../view/error.php?msg=" . $ex->getMessage());
exit();
}
$articles = $statement->fetchAll();
$statement->closeCursor();

$query2 = "SELECT * FROM comments WHERE articleid=:id";
$statement2 = $db->prepare($query2);
$statement2->bindValue(":id", $id);
try {
$statement2->execute();
} catch (Exception $ex) {
header("Location: ../view/error.php?msg=" . $ex->getMessage());
exit();
}
$comments = $statement2->fetchAll();
$statement2->closeCursor();

$query3 = "SELECT * FROM users WHERE userid=:userid";
$statement3 = $db->prepare($query3);
$statement3->bindValue(":userid", $_SESSION['userid']);
try {
$statement3->execute();
} catch (Exception $ex) {
header("Location: ../view/error.php?msg=" . $ex->getMessage());
exit();
}
$users = $statement3->fetchAll();
$statement3->closeCursor();

$query4 = "SELECT commentid FROM votedcomment WHERE userid = :userid";
$statement4 = $db->prepare($query4);
$statement4->bindValue(":userid", $_SESSION['userid']);
try {
$statement4->execute();
} catch (Exception $ex) {
header("Location: ../view/error.php?msg=" . $ex->getMessage());
exit();
}
$voted = $statement4->fetchAll();
$statement4->closeCursor();
$ids = array();
for($i=0;$i<count($voted);$i++)
{
    array_push($ids,$voted[$i]['commentid']);
}

if($_SESSION['userid'] != null)
{
require_once "includes/headersignedin.php";
}
else
{
require_once "includes/header.php";
}
?>
<html>
    <head>
        <link href="css/images.css" rel="stylesheet" type="text/css"/>
        <script src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
        <script src="js/addUser.js" type="text/javascript"></script>
        <script src="js/addCommet.js" type="text/javascript"></script>
        <script src="js/voteComment.js" type="text/javascript"></script>
    </head>
    <div id="content" class="site-content container">
        <div class="container main-content-area">
            <div class="row pull-left">
                <div id="primary" class="content-area col-sm-12 col-md-8">
                    <main id="main" class="site-main" role="main">
<?php foreach($articles as $article): ?>

                        <article id="post-1241" class="post-1241 post type-post status-publish format-standard has-post-thumbnail sticky hentry category-uncategorized tag-sticky-2 tag-template">
                            <header class="entry-header page-header">

                                <h1 class="entry-title"><?php echo $article['title'] ?></h1>
                                <img id="headerimage" src="data:image/jpeg;base64,<?php echo $article['headerimage'] ?>"/>
                                <div class="entry-meta">
                                    <span class="posted-on"><i class="fa fa-calendar"></i><?php echo $article['date'] ?></span><span class="byline"> <i class="fa fa-user"></i> <span class="author vcard"></span></span>
                                    <span class="cat-links"><i class="fa fa-folder-open-o"></i>
<?php echo $article['category'] ?></span>
                                    <span class="cat-links"><i class="fa fa-user"></i>
<?php echo $article['username'] ?></span>
                                </div>
                                <!-- .entry-meta -->

                                <!-- .entry-header -->

                                <div class="entry-content">
                                    <div class="col-sm-6">
                                        <p><?php echo $article['text'] ?></p>
                                    </div>


                                </div>

                                <!-- .entry-content -->

                                <hr class="section-divider">
                                <p><?php
                                    $tags = explode(" ", $article["tags"]);
                                    foreach($tags as $tag):
                                    echo $tag . "&nbsp;&nbsp;&nbsp;";
                                    endforeach;
                                    ?></p>
                                <hr class="section-divider">



                                <div class="nav-previous"> <a href="home.php"><i class="fa fa-chevron-left"></i>Return</a>
                                </div>
                            </header>
                        </article>

                        <?php endforeach; ?>
                        <?php if($article['comments'] == 'YES'):
                        if($_SESSION['userid'] == null)
                        { ?>
                            <h4>Log in to Write a Comment</h4>
                            
               <?php    } 
                        else 
                        { ?>
                            <h4>Write a Comment:</h4>
                  <?php 
                        
                            foreach($users as $user):
                            echo $user['username'];
                        
                        ?>
                        <form action="includes/addComment.php" id="commentForm" method="post" enctype='multipart/form-data' >
                            <input type="hidden" name="userid" value="<?php echo $user['userid'] ?>">
                            <input type="hidden" name="username" value="<?php echo $user['username'] ?>">
                            <?php endforeach; ?>
                            <input type="hidden" name="articleid" value="<?php echo $article['id']; ?>">
                            <input type="hidden" name="date" value="<?php echo htmlentities($date); ?>">
                            <textarea name="comment" id="comment" rows="3" cols="10"></textarea> 

                            <input type="submit" id="sumbitcomment" name="sumbit" value="Post"  class="btn btn-default read-more">
                        </form>
                        <hr class="section-divider">
                        <?php } ?>
                        <div id="newestComment"></div>
                        <hr class="section-divider">
                        <?php foreach($comments as $comment): ?>
                        <input id="commentid" type="hidden" value="<?php echo $comment['commentid'] ?>">
                        <img id="avatar" src="data:image/jpeg;base64,<?php echo $comment['useravatar'] ?>"/>
                        <?php
                        echo $comment['username']."<br>";
                        echo $comment['comment'];
                        ?>
                        <div> 
                         <?php if(in_array($comment['commentid'], $ids) || $comment['userid']==$_SESSION['userid'] || $_SESSION['userid']==null)
                         { ?>
                             <button class = "btn btn-success" >
                              <i class = "fa fa-thumbs-up"></i></button>
                              <?php echo $comment['likes']; ?>
                            
                            <button class = "btn btn-danger" >
                            <i class = "fa fa-thumbs-down"></i></button>
                            <?php echo $comment['dislikes'];
                         }
                         else
                         { ?>
                                <a class="btn btn-success" href="includes/like.php?commentid=<?php echo $comment['commentid'] ?>&like=1&articleid=<?php echo $comment['articleid'] ?>">
                                <i class="fa fa-thumbs-up"></i></a>
                                <?php echo $comment['likes']; ?>
                            
                                <a class="btn btn-danger" href="includes/dislike.php?commentid=<?php echo $comment['commentid'] ?>&dislike=1&articleid=<?php echo $comment['articleid'] ?>">
                                <i class="fa fa-thumbs-down"></i></a>
                                <?php echo $comment['dislikes']; 
                            
                        }  

                           
                            ?> 
                            
                        </div>
                        <hr class="section-divider">
                        <?php endforeach;

                        else:
                        ?>
                        <h3>Comments Disabled</h3>
                        <?php endif;

                        if($_SESSION['userid'] == $article['userid']):
                        ?>

                        <p>Enable Comments</p>
                        <form action="includes/commentStatus.php" method="post">
                            <select name="comments" style="width:100px">
                                <option></option>     
                                <option>YES</option>
                                <option>NO</option>
                            </select>
                            <input type="hidden" name="id" value="<?php echo $article['id'] ?>">
                            <input type="submit" value="update">
                        </form>
                        <p>Delete Article</p>
                        <form action="includes/confirmation.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $article['id'] ?>">
                            <input type="submit" value="Delete">
                        </form>

                        <?php endif; ?>


                    </main>
                    <!-- #main -->
                </div>
                <!-- #primary -->

                <div id="secondary" class="widget-area col-sm-12 col-md-4" role="complementary">
                    <aside id="search-2" class="widget widget_search">
                        <form method="get" class="form-search" action="https://colorlib.com/dazzling/">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="screen-reader-text">Search for:</span>
                                    <input type="text" class="form-control search-query" placeholder="Search..." value="" name="s">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default" name="submit" id="searchsubmit" value="Search"><span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </aside>

                </div>
            </div>
        </div>
    </div>



</html>

<?php
include "includes/footer.php";