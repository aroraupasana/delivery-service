
  <?php

    session_start();
    
    
    // if session is not set this will redirect to login page
   if( !isset($_SESSION['user']) ) {
        
        //header("Location: index.php");
        include("index.php");
        echo "<script type='text/javascript'>alert(\"Please Login \")</script>";
        exit;
    }
    ?>
    <?php                     // php code for registering a new user(signup)

  error_reporting( ~E_DEPRECATED & ~E_NOTICE );
  // but I strongly suggest you to use PDO or MySQLi.
  
  define('DBHOST', 'localhost');
  define('DBUSER', 'root');
  define('DBPASS', '');
  define('DBNAME', 'sign_up_delivery');
  
  $conn = mysql_connect(DBHOST,DBUSER,DBPASS);
  $dbcon = mysql_select_db(DBNAME);
  
  if ( !$conn ) {
    die("Connection failed : " . mysql_error());
  }
  
  if ( !$dbcon ) {
    die("Database Connection failed : " . mysql_error());
  }
  session_start();
    if( isset($_SESSION['user']) ) {
        session_start();
        // select loggedin users detail
        $res = mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
        $userRow = mysql_fetch_array($res);
    }
    
    

  ?>
<!DOCTYPE html>
<html>
   
<!-- Mirrored from event-theme.com/themes/GO-Courier/tracking.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Mar 2017 08:46:06 GMT -->
<head>
        <title>Tracking / GO Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="icon" href="assets/img/logo/delivery_logo.png">

        <!-- Bootstrap Css -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-3.3.6/css/bootstrap.min.css">        
        <!-- Bootstrap Select Css -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-select-1.10.0/dist/css/bootstrap-select.min.css">
        <!-- Fonts Css -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/font-awesome-4.6.1/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/plugins/font-elegant/elegant.css">
        <!-- OwlCarousel2 Slider Css -->
        <link rel="stylesheet" type="text/css" href="assets/plugins/owl.carousel.2/assets/owl.carousel.css">


        <!-- Animate Css --> 
        <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">      
        <link rel="stylesheet" type="text/css" href="assets/css/animate.css">

        <!-- Main Css -->
        <link rel="stylesheet" type="text/css" href="assets/css/theme.css">

     
        <!--[if lt IE 9]>
        <script src="assets/plugins/iesupport/html5shiv.js"></script>
        <script src="assets/plugins/iesupport/respond.js"></script>
        <![endif]-->
    </head>
    <body id="home">

        <!-- Main Wrapper -->        
        <main class="wrapper">

            <!-- Header -->
            <header class="header-main">

                <!-- Header Topbar -->
                <div class="top-bar font2-title1 white-clr">
                    <div class="theme-container container">
                        <div class="row">
                          <!--  <div class="col-md-6 col-sm-5">
                                <ul class="list-items fs-10">
                                    <li><a href="#">sitemap</a></li>
                                    <li class="active"><a href="#">Privacy</a></li>
                                    <li><a href="#">Pricing</a></li>
                                </ul>
                            </div>-->
                            <div class="col-md-6 col-sm-7 fs-12">
                                <p class="contact-num">  <i class="fa fa-phone"></i> Call us now: <span class="theme-clr"> +91-7405896231 </span> </p>
                            </div>
                        </div>
                    </div>
                    <?php 
                
                    if(isset($_SESSION['user'])){ ?>

  <a href="logout.php?logout" class="sign-in fs-12 theme-clr-bg" style="padding-left: 2%; padding-right: 2%;">logout<span>  (<?php echo $userRow['userName']  ?>)</span></a>
<?php }else{ ?>
  <a data-toggle="modal" href="#login-popup" class="sign-in fs-12 theme-clr-bg"> sign in </a>
<?php } ?>


                 <!--   <a data-toggle="modal" href="#login-popup" class="sign-in fs-12 theme-clr-bg"> sign in </a>-->
                </div>
                <!-- /.Header Topbar -->

                <!-- Header Logo & Navigation -->
                 <nav class="menu-bar font2-title1">
                    <div class="theme-container container">
                        <div class="row">
                            <div class="col-md-2 col-sm-2">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-controls="navbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <!--<a class="navbar-logo" href="#"> <img src="assets/img/logo/logo-black.png" alt="logo" /> </a>-->
                                <a class="navbar-logo" href="#"> <img src="assets/img/logo/delivery_logo.png" style=" height:60px; width:150px;"alt="logo" /> </a>
                            </div>
                            <div class="col-md-10 col-sm-10 fs-12">
                                <div id="navbar" class="collapse navbar-collapse no-pad">
                                    <ul class="navbar-nav theme-menu">
                                        <li>
                                            <a href="index.php#home"   >Home </a>
                                                                                      <!--  <ul class="dropdown-menu"                                                <li><a href="index-2.html">Home Page1</a></li>
                                                <li><a href="index-3.html">Home Page2</a></li>
                                                <li><a href="index-4.html">Home Page3</a></li>

                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" >Submenu Level 1 </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#">Submenu</a></li>
                                                        <li><a href="#">Submenu</a></li>
                                                        <li class="dropdown">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" >Submenu Level 2</a>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="#">Submenu</a></li>
                                                                <li><a href="#">Submenu</a></li>
                                                                <li><a href="#">Submenu</a></li>                                    
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul> -->
                                        </li>
                                        <li> <a href="index.php#about">about</a> </li>
                                        <li> <a href="index.php#location"> Location </a> </li>
                                        <li> <a href="index.php#calculate"> Calculate </a> </li>
                                       <li> <a href="index.php#price" >Price</a></li>
                                        <li> <a href="index.php#contact"> contact </a> </li>
                                         <li> <a href="#">  </a> </li>
                                          <!--  <ul class="dropdown-menu">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="blog-left.html">Blog Left</a></li>
                                                <li><a href="single-blog.html">Single Post</a></li>                                    
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" >pages </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="get-quote.html"> Quote Page </a></li>
                                                <li><a href="contact-us-2.html"> Contact-2 Page </a></li>
                                                <li><a href="404.html"> Error Page </a></li> 
                                                <li><a href="coming-soon.html"> Coming Soon Page </a></li>
                                            </ul>
                                        </li>  -->
                                       <!-- <li><span class="search fa fa-search theme-clr transition"> </span></li> -->
                                    </ul>                                                      
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- /.Header Logo & Navigation -->

            </header>
            <!-- /.Header -->

            <!-- Content Wrapper -->
            <article> 
                <!-- Breadcrumb -->
                <section class="theme-breadcrumb pad-50">                
                    <div class="theme-container container ">  
                        <div class="row">
                            <div class="col-sm-8 pull-left">
                                <div class="title-wrap">
                                    <h2 class="section-title no-margin"> product tracking </h2>
                                    <p class="fs-16 no-margin"> Track your product & see the current condition </p>
                                </div>
                            </div>
                            <div class="col-sm-4">                        
                                <ol class="breadcrumb-menubar list-inline">
                                    <li><a href="index.php" class="gray-clr">Home</a></li>                                   
                                    <li class="active">Track</li>
                                </ol>
                            </div>  
                        </div>
                    </div>
                </section>
                <!-- /.Breadcrumb -->
                 
                <!-- Tracking -->
                <section class="pt-10 pb-10 tracking-wrap">    
                    <div class="theme-container container ">  
                        <div class="row ">
                            <div class="col-md-8 col-md-offset-2 tracking-form wow fadeInUp" data-wow-offset="50" data-wow-delay=".30s">     
                                <h2 class="title-1"> track your product </h2> <span class="font2-light fs-12">Now you can track your product easily</span>
                                <div class="row">
                                    <form class=""  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                                        <div class="col-md-7 col-sm-7">
                                            <div class="form-group">
                                                <input type="text" placeholder="Enter your product ID" required name="track" class="form-control box-shadow">
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-sm-5">
                                            <div class="form-group">
                                                <button class="btn-1" name="track_form">track your product</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>    
                        </div>

        <?php
     //   session_start();
    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "delivery";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
            if ( isset($_POST['track_form']) ) {
      //  echo "if";
        
        // clean user inputs to prevent sql injections
        $tr = trim($_POST['track']);
        
            $result = mysqli_query($conn,"SELECT * FROM users WHERE userId = '$tr' ");      // userTank_Name selected
      /*      if( $result ){
                if ($result->num_rows >= 0) {
                    // output data of each row
                    $num = mysqli_num_rows($result);
                    $i=0;
                    while ($i < $num){  
                         echo "id :{$row['userId']} <br>" .
                            "height : {$row['userheight']} <br>" . 
                            "width : {$row['userwidth']} <br><br>";
                                                           // loop for printing names
                        echo " userid: " . mysql_result($result,$i,"userheight"). "<br>";
                        $i++;
                    }
                } else {                                                   // when 0 teams registered
                    echo "0 results";
                 }
               // echo $row[userId]."  ".$row[userheight];
            } 
         
        else {
            echo "error";
        }*/
        
        while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
        {
            ?>
        
    

                   <!--     <div class="row">
                            <div class="col-md-7 pad-30 wow fadeInLeft" data-wow-offset="50" data-wow-delay=".30s"> 
                                <img alt="" src="assets/img/block/product-1.jpg" />
                            </div>
                            <div class="col-md-5 pad-30 wow fadeInRight" data-wow-offset="50" data-wow-delay=".30s"> 
                                <div class="prod-info white-clr">
                                    <ul>
                                        <li> <span class="title-2">Product Name:</span> <span class="fs-16">iPhone 6 Boxed</span> </li>
                                        <li> <span class="title-2">Product id:</span> <span class="fs-16">9034215</span> </li>
                                        <li> <span class="title-2">order date:</span> <span class="fs-16">21st Feb, 2016</span> </li>
                                        <li> <span class="title-2">order status:</span> <span class="fs-16 theme-clr">On Process</span> </li>
                                        <li> <span class="title-2">weight (kg):</span> <span class="fs-16"><?php  ?>KG</span> </li>
                                        <li> <span class="title-2">order type:</span> <span class="fs-16">Basic ($50)</span> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>-->

                         <div class="row">
                            <div class="col-md-7 pad-30 wow fadeInLeft" data-wow-offset="50" data-wow-delay=".30s"> 
                                <img alt="" src="assets/img/block/product-1.jpg" />
                            </div>
                            <div class="col-md-5 pad-10 wow fadeInRight" data-wow-offset="50" data-wow-delay=".30s"> 
                                <div class="prod-info white-clr">
                                    <ul>
                                        <!-- <li> <span class="title-2">Product Name:</span> <span class="fs-16">iPhone 6 Boxed</span> </li> -->
                                        <li> <span class="title-2">Product id:</span> <span class="fs-16"><?php echo "{$row['userId']} "?></span> </li>
                                       <!--  <li> <span class="title-2">order date:</span> <span class="fs-16">21st Feb, 2016</span> </li> -->
                                        <li> <span class="title-2">order status:</span> <span class="fs-16 theme-clr">On Process</span> </li>
                                        <li> <span class="title-2">weight (kg):</span> <span class="fs-16"><?php echo "{$row['userweight']} " ?>KG</span> 
                                        <li> <span class="title-2">Height (Cm):</span> <span class="fs-16"><?php echo "{$row['userheight']} " ?>CM</span> </li>
                                        <li> <span class="title-2">length (Cm):</span> <span class="fs-16"><?php echo "{$row['userlength']} " ?>CM</span> </li>
                                        <li> <span class="title-2">width (Cm):</span> <span class="fs-16"><?php echo "{$row['userwidth']} " ?>CM</span> </li>
                                        <li> <span class="title-2">Distance (Cm):</span> <span class="fs-16"><?php echo "{$row['userdistance']} " ?>KM</span> </li>
                                        <li> <span class="title-2">Cost (Rs):</span> <span class="fs-16">Rs<?php echo "  {$row['usercost']} " ?></span> </li>
                                       <!--  <li> <span class="title-2">From:</span> <span class="fs-16"><?php echo "{$row['usersource']} " ?></span> </li>
                                        <li> <span class="title-2">To:</span> <span class="fs-16"><?php echo "{$row['userdestination']} " ?></span> </li>
                                        <li> <span class="title-2">order type:</span> <span class="fs-16"><?php echo "{$row['userpackage']} "?></span> </li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        }
                        ?>

                   <!--     <div class="progress-wrap">
                            <div class="progress-status">
                                <span class="border-left"></span>
                                <span class="border-right"></span>
                                <span class="dot dot-left wow fadeIn" data-wow-offset="50" data-wow-delay=".40s"></span>
                                <span class="themeclr-border wow fadeIn" data-wow-offset="50" data-wow-delay=".50s">  <span class="dot dot-center theme-clr-bg"></span> </span>
                                <span class="dot dot-right wow fadeIn" data-wow-offset="50" data-wow-delay=".60s"></span>
                            </div>
                            <div class="row progress-content upper-text">
                                <div class="col-md-3 col-xs-8 col-sm-2">
                                    <p class="fs-12 no-margin"> FROM </p>
                                    <h2 class="title-1 no-margin">London</h2>
                                </div>
                                <div class="col-md-2 col-xs-8 col-sm-3">
                                    <p class="fs-12 no-margin"> [ <b class="black-clr">6 DAYS </b> ] </p>                                
                                </div>
                                <div class="col-md-4 col-xs-8 col-sm-4 text-center">
                                    <p class="fs-12 no-margin"> currently in </p>
                                    <h2 class="title-1 no-margin">singapore</h2>
                                </div>
                                <div class="col-md-1 col-xs-8 col-sm-1 no-pad">
                                    <p class="fs-12 no-margin"> [ <b class="black-clr">2 DAYS </b> ] </p>                                
                                </div>
                                <div class="col-md-2 col-xs-8 col-sm-2 text-right">
                                    <p class="fs-12 no-margin"> to </p>
                                    <h2 class="title-1 no-margin">dhaka</h2>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </section>
                <!-- /.Tracking -->

            </article>
            <!-- /.Content Wrapper -->

            <!-- Footer -->
            <footer>
                <div class="footer-main pad-50 white-clr">
                    <div class="theme-container container">               
                        <div class="row">
                            <div class="col-md-5 col-sm-6 footer-widget">
                                <!--<a href="#"> <img class="logo" alt="#" src="assets/img/logo/logo-white.png" />  </a>-->
                                <a href="#"> <img class="logo" alt="logo" src="assets/img/logo/delivery_logo.png" style="width:150px; height:110px;" />  </a>
                            </div>
                            <div class="col-md-4 col-sm-6 footer-widget">
                                <h2 class="title-1 fw-900">quick links</h2>
                                <ul>
                                    <li> <a href="index.php#about">About</a> </li>
                                    <li> <a href="index.php#price">pricing</a> </li>
                                    <li> <a href="index.php#calculate">Calculate</a> </li>
                                    <li> <a href="index.php#location">Location</a> </li>
                                </ul>
                            </div>
                           <!--  <div class="col-md-3 col-sm-6 footer-widget">
                                <h2 class="title-1 fw-900"></h2>
                                <ul>
                                    <li> <a href="#"></a> </li>
                                    <li> <a href="#"><a> </li>
                                    <li> <a href="#"></a> </li>
                                    <li> <a href="#"></a> </li>
                                </ul>
                            </div> -->
                            <div class="col-md-3 col-sm-6 footer-widget">
                                <h2 class="title-1 fw-900">get in touch</h2>
                                <ul class="social-icons list-inline">
                                    <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".20s"> <a href="#" class="fa fa-facebook"></a> </li>
                                    <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".25s"> <a href="#" class="fa fa-twitter"></a> </li>
                                    <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".30s"> <a href="#" class="fa fa-google-plus"></a> </li>
                                    <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".35s"> <a href="#" class="fa fa-linkedin"></a> </li>
                                </ul>
                               <!--  <ul class="payment-icons list-inline">
                                    <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".20s"> <a href="#"> <img alt="#" src="assets/img/icons/payment-1.png" /> </a> </li>
                                    <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".25s"> <a href="#"> <img alt="#" src="assets/img/icons/payment-2.png" /> </a> </li>
                                    <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".30s"> <a href="#"> <img alt="#" src="assets/img/icons/payment-3.png" /> </a> </li>
                                    <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".35s"> <a href="#"> <img alt="#" src="assets/img/icons/payment-4.png" /> </a> </li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-bottom">
                    <div class="theme-container container">               
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <p> © Copyright 2017, All rights reserved </p>                            
                            </div>
                            <div class="col-md-6 col-sm-6 text-right">
                                <p> Design with <span class="theme-clr fa fa-heart"></span>  by <a href="#" class="main-clr"> Team </a> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- /.Footer -->


        </main>
        <!-- / Main Wrapper -->

        <!-- Top -->
        <div class="to-top theme-clr-bg transition"> <i class="fa fa-angle-up"></i> </div>

         <?php                                  // Login Page
    
/////////////////////////////////////////////
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sign_up_delivery";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    
    // it will never let you open index(login) page if session is set
    /*if ( isset($_SESSION['user'])!="" ) {
        header("Location: home.php");
        exit;
    }
    */
    $error = false;
    
    if( isset($_POST['btn-login']) ) {  
        
        // prevent sql injections/ clear user invalid inputs
        $unknown = trim($_POST['unknown']);
        $unknown = strip_tags($unknown);
        $unknown = htmlspecialchars($unknown);
        
        $pass = trim($_POST['pass']);
        $pass = strip_tags($pass);
        $pass = htmlspecialchars($pass);
        // prevent sql injections / clear user invalid inputs
        
        if(empty($unknown)){
            $error = true;
            $unknownError = "Please enter your email address.";
        } //else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
        //  $error = true;
        //  $emailError = "Please enter valid email address.";
        //}
        
        if(empty($pass)){
            $error = true;
            $passError = "Please enter your password.";
        }
        
        // if there's no error, continue to login
        if (!$error) {
            
            $password = hash('sha256', $pass); // password hashing using SHA256
        
            $res=mysqli_query($conn,"SELECT userId, userName, userMobile, userPass FROM users WHERE userEmail='$unknown'" );
            $row=mysqli_fetch_array($res,MYSQLI_ASSOC);
            $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
            
            if( $count == 1 && $row['userPass']==$password ) {
                $_SESSION['user'] = $row['userId'];
                header("Location: signup.php");
            }
                /*        else {
                                $res=mysql_query("SELECT userId, userName, userEmail , userMobile, userPass FROM users WHERE userTank_Name='$unknown'" );
                $row=mysql_fetch_array($res);
                                $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
                                
                                if( $count == 1 && $row['userPass']==$password ) {
                $_SESSION['user'] = $row['userId'];
                header("Location: home.php");
                                }
                                else{
                                    $errMSG = "Incorrect Credentials, Try again...";
                                }
                                
            }   */
                
        }
        
    }
    else{
    //    echo "else";
    }
?>

        <!-- Popup: Login -->
        <div class="modal fade login-popup" id="login-popup" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md">                
                

                <div class="modal-content">   
                    <div class="login-wrap text-center">                        
                        <h2 class="title-3"> sign in </h2>
                       <!-- <p> Sign in to <strong> GO </strong> for getting all details </p>   -->                     
                        <p> Sign in for getting all details </p> 
                        <a class="close close-btn" data-dismiss="modal" aria-label="Close"> x </a>

                        <div class="login-form clrbg-before">
                            <?php
            if ( isset($errMSG) ) {
                
                ?>
                <div class="form-group">
                <div class="alert alert-danger">
                <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
                </div>
                <?php
            }
            ?>
                            <form class="login" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                                 
                                <div class="form-group"><input type="text" placeholder="Email address" name="unknown" class="form-control"></div>
                             <!--       <span class="text-danger"><?php echo $unknownError; ?></span>-->
                                <div class="form-group"><input type="password" placeholder="Password" name="pass" class="form-control"></div>
                             <!--       <span class="text-danger"><?php echo $passError; ?></span>-->
                                <div class="form-group">
                                    <button class="btn-1" type="submit" name="btn-login" > Sign in now </button>
                                </div>
                            </form>
                            <a href="#" class="gray-clr"> Forgot Passoword? </a>                            
                        </div>                        
                    </div>
                    <div class="create-accnt">
                        <a href="#" class="white-clr"> Don’t have an account? </a>  
                     <!--   <h2 class="title-2"> <a data-toggle="modal" href="signup.php" class="green-clr under-line ">Create a account</a> </h2>-->
                        <h2 class="title-2"> <a href="signup.php" class="green-clr under-line ">Create a account</a> </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Popup: Login -->

        <!-- Search Popup -->
        <div class="search-popup">
            <div>
                <div class="popup-box-inner">
                    <form>
                        <input class="search-query" type="text" placeholder="Search and hit enter" />
                    </form>
                </div>
            </div>
            <a href="javascript:void(0)" class="close-search"><i class="fa fa-close"></i></a>
        </div>
        <!-- / Search Popup -->

        <!-- Main Jquery JS -->
        <script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>        
        <!-- Bootstrap JS -->
        <script src="assets/plugins/bootstrap-3.3.6/js/bootstrap.min.js" type="text/javascript"></script>    
        <!-- Bootstrap Select JS -->
        <script src="assets/plugins/bootstrap-select-1.10.0/dist/js/bootstrap-select.min.js" type="text/javascript"></script>    
        <!-- OwlCarousel2 Slider JS -->
        <script src="assets/plugins/owl.carousel.2/owl.carousel.min.js" type="text/javascript"></script>   
        <!-- Sticky Header -->
        <script src="assets/js/jquery.sticky.js"></script>
        <!-- Wow JS -->
        <script src="assets/plugins/WOW-master/dist/wow.min.js" type="text/javascript"></script>   

        <!-- Slider JS -->        


        <!-- Theme JS -->
        <script src="assets/js/theme.js" type="text/javascript"></script>

    </body>

<!-- Mirrored from event-theme.com/themes/GO-Courier/tracking.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Mar 2017 08:46:08 GMT -->
</html>
