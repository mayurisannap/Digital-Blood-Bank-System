<?php

  include("config-db.php");

  session_start();

  $email = $_SESSION['mail'];
  if($email){
?>


<!DOCTYPE.html>
<html>
<head>
	<title>Digital Blood Bank</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/homeafterlogin-style.css">
</head>


<body style="border: 5px solid transparent;">
    
    <!-- Navbar -->

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="homeafterlogin.php" style="font-weight: bold; color: #ffcccb;">Digital Blood Bank</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto" >
      <li class="nav-item active">
        <a class="nav-link" href="userprofile.php"><span class="fa fa-user"></span> Profile</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link btn btn-success" href="logout.php"><span class="fa fa-sign-out-alt"></span> Log out</a>
      </li>
    </ul>
    </div>
</nav>

<div class="jumbotron"> 
  <div class="text-center intro">
    <div class="intro-content">
      <div><b>Welcome to Digital Blood Bank!</b></div>
    </div>
  </div>
</div>



<!-- services section -->
  <section class = "my-3">
    <div class="py-3">
      <h2 class="text-center"><u>Services</u></h2>
    </div>

    <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-6">
                  <a href="nearby-BB.php" class="text-dark">
                  <div class="card">
                    <img class="card-img-top" src="images/location.jpg" alt="Locate Blood Banks">
                    <div class="card-body">
                      <h4 class="card-title text-center">Nearby Blood Banks</h4>
                      <p class="card-text text-center">Search blood banks near you</p>
                    </div>
                  </div></a>
                </div>

                <div class="col-md-3 col-sm-6 col-6">
                  <a href="DonationRequest.php" class="text-dark">
                  <div class="card">
                    <img class="card-img-top" src="images/donation request.jpeg" alt="Locate Blood Banks">
                    <div class="card-body">
                      <h4 class="card-title text-center">Online Donation Request</h4>
                      <p class="card-text text-center">Send request for donating blood</p>
                    </div>
                  </div></a>
                </div>

                 <div class="col-md-3 col-sm-6 col-6">
                  <a href="availablity.php" class="text-dark">
                  <div class="card">
                    <img class="card-img-top" src="images/available.jpeg" alt="Locate Blood Banks">
                    <div class="card-body">
                      <h4 class="card-title text-center">Blood Availability</h4>
                      <p class="card-text text-center">Check how much blood stock is available in bood banks near you!</p>
                    </div>
                  </div></a>
                </div>

                <div class="col-md-3 col-sm-6 col-6">
                  <a href="articles.php" class="text-dark">
                  <div class="card">
                    <img class="card-img-top" src="images/Blood drop.jpg" alt="Locate Blood Banks">
                    <div class="card-body">
                      <h4 class="card-title text-center">Articles</h4>
                      <p class="card-text text-center">Read more</p>
                    </div>
                  </div></a>
              </div>

    </div>
</div>
</section>
</body>


<footer>
  <div class="navbar-footer">
  <div class="p-2 bg-dark text-white">
    <center><a href="aboutus.php" class="text-white">@Digital Blood Bank</a></center>
  </div>
  </div>
</footer>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>

<?php
}
else{
  echo "Please Login First";
}