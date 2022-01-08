<?php 

include "connect.php";
session_start();

if(isset($_GET['email']))
{
	$email=$_GET['email'];
}


if(isset($_POST['resend']) )
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
		$link->where("vendor_email",$email);
		$sql=$link->update("vendor_personal_tb",Array("vendor_password"=>$new_password));
		header("location:vendor_index.php");
	}
	
		
	
}


?>
<!DOCTYPE html>
<html lang="en">


<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Update Password</title>
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
  

  <!-- Preloader -->
  <div id="preloader-wrap">
    <div class="spinner spinner-8">
      <div class="ms-circle1 ms-child"></div>
      <div class="ms-circle2 ms-child"></div>
      <div class="ms-circle3 ms-child"></div>
      <div class="ms-circle4 ms-child"></div>
      <div class="ms-circle5 ms-child"></div>
      <div class="ms-circle6 ms-child"></div>
      <div class="ms-circle7 ms-child"></div>
      <div class="ms-circle8 ms-child"></div>
      <div class="ms-circle9 ms-child"></div>
      <div class="ms-circle10 ms-child"></div>
      <div class="ms-circle11 ms-child"></div>
      <div class="ms-circle12 ms-child"></div>
    </div>
  </div>

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
		  
		  
            <form class="needs-validation" novalidate="" method="post" >
			<div style="background-color:white; padding-right:30px; padding-left:30px; padding-top:30px; padding-bottom:30px;">
              
              <p>Please enter your new password.</p>
              <div class="mb-3">
			  
			 <input type="text" name="email" value="<?php 
							 if(isset($email))
							 {echo $email;} ?>" hidden>
			  
                <label for="validationCustom08">Password</label>
                <div class="input-group">
                  <input type="password" class="form-control" id="validationCustom08" placeholder="Enter Password" required name="new_password">
                  
                </div>
              </div>
              <div class="mb-3">
			  
			 
			  
                <label for="validationCustom08">Confirm Password</label>
                <div class="input-group">
                  <input type="password" class="form-control" id="validationCustom08" placeholder="ReEnter Password" required name="confirm_password">
                  
                </div>
              </div>
			  <div style="color:red;" class="col-12 text-center">
								<?php
								if(isset($_GET['error']))
								{
								echo $_GET['error'];
								}
								?>
								</div>
              
              
			  <input type="submit" class="btn btn-primary mt-4 d-block w-100" name="resend" value="Reset Password"/>
              
             </div> 
            </form>
			
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
