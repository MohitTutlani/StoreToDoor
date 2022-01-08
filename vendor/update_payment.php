
<?php
include 'connect.php';
$order_id=$_POST['order_id'];
$i=0;
$sql=$link->rawQuery("select * from order_tb where order_id_pk=?",Array($order_id));
foreach($sql as $s)
{
	$i=$s['is_paid'];
if($i==0)
{	
	$i=1;
	$j=0;
}	
else
{
	$i=0;
	$j=1;
}
}
$link->where("order_id_pk",$order_id);
$sql=$link->update("order_tb",Array("is_paid"=>$i,"is_active"=>$j));
?>