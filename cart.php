<?php
include "connect.php";
session_start();

$client_id=$link->rawQueryOne("select * from client_tb where client_username=?",Array($_SESSION["user"]));
if($client_id)
{
	$id=$client_id["client_id_pk"];
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
    <title>Cart</title>

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
                            <h3>Shopping cart</h3>
                        </div>
                        <div class="breadcrum-list">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Shopping cart</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page- title area end -->

            <!-- cart-area start -->
            <div class="cart-area pt-40 pb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="cart-table">
                                <table class="table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product Image</th>
                                            <th scope="col">Product NAME</th>
                                            <th scope="col">PRICE</th>
                                            <th scope="col">QUANTITY</th>
                                            <th scope="col">TOTAL</th>
                                            <th scope="col">REMOVE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									
										
											$sql1=$link->rawQuery("select * from order_item_tb where order_id=?",Array($id));
											foreach($sql1 as $order)
											{
												$sql2=$link->rawQuery("select * from product_tb where product_id_pk=?",Array($order["product_id"]));
												foreach($sql2 as $product)
												{
													
									?>
                                        <tr>
										
                                            <td>
											
                                                <div class="cart-img">
												<?php
													$sql3=$link->rawQuery("Select * from product_image_tb where product_id=?",Array($product["product_id_pk"]));
													foreach($sql3 as $image)
													{
													?>
                                                   <img src="<?php if($image){echo $siteroot.$image["product_image"]; } ?>" alt="<?php echo $product["product_name"]; ?>" width="40%">
												   <?php
													}
													?>
                                                </div>
												
                                            </td>
											
                                            <td>
                                                <div class="cart-name">
                                                    <h4>
                                                        <a href="product_details.php?pid=<?php echo $product["product_id_pk"]; ?>"><?php echo $product["product_name"]; ?></a>
                                                    </h4>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="cart-price">
                                                    <span><?php echo $product["product_retail_price"]; ?></span>
                                                </div>
                                            </td>
                                            <td>
                                               <div class="cart-Quantity">
                                                    <span><?php echo $order["product_quantity"]; ?></span>
                                                </div>
                            </div>
                                            </td>
                                            <td>
                                                <div class="cart-del">
                                                    <p><?php 
														$a=$product["product_retail_price"];
														$b=$order["product_quantity"];
														echo $c=$a*$b;
													?></p>
                                                </div>
                                            </td>
											
											<td>
                                                <div class="cart-del">
                                                    <a href="remove_product.php?order_item_id=<?php echo $order["order_item_id_pk"]; ?>">X</a>
													<input type="text" value="<?php echo $order["vendor_id"]; ?>" hidden>
                                                </div>
                                            </td>
											
                                                   
                                                
                                        </tr>
										<?php
										}}
										?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-20">
                        <div class="col-xl-12 col-lg-12">
                            <div class="update-cart text-left text-lg-right">
                                <a href="delete_cart.php">Clear shopping cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-100">
                        <div class="col-xl-12 col-lg-12">
                            
							<div class="text-right">
                                    <a class="btn brand-btn" href="checkout.php">CheckOut</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- cart-area start -->

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
