<?php
include 'connect.php';
session_start();

if(!isset($_SESSION['vendor_email']) &&   !isset($_SESSION['vendor_password']) )
{
    header("location:vendor_index.php");
}

$pid=$_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>View Image</title>
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
			<h1 class="card-title">Product Image</h1>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
							  
			  <p>Product :<?php  
			  $product=$link->rawQueryOne("select * from product_tb where product_id_pk=?",Array($pid));
			  if($link->count>0)
			  {
				  echo $product['product_name'];
			  }
							  
			  ?> </p>
			  </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
          
                      <th scope="col">Image</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>
                      
                    </tr>
                  </thead>
				  <?php 
							  $image=$link->rawQueryOne("select * from product_image_tb where product_id=?",Array($pid));
							  ?>
                  <tbody>
                    <tr>
					
					  <td><img src="<?php echo $siteroot.$image['product_image'];?>" width="25%" style="max-width: 25%; border-radius: 1%; margin-right: 1px;"></td>
					  
                      <td>
							<button class="btn btn-outline-primary">
							  <a href="edit_image.php?pid=<?php echo $pid; ?>">Edit
							  </a>
							</button>
                        </td>
						<td>
							<button class="btn btn-outline-primary">
							  <a href="delete_image.php?id=<?php echo $image['product_image_id_pk']; ?>& p_id=<?php echo $image['product_id']; ?>">Delete
							  </a>
							</button>
                        </td>
                    </tr>
				
				
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

