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

<body class="col-sm-12">
  <div class="container">
    <div class="row mt-4">
      <div class="col-md-8 mx-auto bg-light rounded p-4">
        <h5 class="text-center font-weight-bold">Donor Near You!</h5>
        <hr class="my-1">

        <form action="DonorSearchDetails.php" method="post" class="p-3">
          <div class="form-group">
          <label for="blood_group">Blood Group:</label> 
            <select name="blood_group" class="form-control" id="blood_group" >
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
                     }

                     else
                     {
                       echo '<option value="">State not available</option>';
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
              <input type="submit" name="submit" value="Search" class="btn btn-info btn-lg rounded-0">
            </div>
          </div>
          <br>

        </form>
    <!--  </div>  -->
      <div class="col-md-5" style="position: relative;margin-top: -38px;margin-left: 215px;">
        <div class="list-group" id="show-list">
          <!-- Here autocomplete list will be display -->
        </div>
      </div>
    </div>
  </div>


</body>

</html>