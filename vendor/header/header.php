<?php
	require_once 'database_connection.php';
	$id=0;
	if(isset($_SESSION['vendor_email']) && isset($_SESSION['vendor_password']))
	{
		$email=$_SESSION['vendor_email'];
		$sql=$link->rawQuery("select vendor_id_pk,vendor_name,vendor_photo from vendor_personal_tb where vendor_email=?",Array($email));
		foreach($sql as $s)
		{
			$id=$s['vendor_id_pk'];
			$name=$s['vendor_name'];
			$img=$s['vendor_photo'];
		}
	}
?> 
 <nav class="navbar ms-navbar">

      <div class="ms-aside-toggler ms-toggler pl-0" data-target="#ms-side-nav" data-toggle="slideLeft">
        <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
      </div>

      <div class="logo-sn logo-sm ms-d-block-sm">
        <a class="pl-0 ml-0 text-center navbar-brand mr-0" href="dashboard.php"><img src="assets/img/logo-sm-dark.png" alt="logo"> </a>
      </div>

      <ul class="ms-nav-list ms-inline mb-0" id="ms-nav-options">
        
		
		
		  <li class="ms-nav-item dropdown">
          <a href="#" class="text-disabled ms-has-notification" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flaticon-bell"></i></a>
          <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationDropdown">
            <li class="dropdown-menu-header">
              <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Notifications</span></h6><span class="badge badge-pill badge-info">
			<?php 
			$total_order=$link->rawQuery("select * from notification_tb where is_active_v=? and order_id!=? and vendor_id=?",Array(1,0,$id));
			echo $link->count;
			?>
			  New Order</span>
            </li>
            <li class="dropdown-divider"></li>
            <li class="ms-scrollable ms-dropdown-list">
              <a class="media p-2" href="view_order.php" onClick="unseen_notification(<?php echo $id;?>)">
                <div class="media-body">
                  <span>New Order place</span>
                </div>
              </a>
 
            </li>
            
           
          </ul>
        </li>
		
		
		
            <li class="ms-nav-item ms-nav-user dropdown">
          <a href="#"  id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
		  <img class="ms-user-img ms-img-round float-right" 
		  src="<?php echo $siteroot.$img; ?>" 
		  alt="<?php echo $name; ?>"> </a>
		  
          <ul class="dropdown-menu dropdown-menu-right user-dropdown" aria-labelledby="userDropdown">
            <li class="dropdown-menu-header">
              <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Welcome, <?php echo$name; ?>
			  
			  </span></h6>
            </li>
            <li class="dropdown-menu-footer">
              <a class="media fs-14 p-2" href="edit_profile.php"> <span><i class="flaticon-shut-down mr-2"></i>Edit Profile</span> </a>
            </li>
			<li class="dropdown-menu-footer">
              <a class="media fs-14 p-2" href="change_password.php"> <span><i class="flaticon-shut-down mr-2"></i>Change Password</span> </a>
            </li>
           
            <li class="dropdown-menu-footer">
              <a class="media fs-14 p-2" href="logout.php"> <span><i class="flaticon-shut-down mr-2"></i> Logout</span> </a>
            </li>
          </ul>
        </li>
        </li>
      </ul>

      <div class="ms-toggler ms-d-block-sm pr-0 ms-nav-toggler" data-toggle="slideDown" data-target="#ms-nav-options">
        <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
      </div>

    </nav>
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
