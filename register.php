<?php

$salt = md5('GanpatiBappaMoraya');

	function hashword($string, $salt){
		$string = crypt($string, '$1$' . $salt . '$');
		return $string;
	}



	session_start();

	$con = mysqli_connect('localhost:3307','root');

	mysqli_select_db($con, 'digitalbloodbank');

	if(isset($_POST['register']))
	{
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$gender = $_POST['gender'];
		$blood_group = $_POST['blood_group'];
		$address = $_POST['address'];
		$password = $_POST['password'];
		$retype_password = $_POST['retype_password'];
		$state_id = $_POST['state'];
		$city_id = $_POST['city'];

		$query = mysqli_query($con, "SELECT city FROM cities WHERE city_id = $city_id");
		$row = mysqli_fetch_array($query);
  		$city = $row['city']; 

  		$query = mysqli_query($con, "SELECT state_name FROM state_list WHERE state_id = $state_id");
		$row = mysqli_fetch_array($query);
  		$state = $row['state_name']; 

		$password = hashword($password, $salt);
		$retype_password = hashword($retype_password, $salt);

		$errors = array();
		$_SESSION['mail'] = $email;

		$error_email = mysqli_query($con, "SELECT email FROM userregistration WHERE 
			email = '$email'");
		$error_mobile = mysqli_query($con, "SELECT mobile FROM userregistration WHERE 
			mobile = '$mobile'");

		$check = mysqli_query($con, "SELECT * FROM userregistration WHERE email = '$email'");
		if(mysqli_num_rows($error_email)>0)
		{
			$errors['email'] = "Email ID alredy exists";
		}

		if(mysqli_num_rows($error_mobile)>0)
		{
			$errors['mobile'] = "Mobile number alredy exists";
		}


		if(count($errors) == 0)
		{
		$insert = "INSERT INTO userregistration (firstname, lastname, email, mobile, gender,
					bloodgroup, address, password, repassword, state, district) values 
					('$firstname', '$lastname', '$email', '$mobile', '$gender', 
					'$blood_group', '$address', '$password', '$retype_password', '$state', '$city')";

		$result = mysqli_query($con, $insert);

		if($result)
		{
			echo "<script>alert('Registration Successful..') </script> ";
			header('location:verify-email.php');
		}

		else
		{
			echo "<script>alert('Registration Unsuccessful..')</script> ";
		}

	}
}
?>



<!DOCTYPE.html>
<html>
<head>
	<title>Digital Blood Bank</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/register-style.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
	
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<script type="text/javascript">
$(document).ready(function(){
    
    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'cities-dropdown-db.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
});
</script>

</head>

<body style="background-color: #dfcaa5;">
<div class="container w-50 m-auto col-sm-12">
		<div class="register-box">
		<h2 class="text-center">REGISTRATION FORM</h2>
	<!--
	***************************************************************************
	***	<form method="post" onsubmit="openModal()" id="myForm"> --for modal ***
	*************************************************************************** -->	

	<form method="post">
			<div class="form-group"> 
				<div class="row">
				<div class="col-lg-6">
					<label for="firstname">First Name:</label> 
					<input type="text" placeholder="Enter first name" class="form-control" name="firstname" required="">
				</div>

				<div class="col-lg-6">
					<label for="lastname">Last Name:</label> 
					<input type="text" placeholder="Enter last name" class="form-control" name="lastname" required="">
				</div>
			</div></div>
 
			<div class="form-group">
				<div class="row">
				<div class="col-lg-6">
					<label for="email">Email ID:</label> 
					<input type="text" id="email" placeholder="Enter email id" class="form-control" name="email" required="">
					<div class="text-danger"> 
						<?php if(isset($errors['email'])) echo $errors['email']; ?> 
					</div>
				</div>

				<div class="col-lg-6">
					<label for="mobile">Mobile Number:</label> 
					<input type="text"  placeholder="Enter your mobile number" class="form-control" name="mobile" maxlength="10" required="">
					<div class="text-danger"> 
						<?php if(isset($errors['mobile'])) echo $errors['mobile']; ?> 
					</div>
				</div>
			</div>
		</div>

		<div class="form-group">
				<div class="row">
				<div class="col-lg-6">
					<label for="gender">Gender:</label> 
						<select name="gender" class="form-control" id="gender" required="">
						  <option>Select gender</option>
					      <option>Male</option>
					      <option>Female</option>
					      <option>Other</option>
					   	</select>
				</div>

				<div class="col-lg-6">
					<label for="blood_group">Blood Group:</label> 
						<select name="blood_group" class="form-control" id="blood_group" required="">
						  <option>Select blood group</option>
					      <option>A+</option>
					      <option>B+</option>
					      <option>AB+</option>
					      <option>O+</option>
					      <option>A-</option>
					      <option>B-</option>
					      <option>AB-</option>
					      <option>O-</option>
					   	</select>
				</div>
			</div>
		</div>

			<div class="form-group">
				<label for="address">Address:</label> 
				<input type="address" placeholder="Enter your address" class="form-control" name="address">
			</div>

			<div class="form-group">
				<div class="row">
				<div class="col-lg-6">
				<label for="state">State:</label> 
					<?php

                     include('config-db.php');
                     $query = mysqli_query($con,"SELECT * FROM state_list");
                                
                    ?>
					<select name="state" id="state" class="form-control">
                      <option value="">Select State</option>
                        <?php
                         if(mysqli_num_rows($query) > 0)
							{
                             while($row = mysqli_fetch_assoc($query))
								{ 
								  	$state_name = $row['state_name'];
								  	$state_lower = strtolower($state_name);
                                    echo '<option value="'.$row['state_id'].'">'.ucfirst($state_lower).'</option>';
                                  }
                                }else{
                                      echo '<option value="">State not available</option>';
                                } 
                               ?> 
                            </select>
                        </div>
				
					<div class="col-lg-6">
				           <label for="city">City:</label> 
						   <select name="city" id="city" class="form-control">
                              <option value="">Select state first</option>
                           </select>
			            </div>
			        </div>
			    </div>   
						        

			<div class="form-group">
				<div class="row">
				<div class="col-lg-6">
					<label for="password">Password:</label> 
					<input type="password" placeholder="Enter password" class="form-control" name="password" required="">
				</div>

				<div class="col-lg-6">
					<label for="retype_password">Retype Password:</label> 
					<input type="password" placeholder="Retype password" class="form-control" name="retype_password" required="">
				</div>
			</div></div>


			<div>
				<button type ="submit" class="btn btn-primary" name="register" value="register">Register </button>

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
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>   -->
			</div><br>

			<div>
				<p>Already have an account? 
					<a href="login.php">Log in</a></p>
			</div>
		</form>

	</div>
</div>

<!--
<script>
  $('#myForm').on('submit', function(e){
  $('#myModal').modal('show');
  e.preventDefault();
});
</script>   -->
</body>
</html>

