<?php
include 'connect.php';
if(isset($_POST['submit']))
{
	echo $vendor_name=$_GET["name"];
	$name=$_POST["name"];
	$contact=$_POST['contact'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$zipcode=$_POST['zipcode'];
	
	$sql=$link->rawQueryOne("select * from vendor_personal_tb where vendor_name=?",Array($vendor_name));
	
			
				$img=$_FILES['shop_image']['name'];			
				$ext=pathinfo($img,PATHINFO_EXTENSION);				
				$image_path="../images/shop/".$name.".".$ext;			
			
				if(move_uploaded_file($_FILES['shop_image']['tmp_name'], $image_path))
				{
					
					$sql1=$link->insert("vendor_shop_tb",Array("shop_name"=>$name,"shop_contact"=>$contact,"shop_email"=>$email,"shop_address"=>$address,"shop_zipcode"=>$zipcode,"shop_image"=>$image_path,"shop_vendor_id"=>$sql["vendor_id_pk"]));
					$link->insert("notification_tb",Array("vendor_id"=>$sql1));
					if($sql1)
					{					
						header("location:vendor_index.php");
					}
				}
		
		}
		
	
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from slidesigma.com/themes/html/Mystic/light/pages/form/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2019 10:13:24 GMT -->
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Shop Registration</title>
  <!-- Iconic Fonts -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/cryptocoins.css">
  <link rel="stylesheet" href="css/cryptocoins-colors.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- jQuery UI -->
  <link href="css/jquery-ui.min.css" rel="stylesheet">
  <!-- Page Specific CSS (Slick Slider.css) -->
  <link href="css/slick.css" rel="stylesheet">
  <!-- Mystic styles -->
  <link href="css/style.css" rel="stylesheet">
  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32"  href="images/favicon.png">
<script>
	function validate()
	{
		
		var s=true;
		document.getElementById("err_name").innerHTML="";
		document.getElementById("err_contact").innerHTML="";
		document.getElementById("err_address").innerHTML="";
		document.getElementById("err_zipcode").innerHTML="";
		document.getElementById("err_email").innerHTML="";
	
		
		
		document.getElementById('idname').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idcontact').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idaddress').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idzipcode').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idemail').style.borderColor='rgba(0,0,0,0.1)';
	
		
		
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
			document.getElementById('err_address').innerHTML="It must not be blank";
			document.getElementById('idaddress').style.borderColor='#ff0000';
			s=false;
		}
		var zipcode=document.frm.zipcode.value;
		if(zipcode=="")
		{
			document.getElementById('err_zipcode').innerHTML="It must not be blank";
			document.getElementById('idzipcode').style.borderColor='#ff0000';
			s=false;
		}
		else if(isNaN(zipcode))
		{
			document.getElementById('err_zipcode').innerHTML="Enter Digits Only";
			document.getElementById('idzipcode').style.borderColor='#ff0000';
			s = false;
		}

		else if(zipcode.length != 6)
		{
			document.getElementById('err_zipcode').innerHTML="6 Digits only";
			document.getElementById('idzipcode').style.borderColor='#ff0000';
			s = false;
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
		
		return s;
	}
	
		

	
	</script>
</head>

<body class="ms-body ms-aside-left-open ms-primary-theme ms-has-quickbar" style="background-color:white;">

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
 

  <!-- Sidebar Right -->
  

  <!-- Main Content -->
 <center>
  <div class="col-md-10">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h1>Vendor Shop Registration</h1>
            </div>
            <div class="ms-panel-body">
              <form class="ms-form-wizard style1-wizard" method="post" enctype="multipart/form-data" name="form" onSubmit="return validate()">
               
                <div class="ms-wizard-step">
                  <div class="form-row">
                    <div class="col-md-12 mb-3">
                      <label style="float:left;">Shop Name</label>
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Name" name="name" id="idname">
                      </div>
					  <span id="err_name" style="color:red; float:left;"></span>
                    </div>
					
				  <div class="col-md-12 mb-3">
                    <label style="float:left;">Shop Contact</label>
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Contact" name="contact" id="idcontact">
						
						</div>
						<span id="err_contact" style="color:red; padding-top:5px; float:left;"></span>
					</div>
                    <div class="col-md-12 mb-2">
                      <label style="float:left;">Shop Address</label>
                      <div class="input-group">
                  <textarea class="form-control" id="idaddress" rows="3" name="address" placeholder="Address"></textarea>

                      </div>
					  <span id="err_address" style="color:red; padding-left:8px; float:left;"></span>
                    </div>
                  
				  
                    <div class="col-md-12 mb-3">
					<div style="color:red; text-transform: uppercase;float:left">
					
					</div>
					<br>
                      <label style="float:left;">Shop Zipcode</label>
                      <div class="input-group">
                        <input type="text" class="form-control " placeholder="Zipcode" name="zipcode" id="idzipcode">
                      </div>
					  <span id="err_zipcode" style="color:red; padding-left:8px; float:left;"></span>
                    </div>
					<div class="col-md-12 mb-2">
                      <label style="float:left;">Vendor Name</label>
                      <div class="input-group">
                        <input type="text" class="form-control " value="<?php echo $_GET["name"]; ?>"  readonly>
                      </div>
                    </div>
					<div class="col-md-12 mb-2">
                      <label style="float:left;">Shop Image</label>
                      <div class="input-group">
                        <input type="file" class="form-control" name="shop_image">
                      </div>
					  <span id="err_image" style="color:red; padding-left:8px; float:left;"></span>
                    </div>
                    <div class="col-md-12 mb-2">
                      <label style="float:left;">Shop Email</label>
                      <div class="input-group">
                        <input type="text" class="form-control " placeholder="Email" name="email" id="idemail">
                      </div>
					   <span id="err_email" style="color:red; padding-left:8px; float:left;"></span>
                    </div>
				  </div>
                </div>
               
                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                
                
              </form>
            </div>
          </div>
        </div>
		</center>
  

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


<!-- Mirrored from slidesigma.com/themes/html/Mystic/light/pages/form/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2019 10:13:24 GMT -->
</html>
