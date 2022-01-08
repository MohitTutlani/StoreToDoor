<?php
$expireAfter = 60;
 
if(isset($_SESSION['last_action']))
{ 
    $secondsInactive = time() - $_SESSION['last_action'];
 
    $expireAfterSeconds = $expireAfter * 60;
 
    if($secondsInactive >= $expireAfterSeconds)
	{
        header("location:logout.php");
    }
}

$_SESSION['last_action'] = time();
?>
<style>
.dropbtn {
    background-color: #fd2e20;
    color: white;
    padding: 4px 16px;
    font-size: 16px;
    border: none;
    margin-left: 30px;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #04003a;}
</style>

<!-- header start -->
    <header>
        <div class="main-menu-header">
            
            <div class="main-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-2 col-lg-2 col-md-4 col-4 d-flex align-items-center">
                            <div class="logo">
                                <a href="index.php"><img src="images/storetodoor-logo.png" alt="" style="width:175px;"></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-8 col-8">
                            <div class="header-right f-right">
                                <ul>
								<?php
								$cnt=0;
								if(isset($_SESSION['cart']))
								{
									$sql=$link->rawQuery("select * from order_item_tb where order_id  in (select order_id_pk from order_tb where is_active=1 and order_id_pk=?)",Array($_SESSION['cart']));
									
									foreach($sql as $s)
									{
										$cnt++;
									}
								}
								?>
								
								<?php
								if(isset($_SESSION['user']))
								{
									?>
									<div class="dropdown">
									  <button class="dropbtn" style="text-transform:uppercase;"><?php echo $_SESSION['user']; ?></button>
									  <div class="dropdown-content">
										<a href="my_account.php">My Account</a>
										<a href="order_history.php">Order History</a>
										<a href="wishlist.php">My Wishlist</a>
										<a href="change_password.php">Change Password</a>
										<a href="logout.php">Logout</a>
									  </div>
									</div>
										<li class="d-shop-cart"><a href="cart.php"><i class="ti-shopping-cart"></i> 									
										
								</li>							 
								 
                                <?php
								}
								else
								{

								?>
								 
								<li><a href="login.php?flag=0"><i class="ti-user"></i></a></li>
								<?php
								}
								?>
                                    
                                </ul>
                            </div>
                            <div class="main-menu f-left">
                                <nav id="mobile-menu">
                                    <ul>
                                        <li class="mega-menu">
                                            <a href="index.php">Home </a>
                                            
                                        </li>
                                        <li class="mega-menu">
                                            
                                            <a href="shop.php?id=0">Shop <i class="fa fa-angle-down"></i></a>
                                            <ul class="submenu" style="padding-top:0px;">
                                                <li>
                                                    <ul class="submenu  level-1">
                                                    <?php 
													$sql=$link->rawQuery("select * from vendor_shop_tb where is_active=? limit 3",Array(1));
													foreach($sql as $s)
													{
													?>														
                                                        <li>
                                                            <a href="shop_details.php?id=<?php echo $s['shop_id_pk']; ?>">
															<?php echo $s['shop_name']; ?>
															</a>
                                                        </li>
													<?php
													}
													?>
													<li>
														<a href="shop.php?id=0">View all</a>
													</li>
                                                    </ul>
                                                </li>
                                               
                                            </ul>
                                        </li>
                                        <li class="mega-menu">
                                            
                                            <a href="category.php?id=0">Category <i class="fa fa-angle-down"></i></a>
                                            <ul class="submenu" style="padding-top:0px;">
                                                <li>
                                                    <ul class="submenu  level-1">
													<?php 
													$sql=$link->rawQuery("select * from category_tb where parent_category_id=category_id_pk and is_active=? limit 3",Array(1));
													foreach($sql as $s)
													{
													?>														
                                                        <li>
                                                            <a href="category.php?id=<?php echo $s['category_id_pk'];?>">
															<?php echo $s['category_name']; ?>
															</a>
                                                        </li>
													<?php
													}
													?>
													<li>
														<a href="category.php?id=0">View all</a>
													</li>
                                                        
                                                    </ul>
                                                </li>
                                                
                                            </ul>
                                        </li>
										 <li>
                                           
                                            <a href="vendor_list.php">Vendor List</a>
                                        </li>
                                        
                                        <li>
                                           
                                            <a href="about_us.php">About Us</a>
                                        </li>
                                        
                                        
                                        <li>
                                            <a href="contact_us.php">Contact Us</a>
                                        </li>
										
										
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-12 d-lg-none">
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->