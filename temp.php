<?php
        $eID="2021@00031";
        $bname="Jeevendhara Blood Bank";
        $camp_name="Blood Donation Camp";
        $camp_date="25/04/2021";
        $name="Anjali Patil";
        $email="anjalipatil7757@gmail.com";
        $address="A/P Shirol";
        $contact_no="7757862996";
        $blood_group="A+";
    //if($result)
    {
        $image=imagecreatefromjpeg("e_pass/e-pass.jpg");
        $color=imagecolorallocate($image,19,21,22);
        
        imagettftext($image,18,0,315,230, $color,"fonts/calibrib.TTF",$eID);
        imagettftext($image,13.5,0,273,317,$color,"fonts/calibri.TTF",$bname);
        imagettftext($image,13.5,0,273,356,$color,"fonts/calibri.TTF",$camp_name);
        imagettftext($image,13.5,0,273,395,$color,"fonts/calibri.TTF",$camp_date);
        imagettftext($image,13.5,0,273,434,$color,"fonts/calibri.TTF",$name);
        imagettftext($image,13.5,0,273,473,$color,"fonts/calibri.TTF",$email);
        imagettftext($image,13.5,0,273,512,$color,"fonts/calibri.TTF",$address);
        imagettftext($image,13.5,0,273,587,$color,"fonts/calibri.TTF",$contact_no);
        imagettftext($image,13.5,0,273,626,$color,"fonts/calibri.TTF",$blood_group);
    
        imagejpeg($image,"e_pass/".$eID.".jpg");
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
        $mail->addReplyTo('digitalbloodbank57@gmail.com');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        $mail->addAttachment("e_pass/".$eID.".jpg");         // Add attachments
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Registered for Donation Camp';
        $mail->Body    = "Hello $name, <br>
                    &emsp;   You are successfully registred for $camp_name.<br>
                    
                    &emsp;  Your e-pass is attached, kindly check it.<br>
                    &emsp;  This pass is necessary when you visit blood donation camp. 
                            The Donor with E-Pass will get first priority and get immediate service. 
                            So keep this soft copy along with you. 
                            In the case of any query you can contact to blood bank by accessing contact information from official website of ‘Digital Blood Bank’ 
                            or you can contact on our email i.e. digitalbloodbank57@gmail.com <br>
                    <br>
                    Best Regards,<br>
                    Digital Blood Bank";

            if($mail->send())
            {              
                echo 'Email has been sent';
                //$_SESSION['status']="You are successfully registered, check your mail;
                //$_SESSION['status_code']="success";
                //header("location:approved_donors.php?id=$bid");
            } else {
                //echo 'Message could not be sent.';
                // echo 'Mailer Error: ' . $mail->ErrorInfo;
                echo 'Email not sent';
                //$_SESSION['status']="You are successfully registered";
                //$_SESSION['status_code']="success";
                //header("location:approved_donors.php?id=$bid");
            }
        }
        //else
        {
            //$_SESSION['status']="Something went wrong, please try later..";
            //$_SESSION['status_code']="warning";
            //header("location:approved_donors.php?id=$bid");
        }

?>