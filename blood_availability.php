<?php 
require_once("connection1.php");
session_start();

$state = $_POST['state'];
$district = $_POST['district'];
$query = " select * from bloodbank2 where state='".$state."'  && district ='".$district."' order by bname" ;  
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
    <div class="container w-150 m-auto">
        <div class="register-box">

            <h2 class="text-center" style="color:#1F51FF;">Blood Banks in Your Choosen Area </h2>
            <br>
            Check Availability by clicking on click here button <br><br>
           
            <form action="connection.php" method="post">
            <div class="row">
            <table class="table table-bordered">
                        <tr>
                            <td><h5><b> Blood Bank Name </b></h5></td>
                            <td><h5><b> Email  </b></h5></td>
                            <td><h5><b> Address </b></h5></td>
                            <td><h5><b> Contact </b></h5></td>
                            
                            <td><h5><b> Availability  </b></h5></td>
                        </tr> 
                        <?php                                 
                                while($row=mysqli_fetch_assoc($result))
                                {
                                    $bname = $row['bname'];
                                    $email = $row['email'];
                                    $address = $row['address'];
                                    $contact_no = $row['contact_no'];
                                    $bid= $row['bid']
                        ?>
                                <tr>
                                    <td><h6><b><?php echo $bname ?></b></h6></td>
                                    <td><h6><b><?php echo $email ?></b></h6></td>
                                    <td><h6><b><?php echo $address ?></b></h6></td>
                                    <td><h6><b><?php echo $contact_no ?></b></h6></td>
                                    <td><h6><a href="blood_availability2.php?id=<?php echo $bid?>" >Click here</a></h6></td>
                        
                                </tr>        
                        <?php 
                                }  
                        ?>         

            </table>    
            </table>  
            </form>
            
    </div></div>
     <!-- ===== IONICONS ===== -->
     <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        
        <!-- ===== MAIN JS ===== -->
        <script src="assets/js/main.js"></script>
</body>