<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Digital Blood Bank</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style_new.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
<style>
    body
{
    background-color:#f8f8faf5;
	background-repeat: no-repeat,repeat;
	background-position: center;
	background-size: cover;

}
.box2
{
	max-width: 800px;
	float: none;
	margin: 30px auto;
	background: rgba(212, 226, 243, 0.747);
	padding: 30px;
}
</style>
<script src="js/sweetalert.js"></script>
<body id="body-pd">

<div class="l-navbar" id="navbar" >
            <nav class="nav">
                <div>
                    <div class="nav__brand">
                        <ion-icon name="menu-outline" class="nav__toggle" id="nav-toggle"></ion-icon>
                        <a href="#" class="nav__logo">Digital<br>Blood Bank</a>
                    </div>
                    
                    <div class="nav__list">
                        <a href="index.php" class="nav__link active">
                            <ion-icon name="home-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Home</span>
                        </a>
                
                        <div  class="nav__link collapse1">
                            <ion-icon name="log-in-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Log In</span>
                            <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>

                            <ul class="collapse__menu">
                                <a href="#" class="collapse__sublink">User_Login</a>
                                <a href="#" class="collapse__sublink">User_Request</a>
                                <a href="bloodbanklogin.php" class="collapse__sublink">Blood_Bank_Login</a>
                            </ul>
                        </div>
                        

                        <div  class="nav__link collapse1">
                        <ion-icon name="settings-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Service</span>

                            <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>

                            <ul class="collapse__menu">
                                <a href="#" class="collapse__sublink">Nearby_Blood_Banks</a>
                                <a href="#" class="collapse__sublink">User_Request</a>
                                <a href="blood_availability01.php" class="collapse__sublink">Blood_Availability</a>
                            </ul>
                        </div>

                        <a href="#" class="nav__link">
                            <ion-icon name="people-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">About us</span>
                        </a>

                        <a href="feedback.php" class="nav__link">
                            <ion-icon name="document-text-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Feedback</span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        
    </div>

        <!-- ===== IONICONS ===== -->
     <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        
        <!-- ===== MAIN JS ===== -->
        <script src="assets/js/main.js"></script>

	<div class="container w-50 m-auto">
		<div class="box2">
		<h2 class="text-center">Blood Bank Login is here</h2>

        <?php if (isset($_GET['error']))  {  ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        
		<form action="connection.php" method="post">
		
			<div class="form-group">
					<label >Blood Bank ID:</label> 
				<input type="text"  placeholder="Enter Blood Bank ID" class="form-control" name="bid" required="">
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

			<div class="row">
			<div class="col-lg-6">
				<button type="submit" name="login" class="btn btn-primary">  Login </button>
			</div>

			<div class="ml-auto">
				<button type="submit" class="btn btn-primary"><a class="text-white" href="bloodbankregister.php">Create Account</a></button>
			</div></div>
            <br><br>

            <p style="text-align:center;">Forgot Password?<br> No worry <a href="recover_email.php">Click here</a></p>
		</form> 
	</div>
</body>

<?php
if (isset($_SESSION['status']) && $_SESSION['status']!=''){
    ?>
    <script >        
        swal({
                title: "<?php echo $_SESSION['status']?>",
                icon: "<?php echo $_SESSION['status_code']?>",
                button: "OK, Done",
        });
    </script>
    <?php

    unset($_SESSION['status']);
}
?>