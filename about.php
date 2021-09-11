<!--
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Glyphicon Examples</h2>
  <p>Envelope icon: <span class="glyphicon glyphicon-envelope"></span></p>
  <p>Envelope icon as a link:
    <a href="#"><span class="glyphicon glyphicon-envelope"></span></a>
  </p>
  <p>Search icon: <span class="glyphicon glyphicon-search"></span></p>

    <p>Search icon: <span class="glyphicon glyphicon-user"></span></p>
  <p>Search icon on a button:
    <button type="button" class="btn btn-default">
      <span class="glyphicon glyphicon-search"></span> Search
    </button>
  </p>
  <p>Search icon on a styled button:
    <button type="button" class="btn btn-info">
      <span class="glyphicon glyphicon-search"></span> Search
    </button>
  </p>
  <p>Print icon: <span class="glyphicon glyphicon-print"></span></p>      
  <p>Print icon on a styled link button:
    <a href="#" class="btn btn-success btn-lg">
      <span class="glyphicon glyphicon-print"></span> Print 
    </a>
  </p> 
</div>

</body>
</html>

-->

<!DOCTYPE.html>
<html>
  <head>
  <title>Digital Blood Bank</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="css/up_2.css" >
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous"> 
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
    <script src="jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>




      
    
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
    });  */
    
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
            <h3>Donor Details</h3>
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
               <input type="number" id="name" name="MNUM" placeholder="Enter your number" class="form-control">
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
                   <label for="state">Country:</label> 
               <?php
                               //Include database configuration file
                                  <?php

                                  include('config-db.php');
                                  $query = mysqli_query($con,"SELECT * FROM state_list");
                                
                           ?>
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
        <!--    <div class="form-group">
                   <label for="state">State:</label> 
               <select name="state" id="state" class="form-control">
                              <option value="">Select country first</option>
                           </select>
                        </div>   -->
            <div class="form-group">
                   <label for="city">City:</label> 
               <select name="city" id="city" class="form-control">
                              <option value="">Select state first</option>
                           </select>
                  </div>
                        <div class="form-group">
                   <label for="blood_group">Blood Bank Name:</label> 
               <select class="form-control">
                             <option>Select Blood Group</option> <option value="O+ve">Male</option> <option value="Female">Female</option> <option value="Other">Other</option>
                           </select>
                        </div>
            <div class="form-group">
                   <label for="blood_group">Blood Group:</label> 
               <select class="form-control">
                             <option>Select Blood Group</option> <option value="O+ve">Male</option> <option value="Female">Female</option> <option value="Other">Other</option>
                           </select>
                  </div>
            <div class="row">
                   <div class="mx-auto">
                 <button type="submit" class="btn btn-primary" onclick="popup()" id="pop">Save</button>
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