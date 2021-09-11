<!DOCTYPE.html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php

include('config-db.php');
session_start();
	$email_of_donor = $_POST['email_of_donor'];
	$email = $_POST['email'];
	$name = $_POST['name'];
	$mobile = $_POST['mobile'];
	$address = $_POST['address'];
	$message_for_user = $_POST['message'];
	//	$email_of_donor = $_POST['email'];

/*	$insert = "INSERT INTO bloodrequester (name, email, mobile, address, message_for_user, email_of_donor) values ('$name', '$email', '$mobile', '$address', '$message_for_user', '$email_of_donor')";

	print_r($insert); 
	$result = mysqli_query($con, $insert); */
				
	$insert = "INSERT INTO email_of_donor (email_of_donor, email, name, mobile, address, message_for_user) values ('$email_of_donor', '$email', '$name','$mobile','$address','$message_for_user')";

	$result = mysqli_query($con, $insert);

	$res=mysqli_query($con,"select * from email_of_donor where email_of_donor = '$email_of_donor'");
	$count=mysqli_num_rows($res);

if($count>0){
	$html='
	<div>
		<p> <h4>Hi, you have received new blood request from <i>'.$name.'</i></h4><br>
		These are there credentials: <br>
		<div style="padding: 10px;">
		Mobile Number : '.$mobile. '<br>
		Email ID : '.$email. '<br> 
		Address of blood bank : '.$address.'<br> 
		Message from user : '.$message_for_user.'<br> <br></div>
		Please confirm if you are available to donate blood </p>
		<div>
			<button type ="button" class="btn btn-success" name="register" value="register"><a href="http://localhost/Project_Blood%20Bank/login.php">Confirm Request</a> </button>
		</div> 
	</div> '; 
	$_SESSION['EMAIL']=$email_of_donor;
	
	smtp_mailer($email_of_donor,'New blood request',$html);
	echo "inserted";
	
}  
else{
	echo "error";
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

</body>
</html>