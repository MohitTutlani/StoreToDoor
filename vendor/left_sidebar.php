
 <aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">

    <!-- Logo -->
    <div class="logo-sn ms-d-block-lg">
      <a class="pl-0 ml-0 text-center" href="vendor_dashboard.php">
	   <span style="color:#fff; font-size:30px;">
                            Store to Door

                        </span>
	  </a>
    </div>

    <!-- Navigation -->
    <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="vendor_dashboard.php" data-target="#dashboard" aria-expanded="false" >
               <span><i class="material-icons fs-16">dashboard</i>Dashboard </span>
             </a>
            
        </li>
        
        <!-- Basic UI Elements -->
        <li class="menu-item">
            <a href="#" class="has-chevron" data-toggle="collapse" data-target="#basic-elements" aria-expanded="false" aria-controls="basic-elements">
              <span><i class="fa fa-shopping-cart"></i>Product Management</span>
            </a>
            <ul id="basic-elements" class="collapse" aria-labelledby="basic-elements" data-parent="#side-nav-accordion">
              <li> <a href="add_product.php">Add Product</a> </li>
              <li> <a href="view_product.php">View Product</a> </li>
			 <!-- <li> <a href="add_product_element.php">Add Product Element</a></li>-->
              <li> <a href="add_product_element_type.php">Add Product Element Type</a> </li>
              

            </ul>
        </li>
        <!-- /Basic UI Elements -->
        <!-- Advanced UI Elements -->
        <li class="menu-item">
            <a href="#" class="has-chevron" data-toggle="collapse" data-target="#advanced-elements" aria-expanded="false" aria-controls="advanced-elements">
              <span><i class="fa fa-indent"></i>Stock Management</span>
            </a>
            <ul id="advanced-elements" class="collapse" aria-labelledby="advanced-elements" data-parent="#side-nav-accordion">
              <li> <a href="view_stock.php">View Stock</a> </li>
              
            </ul>
        </li>
		<li class="menu-item">
            <a href="view_order.php">
              <span><i class="fa fa-shopping-cart"></i>Orders</span>
            </a>
		</li>
		
		<li class="menu-item">
            <a href="" class="has-chevron" data-toggle="collapse" data-target="#advanced-element" aria-expanded="false" aria-controls="advanced-elements">
              <span><i class="fa fa-indent"></i>Charts</span>
            </a>
            <ul id="advanced-element" class="collapse" aria-labelledby="advanced-elements" data-parent="#side-nav-accordion">
              <li> <a href="chart_total_sales.php">Month wise sales</a> </li>
			  
              
            </ul>
        </li>
        
    </ul>


  </aside>