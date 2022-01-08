<?php
include "connect.php";
session_start();
if(isset($_SESSION['admin_username']) && isset($_SESSION['admin_password']) )
{
	header("location:admin_index.php");
}

if(isset($_POST['login']) )
{
	
	
	$username=$_POST['admin_username'];
	$password=$_POST['admin_password'];
	if(isset($_POST['remember_me']))
	{
		setcookie("username",$username,time()+24*60*60);
		setcookie("password",$password,time()+24*60*60);
	}
	else
	{
		setcookie("username");
		setcookie("password");

	}
	$sql=$link->rawQueryOne("select * from admin where admin_username=? and admin_password=?",Array($username,$password));
	if($link->count >0)
	{

		$_SESSION['admin_username']=$username;
		$_SESSION['admin_password']=$password;
		
		header("location:admin_index.php");
	}
	else
	{
		$err="invalid user";
		header("location:admin_index.php?error=".$err);
	}
}


?>

<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>login</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="images/favicon.png">

        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="css/metismenu.min.css" rel="stylesheet" type="text/css">
        <link href="css/icons.css" rel="stylesheet" type="text/css">
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>


    <body style="background-image: url(images/wallpaper2.jpg);background-size: cover;">
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center m-0">
                        <a href="index.html" class="logo logo-admin"><img src="images/storetodoor-logo.png" width="60%" alt="logo"></a>
                    </h3>

                    <div class="p-3">
                        <h4 class="text-muted font-18 m-b-5 text-center">Welcome</h4>
                        <p class="text-muted text-center">Sign in to StoreToDoor Admin.</p>
                        <form class="form-horizontal m-t-30" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                            
                            <div class="form-group">
                            	<div style="color:red; text-transform: uppercase;"><?php if(isset($_GET['error']) && $_GET['error']!=""){echo $_GET['error'];}?></div>
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter username" name="admin_username" value="<?php if(isset($_COOKIE['username']))echo $_COOKIE['username']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="userpassword">Password</label>
                                <input type="password" class="form-control" id="userpassword" placeholder="Enter password" name="admin_password"  value="<?php if(isset($_COOKIE['password']))echo $_COOKIE['password']; ?>" required>
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlInline" name="remember_me" <?php if(isset($_COOKIE['username'])) echo "checked"; ?>>
                                        <label class="custom-control-label" for="customControlInline" >Remember me</label>
                                    </div>
                                </div>
                                <div class="col-6 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit" name="login">Log In</button>
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-12 m-t-20">
                                    <a href="forget_password.php" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            


        </div>
<div class="m-t-40 text-center">
               
                        © 2019 StoretoDoor All Rights Reserved - <span class="d-none d-sm-inline-block"> Developed By :-  Azima Shaikh, Mohit Tutlani, Sakshi Shah</span>
               
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