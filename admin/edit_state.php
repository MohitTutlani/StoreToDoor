<?php
ob_start();
include 'connect.php';
session_start();

if(!isset($_SESSION['admin_username']) && !isset($_SESSION['admin_password']) )
{
    header("location:admin_index.php");
}
if(isset($_POST['edit']))
{
	$error="";
	$name=$_POST['state_name'];
	$c_id=$_POST['country'];
	$id2=$_GET['id'];
	$link->where('state_id',$id2);
	$status=$link->update("state_tb",Array("state_name"=>$name,"country_id"=>$c_id));

	if($status)
	{
		header("location:view_state.php");
	}
	else
	{
		$error="something went wrong";
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
        <title>Edit State</title>
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
		document.getElementById("state").innerHTML="";
		
			
		var name=document.form.state_name.value;
		if(name=="")
		{
			document.getElementById("state").innerHTML="Enter State Name";
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
                                    <h4 class="mt-0 header-title">Edit State</h4>
									<br>
                                     <form method="post" onSubmit="return validate()" name="form">
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label" >State Name</label>
										<?php
										
										if(isset($_GET['id']))
										{
											$id=$_GET['id'];
										}
											$sql1=$link->rawQueryOne("select * from state_tb where state_id=?",Array($id));
										
										?>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="state_name" id="example-text-input" value=" <?php echo $sql1['state_name']; ?>"><br>
											<span id="state" style="color:red;"> </span>
                                        </div>
										
                                        <label class="col-sm-2 col-form-label">Select Country</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="country">
                                                <option value="none">Select</option>
                                                <?php 
                                                  $sql=$link->rawQuery("select * from country_tb");
                                                  if($link->count >0)
                                                  {

                                                  foreach($sql as $s1)
                                                  {
                                                    ?>
                                                    <option value=<?php echo $s1['country_id']; ?> <?php if($sql1['country_id']==$s1['country_id']) {echo "selected";} ?>><?php echo $s1['country_name']; ?>
													</option>
                                                    <?php
                                                  }
                                                }
                                                  ?>
                                            </select>
                                        </div>
										
                                    </div>
                                    <div class="button-items">
                                    <center><button type="submit" name="edit" class="btn btn-primary waves-effect waves-light">EDIT</button></center>
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