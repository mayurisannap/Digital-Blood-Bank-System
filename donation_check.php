<?php
	include('config-db.php');
	session_start();
	$email = $_SESSION['mail'];

	$res=mysqli_query($con,"SELECT * FROM userregistration WHERE email = '$email'");
	$row=mysqli_fetch_array($res);

	$res_request=mysqli_query($con,"SELECT * FROM email_of_donor WHERE email_of_donor='$email' and confirm_status='Accept' and donated=0 ");
	$row_request=mysqli_fetch_array($res_request);

?>

<!DOCTYPE.html>
<html>
<head>
	<title>Donation History</title>
  	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

	<link rel="stylesheet" href="css/userprofile-style.css" >

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>
$(document).on('click', '#donated', function(){
	var name_BB=jQuery('#name').val();
	var email=jQuery('#email').val();
	var request_id=jQuery(this).val();
	var date_donation=jQuery('#date').val();

	jQuery.ajax({
		url:'donation_history.php',
		type:'post',
		data:{name_BB:name_BB, date_donation:date_donation, request_id:request_id,email:email},
		success:function(result){
			swal({
	            title: "Thank You for Donating Blood!",
	            text: "",
	            icon: "success",
	            button: "Close",
        	});
		}
	});
});

</script>
</head>

<body>
<div class="container-fluid">
    <div class="row my-5">
      <div class="col-sm-12 col-md-8 col-lg-6 mx-auto">
        <div class="card shadow text-center">
          <div class="card-body">
          	<h2>Have you donated blood today?</h2> <hr>
                 <div class="text-right">
                	<button type="button" id="yes" data-toggle="modal" data-target="#modalForm" class="btn btn-primary">Yes</button>
            	
            		<button type="button" class="btn btn-danger" id="no" value="no"><a href="userprofile.php" style="color: white" onclick="<?php 
                        $request_id = $row_request['request_id'];
                        mysqli_query($con,"UPDATE email_of_donor SET donated=-1 WHERE request_id='$request_id'");
                        ?>">No
            			 </a></button>
            	</div>
          </div> 
        </div>
      </div>
    </div>
 </div> 

<!-- Modal -->
<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	<h4 class="modal-title text-center" id="myModalLabel">Your Donation History!</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form role="form">
                	<div class="form-group">
                        <label for="email">Your Email ID</label>
                        <input type="text" class="form-control" id="email" placeholder="Enter your email ID.." value="<?php 
				          if(isset($email)) echo $email; ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Name of Blood Bank</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name of blood bank where you donated blood..">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Date of donation</label>
                        <input type="date" class="form-control" id="date"/>
                    </div>
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
            	<button type="button" class="btn btn-primary submitBtn" id="donated" <?php echo 'value="'.$row_request['request_id'].'"' ?>>SUBMIT</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                
            </div>
        </div>
    </div>
</div>


</body>
</html>