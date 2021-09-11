
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Digital Blood Bank</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/updatedetails-style.css" >
</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php" style="font-weight: bold; color: red;">Digital Blood Bank</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto" >

     <li class="nav-item dropdown">
        <div class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          LogIn
        </div>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="login.php">Login</a>

          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="request.php">Request Blood</a>
        </div>
    </li>

      <li class="nav-item active">
        <a class="nav-link btn btn-success" href="register.php">Register</a>
      </li>
    </ul>
    </div>

</nav>
</body>


<?php
	
	session_start();

	$con = mysqli_connect('localhost:3307','root');

	mysqli_select_db($con, 'digitalbloodbank');

	$city_id = $_POST['city'];

  $query = mysqli_query($con, "SELECT city FROM cities WHERE city_id = $city_id");

  $row = mysqli_fetch_array($query);
  $city_name = $row['city']; 

	$result = mysqli_query($con, "SELECT * FROM bloodbanks WHERE city = '$city_name'");
    if($result)
    {
    	while($row = mysqli_fetch_array($result))
    	{
    		
?>

<body>
 
 <div class="container-fluid">
    <div class="row my-5">
      <div class="col-sm-12 col-md-6 mx-auto">
        <div class="card shadow text-center ">
          <div class="card-header" style= "background-color: lightgreen">
            <h2><?php echo $row["nameofBB"]; ?></h2>
          </div>
          <div class="card-body">
            <h4><b>Address :</b> <?= $row['address'] ?></h4>
            <h4><b>City :</b> <?= $row['city'] ?></h4>
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

 
  <footer>
  <div class="navbar-footer">
  <div class="p-2 bg-dark text-white">
      <center><a href="aboutus.php" class="text-white">@Digital Blood Bank</a></center>

  </div>
  </div>
</footer>
</body>
</html>
