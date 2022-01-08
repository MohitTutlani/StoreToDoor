<?php
include "connect.php";
session_start();

if(!isset($_SESSION['admin_username']) &&   !isset($_SESSION['admin_password']) )
{
    header("location:admin_login.php");
}


if(isset($_POST['add']))
{
	
  $category_name=$_POST['category_name'];
  $parent_category=$_POST['parent_category'];
  
  
    if($parent_category)
    {
      $pid=$parent_category;
    
    
	$category_icon=$_FILES['category_icon']['name'];
	$category_image=$_FILES['category_image']['name'];
	
    $icon_ext=pathinfo($category_icon,PATHINFO_EXTENSION);
    $image_ext=pathinfo($category_image,PATHINFO_EXTENSION);
	
    $icon_path="images/category/i".$pid.".".$icon_ext;
    $image_path="images/category/img".$pid.".".$image_ext;
	
    if(move_uploaded_file($_FILES['category_icon']['tmp_name'], $icon_path) && 
        move_uploaded_file($_FILES['category_image']['tmp_name'], $image_path))
    {
	
      
	  $sql=$link->insert("category_tb",Array("category_name"=>$category_name,"category_icon"=>$icon_path,"category_image"=>$image_path,"parent_category_id"=>$pid));
	  if($sql)
	  {
		  echo "yes"; 
	  }
	  else{
		  echo "no";
	  }
    }
	
    //echo $image_path;
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
        <title>Add Category</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />

        
<!-- perticular page css -->


         <head>
              <meta charset="utf-8" />
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
              <title>Add Category</title>
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
		
		var name=document.frm.category_name.value;
		var pattern=/^[A-Za-z ]*$/;
		if(name=="")
		{
			document.getElementById("name").innerHTML="It must not be blank";
			s=false;
		}
		var fup = document.getElementById('category_icon');
		var fileName = fup.value;
		var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
		if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "png" || ext == "PNG" )
		{}
		else
		{
			document.getElementById("icon").innerHTML="Must be an image";
			s=false;
		}
		var fup = document.getElementById('category_image');
		var fileName = fup.value;
		var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
		if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" )
		{}
		else
		{
			document.getElementById("image").innerHTML="Must be an image";
			s=false;
		}		
	
		
		return s;
	}
	
	</script>
			  
         
        
    </head>
    <body>
      <div id="wrapper">
          <!-- Top Bar Start -->
      
      <?php
	  include "admin_header.php";
	  ?>
      <!--top bar end-->
            

            <?php
			include "left_sidebar.php";
			?>

 
           
         <div class="content-page">
        
            <div class="content">
                     <!-- container-fluid -->
                     <div class="row">
                            <div class="col-12">
                                <div class="card m-b-20" style="margin-top:40px;">
                                    <div class="card-body">
      
                                        <h4 class="mt-0 header-title">Add Category</h4>
                                        
                                        <form name="frm" onSubmit="return validate()" method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Category Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" placeholder="Enter Category Name" id="example-text-input" name="category_name">
												
                                            </div>
											<span id="name" style="color:red;padding-top:5px;
											margin-left:200px;"></span>
                                        </div>
                                      
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Parent Category Name</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="parent_category">
                                                  <option value="none">Self</option>
                                                  <?php 
                                                  $sql=$link->rawQuery("select * from category_tb");
                                                  if($link->count >0)
                                                  {

                                                  foreach($sql as $s)
                                                  {
                                                    ?>
                                                    <option value="<?php echo $s['category_id_pk']; ?>"><?php echo $s['category_name']; ?></option>
                                                    <?php
                                                  }
                                                }
                                                  ?>


                                                  
                                                </select>
                                            </div>
                                        </div>
                                       
                                            <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Category Icon</label>
                                            <div class="col-sm-10">
                                                <input 
                                                class="form-control" type="file"  name="category_icon" id="category_icon">
												
                                            </div>
											<span id="icon" style="color:red;padding-top:5px;
											margin-left:200px;"></span>
                                        </div>
                                      

                                            <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Category Image</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="file"  name="category_image" id="category_image">
												
                                            </div>
											<span id="image" style="color:red;padding-top:5px;
											margin-left:200px;"></span>
											
                                        </div>

                                        
                                           
                                             <div class="col-6 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit" name="add">Add</button>
                                </div>
        
                                            
        
                                        </form>
                                    </div>
                                </div>
                                        
                                       
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                </div> <!-- content -->

                
        </div>        
  <?php
  include "admin_footer.php";
  ?>

    
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

