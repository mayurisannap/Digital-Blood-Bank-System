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
    $camp_name = $_POST['camp_name'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $stime = $_POST['stime'];
    $etime = $_POST['etime'];

    if(isset($_POST['submit']))
    {
            $query = " insert into camp2 (SrNo,bid,camp_name, address, date, stime, etime) values('$SrNo','$bid', '$camp_name','$address','$date','$stime','$etime')";
            $result = mysqli_query($con,$query);
            if($result)
            {
                $_SESSION['status']="Camp Added successfully";
                $_SESSION['status_code']="success";
                header("location:camp_view.php?id=$bid");
            }
            else
            {
                $_SESSION['status']="Plaese check your query";
                $_SESSION['status_code']="error"; 
                header("location:camp_view.php?id=$bid");
            }
    }
    else
    {
        header("location:view.phpid=$bid");
    }
    
?>

