<?php                     // php code for session

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
    

<head>
        <title>Let's Deliver</title>
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
        <link rel="stylesheet" type="text/css" href="assets/css/animate.css">

        <!-- Main Css -->
        <link rel="stylesheet" type="text/css" href="assets/css/theme.css">

       

        
    </head>
    <body id="home">
         
        <!-- Preloader -->
    <!--    <div id="preloader">

            <div class="small1">
                <div class="small ball smallball1"></div>
                <div class="small ball smallball2"></div>
                <div class="small ball smallball3"></div>
                <div class="small ball smallball4"></div>
            </div>


            <div class="small2">
                <div class="small ball smallball5"></div>
                <div class="small ball smallball6"></div>
                <div class="small ball smallball7"></div>
                <div class="small ball smallball8"></div>
            </div>

            <div class="bigcon">
                <div class="big ball"></div>
            </div>

        </div>	-->
        <!-- /.Preloader -->	


        <!-- Main Wrapper -->      

        <main class="wrapper">

            <!-- Header -->
            <header class="header-main">

                <!-- Header Topbar -->
                <div class="top-bar font2-title1 white-clr">
                    <div class="theme-container container">
                        <div class="row">
                          
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
                                            <a href="#home">Home </a>
                                                                                    
                                        </li>
                                        <li> <a href="#about">about</a> </li>
                                        <li> <a href="#location"> Location </a> </li>
                                        <li> <a href="#calculate"> Calculate </a> </li>
                                       <li> <a href="#price" >Price</a></li>
                                        <li> <a href="#contact"> contact </a> </li>
                                         <li> <a href="#">  </a> </li>
                                         
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

                <!-- Banner -->

                <section class="banner mask-overlay pad-120 white-clr">
                    <div class="container theme-container rel-div">
                        <a id="home"></a> 
                        <img class="pt-10 effect animated fadeInLeft" alt="" src="assets/img/icons/icon-1.png" />
                        <ul class="list-items fw-600 effect animated wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">   
                            <li><a href="#">fast</a></li>
                            <li><a href="#">secured</a></li>
                            <li><a href="#">worldwide</a></li>
                        </ul>
                        <h2 class="section-title fs-48 effect animated wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s"> Let's 
                        Deliver <br> <span class="theme-clr"> courier </span> & <span class="theme-clr"> delivery </span> services </h2>
                    </div>
                    <div class="pad-50 visible-lg"></div>
                </section>
                <!-- /.Banner -->

                <!-- Track Product -->
             
                                

                      <section>
                    <div class="theme-container container" style="padding-top: 40px;">               
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 track-prod clrbg-before wow slideInUp" data-wow-offset="50" data-wow-delay=".20s">     
                                <h2 class="title-1"> track your product </h2> <span class="font2-light fs-12">Now you can track your product easily</span>
                                <div class="row">
                                    
                                    <form class="" action="tracking.php">
                                        <div class="col-md-3 col-sm-3">
                                         
                                        </div>
                                        <div class="col-md-5 col-sm-5">
                                            <div class="form-group">
                                                <button  class="btn-1" >track your product</button>
                                            </div>
                                        </div>
                                    </form>
                                    <a id="about" ></a>
                                </div>
                            </div>                        
                        </div>
                    </div>
                </section>

                
                <!-- /.Track Product -->

                <!-- About Us -->
                <section  class="pad-30 about-wrap clrbg-before">
                    <span class="bg-text wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s"> About </span>
                    <div class="theme-container container">               
                        <div class="row">
                            <div class="col-md-6">
                                <div class="about-us">
                                    <h2 class="section-title pb-10 wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s"> About Us </h2>
                                    <p class="fs-16 wow fadeInUp" data-wow-offset="50" data-wow-delay=".25s">
                                        Let's deliver, let people make there life more easier ,just order us where we have to reach for your service.
                                        you can deliver anything from small pin to large parcels ,so leave your tension to us .We are here for your sevice.
                                                          
                                          we’re working hard to have every 
                                         corner of the neighborhood covered.</p>
                                    <ul class="feature">
                                        <li> 
                                            <img alt="" src="assets/img/icons/icon-2.png" class="wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s" /> 
                                            <div class="feature-content wow rotateInDownRight" data-wow-offset="50" data-wow-delay=".30s"> 
                                                <h2 class="title-1">Fast delivery</h2> 
                                                <p>We ensure the fastest delivery of the product.</p>                                            
                                            </div>  
                                        </li>
                                        <li> 
                                            <img alt="" src="assets/img/icons/icon-3.png" class="wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s" /> 
                                            <div class="feature-content wow rotateInDownRight" data-wow-offset="50" data-wow-delay=".30s"> 
                                                <h2 class="title-1">secured service</h2> 
                                                <p>We will make sure that your product reach safely.</p>                                            
                                            </div>  
                                        </li>
                                        <li> 
                                            <img alt="" src="assets/img/icons/icon-4.png" class="wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s" /> 
                                            <div class="feature-content wow rotateInDownRight" data-wow-offset="50" data-wow-delay=".30s"> 
                                                <h2 class="title-1">worldwide shipping</h2> 
                                                <p>Anytime,Anywhere at your service</p>                                            
                                            </div>  
                                        </li>
                                        
                                        
                                        
                                    </ul>
                                    
                                </div>
                            </div>
                            <div class="col-md-6 text-center "style="padding-bottom:0px; margin-bottom:0px;">
                                <div class="visible-lg"></div>
                                <img alt="" src="assets/img/block/about-img.png" class="wow slideInRight" data-wow-offset="50" data-wow-delay=".20s" style="height:300px;"/>
                            </div>
                            <div class="col-md-6 ">
                                <div class=" visible-lg"></div>
                                <ul class="feature" style="margin-top:0px;">
                                        
                                        
                                        <li style="padding-bottom:20px;"> 
                                            <img alt="" src="assets/img/icons/icon-4.png" class="wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s" /> 
                                            <div class="feature-content wow rotateInDownRight" data-wow-offset="50" data-wow-delay=".30s"> 
                                                <h2 class="title-1">Easy ordering</h2> 
                                                <p>It's quick, convenient, and free to use on any device.</p>                                            
                                            </div>  
                                        </li>
                                        <li style="padding-bottom:10px;"> 
                                            <img alt="" src="assets/img/icons/icon-4.png" class="wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s" /> 
                                            <div class="feature-content wow rotateInDownRight" data-wow-offset="50" data-wow-delay=".30s"> 
                                                <h2 class="title-1">Great rewards</h2> 
                                                <p>Earn Delivery Points with every order for free </p>                                            
                                            </div>  
                                        </li>
                                    </ul>
                            </div>
                            <a id="location"></a>
                        </div>
                    </div>
                </section>
                 
                <!-- About Us --> 

                

                <!-- Calculate Your Cost -->
                <section class="calculate pt-50 ">
                     <span class="bg-text wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s" > Distance </span>
                    <div class="calculate  about-wrap clrbg-before" style="padding-bottom:80px;">
                        <h1 class="section-title pb-10" style="padding: 10px 10px 10px 50px;"> Locate your place on Map </h1>
                        <p class="fs-16 wow fadeInUp" style="padding: 10px 10px 10px 50px;" data-wow-offset="50" data-wow-delay=".25s">
                            Enter the location from where to where you have to deliver the product .</p>

                                         <input id="origin-input" class="controls" type="text" placeholder="Enter origin location" name="source">
                                         <input id="destination-input" class="controls" type="text" placeholder="Enter destination location" name="destination">
                                         <div id="mode-selector" class="controls">

                                            <input type="radio" name="type" id="changemode-walking" checked="checked">
                                            <label for="changemode-walking">Walking</label>

                                            <input type="radio" name="type" id="changemode-transit">
                                            <label for="changemode-transit">Transit</label>

                                            <input type="radio" name="type" id="changemode-driving">
                                            <label for="changemode-driving">Driving</label>  
    
                                        </div>

                                  <div id="map" style="height:500px;"></div>
                    </div>
                     <a id="calculate"></a>
                </section>

                 <?php                     // php code for submittinging data  
    
    
        // it will never let you open login page if session is set
    
   // include_once 'back/dbconnect.php';
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

    $error = false;
    if ( isset($_POST['delivery_form']) ) {
    
        // clean user inputs to prevent sql injections
        $rname = trim($_POST['rname']);
        $rname = strip_tags($rname);
        $rname = htmlspecialchars($rname);
                
        $rmobile = trim($_POST['rmobile']);
        $rmobile = strip_tags($rmobile);
        $rmobile = htmlspecialchars($rmobile);
                
        $remail = trim($_POST['remail']);
        $remail = strip_tags($remail);
        $remail = htmlspecialchars($remail);

        $height = trim($_POST['height']);
        $height = strip_tags($height);
        $height = htmlspecialchars($height);
                
        $width = trim($_POST['width']);
        $width = strip_tags($width);
        $width = htmlspecialchars($width);
                
        $length = trim($_POST['length']);
        $length = strip_tags($length);
        $length = htmlspecialchars($length);
                
        $weight = trim($_POST['weight']);
        $weight = strip_tags($weight);
        $weight = htmlspecialchars($weight);
                
        $distance = trim($_POST['distance']);
        $distance = strip_tags($distance);
        $distance = htmlspecialchars($distance);

        $source = trim($_POST['origin-input']);
        $source = strip_tags($source);
        $source = htmlspecialchars($source);
                
        $destination = trim($_POST['destination-input']);
        $destination = strip_tags($destination);
        $destination = htmlspecialchars($destination);
                
        $package = trim($_POST['package']);
        $package = strip_tags($package);
        $package = htmlspecialchars($package);
                
       
        
        
        // basic height validation
        if (empty($height)) {
            $error = true;
            $heightError = "Please enter height.";
        } else if (!preg_match('/^[0-9]{1,}/',$height)) {
            $error = true;
            $heightError = "height must contain numeric.";
        }
                
                // basic width validation
        if (empty($width)) {
            $error = true;
            $widthError = "Please enter width.";
        } else if (!preg_match('/^[0-9]{1,}/',$width)) {
            $error = true;
            $widthError = "width must contain numeric.";
        }
            
     
                
                // basic length validation
        if (empty($length)) {
            $error = true;
            $lengthError = "Please enter length.";
        }  else if (!preg_match('/^[0-9]{1,}/',$length)) {
            $error = true;
            $lengthError = "length must contain numeric.";
        }
                
                // basic weight validation
        if (empty($weight)) {
            $error = true;
            $weightError = "Please enter weight.";
        }  else if (!preg_match('/^[0-9]{1,}/',$weight)) {
            $error = true;
            $weightError = "weight must contain numeric.";
        }
                
                // basic distance validation
        if (empty($distance)) {
            $error = true;
            $distanceError = "Please enter distance.";
        }


        if (empty($rname)) {
            $error = true;
            $rnameError = "Please enter receiver full name.";
        } else if (strlen($rname) < 3) {
            $error = true;
            $rnameError = "Rceiver Name must have atleat 3 characters.";
        } /*else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
            $error = true;
            $rnameError = "Receiver Name must contain alphabets and space.";
        }*/

        if (empty($rmobile)) {
            $error = true;
            $rmobileError = "Please enter receiver mobile.";
        } 
        
        //basic email validation
        if ( !filter_var($remail,FILTER_VALIDATE_EMAIL) ) {
            $error = true;
            $remailError = "Please enter valid email address.";
        }

                   
        // if there's no error, continue to signup
        $name = $userRow['userName'];
        $mobile = $userRow['userMobile'];
        $email = $userRow['userEmail'];

        $pack1 = 50;
        $pack2 = 150;
        $pack3 = 250;
       
        if($weight <= 5){
            $cost = $distance + $pack1;
        }else if($weight <= 15){
            $cost = $distance + $pack2;
        }else{
            $cost = $distance + $pack3;
        } 
        
       
        if( !$error ) {
            
            $query = "INSERT INTO users ( username , usermobile , useremail , receivername , receivermobile , receiveremail , userheight , userwidth , userlength , userweight , userdistance , usercost) VALUES( '$name', '$mobile', '$email' , '$rname', '$rmobile', '$remail' , '$height', '$width', '$length', '$weight', '$distance' , '$cost' )";
        
            $res = mysqli_query($conn, $query);
            
                
            if ($res) {
                $errTyp = "success";
                $errMSG = " Successfully submitted, have fun ";
                 $last_id = mysqli_insert_id($conn);
                                unset($height);
                                unset($width);
                                unset($length);
                                unset($weight);
                                unset($distance);
                           
                                
            } else {
                $errTyp = "danger";
                $errMSG = "Something went wrong, try again later...";   
            }   
                mysqli_close($conn); 
        }
        
         
    }
