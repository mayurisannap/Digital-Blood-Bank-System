<?php 
require_once("connection1.php");
session_start();
$query = " select * from bloodbank2 order by bname" ;  
$result = mysqli_query($con,$query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Blood Availability</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/styles5.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<style>
.box1
{
	max-width: 700px;
	float: none;
	margin: 70px auto;
	background:rgba(190, 185, 185, 0.5);
	padding: 30px;
}
</style>
<body id="body-pd">

<div class="l-navbar" id="navbar" >
            <nav class="nav">
                <div>
                    <div class="nav__brand">
                        <ion-icon name="menu-outline" class="nav__toggle" id="nav-toggle"></ion-icon>
                        <a href="#" class="nav__logo">Digital<br>Blood Bank </a>
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

                        <a href="about.php" class="nav__link">
                            <ion-icon name="people-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">About us</span>
                        </a>

                      
                    </div>
                </div>
            </nav>
        </div>
    <div class="container w-150 m-auto">
        <div class="box1">
            <h2 class="text-center" ><b>Blood Availability in Blood Banks</b></h2>
            <br>
            <h4 class="text-center">Search by choosing state and district</h4><br>
           
            <form action="blood_availability.php" method="post">
            
            <div class="form-group">
					<label for="state">State:</label> 
						<select name="state" class="form-control" id="state" >
                            <option>Select State</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Anunachal Pradesh">Anunachal Pradesh</option> 
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Goa">Goa</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Panjab">Panjab</option>
					   	</select>
			</div><br>
            <div class="form-group">
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
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
            
    </div></div>
     <!-- ===== IONICONS ===== -->
     <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        
        <!-- ===== MAIN JS ===== -->
        <script src="assets/js/main.js"></script>
</body>