<!DOCTYPE.html>
<html>
  <head>
	<title>Digital Blood Bank</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

	

   
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
    <script src="jquery.min.js"></script>




      
	  
<script type="text/javascript">
$(document).ready(function(){
/*    $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'try_2.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>'); 
        }
    }); */
    
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

 
 <body>
 <div class="container">
    <div class="row profile">
		<div class="col-md-12">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC 
				
				<div class="profile-userpic">
				<img src="https://static.change.org/profile-img/default-user-profile.svg" class="img-responsive" alt="" >
				</div>
                
				 END SIDEBAR USERPIC -->
<form method="post">
				 <div class="wrapper">
					 <input type="file" class="my_file">
				 </div>
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						
					</div>
				
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<!--
				<div class="profile-userbuttons">
					<a href="requestpage.php">
					<button type="button" class="btn btn-primary btn-sm">Update Profile
					
					</button>
                    </a>
					
				</div> -->
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				
				<div class="profile-usermenu">
					
						
						
						<div class="form-group">
				           <label for="gender">Gender:</label> 
						   <select class="form-control">
                                 <option>Select gender</option><option value="O+ve">Male</option> <option value="Female">Female</option> <option value="Other">Other</option>
                           </select>
			            </div>
						<div class="form-group">
				           <label for="DOB">Date of Birth:</label> 
						   <input type="date" id="name" name="DOB" class="form-control">
			            </div>
						<div class="form-group">
				           <label for="number">Mobile Number:</label> 
						   <input type="number" id="name" name="MNUM" placeholder="Enter your number" class="form-control">
			            </div>
						<div class="form-group">
				           <label for="address">Address:</label> 
						   <input type="text" id="name" name="addresss" placeholder="Enter your name" class="form-control" required>
			            </div>

						<div class="form-group">
				           <label for="state">State:</label> 
						   <?php

                                  include('config-db.php');
                                  $query = mysqli_query($con,"SELECT * FROM state_list");
                           ?>
						   <select name="state" id="state" class="form-control" >
                             <option value="">Select Country</option>
                               <?php
                               if(mysqli_num_rows($query) > 0)
							   {
                                  while($row = mysqli_fetch_assoc($query))
								  { 
                                    echo '<option value="'.$row['state_id'].'">'.$row['state_name'].'</option>';


                                  }
                                }else{
                                      echo '<option value="">Country not available</option>';
                                }
                               ?>
                            </select>
                        </div>
						        

						<div class="form-group">
				           <label for="city">City:</label> 
						   <select name="city" id="city" class="form-control">
                              <option value="">Select state first</option>
                           </select>
			            </div>
						
						<div class="form-group">
				           <label for="blood_group">Blood Group:</label> 
						   <select class="form-control">
                             <option>Select Blood Group</option> <option value="O+ve">Male</option> <option value="Female">Female</option> <option value="Other">Other</option>
                           </select>
			            </div>
						<div class="row">
			             <div class=" mx-auto">
				         <button type="submit" class="btn btn-primary">Save</button>
						 <div>
			            </div>
					
				</div> 
				<!-- END MENU -->
			</div>
		</div>
	</div>
</div>
</form>
</div>

 </body>

	<!-- <div class="container w-50 m-auto">
		<div class="login-box">
		<h2 class="text-center">Donor Details</h2>
		<form action="updatecities-db.php" method="post">
			<div class="form-group">
				<div class="row">
					<div class="col-sm-4">
					<label for="name">Name:</label> </div>
                     <div><input type="text" id="name" name="name" placeholder="Enter your name" required>
                     </div>
                </div>	
			</div>
			<div class="form-group">
			<div class="row">
					<div class="col-sm-4">
				<label for="gender">Gender:</label> </div>
				<div>
					<select>
                <option></option> <option value="O+ve">Male</option> <option value="Female">Female</option> <option value="Other">Other</option>
            </select>	</div>
			</div>
            <div class="form-group">
			<div class="row">
					<div class="col-sm-4">
					<label for="dateofbirth">Date of Birth:</label> </div>
                    <div><input type="date" id="name" name="DOB" >	</div>
			</div><br>
            <div class="form-group">
			<div class="row">
					<div class="col-sm-4">
					<label for="mobilenumber">Mobile Number:</label> </div>
                    <div><input type="number" id="name" name="MNUM" placeholder="Enter your number" ></div>
			</div><br>
            <div class="form-group">
			<div class="row">
					<div class="col-sm-4">
					<label for="address">Address:</label> </div>
                    <div><input type="text" id="name" name="name" placeholder="Enter your name" required></div>
			</div><br>
            <div class="form-group">
			<div class="row">
					<div class="col-sm-4">
					<label for="state">State:</label> </div>
                    <div>
					

                                <select>
									
                                    ?>
                                </select></div>
			        </div><br>
            <div class="form-group">
			<div class="row">
					<div class="col-sm-4">
					<label for="city">District/City:</label> </div>
                    <div>
					</div>
			</div><br>
            <div class="form-group">
			<div class="row">
					<div class="col-sm-4">
					<label for="bbname">Blood Bank Name:</label> </div>
                    <div ><input type="text" id="name" name="BBN" placeholder="Enter " ></div>
			</div>
            <div class="form-group">
			<div class="row">
					<div class="col-sm-4">
					<label for="bloodgroup">Blood Group:</label> </div>
                    <div><select>
                <option></option> <option value="O+ve">Male</option> <option value="Female">Female</option> <option value="Other">Other</option>
            </select>	</div>
			</div><br>
			<div class="row">
			<div class="col-lg-6">
				<button type="submit" class="btn btn-primary">Save</button>
			</div>

			
		</form>
	</div>
	</div> -->

</html>