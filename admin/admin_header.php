<?php
	require_once("connect.php");
	?>
<div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="admin_index.php" class="logo">
                        <span style="color:#fff;">
                            Store to Door

                        </span>
                    </a>
                </div>

                <nav class="navbar-custom">
                    <ul class="navbar-right d-flex list-inline float-right mb-0">
                        

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<?php
								$sql=$link->rawQueryOne("select count(*)as cnt from notification_tb where is_active_a=?",Array(1));
								$total=$sql['cnt'];
								
							?>
                                <i class="ti-bell noti-icon"></i>
                                <span class="badge badge-pill badge-danger noti-icon-badge"><?php echo $total; ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                                <!-- item-->
								
								
                                <h6 class="dropdown-item-text">
                                    Notifications (<?php echo $total; ?>)
                                </h6>
                                <div class="slimscroll notification-item-list">
                                    <!-- item-->
                                    <a href="view_vendor.php" class="dropdown-item notify-item active" onClick="unseen_notification(1)">
									<?php
										$vendor_notification=$link->rawQueryOne("select count(vendor_id)as cnt from notification_tb where is_active_a=? and vendor_id!=? and order_id=?",Array(1,0,0));
										$total_vendor=$vendor_notification['cnt'];
									?>
                                        <div class="notify-icon">
										<?php echo $total_vendor; ?>
										</div>
                                        <p class="notify-details">New Vendor Registered</p>
                                    </a>
                                    <!-- item-->
									
                                    <a href="view_client.php" class="dropdown-item notify-item" onClick="unseen_notification(2)">
									<?php
										$client_notification=$link->rawQueryOne("select count(client_id)as cnt from notification_tb where is_active_a=? and client_id!=?",Array(1,0));
										$total_client=$client_notification['cnt'];
									?>
                                        <div class="notify-icon">
										<?php echo $total_client; ?>
										</div>
                                        <p class="notify-details">New Client Registered</p>
                                    </a>
                                    <!-- item-->
                                    <a href="order_detail.php" class="dropdown-item notify-item" onClick="unseen_notification(3)">
									<?php
										$order_notification=$link->rawQueryOne("select count(order_id)as cnt from notification_tb where is_active_a=? and order_id!=?",Array(1,0));
										$total_order=$order_notification['cnt'];
									?>
                                        <div class="notify-icon">
										<?php echo $total_order; ?>
										</div>
                                        <p class="notify-details">New Order Placed</p>
                                    </a>
                                   
                                   
                                </div>
                               
                            </div>        
                        </li>
                        <li class="dropdown notification-list">
                            <div class="dropdown notification-list nav-pro-img">
                                <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
								
								
                                    <img src="images/login_icon.png" alt="user" class="rounded-circle" style="height:36px; width:43px;">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                   
                                    <a class="dropdown-item text-danger" href="admin_logout.php"><i class="mdi mdi-power text-danger"></i> Logout</a>
                                </div>                                                                    
                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-effect">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>
                       
                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->
			<script>
			function unseen_notification(val)
			{
			
				$.ajax({
				  url:"change_notification.php",
				  method:"POST",
				  data:{value:val},
				  success:function(data)
				  {}
			});
			}
			</script>