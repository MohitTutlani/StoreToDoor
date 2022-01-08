<?php
include 'connect.php';
session_start();
	$name=$_POST['name'];
	$contact=$_POST['contact'];
	$gender=$_POST['gender'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$city=$_POST['city'];
	$address=$_POST['address'];
	$birthdate=$_POST['bday'];
	
	
$sql=$link->insert("vendor_personal_tb",Array("vendor_contact"=>$contact,"vendor_gender"=>$gender,"vendor_email"=>$email,"vendor_password"=>$password,"vendor_city_id"=>$city,"vendor_address"=>$address,"vendor_birthdate"=>$birthdate));

//$link->insert("notification_tb",Array("vendor_id"=>$sql));


if($sql)
{
	 echo "insert Success";
	 die();
	$photo=$_FILES['vendor_photo']['name'];
	 $image_ext=pathinfo($photo,PATHINFO_EXTENSION);
	 $image_path="vendor/img".$sql.".".$image_ext;
	
	 if(move_uploaded_file($_FILES['file']['tmp_name'], "images/".$image_path))
	{
      $link->where("vendor_id_pk",$sql);
      $s=$link->update("vendor_personal_tb",Array("vendor_photo"=>$image_path));

		$_SESSION['vendor']=$sql;
				//header("location:shop_registration.php?vendor_id_pk=");
		
	  
    }
}
?>