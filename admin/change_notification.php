<?php
include "connect.php";
$value=$_POST['value'];
if($value==1)
{ 
	$link->where1("vendor_id",0)->where("order_id",0);
	$link->update("notification_tb",Array(is_active_a=>0));
}
else if($value==2)
{
	$link->where1("client_id",0);
	$link->update("notification_tb",Array(is_active_a=>0));
}
else
{
	$link->where1("order_id",0);
	$link->update("notification_tb",Array(is_active_a=>0));
}

?>