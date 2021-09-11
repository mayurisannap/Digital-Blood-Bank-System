<?php 

    require_once("connection1.php");

    session_start();
    $bid=$_SESSION['bid'];
    if(isset($_POST['update']) )
    {
        $bname = $_POST['bname'];
        $email = $_POST['email'];
        $contact_no = $_POST['contact_no'];
        $state = $_POST['state'];
        $district = $_POST['district'];
        $address = $_POST['address'];
        
        $query = "UPDATE bloodbank2 set bname = '".$bname."', email='".$email."', contact_no='".$contact_no."', state='".$state."', district='".$district."', address='".$address."' where bid='".$bid."' " ;
        //$query = "UPDATE blood_stock3 set blood_group = '".$blood_group."', Availability='".$Availability."' where bid='".$bid."' && SrNo='".$SrNo."'" ;
        $result = mysqli_query($con,$query);

        if($result)
        {
            $_SESSION['status']="Data Updated successfully";
            $_SESSION['status_code']="success";
            header("location:edit_profile.php?id=$bid");
            
        }
        else
        {
            
            $_SESSION['status']="Data not inserted, check your query ";
            $_SESSION['status_code']="error";
            header("location:edit_profile.php?id=$bid");
        }
    }
    else
    {
        header("location:edit_profile.php?id=$bid");
    }

?>

