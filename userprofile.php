<?php

	include("config-db.php");

	session_start();

	$email = $_SESSION['mail'];

	$result = mysqli_query($con, "SELECT firstname, lastname, profile_image FROM userregistration WHERE email = '$email'" );
	$row = mysqli_fetch_array($result);
	$firstname = $row['firstname'];	
	$lastname = $row['lastname'];

//*************Email Verification***********************//
	$verify = mysqli_query($con, "SELECT verified FROM user_email_verify where email = '$email'");
	$check = mysqli_fetch_array($verify);
	$verified = $check['verified'];	

//******************* NOTIFICATION********************************//
	$res_message=mysqli_query($con,"SELECT * FROM email_of_donor WHERE request_status=0 and email_of_donor='$email' ");
	$unread_count=mysqli_num_rows($res_message);

//******************Donated blood*******************************//
	$res_donated=mysqli_query($con,"SELECT * FROM email_of_donor WHERE confirm_status='Accept' and email_of_donor='$email' and donated=0 ");
	$donated_count=mysqli_num_rows($res_donated);

?>




<!DOCTYPE.html>
<html>
<head>
	<title>User Profile</title>
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<link rel="stylesheet" href="css/userprofile-style.css" >
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</head>

<body>

	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="homeafterlogin.php" style="font-weight: bold; color: #ffcccb;">Digital Blood Bank</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto" >
      <li class="nav-item active">
        <a class="nav-link" href="notification.php"><span class="fa fa-envelope"></span> <?php if($unread_count>0){ ?> <span class="badge badge-danger" id="count"><?php echo $unread_count ?></span> <?php } ?> Notifs </a>
      </li>

      <li class="nav-item active">
        <a class="nav-link btn btn-success" href="logout.php"><span class="fa fa-sign-out"></span> Log out</a>
      </li>
    </ul>
    </div>
</nav>

<?php if($verified != 'Y'){ ?>
<div class="my">
    <h5 id="u" class="text-center">Your email ID is not verified, please <a href="verify-email.php">verify</a> </h5>
</div>
<?php } ?>

<?php if($donated_count > 0){ ?>
<div class="my">
    <h5 id="u" class="text-center">Have you donated blood today? <a href="donation_check.php">Please confirm.</a> </h5>
</div>
<?php } ?>

<div class="container">
    <div class="row profile">
		<div class="col-md-12">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="wrapper">
					<img src="<?php 
							echo 'uploaded_images/' . $row['profile_image'] ?>" height="300px" width="300px"> 
                </div>
				<!-- <div class="profile-userpic">
				<img src="https://static.change.org/profile-img/default-user-profile.svg" class="img-responsive" alt="" >
				</div>
                 -->
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php echo ucfirst($firstname). " " .ucfirst($lastname); ?>
					</div>
					
				</div>
				
				<div class="profile-userbuttons">
					<a href="updatedetails.php">
					<button type="button" class="btn btn-primary btn-sm">Update Profile</button>
					</a>
					
				</div>
				
				<div class="profile-usermenu" style="color: black; font-weight: 25px">
					<div>
							<a href="overview.php" class="active" style="color: black"><h5>
							<span class="fa fa-home"></span>
							Overview </h5></a> </div><hr>
						
						<div> 	
							<a href="history.php" style="color: black"><h5>
							<span class="fa fa-history"></span>
							History </h5></a> </div><hr>
						
						<div>	
							<a href="settings.php" style="color: black"><h5>
							<span class="fas fa-user-cog"></span>
							 Account Settings</h5> </a> </div><hr>
						
						
					<!--	<div>	
							<a href="Feedback.php" style="color: black"><h5>
							<span class="fa fa-flag"></span>
							Feedback </h5></a> </div><hr>
				</div> -->
				<!-- END MENU -->
			</div>
		</div>
		<!--<div class="col-md-9">
            <div class="profile-content">
			   Some user related content goes here...
            </div>
		</div> -->
	</div>
</div>
</body>

<!--
<footer>
  <div class="navbar-footer">
  <div class="p-2 bg-dark text-white">
    <center>@Digital Blood Bank</center>
  </div>
  </div>
</footer>   -->

</html>