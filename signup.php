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
  <?php                     // php code for registering a new user(signup)
   session_start();  
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

    $error = false;    

    if ( isset($_POST['btn-signup']) ) {
     //   echo "if";
        // clean user inputs to prevent sql injections
        $name = trim($_POST['name']);
        $name = strip_tags($name);
        $name = htmlspecialchars($name);
                
     /*           $tank_name = trim($_POST['tank_name']);
        $tank_name = strip_tags($tank_name);
        $tank_name = htmlspecialchars($tank_name);
                
                $institute_name = trim($_POST['institute_name']);
        $institute_name = strip_tags($institute_name);
        $institute_name = htmlspecialchars($institute_name);
                
                $course_name = trim($_POST['course_name']);
        $course_name = strip_tags($course_name);
        $course_name = htmlspecialchars($course_name);
                
                $rollno = trim($_POST['rollno']);
        $rollno = strip_tags($rollno);
        $rollno = htmlspecialchars($rollno);  */
                
                $mobile = trim($_POST['mobile']);
        $mobile = strip_tags($mobile);
        $mobile = htmlspecialchars($mobile);
                
                $email = trim($_POST['email']);
        $email = strip_tags($email);
        $email = htmlspecialchars($email);
        
        $pass = trim($_POST['pass']);
        $pass = strip_tags($pass);
        $pass = htmlspecialchars($pass);
        
        // basic name validation
        if (empty($name)) {
            $error = true;
            $nameError = "Please enter your full name.";
        } else if (strlen($name) < 3) {
            $error = true;
            $nameError = "Name must have atleat 3 characters.";
        } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
            $error = true;
            $nameError = "Name must contain alphabets and space.";
        }
                
                // basic tank name validation
         /*       if (empty($tank_name)) {
            $error = true;
            $tank_nameError = "Please enter your Tank name.";
        } else if (strlen($tank_name) < 3) {
            $error = true;
            $tank_nameError = "Tank Name must have atleat 3 characters.";
        } 
            // check tank name exist or not
            $query = "SELECT userTank_name FROM users WHERE userTank_name='$tank_name'";
            $result = mysql_query($query);
            $count = mysql_num_rows($result);
            if($count!=0){
                $error = true;
                $tank_nameError = "Provided tank name is already in use.";
            }
                
                
                // basic institute name validation
        if (empty($institute_name)) {
            $error = true;
            $institute_nameError = "Please enter your institute name.";
        } else if (strlen($institute_name) < 3) {
            $error = true;
            $institute_nameError = "Institute Name must have atleat 3 characters.";
        } else if (!preg_match("/^[a-zA-Z ]+$/",$institute_name)) {
            $error = true;
            $institute_nameError = "Institute Name must contain alphabets and space.";
        }
                
                // basic course validation
        if (empty($course_name)) {
            $error = true;
            $course_nameError = "Please enter your course name.";
        } else if (strlen($course_name) < 3) {
            $error = true;
            $course_nameError = "Course Name must have atleat 3 characters.";
        } else if (!preg_match("/^[a-zA-Z ]+$/",$course_name)) {
            $error = true;
            $course_nameError = "course Name must contain alphabets and space.";
        }
                
                // basic rollno validation
        if (empty($rollno)) {
            $error = true;
            $rollnoError = "Please enter your rollno.";
        }    */
                
                // basic mobile validation
        if (empty($mobile)) {
            $error = true;
            $mobileError = "Please enter your mobile.";
        } 
        
        //basic email validation
        if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $error = true;
            $emailError = "Please enter valid email address.";
        } else {
            // check email exist or not
            $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
            $result = mysql_query($query);
            $count = mysql_num_rows($result);
            if($count!=0){
                $error = true;
                $emailError = "Provided Email is already in use.";
            }
        }
        // password validation
        if (empty($pass)){
            $error = true;
            $passError = "Please enter password.";
        } else if(strlen($pass) < 5) {
            $error = true;
            $passError = "Password must have atleast 6 characters.";
        }
        
        // password encrypt using SHA256();
        $password = hash('sha256', $pass);
        
        // if there's no error, continue to signup
        if( !$error ) {
            
            $sql = "INSERT INTO users ( userName , userMobile , userEmail , userPass ) VALUES( '$name', '$mobile', '$email', '$password')";
            
     $res = mysql_query($sql,$conn);

            if ($res) {
                //echo "success";
                $err = "success";
                $errMSGS = "Successfully sign-up";
                                unset($name);
                                unset($mobile);
                                unset($email);
                                unset($message);
            } else {

              //  echo "error";
                $err = "danger";
                $errMSGS = "Something went wrong, try again later...";   
            }   
                
        }
        else{
           // echo "el";
        }
        
        
    }
    else{
   //     echo "else";
    }
?>
<!DOCTYPE html>
<html>
    
