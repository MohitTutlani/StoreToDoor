<?php
include "connect.php";
    $value=$_REQUEST['value'];
    $id=$_GET['id'];
    //echo $id;
    $link->where('state_id',$id);
    if($value=="active")
    {
      
      $link->update('state_tb',Array('is_active'=>0));
    }
    else
    {
      $link->update('state_tb',Array('is_active'=>1));

    }
    header("location:view_state.php");
    //echo $value;

?>