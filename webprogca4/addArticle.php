<?php 

session_start();



$date = date('d-M-y h:i');

//dsiplay different header depending on whether of not someone is signed in

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
        <title></title>
        <link href="css/images.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
<div id="content" class="site-content container">
    <div class="container main-content-area">
        <div class="row pull-left">
            <div id="primary" class="content-area col-sm-12 col-md-8">
                <main id="main" class="site-main" role="main">
                    <article id="post-1241" class="post-1241 post type-post status-publish format-standard has-post-thumbnail sticky hentry category-uncategorized tag-sticky-2 tag-template">
                        <header class="entry-header page-header">
                            <form id="articleForm" action="includes/addArticle.php" method="post" enctype='multipart/form-data' >
                            <h1 class="entry-title"><input type="text" name="title" placeholder="Title" required></h1>
                             <h3>Add Header Image</h3><input type="file" name="headerimage" accept="image/*">
                            <input type="hidden" name="date" value="<?php echo htmlentities($date); ?>">
                            <div class="entry-meta">
                                <span class="posted-on"><i class="fa fa-calendar"></i><?php echo $date ?></span><span class="byline"> <i class="fa fa-user"></i> <span class="author vcard"></span></span>
                                <span class="cat-links"><i class="fa fa-folder-open-o"></i>
                                    <select name="category">
                                        <option>Category</option>
                                        <option>World News</option>
                                        <option>Local News</option>
                                        <option>Politics</option>
                                        <option>Technology</option>
                                        <option>Sport</option>
                                        <option>Entertainment</option>
                                      
                                    </select>
                                </span>
                            </div>
                            <!-- .entry-meta -->
                        
                        <!-- .entry-header -->

                        <div class="entry-content">
                            <a href="https://colorlib.com/dazzling/template-sticky/" title="Template: Sticky">
                            </a>
                            <div class="col-sm-6">
                                <p><textarea name="text" rows="10" style="width:500px"></textarea></p>
                                <p>Add Tags</p>
                                <textarea name="tags" rows="3" style="width:200px;"></textarea>

                                <p>Enable Comments</p>
                                <select name="comments" style="width:100px">
                               <option></option>     
                             <option>YES</option>
                             <option>NO</option>
                             </select>
                                
                            </div>
                            
                            
                        </div>
                        <p><input type="submit" value="Submit" class="btn btn-default read-more"></p>
                        </form>
                        <!-- .entry-content -->

                        <hr class="section-divider">
                        </header>
                    </article>
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
        
       <!-- <script src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
       <script src="js/formSubmit.js" type="text/javascript"></script> -->
    
</body>
</html>
<?php
include "includes/footer.php";