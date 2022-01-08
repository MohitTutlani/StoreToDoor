<?php
include 'connect.php';
session_start();

if(!isset($_SESSION['vendor_email']) &&   !isset($_SESSION['vendor_password']) )
{
    header("location:vendor_index.php");
}

if(isset($_POST['edit']))
{
	$id=$_POST['id'];
	$name=$_POST['name'];
	$gender=$_POST['gender'];
	$bd=$_POST['bd'];
	$contact=$_POST['contact'];
	$address=$_POST['address'];
	$city=$_POST['city'];
	$photo=$_FILES['profile_photo']['name'];
	
	$link->where('vendor_id_pk',$id);
	$update=$link->update("vendor_personal_tb",Array("vendor_name"=>$name,"vendor_gender"=>$gender,"vendor_birthdate"=>$bd,"vendor_contact"=>$contact,"vendor_city_id"=>$city,"vendor_address"=>$address));
	if($update)
	{
		
		$image_ext=pathinfo($photo,PATHINFO_EXTENSION);
		$image_path="images/vendor/profile".$update.".".$image_ext;
	
	 if(move_uploaded_file($_FILES['profile_photo']['tmp_name'], $image_path))
	{
      $link->where("vendor_id_pk",$update);
      $s=$link->update("vendor_personal_tb",Array("vendor_photo"=>$image_path));

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


<!-- Mirrored from slidesigma.com/themes/html/Mystic/light/pages/form/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2019 10:13:24 GMT -->
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Vendor Profile</title>
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
		document.getElementById("err_date").innerHTML="";
		document.getElementById("err_profile").innerHTML="";
		document.getElementById("err_city").innerHTML="";
		document.getElementById("err_contact").innerHTML="";
		document.getElementById("err_address").innerHTML="";
		document.getElementById("err_gender").innerHTML="";
		
		document.getElementById('idname').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idbday').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idaddress').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idcity').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idcontact').style.borderColor='rgba(0,0,0,0.1)';

		var name=document.form.name.value;
		
		if(name=="")
		{
			document.getElementById("err_name").innerHTML="Enter Name";
			document.getElementById('idname').style.borderColor='#ff0000';
			s=false;
		}
	
		var date=document.form.bd.value;
		if(date=="")
		{
			document.getElementById("err_date").innerHTML="Enter Birth Date";
			document.getElementById('idbday').style.borderColor='#ff0000';
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
			document.getElementById("err_address").innerHTML="Enter Your Address";
			document.getElementById('idaddress').style.borderColor='#ff0000';
			s=false;
		}
		
		var city=document.getElementById("idcity").value;
		if(city==-1)
		{
			document.getElementById("err_city").innerHTML="Select any city";
			document.getElementById('idcity').style.borderColor='#ff0000';
			s=false;
		}
		
		if((document.getElementById("male").checked==false)&&(document.getElementById("female").checked==false))
		{
		
			document.getElementById("err_gender").innerHTML="Select Gender";
			return false;
		}	
		else
		{
			document.getElementById("err_gender").innerHTML="";
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

 

  <!-- Sidebar Left -->
  <?php include 'left_sidebar.php'; ?>

  <!-- Main Content -->
  <main class="body-content">
	<?php include 'vendor_header.php'; ?>
	
    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <div class="row">
        
        <div class="col-md-12">
          <div class="ms-panel">
            <div class="ms-panel-header">
              <h1>Vendor Profile</h1>
            </div>
			<?php
			$sql=$link->rawQuery("select * from vendor_personal_tb where vendor_email=?",Array($_SESSION['vendor_email']));
			
			foreach($sql as $s)
			{
			?>
            <div class="ms-panel-body">
              <form method="post" name="form" onSubmit="return validate()" enctype="multipart/form-data"> 
			  <input type="text" name="id" value="<?php echo $s['vendor_id_pk']; ?>" hidden>
                <div class="form-group">
                  <label>Name</label>
                  <input type="type" class="form-control" name="name" id="idname" value="<?php echo $s['vendor_name'];?>">
				  <span style="color:red;" id="err_name"> </span>
                </div>
				<div>
                      <label>Gender</label>
                      <div class="input-group">
                        <ul class="ms-list d-flex">
                <li class="ms-list-item pl-0">
                  <label class="ms-checkbox-wrap">
                    <input type="radio" name="gender" id="male" value="male"
					<?php
					if($s['vendor_gender']=="male")
					{echo "checked";}
					?>>
                    <i class="ms-checkbox-check"></i>
                  </label>
                  <span> Male </span>
                </li>
                <li class="ms-list-item">
                  <label class="ms-checkbox-wrap">
                    <input type="radio" name="gender" id="female" value="female" 
					<?php if($s['vendor_gender']=="female")
					{echo "checked";}
				?>>
                    <i class="ms-checkbox-check"></i>
                  </label>
                  <span> Female </span>
                </li>
                
              </ul>

                      </div>
					  <span id="err_gender" style="color:red;"></span>
                    </div>
                <div class="form-group">
                  <label>Birth Date</label>
                  <input type="text" class="form-control" name="bd" id="idbday" value="<?php echo $s['vendor_birthdate'];?>">
				  <span style="color:red;" id="err_date"> </span>
                </div>
			  
                
				<div class="form-group">
                  <label>Contact</label>
                  <input type="type" class="form-control" name="contact" id="idcontact" value="<?php echo $s['vendor_contact']; ?>">
				  <span style="color:red;" id="err_contact"> </span>
                </div>
                <div class="form-group">
                  <label>Address</label>
                  <textarea class="form-control" name="address" id="idaddress" rows="3" ><?php echo $s['vendor_address']; ?></textarea>
				  <span style="color:red;" id="err_address"> </span>
                </div>
				<div class="form-group">
                  <label>City</label>
                  <select class="form-control" name="city" id="idcity">
                    <option value="-1">Select city</option>
					<?php
					$city=$link->rawQuery("select * from city_tb");
					foreach($city as $c)
					{
					?>
                    <option value="<?php echo $c['city_id']; ?> "<?php if($s['vendor_city_id']==$c['city_id']){echo "selected";}?>><?php echo $c['city_name']; ?></option>
					<?php
					}
					?>
                  </select>
				  <span style="color:red;" id="err_city"> </span>
                </div>
				<div class="form-group">
                  <label>Email</label>
                  <input type="type" class="form-control" name="email" id="idemail" value="<?php echo $s['vendor_email']; ?>" readonly>
				  <span style="color:red;" id="err_email"> </span>
                </div>
					<button type="submit" name="edit" class="btn btn-primary">Edit </button>
					<a href="edit_shop.php?v_id=<?php echo $s['vendor_id_pk']; ?>" type="submit" name="shop" class="btn btn-primary">View Shop Details</a>
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
</html>
