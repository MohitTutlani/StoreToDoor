<?php
include 'connect.php';
session_start();

if(!isset($_SESSION['admin_username']) &&   !isset($_SESSION['admin_password']) )
{
    header("location:admin_login.php");
}
if(isset($_POST['add']))
{
	
	$slider_image=$_FILES['slider_image']['name'];

	 $image_path="slider/".$slider_image;

	if(move_uploaded_file($_FILES['slider_image']['tmp_name'], $image_path))
	{
		$sql=$link->insert("slider_tb",Array("slider_image"=>$image_path));
		if(!$sql)
		{
			header("location:add_slider.php?error="."something went wrong");
		}
		else		
		{
			header("location:add_slider.php");
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
       <meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Add Slider</title>
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
         
        <script>

	function validate()
	{
		var s=true;
		document.getElementById("name").innerHTML="";
		document.getElementById("city").innerHTML="";
		
		
		var name=document.form.city_name.value;
		if(name=="")
		{
			document.getElementById("name").innerHTML="Insert City";
			s=false;
		}

		
		return s;
	}

	</script>
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
                        <div class="col-12">
                            <div class="card m-b-20">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Slider Images</h4>
									<br>
                                     <form method="post" name="form" enctype="multipart/form-data" onSubmit="return validate()">
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label" >Edit Slider Images</label>
                                        <div class="col-sm-10">
                                            <input  class="form-control" type="file" name="slider_image" id="example-text-input"><br>
											<span id="name" style="color:red;"> </span>
                                        </div>
									<?php
									
									?>

                                    </div>
                                    <div class="button-items">
                                    <center><button type="submit" name="add" class="btn btn-primary waves-effect waves-light">Add</button></center>
                                </div>
								</form>
                            </div>
                        </div>
                        <!-- end col -->
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