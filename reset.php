<?php
session_start();
include("dataconnection1.php");

$email=$_GET['email'];
$result=mysqli_query($connect,"SELECT * from customer where cemail='$email'");

$row=mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>
<head>
<style>
body{width:610px;}
#resetfrm {border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.demoInputBox{padding:7px; border:#F0F0F0 1px solid; border-radius:4px;}
#password-strength-status {padding: 5px 10px;color: #FFFFFF; border-radius:4px;margin-top:5px;}
.medium-password{background-color: #E4DB11;border:#BBB418 1px solid;}
.weak-password{background-color: #FF6600;border:#AA4502 1px solid;}
.strong-password{background-color: #12CC1A;border:#0FA015 1px solid;}
#toggle_pwd1, #toggle_pwd2{
    margin-left: -36px;
    cursor: pointer;
	color:gray;
}

</style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript">
function checkPasswordStrength() {
	var number = /([0-9])/;
	var ualphabets = /([A-Z])/;
	var lalphabets = /([a-z])/;
	var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
	
	if($('#password').val().length<6 ) {
		$('#password-strength-status').removeClass();
		$('#password-strength-status').addClass('weak-password');
		$('#password-strength-status').html("Weak (atleast 6 characters, lowercase, uppercase, numbers and special characters.)");
	} else {  	
	    if($('#password').val().match(number) && $('#password').val().match(ualphabets)&& $('#password').val().match(lalphabets) && $('#password').val().match(special_characters)) {            
			$('#password-strength-status').removeClass();
			$('#password-strength-status').addClass('strong-password');
			$('#password-strength-status').html("Strong");
        } else {
			$('#password-strength-status').removeClass();
			$('#password-strength-status').addClass('medium-password');
			$('#password-strength-status').html("Medium (should include lower case, upper case, numbers and special characters.)");
        } 
	}
}


$(function () {
            $("#toggle_pwd1").click(function () {
                $(this).toggleClass("fa-eye fa-eye-slash");
               var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
                $("#password").attr("type", type);
            });
        });
$(function () {
            $("#toggle_pwd2").click(function () {
                $(this).toggleClass("fa-eye fa-eye-slash");
               var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
                $("#confirm_password").attr("type", type);
            });
        });
</script>
</head>

<body>
  

<h1>NNN Online Snack Store Reset Password</h1>
	<form name="resetfrm" id="resetfrm" method="POST" action="" >
		<p>Password:<input type="password" name="cpass" id="password" class="demoInputBox" onKeyUp="checkPasswordStrength();" value="" placeholder="eg. Ab123@" size="30">  <span id="toggle_pwd1" class="fa fa-fw fa-eye field_icon"></span></p> 
		<div id="password-strength-status"></div>
		<p>Confrim password:<input type="password" size="22" class="demoInputBox" id="confirm_password" name="confirm_password" value="">  <span id="toggle_pwd2" class="fa fa-fw fa-eye field_icon"></span></p> 
		<p><br><input type="submit" name="savebtn" value="Reset"></p>
	</form>
</body>

</html>

<?php 
if(isset($_POST['savebtn']))
{
	$password = $_POST["cpass"];

	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number    = preg_match('@[0-9]@', $password);
	$specialChars = preg_match('@[^\w]@', $password);

	if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 6) {
		echo "<script>alert('Password should be strong');</script>";
	}else if ($_POST["cpass"] != $_POST["confirm_password"]) {
		echo"<script>alert('Please make sure your password and confirm password are the same!');</script>";
	}
	else {
  
		$pass = $_POST["cpass"]; 	
		$update= mysqli_query($connect, "UPDATE customer SET 	
												   cpass='$pass'							
												   WHERE cemail='$email'");
		
		
		if($update)
		{
			echo "<script>alert('Dear user, your password is reset successfully!');window.location='login.php';</script>";
		}
		else
		{
			echo "<script>alert('Reset failed!')</script>";
		}
	}
}
?>