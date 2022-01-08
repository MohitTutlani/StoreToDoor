<?php
include "connect.php";
session_start();


if(isset($_POST['send']) )
{
		require_once ('phpmailer/PHPMailerAutoload.php');
		
		$email=$_POST['email'];
		$sql=$link->rawQuery("select * from admin where admin_email=?",Array($email));
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
			<a href='http://localhost/project/StoreToDoor/admin/update_password.php?email=$email'>Click me</a></body></html>";
			$mail->SetFrom("storetodoor@accreteit.com","StoreToDoor");
			$mail->Subject = "StoreToDoor Admin Password Change Request";
			$mail->MsgHTML($var);
			$mail->AddAddress($email);
			$mail->Send();	
			$status="";
			header("location:forget_password.php?status=".$status);
		}
		else
		{
			header("location:forget_password.php?error=not valid mail");
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
        <title>Forget Password</title>
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
                        <a href="index.html" class="logo logo-admin">
							 <a href="index.php" class="logo">
                        <span style="color:#000;">
                            Store to Door

                        </span>
						</a>
                    </h3>

                    <div class="p-3">
                        <h4 class="text-muted font-18 m-b-5 text-center">Forget Password</h4>
                        
                        <form class="form-horizontal m-t-30" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                           
                            <div class="form-group">
                            	

                                <label for="username">Enter Email</label>
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
                        © 2019 StoretoDoor All Rights Reserved - <span class="d-none d-sm-inline-block"> Developed By <i class="mdi mdi-heart text-danger"></i> Nancy & Nidhi</span>
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