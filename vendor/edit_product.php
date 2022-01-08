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
if(isset($_POST['edit']))
{
	$id=$_POST['id'];
	$name=$_POST['name'];
	$highlights=$_POST['highlights'];
	$category=$_POST['category'];
	$quantity=$_POST['quantity'];
	$description=$_POST['description'];
	$retail=$_POST['retail'];
	$wholesale=$_POST['wholesale'];
	$information=$_POST['information'];
	if($category!="-1")
{
	$link->where('product_id_pk',$vendor_id);
	$sql=$link->update("product_tb",Array("product_name"=>$name,"product_highlights"=>$highlights,"category_id"=>$category,"quantity"=>$quantity,"vendor_id"=>$vendor_id,"product_description"=>$description,"product_retail_price"=>$retail,"product_wholesale_price"=>$wholesale,"product_information"=>$information));
	if($sql)
	{
		header("location:view_product.php");
	}
}
else
{
		$err="Select Valid Category";
		header("location:edit_product.php?error=".$err);
}
}

?>
<html lang="en">
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Edit Product</title>
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
		
		if(name==" ")
		{
			document.getElementById("err_name").innerHTML="Enter Name";
			document.getElementById('idname').style.borderColor='#ff0000';
			s=false;
		}
		
		var highlights=document.form.highlights.value;
		if(highlights=="")
		{
			document.getElementById("err_highlights").innerHTML="It must not be blank";
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
		var retail=document.form.retail.value;
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
		
		var wholesale=document.form.wholesale.value;
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
		var information=document.form.information.value;
		if(information=="")
		{
			document.getElementById("err_information").innerHTML="Enter Additional Information";
			document.getElementById('idinformation').style.borderColor='#ff0000';
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
              <h1>Edit Product</h1>
            </div>
            <div class="ms-panel-body">
			<?php
			$pid=$_GET['pid'];
			$product=$link->rawQueryOne("select * from product_tb where product_id_pk=?",Array($pid));
				if($link->count>0)
				{
				?>
              <form method="post" name="form" onSubmit="return validate()">
			  <input type="text" value="<?php echo $vendor_id; ?>" name="id" hidden>
                <div>
                  <label>Name</label>
                  <input type="type" name="name" id="idname" class="form-control" value="<?php echo $product['product_name']; ?>">
                </div>
				<div>
				<span id="err_name" style="color:red;"></span>
				</div>
				<br>
				<div>
                      <label>Highlights</label>
                      <div class="input-group">
                  <textarea class="form-control"rows="3" id="idhighlights" name="highlights"><?php echo $product['product_highlights']; ?></textarea>
                      </div>
					  <div>
				<span id="err_highlights" style="color:red;"></span>
				</div>
                    </div><br>
					
					 <div>
					<label style="float:left;">Category</label>
                      <div class="input-group">
					  
					  <select class="form-control" name="category" id="idcategory">
					  <option value="-1">select Category</option>
					  <?php 
					  $sql1=$link->rawQuery("select * from category_tb");
					  foreach($sql1 as $s1)
					  {
						  ?>
						  <option value="<?php echo $s1['category_id_pk']; ?>"
						  <?php if($s1['category_id_pk']==$product['category_id']){echo "selected"; } ?>
						  >
						  <?php echo $s1['category_name']; ?>
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
                         <input type="number" class="form-control" value="<?php echo $product['quantity']; ?>" min="0"
						name="quantity" id="idqty" >

                      </div>
					  <div>
				<span id="err_qty" style="color:red;"></span>
				</div>
                </div>
				<br>
				<div>
				<div class="form-group">
                  <label>Vendor Name</label>
                  <input type="type" class="form-control" id="name" value="<?php echo $s['vendor_name'];?>" readonly>
                </div>
				
				</div>
				<div>
					<div class="form-group">
						<label>Description</label>
						<textarea class="form-control" id="iddescription" name="description" rows="3"><?php echo $product['product_highlights']; ?></textarea>
					</div>
					<div>
						<span id="err_description" style="color:red;"></span>
					</div>
				</div>
				<div>
					<div>
						<label>Retail Price</label>
						<input type="type" name="retail"id="idretail" class="form-control" value="<?php echo $product['product_retail_price']; ?>">
					</div>
					<div>
						<span id="err_retail" style="color:red;"></span>
					</div>
				</div>
				<br>
				<div>
					<div>
						<label>Wholesale Price</label>
						<input type="type" name="wholesale" id="idwholesale" class="form-control" value="<?php echo $product['product_wholesale_price']; ?>">
					</div>
					<div>
						<span id="err_wholesale" style="color:red;"></span>
					</div>
				</div>
				<br>
				<div>
					<div class="form-group">
						<label>Additional Information</label>
						<textarea class="form-control" rows="3" id="idinformation" name="information"><?php echo $product['product_information']; ?></textarea>
					</div>
					<div>
						<span id="err_information" style="color:red;"></span>
					</div>
				</div>
					<center><button class="btn btn-primary" type="submit" name="edit">Edit</button></center>
              </form>
			  <?php 
				}
			  ?>
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