<?php 
	include_once('updatedetails-db.php');
	
	$email = $_SESSION['mail'];

	$result = mysqli_query($con, "SELECT firstname, lastname, bloodgroup, address, gender, mobile, dob, profile_image, state, district FROM userregistration WHERE email = '$email'" );
	$row = mysqli_fetch_array($result);
	$firstname = $row['firstname'];	
	$lastname = $row['lastname'];
	$mobile = $row['mobile'];
	$gender = $row['gender'];
	$address = $row['address'];
	$blood_group = $row['bloodgroup'];
	$dob = $row['dob'];
	$profile = $row['profile_image'];
	$state = $row['state'];
	$city = $row['district'];


?>



<!DOCTYPE.html>
<html>
<head>

	<title>Digital Blood Bank</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


<link rel="stylesheet" href="css/updatedetails-style.css" >

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
  <script src="jquery.min.js"></script>


</head>


 <body>

 <nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="homeafterlogin.php" style="font-weight: bold; color: #ffcccb;">Digital Blood Bank</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto" >

      <li class="nav-item active">
        <a class="nav-link btn btn-success" href="logout.php"><span class="fa fa-sign-out-alt"></span> Log out</a>
      </li>
    </ul>
    </div>
</nav>


 <div class="container">
    <div class="row profile">
		<div class="col-md-12">
			<div class="profile-sidebar">

		<form method="post" enctype="multipart/form-data">
			<div class="form-group wrapper" >
            <span class="img-div"> 
              <img src= "<?php
              	echo 'uploaded_images/' . $profile; ?>" height="300px" width="300px" 
              	onClick="triggerClick()" id="profileDisplay">
            </span>

            	<input type="file" name="profile" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;" >
          </div>  
						  
					
						<div class="form-group">
				           <label for="firstname">First Name:</label> 
				          <input type="text" placeholder="Enter your first name" class="form-control" name="firstname" 
				          value="<?php 
				          if(isset($firstname)) {echo ucfirst($firstname);} ?>" required="">
			            </div>  

			            <div class="form-group">
				           <label for="lastname">Last Name:</label> 
				          <input type="text" placeholder="Enter your last name" class="form-control" name="lastname" value="<?php 
				          if(isset($lastname)) echo ucfirst($lastname); ?>" required="">
			            </div>    

			            <div class="form-group">
				           <label for="gender">Gender:</label> 
						   <input type="text" id="gender" name="gender" class="form-control" value="<?php echo $gender;?>" disabled>
			            </div>

					<!--	<div class="form-group">
				           <label for="gender">Gender:</label> 
						   <select class="form-control" name="gender">
                                 <option>Select gender</option><option value="Male">Male</option> <option value="Female">Female</option> <option value="Other">Other</option>
                           </select>
			            </div>    --> 

						<div class="form-group">
				           <label for="DOB">Date of Birth:</label> 
						   <input type="date" id="DOB" name="DOB" class="form-control" 
						   	value="<?php if(isset($dob)) echo $dob;?>" required>
			            </div>

						<div class="form-group">
				           <label for="mobilenumber">Mobile Number:</label> 
						   <input type="text" id="mobilenumber" name="mobilenumber" placeholder="Enter your number" class="form-control" maxlength="10" 
						   value="<?php if(isset($mobile)) echo $mobile;?>" required>
			            </div>

						<div class="form-group">
				           <label for="address">Address:</label> 
						   <input type="text" id="address" name="address" placeholder="Enter your name" class="form-control" value="<?php if(isset($address)) echo $address;?>"  required>
			            </div>

			            <div class="form-group">
				           <label for="blood_group">Address:</label> 
						   <input type="text" class="form-control" value="<?php echo $blood_group;?>" disabled>
			            </div>

					<!--	<div class="form-group">
				           <label for="blood_group">Blood Group:</label> 
						<select name="blood_group" class="form-control" id="blood_group"> 
							
						
						<?php //if($blood_group) { ?>
					       <option><?php //echo $blood_group; ?></option>
					      <option>A+</option>
					      <option>B+</option>
					      <option>AB+</option>
					      <option>O+</option>
					      <option>A-</option>
					      <option>B-</option>
					      <option>AB-</option>
					      <option>O-</option> 
					  <?php // } else{ ?>
					  	  <option>Select blood group</option>
					  	  <option>A+</option>
					      <option>B+</option>
					      <option>AB+</option>
					      <option>O+</option>
					      <option>A-</option>
					      <option>B-</option>
					      <option>AB-</option>
					      <option>O-</option> 
					  <?php// } ?>
					   	</select>  
			            </div>    -->

			        <div class="form-group">
						<div class="row">
			       
			             <div class="ml-auto">
				         	<button type="submit" name="save-user" class="btn btn-primary">Save</button>
				     	</div>

				     	<div class="col-sm-6">
				         	<button type="submit" name="save-user" class="btn"> <a style="color: red;" href="userprofile.php">Cancel</a></button>
				     	</div>
			            </div>
			        </div>
			    </form>
					
			</div>
		</div>
	</div>
</div>



 </body>

<footer>
  <div class="navbar-footer">
  <div class="p-2 bg-dark text-white">
    <center>@Digital Blood Bank</center>
  </div>
  </div>
</footer>
 </html>

 <script src="scripts.js"></script>
