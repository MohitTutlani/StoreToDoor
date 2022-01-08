<?php
ob_start();
include 'connect.php';
//require_once 'session.php';
session_start();

if(!isset($_SESSION['admin_username']) &&   !isset($_SESSION['admin_password']) )
{
    header("location:admin_login.php");
}
if(isset($_POST['add']))
{
	$name=$_POST['country_name'];
	
	$status=$link->insert("country_tb",Array("country_name"=>$name));
	if(!$status)
	{
		header("location:Add_country.php?error="."something went wrong");
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
        <title>Add Country</title>
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
		var name=document.form.country_name.value;
		var pattern=/^[A-Za-z]*$/;
		if(name=="")
		{
			document.getElementById("name").innerHTML="It must not be blank";
			s=false;
		}
		else if(!pattern.test(name))
		{
			document.getElementById("name").innerHTML="Invalid country name";
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
                                    <h4 class="mt-0 header-title">Add Country</h4>
									<br>
                                     <form method="post" name="form" onSubmit="return validate()">
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label" >Country Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="country_name"  placeholder="Enter Country Name">
											<span id="name" style="color:red; padding-top:5px;"></span>
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