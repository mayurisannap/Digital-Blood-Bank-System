<?php 
$bid = $_GET['id'];
require_once("connection1.php");

session_start();
$_SESSION['bid']=$bid;

$query1 = " select * from bloodbank2 where bid= '".$bid."' ";  
$result1 = mysqli_query($con,$query1);

while($row=mysqli_fetch_assoc($result1))
{
    $bname = $row['bname'];
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/styles5.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
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
.box3
{
	max-width: 1000px;
	float: none;
	margin: 120px auto;
	background: rgba(212, 226, 243, 0.747);
	padding: 30px;
    border: 10px solid rgba(243, 149, 149, 0.959);
}
img {
    display: block;
  margin-left: 34.6%;
  margin-right: auto;
  
 
  border-radius: 15px;
  padding: 5px;
  width: 275px;
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
                        <a href="blood_bank_welcome.php?id=<?php echo $bid?>" class="nav__link active">
                            <ion-icon name="home-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Home</span>
                        </a>
                
                        
                        <a href="edit_profile.php?id=<?php echo $bid?>" class="nav__link text-white">
                            <ion-icon name="create-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Edit Profile</span>
                        </a>
                        
                        <a href="view.php?id=<?php echo $bid?>" class="nav__link text-white">
                            <ion-icon name="ellipsis-vertical-circle-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">View Records</span>
                        </a>

                        <a href="donar_details.php?id=<?php echo $bid?>" class="nav__link text-white">
                            <ion-icon name="medkit-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Donation Request</span>
                        </a>

                        <a href="camp_view.php?id=<?php echo $bid?>" class="nav__link text-white">
                            <ion-icon name="body-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Camp Registration</span>
                        </a>

                        <a href="reset_password.php?id=<?php echo $bid?>" class="nav__link text-white">
                            <ion-icon name="lock-closed-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Change password</span>
                        </a>                     
                    </div>
                </div>

                <a href="index.php" class="nav__link text white">
                    <ion-icon name="log-out-outline" class="nav__icon"></ion-icon>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>

         <!-- ===== IONICONS ===== -->
     <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        
        <!-- ===== MAIN JS ===== -->
    <script src="assets/js/main.js"></script>
    <div class="container w-100 m-auto">
		<div class="box3">
        <img src="images/digitalbloodbank.png">
        <h3 class="text-center" style="font-family:verdana"><b>Welcome to Digital Blood Bank</b></h3><br>
        <h4 class="text-center">Blood Bank Name:</h4>
        <h2 class="text-center" style="color:red; font-family:verdana"><b><u><?php echo $bname?></u></b></h2><br>
		<h4 class="text-center" >Hello Admin, Manage Your services from sidebar menu</h4>
    </div></div>