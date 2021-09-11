<?php

include('config-db.php');
session_start();
	$request_id = $_POST['request_id'];
	$email_of_donor = $_POST['email'];
	$name_BB = $_POST['name_BB'];
	$date_donation = $_POST['date_donation'];

	$email = mysqli_query($con, "SELECT * FROM userregistration WHERE email='$email_of_donor'");
	$email_row = mysqli_fetch_array($email);

	$donor_id = $email_row['id'];

	$res_message=mysqli_query($con,"INSERT INTO donation_history (donor_id, name_BB, date_donation, request_id) values ('$donor_id', '$name_BB', '$date_donation', '$request_id')" );

	$donated_update = mysqli_query($con,"UPDATE email_of_donor SET donated=1 WHERE email_of_donor='$email_of_donor' and request_id='$request_id'");

	echo "donated";

?>