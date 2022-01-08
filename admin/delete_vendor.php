<?php
include 'connect.php';


	$id=$_GET['id'];
	$link->where('vendor_id_pk',$id);
	$link->delete("vendor_personal_tb");
	header('location:view_vendor.php');


?>