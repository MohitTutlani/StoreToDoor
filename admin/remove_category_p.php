<?php
include "connect.php";
    $value=$_REQUEST['value'];
    $id=$_GET['id'];
    //echo $id;
    $link->where('category_id_pk',$id);
    if($value=="active")
    {
      
      $link->update('category_tb',Array('is_active'=>0));


    }
    else
    {
      $link->update('category_tb',Array('is_active'=>1));

    }
    header("location:view_category.php");
    //echo $value;

?>