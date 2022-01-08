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
	$link->where("admin_email",$email);
	$sql=$link->update("admin",Array("admin_password"=>$new_password));
	
	header("location:admin_login.php");
	}
		
		
	
	
	
}


?>

<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>update password</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="images/favicon.png">

        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/metismenu.min.css" rel="stylesheet" type="text/css">
        <link href="css/icons.css" rel="stylesheet" type="text/css">
        <link href="css/style.css" rel="stylesheet" type="text/css">
		
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
                        <a href="index.html" class="logo logo-admin"> <a href="index.php" class="logo">
                        <span style="color:#000;">
                            Store to Door

                        </span></a>
                    </h3>

                    <div class="p-3">
                        
                        <p class="text-muted text-center">Reset Password</p>
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
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit" name="reset">Reset Password</button>
                                </div>
                            </div>

                            
                        </form>
                    </div>

                </div>
            </div>

             <div class="m-t-40 text-center">
                
              <p>
				© 2020 StoretoDoor All Rights Reserved - <span class="d-none d-sm-inline-block"> Developed By - Azima Shaikh, Mohit Tutlani, Sakshi Shah</span>
				</p>
            </div>

        </div>

          <!-- jQuery  -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/metisMenu.min.js"></script>
  <script src="js/jquery.slimscroll.js"></script>
  <script src="js/waves.min.js"></script>

  <script src="js/jquery.sparkline.min.js"></script>

  <!-- App js -->
  <script src="js/app.js"></script>

</body>

</html>
<?php

?>