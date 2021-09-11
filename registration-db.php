
<?php

	$salt = md5('GanpatiBappaMoraya');

	function hashword($string, $salt){
		$string = crypt($string, '$1$' . $salt . '$');
		return $string;
	}



	session_start();

	$con = mysqli_connect('localhost:3307','root');

	mysqli_select_db($con, 'digitalbloodbank');

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$gender = $_POST['gender'];
	$blood_group = $_POST['blood_group'];
	$address = $_POST['address'];
	$password = $_POST['password'];
	$retype_password = $_POST['retype_password'];
	$state_id = $_POST['state'];
	$city_id = $_POST['city'];

/*************** Cities *******************************/
	$query_city = mysqli_query($con, "SELECT city FROM cities WHERE city_id = $city_id");

  	$row_city = mysqli_fetch_array($query_city);
  	$city = $row_city['city']; 
/*******************************************************/

/*************** States *******************************/
	$query_state = mysqli_query($con, "SELECT state_name FROM state_list WHERE state_id = $state_id");

  	$row_state = mysqli_fetch_array($query_state);
  	$state = $row_state['state']; 
/*******************************************************/
	$password = hashword($password, $salt);
	$retype_password = hashword($retype_password, $salt);

	$error['email'] = $email;
	$_SESSION['mail'] = $email;

	$check = mysqli_query($con, "SELECT * FROM userregistration WHERE email = '$email'");
	if(mysqli_num_rows($check)>0)
	{
		echo"Email id already exsts";
	}

	else
	{
	$insert = "INSERT INTO userregistration (firstname, lastname, email, mobile, gender,
				bloodgroup, address, password, repassword, state, district) values ('$firstname', '$lastname', '$email', '$mobile', '$gender', 
				'$blood_group', '$address', '$password', '$retype_password', '$state', '$city')";

	mysqli_query($con, $insert);


	header('location:verify-email.php');
}

?>