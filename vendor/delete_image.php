<?php
require_once 'connect.php';
  
    $id=$_GET['id'];
	$p_id=$_GET['p_id'];
	//echo $id;
	$sql=$link->rawQuery("select * from product_image_tb where product_image_id_pk=".$id);
	foreach($sql as $s)
	{
		//echo $siteroot.$s['product_image'];
		unlink("images/".$s['product_image']);
	}
    $link->where('product_image_id_pk',$id);
    $link->delete('product_image_tb');


   header("location:view_image.php?pid=".$p_id."");


?>