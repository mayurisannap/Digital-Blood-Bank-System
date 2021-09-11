<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Digital Blood Bank</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/updatedetails-style.css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
$(document).on('click', '#send-request', function(){
        var email = $(this).val();

        localStorage.setItem("email_of_donor",email);
        window.location = 'BloodRequester_info.php';

      });
      </script>
</head>


<?php
  
  session_start();

  $con = mysqli_connect('localhost:3307','root');

  mysqli_select_db($con, 'digitalbloodbank');

  $city_id = $_POST['city'];
  $blood_group = $_POST['blood_group'];

  $query = mysqli_query($con, "SELECT city FROM cities WHERE city_id = $city_id");

  $row = mysqli_fetch_array($query);
  $city_name = $row['city']; 

  $result = mysqli_query($con, "SELECT * FROM userregistration 
      WHERE district = '$city_name' && bloodgroup='$blood_group'");
  
    if($result)
    {
      while($row = mysqli_fetch_array($result))
      {        
?>

<body>
 
 <div class="container-fluid">
    <div class="row my-5">
      <div class="col-sm-12 col-md-8 col-lg-6 mx-auto">
        <div class="card shadow text-center ">
          <div class="card-header" style= "background-color: lightgreen">
            <h2><?php 
              $firstname = $row['firstname']; 
              $lastname = $row['lastname'];
              echo ucfirst($firstname). " " .ucfirst($lastname);?>
            </h2>
          </div>
          <div class="card-body">
            <h4><b>Address :</b> <?= $row['address'] ?></h4>
            <h4><b>Blood Group :</b> <?= $row['bloodgroup'] ?></h4>

            <div class="row">
             <div class="mx-auto">
                <button type="submit" name="send-request" id="send-request" class="btn btn-primary" 
                <?php echo 'value="'.$row['email'].'"' ?>>Send Request </button>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </div> 
</div>


  <?php
  }
  }

  else{
    echo "No such city exists!!";
  }   
  ?>   





</body>
</html>