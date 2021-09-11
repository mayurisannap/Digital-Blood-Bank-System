
<!DOCTYPE.html>
<html>
  <head>
	<title>Digital Blood Bank</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <link rel="stylesheet" href="css/request-style.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).on('click', '#register', function(){
        var email_of_donor = localStorage.getItem("email_of_donor");
        
        var email = $("#email").val();
		var name = $("#name").val();
		var mobile = $("#mobile").val();
		var address = $("#address").val();
		var message = $("#message").val();
        $.ajax({
            url:"email_of_donor.php",
            method:"POST",
            data:{email_of_donor:email_of_donor, email:email, name:name, mobile:mobile, address:address,message:message},
            success:function(result)
            {
             // $('#request_button_'+to_id).html('<i class="fa fa-clock-o" aria-hidden="true"></i> Request Send');
              
              	swal({
                  title: "Request Sent Successfully!",
                  text: "",
                  icon: "success",
                  button: "Close",
                });
              
          	 if(result == 'error'){
          	 	swal({
                  title: "Error occured, please try again!",
                  text: "",
                  icon: "error",
                  button: "Close",
                });
          	 }              
            }
          });
    });

</script>
</head>

 
 <body>
 <div class="container">
 
    <div class="row">
		<div class="col-md-12">
		<div class="profile ">
        <div class="my">
          <h5 id="u"> <i class="fas fa-hand-holding-heart"></i>Request Blood</h5>
        </div>
		
		<form method="post">	
        <div class="profile-sidebar">
          <h3 class="text-center"><strong>Fill Your Details!</strong></h3>
            <hr>
				
			<div class="profile-usermenu">
            <div class="form-group">
				      <label for="name">Name:</label> 
						  <input type="text" id="name" name="name" placeholder="Enter your name" 
                class="form-control" required="">
                <div class="invalid-feedback">Please fill out this field.</div>
			  </div>

			<div class="form-group">
				    <label for="mobile_number">Mobile Number:</label> 
					<input type="text" id="mobile" name="mobile_number" placeholder="Enter your number" class="form-control" maxlength="10" required="">
					<div class="invalid-feedback">Please fill out this field.</div>
			</div>

			<div class="form-group">
					<label >Email ID:</label> 
					<input type="text" id="email" placeholder="Enter email" class="form-control" name="email" required="">
				 	<div class="invalid-feedback">Please fill out this field.</div>
			</div>

			<div class="form-group">
				    <label for="address">Address of blood bank:</label> 
					<input type="text" id="address" name="address" placeholder="Enter address of Blood Bank" class="form-control" required>
				 	<div class="invalid-feedback">Please fill out this field.</div>
			</div> 

			<div class="form-group">
				    <label for="message">Any Message for the Donor:</label>
				    <p class="text-muted">Mention in detail till what time you need blood and how would you like to get contacted by the donor.</p>
					<textarea name="message" id="message" placeholder="E.g. Hi, I am in urgent need of A+ blood for my brother at XXXX hospital, it would be great if we could arrange blood before 7P.M. today. You can contact me on my mobile number. XXXXXXXXXX this is my alternative number." class="form-control" style="height: 100px;"></textarea>
			</div>                   

			<div class="form-group">
			<div class="row">
			    <div class=" mx-auto">
				    <button type="button" class="btn btn-primary" id='register' name='register'>Send Request</button>
				</div> 

		<!--	<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title">Modal title</h4>
				      </div>    
				      <div class="modal-body">
				        <p class="text-center">Registration Successful&hellip;</p>
				      </div>
				      <div class="modal-footer">
				        <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div> 
			</div> -->
			</div>
			</div>


		</div>
	</div>
</form>
</div>
</div>
</div>
</div>
 </body>

	
</html>