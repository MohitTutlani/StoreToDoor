<?php
include "connect.php";
$id=$_GET["id"];
if($id)
{
	$link->where('slider_id_pk',$id);
	$link->delete("slider_tb");
	header("location:view_slider.php");
}
?>