<?php

include('config-db.php');
session_start();
	$request_id = $_GET['request_id'];

	$res_message=mysqli_query($con,"SELECT * FROM email_of_donor WHERE request_id='$request_id' ");

	$row = mysqli_fetch_array($res_message);
	$email = $row['email'];
	$name = $row['name'];
	$mobile = $row['mobile'];
	$address = $row['address'];
	$message_for_user = $row['message_for_user'];
	$email_of_donor = $row['email_of_donor'];

	$count=mysqli_num_rows($res_message);

if($count>0){
?>

<!DOCTYPE.html>
<html>
<head>
	<title>View Request</title>
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<link rel="stylesheet" href="css/userprofile-style.css" >
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
$(document).on('click', '#accept', function(){
    var request_id = $(this).val();
        $.ajax({
            url:"confirm_request.php",
            method:"POST",
            data:{request_id:request_id, confirm_status:'Accept'},
            success:function(result)
            {
	            swal({
	            title: "Your details will be shared with requester!",
	            text: "",
	            icon: "success",
	            button: "Close",
        	});
	        }
      });
    });

$(document).on('click', '#decline', function(){
    var request_id = $(this).val();
        $.ajax({
            url:"confirm_request.php",
            method:"POST",
            data:{request_id:request_id, confirm_status:'Reject'},
            success:function(result)
            {
	            swal({
	            title: "Request Declined!",
	            text: "",
	            icon: "error",
	            button: "Close",
        	});
	        }
      });
    });
</script>

</head>

<body >
<div class="container-fluid">
    <div class="row my-5">
      <div class="col-sm-12 col-md-8 col-lg-6 mx-auto">
        <div class="card shadow ">
          <div class="card-body">
			<p> 
				<h4>Hi, you have received new blood request from 
					<b><?php echo "$name"; ?></b></h4>
				<br>
				These are there credentials: <br>
				<div style="padding: 10px;">
					Mobile Number : <?php echo "$mobile"; ?><br>
					Email ID : <?php echo "$email"; ?><br> 
					Address of blood bank : <?php echo "$address"; ?><br> 
					Message from user : <?php echo "$message_for_user"; ?><br> <br>
				</div>
				Please confirm if you are available to donate blood 
			</p>
				<div class="row">
					<div class="ml-auto">
						<button type="button" class="btn btn-primary" name="accept" id="accept" class="btn btn-primary" <?php echo 'value="'.$row['request_id'].'"' ?>>
						Accept</button>
					</div>

					<div class="col-sm-6">
						<button type="button" name="decline" id="decline" class="btn btn-danger" <?php echo 'value="'.$row['request_id'].'"' ?>>Decline</button>
					</div>
				</div>

				</div> 
          </div> 
        </div>
    </div>
 </div>  
</body>
</html>

<?php
} 

/*if($row['confirm_status'] == 'Accept')
{
	$firstname = ucfirst($firstname_donor);
	$lastname = ucfirst($lastname_donor);
	$html='
	<div>
		<p><h4>Hi, <i>'.$firstname. ' ' .$lastname.'</i> has accepted your blood request!</h4><br>
		These are there credentials: <br>
		<div style="padding: 10px;">
		Mobile Number : '.$mobile_donor. '<br>
		Email ID : '.$email_donor. '<br> 
		<br></div>
		Please contact the donor! </p>
	</div> '; 
	smtp_mailer($email,'Donor has accepted your request!',$html);
}

if ($row['confirm_status'] == 'Reject') {
 	$firstname = ucfirst($firstname_donor);
	$lastname = ucfirst($lastname_donor);
	$html='
	<div>
		<p><h4>Hi, <i>'.$firstname. ' ' .$lastname.'</i> has declined your blood request!</h4><br>
		Please find more donors <a href="http://localhost/Project_Blood%20Bank/RequestBlood.php" here! </a></p>
	</div> '; 
	smtp_mailer($email,'Donor has rejected your request!',$html);
 } 

function smtp_mailer($to,$subject, $msg){
	require_once("smtp/PHPMailerAutoload.php");
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPDebug = 3; 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'TLS'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "digitalbloodbank57@gmail.com";
	$mail->Password = "2831365786";
	$mail->SetFrom("digitalbloodbank57@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	if(!$mail->Send()){
		return 0;
	}else{
		return 1;
	}
} */
?>