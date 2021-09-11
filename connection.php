<?php
		session_start();
	$con = mysqli_connect('localhost:3307','root');
	mysqli_select_db($con, 'digitalbloodbank');
   //if(isset($_POST['submit1']))
    
	$bid = $_POST['bid'];
	$password = $_POST['password'];

	$query = " SELECT * from bloodbank2 where bid='".$bid."'";
    $run_qry = mysqli_query($con,$query);

        if(mysqli_num_rows($run_qry)>0) 
        {
            while($row=mysqli_fetch_assoc($run_qry)){
                if(password_verify($password, $row['password'])){
                    $bid=$row['bid'];
                    header("location:blood_bank_welcome.php?id=$bid");               
                }
                else{
                    
                    header("location: bloodbanklogin.php?error=You have entered wrong password. Please try again...");
                }
            }
        }
        else{
            
            header("location: bloodbanklogin.php?error=You have entered wrong ID. Please check it once...");
        }
    
?>