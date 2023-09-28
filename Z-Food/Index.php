<?php
include 'template/header.php';
include 'template/Bootstrap.php';
?>

    
 <!DOCTYPE html>
 
    <html>
    <head lang="en">
        <meta charset="UTF-8">
    
        <!--Page Title-->
        <title>Home</title>
    
        <!--Meta Keywords and Description-->
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
    
        <!--Favicon-->
        <link rel="shortcut icon" href="images/favicon.ico" title="Favicon"/>

    
        <!-- Main CSS Files -->
        <link rel="stylesheet" href="css/styleHome.css">
    
        <!-- Namari Color CSS -->
        <link rel="stylesheet" href="css/namari-color.css">
    
        <!--Icon Fonts - Font Awesome Icons-->
        <link rel="stylesheet" href="css/font-awesome.min.css">
    
        <!-- Animate CSS-->
        <link href="css/animate.css" rel="stylesheet" type="text/css">
    
        <!--Google Webfonts-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" rel="stylesheet" type="text/css">
    </head>
    
    <header id="banner" class="scrollto clearfix" data-enllax-ratio=".5">
        <div id="header" class="nav-collapse">
            <div class="row clearfix">
                <div class="col-1">
    
    
                </div>
            </div>
        </div><!--End of Header-->
    
        <!--Banner Content-->
        <div id="banner-content" class="row clearfix">
    
            <div class="col-38">
            <?php
 if (isset($_SESSION['user_id'])) {
                    echo  '<div><img src="img/pfp.jpg" class="circular-image" alt="Image"width="180" height="80" style ="border-radius: 50%;
                    "><h2>Hello, User </h2></div>';
                } else {
                    echo ' ';
                }?>
    
                <div class="section-heading">
                    <h1>WELCOME TO Z-FOOD</h1>
                    <h2>Z-FOOD is a free food review website you can use to share youre experience.  </h2>
                </div>
                <?php
                if (isset($_SESSION['user_id'])) {
                    echo  '<!--Call to Action-->
                    <a href="Comment/product.php" class="button">Explore</a>';
                } else {
                    echo '
                <!--Call to Action-->
                <a href="login.php" class="button">Log in</a>
                
                <a href="login.php" class="button">sign up</a>
                <!--End Call to Action-->
                ';}?>
            </div>
           
        </div><!--End of Row-->
    </header>"


<?php include 'template/footer.php'; ?>
