
<html>

<head></head>
<body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>
<?php
    $bid = $_GET['id'];
    require_once("connection1.php");
    session_start();
    
    $SrNo=$_POST['SrNo'];
    $blood_group = $_POST['blood_group'];
    $Availability = $_POST['Availability'];

    if(isset($_POST['submit']))
    {
        if(empty($SrNo)  ||empty($blood_group) || empty($Availability) )
        {
            echo ' Please Fill in the Blanks ';
        }
        else
        {
            $query = " insert into blood_stock3 (SrNo,bid,blood_group, Availability) values('$SrNo','$bid',  '$blood_group','$Availability')";
            $result = mysqli_query($con,$query);

            if($result)
            {
                $_SESSION['status']="Data Inserted successfully";
                $_SESSION['status_code']="success";
                header("location:view.php?id=$bid");
            }
            else
            {
                $_SESSION['status']="Plaese check your query";
                $_SESSION['status_code']="error"; 
                header("location:view.php?id=$bid");
            }
        }
    }
    else
    {
        header("location:view.phpid=$bid");
    }
    
?>

