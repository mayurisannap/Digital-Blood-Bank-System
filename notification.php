<?php

include('config-db.php');
session_start();
	$email = $_SESSION['mail'];


	$res_message=mysqli_query($con,"SELECT * FROM email_of_donor WHERE request_status=0 and email_of_donor='$email' ");
	$unread_count=mysqli_num_rows($res_message);

	mysqli_query($con,"update email_of_donor set request_status=1 where confirm_status='Accept' or confirm_status='Reject'");
//	mysqli_query($con,"update email_of_donor set request_status=1 where email_of_donor='$email'");

?>

<!DOCTYPE.html>
<html>
<head>
	<title>Notifications</title>
  	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

	<link rel="stylesheet" href="css/userprofile-style.css" >

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
$(document).on('click', '#confirm-request', function(){
        var request_id = $(this).val();
        console.log(request_id);
        window.location = 'accept_request.php?request_id='+request_id;
      });
</script>
</head>

<body >
<div class="container-fluid">
    <div class="row my-5">
      <div class="col-sm-12 col-md-8 col-lg-6 mx-auto">
      <div class="text-center" style="padding: 15px;"><h3><b>Notifications</b></h3></div>
        <div class="card shadow ">
          <div class="card-body">
          	<?php if($unread_count>0){
				while($row_message=mysqli_fetch_assoc($res_message)){?>
                 <p>You have received new blood request from <strong><?php echo $row_message['name']?></strong> <br> Please confirm if you are available to donate blood!
                 <div class="text-right">
                	<button type="button" name="confirm-request" id="confirm-request" class="btn btn-primary" 
                	<?php echo 'value="'.$row_message['request_id'].'"' ?>>Confirm Request </button>
            	</div></p><hr>
				<?php } } 
				else
					{
						echo '<div class="text-center"> No new Notifications </div>';
					}?>
          </div> 
        </div>
      </div>
    </div>
 </div> 
</body>
</html>

