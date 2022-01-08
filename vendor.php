<?php
include "connect.php";
session_start();

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
    <title>Vendor List</title>

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
    <!-- select -->
    <link rel="stylesheet" href="css/nice-select.css">
    <!-- Icon font -->
    <link rel="stylesheet" href="css/icon-font.css">
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
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">
            <div class="biz-preloader"></div>
        </div>
    </div>
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
                            <h3>Vendor</h3>
                        </div>
                        <div class="breadcrum-list">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Vendor</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page- title area end -->

        <!-- vendor-area start -->
        <div class="vendor-area pt-40 pb-100">
            <div class="container">
                <div class="row mb-60">
                    <div class="col-lg-9 col-md-8">
                        <div class="ventor-list-title">
                            <h2>Store List</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
				<?php
						$sql=$link->rawQuery("select * from vendor_personal_tb");
						foreach($sql as $s)
						{
					?>
                    <div class="col-lg-4 col-lg-4 col-md-6">
                        
						<?php
								$shop=$link->rawQuery("select * from vendor_shop_tb where shop_vendor_id=?",Array($s['vendor_id_pk']));
								foreach($shop as $sh)
								{
							?>
							<div class="vendor-box mb-30">
                            <div class="inner-vendor">
                                <h5>
                                      <a href="shop_details.php?id=<?php echo $sh['shop_id_pk'];?>"><?php echo $sh['shop_name'];?></a>
                                </h5>
                                <ul>
                                    <li><?php echo $sh['shop_address'];?></li>
                                </ul>
                                <div class="vendor-link">
                                    <a href="shop_details.php?id=<?php echo $sh['shop_id_pk'];?>">visit store</a>
                                </div>
                                <div class="vendor-thumb">
                                    <h6><?php echo $s['vendor_name']; ?></h6>
                                </div>
                            </div>
							
                        </div>
						<?php
								}
								?>
                    </div>
                   <?php			
						}
					?>
                    
                </div>
            </div>
        </div>
        <!-- vendor-area end -->

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
