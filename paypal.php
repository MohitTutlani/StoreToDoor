<?php
include "connect.php";
session_start();
echo "Please wait.....";
	$paypalUrl='https://www.sandbox.paypal.com/cgi-bin/webscr';
	$paypalId='juhidesai2410@gmail.com';
	$amount=0;
	
	
		require_once ('phpmailer/PHPMailerAutoload.php');
		$client_id=$link->rawQueryOne("select * from client_tb where client_username=?",Array($_SESSION["user"]));
		$email=$client_id["client_email"];
		$sql=$link->rawQueryOne("select * from order_tb where client_id=? and order_date_time=?",Array($client_id["client_id_pk"],date("Y-m-d h:i")));

		$amount=$sql["total_cost"];

		if($link->count>0)
		{
	
			$mail = new PHPMailer();
			$mail->IsSMTP(); // enable SMTP
			$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
			$mail->SMTPAuth = true; // authentication enabled
			$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
			$mail->Host = "mail.accreteit.com";
			$mail->Port = 465; // or 587
			$mail->IsHTML(true);
			$mail->Username = "storetodoor@accreteit.com";
			$mail->Password = "storetodoor";

			$var ="<html><body>
			Your order have been placed and Bill will be send soon:<br>
			
			<a href='http://localhost/project/StoreToDoor/index.php'>Click me</a></body></html>";
			$mail->SetFrom("storetodoor@accreteit.com","StoreToDoor");
			$mail->Subject = "Bill for your Order placed on StoreToDoor";
			$mail->MsgHTML($var);
			$mail->AddAddress($email);
			$mail->Send();	
			$status="";
		}
	
?>
<form action="<?php echo $paypalUrl; ?>" method="post" name="frmPayPal1">
					<div class="panel price panel-red">
						    <input type="hidden" name="business" value="<?php echo $paypalId; ?>">
						    <input type="hidden" name="cmd" value="_xclick">
						    <input type="hidden" name="item_name" value="StoreToDoor">
						    <input type="hidden" name="item_number" value="2">
						    <input type="hidden" name="amount" value="<?php echo $amount; ?>" readonly>
						    <input type="hidden" name="no_shipping" value="1">
						    <input type="hidden" name="currency_code" value="INR">
						    <input type="hidden" name="cancel_return" value="http://demo.itsolutionstuff.com/paypal/cancel.php">
						    <input type="hidden" name="return" value="http://demo.itsolutionstuff.com/paypal/success.php">  
						    
						
						<div class="panel-footer">
							<button class="btn btn-lg btn-block btn-danger" style="display:none;" id="modal" href="#"></button>
						</div>
					</div>
    			</form>
				<script>
				
window.onload = function(){
    var button = document.getElementById('modal');
    button.form.submit();
}
</script>