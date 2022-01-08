<?php
include 'connect.php';
session_start();
$flag=$_GET['flag'];


if(isset($_POST['login']))
{
	$username=$_POST['login_username'];
	$password=$_POST['login_password'];
	$login_error="";
	$sql=$link->rawQuery("select * from client_tb where client_username=? and client_password=? and is_active=?",Array($username,$password,1));
	if($link->count==1)
	{
		$_SESSION['user']=$username;
		$_SESSION['cart']=$sql["client_id_pk"];
		
		if(isset($_POST['remember']))
		{
			setcookie("username",$username,time()+24*60*60);
			setcookie("password",$password,time()+24*60*60);
			header("location:category.php");
			
		}
		else
		{
			setcookie("username","",time()-1);
			setcookie("password","",time()-1);
		}
		
		foreach($sql as $s)
		{
			$_SESSION['userid']=$s['client_id_pk'];
		}
		if($flag==1)
		{
			header("location:view_cart.php");
		}
		else
		{
			header("location:index.php");
		}	
	}
	else
	{
		$login_error="INVALID USER";
	}
}
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$contact=$_POST['contact'];
	$gender=$_POST['gender'];
	$city=$_POST['city'];
	$address=$_POST['address'];
	$birthdate=$_POST['bday'];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$error="";
	
	$sql=$link->insert("client_tb",Array("client_name"=>$name,"client_contact"=>$contact,"client_gender"=>$gender,"client_address"=>$address,"client_city_id"=>$city,"client_birthdate"=>$birthdate,"client_email"=>$email,"client_username"=>$username,"client_password"=>$password));
	$link->insert("notification_tb",Array("client_id"=>$sql));
	
	if($sql)
	{
		header("location:login.php?flag=0");
		
	}
	else
	{
		$error="something went wrong";
	}
	

	
}
?>
<html class="no-js" lang="zxx">

