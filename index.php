<!DOCTYPE.html>
<html>
<head>
	<title>Digital Blood Bank</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>


<body style="border: 5px solid transparent;"> 
    
    <!-- Navbar -->
   
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php" style="font-weight: bold; color: red;">Digital Blood Bank</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto" >
      <li class="nav-item active">
        <a class="nav-link" href="aboutus.php">About Us<span class="sr-only">(current)</span></a>
      </li>


      <li class="nav-item dropdown">
        <div class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Services
        </div>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="nearby-BB.php">Nearby Blood Banks</a>
          <a class="dropdown-item" href="DonationRequest.php">Online Donation Request</a>
          <a class="dropdown-item" href="blood_availability01.php">Blood Availability</a>
          <a class="dropdown-item" href="camp_details.php">Active Blood Bank</a>
          <a class="dropdown-item" href="articles.php">Articles</a>
      </li>

     <li class="nav-item dropdown">
        <div class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Log In
        </div>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="login.php">User Login</a>

          <a class="dropdown-item" href="bloodbanklogin.php">Blood Bank Login</a>

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



<!-- Carousel (Adding Images) -->

<div id="demo" class="carousel slide" data-ride="carousel" style="border-bottom: solid;">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
  </ul>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/blood drop.jpg" alt="Digital Blood Bank" width="1100" height="500">
      <div class="carousel-caption">
        <h3 style="color: brown;">Digital Blood Bank</h3>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="images/donation request.jpeg" alt="Donate Blood, Save Lives" width="1100" height="500">
      <div class="carousel-caption">
        <h3 style="color: brown;">Donate Blood, Save Lives</h3>
      </div>   
    </div>  
  </div>

  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>


<!-- services section -->
	<section class = "my-3">
		<div class="py-3">
			<h2 class="text-center"><u>Services</u></h2>
		</div>

		<div class="container-fluid">
            <div class="row">
            <div class="col-md-1 col-sm-6 col-6">
                  
                </div>
                <div class="col-md-2 col-sm-6 col-6">
                  <div class="card">
                  <a href="index.php">
                    <img class="card-img-top" src="images/location.jpg" alt="Locate Blood Banks">
                    <div class="card-body">
                      <h4 class="card-title text-center">Nearby Blood Banks</h4>
                      <p class="card-text text-center">Search blood banks near you</p>
                    </div></a>
                  </div>
                </div>

                <div class="col-md-2 col-sm-6 col-6">
                  <div class="card">
                  <a href="onlinedonationrequest.php">
                    <img class="card-img-top" src="images/donation request.jpeg" alt="Locate Blood Banks">
                    <div class="card-body">
                      <h4 class="card-title text-center">Online Donation Request</h4>
                      <p class="card-text text-center">Send request for donating blood</p>
                    </div></a>
                  </div>
                </div>

                 <div class="col-md-2 col-sm-6 col-6">
                  <div class="card">
                  <a href="blood_availability01.php">
                    <img class="card-img-top" src="images/available.jpeg" alt="Locate Blood Banks">
                    <div class="card-body">
                      <h4 class="card-title text-center">Blood Availability</h4>
                      <p class="card-text text-center">Check how much blood stock is available in bood banks near you!</p>
                    </div>
                  </a>
                  </div>
                </div>
                <div class="col-md-2 col-sm-6 col-6">
                  <div class="card">
                  <a href="camp_details.php">
                    <img class="card-img-top" src="images/donation.jpg" >
                    <div class="card-body">
                      <h4 class="card-title text-center">Active Donation Camp</h4>
                      <p class="card-text text-center">Check active blood donation camps</p>
                    </div>
                  </a>
                  </div>
                </div>

                <div class="col-md-2 col-sm-6 col-6">
                  <div class="card">
                  <a href="index.php">
                    <img class="card-img-top" src="images/Blood drop.jpg" alt="Locate Blood Banks">
                    <div class="card-body">
                      <h4 class="card-title text-center">Articles</h4>
                      <p class="card-text text-center">Read more</p>
                    </div></a>
                  </div>
              </div>
              <div class="col-md-1 col-sm-8 col-6">
              </div>

    </div>
</div>
</section>



<footer>
	<div class="navbar-footer">
	<div class="p-2 bg-dark">
		<center><a href="aboutus.php" class="text-white">@Digital Blood Bank</a></center>
	</div>
	</div>
</footer>



   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

