<?php
include 'connect.php';
session_start();

if(!isset($_SESSION['vendor_email']) &&   !isset($_SESSION['vendor_password']) )
{
    header("location:vendor_index.php");
}
if(isset($_POST['submit']))
{
	
	$name=$_POST['name'];
	$highlight=$_POST['highlight'];
	$category=$_POST['category'];
	$quantity=$_POST['quantity'];
	$description=$_POST['description'];
	$rprice=$_POST['rprice'];
	$wprice=$_POST['wprice'];
	$info=$_POST['info'];
	$margin=0;
	$err_image="";
	$i=0;
	
	
	
	$sql1=$link->rawQuery("select vendor_id_pk from vendor_personal_tb where vendor_email=?",Array($_SESSION['vendor_email']));
	foreach($sql1 as $s1)
	{
		$vendor_id=$s1['vendor_id_pk'];
	}

	
	if(isset($rprice) && isset($wprice))
	{
		$margin=$rprice-$wprice;
	
	}


	$sql=$link->insert("product_tb",Array("product_name"=>$name,"product_highlights"=>$highlight,"category_id"=>$category,"quantity"=>$quantity,"vendor_id"=>$vendor_id,"product_description"=>$description,"product_retail_price"=>$rprice,"product_wholesale_price"=>$wprice,"product_margin"=>$margin,"product_information"=>$info));

	if($sql)
	{	
		
			
				$sql2= $link->insert("product_image_tb",Array("product_id"=>$sql,"product_image"=>""));
				$img=$_FILES['product_images']['name'];				
				$ext=pathinfo($img,PATHINFO_EXTENSION);				
				$image_path="../images/product/p".$sql.$sql2.".".$ext;			
			
				if(move_uploaded_file($_FILES['product_images']['tmp_name'], $image_path))
				{
					
					$link->where("product_image_id_pk",$sql2);
					$link->update("product_image_tb",Array("product_image"=>$image_path));
					if($sql2)
					{
						echo "hello world";
						header('location:add_product.php');
					}
				}
		
	}
}	

?>
<html lang="en">
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Add Product</title>
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
<script>
	function validate()
	{
		
		var s=true;
		document.getElementById("err_name").innerHTML="";
		document.getElementById("err_highlights").innerHTML="";
		document.getElementById("err_category").innerHTML="";
		document.getElementById("err_qty").innerHTML="";
		document.getElementById("err_description").innerHTML="";
		document.getElementById("err_retail").innerHTML="";
		document.getElementById("err_wholesale").innerHTML="";
		document.getElementById("err_information").innerHTML="";
		
		
		
		document.getElementById('idname').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idhighlights').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idcategory').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idqty').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('iddescription').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idretail').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idwholesale').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idinformation').style.borderColor='rgba(0,0,0,0.1)';
		
		var name=document.form.name.value;
		
		if(name=="")
		{
			document.getElementById("err_name").innerHTML="Enter Name";
			document.getElementById('idname').style.borderColor='#ff0000';
			s=false;
		}
		
		var highlights=document.form.highlight.value;
		if(highlights=="")
		{
			document.getElementById("err_highlights").innerHTML="Enter Highlights about Product";
			document.getElementById('idhighlights').style.borderColor='#ff0000';
			s=false;
		}
		
		var category=document.form.category.value;
		if(category==-1)
		{
			document.getElementById("err_category").innerHTML="please select category";
			document.getElementById('idcategory').style.borderColor='#ff0000';
			s=false;
		}
		var qty=document.form.quantity.value;
		var pattern=/^[1-9]*$/;
		if(qty=="")
		{
			document.getElementById("err_qty").innerHTML="Enter Quantity";
			document.getElementById('idqty').style.borderColor='#ff0000';
			s=false;
		}
		else if(!pattern.test(qty))
		{
			document.getElementById("err_qty").innerHTML="Enter Quantity";
			document.getElementById('idqty').style.borderColor='#ff0000';
			s=false;
		}
		var description=document.form.description.value;
		if(description=="")
		{
			document.getElementById("err_description").innerHTML="Enter Description";
			document.getElementById('iddescription').style.borderColor='#ff0000';
			s=false;
		}
		var retail=document.form.rprice.value;
		if(retail=="")
		{
			document.getElementById("err_retail").innerHTML="Enter Retail Price";
			document.getElementById('idretail').style.borderColor='#ff0000';
			s=false;
		}
		else if(isNaN(retail))
		{
			document.getElementById("err_retail").innerHTML="Enter Retail Price";
			document.getElementById('idretail').style.borderColor='#ff0000';
			s=false;
		}
		
		var wholesale=document.form.wprice.value;
		if(wholesale=="")
		{
			document.getElementById("err_wholesale").innerHTML="Enter Wholesale Price";
			document.getElementById('idwholesale').style.borderColor='#ff0000';
			s=false;
		}
		else if(isNaN(wholesale))
		{
			document.getElementById("err_wholesale").innerHTML="Enter Wholesale Price";
			document.getElementById('idwholesale').style.borderColor='#ff0000';
			s=false;
		}
		var information=document.form.info.value;
		if(information=="")
		{
			document.getElementById("err_information").innerHTML="Enter Additional Information";
			document.getElementById('idinformation').style.borderColor='#ff0000';
			s=false;
		}
	
	
		var fup = document.getElementById('uploadfile');
		var fileName = fup.value;
		if(fileName=="")
		{
			document.getElementById("err_image").innerHTML="Enter Image";
			document.getElementById('uploadfile').style.borderColor='#ff0000';
			s=false;
		}
		
		return s;
		}
	</script>
