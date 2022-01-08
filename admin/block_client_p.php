<?php
include 'connect.php';
$id=$_GET['id'];
$value=$_REQUEST['value'];
$link->where('client_id_pk',$id);
if($value == 'active')
{
	$link->update('client_tb',Array('is_active'=>0));
}
else
{
	$link->update('client_tb',Array('is_active'=>1));
}
header('location:block_client.php');
?>