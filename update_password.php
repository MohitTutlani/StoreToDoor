<?php
include "connect.php";
session_start();

if(isset($_GET['email']))
{
	$email=$_GET['email'];
}


if(isset($_POST['reset']) )
{
	
	 $new_password=$_POST['new_password'];
	 $confirm_password=$_POST['confirm_password'];
	 $email=$_POST['email'];
	
	if($new_password!=$confirm_password)
	{
		header("location:update_password.php?error=password must match&email=".$email);
	}
	else
	{
	$link->where("client_email",$email);
	$sql=$link->update("client_tb",Array("client_password"=>$new_password));
	
	header("location:login.php?flag=0");
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
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
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
		
		<script>
	function validate()
	{
		var s=true;
		document.getElementById("pass1").innerHTML="";
		document.getElementById("pass2").innerHTML="";
		var new_password=document.frm.new_password.value;
		var confirm_password=document.frm.confirm_password.value;
		
		
		if(new_password=="")
		{
			document.getElementById("pass1").innerHTML="It must not be blank";
			s=false;
		}
		else if(!(new_password.length>=6 && new_password.length <=12))
		{
			document.getElementById("pass1").innerHTML="Password must be 6 to 12 character long";
			s=false;
		}
	
		var pass=document.frm.confirm_password.value;
		if(confirm_password=="")
		{
			document.getElementById("pass2").innerHTML="It must not be blank";
			s=false;
		}
		
		else if(!(confirm_password.length>=6 && confirm_password.length <=12))
		{
			document.getElementById("pass2").innerHTML="Password must be 6 to 12 character long";
			s=false;
		}
		return s;
	}
	
	</script>
    </head>


    <body style="background-image: url(images/wallpaper2.jpg);background-size: cover;">
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center m-0">
                       
						<!--<a href="index.php" class="logo">-->
                        <div class="page-title-area pt-200 pb-200">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title text-center mb-20">
                            <h3>Change Password </h3>
                          
                        </div>
                        <div class="breadcrum-list">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    </h3>

                    <div class="p-3">
                        
                      
                        <form class="form-horizontal m-t-30" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="frm" onSubmit="return validate()">
						
                             <input type="text" name="email" value="<?php 
							 if(isset($email))
							 {echo $email;} ?>" hidden>
                            <div class="form-group" >
                            	
                                <label for="username">New Password</label>
                                <input type="password" class="form-control" id="new_password" placeholder="Enter Password" name="new_password">
								<span id="pass1" style="color:red;"></span>
                            </div>

                            <div class="form-group">
                                <label for="userpassword">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" placeholder="Confirm password" name="confirm_password">
								<span id="pass2" style="color:red;"></span>
                            </div>
							
							<div style="color:red;" class="col-12 text-center">
								<?php
								if(isset($_GET['error']))
								{
								echo $_GET['error'];
								}
								?>
								</div>
								

                            <div class="form-group row m-t-20">
                                
                               <div class="col-12 text-center">
								
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit" name="reset">Change Password
									</button>
									
                                </div>
                            </div>

                            
                        </form>
                    </div>

                </div>
            </div>

             <div class="m-t-40 text-center">
                
              <p>
				© 2019 StoretoDoor All Rights Reserved - <span class="d-none d-sm-inline-block"> Developed By <i class="mdi mdi-heart text-danger"></i> Nancy & Nidhi</span>
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