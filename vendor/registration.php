<?php
include "connect.php";

if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$contact=$_POST['contact'];
	$gender=$_POST['gender'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$city=$_POST['city'];
	$address=$_POST['address'];
	$birthdate=$_POST['bday'];


$sql=$link->insert("vendor_personal_tb",Array("vendor_name"=>$name,"vendor_contact"=>$contact,"vendor_gender"=>$gender,"vendor_email"=>$email,"vendor_password"=>$password,"vendor_city_id"=>$city,"vendor_address"=>$address,"vendor_birthdate"=>$birthdate));

$link->insert("notification_tb",Array("vendor_id"=>$sql));

if($sql)
{		
	  header("location:shop_registration.php?name=$name");

}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Registration</title>
  <!-- Iconic Fonts -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="css/flaticon.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- jQuery UI -->
  <link href="css/jquery-ui.min.css" rel="stylesheet">
  <!-- Mystic styles -->
  <link href="css/style.css" rel="stylesheet">
  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="images/favicon.png">
  
  	<script>
	function validate()
	{
		var s=true;
		document.getElementById("err_name").innerHTML="";
		document.getElementById("err_date").innerHTML="";

		document.getElementById("err_city").innerHTML="";
		document.getElementById("err_contact").innerHTML="";
		document.getElementById("err_address").innerHTML="";
		document.getElementById("err_email").innerHTML="";
		document.getElementById("err_password").innerHTML="";
		
		document.getElementById('idname').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idbday').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idaddress').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idcity').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idcontact').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idemail').style.borderColor='rgba(0,0,0,0.1)';
		document.getElementById('idpassword').style.borderColor='rgba(0,0,0,0.1)';

		var name=document.frm.name.value;
		var pattern=/^[A-Za-z0-9 _]*$/;
		if(name=="")
		{
			document.getElementById("err_name").innerHTML="It must not be blank";
			document.getElementById('idname').style.borderColor='#ff0000';
			s=false;
		}
		else if(!pattern.test(name))
		{
			document.getElementById("err_name").innerHTML="Invalid username";
			document.getElementById('idname').style.borderColor='#ff0000';
			s=false;
		}
		var date=document.frm.bday.value;
		if(date=="")
		{
			document.getElementById("err_date").innerHTML="It must not be blank";
			document.getElementById('idbday').style.borderColor='#ff0000';
			s=false;
		}
		var contact=document.frm.contact.value;
		var pattern=/^[6-9]{1}[0-9]{9}$/;
		
		if(contact=="")
		{
			document.getElementById("err_contact").innerHTML="It must not be blank";
			document.getElementById('idcontact').style.borderColor='#ff0000';
			s=false;
		}
		else if(!pattern.test(contact))
		{
			document.getElementById("err_contact").innerHTML="Must be a valid number";
			document.getElementById('idcontact').style.borderColor='#ff0000';
			s=false;
		}
		var address=document.frm.address.value;
		if(address=="")
		{
			document.getElementById("err_address").innerHTML="It must not be blank";
			document.getElementById('idaddress').style.borderColor='#ff0000';
			s=false;
		}
		var city=document.getElementById("idcity").value;
		if(city==-1)
		{
			document.getElementById("err_city").innerHTML="Select any city";
			document.getElementById('idcity').style.borderColor='#ff0000';
			s=false;
		}
			
		document.getElementById("err_email").innerHTML="";
		document.getElementById("err_password").innerHTML="";
		var email=document.frm.email.value;
		var pattern= /^([a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$)/;
		if(email=="")
		{
			document.getElementById("err_email").innerHTML="It must not be blank";
			document.getElementById('idemail').style.borderColor='#ff0000';
			s=false;
		}
		else if(!pattern.test(email))
		{
			document.getElementById("err_email").innerHTML="Invalid Email";
			document.getElementById('idemail').style.borderColor='#ff0000';
			s=false;
		}
	
		var pass=document.frm.password.value;
		if(pass=="")
		{
			document.getElementById("err_password").innerHTML="It must not be blank";
			document.getElementById('idpassword').style.borderColor='#ff0000';
			s=false;
		}
		
		else if(!(pass.length>=6 && pass.length <=12))
		{
			document.getElementById("err_password").innerHTML="Password must be 6 to 12 character long";
			document.getElementById('idpassword').style.borderColor='#ff0000';
			s=false;
		}
		return s;
	}
	
		

	
	</script>

</head>

