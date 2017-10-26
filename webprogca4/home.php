<?php 

//header("Access-Control-Allow-Origin: *");
ini_set("allow_url_include", "on");
require_once("includes/database.php");

session_start();

    $query = "SELECT * FROM article";
    $statement = $db->prepare($query);
   try {
        $statement->execute();
    } catch (Exception $ex) {
        header("Location: ../view/error.php?msg=" . $ex->getMessage());
        exit();
    }
    $articles = $statement->fetchAll();
    $statement->closeCursor();
    
    if(isset($_SESSION))
    {
        if($_SESSION['userid'] != null)
        {
            require_once "includes/headersignedin.php"; 
        }
        else 
        {
            require_once "includes/header.php"; 
        }
    }
?>
<html>
    <head>
        <title></title>
        <link href="css/images.css" rel="stylesheet" type="text/css"/>
        <script src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
        <script src="js/search.js" type="text/javascript"></script>
    </head>
<div id="content" class="site-content container">
    <div class="container main-content-area">
        <div class="row pull-left">
            <div id="primary" class="content-area col-sm-12 col-md-8">
                <main id="main" class="site-main" role="main">
                   <?php foreach($articles as $article): ?>  
                    <article id="post-1241" class="post-1241 post type-post status-publish format-standard has-post-thumbnail sticky hentry category-uncategorized tag-sticky-2 tag-template">
                        <header class="entry-header page-header">
                            <h1 class="entry-title"><?php echo $article['title']?></h1>
                           
                            <div class="entry-meta">
                                <span class="posted-on"><i class="fa fa-calendar"></i><?php echo $article['date'] ?></span><span class="byline"> <i class="fa fa-user"></i> <span class="author vcard"></span></span>
                                <span class="cat-links"><i class="fa fa-folder-open-o"></i>
                                    <?php echo $article['category'] ?></span>
                                <span class="cat-links"><i class="fa fa-user"></i>
                                    <?php echo $article['username'] ?></span>
                            </div>
                            <!-- .entry-meta -->
                        </header>
                        <!-- .entry-header -->

                        <div class="entry-content">
                            <a href="https://colorlib.com/dazzling/template-sticky/" title="Template: Sticky">
                            </a>
                            <div class="col-sm-6">

                                <p><?php echo $article['displaytext'] .'...' ?></p>
                                <br>
                            <p><?php $tags = explode(" ", $article["tags"]);
                                    foreach($tags as $tag):
                                    echo $tag . "&nbsp;&nbsp;&nbsp;";
                                    endforeach; ?></p>
                            </div>
                            
                            <p><a class="btn btn-default read-more" href="fullArticle.php?&id=<?php echo $article['id']?>">Continue reading <i class="fa fa-chevron-right"></i></a>
                            
                        </div>
                           
                        
                        <!-- .entry-content -->

                        <hr class="section-divider">
                        
                    </article>
                    <?php endforeach;
                    
                    
                    if($_SESSION['userid'])
                    {?>
                        <a href="addArticle.php">Add Article</a>
              <?php }
                    else
                    { ?>
                        <p>Register or Log In to write an Article</p>
           <?php    }
                    
                    ?>
                    
                    
                    
                    <!-- #post-## -->
                    <!-- #post-## -->
                    <!-- #post-## -->



                    <!-- .navigation -->


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
                                <input type="text" class="form-control search-query" placeholder="Search..." value="" name="s" onkeyup="filter(this)">
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
</div>
</html>
<?php
include "includes/footer.php";