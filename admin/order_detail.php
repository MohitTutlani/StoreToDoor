<?php
include 'connect.php';
//require_once 'session.php';
session_start();

if(!isset($_SESSION['admin_username']) &&   !isset($_SESSION['admin_password']) )
{
    header("location:admin_login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
       <meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Vendor List</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />

        
<!-- perticular page css -->


         <head>
              <meta charset="utf-8" />
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
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
								<h1>Vendor List</h1>

								<div class="table-responsive">
									<table class="table table-vertical">

										<tbody>
										<tr>
											<th>Vendor Name</th>
											<th>Vendor Shop</th>
											
											<th>View Order</th>
										</tr>
										<tr>
										<?php
										$sql=$link->rawQuery("select * from vendor_personal_tb");
										foreach($sql as $s)
										{
										
										?>
											<td>
												
												<?php echo $s['vendor_name'];?>
											</td>
											<td>
											
											<?php 
										
											$sql1=$link->rawQuery("select * from vendor_shop_tb where shop_vendor_id=?",Array($s['vendor_id_pk']));
											foreach($sql1 as $s1)
											{
												 echo $s1['shop_name'];
											}
											?>
											
											</td>
											
										
											<td>
												<a href="view_order.php?v_id=<?php echo $s['vendor_id_pk']; ?>">
												<button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">View Order</button>
												</a>
											</td>
										</tr>

										<?php
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