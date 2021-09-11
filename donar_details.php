<?php 

require_once("connection1.php");
session_start();
$bid=$_GET['id'];
$_SESSION['bid']=$bid;

$query = " select * from donation_request where bid= '".$bid."' ";  
$result = mysqli_query($con,$query);

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
	<title>Donation Request</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style_new.css">
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
.center1{
    text-align:center;
    width: 600px;
}
.box1
{
	max-width: 700px;
	float: none;
	margin: 50px auto;
	background: rgba(212, 226, 243, 0.747);
	padding: 30px;
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

                <a href="index.php" class="nav__link">
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
		<div class="box1">

        <h2 class="text-center" style="color:red; font-family:verdana"><b><u>Welcome to <?php echo $bname?></b></u></h2>
		<h3 class="text-center" >Blood Donation Request are here</h3><br>
		<form>
        <div class="center1">
            <button class="btn btn-primary center1" ><a class="text-white" href="pending.php?id=<?php echo $bid ?> ">Pending Donation Request</a></button><br><br>
            <button class="btn btn-primary center1" ><a class="text-white" href="approved_donors.php?id=<?php echo $bid ?> ">Approved Donation Request</a></button><br><br>
            <button class="btn btn-primary center1" ><a class="text-white" href="rejected_donors.php?id=<?php echo $bid ?> ">Rejected Donation Request</a></button><br><br>    
            <button class="btn btn-primary center1" ><a class="text-white" href="completed_donors.php?id=<?php echo $bid ?> ">Successfully Completed Donation</a></button><br><br>
            <button class="btn btn-primary center1" ><a class="text-white" href="unsucessful_donors.php?id=<?php echo $bid ?> ">Unsucessful Donation</a></button>      
		</div>
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