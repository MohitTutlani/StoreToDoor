<?php
include 'connect.php';
session_start();
$id=$_GET['id'];
if(!isset($_SESSION['vendor_email']) &&   !isset($_SESSION['vendor_password']) )
{
    header("location:vendor_index.php");
}

$vendor_id=0;
$sql=$link->rawQuery("select * from vendor_personal_tb where vendor_email=?",Array($_SESSION['vendor_email']));
foreach($sql as $s)
{
	$vendor_id=$s['vendor_id_pk'];
}

if(isset($_REQUEST['edit']))
{
	$quantity=$_POST['quantity'];
	$link->where("product_id_pk",$id);
	$sql=$link->update("product_tb",Array("quantity"=>$quantity));
	if($sql)
	{
		header('location:view_stock.php');
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Edit Stock</title>
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
		document.getElementById("err_qty").innerHTML="";
		
		document.getElementById('idqty').style.borderColor='rgba(0,0,0,0.1)';
		
		var qty=document.form.quantity.value;
	
		if(qty=="")
		{
			document.getElementById("err_qty").innerHTML="Enter Quantity";
			document.getElementById('idqty').style.borderColor='#ff0000';
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
 
	<?php include 'left_sidebar.php'; ?>
  
  <!-- Main Content -->
  <main class="body-content">

    <!-- Navigation Bar -->
  
<?php include 'vendor_header.php'; ?>
    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <div class="row">

       
        <!-- Infographics -->
		 <div class="col-xl-12 col-md-12">
		<form class="ms-form-wizard style1-wizard" id="default-wizard" method="post" name="form" onSubmit="return validate()">
	
      
          <div class="ms-panel">
            <div class="ms-panel-header">
              <h1>Edit Stock</h1>
            </div>
			<?php
					$id=$_GET['id'];
						$sql1=$link->rawQueryOne("select * from product_tb where product_id_pk=? and is_active=?",Array($id,1));
						
					?>	
            <div class="ms-panel-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <h1>Product : <?php echo $sql1['product_name']; ?></h1>
                  </thead>
				  <br>
                  <tbody>
				  		<div class="form-group">
                  <label>Quantity</label>
                  <input type="text" name="quantity" class="form-control" id="idqty" value="<?php echo $sql1['quantity']; ?>">
				  <span id="err_qty" style="color:red;"> </span>
                </div>	
                  </tbody>
				  
                </table>
				<center><input type="submit" class="btn btn-primary d-block w-25" name="edit" value="Edit"/></center>
              </div>
            </div>
          </div>
        
		</form>
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

