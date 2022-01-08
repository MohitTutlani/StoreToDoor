<?php
include 'connect.php';
//require_once 'session.php';
session_start();

if(!isset($_SESSION['admin_username']) &&   !isset($_SESSION['admin_password']) )
{
    header("location:admin_login.php");
}
if(isset($_GET['v_id']))
{
	$vid=$_GET['v_id'];
}
?>
<!DOCTYPE html>
<html lang="en">
       <meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Order List</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />

        
<!-- perticular page css -->


         <head>
              <meta charset="utf-8" />
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
              <title>Lexa - Responsive Bootstrap 4 Admin Dashboard</title>
              <meta content="Admin Dashboard" name="description" />
              <meta content="Themesbrand" name="author" />
              <link rel="shortcut icon" href="images/favicon.png">
              <link rel="stylesheet" href="css/morris.css">
      
              <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
              <link href="css/metismenu.min.css" rel="stylesheet" type="text/css">
              <link href="css/icons.css" rel="stylesheet" type="text/css">
              <link href="css/style.css" rel="stylesheet" type="text/css">
         
        
    </head>
    <body>
	   <div id="wrapper">
          <!-- Top Bar Start -->
		  
		  <?php include 'admin_header.php' ?>
		  <!--top bar end-->
            <?php
		include 'left_sidebar.php';
		?>
 
           
        <div class="content-page">
        
            <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                  
                                </div>
                            </div>
                        </div>
					<div class="row">
						<div class="col-xl-12">
						<div class="card m-b-20">
							<div class="card-body">
								<h1>Orders</h1>

								<div class="table-responsive">
									<table class="table table-vertical">

										<tbody>
										<tr>
											<th>Client Name</th>
											<th>Total Cost</th>
											<th>Date</th>
											<th>Order Status</th>
											<th>Paid/Unpaid</th>
										</tr>
										<tr>
										<?php
										   $sql=$link->rawQuery("select * from order_item_tb where vendor_id=?",
										   Array($vid));
										   
										   foreach($sql as $s)
										   {
											   $order=$link->rawQuery("select * from order_tb where order_id_pk=? and order_status=?",
											   Array($s['order_id'],1));
											   
											 
											   foreach($order as $o)
											   {
										   
										   ?>
											<td>
												<?php
														$client=$link->rawQuery("select * from client_tb where client_id_pk=?",Array($o['client_id']));
														foreach($client as $c)
														{
															echo $c['client_name'];
														}
														
														?>
											</td>
											<td>
											<?php echo $o['total_cost']; ?>
											</td>
											<td>
											<?php echo $o['order_date_time']; ?>
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
												<span class="badge badge-pill badge-danger">cancel</span>
												<?php
												}
												?>
											</td>
											<td>
											<?php
												if($o['is_paid']==1)
												{
													?>
												<span class="badge badge-pill badge-success">paid</span>
												<?php
												}
												else
												{
											?>
												<span class="badge badge-pill badge-danger">Unpaid</span>
												<?php
												}
												?>
											</td>
										</tr>

										<?php
											}
										}
										?>

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

			</div>
		</div>
	</div>
</div>
		<?php include 'admin_footer.php'; ?>
	</div>
<!-- jQuery  -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/metisMenu.min.js"></script>
  <script src="js/jquery.slimscroll.js"></script>
  <script src="js/waves.min.js"></script>

  <script src="js/jquery.sparkline.min.js"></script>

  <!-- App js -->
  <script src="js/app.js"></script>

</body>
</html>