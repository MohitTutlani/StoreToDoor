<?php
include "connect.php";
session_start();
 $id=$_GET["id"];
 $vendor=$_GET["vid"];
 $quantity=$_GET["quantity"];
	 $price=$link->rawQueryOne("select * from product_tb where product_id_pk=?",Array($id));
	 $client_id=$link->rawQueryOne("select * from client_tb where client_username=?",Array($_SESSION["user"]));
if($client_id)
{
	$cid=$client_id["client_id_pk"];


if($price)
{

	$sql=$link->insert("order_item_tb",Array("product_id"=>$id,"order_id"=>$cid,"product_quantity"=>$quantity,"vendor_id"=>$vendor,"product_price"=>$price["product_retail_price"]));
	if($sql)
	{
		header("location:cart.php");
	}
	
}
}
else
{
	header("location:login.php?flag=0");
}

?>