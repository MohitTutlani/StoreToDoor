<?php
include 'connect.php';
//require_once 'session.php';
session_start();

if(!isset($_SESSION['admin_username']) &&   !isset($_SESSION['admin_password']) )
{
    header("location:admin_login.php");
}
if(isset($_POST['add']))
{
	$name=$_POST['city_name'];
	$id=$_POST['state'];
	$status=$link->insert("city_tb",Array("city_name"=>$name,"state_id"=>$id));

	if(!$status)
	{
		header("location:add_city.php?error="."something went wrong");
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
        <title>Add City</title>
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
                                    <h4 class="mt-0 header-title">Add City</h4>
									<br>
                                     <form method="post" name="form" onSubmit="return validate()">
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label" >City Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="city_name" id="example-text-input" placeholder="Enter City Name"><br>
											<span id="name" style="color:red;"> </span>
                                        </div>
										
                                        <label class="col-sm-2 col-form-label">Select State</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="state" id="state_name">
                                                <option value="none">Select</option>
                                                <?php 
                                                  $sql=$link->rawQuery("select * from state_tb");
                                                  if($link->count >0)
                                                  {

                                                  foreach($sql as $s)
                                                  {
                                                    ?>
                                                    <option value="<?php echo $s['state_id']; ?>"><?php echo $s['state_name']; ?></option>
                                                    <?php
                                                  }
                                                }
                                                  ?>
                                            </select>
											<span id="city" style="color:red;"> </span>
                                        </div>
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