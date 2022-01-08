<?php
include 'connect.php';
session_start();
$id=$_GET['v_id'];
if(!isset($_SESSION['vendor_email']) &&   !isset($_SESSION['vendor_password']) )
{
    header("location:vendor_index.php");
}
if(isset($_POST['edit']))
{
	$sid=$_POST['sid'];
	$name=$_POST['name'];
	$contact=$_POST['contact'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$zipcode=$_POST['zipcode'];
	
	
	$link->where('shop_id_pk',$sid);
	$update=$link->update("vendor_shop_tb",Array("shop_name"=>$name,"shop_contact"=>$contact,"shop_email"=>$email,"shop_address"=>$address,"shop_zipcode"=>$zipcode));
	
	if($update)
	{
		$photo=$_FILES['shop_image']['name'];
		$image_ext=pathinfo($photo,PATHINFO_EXTENSION);
		$image_path="../images/shop".$update["shop_name"].".".$image_ext;
	
	
	if(move_uploaded_file($_FILES['shop_image']['tmp_name'], $image_path)) 
	{
      $link->where('shop_id_pk',$sid);
      $s=$link->update("vendor_shop_tb",Array("shop_image"=>$image_path));

		$_SESSION['vendor']=$update;
				
		if($update)
		{
			header('location:vendor_dashboard.php');
		}
	  
    }
	}	
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Shop Details</title>
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
		document.getElementById("err_image").innerHTML="";
		document.getElementById("err_contact").innerHTML="";
		document.getElementById("err_address").innerHTML="";
		document.getElementById("err_zipcode").innerHTML="";
		document.getElementById("err_email").innerHTML="";
		document.getElementById("err_document").innerHTML="";
		
		
		document.getElementById('idname').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idcontact').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idaddress').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idzipcode').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idemail').style.borderColor='rgba(0,0,0,0.1)';
	
		
		
		var name=document.form.name.value;
		if(name==" ")
		{
			document.getElementById("err_name").innerHTML="Enter Shop Name";
			document.getElementById('idname').style.borderColor='#ff0000';
			s=false;
		}
		
		
		var contact=document.form.contact.value;
		var pattern=/^[6-9]{1}[0-9]{9}$/;
		
		if(contact=="")
		{
			document.getElementById("err_contact").innerHTML="Enter Contact Number";
			document.getElementById('idcontact').style.borderColor='#ff0000';
			s=false;
		}
		else if(!pattern.test(contact))
		{
			document.getElementById("err_contact").innerHTML="Enter valid number";
			document.getElementById('idcontact').style.borderColor='#ff0000';
			s=false;
		}

		var address=document.form.address.value;
		if(address=="")
		{
			document.getElementById('err_address').innerHTML="Enter Address";
			document.getElementById('idaddress').style.borderColor='#ff0000';
			s=false;
		}
		var zipcode=document.form.zipcode.value;
		if(zipcode=="")
		{
			document.getElementById('err_zipcode').innerHTML="Enter Zipcode";
			document.getElementById('idzipcode').style.borderColor='#ff0000';
			s=false;
		}
		else if(isNaN(zipcode))
		{
			document.getElementById('err_zipcode').innerHTML="Enter Valid Zipcode";
			document.getElementById('idzipcode').style.borderColor='#ff0000';
			s = false;
		}

		else if(zipcode.length != 6)
		{
			document.getElementById('err_zipcode').innerHTML="6 Digits only";
			document.getElementById('idzipcode').style.borderColor='#ff0000';
			s = false;
		}
		
		var email=document.form.email.value;
		var pattern= /^([a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$)/;
		if(email=="")
		{
			document.getElementById("err_email").innerHTML="Enter E-mail";
			document.getElementById('idemail').style.borderColor='#ff0000';
			s=false;
		}
		else if(!pattern.test(email))
		{
			document.getElementById("err_email").innerHTML="Enter valid E-mail";
			document.getElementById('idemail').style.borderColor='#ff0000';
			s=false;
		}
		return s;
	}
	</script>
</head>

<body class="ms-body ms-aside-left-open ms-primary-theme ms-has-quickbar">

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
  <?php include 'left_sidebar.php'; ?>

  <!-- Main Content -->
  <main class="body-content">
	<?php include 'vendor_header.php'; ?>
    <!-- Navigation Bar -->
    


    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <div class="row">
        
        <div class="col-md-12">
          <div class="ms-panel">
            <div class="ms-panel-header">
              <h1>Vendor Shop Details</h1>
            </div>
				<?php
				
				$s=$link->rawQueryOne("select * from vendor_shop_tb where shop_vendor_id=?",Array($id));
				if($link->count>0)
				{
					
				?>
				<form method="post" name="form" onSubmit="return validate()" enctype="multipart/form-data"> 
				<input type="hidden" name="sid" value="<?php echo $s['shop_id_pk'];?>" >
            <div class="ms-panel-body">
              
                <div class="form-group">
                  <label>Shop Name</label>
                  <input type="type" class="form-control" name="name" id="idname" value="<?php echo $s['shop_name'];?>">
				  <span id="err_name" style="color:red;"> </span>
                </div>
                <div class="form-group">
                  <label>Contact</label>
                  <input type="type" class="form-control" name="contact" id="idcontact" value="<?php echo $s['shop_contact']; ?>">
				  <span id="err_contact" style="color:red;"></span> 
                </div>
                <div class="form-group">
                  <label>Address</label>
                  <textarea class="form-control" id="idaddress" rows="3" name="address"><?php echo $s['shop_address']; ?></textarea>
				  <span id="err_address" style="color:red;"></span> 
                </div>
				<div class="form-group">
                  <label>Zipcode</label>
                  <input type="type" name="zipcode" class="form-control" id="idzipcode" value="<?php echo $s['shop_zipcode']; ?>">
				  <span id="err_zipcode" style="color:red;"></span> 
                </div>
				<?php
				$sql1=$link->rawQueryOne("select * from vendor_personal_tb where vendor_email=?",Array($_SESSION['vendor_email']));
				
				?>
				<div class="form-group">
                  <label>Vendor Name</label>
                  <input type="type" class="form-control" id="name" value="<?php echo $sql1['vendor_name'];?>" readonly>
                </div>
				
				<div class="form-group">
                  <label>Email</label>
                  <input type="type" class="form-control" name="email" id="idemail" value="<?php echo $s['shop_email']; ?>">
				  <span id="err_email" style="color:red;"></span> 
                </div>
				<div class="form-group">
                  <label>Shop Image</label>
                  <input type="file" class="form-control" name="shop_image">
				  <br>
				  <span><img src="<?php echo $siteroot.$s['shop_image']; ?>" width="10%"></span>
				  <span id="err_email" style="color:red;"></span> 
                </div>
					<button type="submit" name="edit" class="btn btn-primary">Edit </button>
              </form>
            </div>
			<?php
			}
			?>
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


<!-- Mirrored from slidesigma.com/themes/html/Mystic/light/pages/form/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2019 10:13:24 GMT -->
</html>
