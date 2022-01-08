<?php
include 'connect.php';
$id=$_GET['id'];
$value=$_REQUEST['value'];
$link->where('vendor_id_pk',$id);
if($value == 'active')
{
	$link->update('vendor_personal_tb',Array('is_active'=>0));
}
else
{
	$link->update('vendor_personal_tb',Array('is_active'=>1));
}
header('location:block_vendor.php');
?>