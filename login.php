<!DOCTYPE.html>
<html>
<head>
	<title>Digital Blood Bank</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/login-style.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>

<body>

	<div class="container w-50 m-auto">
		<div class="login-box">
		<h2 class="text-center">Login here</h2>
		<form action="validation-db.php" method="post">
			<div class="form-group">
					<label >Email ID:</label> 
				<input type="text" id="email" placeholder="Enter email" class="form-control" name="email" required="">
				 <div class="invalid-feedback">Please fill out this field.</div>
			</div>

			<div class="form-group">
				<label>Password:</label> 
				<input type="password" placeholder="Enter password" class="form-control" name="password" required="">
				<div class="invalid-feedback">Please fill out this field.</div>
			</div>

			<div class="form-group form-check">
			   <label class="form-check-label">
			     <input class="form-check-input" type="checkbox"> Remember me
			   </label>
			 </div>

			<div>
				<button type="submit" class="btn btn-primary">Login</button>
			</div> 	
			<div>
				<a href="forgot_password.php">Forgot password?</a>
			</div><br>

			<div>
				<p>Don't have an account yet? 
					<a href="register.php">Sign up</a></p>
			</div>
		</form>
	</div>
	</div>
</body>