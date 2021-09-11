<?php

include('config-db.php');
session_start();
	$request_id = $_POST['request_id'];
	$confirm_status = $_POST['confirm_status'];

	mysqli_query($con,"UPDATE email_of_donor SET confirm_status='$confirm_status' WHERE request_id='$request_id' "); 

	$res_message=mysqli_query($con,"SELECT * FROM email_of_donor WHERE request_id='$request_id' ");

	$row = mysqli_fetch_array($res_message);
	$name = $row['name'];
	$email = $row['email'];
	$address_BB = $row['address'];
	$email_of_donor = $row['email_of_donor'];

	$res_donor = mysqli_query($con,"SELECT * FROM userregistration WHERE email='$email_of_donor' ");
	$row_donor = mysqli_fetch_array($res_donor);
	$firstname_donor = $row_donor['firstname'];
	$lastname_donor = $row_donor['lastname'];
	$mobile_donor = $row_donor['mobile'];

	$count=mysqli_num_rows($res_message);
	
if($row['confirm_status'] == 'Accept')
{
	$firstname = ucfirst($firstname_donor);
	$lastname = ucfirst($lastname_donor);
	$html='
	<div>
		<p><h4>Hi, '.$name.'! <br><i>'.$firstname. ' ' .$lastname.'</i> has accepted your blood request!</h4><br>
		These are there credentials: <br>
		<div style="padding: 10px;">
		Mobile Number : '.$mobile_donor. '<br>
		Email ID : '.$email_of_donor. '<br> 
		<br></div>
		Please contact the donor! </p>
	</div> '; 
	smtp_mailer($email,'Donor has accepted your request!',$html);


/*	$html_donor='
	<div>
		<p><h4>Hi, '.$firstname.' '.$lastname'! <br>
		You have accepted blood request sent by '.$name.'!</h4><br>
		Please contact them and donate the blood at "'.$address_BB.' <br>
		<div style="padding: 10px;">
		After donating blood, please login to your profile and fill the donation form.
		<br></div>
		<div style="text-align:center;">
			<button type ="button" class="btn btn-success" name="register" value="register"><a href="http://localhost/Project_Blood%20Bank/login.php">Login here</a> </button>
		</div> </p>
	</div> ';
	smtp_mailer($email_of_donor,'Confirm your donation history!',$html_donor); */

	echo "Accepted";
}

else if ($row['confirm_status'] == 'Reject') {
 	$firstname = ucfirst($firstname_donor);
	$lastname = ucfirst($lastname_donor);
	$html='
	<div>
		<p><h4>Hi,'.$name.'! <br><i>'.$firstname. ' ' .$lastname.'</i> has declined your blood request!</h4><br>
		Please find more donors <a href="http://localhost/Project_Blood%20Bank/RequestBlood.php"> here! </a></p>
	</div> '; 
	smtp_mailer($email,'Donor has rejected your request!',$html);
	echo "Rejected";
 } 

function smtp_mailer($to,$subject, $msg){
	require_once("smtp/PHPMailerAutoload.php");
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPDebug = 3; 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'TLS'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "digitalbloodbank57@gmail.com";
	$mail->Password = "2831365786";
	$mail->SetFrom("digitalbloodbank57@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	if(!$mail->Send()){
		return 0;
	}else{
		return 1;
	}
} 
?>