<head>
    <!-- Metas -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="keywords" content="Shopse HTML5 Css3 Template" />
    <meta name="description" content="Shopse - Multipurpose eCommerce HTML5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <!-- Title  -->
    <title>StoreToDoor Sign In</title>

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
	<!--slick -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- default -->
    <link rel="stylesheet" href="css/default.css">
    <!-- Template styles-->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive -->
    <link rel="stylesheet" href="css/responsive.css">
	
	<script type="text/javascript">
	function validate()
	{
		var s=true;
			
		document.getElementById("err_name").innerHTML="";
		document.getElementById("err_contact").innerHTML="";
		document.getElementById("err_address").innerHTML="";
		document.getElementById("err_city").innerHTML="";
		document.getElementById("err_bday").innerHTML="";
		document.getElementById("err_email").innerHTML="";
		document.getElementById("err_username").innerHTML="";
		document.getElementById("err_password").innerHTML="";
		
		document.getElementById('idname').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idcontact').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idaddress').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idcity').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idbday').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idemail').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idusername').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idpassword').style.borderColor='rgba(0,0,0,0.1)';

		var name=document.register.name.value;
		var pattern=/^[A-Za-z0-9 _]*$/;
		if(name=="")
		{
			
			document.getElementById("err_name").innerHTML="Enter Name";
			document.getElementById('idname').style.borderColor='#ff0000';
			s=false;
		}
		else if(!pattern.test(name))
		{
			document.getElementById("err_name").innerHTML="Invalid username";
			document.getElementById('idname').style.borderColor='#ff0000';
			s=false;
		}
		var contact=document.register.contact.value;
		var pattern=/^[6-9]{1}[0-9]{9}$/;
		
		if(contact=="")
		{
			document.getElementById("err_contact").innerHTML="Enter Contact Number";
			document.getElementById('idcontact').style.borderColor='#ff0000';
			s=false;
		}
		else if(!pattern.test(contact))
		{
			document.getElementById("err_contact").innerHTML="Enter a valid number";
			document.getElementById('idcontact').style.borderColor='#ff0000';
			s=false;
		}
		var address=document.register.address.value;
		if(address=="")
		{
			document.getElementById("err_address").innerHTML="Enter Address";
			document.getElementById('idaddress').style.borderColor='#ff0000';
			s=false;
		}
		var city=document.register.city.value;
		if(city==-1)
		{
			document.getElementById("err_city").innerHTML="Select a City";
			document.getElementById('idcity').style.borderColor='#ff0000';
			s=false;
		}
		
		
		var date=document.register.bday.value;
		if(date=="")
		{
			document.getElementById("err_bday").innerHTML="Enter Date Of Birth";
			document.getElementById('idbday').style.borderColor='#ff0000';
			s=false;
		}
		
		var email=document.register.email.value;
		var pattern= /^([a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$)/;
		if(email=="")
		{
			document.getElementById("err_email").innerHTML="Enter E-mail Id";
			document.getElementById('idemail').style.borderColor='#ff0000';
			s=false;
		}
		else if(!pattern.test(email))
		{
			document.getElementById("err_email").innerHTML="Invalid Email";
			document.getElementById('idemail').style.borderColor='#ff0000';
			s=false;
		}
	
		var pass=document.register.password.value;
		if(pass=="")
		{
			document.getElementById("err_password").innerHTML="Enter Password";
			document.getElementById('idpassword').style.borderColor='#ff0000';
			s=false;
		}
		
		else if(!(pass.length>=6 && pass.length <=12))
		{
			document.getElementById("err_password").innerHTML="Password must be 6 to 12 character long";
			document.getElementById('idpassword').style.borderColor='#ff0000';
			s=false;
		}
		var username=document.register.username.value;
		if(username=="")
		{
			document.getElementById("err_username").innerHTML="Enter Username";
			document.getElementById('idusername').style.borderColor='#ff0000';
			s=false;
		}
		
		
		return s;
	}
	
	function login_validate()
	{
		var s =true;
		var pass=document.login_form.login_password.value;
		if(pass=="")
		{
			document.getElementById("err_login_password").innerHTML="Enter Password";
			document.getElementById('idlogin_password').style.borderColor='#ff0000';
			s=false;
		}
		
		else if(!(pass.length>=6 && pass.length <=12))
		{
			document.getElementById("err_login_password").innerHTML="Password must be 6 to 12 character long";
			document.getElementById('idlogin_password').style.borderColor='#ff0000';
			s=false;
		}
		var username=document.login_form.login_username.value;
		if(username=="")
		{
			document.getElementById("err_login_username").innerHTML="Enter Username";
			document.getElementById('idlogin_username').style.borderColor='#ff0000';
			s=false;
		}
		return s;
	
	}
	
	</script>
	
