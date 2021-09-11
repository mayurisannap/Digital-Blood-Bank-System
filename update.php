<?php 

    require_once("connection1.php");

    session_start();
    $bid=$_SESSION['bid'];
    $SrNo = $_GET['no'];
    if(isset($_POST['update']) )
    {
        //$bid = $_GET['id'];
        
        $blood_group = $_POST['blood_group'];
        $Availability = $_POST['Availability'];
        

        $query = "UPDATE blood_stock3 set blood_group = '".$blood_group."', Availability='".$Availability."' where bid='".$bid."' && SrNo='".$SrNo."'" ;
        $result = mysqli_query($con,$query);

        if($result)
        {
            $_SESSION['status']="Data Updated successfully";
            $_SESSION['status_code']="success";
            header("location:view.php?id=$bid");
            
        }
        else
        {
            
            $_SESSION['status']="Data not inserted, check your query ";
            $_SESSION['status_code']="error";
            header("location:view.php?id=$bid");
        }
    }
    else
    {
        header("location:view.php?id=$bid");
    }

?>

