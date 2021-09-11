
<?php

require_once("connection1.php");
session_start();

if(isset($_POST['submit1']))
{
	
	
	$bid = $_POST['bid'];
	$bname = $_POST['bname'];
	$email = $_POST['email'];
	$state = $_POST['state'];
	$district = $_POST['district'];
	$address = $_POST['address'];
	$contact_no = $_POST['contact_no'];
	$password = $_POST['password'];
	$retype_password = $_POST['retype_password'];

		$pass=password_hash($password,PASSWORD_DEFAULT);
		$insert1 = " insert into bloodbank2 (bid, bname, email, state, district,  address, contact_no, password, retype_password)
				 					values('$bid', '$bname','$email', '$state', '$district','$address','$contact_no', '$pass', '$pass')";
	
										 
		$result = mysqli_query($con,$insert1);

		if($result)
		{
			$_SESSION['status']="You are successfully registred";
            $_SESSION['status_code']="success";
			header("location:bloodbanklogin.php");
		}
		else
		{
			$_SESSION['status']="This ID is already registred";
            $_SESSION['status_code']="error";
			header("location:bloodbankregister.php");

		}
}
else
{
	header("location:bloodbanklogin.php");
}



?>