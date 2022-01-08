<?php
include 'connect.php';
session_start();

$id=0;
$sql="";
if($_GET['id']==0)
{
	$id=0;
}
else
{
	$id=$_GET['id'];
}
if($id!=0)
{
	$sql=$link->rawQuery("select * from category_tb where parent_category_id=? and is_active=? ",Array($id,1));
	$cnt=$link->count;
	
	
	if($cnt>0)
	{
		header("location:sub_category.php?id=".$id);
	}
	else
	{
		header("location:category.php?id=".$id);
	}
}

?>
<html class="no-js" lang="zxx">

<head>
    <!-- Metas -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="keywords" content="Shopse HTML5 Css3 Template" />
    <meta name="description" content="Shopse - Multipurpose eCommerce HTML5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <!-- Title  -->
    <title>Category</title>

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
	<link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/icon-font.css">
    <!-- Menu -->
    <link rel="stylesheet" href="css/meanmenu.css">
	<!--slick -->
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

   
		
		<span id="location_err">
		</span>
		<span id="demo"></span>
		
        <!-- page- title area start -->
        <div class="page-title-area pt-200 pb-200">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title text-center mb-20">
                            <h3>Product Categories</h3>
							
                        </div>
                        <div class="breadcrum-list">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page- title area end -->
    
	<!-- product-area start -->
    <div class="vendor-area pt-40 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                  <br>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" >
                            <div class="row">
										<?php
										$id=$_GET['id'];
											$sql=$link->rawQuery("select * from category_tb where parent_category_id=category_id_pk and is_active=?",Array(1));
											foreach($sql as $s)
											{
										?>
                                <div class="col-xl-4 col-lg-4 col-md-6">
                                   
                                        <span>
                                            <a href="sub_category.php?id=<?php echo $s['category_id_pk']; ?>">
                                                <img src="<?php echo $s["category_image"]; ?>" width="60%"alt="images">
                                                
                                            </a>
                                            <div class="product-action">
                                                <a href="#" data-toggle="tooltip" data-placement="right" title="Shoppingb Cart">
                                                    <i class="ti-shopping-cart"></i>
                                                </a>
                                                <a href="#" data-toggle="tooltip" data-placement="right" title="Quick View">
                                                    <i class="ti-new-window"></i>
                                                </a>
                                                <a href="#" data-toggle="tooltip" data-placement="right" title="Compare">
                                                    <i class="ti-panel"></i>
                                                </a>
                                                <a href="#" data-toggle="tooltip" data-placement="right" title="Wishlist">
                                                    <i class="ti-heart"></i>
                                                </a>
                                            </div>
									
                                            <h4>
                                                <a href="sub_category.php?id=<?php echo $s['category_id_pk']; ?>"><?php echo $s['category_name']; ?></a>
                                            </h4>
                                           
                                        </div>
										 <?php
											}
										?>
                                        </span>
                                  
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
		<br>
    <!-- footer start -->
    <?php
		include 'footer.php';
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


<!-- Mirrored from xopom.xyz/shopse/shopse/demos/index-2.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2019 08:59:19 GMT -->
</html>