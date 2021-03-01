<!DOCTYPE html>
<?php
include"sidenavdashboard.php"; 
		if(isset($_GET["edit"]))
		{
			$choose=mysqli_query($connect,"SELECT * from customer where cid='$_SESSION[cid]'");
			$rows=mysqli_fetch_assoc($choose);
?>
<html>
<head>
<style>
#editfrm{background:white;
	height:auto;
	width:80%;
	margin:2% 2%;
	background:hsla(67, 95%, 95%, 1);
	
}

#editfrm p{
	padding:15px;
}

#editfrm input[type=button], #editfrm input[type=submit]{
	 background-color: #ff884d;
     border: none;
     color: white;
     padding: 12px 28px;
     text-decoration: none;
     margin: 4px 2px;
     cursor: pointer;
	 font-size: 16px;
}


#editfrm input[type=button]:hover,#editfrm input[type=submit]:hover{
	opacity:0.8;
	border-radius:5px;
	box-shadow: 3px 5px #ffffcc;
}

.demoInputBox{padding:7px; 
border:#F0F0F0 1px solid; 
border-radius:4px;
}

#editfrm input:active{
 outline: none !important;
 border:2px solid #ff884d;

}

#editfrm input[type=submit]:active{cursor: progress;}


</style>
<script>
function cancel_test()
{
	alert("Changes you made may not be saved.");	
}
function cancel3()
{
	var option2=confirm("You have unsaved changes; are you sure you want to leave this page?");

	if (option2) 
		window.location.href="dashboard.php";
	else{}
}
</script>
</head>
<body>
<div class="main">
<h2 style="margin-left:2%; ">Modify Personal Information</h2>
	<form name="editfrm" id="editfrm" method="POST" action="">
		
	    <p>First Name &nbsp; : <input type="text" class="demoInputBox" size="35" style="height:30px;" name="cfname" value="<?php echo $row['cfname']; ?>" ></p>
		<p>Last Name &nbsp; : <input type="text" class="demoInputBox" size="35" style="height:30px;" name="clname" value="<?php echo $rows['clname']; ?>" ></p>
		<p>Password &nbsp; &nbsp; : <input type="password" class="demoInputBox" style="height:30px;" size="35" name="password" value="<?php echo $rows['cpass']; ?>" disabled> &nbsp; <?php echo"<a href='u_pass.php?pass=$_SESSION[cid]' style='text-decoration:none; font-size:16px;'>"; ?>Change</a></p>
		<p>Phone no &nbsp; &nbsp; : <input type="text" value="+(60)" style="height:29px;" size="1" disabled><input type="text" class="demoInputBox" size="30" style="height:30px;" id="cpn" name="cpn" placeholder="12-3456789" value="<?php echo $rows['cpn']; ?>"></p>
		<p>Gender &nbsp; &nbsp; &nbsp; &nbsp; :
			<input type="radio" name="cgender" value="Male"<?php if($rows['cgender']=="Male"){ echo "checked";}?>/>Male
			<span style="margin: 0 20px"><input type="radio" name="cgender" value="Female"<?php if($rows['cgender']=="Female"){ echo "checked";}?>/>Female
			<span style="margin: 0 20px"><input type="radio" name="cgender" value="Secret"<?php if($rows['cgender']=="Secret"){ echo "checked";}?>/>Secret</p>
		<p>Email &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: <input type="email" value="<?php echo $rows['cemail']; ?>" size="36" disabled></p>
		<p><br><input type="submit" name="savebtn" value="Update profile detail">
	            <input type="button" name="back" onclick="cancel3()" value="Back"></p>
		
	</form>
</div>
	 <?php 
		}
		  ?>
</div>
</body>
</html>
<?php 
if(isset($_POST['savebtn']))
{
	
		$fname = $_POST["cfname"];  	
		$lname = $_POST["clname"];
		//$pass = $_POST["cpass"]; 	
		$gender = $_POST["cgender"];		
		$phone= $_POST["cpn"];  	
		//$email = $_POST["cemail"];  	
		//$address = $_POST["caddress"];  	
		//$pc = $_POST["cpostcode"];  	
		//$state = $_POST["cstate"]; 
		
		/* Phone num Matching Validation */

	$cpn = preg_match('/^[1]{1}[0-9]{1}?\-*[0-9]{7,8}$/', $phone);
	$cpn2= preg_match('/^[1]{1}[0-9]{1}[0-9]{7,8}$/', $phone);
	if(!$cpn)
	{
		echo"<script> alert('Please enter a valid mobile number\\ne.g. +6012-3456789/+60123456789');</script>";
	}
	else{
	$update= mysqli_query($connect, "UPDATE customer SET 
											   cfname='$fname',
											   clname='$lname',											   
											   cgender='$gender',
											   cpn='$phone'										   											 
											   WHERE cid='$_SESSION[cid]'");
	
	
	
		if($update)
	{
		echo "<script>alert('update successfully!');window.location='dashboard.php';</script>";
	}
	else
	{
		echo "<script>alert('update failed!')</script>";
	}
	}
	
}
?>