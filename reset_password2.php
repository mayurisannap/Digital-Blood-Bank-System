<?php

require_once("connection1.php");
session_start();
$bid=$_SESSION['bid'];
if($_GET['id']){
	$bid=$_GET['id'];
}
$_SESSION['bid']=$bid;
if(isset($_POST['submit']))
{
	
	$password = $_POST['password'];
	$retype_password = $_POST['password2'];
	if($password== $retype_password)
	{
		
		$pass=password_hash($password,PASSWORD_DEFAULT);

		$query = "UPDATE bloodbank2 set password = '".$pass."', retype_password='".$pass."' where bid='".$bid."' ";
		 
		$result = mysqli_query($con,$query);
			
	
			if($result)
			{
				$_SESSION['status']="Password Reseted successfully";
				$_SESSION['status_code']="success";
				header("location:bloodbanklogin.php");
			}
			else
			{
				echo 'Please Check Your Query';
			}
	}else{
		header("location:reset_password.php?error=Password and Retype password did not match.");
	}
    

    
    

}
		
?>