<?php 

    session_start();
    $bid=$_SESSION['bid'];

    require_once("connection1.php");
    $SrNo = $_GET['no'];

    $query = " select * from blood_stock3 where bid='".$bid."'  && SrNo ='".$SrNo."' ";
    $result = mysqli_query($con,$query);

    while($row=mysqli_fetch_assoc($result))
    {
        $SrNo = $row['SrNo'];
        $blood_group = $row['blood_group'];
        $Availability = $row['Availability'];    
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Updating Records</title>
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

.box
{
	max-width: 700px;
	float: none;
	margin: 150px auto;
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

                        <a href="view.php?id=<?php echo $bid?>" class="nav__link">
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

                        <a href="reset_password.php?id=<?php echo $bid?>" class="nav__link">
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

        <div class="container w-50 m-auto" >
            
                <div class="box">
                        <h3 class="text-center"> Update blood record</h3>
                        

                            <form action="update.php?no=<?php echo $SrNo?> " method="post">
                                <div class="form-group">
                                    <input type="text" id="text" placeholder=" blood Group " class="form-control" name="blood_group" value="<?php echo $blood_group ?>">
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group">
                                    <input type="integer" id="integer" placeholder=" Availability " class="form-control" name="Availability" value="<?php echo $Availability ?>">
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>

                                
                                <button class="btn btn-primary" name="update">Update</button>
                            </form>

                    </div>
            </div>
    
            <!-- ===== IONICONS ===== -->
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        
        <!-- ===== MAIN JS ===== -->
        <script src="assets/js/main.js"></script>
    
</body>
</html>