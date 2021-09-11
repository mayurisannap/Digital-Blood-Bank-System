

<?php

	$salt = md5('GanpatiBappaMoraya');

	function hashword($string, $salt){
		$string = crypt($string, '$1$' . $salt . '$');
		return $string;
	}
	
	session_start();

	$con = mysqli_connect('localhost:3307','root');

	mysqli_select_db($con, 'digitalbloodbank');

	$email = $_POST['email'];
	$password = $_POST['password'];

	$password = hashword($password, $salt);


	$check = mysqli_query($con, "SELECT * FROM userregistration WHERE email = '$email' && password='$password' ");
	if(mysqli_num_rows($check)>0)
	{
		$_SESSION['mail'] = $email;
		header("location: homeafterlogin.php");
	}

	else
	{

			echo "Wrong credentials!! Please login again!";
	}

?>
