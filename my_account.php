<?php
include "connect.php";
session_start();

if($_SESSION['userid']=="")
{
		header("location:index.php");
}

if(isset($_POST['submit']))
{
	$id=$_POST['id'];
	$name=$_POST['name'];
	$contact=$_POST['contact'];
	$gender=$_POST['gender'];
	$city=$_POST['city'];
	$address=$_POST['address'];
	$birthdate=$_POST['bday'];
	$email=$_POST['email'];
	$username=$_POST['username'];

	$error="";
	$link->where("client_id_pk",$id);
	$sql=$link->update("client_tb",Array("client_name"=>$name,"client_contact"=>$contact,"client_gender"=>$gender,"client_address"=>$address,"client_city_id"=>$city,"client_birthdate"=>$birthdate,"client_email"=>$email,"client_username"=>$username));
	if($sql)
	{
		header("location:index.php");
	}
	else
	{
		$error="something went wrong";
	}
	
}

?>


<!doctype html>
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
    <title>My Account</title>

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

		var name=document.frm.name.value;
		var pattern=/^[A-Za-z0-9 _]*$/;
		if(name=="")
		{
			document.getElementById("err_name").innerHTML="It must not be blank";
			document.getElementById('idname').style.borderColor='#ff0000';
			s=false;
		}
		else if(!pattern.test(name))
		{
			document.getElementById("err_name").innerHTML="Invalid username";
			document.getElementById('idname').style.borderColor='#ff0000';
			s=false;
		}
		
		var contact=document.frm.contact.value;
		var pattern=/^[6-9]{1}[0-9]{9}$/;
		
		if(contact=="")
		{
			document.getElementById("err_contact").innerHTML="It must not be blank";
			document.getElementById('idcontact').style.borderColor='#ff0000';
			s=false;
		}
		else if(!pattern.test(contact))
		{
			document.getElementById("err_contact").innerHTML="Must be a valid number";
			document.getElementById('idcontact').style.borderColor='#ff0000';
			s=false;
		}
		var address=document.frm.address.value;
		if(address=="")
		{
			document.getElementById("err_address").innerHTML="It must not be blank";
			document.getElementById('idaddress').style.borderColor='#ff0000';
			s=false;
		}
		var city=document.frm.city.value;
		if(city==-1)
		{
			document.getElementById("err_city").innerHTML="Select valid City";
			document.getElementById('idcity').style.borderColor='#ff0000';
			s=false;
		}
		
		
		var date=document.frm.bday.value;
		if(date=="")
		{
			document.getElementById("err_bday").innerHTML="It must not be blank";
			document.getElementById('idbday').style.borderColor='#ff0000';
			s=false;
		}
		
		var email=document.frm.email.value;
		var pattern= /^([a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$)/;
		if(email=="")
		{
			document.getElementById("err_email").innerHTML="It must not be blank";
			document.getElementById('idemail').style.borderColor='#ff0000';
			s=false;
		}
		else if(!pattern.test(email))
		{
			document.getElementById("err_email").innerHTML="Invalid Email";
			document.getElementById('idemail').style.borderColor='#ff0000';
			s=false;
		}
	
		
		var username=document.frm.username.value;
		if(username=="")
		{
			document.getElementById("err_username").innerHTML="It must not be blank";
			document.getElementById('idusername').style.borderColor='#ff0000';
			s=false;
		}
		
		return s;
	}
	
	
	
	</script>
	
</head>
    <body>
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">
            <div class="biz-preloader"></div>
        </div>
    </div>
    <!-- header start -->
    <?php
	include "header.php";
	?>
    <!-- header end -->

        <!-- page- title area start -->
        <div class="page-title-area pt-200 pb-200">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title text-center mb-20">
                            <h3>My Account </h3>
                        </div>
                        <div class="breadcrum-list">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">My Account</li>
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
                   
                    <div class="col-md-12">
                        <div class="login-content mb-30">
                           
                            <form method="post" name="frm" onSubmit="return validate()">
						
							<?php
							if(isset($_SESSION['user']))
							{
							$sql=$link->rawQuery("select * from client_tb where client_id_pk=?",Array($_SESSION['userid']));
							foreach($sql as $s)
							{
							?>
								<input type="text" name="id" value="<?php echo $s['client_id_pk']; ?>" hidden>
                                <label>Name</label>
                                <input type="text" name="name" id="idname" placeholder="Enter Name" value="<?php echo $s['client_name']; ?>"/>
								 <span id="err_name" style="color:red; float:left;"></span>
								 <br/>
								 <br/>
                                <label>Contact</label>								
                               <input type="text" name="contact" id="idcontact" placeholder="Enter Contact" value="<?php echo $s['client_contact']; ?>"/>
							   
							    <span id="err_contact" style="color:red; float:left;"></span>
								<br/>
								<br/>
							   
                                <label>Gender</label>
								<input type="radio" style="height:14px;width:30px;" name="gender" id="idgender" value="male" 
								<?php
								if($s['client_gender']=="male")
								{
									echo "checked";
								}
								?>
								/>Male
                                <input type="radio" style="height:14px;width:30px;" name="gender" id="idgender" value="female" 
								<?php
								if($s['client_gender']=="female")
								{
									echo "checked";
								}
								?>
								/>Female <br/>
								 
								
								<label>Address</label>
								<br/>
								<input type="text" name="address" id="idaddress" placeholder="Enter address" value="<?php echo $s['client_address']; ?>"/>
								<br/>
								
								 <span id="err_address" style="color:red; float:left;"></span>
								<br/>
								
								<div class="country-select">
                                            <label>City</label>                                         
                                            
                                            <select style="display: none;" name="city" id="idcity">
                                                <option value="-1">Select City</option>
												<?php
												$city=$link->rawQuery("select * from city_tb");
												foreach($city as $c)
												{
													?>
													<option value="<?php echo $c['city_id']; ?>" <?php if($s['client_city_id']==$c['city_id']) {echo "selected";}?>>
													<?php echo $c['city_name']; ?>
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
								<input type="date" name="bday" id="idbday" 
								value="<?php echo $s['client_birthdate']; ?>">
								<br/>
								 <span id="err_bday" style="color:red; float:left;"></span>
								 <br/>
								
								<label>Email</label>
								<br/>
								<input type="text" name="email" id="idemail" placeholder="Enter Email" value="<?php echo $s['client_email']; ?>">
								<br/>
								 <span id="err_email" style="color:red; float:left;"></span>
								 <br/>
								
								<label>Username</label>
								<br/>
								<input type="text" name="username" id="idusername" placeholder="Enter Username" value="<?php echo $s['client_username']; ?>">
								<br/>
								 <span id="err_username" style="color:red; float:left;"></span>
								 <br/>
								
								

                                <input class="login-sub" type="submit" value="Edit" name="submit"/>
								 <span id="err_all" style="color:red; float:left;">
								 <?php 
								 if(isset($error))
								 {
									echo $error;
								 }
								 ?>
								 </span>
								<?php
									}
							}
							
						?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- login-area end -->

        <!-- footer start -->
        <?php
			include "footer.php"
			?>
        <!-- footer end -->



        <!-- Modal Search -->
        <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form>
                        <input type="text" placeholder="Search here...">
                        <button>
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

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

</html>