?>

                <section class="calculate pt-50 ">

                    <div class="theme-container container">  
                        <span class="bg-text right wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s"> calculate </span>
                        <div class="row">
                            <div class="col-md-6 text-center" >
                                <img src="assets/img/block/Courier-Man.png" alt="" class="wow slideInLeft" data-wow-offset="50" data-wow-delay=".20s" />

                            
                            </div>     


                            <div class="col-md-6 text-center">
                                
                                        
                            </div>
                            <div class="col-md-6" style="float:right;">   
                                <div class="pad-10"></div>
                                <h2 class="section-title pb-10 wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s" > calculate your cost </h2>
                                <p class="fs-16 wow fadeInUp" data-wow-offset="50" data-wow-delay=".25s">
                                  Enter the values as per the your requirements.
                                </p>
                                <div class="calculate-form">
                     <?php
            if ( isset($errMSG) ) {
                    
                ?>            
                <div class="form-group">

                <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
                <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG;?>
                </div>
                 <?php
                    }
                ?>
                <?php
                if ( strnatcmp($errTyp,"success") == 0){
                    ?>

                <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
                <span class="glyphicon glyphicon-info-sign"></span> <?php echo "  Your token no : " . $last_id;?>
                </div>

                </div>
                <?php
                    }
                ?>
               
                                    <form class="row"  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                                            <div class="col-sm-3"> <label class="title-2"> height (cm): </label></div>
                                            <div class="col-sm-9"> <input data-bind="in:value, f: float" name="height" type="text" required placeholder="" class="form-control"> </div>
                                        </div>
                                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                                            <div class="col-sm-3"> <label class="title-2"> width (cm): </label></div>
                                            <div class="col-sm-9"> <input data-bind="in:value, f: float" name="width" type="text" required placeholder="" class="form-control"> </div>
                                        </div>
                                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                                            <div class="col-sm-3"> <label class="title-2"> length (cm): </label></div>
                                            <div class="col-sm-9"> <input data-bind="in:value, f: float" name="length" type="text" required placeholder="" class="form-control"> </div>
                                        </div>
                                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                                            <div class="col-sm-3"> <label class="title-2"> weight (kg): </label></div>
                                            <div class="col-sm-9"> <input data-bind="in:value, f: float" name="weight" type="text" required placeholder="" class="form-control"> </div>
                                        </div>
                                      
        

    

                                        
                                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                                            <div class="col-sm-3"> <label class="title-2"> Distance: </label></div>
                                            <div class="col-sm-9"> <input data-bind="in:value, f: float" 
                                                name="distance" type="text" required placeholder="please enter location using map"
                                                 class="form-control" id="distance" readonly="true"> </div>
                                        </div>
                                       
                                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                                            <div class="col-sm-3"> <label class="title-2"> receiver name : </label></div>
                                            <div class="col-sm-9"> <input data-bind="in:value, f: float" name="rname" type="text" required placeholder="" class="form-control"> </div>
                                            <span class="text-danger"><?php echo $rnameError; ?></span>
                                        </div>
                                        
                                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                                            <div class="col-sm-3"> <label class="title-2"> receiver phone: </label></div>
                                            <div class="col-sm-9"> <input data-bind="in:value, f: float" name="rmobile" type="text" required placeholder="" class="form-control"> </div>
                                            <span class="text-danger"><?php echo $rmobileError; ?></span>
                                        </div>
                                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                                            <div class="col-sm-3"> <label class="title-2"> reciver email: </label></div>
                                            <div class="col-sm-9"> <input data-bind="in:value, f: float" name="remail" type="text" required placeholder="" class="form-control"> </div>
                                            <span class="text-danger"><?php echo $remailError; ?></span>
                                        </div>


                                      <?php 
                                        if( isset($_SESSION['user']) ) { 
                                         ?>

                                         <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                                            <div class="col-sm-9 col-xs-12 pull-right"> 
                                                <button class="btn-1" name="delivery_form" type="submit"> Submit </button>
                                            </div>
                                        </div> 
                                        
                                          
                                        
                                                  
                                  
                                         <?php if ( isset($_POST['delivery_form']) ) {
                                          ?>  
                                        
                                        <?php echo '<div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s" >'.
                                             '<div class="col-sm-9 col-xs-12 pull-right"> '.
                                                '<div class="btn-1" style="background-color: #222222;">'.'<span> Total Cost: </span>'.
                                                    '<span name="cost" class="btn-1 dark" style="background-color: lightgrey; color:black:">'. 
                                                      '<span class="pr-sign" >&nbsp;</span>'. "Rs" .$cost.'<span style="display: none; ">'.'<span style="color: red;">'.'</span>'.'</span>'.
                                                    '</span>'.
                                                '</div>'.
                                            '</div>'.
                                        '</div>';?>
                                      
                                  <?php } ?>
                                            
                                        <?php } 
                                        else{  ?>
                                            <p style="padding-left:50px; color:red;">* Please login for register your delivery. </p>
                                            <?php 
                                        }  ?>
                                    </form>
                                    
                                    
                                </div>

                                
                              

                            </div>
                        
                        </div>
                    </div>
                </section>
               
               
                <!-- /.Calculate Your Cost -->

                <!-- Steps -->
                <section class="steps-wrap mask-overlay pad-30">                
                    <div class="theme-container container">               
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <div class="font-2 fs-50 wow fadeInLeft" data-wow-offset="50" data-wow-delay=".20s"> 1. </div> 
                                <div class="steps-content wow fadeInLeft" data-wow-offset="50" data-wow-delay=".25s" > 
                                    <h2 class="title-3">Order</h2> 
                                    <p class="gray-clr" >
                                        Enter your address, from where to receive the product and where to deliver.</p>                                            
                                </div>  
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="font-2 fs-50 wow fadeInLeft" data-wow-offset="50" data-wow-delay=".20s"> 2. </div> 
                                <div class="steps-content wow fadeInLeft" data-wow-offset="50" data-wow-delay=".25s"> 
                                    <h2 class="title-3">Wait</h2> 
                                    <p class="gray-clr">Then our delivery person will reach your place to collect your product and half 
                                        of the prize is paid and half prize of the total amount is collected at the place where product is to deliver.</p>                                            
                                </div>  
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="font-2 fs-50 wow fadeInLeft" data-wow-offset="50" data-wow-delay=".20s"> 3. </div> 
                                <div class="steps-content wow fadeInLeft" data-wow-offset="50" data-wow-delay=".25s"> 
                                    <h2 class="title-3">Deliver</h2> 
                                    <p class="gray-clr">
                                        Now its our task to deliver your product safely.</p>                                            
                                </div>  
                            </div>
                        </div>
                    </div>
                    <div class="step-img wow slideInRight" data-wow-offset="50" data-wow-delay=".20s"> <img src="assets/img/block/step-img.png" alt="" /> </div>
                </section>
                <!-- /.Steps -->

                <!-- Product Delivery -->
                <section class="prod-delivery pad-120">
                    <div class="theme-container container">               
                        <div class="row">
                            <div class="col-md-11 col-md-offset-1">
                                <div class="pt-120 rel-div">
                                    <div class="pb-50 hidden-xs"></div>
                                    <h2 class="section-title wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s"> Get the <span class="theme-clr"> fastest </span> product delivery </h2>
                                    <p class="fs-16 wow fadeInUp" data-wow-offset="50" data-wow-delay=".25s">

 We are always at your service and only one step away .
                                        <br>Either register or call us to contact us so that we will
                                        <br>provide you a better 
                                        Service that will facilitate you .
                                        <br>We ensure fastest delivery of your products and safely.</p>


                                         
                                    <div class="pb-120 hidden-xs"></div>
                                </div>
                                <div class="delivery-img pt-10">
                                    <img alt="" src="assets/img/block/delivery.png" class="wow slideInLeft" data-wow-offset="50" data-wow-delay=".20s"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.Product Delivery -->

                <!-- Testimonial -->
                <section class="testimonial mask-overlay">
                    <div class="theme-container container">               
                        <div class="testimonial-slider no-pagination pad-120">
                            <div class="item">
                                <div class="testimonial-img darkclr-border theme-clr font-2 wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">
                                    <img alt="" src="assets/img/block/testimonial-1.png" />
                                  <!--   <span>,,</span> -->
                                </div>
                                <div class="testimonial-content">
                                    <p class="wow fadeInUp" data-wow-offset="50" data-wow-delay=".25s">  <i class="gray-clr fs-16">
                                           Being a student of Mca ,is enjoying making projects....
                                        </i> </p>
                                    <h2 class="title-2 pt-10 wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s"> <a href="#" class="white-clr fw-900"> 
                                        Upasana </a> </h2>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimonial-img darkclr-border theme-clr font-2">
                                    <img alt="" src="assets/img/block/testimonial-1.png" />
                                   <!--  <span>,,</span> -->
                                </div>
                                <div class="testimonial-content">
                                    <p>  <i class="gray-clr fs-16">
                                            Student of Mca.
                                        </i> </p>
                                    <h2 class="title-2 pt-10"> <a href="#" class="white-clr fw-900"> Prabhat </a> </h2>
                                </div>
                            </div>
                          

                        </div>
                    </div>
                </section>
                <!-- /.Testimonial -->

                <!-- Pricing & Plans -->
                 <a id="price"></a>
                <section class="pricing-wrap pt-120">                
                    <div class="theme-container container">    
                        <span class="bg-text center wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s"> Pricing </span>
                        <div class="title-wrap text-center  pb-50">
                            <h2 class="section-title wow fadeInUp" data-wow-offset="50" data-wow-delay=".20s">Pricing & plans</h2>
                            <p class="wow fadeInLeft" data-wow-offset="50" data-wow-delay=".25s">See our pricing & plans to get best service</p>
                        </div>
                        <div class="row">
                            <div class="col-md-4 wow slideInUp" data-wow-offset="50" data-wow-delay=".20s">
                                <div class="pricing-box clrbg-before clrbg-after transition">
                                    <div class="title-wrap text-center">
                                        <h2 class="section-title fs-36">RS 50</h2>
                                       <!--  <p>for single product</p> -->
                                        <div class="btn-1">basic</div>
                                    </div>
                                    <div class="price-content">                                    
                                        <ul class="title-2">
                                            <li> Product Weight: <span class="gray-clr"> &LT; 5kg</span> </li>
                                            <li> Country: <span class="gray-clr">  all</span> </li>
                                            <li> duration: <span class="gray-clr">7-14 days</span> </li>
                                            <li> support: <span class="gray-clr">yes</span> </li>
                                        </ul>
                                    </div>
                                  <!--   <div class="order">
                                        <a href="#" class="title-1 theme-clr"> <span class="transition"> order now </span> <i class="arrow_right fs-26"></i> </a>
                                    </div> -->
                                    <div class="pricing-hover clrbg-before clrbg-after transition"></div>
                                </div>
                            </div>
                            <div class="col-md-4 active white-clr wow slideInUp" data-wow-offset="50" data-wow-delay=".25s">
                                <div class="pricing-box theme-clr-bg">
                                    <div class="title-wrap text-center">
                                        <h2 class="section-title fs-36">RS 250</h2>
                                       <!--  <p>for package product</p> -->
                                        <div class="btn-1 dark">Premium</div>
                                    </div>
                                    <div class="price-content">                                    
                                        <ul class="title-2">
                                            <li> Product Weight: <span class="white-clr">&GT;15kg</span> </li>
                                            <li> Country: <span class="white-clr">  all</span> </li>
                                            <li> duration: <span class="white-clr">7-14 days</span> </li>
                                            <li> support: <span class="white-clr">yes</span> </li>
                                        </ul>
                                    </div>
                                                              
                                </div>
                            </div>
                            <div class="col-md-4 wow slideInUp" data-wow-offset="50" data-wow-delay=".30s">
                                <div class="pricing-box clrbg-before clrbg-after transition">
                                    <div class="title-wrap text-center">
                                        <h2 class="section-title fs-36">RS 150</h2>
                                       <!--  <p>for multiple product</p> -->
                                        <div class="btn-1">standard</div>
                                    </div>
                                    <div class="price-content">                                    
                                        <ul class="title-2">
                                            <li> Product Weight: <span class="gray-clr">&LT;15kg</span> </li>
                                            <li> Country: <span class="gray-clr">  all</span> </li>
                                            <li> duration: <span class="gray-clr">7-14 days</span> </li>
                                            <li> support: <span class="gray-clr">yes</span> </li>
                                        </ul>
                                    </div>
                                
                                    <div class="pricing-hover clrbg-before clrbg-after transition"></div>

                                </div>
                                <a id="contact"></a>
                            </div>

                        </div>

                    </div>               
                </section>
                <!-- /.Pricing & Plans -->


                 <?php
    
    
   /////////////////////////////////////////////
                 //contact form code

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
        
  $error = false;

    if ( isset($_POST['submit']) ) {
        echo "if";
        
        // clean user inputs to prevent sql injections
        $name = trim($_POST['name']);
        $name = strip_tags($name);
        $name = htmlspecialchars($name);
                
        $mobile = trim($_POST['mobile']);
        $mobile = strip_tags($mobile);
        $mobile = htmlspecialchars($mobile);
                
        $email = trim($_POST['email']);
        $email = strip_tags($email);
        $email = htmlspecialchars($email);
        
        $message = trim($_POST['message']);
        $message = strip_tags($message);
        $message = htmlspecialchars($message);
        
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
                
         
                
                // basic mobile validation
        if (empty($mobile)) {
            $error = true;
            $mobileError = "Please enter your mobile.";
        } 
        
        //basic email validation
        if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $error = true;
            $emailError = "Please enter valid email address.";
        } 
        // basic message validation
        if (empty($message)) {
            $error = true;
            $messageError = "Please enter your message.";
        } else if (strlen($message) < 3) {
            $error = true;
            $messageError = "message must have atleat 3 characters.";
        } 

        
        
        // if there's no error, continue to insert
        if( !$error ) {
            
            $query = "INSERT INTO users ( userName ,  userMobile , userEmail , userMessage) VALUES( '$name', '$mobile', '$email', '$message')";
         
            if (mysqli_query($conn, $query)) {
    //              echo "New record created successfully";
                $errTy = "success";
                $errMS = "Successfully submitted";
                                unset($name);
                                unset($mobile);
                                unset($email);
                                unset($message);
            } else {
      //            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                $errTy = "danger";
                $errMS = "Something went wrong, try again later...";
            }
 
            mysqli_close($conn);
  
        }
        else{
//            echo "el";
        }
        
        
    }
    else{
  //      echo "else";
    }
