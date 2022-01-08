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
<!DOCTYPE html>
<html lang="en">

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>View Product</title>
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
              <h4 class="card-title">Products</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
				  <form>
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Name</th>
                            <th>Highlights</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Description</th>
                            <th>Retail Price</th>
                            <th>Wholesale Price</th>
							<th>Margin</th>
							<th>Information</th>
							<th>Active/Inactive</th>
							<th>View Element</th>
							<th>View Image</th>
							<th>Edit</th>
                        </tr>
                      </thead>
                      <tbody>
					  
					  <?php
					  $vendor=$link->rawQuery("select vendor_id_pk from vendor_personal_tb where vendor_email=?",Array($_SESSION['vendor_email']));
					  $id=0;
					  foreach($vendor as $v)
					  {
						$id=$v['vendor_id_pk'];  
					  }
					  $sql=$link->rawQuery("select * from product_tb where vendor_id=?",Array($id));
					  foreach($sql as $s)
					  {
						 
						?>
						<tr>
						<td><?php echo $s['product_name']; ?></td>
						<td><?php echo $s['product_highlights']; ?></td>
						<?php
							 $sql2=$link->rawQuery("select category_name from category_tb where category_id_pk=?",Array($s['category_id']));
						  foreach($sql2 as $s2)
						  {
							  ?>
						<td><?php echo $s2['category_name']; ?></td>
						  <?php } ?>
						<td><?php echo $s['quantity']; ?></td>
						<td><?php echo $s['product_description']; ?></td>
						<td><?php echo $s['product_retail_price']; ?></td>
						<td><?php echo $s['product_wholesale_price']; ?></td>
						<td><?php echo $s['product_margin']; ?></td>
						<td><?php echo $s['product_information']; ?></td>
						<td> <div class="col-3 text-right">
                                   <button class="btn btn-outline-primary" style="margin-top:0px;">
									<a href="view_product_p.php?id=<?php echo $s['product_id_pk']; ?>&value=<?php if($s['is_active']==0){echo "inactive";} else echo "active"; ?>">
									<?php if($s['is_active']==0){echo "Inactive";} else echo "Active"; ?> 
									</a>
									</button>
                                                    
                                </div></td>
						<td>
                              <button class="btn btn-outline-primary" style="margin-top:0px;">
							  <a href="view_element.php?id=<?php echo $s['product_id_pk']; ?>">View Element 
							  </a>
							  </button>
                        </td>
							<td>
                              <button class="btn btn-outline-primary" style="margin-top:0px;">
							  <a href="view_image.php?id=<?php echo $s['product_id_pk']; ?>">View Image
							  </a>
							  </button>
                        </td>
						<td>
							<button class="btn btn-outline-primary" style="margin-top:0px;">
							  <a href="edit_product.php?pid=<?php echo $s['product_id_pk']; ?>">Edit Product
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
