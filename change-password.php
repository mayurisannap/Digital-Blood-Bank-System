

<?php

$salt = md5('GanpatiBappaMoraya');

	function hashword($string, $salt){
		$string = crypt($string, '$1$' . $salt . '$');
		return $string;
	}



	session_start();

	$con = mysqli_connect('localhost:3307','root');

	mysqli_select_db($con, 'digitalbloodbank');

	if(isset($_POST['changepassword']))
	{
		$password = $_POST['password'];
		$retype_password = $_POST['retype_password'];
		

		$password = hashword($password, $salt);
		$retype_password = hashword($retype_password, $salt);

		$errors = array();
        $email = $_SESSION['mail'];
		
        print_r($email);
		$res=mysqli_query($con,"select * from userregistration where email = '$email'");
       $count=mysqli_num_rows($res);

    print_r($count);
	print_r($password);
  if($count>0){
	if (!$con) {
		echo "Connection failed!";
	}
	mysqli_query($con,"update userregistration set password='$password' where email='$email'");
	mysqli_query($con,"update userregistration set repassword='$retype_password' where email='$email'");
	
	echo "yes";
  }else{
	echo "not_exist";
  }
  if($count>0)
  {
	  echo "<script>alert('Registration Successful..') </script> ";
	  header('location:login.php');
  }

  else
  {
	  echo "<script>alert('Registration Unsuccessful..')</script> ";
  }

}
?>



<!DOCTYPE.html>
<html>
<head>
	<title>Digital Blood Bank</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
	<script src="jquery.min.js"></script>
	<style type="text/css">
	body{
		background-color: #dfcaa5;
	}
	.login-form {
		width: 340px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>

<body>
		
 <div class="login-form">
	<form id="form" method="post">
	  <h2 class="text-center">Change Password</h2>
	  
				<div class="form-group">
					<label for="">Old Password:</label> 
					<input type="password" placeholder="Enter password" class="form-control" name="" required="">
				</div>
				<div class="form-group">
					<label for="password">New Password:</label> 
					<input type="password" placeholder="Enter password" class="form-control" name="password" required="">
				</div>

				<div class="form-group">
					<label for="retype_password">Confirm New Password:</label> 
					<input type="password" placeholder="Retype password" class="form-control" name="retype_password" required="">
				</div>
			   <div class="form-group">
				<button type ="submit" class="btn btn-primary btn-block" name="changepassword" value="changepassword" class="ca">Continue </button>
			   </div><br>			
	</form>
 </div>
</body>
</html>