?>
                <!-- Contact us -->

                <section class="contact-wrap pad-50">   
                    <span class="bg-text wow fadeInLeft" data-wow-offset="50" data-wow-delay=".20s"> Contact </span>
                    <div class="theme-container container">               
                        <div class="row">
                            <div class="col-md-6 col-sm-8">
                                <div class="title-wrap">
                                    <h2 class="section-title wow fadeInLeft" data-wow-offset="50" data-wow-delay=".20s">contact us</h2>
                                    <p class="wow fadeInLeft" data-wow-offset="50" data-wow-delay=".20s" >Get in touch with us easily</p>
                                </div>
                                <ul class="contact-detail title-2">
                                    <li class="wow slideInUp" data-wow-offset="50" data-wow-delay=".20s">
                                     <span>India numbers:</span> <p class="gray-clr"> +7405698562 <br> +9464589652 </p> </li>
                                   <!--  <li class="wow slideInUp" data-wow-offset="50" data-wow-delay=".25s">
                                     <span>usa numbers:</span> <p class="gray-clr"> +001-2463-957 <br> +001-4356-643 </p> </li> -->
                                    <li class="wow slideInUp" data-wow-offset="50" data-wow-delay=".30s"> <span>Email address:</span> <p class="gray-clr"> support@delivery.com <br> info@delivery.com </p> </li>
                                </ul>
                            </div> 
                            <div class="col-md-5 col-sm-6 col-md-offset-0 contact-form">
                                <div class="calculate-form">
                                   
                                    <form class="row" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                                         <?php
            if ( isset($errMS) ) {
                
                ?>
                <div class="form-group">
                <div class="alert alert-<?php echo ($errTy=="success") ? "success" : $errTy; ?>">
                <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMS; ?>
                </div>
                </div>
                <?php
            }
            ?>
                                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".30s" >
                                            <div class="col-sm-3"> <label class="title-2"> Name: </label></div>
                                            <div class="col-sm-9"> <input type="text" name="name"  required placeholder="" class="form-control"  /> </div>
                                            <span class="text-danger"><?php echo $nameError; ?></span>
                                        </div>
                                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".30s">
                                            <div class="col-sm-3"> <label class="title-2"> Phone: </label></div>
                                            <div class="col-sm-9"> <input type="text" name="mobile"  placeholder="" class="form-control"  /> </div>
                                            <span class="text-danger"><?php echo $mobileError; ?></span>
                                        </div>
                                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".30s">
                                            <div class="col-sm-3"> <label class="title-2"> Email: </label></div>
                                            <div class="col-sm-9"> <input type="text" name="email"  required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="" class="form-control" /> </div>
                                            <span class="text-danger"><?php echo $emailError; ?></span>
                                        </div>
                                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".30s">
                                            <div class="col-sm-3"> <label class="title-2"> Message: </label></div>
                                            <div class="col-sm-9"> <textarea class="form-control" name="message"  required cols="25" rows="7"  /></textarea> </div>
                                            <span class="text-danger"><?php echo $messageError; ?></span>
                                        </div>                                  
                                        <div class="form-group wow fadeInUp" data-wow-offset="50" data-wow-delay=".30s">
                                            <div class="col-sm-9 col-xs-12 pull-right"> 
                                                <button id="submit_btn" class="btn-1" name="submit"> send message </button>
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
                                    <li> <a href="#about">About</a> </li>
                                    <li> <a href="#price">pricing</a> </li>
                                    <li> <a href="#calculate">Calculate</a> </li>
                                    <li> <a href="#location">Location</a> </li>
                                </ul>
                            </div>
                         
                            <div class="col-md-3 col-sm-6 footer-widget">
                                <h2 class="title-1 fw-900">get in touch</h2>
                                <ul class="social-icons list-inline">
                                    <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".20s"> <a href="#" class="fa fa-facebook"></a> </li>
                                    <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".25s"> <a href="#" class="fa fa-twitter"></a> </li>
                                    <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".30s"> <a href="#" class="fa fa-google-plus"></a> </li>
                                    <li class="wow fadeIn" data-wow-offset="50" data-wow-delay=".35s"> <a href="#" class="fa fa-linkedin"></a> </li>
                                </ul>
                             
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
               
                
        }
        
    }
    else{
       // echo "else";
    }
