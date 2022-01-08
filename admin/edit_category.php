<?php
ob_start();
include 'connect.php';
session_start();

if(!isset($_SESSION['admin_username']) &&   !isset($_SESSION['admin_password']) )
{
    header("location:admin_login.php");
}
$cid=$_GET["cid"];
if(isset($_POST['edit']))
{
	$id=$_POST["id2"];
	
	$category_icon=$_FILES['category_icon']['name'];
	$category=$_FILES['category']['name'];
    $icon_ext=pathinfo($category_icon,PATHINFO_EXTENSION);
    $image_ext=pathinfo($category,PATHINFO_EXTENSION);
	
    $icon_path="../images/category_icon/i".$id.".".$icon_ext;
    $image_path="../images/category/img".$id.".".$image_ext;
	
	$db_icon="images/category_icon/i".$id.".".$image_ext;
	$db_image="images/category/img".$id.".".$image_ext;
	
    if(move_uploaded_file($_FILES['category_icon']['tmp_name'], $icon_path) || 
        move_uploaded_file($_FILES['category']['tmp_name'], $image_path))
    {
      $link->where("category_id_pk",$cid);
      $s=$link->update("category_tb",Array("category_icon"=>$db_icon,"category_image"=>$db_image,"parent_category_id"=>$id));
	  if($s)
	  {
		  echo "yes"; 	
	  }
	  else{
		  echo "no";
	  }
    }
	
    //echo $image_path;
  }
	

?>
<!DOCTYPE html>
<html lang="en">
   <meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Edit category</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />

        
<!-- perticular page css -->


         <head>
              <meta charset="utf-8" />
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
              <title>edit category</title>
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
				else if(!pattern.test(name))
				{
					document.getElementById("name").innerHTML="Invalid category name";
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
            

             <?php include "left_sidebar.php"; ?>

 
           
         <div class="content-page">
        
            <div class="content">
                     <!-- container-fluid -->
                     <div class="row">
                            <div class="col-12">
                                <div class="card m-b-20" style="margin-top:40px;">
                                    <div class="card-body"><?php 
              if(isset($_GET['cid']))
          {
            $id=$_GET['cid'];
          }
              $sql=$link->rawQuery("select * from category_tb where category_id_pk=?",Array($id));
              if($link->count >0)
              {

                  foreach ($sql as $s) 
                  {
                # code...
              

              ?>
                                      
      
                                        <h4 class="mt-0 header-title">Edit Category</h4>
                                        <div style="color:red; text-transform: uppercase;"><?php if(isset($_GET['error']) && $_GET['error']!=""){echo $_GET['error'];}?></div>
                                </div>
                                        
                                        <form name="frm" onSubmit="return validate()" method="post" enctype="multipart/form-data" style="margin-left:20px; margin-right:20px;">
                                        <div class="form-group row">
                                            <input type="text" name="id2" value="<?php echo $s['category_id_pk'];?>" hidden>

                                             <input type="text" name="icon" value="<?php echo $siteroot.$s['category_icon'];?>" hidden>

                                              <input type="text" name="image" value="<?php echo $s['category_image'];?>" hidden>



                                            <label for="example-text-input" class="col-sm-2 col-form-label">Category Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" placeholder="Enter Category Name" id="example-text-input" name="category_name" value="<?php echo $s['category_name']; ?>">
                                            </div>
												<span id="name" style="color:red;padding-top:5px;
											margin-left:200px;"></span>
                                        </div>
                                      
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Parent Category Name</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="parent_category">
                                                  <option value="self">Self</option>
                                                  <?php 
                                                  $sql=$link->rawQuery("select * from category_tb");
                                                  if($link->count >0)
                                                  {

                                                  foreach($sql as $s1)
                                                  {
                                                    ?>
                                                    <option value="<?php echo $s1['category_id_pk']; ?>"
                                                     <?php
                                                        if($s['parent_category_id']==$s1['category_id_pk'])
                                                          echo "selected";
                                                        ?>

                                                      ><?php echo $s1['category_name']; ?></option>
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
                                                <input class="form-control" type="file"  name="category_icon" id="category_icon">
                                                <div>
                                              <img src="<?php echo $siteroot.$s['category_icon']; ?>" height="50px" width="50px">
											  
                                            </div>
											
											
                                            </div>
                                            
                                        </div>
                                      

                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Category Image</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="file"  name="category" id="category_image">
                                                <div>
                                              <img src="<?php echo $siteroot.$s['category_image']; ?>" height="50px" width="50px">
											 
                                            </div>
											
											
                                            </div>
                                        </div>

                                        
                                           
                                             <div class="col-6 text-right" style="padding-bottom:20px;">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit" name="edit">Edit</button>
                                </div>
        
                                            
        
                                        </form>
                                    </div>
                                </div>
                                        
                                       
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                </div> <!-- content -->
                 <?php 
            }
        }?>

                
        </div>        
  <?php include "admin_footer.php"; ?>

    
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