</head>
    <body>
    <!-- header start -->
    <?php
	include 'header.php';
	?>
    <!-- header end -->

        <!-- page- title area start -->
        <div class="page-title-area pt-200 pb-200">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title text-center mb-20">
                            <h3>Sign In</h3>
							
                        </div>
                        <div class="breadcrum-list">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Sign In</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page- title area end -->

        <!-- login-area start -->
        <div class="login-area gray-bg pt-40 pb-130">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="login-content mb-30">
                            <h2 class="login-title">Sign In</h2>
							
                            <p>Hello,Welcome to your account</p>
                            <div class="social-sign">
                                <a href="#">
                                    <i class="ti-facebook"></i> Sign in with facebook</a>
                                <a class="twitter" href="#">
                                    <i class="ti-twitter-alt"></i> Sign in with twitter</a>
                            </div>
                            <form method="post" name="login_form" onSubmit="return login_validate()">
								<div>	
								<label>Username</label>
                                <input type="text" name="login_username" id="idlogin_username" value="<?php if(isset($_COOKIE['username']))echo $_COOKIE['username']; ?>"/>
								<span id="err_login_username" style="color:red; float:left;"></span>
								</div>
								<br>
								<div>
                                <label>Password</label>
                                <input type="password" name="login_password" id="idlogin_password" value="<?php if(isset($_COOKIE['password']))echo $_COOKIE['password']; ?>" />
								<span id="err_login_password" style="color:red; float:left;"></span>
								</div>
                                <div class="login-lost">
                                    <span class="log-rem">
                                        <input type="checkbox" name="remember"/>
                                        <label>Remember me!</label>
                                    </span>
                                    <span class="forgot-login">
                                        <a href="forget_password.php">Forgot your password?</a>
                                    </span>
                                </div>
								<span id="err" style="color:red; float:left;">
								<?php if(isset($login_error))
								{
									echo $login_error;
								}
								?>
								</span>
								<br>
								<br>
                                <input class="login-sub" type="submit" value="Login" name="login"/>
								
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="login-content mb-30">
                            <h2 class="login-title">create a new account</h2>
                            <p>Create your own StoreToDoor account.</p>
                            <form method="post" name="register" onSubmit="return validate()">
                                <label>Name</label>
                                <input type="text" name="name" id="idname" placeholder="Enter Name"/>
								 <span id="err_name" style="color:red; float:left;"></span>
								 <br/>
								 <br/>
                                <label>Contact</label>								
                               <input type="text" name="contact" id="idcontact" placeholder="Enter Contact"/>
							   
							    <span id="err_contact" style="color:red; float:left;"></span>
								<br/>
								<br/>
							   
                                <label>Gender</label>
								<input type="radio" style="height:14px;width:30px;" name="gender" id="idgender" value="male" checked />Male
                                <input type="radio" style="height:14px;width:30px;" name="gender" id="idgender" value="female"/>Female <br/>
								 
								
								<label>Address</label>
								<br/>
								<input type="text" name="address" id="idaddress" placeholder="Enter address"/>
								<br/>
								
								 <span id="err_address" style="color:red; float:left;"></span>
								<br/>
								
								<div class="country-select">
                                            <label>City</label>                                         
                                            
                                            <select style="display: none;" name="city" id="idcity">
                                                <option value="-1">Select City</option>
												<?php
												$sql=$link->rawQuery("select * from city_tb");
												foreach($sql as $s)
												{
													?>
													<option value="<?php echo $s['city_id']; ?>">
													<?php echo $s['city_name']; ?>
													</option>
												<?php
												}
												?>
                                               
                                            </select>
                                </div>
								
								 <span id="err_city" style="color:red;"></span>
								 </br>
								</br>
								<label>Birth Date</label>
								<br/>
								<input type="date" name="bday" id="idbday">
								<br/>
								 <span id="err_bday" style="color:red; float:left;"></span>
								 <br/>
								
								<label>Email</label>
								<br/>
								<input type="text" name="email" id="idemail" placeholder="Enter Email">
								<br/>
								 <span id="err_email" style="color:red; float:left;"></span>
								 <br/>
								
								<label>Username</label>
								<br/>
								<input type="text" name="username" id="idusername" placeholder="Enter Username">
								<br/>
								 <span id="err_username" style="color:red; float:left;"></span>
								 <br/>
								
								<label>Password</label>
								<br/>
								<input type="password" name="password" id="idpassword" placeholder="Enter Password">
								<br/>
								 <span id="err_password" style="color:red; float:left;"></span>
								 <br/>

                                <input class="login-sub" type="submit" value="sign up" name="submit"/>
								 <span id="err_all" style="color:red; float:left;">
								 <?php 
								 if(isset($error))
								 {
								 echo $error;
								 }
								 ?>
								 </span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- login-area end -->

        <!-- footer start -->
        <?php
		include 'footer.php';
		?>
        <!-- footer end -->

        
        
        <!-- jQuery -->
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

<!-- Mirrored from xopom.xyz/shopse/shopse/demos/login.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2019 08:58:38 GMT -->
</html>
