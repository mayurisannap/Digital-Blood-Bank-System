<?php
	session_start();

	$con = mysqli_connect('localhost:3307','root');
	mysqli_select_db($con, 'digitalbloodbank');

	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = " select * from userregistration where email='".$email."'";
    $run_qry = mysqli_query($con,$query);

        if(mysqli_num_rows($run_qry)>0) 
        {
            while($row=mysqli_fetch_assoc($run_qry)){
                if(password_verify($password, $row['password'])){
                    $email=$row['email'];
                    header("location:welcome.php");               
                }
                else{
                    header("location:login.php");
                }
            }
        }
        else{
            header("location:login.php");
        }
?>