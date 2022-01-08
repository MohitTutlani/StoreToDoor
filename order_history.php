<?php
include "connect.php";
session_start();

if($_SESSION['userid']=="")
{
		header("location:index.php");
}

?>

<!doctype html>
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
    <title>order history</title>

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
	<script>
	function calculate(val,pid,pr)
	  {
		
		document.getElementById("total"+pid).innerHTML=val*pr;
		
		$.ajax({
		type: "POST",
		url: "updateprice.php",
		data:'quantity='+val+'&pid='+pid + '&price=' +pr,
		success: function(data){
		
		}
		});
	  }
		
	
	</script>
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
                            <h3>Order history</h3>
                        </div>
                        <div class="breadcrum-list">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Order history</li>
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
							<form name="frm" action="#" method="post">
                                <table class="table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Order Date</th>
                                            <th scope="col">Total Cost</th>
                                            <th scope="col">Payment Status</th>
                                            <th scope="col">View Details</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$sql=$link->rawQuery("select * from order_tb where client_id=? and is_active=?",Array($_SESSION['userid'],1));
									
									foreach($sql as $s)
									{
									?>
                                            <td>
                                                <div class="cart-del">
                                                   <span><?php echo 
														$s['order_date_time']; ?></span>
													
                                                </div>
                                            </td>
											<td>
                                                <div class="cart-del">
                                                   <span><?php echo 
														$s['total_cost']; ?></span>
													
                                                </div>
                                            </td>
											<td>
                                                <div class="cart-del">
                                                   <span><?php 
												   if($s['is_paid']==1)
												   {
													   echo "<span style='color:green;'>Paid</span>";
												   }
												   else
												   {
													  echo "<span style='color:red;'>Unpaid</span>" ;
												   }
									
								
												   ?></span>
													
                                                </div>
                                            </td>
											<td>
											 <div class="cart-del">
                                                    <a href="view_history.php?oid=<?php 
													echo $s['order_id_pk']; ?>">
													<i class="ti-shopping-cart"></i></a>
                                                </div>
											</td>
                                        </tr>
                                        
                                        <?php
										}
										
										?>
                                    </tbody>
                                </table>
								</form>
                            </div>
                        </div>
                    </div>
			
                    <div class="row mt-20" style="padding-bottom:10px;">
                        <div class="col-xl-6 col-lg-6">
                            <div class="coupon-left">
                                
                            </div>
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
