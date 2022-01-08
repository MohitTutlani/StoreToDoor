<?php
include "connect.php";
session_start();

if(isset($_POST["send_mail"]))
{
	$name=$_POST["name"];
	$email=$_POST["email"];
	$subject=$_POST["subject"];
	$phone=$_POST["phone"];
	$message=$_POST["message"];
	
	$sql=$link->insert("contact_us_tb",Array("name"=>$name,"email"=>$email,"phone"=>$phone,"subject"=>$subject,"message"=>$message));
	
	if($sql)
	{
		header("location:index.php");
	}
	else
	{
		header("location:contact_us.php");
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
    <title>Contact Us</title>

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
                            <h3>Contact Us</h3>
                        </div>
                        <div class="breadcrum-list">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item">
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page- title area end -->

        <!-- contact-area start -->
        <div class="contact-area gray-bg pt-40 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-info mb-40">
                            <h3>Get In Touch</h3>
                            <p>Always stay in touch. We make contacting us easier by simply mailing us your query. Accrete InfoTech will always be at your side for any problems you face. We understand business and how services makes it more comfortable. For better interaction fill up the form below. We will contact you as soon as possible.</p>
                            <form  method="POST" name="form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input name="name" type="text" placeholder="Name">
                                    </div>
                                    <div class="col-md-6">
                                        <input name="email" type="text" placeholder="Email">
                                    </div>
                                    <div class="col-md-6">
                                        <input name="subject" type="text" placeholder="Subject">
                                    </div>
                                    <div class="col-md-6">
                                        <input name="phone" type="text" placeholder="Phone">
                                    </div>
                                    <div class="col-md-12">
                                        <textarea name="message" cols="30" rows="10" placeholder="Message"></textarea>
                                        <input class="btn brand-btn" type="submit" name="send_mail"></button>
                                    </div>
                                </div>
                                <p class="ajax-response"></p>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-info mb-40">
                            <h3>More Information</h3>
                            <br>
                            <ul class="contact-text">
                                <li>
                                    <span>Location</span>
                                    <p>184 Main Rd E, St Albans VIC 3021, Australia</p>
                                </li>
                                <li>
                                    <span>Email</span>
                                    <p>Support@gmail.com <br> www.example.net</p>
                                </li>
                                <li>
                                    <span>Call Us</span>
                                    <p>+0123456789</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact-area end -->

        <!-- map <div id="contact-map"></div> -->
        
        <!-- map end -->

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
