<?php 
$bid = $_GET['id'];
require_once("connection1.php");

session_start();
$_SESSION['bid']=$bid;

$query = " select * from blood_stock3 where bid= '".$bid."' ";  
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
	<title>View Blood Records</title>
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
.box2
{
	max-width: 1000px;
	float: none;
	margin: 10px auto;
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
		<div class="box2">

        <h2 class="text-center" style="color:red; font-family:verdana"><b><u>Welcome to <?php echo $bname?></u></b></h2>
		<h3 class="text-center" >Hello Admin, Manage Your blood Record are</h3>
		<form action="connection.php" method="post">
			
        <div class="row">
            <div class="col m-auto">
                <div class="card mt-5">
                        
                    <table class="table table-bordered">
                        <tr>
                            <td> Sr. No </td>
                            <td> Blood Group </td>
                            <td> Availability </td>
                            <td> Edit </td>
                            <td> Delete </td>
                    
                        </tr> 

                        <?php 
                                
                                while($row=mysqli_fetch_assoc($result))
                                {
                                    $SrNo = $row['SrNo'];
                                    $blood_group = $row['blood_group'];
                                    $Availability = $row['Availability'];
                        ?>
                                <tr>
                                    <td><?php echo $SrNo ?></td>
                                    <td><?php echo $blood_group ?></td>
                                    <td><?php echo $Availability ?></td>
                                    <td><a href="edit.php?no=<?php echo $SrNo?>" >Edit</a></td>
                                    <td><a href="delete.php?no=<?php echo $SrNo?> ">Delete</a></td>
                                </tr>        
                        <?php 
                                }  
                        ?>                                                                    
                               

                    </table>
                    <button class="btn btn-primary" name="submit"><a class="text-white" href="index1.php?id=<?php echo $bid ?> ">Add</a></button>
                </div>
            </div>
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
