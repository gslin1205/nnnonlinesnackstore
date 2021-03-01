<?php
include"dataconnection1.php";

if(isset($_POST['submit'])) {
	
	$fname = $_POST["cfname"];  	
	$lname = $_POST["clname"];
	$gender = $_POST["cgender"];
	$pass = $_POST["cpass"];  	
	$email = $_POST["cemail"];  	

	$sql1=mysqli_query($connect,"SELECT * from customer where cemail='$email'");
	
	/* Password Matching Validation */
	$password = $_POST["cpass"];

	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number    = preg_match('@[0-9]@', $password);
	$specialChars = preg_match('@[^\w]@', $password);
	if(empty($_POST["cfname"] && $_POST["clname"])) 
	{
		echo "<script>alert('Please fill first name and last name');</script>";
	}
	else if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 6) {
		echo "<script>alert('Password should be strong');</script>";
	}else if ($_POST["cpass"] != $_POST["confirm_password"]) 
	{
		echo"<script>alert('Please make sure your password and confirm password are the same!');</script>";
	}/* Email Matching Validation */
	else if(!filter_var($_POST["cemail"], FILTER_VALIDATE_EMAIL)){
		echo"<script> alert('Please fill an valid email.'); </script>";
	}
	else if(mysqli_num_rows($sql1)>0){
		echo"<script> alert('Email already used. Please change.'); </script>";
	}
	else if(empty($_POST["term"])){
		echo "<script>alert('Accept Terms and conditions before register');</script>";
	}
	else{
		require_once("dataconnection.php");
		$db_handle = new DBController();
		$query = "SELECT * FROM customer where cemail = '" . $_POST["cemail"] . "'";
		$count = $db_handle->numRows($query);
		
		if($count==0) {
			$query = "INSERT INTO customer (cfname, clname, cpass, cemail, cgender) VALUES
			( '" . $_POST["cfname"] . "', '" . $_POST["clname"] . "', '" . $_POST["cpass"] . "', '" . $_POST["cemail"] . "', '" . $_POST["cgender"] . "')";
			$current_id = $db_handle->insertQuery($query);
			if(!empty($current_id)) {
				$actual_link = "http://localhost/FYP/activate.php?id=" . $current_id;  //follow your xampp to change the link location
				$toEmail = $_POST["cemail"];
				$subject = "NNN Online Snack Store User Register Activation";
				$content = "Click this link to activate your account.        " . $actual_link ;
				$mailHeaders = "From: NNN Online Snacks Store<stackstorennn@gmail.com>\r\n";
				if(mail($toEmail, $subject, $content, $mailHeaders)) {
					 echo"<script> alert('You have registered and the activation link is sent to your email. Click the activation link to activate you NNN account'); </script>";	
					$type = "success";
				
				}
				unset($_POST);
			} else {
				echo"<script> alert('Problem in registration. Try Again!'); </script>";
			}
		} 
	}
}	
	
?>
<html>
<head>
<style>
body{ margin-top:130px;
      font-size:16px;
	  width: 100%;
      height: 100vh;
      background: url("timg/bg3.jpg") center no-repeat;
      background-size: cover;
      position: relative;
	  color:white;
	  }
	   
fieldset{border: 1px solid clear;
		box-shadow: 3px 6px #2fb6a9;
		width: 720px;
		margin-left:20px;
		border-radius: 25px;
		opacity:0.9;}
	
h1{
  text-decoration: underline;
  -webkit-text-decoration-color:  #1f7a71;
  text-decoration-color:  #1f7a71;
  -webkit-text-decoration-style: wavy;
  text-decoration-style: wavy;
}

#registerfrm {
			  padding:10px; 
			  }

.demoInputBox{padding:7px; 
			  border:#F0F0F0 1px solid; 
			  border-radius:4px;}

#password-strength-status {padding: 5px 10px;color: #FFFFFF; 
							border-radius:4px;
							margin-top:5px;}

