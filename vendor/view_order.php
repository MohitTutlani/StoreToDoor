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
	$vid=$s['vendor_id_pk'];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>View Order</title>
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
	function update_payment(val)
	{
		$.ajax({
			type:"post",
			url:"update_payment.php",
			data:'order_id='+val,
			success:function data(){
			}
		}
		);
	}
  </script>

</head>

<body class="ms-body ms-aside-left-open ms-primary-theme ms-has-quickbar">

  <!-- Setting Panel -->
  
  <!-- Preloader -->
  

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
	   <div class="content-wrapper">
         
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">View Order</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
          
                      <th scope="col">Client Name</th>
                      <th scope="col">Total Cost</th>
                      <th scope="col">Date</th>
                      <th scope="col">Delivery Address</th>
                      <th scope="col">Order Status</th>
                      <th scope="col">Paid/UnPaid</th>
                    </tr>
                  </thead>
                  <tbody>
					   <?php
					   $sql=$link->rawQuery("select * from order_item_tb where vendor_id=?",
					   Array($vid));
					   
					   foreach($sql as $s)
					   {
						   $order=$link->rawQuery("select * from order_tb where order_id_pk=? and order_status=? limit 1",
						   Array($s['order_id'],1));
						   
						 
						   foreach($order as $o)
						   {
					   
					   ?>
		   <td><?php
											$client=$link->rawQuery("select * from client_tb where client_id_pk=?",Array($o['client_id']));
											foreach($client as $c)
											{
												echo $c['client_name'];
											}
											
											?></td>
											<td>
											   <?php echo $o['total_cost']; ?>
											</td>
												
											<td>
											   <?php echo $o['order_date_time']; ?> 
											</td>
											
												
											<td>
											   <?php echo $o['delivery_address']; ?> 
											</td>
											
											<td>
											<?php  
											
											if($o['order_status']==1)
											{
												?>
												<span class="badge badge-pill badge-success">Confirm</span>
												<?php
											}
											else
											{
												?>
												<span class="badge badge-pill badge-danger">Cancel</span>	
												<?php
											}
											?>
											
											</td>
											
											<td>
											
											<label class="ms-switch">
											<input type="checkbox" name="is_paid" onChange="update_payment(<?php echo $o['order_id_pk']; ?>);"
											<?php
											if($o['is_paid']==1)
											{
												echo "checked";
											}	?>	
											/>
											<span class="ms-switch-slider ms-switch-success round"></span>
											</td>
										</tr>
										<?php
								   
								   }
							   }?>
		   
                      </tbody>
                </table>
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

</body>

</html>