<!-- Mirrored from event-theme.com/themes/GO-Courier/pricing-plans.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Mar 2017 08:46:08 GMT -->
<head>
        <title>Let's Deliver</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
                         <!--   <div class="col-md-6 col-sm-5">
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

  <a href="logout.php?logout" class="sign-in fs-12 theme-clr-bg" style="padding-left: 2%; padding-right: 2%; ">logout<span>  (<?php echo $userRow['userName']  ?>)</span></a>
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
                <section class="theme-breadcrumb pad-0">                
                    <div class="theme-container container ">  
                        <div class="row">
                         <!--   <div class="col-sm-8 pull-left">
                                <div class="title-wrap">
                                    <h2 class="section-title no-margin">Pricing & plans</h2>
                                    <p class="fs-16 no-margin">Know about our pricing & plans</p>
                                </div>
                            </div>  -->
                            <div class="col-sm-4 pull-right">                        
                                <ol class="breadcrumb-menubar list-inline">
                                    <li><a href="index.php" class="gray-clr">Home</a></li>                                   
                                    <li class="active">sign-up</li>
                                </ol>
                            </div>  
                        </div>
                    </div>
                </section>
                <!-- /.Breadcrumb -->
 <!-- Contact us -->

 


                <section class="contact-wrap pad-0">   
                    <span class="bg-text wow fadeInLeft" data-wow-offset="50" data-wow-delay=".20s"> sign-up </span>
                    <div class="theme-container container">               
                        <div class="row">
                            <div class="col-md-6 col-sm-8">
                                <div class="title-wrap">
                                    <h2 class="section-title wow fadeInLeft" data-wow-offset="50" data-wow-delay=".20s">Sign up</h2>
                                    <p class="wow fadeInLeft" data-wow-offset="50" data-wow-delay=".20s" >Get in touch with us easily</p>
                                </div>

                                <div class="col-md-6 text-center" >
                                <img src="assets/img/block/Courier-Man.png" alt="" class="wow slideInLeft" data-wow-offset="50" data-wow-delay=".20s" style="height:400px;"/>
                                 </div>


                            </div> 

                            <div class="col-md-5 col-sm-6 col-md-offset-0 contact-form">
                                <div class="calculate-form">
                                     <?php
            if ( isset($errMSGS) ) {
                
                ?>
                <div class="form-group">
                <div class="alert alert-<?php echo ($err=="success") ? "success" : $err; ?>">
                <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSGS; ?>
                </div>
                </div>
                <?php
            }
            ?>
           

                                    <form class="row" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

                                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".30s" >
                                            <div class="col-sm-3"> <label class="title-2"> Name: </label></div>
                                            <div class="col-sm-9"> <input type="text" name="name" id="Name" required placeholder="" class="form-control"> </div>
                                            <span class="text-danger"><?php echo $nameError; ?></span>  
                                        </div>
                                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".30s">
                                            <div class="col-sm-3"> <label class="title-2"> Phone: </label></div>
                                            <div class="col-sm-9"> <input type="text" name="mobile" id="phone" placeholder="" class="form-control"> </div>
                                            <span class="text-danger"><?php echo $mobileError; ?></span>  
                                        </div>
                                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".30s">
                                            <div class="col-sm-3"> <label class="title-2"> Email: </label></div>
                                            <div class="col-sm-9"> <input type="text" name="email" id="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="" class="form-control"> </div>
                                            <span class="text-danger"><?php echo $emailError; ?></span> 
                                        </div>
                                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".30s" >
                                            <div class="col-sm-3"> <label class="title-2"> Password: </label></div>
                                            <div class="col-sm-9"> <input type="password" name="pass" id="pass" required placeholder="" class="form-control"> </div>
                                            <span class="text-danger"><?php echo $passError; ?></span>  
                                        </div>                                
                                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".30s">
                                            <div class="col-sm-9 col-xs-12 pull-right"> 
                                                <button name="btn-signup" id="submit_btn" class="btn-1"> sign up </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>                       
                        </div>
                    </div>               
                </section>
                <!-- /.Contact us -->
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
                header("Location: index.php");
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
                                    <span class="text-danger"><?php echo $unknownError; ?></span>
                                <div class="form-group"><input type="password" placeholder="Password" name="pass" class="form-control"></div>
                                    <span class="text-danger"><?php echo $passError; ?></span>
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

        <!-- Popup: signup -->
        <div class="modal fade login-popup" id="signup-popup" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md">                
                <a class="close close-btn" data-dismiss="modal" aria-label="Close"> x </a>

                <div class="modal-content">   
                    <div class="login-wrap text-center">                        
                        <h2 class="title-3"> sign up </h2>
                        <p> Sign up for getting all details </p>                        

                        <div class="login-form clrbg-before">
                            <form class="login">
                                <div class="form-group"><input type="text" placeholder="Name" class="form-control"></div>
                                <div class="form-group"><input type="text" placeholder="phone no" class="form-control"></div>
                                <div class="form-group"><input type="text" placeholder="Email address" class="form-control"></div>
                                <div class="form-group"><input type="password" placeholder="Password" class="form-control"></div>
                                <div class="form-group">
                                    <button class="btn-1 " type="submit"> Sign up now </button>
                                </div>
                            </form>
                            <a href="#" class="gray-clr"> Forgot Passoword? </a>                            
                        </div>                        
                    </div>
                    <div class="create-accnt">
                        <a href="#" class="white-clr"> Have an account? </a>  
                        <h2 class="title-2"> <a data-toggle="modal" href="#login-popup" class="green-clr under-line">Sign in</a> </h2>
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

<!-- Mirrored from event-theme.com/themes/GO-Courier/pricing-plans.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Mar 2017 08:46:08 GMT -->
</html>