?>
        <!-- Top -->
        <div class="to-top theme-clr-bg transition"> <i class="fa fa-angle-up"></i> </div>

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
                   
                        <h2 class="title-2"> <a href="signup.php" class="green-clr under-line ">Create a account</a> </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Popup: Login --> 

       <!--  <?php                     // php code for registering a new user(signup)  
    ob_start();
    session_start();
       
    include_once 'sign-up/dbconnect.php';

    $error = false;

    if ( isset($_POST['btn-signup']) ) {
        echo "if";
        // clean user inputs to prevent sql injections
        $name = trim($_POST['name']);
        $name = strip_tags($name);
        $name = htmlspecialchars($name);
                
     
                
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
            
            $query = "INSERT INTO users ( userName , userMobile , userEmail , userPass ) VALUES( '$name', '$mobile', '$email', '$password')";
            $res = mysql_query($query);
                
            if ($res) {
                echo "success";
                $errTyp = "success";
                $errMSG = "Successfully registered, you may login now";
                                unset($name);
                                unset($mobile);
                                unset($email);
                                unset($pass);
            } else {
                $errTyp = "danger";
                $errMSG = "Something went wrong, try again later...";   
            }   
                
        }
        
        
    }
    else{
      //  echo "kk";
    }
?> -->
        <!-- Popup: signup -->
        <div class="modal fade login-popup" id="signup-popup" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md">                
                

                <div class="modal-content">   
                    <div class="login-wrap text-center">                        
                        <h2 class="title-3"> sign up </h2>
                        <p> Sign up for getting all details </p>  
                        <a class="close close-btn" data-dismiss="modal" aria-label="Close"> x </a>                      

                        <div class="login-form clrbg-before">
                            <?php
            if ( isset($errMSG) ) {
                
                ?>
                <div class="form-group">
                <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
                <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
                </div>
                <?php
            }
            ?>
                            <form class="login" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                                <div class="form-group"><input type="text" placeholder="Name" name="name" class="form-control"></div>
                                    <span class="text-danger"><?php echo $nameError; ?></span>
                                <div class="form-group"><input type="text" placeholder="phone no" name="mobile" class="form-control"></div>
                                    <span class="text-danger"><?php echo $mobileError; ?></span>
                                <div class="form-group"><input type="text" placeholder="Email address" name="email" class="form-control"></div>
                                     <span class="text-danger"><?php echo $emailError; ?></span>
                                <div class="form-group"><input type="password" placeholder="Password" name="pass" class="form-control"></div>
                                    <span class="text-danger"><?php echo $passError; ?></span>
                                <div class="form-group">
                                    <button class="btn-1" type="submit" name="btn-signup" > Sign up now </button>
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
        <!-- Data binder -->
        <script src="assets/plugins/data.binder.js/data.binder.js" type="text/javascript"></script>

        <!-- Slider JS -->        


        <!-- Theme JS -->
        <script src="assets/js/theme.js" type="text/javascript"></script>

         <script>
      

     

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">


      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          mapTypeControl: false,
          center: {lat: 28.7841, lng: 79.1025},
          zoom: 5
        });

        new AutocompleteDirectionsHandler(map);
      }

       /**
        * @constructor
       */
      function AutocompleteDirectionsHandler(map) {
        this.map = map;
        this.originPlaceId = null;
        this.destinationPlaceId = null;
        this.travelMode = 'WALKING';
        var originInput = document.getElementById('origin-input');
        var destinationInput = document.getElementById('destination-input');
        var modeSelector = document.getElementById('mode-selector');
        this.directionsService = new google.maps.DirectionsService;
        this.directionsDisplay = new google.maps.DirectionsRenderer;
        this.directionsDisplay.setMap(map);

        var originAutocomplete = new google.maps.places.Autocomplete(
            originInput, {placeIdOnly: true});
        var destinationAutocomplete = new google.maps.places.Autocomplete(
            destinationInput, {placeIdOnly: true});

        this.setupClickListener('changemode-walking', 'WALKING');
        this.setupClickListener('changemode-transit', 'TRANSIT');
        this.setupClickListener('changemode-driving', 'DRIVING');

        this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
        this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
      }

      // Sets a listener on a radio button to change the filter type on Places
      // Autocomplete.
      AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
        var radioButton = document.getElementById(id);
        var me = this;
        radioButton.addEventListener('click', function() {
          me.travelMode = mode;
          me.route();
        });
      };

      AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
        var me = this;
        autocomplete.bindTo('bounds', this.map);
        autocomplete.addListener('place_changed', function() {
          var place = autocomplete.getPlace();
          if (!place.place_id) {
            window.alert("Please select an option from the dropdown list.");
            return;
          }
          if (mode === 'ORIG') {
            me.originPlaceId = place.place_id;
          } else {
            me.destinationPlaceId = place.place_id;
          }
          me.route();

        });

      };

      AutocompleteDirectionsHandler.prototype.route = function() {
        if (!this.originPlaceId || !this.destinationPlaceId) {
          return;
        }
        var me = this;
        var distanceInput = document.getElementById("distance");
        this.directionsService.route({
          origin: {'placeId': this.originPlaceId},
          destination: {'placeId': this.destinationPlaceId},
          travelMode: this.travelMode
        }, function(response, status) {
          if (status === 'OK') {
            me.directionsDisplay.setDirections(response);
              distanceInput.value = response.routes[0].legs[0].distance.value / 1000;

          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      };

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFt0WCbvapyu6HLX9sQRqcVP3h_5_pM8E&libraries=places&callback=initMap"
        async defer></script>


    </body>


</html>
