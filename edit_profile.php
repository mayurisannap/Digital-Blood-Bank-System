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
    $email = $row['email'];
    $contact_no = $row['contact_no'];
    $state = $row['state'];
    $district = $row['district'];
    $address = $row['address'];
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Update Profile</title>
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
.box1
{
	max-width: 800px;
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

    <div class="box1">
		<h2 class="text-center">Update Blood Bank Profile</h2><br>
		<form action="update_profile.php" method="post">
            <h5 class="text-center">Your Blood Bank ID is  <b> <?php echo $bid?> </b></h5>

            <div class="form-group">
                <label for="bname">Blood Bank Name:</label> 
                <input type="text" placeholder="Enter Blood Bank Name" class="form-control" name="bname" required="" value="<?php echo $bname ?>">
            </div>
        
            <div class="form-group">
                <label for="address">Email ID:</label> 
                <input type="email" placeholder="Enter email ID" class="form-control" name="email" required="" value="<?php echo $email?>">
                <p class="text-danger"> <?php if(isset($error['email'])) echo $error['email'] ?> </p>
            </div>

            <div class="form-group">
                <label for="contact_no">Contact Number:</label> 
                <input type="text"  placeholder="Enter blood bank contact number" class="form-control" name="contact_no" 
                maxlength="10" required="" value="<?php echo $contact_no ?>">
            </div>
        
            <div class="form-group">
            <div class="row">
            <div class="col-lg-6">
                <label for="state">State:</label> 
                    <select name="state" class="form-control" id="state">
                    <option value="<?php echo $state ?>"><?php echo $state ?></option>
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                    <option value="Anunachal Pradesh">Anunachal Pradesh</option> 
                    <option value="Assam">Assam</option>
                    <option value="Bihar">Bihar</option>
                    <option value="Goa">Goa</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Manipur">Manipur</option>
                    <option value="Panjab">Panjab</option>
                       </select>
            </div>

            <div class="col-lg-6">
                <label for="district">District:</label> 
                    <select name="district" class="form-control" id="district">
                        <option value="<?php echo $district ?>"><?php echo $district ?></option>
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
            <input type="address" placeholder="Enter address" class="form-control" name="address" required="" value="<?php echo $address ?>">
        </div>
        
        <button type="submit" name ="update" class="btn btn-primary">Update</button>
        <br>
        <p class="text-center">If you want to change password <a href="reset_password.php?id=<?php echo $bid?>"> Click Here</a></p>
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