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
	$cpassword=$_POST['cpassword'];
	$npassword=$_POST['npassword'];
	$cnpassword=$_POST['cnpassword'];
	
	
	$link->where('vendor_id_pk',$id);
	$update=$link->update("vendor_personal_tb",Array("vendor_name"=>$name,"vendor_gender"=>$gender,"vendor_birthdate"=>$bd,"vendor_contact"=>$contact,"vendor_email"=>$email,"vendor_city_id"=>$city,"vendor_address"=>$address,));
	if($update)
	{
		header('location:vendor_dashboard.php');
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
  <title>Change Password</title>
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
              <h1>Change Password</h1>
            </div>
			<?php
			$sql=$link->rawQuery("select * from vendor_personal_tb where vendor_email=?",Array($_SESSION['vendor_email']));
			
			foreach($sql as $s)
			{
				
			?>
            <div class="ms-panel-body">
              <form method="post" id="changepass"> 
			  <input type="text" name="id" value="<?php echo $s['vendor_id_pk']; ?>" hidden>
                <div class="form-group">
                  <label>Current Password</label>
                  <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Enter Current Password">
                </div>
				<div class="form-group">
                  <label>New Password</label>
                  <input type="password" class="form-control" name="npassword" id="npassword" placeholder="Enter New Password">
                </div>
                <div class="form-group">
                  <label>Confirm Password</label>
                  <input type="password" class="form-control" name="rpassword" id="rpassword" placeholder="ReEnter New Password">
                </div>
				<p id="rerror"></p>
				<button type="submit" name="submit" id="submit" class="btn btn-primary">Change Password</button>
			
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
<script>
$("#changepass").submit(function(e) {
	$.ajax({
		type:"post",
		url:"changepass.php",
		data:$("#changepass").serialize(),
		success:function(data)
		{
				if(data==1)
				{
					$('#rerror').html("Password is Successfully changed");
					$('#rerror').css("color","green");
					$("#cpassword").val("");
					$("#npassword").val("");
					$("#rpassword").val("");
				}
				else
				{ 	
					$('#rerror').html(data);
					$("#rerror").css("color","red");
				}
		}
	});
	e.preventDefault();
});
</script>
</body>


<!-- Mirrored from slidesigma.com/themes/html/Mystic/light/pages/form/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2019 10:13:24 GMT -->
</html>
