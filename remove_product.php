<?php
include "connect.php";

$order_item_id=$_GET["order_item_id"];


	if($order_item_id)
	{
		$sql1=$link->rawQuery("delete from order_item_tb where order_item_id_pk=?",Array($order_item_id));
	
	}

	header("location:cart.php");
?>