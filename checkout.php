<?php
include "connect.php";
session_start();
if($_SESSION['user']=="")
{
		header("location:index.php");
}
$client_id=$link->rawQueryOne("select * from client_tb where client_username=?",Array($_SESSION["user"]));
$cid=$client_id["client_id_pk"];

?>
<html class="no-js" lang="zxx">


<!-- Mirrored from xopom.xyz/shopse/shopse/demos/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2019 08:58:58 GMT -->
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
    <title>Checkout</title>

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
                            <h3>Checkout</h3>
                        </div>
                        <div class="breadcrum-list">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page- title area end -->

        <!-- coupon-area start -->
        <div class="coupon-area pb-35">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="coupon-accordion">
                            <!-- ACCORDION START -->
                            <div id="checkout-login" class="coupon-content">
                                <div class="coupon-info">
                                    <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est sit amet ipsum luctus.</p>
                                    <form action="#">
                                        <p class="form-row-first">
                                            <label>Username or email
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" />
                                        </p>
                                        <p class="form-row-last">
                                            <label>Password
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" />
                                        </p>
                                        <p class="form-row">
                                            <input type="submit" value="Login" />
                                            <label>
                                                <input type="checkbox" /> Remember me
                                            </label>
                                        </p>
                                        <p class="lost-password">
                                            <a href="#">Lost your password?</a>
                                        </p>
                                    </form>
                                </div>
                            </div>
                            <!-- ACCORDION END -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="coupon-accordion">
                            <!-- ACCORDION START -->
                            <div id="checkout_coupon" class="coupon-checkout-content">
                                <div class="coupon-info">
                                    <form action="#">
                                        <p class="checkout-coupon">
                                            <input type="text" placeholder="Coupon code" />
                                            <input type="submit" value="Apply Coupon" />
                                        </p>
                                    </form>
                                </div>
                            </div>
                            <!-- ACCORDION END -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- coupon-area end -->
        <!-- checkout-area start -->
        <div class="checkout-area pb-70">
            <div class="container">
                <form action="#">
                    <div class="row">
                        
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="your-order">
                                <h3>Your order</h3>
                                <div class="your-order-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-name"><b>Products</b></th>
                                                <th class="product-total"><b>Total</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										$total=0;
										$sql=$link->rawQuery("select * from order_item_tb where order_id=?",Array($cid));
										foreach($sql as $s)		
										{
											$sql1=$link->rawQuery("select * from product_tb where product_id_pk=?",Array($s["product_id"]));
											foreach($sql1 as $p)
											{
										?>
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    <?php echo $p["product_name"];?>
                                                    <strong class="product-quantity"> × <?php echo $s["product_quantity"]; ?></strong>
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">
													<?php echo $s["product_price"]; ?>
													</span>
                                                </td>
                                            </tr>
											
                                            <?php
											$total=$total+$s["product_price"];
											}
										}
											?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td>
                                                    <span class="amount"><?php
													echo $total;
													?></span>
                                                </td>
                                            </tr>
                                            <tr class="shipping">
                                                <th>Shipping</th>
                                                <td>
                                                    <ul>
                                                        <li>        
															<?php
															if($total < 500)
															{
															?>
                                                            <label>Rs. 10</label>
															<?php
															}
															else
															{
															?>
                                                            <label>Free Shipping:</label>
															<?php
															}
															?>
                                                        </li>
                                                        <li></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td>
                                                    <strong>
                                                        <span class="amount"><?php
														$total=$total+10;
													echo "Rs. ".$total;
													?></span>
                                                    </strong>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="payment-method">
                                    <div class="accordion" id="accordionExample">
                                        <h5>Select Payment Method</h5>
										<br>
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <h5 class="mb-0">
                                                   <a href="pay.php?paid=0&cost=<?php echo $total; ?>"> <img src="images/cod.png" width="20%"></a>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingThree">
                                                <h5 class="mb-0">
                                                   <a href="pay.php?paid=1&cost=<?php echo $total; ?>"> <img src="images/paypal.png" width="20%"></a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- checkout-area end -->

        <!-- footer start -->
        <?php
		include "footer.php"
		?>
        <!-- footer end -->



        <!-- Modal Search -->
        <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form>
                        <input type="text" placeholder="Search here...">
                        <button>
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>




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



<!-- Mirrored from xopom.xyz/shopse/shopse/demos/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2019 08:58:58 GMT -->
</html>
