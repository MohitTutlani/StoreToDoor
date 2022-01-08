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
  <title>View Element</title>
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

</head>

<body class="ms-body ms-aside-left-open ms-primary-theme ms-has-quickbar">


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
              <h1>Element Type</h1>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
          
                      <th scope="col">Element Name</th>
                      <th scope="col">Element Type</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>
                      
                    </tr>
                  </thead>
                  <tbody>
				  <?php
				  $pid=$_GET["id"];
					$element=$link->rawQuery("select * from product_element_type_tb where product_id=?",Array($pid));
					foreach($element as $e)
					{
				  ?>
				  			  
                    <tr>
					<?php 
						$sql=$link->rawQuery("select * from product_element_tb where product_element_id_pk=?",Array($e['product_element_id']));
						foreach($sql as $s)
						{
						?>
                      <td><?php echo $s['product_element_name']; ?></td>
					  <?php
						}
					  ?>
                      <td><?php echo $e['child_element_name']; ?></td>
                      <td><a href="edit_element.php?eid=<?php echo $e['product_element_type_id_pk']; ?>"><button class="btn btn-outline-primary" type="submit" name="edit">Edit</button></a></td>
                      <td><a href="delete_element.php?eid=<?php echo $e['product_element_type_id_pk']; ?>&pid=<?php echo $e['product_id']; ?>"><button class="btn btn-outline-primary" type="submit" name="delete">delete</button></a></td>
                      
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

