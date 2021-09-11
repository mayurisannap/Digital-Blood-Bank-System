<?php

require_once("connection1.php");
session_start();
//if(isset($_POST['send']))
{
   
	$bid = $_POST['bid'];
	$email = $_POST['email'];
	$query = " select * from bloodbank2 where bid='".$bid."'  ";
    $result = mysqli_query($con,$query);

    $email_count= mysqli_num_rows($result);
    if($email_count)
    {       
        while($row=mysqli_fetch_assoc($result))
        {
            $email2 = $row['email'];
            $bname = $row['bname'];
        }
        $subject="Password Recovery";
        $body="hello $bname.
            Click here to recover your password.
            http://localhost/project6/reset_password.php?id=$bid .";
        $sender_email="From: anjalipatil7757@gmail.com";

        if(mail($email, $subject, $body,$sender_email)){
            $_SESSION['status']="Mail sent successfully, check your mail";
            $_SESSION['status_code']="success";
            header("location:bloodbanklogin.php");
        }
        else{
            $_SESSION['status']="Mail not sent ,try again later...";
            $_SESSION['status_code']="error";
            header("location:bloodbanklogin.php");
        }
    }
    else{
        $_SESSION['status']="This is Invalid ID";
        $_SESSION['status_code']="warning";
        header("location:bloodbanklogin.php");
    }    

    

}
		
?>