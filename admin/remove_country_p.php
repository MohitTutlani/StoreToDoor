<?php
include "connect.php";
    $value=$_REQUEST['value'];
    $id=$_GET['id'];
    //echo $id;
    $link->where('country_id',$id);
    if($value=="active")
    {
      
      $link->update('country_tb',Array('is_active'=>0));


    }
    else
    {
      $link->update('country_tb',Array('is_active'=>1));

    }
    header("location:view_country.php");
    //echo $value;

?>