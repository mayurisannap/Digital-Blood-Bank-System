

<?php
	//include("validation-db.php");

	$msg = "";
  	$msg_class = "";

	session_start();


	//from userprofile
	$email = $_SESSION['mail'];
	//print_r($email);
////////

	$con = mysqli_connect('localhost:3307','root');

	mysqli_select_db($con, 'digitalbloodbank'); 


	if (isset($_POST['save-user'])) {

    // for the database


//	$name_user = $_POST['name_user'];
//	$gender = $_POST['gender'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
	$dob = $_POST['DOB'];
	$mobile = $_POST['mobilenumber'];
	$address = $_POST['address'];
//  $city = $_POST['city'];
//  $state = $_POST['state'];
//	$bloodgroup = $_POST['blood_group'];
//	$profile_image = $_POST['profile'];


    $profileImageName = time() . '-' . $_FILES["profile"]["name"];
    // For image upload
    $target_dir = "uploaded_images/";
    $target_file = $target_dir . basename($profileImageName);
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['profile']['size'] > 200000) {
      echo "<script>alert('Image size should not be greated than 200Kb..')</script> ";
    }
    // check if file exists
    if(file_exists($target_file)) {
      echo "<script>alert('File already exists..')</script> ";
    }
    // Upload image only if no errors
    if (empty($error)) {
      if(move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file)) {
        $sql = "UPDATE userregistration SET firstname = '$firstname', lastname = '$lastname', profile_image='$profileImageName', 
        		dob='$dob', mobile='$mobile', address='$address' 
            WHERE email = '$email'";

        print_r( "$sql");
        if(mysqli_query($con, $sql)){

          header("location: userprofile.php");
        }
         else {
         	echo "<script>alert('There was an error in the database..')</script> ";
        }
      }
       else {
         	echo "<script>alert('There was an error uploading the file..')</script> ";

      }
    }
  }
