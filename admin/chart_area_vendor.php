<?php
require_once 'connect.php';
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
        <title>Chart</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />

        
<!-- perticular page css -->
              <link rel="shortcut icon" href="images/favicon.png">
              <link rel="stylesheet" href="css/morris.css">
      
              <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
              <link href="css/metismenu.min.css" rel="stylesheet" type="text/css">
              <link href="css/icons.css" rel="stylesheet" type="text/css">
              <link href="css/style.css" rel="stylesheet" type="text/css">
			  <style>
			#chartdiv {
			  width: 100%;
			  height: 500px;
			}

			</style>
		
			 <script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("chartdiv", am4charts.PieChart3D);
chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

chart.legend = new am4charts.Legend();

<?php
$sql=$link->rawQuery("select shop_zipcode from vendor_shop_tb group by shop_zipcode");

?>
chart.data = [
	<?php
	  foreach($sql as $s)
		{
		?>
  {
	  
		area: "<?php echo $s['shop_zipcode']; ?>",
		vendors:<?php $total=$link->rawQueryOne("select count(*)as cnt from vendor_shop_tb where shop_zipcode=?",Array($s['shop_zipcode']));
		echo $total['cnt'];
		
		?>
  },
  <?php
		}
		?>
 
];

chart.innerRadius = 100;

var series = chart.series.push(new am4charts.PieSeries3D());
series.dataFields.value = "vendors";
series.dataFields.category = "area";

}); // end am4core.ready()
</script>
        
    </head>
    <body>
      <div id="wrapper">
          <!-- Top Bar Start -->
		  
		  <?php include 'admin_header.php' ?>
		  <!--top bar end-->
            

             <?php include 'left_sidebar.php' ?>

 
           
        <div class="content-page">
        
            <div class="content">
                    <div class="container-fluid">
                       
                        
                        
							<div id="chartdiv"></div>
							
                            <!-- end row -->
            
                            
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
