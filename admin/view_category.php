<?php
include 'connect.php';
//require_once 'session.php';
session_start();

if(!isset($_SESSION['admin_username']) &&   !isset($_SESSION['admin_password']) )
{
    header("location:admin_login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
       <meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>View Category</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />

        
<!-- perticular page css -->


         <head>
              <meta charset="utf-8" />
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
              <title>View Category</title>
              <meta content="Admin Dashboard" name="description" />
              <meta content="Themesbrand" name="author" />
              <link rel="shortcut icon" href="images/favicon.png">
              <link rel="stylesheet" href="css/morris.css">
      
              <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
              <link href="css/metismenu.min.css" rel="stylesheet" type="text/css">
              <link href="css/icons.css" rel="stylesheet" type="text/css">
              <link href="css/style.css" rel="stylesheet" type="text/css">
         
              <link href="css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
      <link href="css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
      <!-- Responsive datatable examples -->
      <link href="css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        
    </head>
    <body>
      <div id="wrapper">
          <!-- Top Bar Start -->
      
      <?php
	  include "admin_header.php";
	  ?>
      <!--top bar end-->
            

             <?php include "left_sidebar.php"; ?>

          


        <div class="content-page">
        
            <div class="content">
              <div class="container-fluid">

                        <div class="page-title-box">
                            
                        </div>
                        <!-- end row -->
                       
                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-20">
                                    <div class="card-body">

                                        <h1 >Category</h1>
                                        

                                        <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                            <thead>
                                            <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 152px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Category Name</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 238px;" aria-label="Position: activate to sort column ascending">Category Icon</th>
                                              <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 238px;" aria-label="Position: activate to sort column ascending">Category Image</th>
                                              <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 238px;" aria-label="Position: activate to sort column ascending">Parent Category</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 238px;" aria-label="Position: activate to sort column ascending">Active / Inactive</th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 238px;" aria-label="Position: activate to sort column ascending">Edit</th>

                                          </tr>
                                            </thead>


                                            <tbody>
                                              <?php
                                              $sql=$link->rawQuery("select * from category_tb");

                                              if($link->count >0)
                                              {
                                                foreach($sql as $s)
                                                {
                                              $sq2=$link->rawQuery("select * from category_tb where category_id_pk=?",Array($s['parent_category_id']));

                                                  foreach ($sq2 as $s2) {
                                                  
                                                ?>

                                           
                                            <tr role="row" class="odd">
                                                <td tabindex="0" class="sorting_1">
                                                  <?php echo $s['category_name']; ?>
                                               </td>
                                               <td tabindex="0" class="sorting_1">
                                               <img src="<?php echo $siteroot.$s['category_icon'] ?>" height="100" width="100">
                                               </td>
                                                <td tabindex="0" class="sorting_1">
                                               <img src="<?php echo $siteroot.$s['category_image'] ?>" height="100" width="100">
                                               </td>

                                             <td tabindex="0" class="sorting_1">
                                               <?php echo $s2['category_name'];?>
                                               </td>

                                                <td>
                                                  <div class="col-3 text-right">
                                   
                                                    <a href="remove_category_p.php?id=<?php echo $s['category_id_pk']; ?>&value=<?php if($s['is_active']==1) echo'active'; else echo 'inactive'; ?>" style="color:white;"> 
                                                    <button class="btn btn-primary w-md waves-effect waves-light"  name="active" value="<?php if($s['is_active']==1) echo'active'; else echo 'inactive'; ?>">
                                                      <?php if($s['is_active']==1) echo'Active'; else echo 'Inactive'; ?>
                                                        
                                                      </button>
                                                    </a>
                                </div>

                            </td>
                            <td>
                                                  <div class="col-3 text-right">
                                   
                                                    <a href="edit_category.php?cid=<?php echo $s['category_id_pk']; ?>"> 
                                                    <button class="btn btn-primary w-md waves-effect waves-light"  name="active">
                                                     Edit                          </button>
                                                    </a>
                                </div>

                            </td>
                                               
                                            <?php
                                                }
                                              }  //for
                                            }//if
                                            ?>    
                                           </tbody>
                                        </table></div></div></div>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                         <!-- end row --> <!-- content -->

                
        </div>
        
           
          
        
  <?php include "admin_footer.php"; ?>

    
      </div>

     <script src="js/jquery.min.js"></script>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/metisMenu.min.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/waves.min.js"></script>
<script src="js/jquery.sparkline.min.js"></script>



     
      <!--Morris Chart-->
      <script src="js/morris.min.js"></script>
      <script src="js/raphael-min.js"></script>
      <script src="js/dashboard.js"></script>





      <!-- App js -->
     <script src="js/app.js"></script>
     <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="js/dataTables.buttons.min.js"></script>
        <script src="js/buttons.bootstrap4.min.js"></script>
        <script src="js/jszip.min.js"></script>
        <script src="js/pdfmake.min.js"></script>
        <script src="js/vfs_fonts.js"></script>
        <script src="js/buttons.html5.min.js"></script>
        <script src="js/buttons.print.min.js"></script>
        <script src="js/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="js/dataTables.responsive.min.js"></script>
        <script src="js/responsive.bootstrap4.min.js"></script>

         <!-- Datatable init js -->
        <script src="js/datatables.init.js"></script>


    </body>

</html>