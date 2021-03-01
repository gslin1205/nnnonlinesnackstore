<?php
		include ("dataconnection1.php") ;
		$cid=$_GET["pass"];
			$choose=mysqli_query($connect,"SELECT cpass from customer where cid=$cid");
			$rows=mysqli_fetch_assoc($choose);
		
?>
<!DOCTYPE html>
<html>
<head>
<style>
#resetfrm{background:white;
	height:auto;
	width:80%;
	margin:2% 2%;
	background:hsla(67, 95%, 95%, 1);
}

.demoInputBox{padding:7px; 
border:#F0F0F0 1px solid; 
border-radius:4px;
}

#password-strength-status { 
				border-radius:4px;
				margin-left:20px;
				margin-top:5px;}
.medium-password{color:#ffcc00;}

.weak-password{color:red;}

.strong-password{color:green;}

#resetfrm p{
	padding:20px;
}

#toggle_pwd1, #toggle_pwd2, #toggle_pwd3{
    margin-left: -36px;
    cursor: pointer;
	color:gray;
}

#resetfrm input[type=button], #resetfrm input[type=submit]{
	 background-color: #ff884d;
     border: none;
     color: white;
     padding: 10px 28px;
     text-decoration: none;
     margin: 4px 2px;
     cursor: pointer;
	 font-size: 16px;
}

#resetfrm input[type=button]:hover, input[type=submit]:hover{
	opacity:0.8;
	border-radius:5px;
	box-shadow: 3px 5px #ffffcc;
}

#resetfrm input:active{
 outline: none !important;
 border:2px solid #ff884d;
}

#resetfrm input[type=submit]:active{cursor: progress;}

</style>
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


</script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
</head>
<body>
<?php include"sidenavdashboard.php"; ?>
<div class="main">
<h2 style="margin-left:2%; ">Modify Password</h2>
	<form name="resetfrm" id="resetfrm" method="POST" action="" >
		<p>Current password &nbsp;: <input type="password" size="32" style="height:35px;" name="currentpass" id="currentpass" class="demoInputBox" size="30">  <span id="toggle_pwd1" class="fa fa-fw fa-eye fa-xs field_icon"></span></p>
		<p>New password &nbsp; &nbsp; &nbsp; : <input type="password" name="newpass" style="height:35px;" size="32" id="password" class="demoInputBox" onKeyUp="checkPasswordStrength();" value="" placeholder="eg. Ab123@" size="30"> <span id="toggle_pwd2" class="fa fa-fw fa-eye fa-xs field_icon"></span></p>
		<p>Confrim password &nbsp;: <input type="password" size="32" style="height:35px;" id="confirmpass" class="demoInputBox" name="confirm_password" value=""> <span id="toggle_pwd3" class="fa fa-fw fa-eye fa-xs field_icon"></span></p>
		<div id="password-strength-status"></div>
		<p><br><input type="submit" name="savebtn" value="Reset">
		<input type="button" name="back" onclick="cancel()" value="Back"></a></p>
	</form>
</div>
   <script type="text/javascript">
        $(function () {
            $("#toggle_pwd1").click(function () {
                $(this).toggleClass("fa-eye fa-eye-slash");
               var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
                $("#currentpass").attr("type", type);
            });
        });
		$(function () {
            $("#toggle_pwd2").click(function () {
                $(this).toggleClass("fa-eye fa-eye-slash");
               var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
                $("#password").attr("type", type);
            });
        });
		$(function () {
            $("#toggle_pwd3").click(function () {
                $(this).toggleClass("fa-eye fa-eye-slash");
               var type = $(this).hasClass("fa-eye-slash") ? "text" : "password";
                $("#confirmpass").attr("type", type);
            });
        });
		
		function cancel_test()
		{
			alert("Changes you made may not be saved.");	
		}
		function cancel()
		{
			var option2=confirm("You have unsaved changes; are you sure you want to leave this page?");

			if (option2) 
				window.location.href="dashboard.php";
			else{}
		}
    </script>
</body>
</html>
<?php 
if(isset($_POST['savebtn']))
{
	$currentp = $_POST["currentpass"];
	$newp = $_POST["newpass"];
	//$confirmp = $_POST["confirmpass"];

	$uppercase = preg_match('@[A-Z]@', $newp);
	$lowercase = preg_match('@[a-z]@', $newp);
	$number    = preg_match('@[0-9]@', $newp);
	$specialChars = preg_match('@[^\w]@', $newp);
	
	if($currentp!=$rows["cpass"]){
		echo "<script>alert('Current password invalid');</script>";
	}	
	else if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($newp) < 6) {
		echo "<script>alert('Password should be strong');</script>";
	}else if ($_POST["newpass"] != $_POST["confirm_password"]) {
		echo"<script>alert('Please make sure your password and confirm password are the same!');</script>";
	}
	else {
  
		$update= mysqli_query($connect, "UPDATE customer SET 	
												   cpass='$newp'							
												   WHERE cid=$cid");
		
		
		if($update)
		{
			echo "<script>alert('Dear user, your password is reset successfully!');window.location='dashboard.php';</script>";
		}
		else
		{
			echo "<script>alert('Reset failed!')</script>";
		}
	}
}
?>