<?php
session_start();
require_once("connection1.php");
$status="Active";
$query = " select * from camp2 where status='".$status."' order by date " ;  
$result = mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Active Blood Donation Camps</title>
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

                        <a href="feedback.php" class="nav__link">
                            <ion-icon name="document-text-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Feedback</span>
                        </a>

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

        <div class="container w-150 m-auto">
        <div class="register-box">

            <h2 class="text-center" style="color:#1F51FF;"><u>Active Blood Donations Camps</u></h2>
            <br>
           
            <form action="connection.php" method="post">
            <div class="row">
            <table class="table table-bordered">
                        <tr>
                            <th><h5><b> Camp Name </b></h5></th>
                            <th><h5><b> Address  </b></h5></th>
                            <th><h5><b> Date </b></h5></th>
                            <th><h5><b> Camp Timing </b></h5></th>
                            
                            
                        </tr> 
                        <?php                                 
                                while($row=mysqli_fetch_assoc($result))
                                {
                                    $camp_name = $row['camp_name'];
                                    $address = $row['address'];
                                    $date = $row['date'];
                                    $stime = $row['stime'];
                                    $etime= $row['etime']
                        ?>
                                <tr>
                                    <td><h6><b><?php echo $camp_name ?></b></h6></td>
                                    <td><h6><b><?php echo $address ?></b></h6></td>
                                    <td><h6><b><?php echo $date ?></b></h6></td>
                                    <td><h6><b><?php echo $stime ?> - <?php echo $etime ?></b></h6></td>
                                </tr>        
                        <?php 
                                }  
                        ?>         

            </table>    
            </table>  
            </form>
            
    </div></div>


</body>
