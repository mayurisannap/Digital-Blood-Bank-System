<?php
session_start();
?>

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
    $('#country').on('change',function(){
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
    });
    
    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'try_2.php',
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
            <form action="donationrequest.php" method='post'>
      <div class="profile-sidebar">
            <h3>Donor Details</h3>
            <hr>
        <div class="profile-usermenu">
                        <div class="form-group">
                   <label for="name">Name:</label> 
               <input type="text" id="name" name="name" placeholder="Enter your Full Name" class="form-control">
                  </div>

                        <div class="form-group">
                   <label for="email">Email Address:</label> 
               <input type="email" name="email" placeholder="Enter your email ID" class="form-control">
                  </div>

            <div class="form-group">
                   <label for="gender">Gender:</label> 
               <select name="gender" id="gender" class="form-control">
                                 <option>Select gender</option>
                                 <option value="Male">Male</option> 
                                 <option value="Female">Female</option> 
                                 <option value="Other">Other</option>
                           </select>
                  </div>
            <div class="form-group">
                   <label for="DOB">Date of Birth:</label> 
               <input type="date" id="DOB" name="DOB" class="form-control">
                  </div>
            <div class="form-group">
                   <label for="number">Mobile Number:</label> 
               <input type="number" id="MNUM" name="MNUM" placeholder="Enter your number" class="form-control">
                  </div>
            <div class="form-group">
                   <label for="address">Address:</label> 
               <input type="text" id="address" name="address" placeholder="Enter your address" class="form-control" required>
                  </div>
                        <div class="form-group">
                   <label for="tdate">Tentative Date:</label> 
               <input type="date" id="tdate" name="tdate" class="form-control">
                  </div>
            
                    

    
            <div class="form-group">
                   <label for="state">State:</label> 
               <select name="state" id="state" class="form-control">
                              <option value="">Select State</option>
                              
                                
                                <option value="Maharashtra">Maharashtra</option>
                                
                              
                           </select>
                        </div>

            <div class="form-group">
                   <label for="city">City:</label> 
               <select name="city" id="city" class="form-control">
                                <option value="">Select city</option>              
                                <option value="Ahmadnagar">Ahmadnagar</option>
                                <option value="Akola">Akola</option> 
                                <option value="Aurangabad">Aurangabad</option>
                                <option value="Beed">Beed</option>
                                <option value="Bhandara">Bhandara</option>
                                <option value="Buldhana">Buldhana</option>
                                <option value="Chandrapur">Chandrapur</option>
                                <option value="Dhule">Dhule</option>
                                <option value="Gadchiroli">Gadchiroli</option>
                                <option value="Gondia">Gondia</option> 
                                <option value="Hingoli">Hingoli</option>
                                <option value="Jalgoan">Jalgoan</option>
                                <option value="Jalna">Jalna</option>
                                <option value="Kolhapur">Kolhapur</option>
                                <option value="Latur">Latur</option>
                                <option value="Mumbai City">Panjab</option>
                                <option value="Nagpur">Nagpur</option>
                                <option value="Nanded">Nanded</option> 
                                <option value="Nandurbar">Nandurbar</option>
                                <option value="Nashik">Nashik</option>
                                <option value="Osmanabad">Osmanabad</option>
                                <option value="Palghar">Palghar</option>
                                <option value="Parbhani">Parbhani</option>
                                <option value="Pune">Pune</option>
                                <option value="Raigad">Raigad</option>
                                <option value="Ratnagiri">Ratnagiri</option>
                                <option value="Sangli">Sangli</option>
                                <option value="Satara">Satara</option>
                                <option value="Sindhudurg">Sindhudurg</option> 
                                <option value="Solapur">Solapur</option>
                                <option value="Thane">Thane</option>
                                <option value="Wardha">Wardha</option>
                                <option value="Washim">Washim</option>
                                <option value="Yavatmal">Yavatmal</option>
                                
                           </select>
                  </div>
                        <div class="form-group">
                   <label for="bid">Blood Bank Name For Donation:</label> 
               <?php
                                  include('connection1.php');
                                  $query = ("SELECT * FROM bloodbank2  ORDER BY bname");
                                  $result = mysqli_query($con,$query);
                                  $rowCount = mysqli_num_rows($result);;
                           ?>
               <select name="bid" id="bid" class="form-control" >
                             <option value="">Select Blood Bank</option>
                               <?php
                               if($rowCount > 0)
                 {
                                  while($row=mysqli_fetch_assoc($result))
                  { 
                                    echo '<option value="'.$row['bid'].'">'.$row['bname'].'</option>';
                                  }
                                }else{
                                      echo '<option value="">Blood Bank not available</option>';
                                }
                               ?>
                            </select>
            </div>

            <div class="form-group">
                   <label for="blood_group">Blood Group:</label> 
               <select name="blood_group" id="blood_group" class="form-control">
                             <option>Select Blood Group</option> 
                            
                             <option value="A+">A+</option> 
                             <option value="B+">B+</option>
                             <option value="AB+">AB+</option> 
                             <option value="O+">O+</option>
                             <option value="A-">A-</option>
                             <option value="B-">B-</option>
                             <option value="AB-">AB-</option>
                             <option value="O-">O-</option>
                           </select>
                  </div>
            <div class="row">
                   <div class=" mx-auto">
                 <button type="submit" name="submit2" class="btn btn-primary" id="pop">Send</button>
                        </div></div>
        </div>
      </div></div></form>
  </div></div></div>
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
 </body></html>

 <?php
if (isset($_SESSION['status']) && $_SESSION['status']!=''){
    ?>
    <script >        
        swal({
                title: "<?php echo $_SESSION['status']?>",
                icon: "<?php echo $_SESSION['status_code']?>",
                button: "OK, Done",
        });
    </script>
    <?php
    unset($_SESSION['status']);
}
?>
