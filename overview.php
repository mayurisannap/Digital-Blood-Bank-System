<?php

	include("config-db.php");

	session_start();

	$email = $_SESSION['mail'];

	$result = mysqli_query($con, "SELECT firstname, lastname,email,mobile,bloodgroup,address FROM userregistration WHERE email = '$email'" );
	$row = mysqli_fetch_array($result);
	$firstname = $row['firstname'];	
	$lastname = $row['lastname'];
  $email    = $row['email'];
  $mobile    = $row['mobile'];
  $bloodgroup    = $row['bloodgroup'];
  $address    = $row['address'];
?>


<!DOCTYPE.html>
<html>
<head>
	<title>User Profile</title>
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<link rel="stylesheet" href="" >
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >

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

<body >

	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="homeafterlogin.php" style="font-weight: bold; color: #ffcccb;">Digital Blood Bank</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto" >
      <li class="nav-item active">
        <a class="nav-link btn btn-success" href="logout.php"><span class="fa fa-sign-out"></span> Log out</a>
      </li>
    </ul>
    </div>
  </div>
</nav>

<div class="login-form">
  <h4 class="text-center">My Information...</h4><br>
     <form id="form" method="post">
				<div class="profile-usertitle">
        <div class="form-group">
					<strong><label for="">Name : </label> </strong>
					<?php echo ucfirst($firstname). " " .ucfirst($lastname); ?>
				</div>
        <div class="form-group">
          <strong><label for="">My Email : </label> </strong>
					<?php echo $email;?>
				</div>
        <div class="form-group">
          <strong><label for="">My Mobile Number : </label></strong>
					<?php echo $mobile;?>
				</div>
        <div class="form-group">
					<strong><label for="">My Blood Group : </label> </strong>
					<?php echo ucfirst($bloodgroup);?>
				</div>
        <div class="form-group">
					<strong><label for="">My Address : </label> </strong>
					<?php echo ucfirst($address);?>
				</div>
     </form>  
</div>					
</body>
</html>