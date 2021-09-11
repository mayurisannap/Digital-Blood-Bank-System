<!DOCTYPE.html>
<html>
  <head>
	<title>Digital Blood Bank</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/login-style.css">
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

 
 <body>
 <div class="container">
 
    <div class="row profile">
		<div class="col-md-12">
        <div class="my">
        <h5 id="u"> <i class="fas fa-hand-holding-heart"></i>Online Donation Request</h5>
        </div>
			<div class="profile-sidebar">
            <h3 class="text-center">Donor Details</h3>
            <hr>
				
				<div class="profile-usermenu">
                        <div class="form-group">
				           <label for="name">Name:</label> 
						   <input type="text" id="name" name="name" placeholder="" class="form-control">
			            </div>

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
						   <input type="text" id="name" name="MNUM" placeholder="Enter your number" class="form-control" maxlength="10" required="">
			            </div>

						<div class="form-group">
				           <label for="address">Address:</label> 
						   <input type="text" id="name" name="addresss" placeholder="Enter your name" class="form-control" required>
			            </div>

                        <div class="form-group">
				           <label for="tdate">Tentative Date:</label> 
						   <input type="date" id="name" name="tdate" class="form-control">
			            </div>

						<div class="form-group">
                   <label for="state">State:</label> 
               <?php

                                  include('config-db.php');
                                  $query = mysqli_query($con,"SELECT * FROM state_list");
                                
                           ?>
               <select name="state" id="state" class="form-control" >
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

						<div class="row">
			             <div class=" mx-auto">
				         <button type="submit" class="btn btn-primary" onclick="popup()" id="pop">Send</button>
						 <div>
			            </div>
					
				</div> 
			
			</div>
		</div>
	</div>
</div>
</div>
<script>
        function popup(){
            swal({
                  title: "Request Sent Successfully!",
                  text: "",
                  icon: "success",
                  button: "Close",
                });

        }
</script>
 </body>

	
</html>