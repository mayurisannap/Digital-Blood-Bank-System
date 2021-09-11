<?php

session_start();
$bid=$_SESSION['bid'];

require_once("connection1.php");
if(isset($_GET['no']))
         {
             //$bid = $_GET['id'];
             $SrNo = $_GET['no'];
             $query = " delete from blood_stock3 where bid = '".$bid."' && SrNo ='".$SrNo."' ";
             $result = mysqli_query($con,$query);
             if($result)
             {
                $_SESSION['status']="Data Deleted successfully";
                $_SESSION['status_code']="success";
                 header("location:view.php?id=$bid");
             }
             else
             {
                 echo ' Please Check Your Query ';
             }
        }
         else
         {
             header("location:view.php?id=$bid ");
         }
         
?>
