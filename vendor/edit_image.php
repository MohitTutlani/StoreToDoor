<?php

include 'connect.php';
session_start();

if(!isset($_SESSION['vendor_email']) &&   !isset($_SESSION['vendor_password']) )
{
    header("location:vendor_index.php");
}
$pid=$_GET['pid'];

if(isset($_POST['edit']))
{
	$id=$_POST["id"];
	
	
		$img=$_FILES['product_images']['name'];
		$image_ext=pathinfo($img,PATHINFO_EXTENSION);
		$image_path="../images/product/p".$id.".".$image_ext;
		$db_image="product/p".$id.".".$image_ext;
		
		
		
		if(move_uploaded_file($_FILES['product_images']['tmp_name'], $image_path))
		{	

			$link->where("product_id",$id);
			$link->update("product_image_tb",Array("product_image"=>$db_image));
			header("location:view_product.php");
		}
		
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Edit Image</title>
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
  <link rel="icon" type="image/png" sizes="32x32" href="images/favicon.png">
  <script>
	function validate()
	{
		s=true;
		document.getElementById("err_image").innerHTML="";
		document.getElementById('fileupload').style.borderColor='#ff0000';
		
		var fup = document.getElementById('fileupload');
		var fileName = fup.value;
		var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
		if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" )
		{}
		else
		{
			document.getElementById("err_image").innerHTML="Must be an image";
			document.getElementById('fileupload').style.borderColor='#ff0000';
			s=false;
		}
		return s;
	}
  
  </script>

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
 
	<?php include 'left_sidebar.php'; ?>
  <!-- Sidebar Right -->

  <!-- Main Content -->
  <main class="body-content">

    <!-- Navigation Bar -->
  <?php include 'vendor_header.php'; ?>

    <!-- Body Content Wrapper -->
    <div class="col-md-12" style="margin-top:30px; margin-bottom:30px;">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h1>Edit Image</h1>
            </div>
            <div class="ms-panel-body">
			
			<?php
			
			 	$sql=$link->rawQuery("select * from product_image_tb where product_id=?",Array($pid));
				
				foreach($sql as $s)
				{
					
			?>
              <form class="ms-form-wizard style1-wizard" id="default-wizard" method="post" enctype="multipart/form-data" name="frm" onSubmit="return validate()">
               
			   <input type="text" name="image_id" value="<?php echo $s['product_image_id_pk']; ?>" hidden>
			   <input type="text" name="id" value="<?php echo $s['product_id']; ?>" hidden>
			    <input type="text" name="image" value="<?php echo $s['product_image']; ?>" hidden>
			   
               
				  <div class="form-row">
                    <div class="col-md-12 mb-3">
                      <label style="float:left;">Images</label>
                      <div class="input-group">
                      <div class="custom-file">
						
						<input type="file" name="product_images" value="fileupload" id="fileupload" multiple="true">

					  </div>
					  
                      </div>
					  <span id="err_image" style="color:red; float:left;"></span><br><br>
					  <img src="<?php echo $siteroot.$s['product_image'];  ?>" height="100" width="100">
                    </div>
                    
                  </div>
				  
				  
                </div>
				<center style="padding:20px;">
                <button class="btn btn-primary" type="submit" name="edit">Edit</button>
				</center>
                
                
              </form>
			  <?php
				}
			
			  ?>
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
