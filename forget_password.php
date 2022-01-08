<?php
include 'connect.php';
session_start();


if(isset($_POST['send']) )
{
		require_once ('phpmailer/PHPMailerAutoload.php');
		
		$email=$_POST['email'];
		$sql=$link->rawQuery("select * from client_tb where client_email=?",Array($email));
		if($link->count>0)
		{
	
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
			Change Password<br>
			<a href='http://localhost/project/StoreToDoor/update_password.php?email=$email'>Click me</a></body></html>";
			$mail->SetFrom("storetodoor@accreteit.com","StoreToDoor");
			$mail->Subject = "StoreToDoor Client Password Change Request";
			$mail->MsgHTML($var);
			$mail->AddAddress($email);
			$mail->Send();	
			$status="";
			header("location:forget_password.php?status=".$status);
		}
		else
		{
			header("location:forget_password.php?error=not valid email address");
		}
			
}


?>

<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
        <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="keywords" content="Shopse HTML5 Css3 Template" />
    <meta name="description" content="Shopse - Multipurpose eCommerce HTML5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <!-- Title  -->
    <title>Client Login </title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Carousel -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Animate -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- Popup -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <!-- themify -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Icon font -->
	  <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/icon-font.css">
    <!-- Menu -->
    <link rel="stylesheet" href="css/meanmenu.css">
    <link rel="stylesheet" href="css/slick.css">
    <!-- default -->
    <link rel="stylesheet" href="css/default.css">
    <!-- Template styles-->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive -->
    <link rel="stylesheet" href="css/responsive.css">
    </head>


    <body style="background-image: url(images/wallpaper2.jpg);background-size: cover;">
        <div class="wrapper-page">

<div class="page-title-area pt-200 pb-200">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title text-center mb-20">
                            <h3>Reset Password? </h3>
                          
                        </div>
                        <div class="breadcrum-list">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="card">
                <div class="card-body">

                    <h3 class="text-center m-0">
                        <a href="index.html" class="logo logo-admin">
							 <a href="index.php" class="logo">
                       
						</a>
                    </h3>

                    <div class="p-3">
                      
                        
                        <form class="form-horizontal m-t-30" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                           
                            <div class="form-group">
                            	

                                <label for="username" style="color:#444;">Enter Email</label>
                                <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" required>
                            </div>

                            
							
                            <div class="form-group row m-t-20">
                               
                                <div class="col-12 text-center">
								
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit" name="send">Send Request
									</button>
									
                                </div>
								<div style="color:red; text-transform: uppercase;" class="col-12 text-center">
								<?php
								if(isset($_GET['status']))
								{
								echo $_GET['status'];
								}
								?>
								</div>
								<div style="color:red; text-transform: uppercase;" class="col-12 text-center">
								<?php if(isset($_GET['error']) && $_GET['error']!=""){echo $_GET['error'];}?></div> 
								
								
                            </div>
							

                            
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
                
              <p>
                      Copyright © 2020 StoorToDoor. All Rights Reserved - <span class="d-none d-sm-inline-block"> Developed By <i class="mdi mdi-heart text-danger"></i>Azima, Mohit & Sakshi</span>
						</p>
            </div>


        </div>

          <!-- jQuery  -->
  <script src="js/modernizr-3.5.0.min.js"></script>
        <script src="js/jquery-1.12.4.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <!-- popper.min -->
        <script src="js/popper.min.js"></script>
        <!-- bootstrap -->
        <script src="js/bootstrap.min.js"></script>
        <!-- owl carousel -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- isotope.pkgd.min js -->
        <script src="js/isotope.pkgd.min.js"></script>
        <!-- one page js -->
        <script src="js/one-page-nav-min.js"></script>
        <!-- isotope.pkgd.min js -->
        <script src="js/slick.min.js"></script>
        <!-- ajax form js -->
        <script src="js/ajax-form.js"></script>
        <!-- animate -->
        <script src="js/wow.min.js"></script>
        <!-- scrollup.min -->
        <script src="js/jquery.scrollUp.min.js"></script>
        <!-- imagesloaded.min -->
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <!-- popup.min -->
        <script src="js/jquery.magnific-popup.min.js"></script>
        <!-- plugins -->
        <script src="js/plugins.js"></script>
        <!-- custom scripts -->
        <script src="js/main.js"></script>
</body>

</html>
<?php

?>