.medium-password{background-color: #E4DB11;
				 border:#BBB418 1px solid;}

.weak-password{background-color: #FF6600;
			   border:#AA4502 1px solid;}

.strong-password{background-color: #12CC1A;
				 border:#0FA015 1px solid;}

.wrap {
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-top:30px;
}

.btnRegister {
  min-width: 250px;
  min-height: 50px;
  font-family: 'Nunito', sans-serif;
  font-size: 22px;
  text-transform: uppercase;
  letter-spacing: 1.3px;
  font-weight: 700;
  color: #313133;
  background: #4FD1C5;
  background: linear-gradient(90deg, rgba(129,230,217,1) 0%, rgba(79,209,197,1) 100%);
  border: none;
  border-radius: 1000px;
  box-shadow: 12px 12px 24px rgba(79,209,197,.64);
  transition: all 0.3s ease-in-out 0s;
  cursor: pointer;
  outline: none;
  position: relative;
  padding: 10px;
  }

.btnRegister::before {
  content: '';
  border-radius: 1000px;
  min-width: calc(300px + 12px);
  min-height: calc(60px + 12px);
  border: 6px solid #00FFCB;
  box-shadow: 0 0 60px rgba(0,255,203,.64);
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  opacity: 0;
  transition: all .3s ease-in-out 0s;
}

.btnRegister:hover, .btnRegister:focus {
  color: #313133;
  background:#2fb6a9;
  transform: translateY(-6px);
}

.bottom{
	margin-top:40px;
	text-align:right;
	font-family:"Brush Script MT", monospace;
}

#toggle_pwd1, #toggle_pwd2{
    margin-left: -30px;
    cursor: pointer;
	color:gray;
}

.popup .content input[type=submit]{
		 background-color:#1f7a71;
     border: none;
     color: white;
     padding: 8px;
     text-decoration: none;
     margin: 4px 2px;
     cursor: pointer;
}

.popup .content input[type=submit]:hover{
	 opacity:0.8;
}
</style>
<title>NNN User Registration Form</title>
<link rel="stylesheet" type="text/css" href="css/login.css"></link>
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
                $("#confirmpass").attr("type", type);
            });
        });
</script>
</head>
<body>
<form name="registerfrm" id="registerfrm" method="POST" action="">
<fieldset style="width:720px; "><br>
<h1 style="text-align:center; letter-spacing: 1px;">Register</h1>
<div style="margin-top:50px;">
<p><span style="margin: 0 10px"></span>
<b>First Name</b>
<input type="text" class="demoInputBox" name="cfname" size="22"  value="<?php if(isset($_POST['cfname'])) echo $_POST['cfname']; ?>">

<span style="margin: 0 22px"></span><b>Last Name</b>
<input type="text" class="demoInputBox" name="clname" size="28"  value="<?php if(isset($_POST['clname'])) echo $_POST['clname']; ?>">
</p>
<br>
<p><span style="margin: 0 10px"></span><b>
Password</b>
<input type="password" name="cpass" size="23" id="password"  class="demoInputBox" onKeyUp="checkPasswordStrength();" value=""> <span id="toggle_pwd1" class="fa fa-fw fa-eye field_icon"></span>

<span style="margin: 0 23px"></span><b>Confirm Password</b>
<input type="password" name="confirm_password" id="confirmpass" class="demoInputBox" value=""> <span id="toggle_pwd2" class="fa fa-fw fa-eye field_icon"></span>
<div id="password-strength-status"></div>
</p>

<p><span style="margin: 0 10px"></span><b>
Email</b>
<input type="text" name="cemail" size="28" class="demoInputBox"  value="<?php if(isset($_POST['cemail'])) echo $_POST['cemail']; ?>">

<span style="margin: 0 20px"></span><b>Gender</b>
<span style="margin: 0 15px"></span><input type="radio" name="cgender" value="Male" required checked <?php if(isset($_POST['cgender']) && $_POST['cgender']=="Male") { ?>checked<?php  } ?>> Male
<span style="margin: 0 8px"></span><input type="radio" name="cgender" value="Female" required  <?php if(isset($_POST['cgender']) && $_POST['cgender']=="Female") { ?>checked<?php  } ?>> Female
<span style="margin: 0 8px"></span><input type="radio" name="cgender" value="Secret" required <?php if(isset($_POST['cgender']) && $_POST['cgender']=="Secret") { ?>checked<?php  } ?>> Secret
</p><br><br>
<p><span style="margin: 0 10px"></span><textarea name="term" cols="90" rows="12" style="text-align:justify; resize:none;"><b>TERMS AND CONDITIONS</b>
By using this website you agree to comply with and be bound by the terms and provisions set out below including the disclaimer and jurisdictional clause. Please read these carefully before proceeding and then print a copy for future reference. If you do not agree to these terms and conditions and the Privacy Policy, do not use this website.

