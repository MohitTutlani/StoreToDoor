<?php
include "connect.php";
session_start();
if($_SESSION['user']=="")
{
		header("location:index.php");
}

		require_once ('phpmailer/PHPMailerAutoload.php');
		$client_id=$link->rawQueryOne("select * from client_tb where client_username=?",Array($_SESSION["user"]));
		$email=$client_id["client_email"];
		
		if($link->count>0)
		{
	
			$mail = new PHPMailer();
			$mail->IsSMTP(); // enable SMTP
			$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
			$mail->SMTPAuth = true; // authentication enabled
			$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
			$mail->Host = "mail.storetodoor.com";
			$mail->Port = 465; // or 587
			$mail->IsHTML(true);
			$mail->Username = "storetodoor@accreteit.com";
			$mail->Password = "storetodoor";

			$var ="<html><body>
			You Will Get the bill at the time of delivery After Paying.<br>
			<a href='http://localhost/project/StoreToDoor/index.php'>Click me</a></body></html>";
			$mail->SetFrom("storetodoor@accreteit.com","StoreToDoor");
			$mail->Subject = "Bill for your Order placed on StoreToDoor";
			$mail->MsgHTML($var);
			$mail->AddAddress($email);
			$mail->Send();	
			$status="";
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
    <title>Ordered Successfully</title>

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
                            <h3>Your order has been placed successfully!!</h3>
                            <h3>check your mail please</h3>
                        </div>
                        <div class="breadcrum-list">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item">
                                        <a href="index.php" style="text-decoration:underline;">Continue Shopping</a>
                                    </li>
                                   
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page- title area end -->

        <!-- coupon-area end -->
        <!-- checkout-area start -->
        
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




</html>
