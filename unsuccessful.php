<?php 

    require_once("connection1.php");

    session_start();
    $bid=$_SESSION['bid'];
    $SrNo = $_GET['no'];
   // if(isset($_POST['update']) )
    {
        
        $action="Unsuccessful";
        $query = "UPDATE donation_request set action = '".$action."' where bid='".$bid."' && SrNo='".$SrNo."'" ;
        $result = mysqli_query($con,$query);
        
        $query1 = "select * from donation_request where bid='".$bid."' && SrNo='".$SrNo."'" ;
        $result1 = mysqli_query($con,$query1);

        while($row=mysqli_fetch_assoc($result1))
        {
        
            $name = $row['name'];
            $tdate =$row['tdate'];
            $email =$row['email'];
        }

        $query2 = "select * from bloodbank2 where bid='".$bid."'" ;
        $result2 = mysqli_query($con,$query2);

        while($row=mysqli_fetch_assoc($result2))
        {
        
            $bname = $row['bname'];
            
        }

        if($result)
        {
            
                $_SESSION['status']="Marked as Unsuccessful";
                $_SESSION['status_code']="success";
                header("location:approved_donors.php?id=$bid");
           
            
        }
        else
        {
            
            $_SESSION['status']="Data not Fetched, check your query ";
            $_SESSION['status_code']="error";
            header("location:approved.php?id=$bid");
        }
    }
   /* else
    {
        header("location:pending.php?id=$bid");
    }
    */
?>

