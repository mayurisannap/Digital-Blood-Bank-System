<?php
session_start();
$con=mysqli_connect('localhost:3306','root','','digitalbloodbank');
$otp=$_POST['otp'];
$email=$_SESSION['mail'];
$res=mysqli_query($con,"select * from forgot_password_otp where email='$email' and otp='$otp'");
$count=mysqli_num_rows($res);
if($count>0){
	mysqli_query($con,"update forgot_password_otp set otp='' where email='$email'");
	echo "yes";
}else{
	echo "not_exist";
}
?>