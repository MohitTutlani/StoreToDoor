<?php
include "connect.php";
session_start();
$cpassword = $_POST['cpassword'];
$npassword = $_POST['npassword'];
$rpassword = $_POST['rpassword'];

$user_id=$_SESSION['userid'];
$pass = $link->rawQueryOne("select client_password from client_tb where client_id_pk=?",Array($user_id));
$old_password = $pass['client_password'];
if($npassword == $rpassword)
{
	if(strlen($npassword)<=6 || strlen($npassword)>=12)
	{
		echo "Password must be 6 to 12 character long";
	}
	else
	{
		if($old_password == $cpassword)
		{
			$link->where("client_id_pk",$user_id);
			$link->update("client_tb",Array("client_password"=>$npassword));
			echo "Password is successfully changed.";
		}
		else
		{
			echo "Your old password id incorrect!";
		}
	}
}
else
{
	echo "New password and repeat password must be same!";
}
?>