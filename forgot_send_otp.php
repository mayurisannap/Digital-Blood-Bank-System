<?php

//include("registration-db.php");
session_start();
$con = mysqli_connect('localhost:3306','root');

mysqli_select_db($con, 'digitalbloodbank');

// $_SESSION['email'] = $email;
//print_r($email);



$email_my=$_POST['email'];
$insert = "INSERT INTO forgot_password_otp (email) values ('$email_my')";
mysqli_query($con, $insert);

$res=mysqli_query($con,"select * from forgot_password_otp where email = '$email_my'");
$count=mysqli_num_rows($res);

print_r($count);
if($count>0){
	$otp=rand(11111,99999);
	mysqli_query($con,"update forgot_password_otp set otp='$otp' where email='$email_my'");
	$html="Your otp verification code is ".$otp;
	$_SESSION['mail']=$email_my;
	smtp_mailer($email_my,'OTP Verification',$html);
	echo "yes";
}else{
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