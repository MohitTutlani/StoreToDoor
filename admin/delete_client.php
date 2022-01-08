<?php
include 'connect.php';


	$id=$_GET['id'];
	$link->where('client_id_pk',$id);
	$link->delete("client_tb");
	header('location:view_client.php');


?>