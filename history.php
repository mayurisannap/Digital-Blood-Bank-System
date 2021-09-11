<?php

include('config-db.php');
session_start();
	$email = $_SESSION['mail'];

	$today = date("Y-m-d");
	$yesterday = date("Y-m-d", strtotime("-1 day"));

	$res_donor=mysqli_query($con,"SELECT * FROM userregistration WHERE email='$email' ");
	$donor_count=mysqli_num_rows($res_donor);
 
?>

<!DOCTYPE.html>
<html>
<head>
	<title>History</title>
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<link rel="stylesheet" href="css/userprofile-style.css" >
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style type="text/css">
	hr{
  
  width:100%;
  margin-left: auto;
  margin-right: auto;
  border-top:1px solid;
}

</style>

</head>

<body >
<div class="container-fluid">
    <div class="row my-5">
      <div class="col-sm-12 col-md-8 col-lg-6 mx-auto">
      	<h2 class="text-center"><strong>History</strong></h2>
      	<?php 
      	if($donor_count > 0){
		while($row = mysqli_fetch_assoc($res_donor)){
			$donor_id = $row['id'];

			$res_donation=mysqli_query($con,"SELECT * FROM donation_history WHERE donor_id='$donor_id' ORDER BY history_id desc");
			while($row_donation=mysqli_fetch_assoc($res_donation)){
				$request_id = $row_donation['request_id'];
			$name_BB = $row_donation['name_BB'];

			$res_request=mysqli_query($con,"SELECT * FROM email_of_donor WHERE request_id='$request_id' ");

			while($row_request=mysqli_fetch_assoc($res_request)){

				$name_request = $row_request['name'];
				$email_request = $row_request['email'];
				$donated = $row_request['donated'];
				if($row_request['donated']==1){
		?>
		<hr>
        <div class="card shadow ">
          <div class="card-header" style="color: purple">
			<h3><b>
				<?php
				if($row_donation['date_donation'] == $today){
	              echo "Today, "; }
	            elseif ($row_donation['date_donation'] == $yesterday) {
	            	echo "Yesterday, ";
	            }
	            echo date('d F Y', strtotime($row_donation['date_donation'])); ?>
            </b></h3>
          </div>

          <div class="card-body">
            <h4>You donated blood to : <?php echo $name_request ?> (<?php echo $row_request['email'] ?>) </h4>
            <h6>At "<?php echo $row_donation['name_BB'] ?>"<br>
            	On "<?php echo $row_donation['date_donation']  ?>" </h6>

            	<?php }  
      			else{ 
      		 		echo '<div class="text-center"> You don"t have any donation history! </div>';
		      	}	
		      	?>
			</div>     
		</div>


		<?php
			} } } }
		?>

       </div>
    </div>
 </div>  

</body>
</html>

