<?php

//include("registration-db.php");
session_start();
	$con = mysqli_connect('localhost:3307','root');

	mysqli_select_db($con, 'digitalbloodbank');

	$res=mysqli_query($con,"select email from userregistration");
	$row=mysqli_num_rows($res);

	$email = $_SESSION['mail'];
	$email_new=$_POST['email'];
	$insert = "INSERT INTO user_email_verify (email) values ('$email')";
	mysqli_query($con, $insert);



$res=mysqli_query($con,"select * from user_email_verify where email = '$email_new'");
$count=mysqli_num_rows($res);

if($count>0){
	$otp=rand(11111,99999);
	mysqli_query($con,"update user_email_verify set otp='$otp' where email='$email_new'");
	$html="Your otp verification code is ".$otp;
	$_SESSION['EMAIL']=$email_new;
	smtp_mailer($email,'OTP Verification',$html);
	echo "yes";
	
}
else{
	echo "not_exist";
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