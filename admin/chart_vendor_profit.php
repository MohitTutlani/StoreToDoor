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
			  <style>
			#chartdiv {
			  width: 100%;
			  height: 500px;
			}

			</style>
		
			 
        
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
	 
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.XYChart);

// Add data
<?php
$sql=$link->rawQuery("select sum(admin_profit)as cnt,vendor_id from profit_tb group by vendor_id");
?>
chart.data = [
<?php
foreach($sql as $s)
{
?>
{
	<?php $v=$link->rawQueryOne("select vendor_name from vendor_personal_tb where vendor_id_pk=?",Array($s['vendor_id']));?>
	
    "name": "<?php echo $v['vendor_name'];  ?>",
    "points": <?php echo $s['cnt']; ?>,
    "color": chart.colors.next(),
    "bullet": "https://www.amcharts.com/lib/images/faces/A04.png"
}, 
<?php
}
?>
];

// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "name";
categoryAxis.renderer.grid.template.disabled = true;
categoryAxis.renderer.minGridDistance = 30;
categoryAxis.renderer.inside = true;
categoryAxis.renderer.labels.template.fill = am4core.color("#fff");
categoryAxis.renderer.labels.template.fontSize = 20;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.grid.template.strokeDasharray = "4,4";
valueAxis.renderer.labels.template.disabled = true;
valueAxis.min = 0;

// Do not crop bullets
chart.maskBullets = false;

// Remove padding
chart.paddingBottom = 0;

// Create series
var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.valueY = "points";
series.dataFields.categoryX = "name";
series.columns.template.propertyFields.fill = "color";
series.columns.template.propertyFields.stroke = "color";
series.columns.template.column.cornerRadiusTopLeft = 15;
series.columns.template.column.cornerRadiusTopRight = 15;
series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/b]";

// Add bullets
var bullet = series.bullets.push(new am4charts.Bullet());
var image = bullet.createChild(am4core.Image);
image.horizontalCenter = "middle";
image.verticalCenter = "bottom";
image.dy = 20;
image.y = am4core.percent(100);
image.propertyFields.href = "bullet";
image.tooltipText = series.columns.template.tooltipText;
image.propertyFields.fill = "color";
image.filters.push(new am4core.DropShadowFilter());

}); // end am4core.ready()
</script>
    </body>
</html>
