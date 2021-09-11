<?php 

    require_once("connection1.php");

    session_start();
    $bid=$_SESSION['bid'];
    $SrNo = $_GET['no'];
 
        $action="Completed";
        $query = "UPDATE donation_request set action = '".$action."' where bid='".$bid."' && SrNo='".$SrNo."'" ;
        $result = mysqli_query($con,$query);

        $query1 = "select * from donation_request where bid='".$bid."' && SrNo='".$SrNo."'" ;
        $result1 = mysqli_query($con,$query1);

        while($row=mysqli_fetch_assoc($result1))
        {
            $name = $row['name'];
            $tdate =$row['tdate'];
            $email =$row['email'];
            $DOB =$row['DOB'];
            $contact_no =$row['contact_no'];
            $blood_group =$row['blood_group'];
        }

        $query2 = "select * from bloodbank2 where bid='".$bid."'" ;
        $result2 = mysqli_query($con,$query2);

        while($row=mysqli_fetch_assoc($result2))
        {
           $bname = $row['bname'];            
        }

if($result)
{

        $image=imagecreatefromjpeg("certificates/certificate_format.jpg");
        $color=imagecolorallocate($image,19,21,22);
        $color1=imagecolorallocate($image,194,13,13);
        //$bname="Jeevendhara Blood Bank";
        imagettftext($image,37,0,260,255,$color1,"fonts/arialbd.TTF",$bname);
        //$name="Anjali";
        imagettftext($image,50,0,420,380,$color,"fonts/BRUSHSCI.TTF",$name);
        //$date="6th may 2020";
        imagettftext($image,20,0,355,575,$color,"fonts/AGENCYR.TTF",$tdate);
        imagejpeg($image,"certificates/".$name."_".$tdate.".jpg");
        imagedestroy($image);
        
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
        $mail->addReplyTo('anjalipatil7757@gmail.com');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        $mail->addAttachment("certificates/".$name."_".$tdate.".jpg");         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Donation Successful ';
        $mail->Body    = "Hello $name, <br>
                    &emsp;   Thank you for donating blood in $bname. Here is your Donation Report,<br>

                    <h3>  &emsp;  Donation Report</h3>
                    &emsp;  Name of Donor       &emsp;&emsp;&emsp;                      :$name<br>
                    &emsp;  Email ID            &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;    :$email<br>
                    &emsp;  Blood Group         &emsp;&emsp;&emsp;&emsp;                :$blood_group<br>
                    &emsp;  Contact Number      &emsp;&emsp;&nbsp;                      :$contact_no<br>
                    &emsp;  Date of Birth       &emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;    :$DOB<br>                    
                    &emsp;  Blood Bank Name     &emsp;&nbsp;&nbsp;                      :$bname<br>
                    &emsp;  Date of Donation    &emsp;&emsp;&nbsp;                      :$tdate<br>
                    &emsp;  Donation status     &emsp;&emsp;&nbsp;&nbsp;&nbsp;          :Successful<br><br>

                    &emsp;  Your Donation Certificate is attached, kindly check it.<br><br>
                    Best Regards,<br>
                    Digital Blood Bank";
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if($mail->send())
            {              
                //echo 'Email has been sent';
                $_SESSION['status']="Marked as Completed successfully and mail is sent";
                $_SESSION['status_code']="success";
                header("location:approved_donors.php?id=$bid");
            } else {
                //echo 'Message could not be sent.';
                // echo 'Mailer Error: ' . $mail->ErrorInfo;
                echo 'Message not sent';
                $_SESSION['status']="Marked as Completed successfully but mail is not sent";
                $_SESSION['status_code']="success";
                header("location:approved_donors.php?id=$bid");
            }
}
else
{
    $_SESSION['status']="Something went wrong, try later..";
    $_SESSION['status_code']="error";
    header("location:approved_donors.php?id=$bid");
}

?>