USER REGISTRATION
You may be required to register with the Site. You agree to keep your password confidential and will be responsible for all use of your account and password. We reserve the right to remove, reclaim, or change a username you select if we determine, in our sole discretion, that such username is inappropriate, obscene, or otherwise objectionable.

1. PERSONAL USE ONLY
You may make personal use of all of the information ("Information") you access on this Web Site, but you may not take any of the Information and reformat and display it, or copy it on your Web site, and you may not store or migrate any of the Information or other data from this website without ISM's written permission. By using the Service, you agree not to sell, store, distribute, transmit, display, reproduce, modify, migrate, create derivative works from, or otherwise exploit any of the Information content or data related to any portion of the Service. You may print a copy of particular information and use the Information for your personal, non-commercial use, but you may not otherwise reproduce any material appearing on this website. If you want to make commercial use of the ISM Information or Services, you must enter into an agreement with us to do so in advance.

2. MODIFICATIONS AND TERMINATION OF SERVICE
ISM reserves the right at any time and from time to time to modify, update, suspend or discontinue all or part of the Service with or without notice to you. You agree that ISM will not be liable to you for any modification, suspension or discontinuance of the Service. You agree that ISM may, under some circumstances and without prior notice to you, terminate your use of and access to the Service. Some of the reasons for such termination may include, but not be limited to, (a) a breach or violation of the Terms and Conditions or other incorporated agreements or guidelines, (b) a request by law enforcement or another government agency, (c) our decision to discontinue or change all or part of the Service or how we choose to provide it, (d) technical or security issues or problems, and/or (e) fraudulent or illegal activities. All terminations will be made in ISM's sole discretion and you agree that ISM will not be liable for any termination of your use of or access to the Service.

3. YOUR DEALINGS WITH THIS WEBSITE'S ADVERTISERS
Your correspondence or business dealings with, or participation in promotions of, advertisers found on or through the Service, including payment and delivery of related goods or services, and any other terms, conditions, warranties or representations associated with such dealings, are solely between you and such advertiser. You acknowledge and agree that ISM will not be responsible or liable for any loss or damage of any sort incurred as the result of any such dealings or as the result of the presence of such advertisers on the Service.

4. LINKS TO OTHER WEBSITES
ISM provides links to other Web sites. You acknowledge and agree that, because ISM has no control over such sites, we are not responsible for them or the resources and information they contain. In particular, we are not responsible for the availability of services related to another Web site that has a link on This website; we do not necessarily endorse such sites, and we are not responsible or liable for any content, advertising, products or other materials on or available from such sites. You further acknowledge and agree that ISM will not be liable for any loss whatsoever for any damages caused by or incurred in connection with the use of or reliance on the information, goods or services available through any such site.

