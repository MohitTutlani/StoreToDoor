<?php
include 'connect.php';
session_start();
$cpassword = $_POST['cpassword'];
$npassword = $_POST['npassword'];
$rpassword = $_POST['rpassword'];

if($cpassword != null || $npassword != null || $rpassword != null)
{	

$old_pass=$link->rawQueryOne("select * from vendor_personal_tb where vendor_id_pk=?",Array($_SESSION['vendor_id']));
$old_password = $old_pass['vendor_password'];
if($link->count>0)
{
	
	if($old_password == $cpassword)
	{
		
		if($npassword==$rpassword)
		{
			$link->where("vendor_id_pk",$_SESSION['vendor_id']);
			$link->update("vendor_personal_tb",Array("vendor_password"=>$npassword));
			echo "1";
		}
		else
		{
			echo "old password and new password must be same";
		}
	}
	
}
}
else
{
	echo "empty field";
}
?>