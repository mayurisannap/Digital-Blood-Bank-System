<!DOCTYPE html>
<html>
<head>
	<title>Recover password</title>
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
</style>
<body id="body-pd">

<div class="l-navbar" id="navbar" >
            <nav class="nav">
                <div>
                    <div class="nav__brand">
                        <ion-icon name="menu-outline" class="nav__toggle" id="nav-toggle"></ion-icon>
                        <a href="#" class="nav__logo">Blood Bank <br>Management<br>System</a>
                    </div>
                    
                    <div class="nav__list">
                        <a href="index.php" class="nav__link active">
                            <ion-icon name="home-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Home</span>
                        </a>
                        

                        <div  class="nav__link collapse1">
                        <ion-icon name="settings-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Service</span>

                            <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>

                            <ul class="collapse__menu">
                                <a href="#" class="collapse__sublink">Nearby_Blood_Banks</a>
                                <a href="#" class="collapse__sublink">User_Request</a>
                                <a href="blood_availability.php" class="collapse__sublink">Blood_Availability</a>
                            </ul>
                        </div>

                        <a href="#" class="nav__link">
                            <ion-icon name="people-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">About us</span>
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
		<div class="login-box">
		<h2 class="text-center">Recover password here</h2>

		<form action="recover.php" method="post">
		
			<div class="form-group">
					<label >Blood Bank ID:</label> 
				<input type="text"  placeholder="Blood Bank ID" class="form-control" name="bid" required="">
				 <div class="invalid-feedback">Please fill out this field.</div>
			</div>

			<div class="form-group">
				<label>Please fill your email properly</label> 
				<input type="email" placeholder="Enter email" class="form-control" name="email" required="">
				<div class="invalid-feedback">Please fill out this field.</div>
			</div>

			
			
			<button type="submit" name="send" class="btn btn-primary" > Send Mail </button>
			<br>
            <p class="text-center"> Remember your password? <br> Login<a href="bloodbanklogin.php"> Here</a></p>
			
            
		</form> 
	</div></div>
</body>