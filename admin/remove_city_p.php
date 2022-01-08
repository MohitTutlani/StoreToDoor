<?php
include "connect.php";
    $value=$_REQUEST['value'];
    $id=$_GET['id'];
    //echo $id;
    $link->where('city_id',$id);
    if($value=="active")
    {
      
      $link->update('city_tb',Array('is_active'=>0));


    }
    else
    {
      $link->update('city_tb',Array('is_active'=>1));

    }
    header("location:view_city.php");
    //echo $value;

?>