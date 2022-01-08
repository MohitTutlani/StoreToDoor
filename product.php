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
    <title>Product</title>

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
	  <link rel="stylesheet" href="css/nice-select.css">

    <!-- Icon font -->
    <link rel="stylesheet" href="css/icon-font.css">
    <!-- Menu -->
    <link rel="stylesheet" href="css/meanmenu.css">
    <link rel="stylesheet" href="css/slick.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
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
                            <h3>Product</h3>
                        </div>
                        <div class="breadcrum-list">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page- title area end -->

        <!-- vendor-area start -->
        <div class="vendor-area pt-40 pb-90">
            <div class="container">
                <div class="row">
                    
					<div class="col-xl-3 col-lg-3">
                        
                     <div class="shop-sidebar mb-40">
                        <h3 class="sidebar-title">Filter by Price</h3>
                        <div class="price-filter">
                            <div id="slider-range"></div>
                            <input type="text" id="amount">
							<input type="text" id="val1" hidden>
							<input type="text" id="val2" hidden>
                        </div>
                    </div>
				<div class="shop-sidebar mb-40" style="overflow:inherit;">
					<h3 class="sidebar-title">Filter by Order</h3>
						<div class="short-by">
							<select name="sortby" onchange="sorting(this.value)" style="display: none;" id="sortby">
								<option value="-1">Sort By: </option>
								<option value="1">Price High to Low</option>
								<option value="2">Price Low to High</option>
								<option value="3">Name A to Z </option>
								
							</select>
						</div>
					</div>
                    </div>
					
                    <div class="col-xl-9 col-lg-9">
                        
                        <div class="store-hrader mb-60">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="ventor-list-title">
                                        <h2>Products</h2>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="vendor-search-form f-right">
                                        <form action="#" method="post">
                                            <input type="text" placeholder="Search Product" 
											onkeyup="search(this.value)">
                                            <button>
                                                <i class="ti-search"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row"  id="mydiv">
						<?php
						$id=$_GET['id'];
						$sql=$link->rawQuery("select * from product_tb where category_id=?",Array($id));
						foreach($sql as $s)
						{
						?>
                            <div class="col-xl-4 col-md-6">
                                <div class="product-wrapper mb-40">
                                    <div class="product-img">
                                      
										<?php
										$sql2=$link->rawQuery("select * from product_image_tb where product_id=?",Array($s['product_id_pk']));
										$i1="";
										foreach($sql2 as $s2)
										{
											
												$i1=$s2["product_image"];
											
										} 
										?>
										<a href="product_details.php?pid=<?php echo $s['product_id_pk']; ?>">
										  <img src="<?php echo $siteroot.$i1; ?>" alt="image" style="width:50%;" >
                                        </a>
                                        <div class="product-action">
										<?php
										$vendor_id=0;
										$vendor=$link->rawQueryOne("select vendor_id from product_tb where product_id_pk=?",Array($s['product_id_pk']));
										$vendor_id=$vendor['vendor_id'];
										
										$shop=$link->rawQuery("select * from vendor_shop_tb where shop_vendor_id=? ",Array($vendor_id));
										if($s['quantity']==0)
										{
											?>
											<a  data-toggle="tooltip" data-placement="right" title="out of stock">
													<i class="ti-shopping-cart"></i>
											</a>
											
											<?php
										}
										else if($link->count > 0)
										{
											
										?>
                                            <a href="add_to_cart.php?id=<?php echo $s['product_id_pk']; ?>&quantity=<?php echo "1"; ?>&vid=<?php echo $vendor_id; ?>" data-toggle="tooltip" data-placement="right" title="Add to Cart">
                                                <i class="ti-shopping-cart"></i>
                                            </a>
										<?php
										}
										else
										{
										?>
											<a href="wishlist.php?id=<?php echo $s['product_id_pk']; ?>" data-toggle="tooltip" data-placement="right" title="Add to Cart">
                                                <i class="ti-shopping-cart"></i>
                                            </a>
										
											
										<?php
										}
										?>
                                            <a href="product_details.php?pid=<?php echo $s['product_id_pk']; ?>" data-toggle="tooltip" data-placement="right" title="Quick View">
                                                <i class="ti-new-window"></i>
                                            </a>
                                           
                                            
                                        </div>
                                    </div>
                                    <div class="product-content pt-15">
                                        <h4>
                                            <a href="product_details.php?pid=<?php echo $s['product_id_pk']; ?>">
											<?php echo $s['product_name']; ?>
											</a>
                                        </h4>
                                        <div class="product-meta">
                                            <div class="pro-price f-left">
                                                <span>Rs.<?php echo $s['product_retail_price']; ?></span>
                                                
                                            </div>
											
                                        </div><br/>
										<div class="product-meta">
										<div class="pro-price">
											<span style="color:red;">
											<?php
											if($s['quantity']==0)
											{
												echo "Out Of Stock";
											}
											?>
											</span>
											</div>
										</div>
                                    </div>
                                </div>
                            </div>
						<?php
						}
						?>
                            
                        </div>
                    </div>
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
