<?php
include 'connect.php';
session_start();

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

?>
<html lang="en">
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>View Stock</title>
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
   <link href="css/datatables.min.css" rel="stylesheet">

  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="images/favicon.png">

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
 
	<?php include "left_sidebar.php"; ?>
  <!-- Sidebar Right -->


    

    

  <!-- Main Content -->
  <main class="body-content">

    <!-- Navigation Bar -->
  <?php include "vendor_header.php"; ?>

    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
      <div class="row">

        <div class="col-md-12">
          

          
         <div class="content-wrapper">
         
          <div class="card">
            <div class="card-body">
              <h1 class="card-title">Stock</h1>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
				  <form>
				  <?php
				  $sql=$link->rawQuery("select vendor_id_pk from vendor_personal_tb where vendor_email=?",Array($_SESSION['vendor_email']));
				  $vendor_id=0;
				  foreach($sql as $s)
				  {
					  $vendor_id=$s['vendor_id_pk'];
				  }
				  
					$sql=$link->rawQuery("select * from product_tb where vendor_id=?",Array($vendor_id));
					
				 ?>
				 
				  
					<table id="order-listing" class="table">
                      <thead>
					  
                        <tr>
                            <th>Product</th>
                            <th>Stock</th>
							<th>Edit</th>
                            
                        </tr>
                      </thead>
                      <tbody>
					  
					 <?php 
					 foreach($sql as $s)
					 {
						 ?>
					 
						<tr>
						<td><?php echo $s['product_name']; ?></td>
						<td><?php echo $s['quantity']; ?></td>
						<td>
							<button class="btn btn-outline-primary" style="margin-top:0px;">
							  <a href="edit_stock.php?id=<?php echo $s['product_id_pk']; ?>">Edit Stock
							  </a>
							</button>
                        </td>
						
						
						</tr>
						
						<?php
						
					  }
					  
					  ?>
				  
                       
                      </tbody>
                    </table>
					</form>
                  </div>
                </div>
              </div>
            </div>
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
  

  
  <!-- Global Required Scripts End -->

  <!-- Page Specific Scripts Start -->
   <script src="js/vendor.bundle.addons.js"></script>
   <script src="js/data-table.js"></script>
  <!-- Page Specific Scripts End -->

 

</body>
</html>
