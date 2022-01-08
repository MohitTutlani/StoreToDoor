<?php
include "connect.php";
session_start();
$paid=$_GET["paid"];
$cost=$_GET["cost"];
if($_SESSION['user']=="")
{
		header("location:index.php");
}



if($paid==0 || $paid==1)
{
	
$client_id=$link->rawQueryOne("select * from client_tb where client_username=?",Array($_SESSION["user"]));
if($client_id)
{
	$cid=$client_id["client_id_pk"];
	$client_address=$client_id["client_address"];

	if($cid)
	{
		$admin_profit=$cost/10;
		$v_income=$cost-$admin_profit;
		
		if($paid==0)
		{
			
			$sql=$link->insert("order_tb",Array("client_id"=>$cid,"total_cost"=>$cost,"order_date_time"=>date("Y-m-d h:i"),"is_paid"=>0,"order_status"=>0,"delivery_address"=>$client_address));
			if($sql)
			{
				
				$profit=$link->insert("profit_tb",Array("order_id"=>$cid,"vendor_id"=>$cost,"vendor_income"=>$v_income,"admin_profit"=>$admin_profit));
				header("location:cod.php");
			}
		}
		else
		{			
			$sql=$link->insert("order_tb",Array("client_id"=>$cid,"total_cost"=>$cost,"order_date_time"=>date("Y-m-d h:i"),"is_paid"=>1,"order_status"=>0,"delivery_address"=>$client_address));
			if($sql)
			{
				$profit=$link->insert("profit_tb",Array("order_id"=>$cid,"vendor_id"=>$cost,"vendor_income"=>$v_income,"admin_profit"=>$admin_profit));
				header("location:paypal.php");
			}
		}
	}
		
}
}

?>