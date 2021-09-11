<?php

include('config-db.php');
session_start();
$email = $_SESSION['mail'];

mysqli_query($con,"update email_of_donor set request_status=1 where to_id=$uid");
?>