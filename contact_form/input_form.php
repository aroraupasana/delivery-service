<?php
	ob_start();
	session_start();
	
	include_once 'random/dbconnect.php';

	$error = false;

	if ( isset($_POST['btn-signup']) ) {
		
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
		
		// basic message validation
		if (empty($message)) {
			$error = true;
			$messageError = "Please enter your message.";
		} else if (strlen($message) < 3) {
			$error = true;
			$messageError = "message must have atleat 3 characters.";
		} 

		
		
		// if there's no error, continue to signup
		if( !$error ) {
			
			$query = "INSERT INTO users ( userName ,  userMobile , userEmail , userMessage) VALUES( '$name', '$mobile', '$email', '$password', '$message')";
			$res = mysql_query($query);
				
			if ($res) {
				$errTyp = "success";
				$errMSG = "Successfully submitted";
								unset($name);
                                unset($mobile);
								unset($email);
								unset($message);
			} else {
				$errTyp = "danger";
				$errMSG = "Something went wrong, try again later...";	
			}	
				
		}
		
		
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tank-off</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<div class="container">

	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	<div class="col-md-12">
        
        	<div class="form-group">
            	<h2 class="">contact</h2>
            </div>
        
        	<div class="form-group">
            	<hr />
            </div>
            
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
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="30" value="<?php echo $name ?>" />
                </div>
                <span class="text-danger"><?php echo $nameError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="text" name="mobile" class="form-control" placeholder="Enter mobile" maxlength="12" value="<?php echo $mobile ?>" />
                </div>
                <span class="text-danger"><?php echo $mobileError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="255" value="<?php echo $email ?>" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="text" name="name" class="form-control" placeholder="Enter message" maxlength="30" value="<?php echo $message ?>" />
                </div>
                <span class="text-danger"><?php echo $messageError; ?></span>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-signup">Submit</button>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            
        
        </div>
   
    </form>
    </div>	

</div>

</body>
</html>
<?php ob_end_flush(); ?>