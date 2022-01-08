<?php 
include 'connect.php';
session_start();
if(isset($_SESSION['vendor_email']) && isset($_SESSION['vendor_password']) )
{
	header("location:vendor_dashboard.php");
}
$status="";

if(isset($_GET['login']) )
{
	
	
	$email=$_GET['vendor_email'];
	$password=$_GET['vendor_password'];
	if(isset($_GET['remember_me']))
	{
		setcookie("email",$email,time()+24*60*60);
		setcookie("password",$password,time()+24*60*60);
	}
	else
	{
		setcookie("email","",time()-1);
		setcookie("password","",time()-1);

	}
	$sql=$link->rawQueryOne("select * from vendor_personal_tb where vendor_email=? and vendor_password=? and is_active=1",Array($email,$password));
	if($link->count >0)
	{

		$_SESSION['vendor_email']=$email;
		$_SESSION['vendor_password']=$password;
		$_SESSION['vendor_id']=$sql['vendor_id_pk'];
		
		header("location:vendor_dashboard.php");
	}
	else
	{
		$err="invalid user";
		header("location:vendor_index.php?error=".$err);
	}
}

if(isset($_POST['send']) )
{
		
		require_once ('phpmailer/PHPMailerAutoload.php');
		$email=$_POST['forget_email'];
		

		$sql=$link->rawQuery("select * from vendor_personal_tb where vendor_email=?",Array($email));
		if($link->count>0)
		{
		$status=0;
		$mail = new PHPMailer();
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
		$mail->Host = "mail.accreteit.com";
			$mail->Port = 465; // or 587
			$mail->IsHTML(true);
			$mail->Username = "storetodoor@accreteit.com";
			$mail->Password = "storetodoor";

		$var ="<html><body>
			Change Vendor Admin Password<br>
			<a href='http://localhost/project/StoreToDoor/vendor/update_password.php?email=$email'>Click me</a></body></html>";
			$mail->SetFrom("storetodoor@accreteit.com","StoreToDoor");
			$mail->Subject = "StoreToDoor Vendor Admin Password Change Request";
			$mail->MsgHTML($var);
			$mail->AddAddress($email);
			$mail->Send();	
		
		}
		else
		{
			header("location:vendor_dashboard.php?status=1");
			//echo "<script>alert('error');</script>";
		}	
}


?>
<html lang="en">

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Vendor Login</title>
  <!-- Iconic Fonts -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="css/flaticon.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- jQuery UI -->
  <link href="css/jquery-ui.min.css" rel="stylesheet">
  <!-- Mystic styles -->
  <link href="css/style.css" rel="stylesheet">
  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="images/favicon.png">

</head>

<body class="ms-body ms-primary-theme ms-logged-out" >
  <!-- Setting Panel -->
  
  <!-- Overlays -->
  <div class="ms-aside-overlay ms-overlay-left ms-toggler" data-target="#ms-side-nav" data-toggle="slideLeft"></div>
  <div class="ms-aside-overlay ms-overlay-right ms-toggler" data-target="#ms-recent-activity" data-toggle="slideRight"></div>

  <!-- Sidebar Navigation Left -->
  
            

  <!-- Main Content -->
  <main class="body-content" >

    <!-- Navigation Bar -->
    

    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper ms-auth" ">

      <div class="ms-auth-container">
        
		
        <div class="ms-auth-col">
          <div class="ms-auth-form"  style="background-image:url('<?php echo $siteroot;?>wallpaper5.jpg'); background-size: cover;">
		  
		  
            <form  novalidate="" method="get" name="frm" onSubmit="return validate()">
			<div style="background-color:white; padding-right:30px; padding-left:30px; padding-top:30px; padding-bottom:30px;">
			<div style="text-align:center;margin-bottom:30px;">
					<img src="images/storetodoor-logo.png" />
                   </div>
              <h1>Login to Account</h1>
              <p>Please enter your email and password to continue</p>
              <div class="mb-3">
			  
			  <div style="color:red; text-transform: uppercase;"><?php if(isset($_GET['error']) && $_GET['error']!=""){echo $_GET['error'];}?></div>
			  
                <label for="validationCustom08">Vendor Email Address</label>
                <div class="input-group">
                  <input type="email" class="form-control"  placeholder="Email Address" required="" name="vendor_email" id="email" value="<?php if(isset($_COOKIE['email']))echo $_COOKIE['email']; ?>">
                 
                    
                  
                </div>
				<span id="email_error" style="color:red; padding-top:5px;"></span>
              </div>
              <div class="mb-2">
                <label for="validationCustom09">Password</label>
                <div class="input-group">
                  <input type="password" class="form-control"  placeholder="Password" required="" id="password" name="vendor_password" value="<?php if(isset($_COOKIE['password']))echo $_COOKIE['password']; ?>">
                 
                </div>
				  <span id="password_error" style="color:red; padding-top:5px;"></span>
              </div>
              <div class="form-group">
                <label class="ms-checkbox-wrap">
                  <input class="form-check-input" type="checkbox" value="" name="remember_me" <?php if(isset($_COOKIE['email'])) echo "checked"; ?>>
                  <i class="ms-checkbox-check"></i>
                </label>
                <span> Remember Password </span>
                <label class="d-block mt-3"><a href="#" class="btn-link" data-toggle="modal" id="btn" data-target="#modal-12">Forgot Password?</a></label>
				
				<label class="d-block mt-3"><a href="registration.php" class="btn-link" >Sign in</a></label>
              </div>
              
			  <button class="btn btn-primary mt-4 d-block w-100" type="submit" name="login">Login </button>
              
             </div> 
            </form>
			
          </div>
        </div>
      </div>

    </div>

    <!-- Forgot Password Modal -->
    <div class="modal fade" id="modal-12" tabindex="-1" role="dialog" aria-labelledby="modal-12">
      <div class="modal-dialog modal-dialog-centered modal-min" role="document">
        <div class="modal-content">

          <div class="modal-body text-center">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <i class="flaticon-secure-shield d-block"></i>
            <h1>Forgot Password?</h1>
            <p> Enter your email to recover your password </p>
            <form method="post">
              <div class="ms-form-group has-icon">
                <input type="text" placeholder="Email Address" class="form-control" name="forget_email">
                <i class="material-icons">email</i>
              </div>
			  <div style="color:red; text-transform: uppercase;" class="col-12 text-center">
								<?php if(isset($_GET['status']) && $_GET['status']!="")
								{
									
									echo "<input type='hidden' id='err' value='".$_GET['status']."'"; 
									echo "<br>";
									echo "INVALID EMAIL";
								}?>
			</div>
              <button type="submit" class="btn btn-primary shadow-none" name="send">Reset Password</button>
			 
            </form>
          </div>

        </div>
      </div>
    </div>

  </main>
  <!-- SCRIPTS -->
  <!-- Global Required Scripts Start -->
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/perfect-scrollbar.js"> </script>
  <script src="js/jquery-ui.min.js"> </script>
  <!-- Global Required Scripts End -->

  <!-- Mystic core JavaScript -->
  <script src="js/framework.js"></script>

  <!-- Settings -->
  <script src="js/settings.js"></script>
</body>

</html>