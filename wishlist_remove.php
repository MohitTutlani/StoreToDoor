<?php
include "connect.php";

$id=$_GET["pid"];


	if($id)
	{
		$sql1=$link->rawQuery("delete from wishlist_tb where product_id=?",Array($id));
		
		
		
	}
	header("location:wishlist.php");
	
?>