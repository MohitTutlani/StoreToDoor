<?php
include 'connect.php';
//require_once 'session.php';
session_start();

if(!isset($_SESSION['admin_username']) &&   !isset($_SESSION['admin_password']) )
{
    header("location:admin_login.php");
}

$sql=$link->rawQuery("select * from vendor_personal_tb");
$vendor=$link->count;

$sql2=$link->rawQuery("select * from client_tb");
$client=$link->count;

$sql3=$link->rawQuery("select * from order_tb");
$order=$link->count;

$sql4=$link->rawQueryOne("select sum(admin_profit)as total from profit_tb");
$revenue=$sql4['total'];

?>
<!DOCTYPE html>
<html lang="en">
       <meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Dashboard</title>
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
            

             <?php include 'left_sidebar.php';?>

 
           
        <div class="content-page">
        
            <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Dashboard</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">
                                            Welcome to StoreToDoor Dashboard
                                        </li>
                                    </ol>

                                     
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                                <div class="col-xl-3 col-md-6">
                                    <div class="card mini-stat bg-primary">
                                        <div class="card-body mini-stat-img">
                                            <div class="mini-stat-icon">
                                                <i class="float-right"><img src="images/user.png" style="    padding-bottom:2px;"/></i>
                                            </div>
                                            <div class="text-white">
                                                <h6 class="text-uppercase mb-3" style="    font-size: 15px;">Total Vendor</h6>
                                                <h4 class="mb-4"><?php echo $vendor; ?></h4>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card mini-stat bg-primary">
                                        <div class="card-body mini-stat-img">
                                            <div class="mini-stat-icon">
                                                <i class="float-right"><img src="images/user.png" style="    padding-bottom:2px;"/></i>
                                            </div>
                                            <div class="text-white">
                                                <h6 class="text-uppercase mb-3">Total Client</h6>
                                                <h4 class="mb-4"><?php echo $client; ?></h4>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card mini-stat bg-primary">
                                        <div class="card-body mini-stat-img">
                                            <div class="mini-stat-icon">
                                                <i class="float-right"><img src="images/choices.png" style="    padding-bottom:2px;"/></i>
                                            </div>
                                            <div class="text-white">
                                                <h6 class="text-uppercase mb-3">Total Orders</h6>
                                                <h4 class="mb-4"><?php echo $order; ?></h4>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card mini-stat bg-primary">
                                        <div class="card-body mini-stat-img">
                                            <div class="mini-stat-icon">
                                                <i class="float-right"><img src="images/money-growth.png" style="padding-bottom:2px;"/></i>
                                            </div>
                                            <div class="text-white">
                                                <h6 class="text-uppercase mb-3">Revenue</h6>
                                                <h4 class="mb-4"><?php echo $revenue; ?></h4>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
                            </div>
							
							
                            <!-- end row -->
            
                            
        
	<?php include 'admin_footer.php'; ?>

    
      </div>

     <script src="js/jquery.min.js"></script>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/metisMenu.min.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/waves.min.js"></script>
<script src="js/jquery.sparkline.min.js"></script>

      <!--Morris Chart-->
      <script src="js/morris.min.js"></script>
      <script src="js/raphael-min.js"></script>
      <script src="js/dashboard.js"></script>
      <!-- App js -->
     <script src="js/app.js"></script>

    </body>
</html>
