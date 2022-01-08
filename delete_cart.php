<?php
include "connect.php";
session_start();

$client_id=$link->rawQueryOne("select * from client_tb where client_username=?",Array($_SESSION["user"]));
if($client_id)
{
	$id=$client_id["client_id_pk"];
}

if($id)
{
		$select=$link->rawQuery("select * from order_item_tb where order_id=?",Array($id));
		
		foreach($select as $s)
		{
			
			$sql1=$link->rawQuery("delete from order_item_tb where order_id=?",Array($id));
		}
		
}
header("location:cart.php");
?>