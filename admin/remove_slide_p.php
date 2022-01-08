<?php
include "connect.php";
    $value=$_REQUEST['value'];
    $id=$_GET['id'];
  
    $link->where('slider_id_pk',$id);
    if($value=="active")
    {
      
      $link->update('slider_tb',Array('is_active'=>0));


    }
    else
    {
      $link->update('slider_tb',Array('is_active'=>1));

    }
    header("location:view_slider.php");
?>