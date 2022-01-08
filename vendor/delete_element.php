<?php
require_once 'connect.php';
  
    $eid=$_GET['eid'];
	$pid=$_GET['pid'];
	//echo $id;
	$link->where('product_element_type_id_pk',$eid);
    $link->delete('product_element_type_tb');

   header("view_element.php?id=".$pid);


?>