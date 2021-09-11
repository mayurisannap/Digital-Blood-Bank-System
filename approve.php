<?php 

    require_once("connection1.php");

    session_start();
    $bid=$_SESSION['bid'];
    $SrNo = $_GET['no'];
   // if(isset($_POST['update']) )
    {
        
        $action="Approved";
        $query = "UPDATE donation_request set action = '".$action."' where bid='".$bid."' && SrNo='".$SrNo."'" ;
        $result = mysqli_query($con,$query);
        
        $query1 = "select * from donation_request where bid='".$bid."' && SrNo='".$SrNo."'" ;
        $result1 = mysqli_query($con,$query1);

        while($row=mysqli_fetch_assoc($result1))
        {
        
            $name = $row['name'];
            $tdate =$row['tdate'];
            $email =$row['email'];
        }

        $query2 = "select * from bloodbank2 where bid='".$bid."'" ;
        $result2 = mysqli_query($con,$query2);

        while($row=mysqli_fetch_assoc($result2))
        {
        
            $bname = $row['bname'];
            
        }

        if($result)
        {
            include('phpmailer/PHPMailerAutoload.php');

            $mail = new PHPMailer;
            $mail->SMTPDebug = 4;                               // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'digitalbloodbank57@gmail.com';                 // SMTP username
            $mail->Password = '2831365786';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
    
            $mail->setFrom('digitalbloodbank57@gmail.com', 'Digital Blood Bank');
            $mail->addAddress($email, $name);     // Add a recipient
                        // Name is optional
            $mail->addReplyTo('digitalbloodbank57@gmail.com');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');
    
            //$mail->addAttachment("certificates/".$name."_".$tdate.".jpg");         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            $mail->isHTML(true);                                  // Set email format to HTML
    
            $mail->Subject = 'Approved for Blood Donation Request';
            $mail->Body ="Hello $name,<br>
            &emsp;&emsp;   Thank you for sending Blood Donation request for $bname <br>
                    Your request for blood donation is approved successfully<br>
                    You can visit to our $bname on $tdate before 5.00PM <br>
                    <br>
                    Best Regards,<br>
                    Digital Blood Bank";


            if($mail->send()){
                $_SESSION['status']="Approved successfully and mail is sent";
                $_SESSION['status_code']="success";
                header("location:pending.php?id=$bid");
            }
            else{
                $_SESSION['status']="Approved successfully but Fail to send mail";
                $_SESSION['status_code']="error";
                header("location:pending.php?id=$bid");
            }
            
        }
        else
        {
            
            $_SESSION['status']="Data not Fetched, check your query ";
            $_SESSION['status_code']="error";
            header("location:pending.php?id=$bid");
        }
    }
   /* else
    {
        header("location:pending.php?id=$bid");
    }
    */
?>

