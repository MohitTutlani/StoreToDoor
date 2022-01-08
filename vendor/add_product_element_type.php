<?php
include 'connect.php';
session_start();

if(!isset($_SESSION['vendor_email']) &&   !isset($_SESSION['vendor_password']) )
{
    header("location:vendor_index.php");
}
if(isset($_REQUEST['submit']))
{
	$pname=$_POST['pname'];
	$pename=$_POST['pename'];
	$ename=$_POST['ename'];
	
	$insert=$link->insert("product_element_type_tb",Array("product_id"=>$pname,"product_element_id"=>$pename,"child_element_name"=>$ename,));
	if($insert)
	{
	header("location:vendor_dashboard.php");
	}
}


?>
<html lang="en">
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Add Product Element Type</title>
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
		document.getElementById("err_pelement").innerHTML="";	
		document.getElementById("err_ename").innerHTML="";	
		
		document.getElementById('idname').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idelement').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idename').style.borderColor='rgba(0,0,0,0.1)';
		
		var name=document.getElementById("idname").value;
		if(name==-1)
		{
			document.getElementById("err_name").innerHTML="Select any product Name";
			document.getElementById('idname').style.borderColor='#ff0000';
			s=false;
		}
		var pelement=document.getElementById("idelement").value;
		if(pelement==-1)
		{
			document.getElementById("err_pelement").innerHTML="Select Product Element";
			document.getElementById('idelement').style.borderColor='#ff0000';
			s=false;
		}
			
		var ename=document.form.ename.value;
		
		if(ename=="")
		{
			document.getElementById("err_ename").innerHTML="Enter Product Element Name";
			document.getElementById('idename').style.borderColor='#ff0000';
			s=false;
		}
		
		
		return s;
	}
	
	</script>
</head>
<body class="ms-body ms-aside-left-open ms-primary-theme ms-has-quickbar">

  <!-- Sidebar Navigation Left -->
 
	<?php include 'left_sidebar.php'; ?>
  
  <!-- Main Content -->
  <main class="body-content">

    <!-- Navigation Bar -->
  
<?php include 'vendor_header.php'; ?>
    <!-- Body Content Wrapper -->
      <div class="col-md-12" style="margin-top:30px; margin-bottom:30px;">
          <div class="ms-panel">
            <div class="ms-panel-header">
              <h1>Add Product Element Type</h1>
            </div>
            <div class="ms-panel-body">
              <form method="post" name="form" onSubmit="return validate()">
                <div>
                  <label>Product Name</label>
                  <select class="form-control" name="pname" id="idname">
					  <option value="-1">select Product</option>
					  <?php 
					  $sql1=$link->rawQuery("select * from product_tb");
					  foreach($sql1 as $s1)
					  {
						  ?>
						  <option value="<?php echo $s1['product_id_pk']; ?>">
						  <?php echo $s1['product_name']; ?>
						  </option>
						  
					  <?php } ?>
					  </select>
                </div>
				<div>
					<span id="err_name" style="color:red;"></span>
				</div>
				<br>
				<div>
						<div>
						<label>Product Element</label>
						<select class="form-control" name="pename" id="idelement">
						<option value="-1">select Element</option>
						<?php 
						$sql1=$link->rawQuery("select * from product_element_tb");
						foreach($sql1 as $s1)
						{
							?>
							<option value="<?php echo $s1['product_element_id_pk']; ?>">
							<?php echo $s1['product_element_name']; ?>
							</option>
						  
							<?php } ?>
						</select>
						</div>
						<div>
						<span id="err_pelement" style="color:red;"></span>
						</div>
				</div>
                <br>
				
				<div class="form-group">
					<div>
						<label>Element Name</label>
						<input type="type" class="form-control" id="idename" name="ename" placeholder="Enter Product Element Name">
					</div>
					<div>
						<span id="err_ename" style="color:red;"></span>
					</div>
                </div>

					<center><button class="btn btn-primary" type="submit" name="submit">Submit</button></center>
              </form>
            </div>
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

  <!-- Page Specific Scripts Start -->
  <script src="js/slick.min.js"> </script>
  <script src="js/moment.js"> </script>
  <script src="js/jquery.webticker.min.js"> </script>
  <script src="js/Chart.bundle.min.js"> </script>
  <script src="js/Chart.Financial.js"> </script>
  <script src="js/cryptocurrency.js"> </script>
  <!-- Page Specific Scripts Finish -->

  <!-- Mystic core JavaScript -->
  <script src="js/framework.js"></script>

  <!-- Settings -->
  <script src="js/settings.js"></script>

</body>
</html>