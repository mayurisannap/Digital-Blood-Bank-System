<?php

session_start();

?>



<!DOCTYPE html>
<html>
<head>
	<title> Blood Bank Registration</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style_new.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
        <script src="js/sweetalert.js"></script>
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
                            <ion-icon name="chatbubbles-outline" class="nav__icon"></ion-icon>
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

		<div class="register-box">
		<h2 class="text-center">BLOOD BANK REGISTRATION FORM</h2>
		<form action="bregistration.php" method="post">
			<div class="form-group">
				
					<label for="bid">Blood Bank ID</label> 
					<input type="text" placeholder="Enter Blood Bank ID" class="form-control" name="bid" required="">
				</div>

				<div class="form-group">
					<label for="bname">Blood Bank Name:</label> 
					<input type="text" placeholder="Enter Blood Bank Name" class="form-control" name="bname" required="">
				</div>
			
				<div class="form-group">
					<label for="address">Email ID:</label> 
					<input type="email" placeholder="Enter email ID" class="form-control" name="email" required="">
					<p class="text-danger"> <?php if(isset($error['email'])) echo $error['email'] ?> </p>
				</div>

				<div class="form-group">
					<label for="contact_no">Contact Number:</label> 
					<input type="text"  placeholder="Enter blood bank contact number" class="form-control" name="contact_no" 
					maxlength="10" required="">
				</div>
			
                <div class="form-group">
				<div class="row">
				<div class="col-lg-6">
					<label for="state">State:</label> 
						<select name="state" class="form-control" id="state" >
                        <option >Select state</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Anunachal Pradesh">Anunachal Pradesh</option> 
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Goa">Goa</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Panjab">Panjab</option>
					   	</select>
				</div>

				<div class="col-lg-6">
					<label for="district">District:</label> 
						<select name="district" class="form-control" id="district" >
                            <option >Select District</option>
                            <option value="Ahmadnagar">Ahmadnagar</option>
                            <option value="Akola">Akola</option> 
                            <option value="Aurangabad">Aurangabad</option>
                            <option value="Beed">Beed</option>
                            <option value="Bhandara">Bhandara</option>
                            <option value="Buldhana">Buldhana</option>
                            <option value="Chandrapur">Chandrapur</option>
                            <option value="Dhule">Dhule</option>
                            <option value="Gadchiroli">Gadchiroli</option>
                            <option value="Gondia">Gondia</option> 
                            <option value="Hingoli">Hingoli</option>
                            <option value="Jalgoan">Jalgoan</option>
                            <option value="Jalna">Jalna</option>
                            <option value="Kolhapur">Kolhapur</option>
                            <option value="Latur">Latur</option>
                            <option value="Mumbai City">Panjab</option>
                            <option value="Nagpur">Nagpur</option>
                            <option value="Nanded">Nanded</option> 
                            <option value="Nandurbar">Nandurbar</option>
                            <option value="Nashik">Nashik</option>
                            <option value="Osmanabad">Osmanabad</option>
                            <option value="Palghar">Palghar</option>
                            <option value="Parbhani">Parbhani</option>
                            <option value="Pune">Pune</option>
                            <option value="Raigad">Raigad</option>
                            <option value="Ratnagiri">Ratnagiri</option>
                            <option value="Sangli">Sangli</option>
                            <option value="Satara">Satara</option>
                            <option value="Sindhudurg">Sindhudurg</option> 
                            <option value="Solapur">Solapur</option>
                            <option value="Thane">Thane</option>
                            <option value="Wardha">Wardha</option>
                            <option value="Washim">Washim</option>
                            <option value="Yavatmal">Yavatmal</option>
					   	</select>
				</div>	
			</div></div>

			<div class="form-group">
				<label for="address">Address:</label> 
				<input type="address" placeholder="Enter address" class="form-control" name="address" required="">
			</div>

			<div class="form-group">
				<div class="row">
				<div class="col-lg-6">
					<label for="password">Password:</label> 
					<input type="password" placeholder="Enter password" class="form-control" name="password" required="">
				</div>

				<div class="col-lg-6">
					<label for="retype_password">Retype Password:</label> 
					<input type="password" placeholder="Retype password" class="form-control" name="retype_password" required="">
				</div>
			</div></div>

			
			
			<button type="submit" name ="submit1" class="btn btn-primary">Register</button>
			<p style ="text-align:center"> Already have Account <a href="bloodbanklogin.php ">Login here</a> </p>
			
			
		</form>
	</div>
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