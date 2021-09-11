
<?php
	
	session_start();

	$con = mysqli_connect('localhost:3307','root');

	mysqli_select_db($con, 'digitalbloodbank');
	$key= "bloodbank";
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$gender = $_POST['gender'];
	$blood_group = $_POST['blood_group'];
	$address = $_POST['address'];
	$password = $_POST['password'];
	$retype_password = $_POST['retype_password'];

	$error['email'] = $email;

	$check = mysqli_query($con, "SELECT * FROM userregistration WHERE email = '$email'");
	if(mysqli_num_rows($check)>0)
	{
		$error['email']="Email id already exsts";
	}

	else
	{

		$pass=password_hash($password,PASSWORD_DEFAULT);
	$insert = "INSERT INTO userregistration (firstname, lastname, email, mobile, gender,
				bloodgroup, address, password, repassword) values ('$firstname', '$lastname', '$email', '$mobile', '$gender', 
				'$blood_group', '$address', '$pass', '$pass')";

	mysqli_query($con, $insert);

	header('location:login.php');
}

?>