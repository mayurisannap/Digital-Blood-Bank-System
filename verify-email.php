<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Verify Email</title>
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<style type="text/css">
	body{
		background-color: #dfcaa5;
	}
	
	.login-form {
		width: 340px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn-1 {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
<body>
<div class="login-form">
    <form method="post">
    	<div style="border-bottom: 1px solid;">
        <h3 class="text-center" style="font-weight: bold">Verify your Email ID!</h3>    </div> 
        <div style="margin-top: 20px"> 
        <div class="form-group first_box">
        	<label for="email" style="font-size: 17px; font-weight: normal">Enter Email:</label> 
            <input type="text" id="email" name="email" class="form-control" placeholder="Email" required="required">
			<span id="email_error" class="field_error"></span>
        </div>
        <div class="form-group first_box">
            <button type="button" class="btn btn-primary btn-block" onclick="send_otp()">Send OTP</button>
        </div>
        <div class="form-group second_box">
        	<label for="otp" style="font-size: 17px; font-weight: normal">Enter OTP:</label> 
            <input type="text" id="otp" class="form-control" placeholder="OTP" required="required">
			<span id="otp_error" class="field_error"></span>
        </div>
        <div class="form-group second_box">
            <button type="button" class="btn btn-primary btn-block" onclick="submit_otp()">Submit OTP</button>
        </div>  
        </div>     
    </form>
</div>
<script>
function send_otp(){
	var email=jQuery('#email').val();
	jQuery.ajax({
		url:'send_otp_email.php',
		type:'post',
		data:'email='+email,
		success:function(result){
			jQuery('#email_error').html('OTP sent');

			setTimeout(function(){
			jQuery('.second_box').show();
			jQuery('.first_box').hide();}, 5000);
			
			if(result=='not_exist'){
				jQuery('#email_error').html('Please enter valid email');
			}
		}
	});
}

function submit_otp(){
	var otp=jQuery('#otp').val();
	jQuery.ajax({
		url:'check_otp.php',
		type:'post',
		data:'otp='+otp,
		success:function(result){
			if(result=='yes'){
				window.location='login.php'
			}
			if(result=='not_exist'){
				jQuery('#otp_error').html('Please enter valid otp');
			}
		}
	});
}
</script>
<style>
.second_box{display:none;}
.field_error{color:red;}
</style>
</body>
</html>                                		                            