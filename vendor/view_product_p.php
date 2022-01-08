<?php
include "connect.php";
    $value=$_REQUEST['value'];
    $id=$_GET['id'];
    //echo $id;
    $link->where('product_id_pk',$id);
    if($value=="active")
    {
      
      $link->update('product_tb',Array('is_active'=>0));


    }
    else
    {
      $link->update('product_tb',Array('is_active'=>1));

    }
    header("location:view_product.php");
    //echo $value;

?>