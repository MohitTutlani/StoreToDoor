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
    <title>StoreToDoor </title>

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
    <body onLoad="getLocation()">
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
	  <!-- header End -->

        <!-- slider-area start -->
		
		<span id="location_err">
		</span>
		<span id="demo"></span>
		
        <section class="slider-area">
            <div class="slider-active slider-white">
			<?php
			$sql=$link->rawQuery("select * from slider_tb where is_active=1");
			foreach($sql as $s)
			{
			?>
                <div class="single-slider slider-hight slide-height d-flex align-items-center" style="background-image:url(<?php echo $siteroot.$s["slider_image"]; ?>)">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 offset-xl-2">
                                <div class="slide-content style-1 text-center">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<?php
				}
				?>
                
                
				
				 
            </div>
        </section>
        <!-- slider-area end -->
        <!-- product-area start -->
		<br>
        <section class="product-area pt-20">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="area-title title-line text-center">
                           
                            <h2>Shops</h2>
                        </div>
                    </div>
                </div>
				
                <div class="product-active owl-carousel">
				<?php
				$sql=$link->rawQuery("SELECT * FROM `vendor_shop_tb` WHERE is_active=? ",Array(1));
				foreach($sql as $s)
				{				
				?>
				
					<div class="pro-item">
						<div class="product-wrapper">
							 <div class="product-img">
								<a href="shop_details.php?id=<?php echo $s['shop_id_pk']; ?>">
									<img src="<?php echo $siteroot.$s['shop_image']; ?>" alt=""
									height="270" width="370">
																	
								</a>
								
							</div>
							<div class="product-content pt-15">
								<h4>
								  <a href="shop_details.php?id=<?php echo $s['shop_id_pk'];?>">
									<?php echo $s['shop_name']; ?>
									</a>
								</h4>
							   
							</div>
						</div>
					</div>
					
				<?php
				}
				?>
				</div>
			</div>	
        </section>
        <!-- product-area end -->

        <!-- banner area start -->
        <section class="banner-area-full pt-80">
            <div class="container">
                <div class="row">
				<div class="col-xl-8 offset-xl-2">
                        <div class="area-title title-line text-center">
                           
                            <h2>Categories</h2>
                        </div>
                    </div>
					<?php
						
					$sql=$link->rawQuery("select * from category_tb where parent_category_id=category_id_pk and is_active=? limit 3",Array(1));
					
					foreach($sql as $s)
					{
						
					?>
					
                    <div class="col-md-4">
					<a href="category.php?id=<?php echo $s['category_id_pk']; ?>">
                        <div class="featured-wrap">
                            <div >
                                <img src="<?php echo $s["category_image"]; ?>" width="60%" alt="images">
                            </div>
                            
                                <h4><?php echo $s['category_name']; ?></h4>
                            
                        </div>
						</a>
                    </div>
                    <?php
					}
					
					?>
                </div>
            </div>
			<center>
			
				<a href="category.php?id=0"><button class="btn brand-btn" onMouseOver="this.style.color=#f50057" >View All</button></a>
							
			</center>
        </section>
		<br>
        <!-- banner area end -->


        <!-- Start Testimonails -->
        <section class="quote-area bg-overlay" id="quote-area">
            <div class="container">
                <div class="row">
                    <!-- Col end-->
                    <div class="offset-sm-2 col-lg-8">
                        <div class="owl-carousel owl-theme testimonial-slide" id="testimonial-slide">
                            <div class="item">
                                <div class="ts-testimonial text-center">
                                    <div class="quotes-text">
                                        <div class="quotes-icon">
                                            <i class="icon icon-quote2"></i>
                                        </div>
                                        <span> I have been using StoreToDoor very often and i never face any dificulities in using it.they provide an amazing service in very pleasant way. </span>
                                    </div>
                                    <div class="quotes-img">
                                        <img src="images/team/team1.jpg" alt="">
                                    </div>
                                    <h2>Azima Sheikh</h2>
                                    
                                </div>
                                <!-- Quote item end-->
                            </div>
                            <!-- Item 1 end-->
                            <div class="item">
                                <div class="ts-testimonial text-center">
                                    <div class="quotes-text">
                                        <div class="quotes-icon">
                                            <i class="icon icon-quote2"></i>
                                        </div>
                                        <span>Simple interface to use yet provide wonderful service to their customer.Never accounter false data or fake information.friendly website that can be used by customers of any age. </span>
                                    </div>
                                    <div class="quotes-img">
                                        <img src="images/team/team2.jpg" alt="">
                                    </div>
                                    <h2>Mohit Tutlani</h2>
                                    
                                </div>
                                <!-- Quote item end-->
                            </div>
                            <!-- Item 2 end-->
                            <div class="item">
                                <div class="ts-testimonial text-center">
                                    <div class="quotes-text">
                                        <div class="quotes-icon">
                                            <i class="icon icon-quote2"></i>
                                        </div>
                                        <span>"What you see is What you get!"
										we get each and every service promised by them.fast delivery and safe payment methods.In love with thi site.
										</span>
                                    </div>
                                    <div class="quotes-img">
                                        <img src="images/team/team3.jpg" alt="">
                                    </div>
                                    <h2>Sakshi Shah</h2>
                                    
                                </div>
                                <!-- Quote item end-->
                            </div>
                            <!-- Item 3 end-->
                        </div>
                        <!-- Testimonial carousel end-->
                    </div>
                    <!-- Col end-->
                </div>
                <!-- Content row end-->
            </div>
            <!-- Container end-->
        </section>
        <!-- End Testimonails  -->
       
        <!-- footer start -->
       <?php 
	   include "footer.php";
	   ?>
        <!-- footer end -->	
	<!--location modal-->
	<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background:#04003a;">
        
        <h4 class="modal-title" style="    text-align: center;
    width: 100%;
    color: #fd2e20;">Enter your Delivery Address</h4>
		
      </div>
	  <form name="frm" method="post" onSubmit="return validate()" action="#">
      <div class="modal-body">
	  
        <span style="color:#04003a;font-weight:900;">Address:</span><textarea id="address" name="address" rows="5" cols="60" style="margin-top:10px;margin-bottom:20px;"></textarea>
		<br>
		<span style="color:#04003a;font-weight:900;">Zipcode:</span>
		<br><input type="text" name="zipcode" style="margin-top:10px;width:100%;">
      </div>
      <div class="modal-footer">
       <input type="submit" class="btn btn-default" name="submit" id="submit" value="locate">
      </div>
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


</html>
