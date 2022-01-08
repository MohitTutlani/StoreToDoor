<?php
include "connect.php";
session_start();

$id=$_GET["pid"];

if(isset($_POST['submit']))
{

	  $vendor=$_POST["vendor"];
	 $quantity=$_POST["select"];
	
	 header("location:add_to_cart.php?id=$id&quantity=$quantity&vid=$vendor");
	 
}
?>
<html class="no-js" lang="zxx">
<head>
    <!-- Metas -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="keywords" content="Shopse HTML5 Css3 Template" />
    <meta name="keywords" content="Shopse HTML5 Css3 Template" />
    <meta name="description" content="Shopse - Multipurpose eCommerce HTML5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <!-- Title  -->
    <title>Product Details</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Carousel -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Animate -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- Popup -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <!-- themify -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Icon font -->
    <link rel="stylesheet" href="css/icon-font.css">
    <!-- select -->
    <link rel="stylesheet" href="css/nice-select.css">
    <!-- Menu -->
    <link rel="stylesheet" href="css/meanmenu.css">
    <link rel="stylesheet" href="css/slick.css">
    <!-- default -->
    <link rel="stylesheet" href="css/default.css">
    <!-- Template styles-->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive -->
    <link rel="stylesheet" href="css/responsive.css">
</head>
    <body>
    
    
    <!-- header start -->
    <?php
		include "header.php";
	?>
    <!-- header end -->

        <!-- page- title area start -->
        <div class="page-title-area pt-200 pb-200">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title text-center mb-20">
                            <h3>Product details</h3>
                        </div>
                        <div class="breadcrum-list">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Product Details</li>
                                    
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page- title area end -->

        <!-- product-area start -->
        <div class="product-area pt-40 pb-60">
            <div class="container">
			<form method="post" name="form"> 
                <div class="row">
				
                    <div class="col-xl-4 col-md-4">
                        <div class="product-zoom-img mb-50">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="pro-large text-center">
									<?php
									$sql=$link->rawQueryOne("select * from product_image_tb where product_id=?",Array($id));
									?>
									
                                        <img src="<?php echo $siteroot.$sql["product_image"]; ?>" style="height:50%;" alt="images">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php
						$sql=$link->rawQueryOne("select * from product_tb where product_id_pk=? and is_active=?",Array($id,1));
						
					?>
                    <div class="col-xl-8 col-md-8">
                        <div class="product-desc pl-20 mb-50">
                            <h2><?php echo $sql["product_name"]; ?></h2>
                            <span class="pro-details-price">Rs. 	<?php echo $sql["product_retail_price"]; ?></span>
                            
                            <br>
                            <p class="pro-text"><?php echo $sql["product_information"]; ?></p>
                            <div class="pro-cat">
                                <ul>
                                    <li><span>Availability:</span> <a href="#"><?php  
									if($sql["quantity"]==0)
									{
										echo "out of stock";
									}
									else
									{
										echo "Available";
									}?></a></li>
                                    <li><span>Highlights:  <?php  echo $sql["product_highlights"]; ?></span></li>
                                </ul>
                            </div>
							<h6>Quantity:<h6>
                            <div class="pro-details-action">
                                <select name="select" id="number">
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
							<input type="text" name="vendor" value="<?php  echo $sql["vendor_id"];?>" hidden>
                            <div class="product-btn mt-30">
							<input type="submit" id="cart" name="submit" style="color:white; background-color:#ff3b2f; height:39px; border-color:#ff3b2f;" value="Add To Cart" > 
                               
                                <a href="add_wishlist.php?pid=<?php echo $id; ?>" data-toggle="tooltip" title="Add to Wishlist"><i class="ti-heart"></i></a>
                               
                            </div>
                            
                        </div>
                    </div>
                </div>
				</form>
                <div class="row mt-50">
                    <div class="col-xl-12">
                        <div class="product-review">
                            <ul class="nav review-tab" id="myTab1" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab1" data-toggle="tab" href="#home1" role="tab" aria-controls="home" aria-selected="true">Description </a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade show active" id="home1" role="tabpanel" aria-labelledby="home-tab1">
                                    <div class="review-text mt-30">
                                        <p><?php echo $sql["product_description"]; ?></p>
                                          </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- product-area end -->

        <!-- product-area start -->
        <div class="product-area separator pt-40 pb-130">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 offset-lg-2 offset-xl-2">
                        <div class="area-title title-line text-center mb-75">
                            <h2>Related Product</h2>
                        </div>
                    </div>
                </div>
                <div class="product-active owl-carousel">
				<?php
				$id=$_GET["pid"];
				$sql1=$link->rawQuery("select * from product_tb where product_id_pk=? and is_active=?",Array($id,1));
				foreach($sql1 as $c)
				{
					$sql=$link->rawQuery("select * from product_tb where category_id=? limit 6",Array($c["category_id"]));
					foreach($sql as $s)
					{
						if($s["product_id_pk"] != $id)
						{
							$sql2=$link->rawQuery("select * from product_image_tb where product_id=?",Array($s["product_id_pk"]));
							foreach($sql2 as $image)
							{
							?>
                    <div class="pro-item">
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="product-details.php">
                                    <img src="<?php echo $siteroot.$image["product_image"]; ?>" width="auto" alt="images">"
                                </a>
                            </div>
							
                            <div class="product-content pt-15">
                                <h4>
                                    <a href="product_details.php?id=<?php echo $s["product_id_pk"]; ?>"><?php echo $s["product_name"]; ?></a>
                                </h4>
                                <div class="product-meta">
                                    <div class="pro-price f-left">
                                        <span><?php echo $s["product_retail_price"]; ?></span>
                                    </div>
                                </div>	
                            </div>
							
                        </div>
                    </div>
                   <?php
							}
						}
							}
							}
								?>
                </div>
            </div>
        </div>
        <!-- product-area end -->

        <!-- footer start -->
        <?php
			include "footer.php";
		?>
        <!-- footer end -->



        

        <!-- jQuery -->
        <script src="js/modernizr-3.5.0.min.js"></script>
        <script src="js/jquery-1.12.4.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <!-- popper.min -->
        <script src="js/popper.min.js"></script>
        <!-- bootstrap -->
        <script src="js/bootstrap.min.js"></script>
        <!-- owl carousel -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- isotope.pkgd.min js -->
        <script src="js/isotope.pkgd.min.js"></script>
        <!-- one page js -->
        <script src="js/one-page-nav-min.js"></script>
        <!-- isotope.pkgd.min js -->
        <script src="js/slick.min.js"></script>
        <!-- ajax form js -->
        <script src="js/ajax-form.js"></script>
        <!-- animate -->
        <script src="js/wow.min.js"></script>
        <!-- scrollup.min -->
        <script src="js/jquery.scrollUp.min.js"></script>
        <!-- imagesloaded.min -->
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <!-- popup.min -->
        <script src="js/jquery.magnific-popup.min.js"></script>
        <!-- plugins -->
        <script src="js/plugins.js"></script>
        <!-- custom scripts -->
        <script src="js/main.js"></script>
    </body>

</html>