<body class="ms-body ms-aside-left-open ms-primary-theme ms-has-quickbar">

  <!-- Setting Panel -->
  

  <!-- Preloader -->
  <div id="preloader-wrap">
    <div class="spinner spinner-8">
      <div class="ms-circle1 ms-child"></div>
      <div class="ms-circle2 ms-child"></div>
      <div class="ms-circle3 ms-child"></div>
      <div class="ms-circle4 ms-child"></div>
      <div class="ms-circle5 ms-child"></div>
      <div class="ms-circle6 ms-child"></div>
      <div class="ms-circle7 ms-child"></div>
      <div class="ms-circle8 ms-child"></div>
      <div class="ms-circle9 ms-child"></div>
      <div class="ms-circle10 ms-child"></div>
      <div class="ms-circle11 ms-child"></div>
      <div class="ms-circle12 ms-child"></div>
    </div>
  </div>


  <!-- Sidebar Navigation Left -->
  

  <!-- Sidebar Right -->
 

  
 <center>       
        <div class="col-md-10">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h1>Vendor Personal Registration</h1>
            </div>
            <div class="ms-panel-body">
              <form class="ms-form-wizard style1-wizard" id="default-wizard" method="post" enctype="multipart/form-data" name="frm" onSubmit="return validate()">
               
                <div class="ms-wizard-step">
                  <div class="form-row">
                    <div class="col-md-12 mb-3">
                      <label style="float:left;">Name</label>
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="name"
						name="name" id="idname">
                      </div>
					  <span id="err_name" style="color:red; float:left;"></span>
                    </div>
					
                    <div class="col-md-12 mb-2">
                      <label style="float:left;">Gender</label>
                      <div class="input-group">
                        <ul class="ms-list d-flex">
                <li class="ms-list-item pl-0">
                  <label class="ms-checkbox-wrap">
                    <input type="radio" name="gender" value="male">
                    <i class="ms-checkbox-check"></i>
                  </label>
                  <span> Male </span>
                </li>
                <li class="ms-list-item">
                  <label class="ms-checkbox-wrap">
                    <input type="radio" name="gender" value="female" checked>
                    <i class="ms-checkbox-check"></i>
                  </label>
                  <span> Female </span>
                </li>
                
              </ul>

                      </div>
                    </div>
					</div>
					<div class="form-row">
                    <div class="col-md-12 mb-3">
                      <label style="float:left;">Birth Date</label>
                      <div class="input-group">
                        <input type="date" class="form-control" placeholder="date" name="bday" id="idbday">
                      </div>
					  <span id="err_date" style="color:red; padding-top:2px; float:left;"></span>
                    </div>
                    
                  </div>
                       
                  <div class="form-row">
				  <div class="col-md-12 mb-3">
                    <label style="float:left;">Contact</label>
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Contact" name="contact" id="idcontact">
						
						</div>
						<span id="err_contact" style="color:red; padding-top:5px; float:left;"></span>
					</div>
                    <div class="col-md-12 mb-2">
                      <label style="float:left;">Address</label>
                      <div class="input-group">
                  <textarea class="form-control" id="idaddress" rows="3" name="address" ></textarea>

                      </div>
					  <span id="err_address" style="color:red; padding-left:8px; float:left;"></span>
                    </div>
                  </div>
				  <div class="form-row">
                    <div class="col-md-12 mb-3">
					<div style="color:red; text-transform: uppercase;float:left">
					
					</div><br>
                      <label style="float:left;">City</label>
                      <div class="input-group">
					  <select class="form-control" name="city" id="idcity">
					  <option value="-1">select city</option>
					  <?php 
					  $sql=$link->rawQuery("select * from city_tb");
					  foreach($sql as $s)
					  {
						  ?>
						  <option value="<?php echo $s['city_id']; ?>">
						  <?php echo $s['city_name']; ?>
						  </option>
						  
					  <?php } ?>
					  </select>
                        
                      </div>
					  <span id="err_city" style="color:red; padding-left:8px; float:left;"></span>
                    </div>
                    <div class="col-md-12 mb-2">
                      <label style="float:left;">Email</label>
                      <div class="input-group">
                        <input type="text" class="form-control " placeholder="email" name="email" id="idemail">
                      </div>
					   <span id="err_email" style="color:red; padding-left:8px; float:left;"></span>
                    </div>
                  </div>
				  <div class="form-row">
                    <div class="col-md-12 mb-3">
                      <label style="float:left;">Password</label>
                      <div class="input-group">
                        <input type="password" class="form-control" placeholder="password"  name="password" id="idpassword">
                      </div>
					   <span id="err_password" style="color:red; padding-left:8px; float:left;"></span>
                    </div>
                    
                  </div>
				  
				  
                </div>
               
                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                
                
              </form>
            </div>
          </div>
        </div>
		</center>
        <!-- SCRIPTS -->
  <!-- Global Required Scripts Start -->
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/perfect-scrollbar.js"> </script>
  <script src="js/jquery-ui.min.js"> </script>
  <!-- Global Required Scripts End -->

  <!-- Page Specific Scripts Start -->
  <script src="js/jquery.steps.min.js"> </script>
  
  <!-- Page Specific Scripts End -->

  <!-- Mystic core JavaScript -->
  <script src="js/framework.js"></script>

  <!-- Settings -->
  <script src="js/settings.js"></script>

</body>


</html>
