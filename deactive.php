<?php 

    require_once("connection1.php");

    session_start();
    $bid=$_SESSION['bid'];
    $ID = $_GET['id'];
    $action= "Deactive";

       // $query = "UPDATE camp2 set status = '".$status."' where bid='".$bid."' && SrNo='".$SrNo."'" ;
        $query1 = "UPDATE camp2 set status = '".$action."' where ID='".$ID."' " ;
        $result1 = mysqli_query($con,$query1);

        if($result1)
        {
            $_SESSION['status']="Deactivated successfully";
            $_SESSION['status_code']="success";
            header("location:camp_view.php?id=$bid");
            
        }
        else
        {
            
            $_SESSION['status']="check your query ";
            $_SESSION['status_code']="error";
            header("location:camp_view.php?id=$bid");
        }
    
?>

