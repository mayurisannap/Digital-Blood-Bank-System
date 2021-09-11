<?php 
$bid = $_GET['id'];
require_once("connection1.php");

session_start();
$bid=$_SESSION['bid'];
$_SESSION['bid']=$bid;

$action="Pending";
$query = " select * from donation_request where bid= '".$bid."' && action='".$action."' ";  
$result = mysqli_query($con,$query);

$query1 = " select * from bloodbank2 where bid= '".$bid."' ";  
$result1 = mysqli_query($con,$query1);

while($row=mysqli_fetch_assoc($result1))
{
    $bname = $row['bname'];
}
$count=mysqli_num_rows($result);
?>
<html>
<!DOCTYPE html>
<html>
<head>
	<title>Pending Donation Request</title>
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
	/*background: linear-gradient(rgba(0, 0, 50, 0.5), rgba(0,0,50,0.5));
	background-image: url('../images/blood_drop3.jpg');
    background-color:#fae6da;*/
    background-color:#f8f8faf5;
	background-repeat: no-repeat,repeat;
	background-position: center;
	background-size: cover;
  
}
    .content-table{
        border-collapse:collapse;
        margin: 25px;
        font-size: 0.9em;
        width:97%;
        column-gap:30px;
    }

    .content-table thead tr{
        background-color:#3b6df7;
        color:#ffffff;
        text-align:center;
        font-weight:bold;
        border-radius: 5px 5px 0 0;
        overflow:hidden;
        height:80px;
        box-shadow: 0 0 10px rgba(0, 0, 0.05);
    }

    .content-table tbody tr{
        text-align:center;
    }
    .content-table th
    .content-table td{
        padding:12px 15px;
    
    }
    .content-table tbody tr{
        border-bottom:1px solid #dddddd;
        height:100px;
    }
    .content-table tbody tr:nth-of-type(even){
        background-color:#c8d1f5;
    }
    .content-table tbody tr:nth-of-type(odd){
        background-color:#f3f3f3;
    }
    .content-table tbody tr:last-of-type{
        border-bottom: 2px solid #3b6df7;
    }
    .content-table tbody tr:hover{
        transform: scale(1.02);
        color:#3b6df7;
    }

</style>
<body id="body-pd">
        <div class="l-navbar" id="navbar" >
            <nav class="nav">
                <div>
                    <div class="nav__brand">
                        <ion-icon name="menu-outline" class="nav__toggle" id="nav-toggle"></ion-icon>
                        Digital<br>Blood Bank
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

                <a href="index.php" class="nav__link text-white">
                    <ion-icon name="log-out-outline" class="nav__icon"></ion-icon>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>

         <!-- ===== IONICONS ===== -->
     <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        
        <!-- ===== MAIN JS ===== -->
    <script src="assets/js/main.js"></script>
    
    <form >
    <?php if(!$count)
        { ?>
            <br><h3 class="text-center" > You don't have not any pending request </h3>
            <br>
            <?php }else{  ?>             
        
        

    <div class="row">
            <div class="col m-auto">
            <h3 style="padding-left:25px;">Hello admin, Manage Your Pending Donation Requests here...</h3><br> <br>            
                    <table  class="content-table">
                        <thead>
                        <tr>
                            <th><h5> Donar Name </h5></th>
                            <th><h5> Gender </h5></th>
                            <th><h5> Date of Birth </h5></th>
                            <th><h5> Contact No </h5></th>
                            <th><h5> Address </h5></th>
                            <th><h5> Tentative Dates </h5></th>
                            <th><h5> Blood Group </h5></th>
                            <th><h5> Action </h5></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php                                 
                                while($row=mysqli_fetch_assoc($result))
                                {
                                    $name = $row['name'];
                                    $gender = $row['gender'];
                                    $DOB = $row['DOB'];
                                    $contact_no = $row['contact_no'];
                                    $email = $row['email'];
                                    $address = $row['address'];
                                    $tdate = $row['tdate'];
                                    $blood_group = $row['blood_group'];
                                    $action = $row['action'];
                                    $SrNo = $row['SrNo'];
                        ?>
                                <tr>
                                    <td><b><?php echo $name ?></b></td>
                                    <td><b><?php echo $gender ?></b></td>
                                    <td><b><?php echo $DOB ?></b></td>
                                    <td><b><?php echo $contact_no ?></b></td>
                                    <td><b><?php echo $address ?></b></td>
                                    <td><b><?php echo $tdate ?></b></td>
                                    <td><b><?php echo $blood_group ?></b></td>
                                    <td><button class="btn btn-primary" ><a class="text-white" href="approve.php?no=<?php echo $SrNo?>">Approve</button>
                                        <button class="btn btn-primary" style="background-color:red;"><a class="text-white" href="reject.php?no=<?php echo $SrNo?>">Reject</button>
                                    </td>
                                </tr>        
                        <?php 
                                }  
                        ?>                                                                    
                    </tbody></table>
                  </div>       
        </div>	</form>	
        <?php }?>
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
