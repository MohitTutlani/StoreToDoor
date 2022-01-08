<?php
include "connect.php";
session_start();

$id=$_GET["pid"];
$client_id=$link->rawQueryOne("select * from client_tb where client_username=?",Array($_SESSION["user"]));
$cid=$client_id["client_id_pk"];
	
	if($cid)
	{
		
		$sql=$link->insert("wishlist_tb",Array("product_id"=>$id,"client_id"=>$cid));
		if($sql)
		{
			header("location:product_details.php?pid=$id");
		}
	}
?>