</head>
<body class="ms-body ms-aside-left-open ms-primary-theme ms-has-quickbar">

  <!-- Sidebar Navigation Left -->
 
	<?php include 'left_sidebar.php'; ?>
  
  <!-- Main Content -->
  <main class="body-content">

    <!-- Navigation Bar -->
  
<?php include 'vendor_header.php'; ?>
    <!-- Body Content Wrapper -->
      <div class="col-md-12" style="margin-top:30px; margin-bottom:30px;">
          <div class="ms-panel">
            <div class="ms-panel-header">
              <h1>Add Product</h1>
            </div>
            <div class="ms-panel-body">
              <form method="post" name="form" enctype="multipart/form-data">
                <div>
                  <label>Name</label>
                  <input type="type" class="form-control" name="name" id="idname" placeholder="Product Name">
                </div>
				<div>
				<span id="err_name" style="color:red;"></span>
				</div>
				<br>
				<div>
                      <label>Highlights</label>
                      <div class="input-group">
							<textarea class="form-control"rows="3" id="idhighlights" placeholder="Enter Highlights about Product"  name="highlight" ></textarea>
                      </div>
				<div>
				<span id="err_highlights" style="color:red;"></span>
				</div>
                    </div><br>
					
					 <div>
					<label style="float:left;">Category</label>
                      <div class="input-group">
					  <select class="form-control" name="category" id="idcategory">
					  <option value="-1">Select Category</option>
					  <?php 
					  $category=$link->rawQuery("select * from category_tb");
					  foreach($category as $c)
					  {
						  ?>
						  <option value="<?php echo $c['category_id_pk']; ?>">
						  <?php echo $c['category_name']; ?>
						  </option>
						  
					  <?php } ?>
					  </select>
                        
                      </div>
					  </div>
					  <div>
				<span id="err_category" style="color:red;"></span>
				</div>
					  <br>
                <div>
                  <label>Quantity</label>
                  <div class="input-group">
                         <input type="number" class="form-control"  placeholder="quantity" min="0"
						name="quantity" id="idqty" >
                      </div>
					  <div>
				<span id="err_qty" style="color:red;"></span>
				</div>
                </div>
				<br>
				<div class="form-group">
                  <label>Vendor Name</label>
                  <input type="type" class="form-control" name="vname" value="<?php echo $s['vendor_name'];?>" readonly>
                </div>
				<div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" name="description" id="iddescription" placeholder="Enter Description" rows="3"></textarea>
				  <div>
				<span id="err_description" style="color:red;"></span>
				</div>
                </div>
				
				</div>
				<div>
				<div>
                  <label>Retail Price</label>
                  <input type="type" class="form-control" name="rprice" id="idretail" placeholder="Retail Price">
                </div>
				<div>
				<span id="err_retail" style="color:red;"></span>
				</div>
				
				</div>
				<br>
				<div>
				<div>
                  <label>Wholesale Price</label>
                  <input type="type" class="form-control" name="wprice" id="idwholesale" placeholder="Wholesale Price">
                </div>
				<div>
				<span id="err_wholesale" style="color:red;"></span>
				</div>
				</div>
				<br>
				<div>
				<div class="form-group">
                  <label>Additional Information</label>
                  <textarea class="form-control" rows="3" name="info" placeholder="Enter Additional Information" id="idinformation"></textarea>
				  <div>
				<span id="err_information" style="color:red;"></span>
				</div>
                </div>
				
				
				</div>
				<div>
                      <label>Images</label>
                      <div class="input-group">
                        <div class="custom-file">
						<input type="file" name="product_images" value="fileupload" id="fileupload" multiple="true">
					  </div>
					 </div>
                    </div>
					<span id="err_image" style="color:red;">
					  <?php 
					  if(isset($err_image))
					  {
						  echo $err_image;
					  }
					  ?>
					  </span>
					<center><button class="btn btn-primary" type="submit" name="submit">Submit</button></center>
              </form>
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