5. THIS WEBSITE PROPRIETARY RIGHTS
You acknowledge and agree that the Service and all materials on this website contain proprietary and confidential information that is protected by applicable copyright, trademark and other intellectual property laws (ISM's "Proprietary Information"). All materials on this website, including such Proprietary Information, may only be used for personal, non-commercial purposes, and you agree not to sell, transfer, reproduce, duplicate, distribute, publish, modify, migrate, store, copy or transmit any material from This website unless and until you have obtained our prior written consent. The Proprietary Information covered by this prohibition includes, without limitation, the software programming and html and other code contained in the Web site, Vehicle Values, Claims History information, compilations of Policy data, any text, graphics, logos, photographs from material available on this Web site.

6. NO ILLEGAL USE
As a condition of your use of and access to this website, you agree not to use the Services for any unlawful purpose or in any way that violates these Terms & Conditions. You also agree not to use the Services in any way that could damage, disable, overburden, or impair the Web site or any ISM server, or the associated networks, or interfere with any other party's use and enjoyment of any Services.

7. DISCLAIMER OF WARRANTIES:
You expressly understand and agree that:

a.Your use of the service is at your sole risk. ISM provides the service to you on an "as is" and "as available" basis. ISM and its owners, shareholders, subsidiaries, affiliates, officers, employees, agents, partners and licensors expressly disclaim all warranties of any kind, whether express or implied, including, but not limited to the implied warranties of merchantability, fitness for a particular purpose and non-infringement.

b.ISM and its owners, shareholders, subsidiaries, affiliates, officers, employees, agents, partners and licensors make no warranty that:

i.the service will meet your requirements;

ii.the service will be uninterrupted, timely, secure or error-free;

iii.the results that may be obtained from the use of the service will be accurate or reliable;

iv.the quality of any products, services, information or other material accessed, purchased or obtained by you through the service will meet your expectations;

v.any errors will be corrected.

c.All material and information obtained through the use of the service is accessed at your own discretion and risk, and you will be solely responsible for any damage to your computer system or loss of data that results from the accessing of any such material.

d.No advice or information, whether oral or written, obtained by you from this website or its affiliates or partners through or from the service shall create any warranty whatsoever.

8. LIMITATION OF LIABILITY
ISM may occasionally update or change these Terms & Conditions, so we encourage you to view them often. Your continued use of the Service constitutes your agreement to these Terms & Conditions and any updates.

9. NO REFUND POLICY
All transaction made are final and no refund, exchange or cancellation will be considered. You must agree to these conditions when a purchase is made. Please ensure all details are correct at the time of purchase so no problems arise.
</textarea></p>
		<span style="margin: 0 10px"></span><input type="checkbox" name="terms" ><i>I have read and agree with the Terms & Conditions.</i>
<div class="wrap">
<p><input type="submit" name="submit" value="Register" class="btnRegister"></p></div>
<div class="bottom">
<p>Got account already? <a href="login.php" style="text-decoration:none;"><b>Login here</b></a><span style="margin: 0 10px"></span></p>
<p>If dont received activation email, please click <a href="#popup1" style="text-decoration:none;"><b>here</b></a> to resend.<span style="margin: 0 10px"></span></p><br><br>
</div>
<div id="popup1" class="overlay">
		<div class="popup">
		
			<h2>Resend activation email</h2>
			<a class="close" href="#">&times;</a>
			<form name="reset" method="POST" action="">
			<div class="content">
				<p style="">Please enter the email that you have registered</p>
				<input type="email" name="email" size="25" style="height:30px;" placeholder="Enter your email">
				<input type="submit" name="okbtn" value="submit" onclick="get_pass()">
			</div>
			</form>
		</div>
	</div>	
</div>
</fieldset>
</form>
</body>
</html>
<?php
	if(isset($_POST['okbtn']))
	{
		$mail=$_POST['email'];
		
		$mail=mysqli_real_escape_string($connect,$mail);
	
		$sql=mysqli_query($connect,"SELECT * from customer where cemail='$mail'");
	
		$count2=mysqli_num_rows($sql);
		
		if($count2==1)//1 mean email is match
		{
			$rows=mysqli_fetch_assoc($sql);
			$status=$rows["status"];
			if($status=='Inactive')		
			{
				//echo"<script> alert('Email verification is required!\\nPlease check your mailbox.');</script>";
			
					$email = $_POST['email'];
					$result = mysqli_query($connect,"SELECT * FROM customer where cemail='" . $_POST['email'] . "'");
					$row = mysqli_fetch_assoc($result);
					$fetch_user_id=$row['cemail'];
					$email_id=$row['cemail'];
					$actual_link = "http://localhost/dwp5431/fyp_user0127/activate2.php?email=" . $email_id;  //follow your xampp to change the link location 
					if($email==$fetch_user_id) {
					$to = $email_id;
					$subject = "NNN Online Snack Store User Register Activation";
					$txt = "Click this link to activate your account.   " . $actual_link ;
					$headers = "From: <stackstorennn@gmail.com>\r\n";
						if(mail($to,$subject,$txt,$headers)){
							echo"<script> alert('The activate link is re-sent to your email, please use the link to activate your NNN account.');window.location='register.php';</script>";
						}
					}
					else{
						echo"<script> alert('Problem in resend. Try Again!');</script>";
					}
			}
			else{
				echo"<script> alert('Email had been activated');</script>";
			}
		}
		else
		{echo"<script> alert('Email is not existing, please go and register');window.location='register.php';</script>";}
	}

		?>