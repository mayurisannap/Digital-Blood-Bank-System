<?php 
$bid = $_GET['id'];
require_once("connection1.php");
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
	<title>Blood Availability</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/styles5.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
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

                        <a href="about.php" class="nav__link">
                            <ion-icon name="people-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">About us</span>
                        </a>

                    </div>
                </div>
            </nav>
        </div>
        <!-- ===== IONICONS ===== -->
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        
        <!-- ===== MAIN JS ===== -->
        <script src="assets/js/main.js"></script>
    <div class="container w-150 m-auto">
            <div class="register-box">
            <h2 class="text-center" style="color:#1F51FF;">Blood Availability in <?php echo $bname?> is</h2>
            Availabitity is in units (1 unit= 200mL) <br><br>
            <form action="connection.php" method="post">

           <div class="row">
            <div class="col m-auto">
            <table class="table table-bordered">
                        <tr>
                            <td><h5><b> Sr No</h5> </b></td>
                            <td><h5><b> Blood Group </b></h5></td>
                            <td><h5><b> Availability </b></h5></td>
                            
                        </tr> 

                        <?php 
                                
                                while($row=mysqli_fetch_assoc($result))
                                {
                                    $SrNo = $row['SrNo'];
                                    $blood_group = $row['blood_group'];
                                    $Availability = $row['Availability'];
                        ?>
                                <tr>
                                    <td><h6><b><?php echo $SrNo ?></b></h6></td>
                                    <td><h6><b><?php echo $blood_group ?></b></h6></td>
                                    <td><h6><b><?php echo $Availability ?></b></h6></td>
                                </tr>        
                        <?php 
                                }  
                        ?>  
                           
            </table>  
            </form>
            </div></div></div>
    </div>

    
</body>