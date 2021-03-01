<html>
<head>
<script>
function get_update()
{
	alert('Save successfully!');
	window.location.href="dashboard.php";
}
</script>
</head>
<?php
include("userdashboard.php");

?>
<body>
  

<h1>Change Profile Details</h1>
	<form name="updatefrm" method="POST" action="" >
		<p>First Name:<input type="text" name="cfname" value="<?php echo $row['cfname']; ?>" ></p>
		<p>Last Name:<input type="text" name="clname" value="<?php echo $row['clname']; ?>" ></p>
		<p>Password:<input type="text" name="cpass" value="<?php echo $row['cpass']; ?>"></p>
		<p>Gender:
			<input type="radio" name="cgender" value="Male"<?php if($row['cgender']=="Male"){ echo "checked";}?>/>Male</p>
			<input type="radio" name="cgender" value="Female"<?php if($row['cgender']=="Female"){ echo "checked";}?>/>Female</p>
			<input type="radio" name="cgender" value="Secret"<?php if($row['cgender']=="Secret"){ echo "checked";}?>/>Secret</p>
		<p>Phone no:<input type="text" name="cpn" value="<?php echo $row['cpn']; ?>"></p>
		<p>Email:<input type="text" name="cemail" value="<?php echo $row['cemail']; ?>"></p>
		<p>Address:<textarea cols="60" rows="4" name="caddress"><?php echo $row['caddress']; ?></textarea></p>
		<p>Post code:<input type="text" name="cpostcode" value="<?php echo $row['cpostcode']; ?>"></p>
		<p>State:<select name = "cstate">
									<option value = "Johor"<?php
																if($row['cstate']=="Johor") 
																echo "selected";?>>Johor</option>
									
									<option value = "Kedah"<?php
																if($row['cstate']=="Kedah") 
																echo "selected";?>>Kedah</option>
									<option value = "Kelantan"<?php
																if($row['cstate']=="Kelantan") 
																echo "selected";?>>>Kelantan</option>
									<option value = "Melaka"<?php
																if($row['cstate']=="Melaka") 
																echo "selected";?>>Melaka</option>
									<option value = "Negeri Sembilan"<?php
																if($row['cstate']=="Negeri Sembilan") 
																echo "selected";?>>Negeri Sembilan</option>
									<option value = "Pahang"<?php
																if($row['cstate']=="Pahang") 
																echo "selected";?>>Pahang</option>
									<option value = "Penang"<?php
																if($row['cstate']=="Penang") 
																echo "selected";?>>Penang</option>
									<option value = "Perak"<?php
																if($row['cstate']=="Perak") 
																echo "selected";?>>Perak</option>
									<option value = "Perlis"<?php
																if($row['cstate']=="Perlis") 
																echo "selected";?>>Perlis</option>
									<option value = "Sabah"<?php
																if($row['cstate']=="Sabah") 
																echo "selected";?>>Sabah</option>
									<option value = "Sarawak"<?php
																if($row['cstate']=="Sarawak") 
																echo "selected";?>>Sarawak</option>
									<option value = "Selangor"<?php
																if($row['cstate']=="Selangor") 
																echo "selected";?>>Selangor</option>
									<option value = "Terengganu"<?php
																if($row['cstate']=="Terengganu") 
																echo "selected";?>>Terengganu</option>									
									</select>
		
		<p><br><input type="submit" name="savebtn" value="Update profile details" onclick="get_update()"></p>
		<p><a href="dashboard.php"><input type="button" name="back" value="Back"></a></p>
	</form>
	</div>
	
</body>
</html>
<?php 
if(isset($_POST['savebtn']))
{
	
		$fname = $_POST["cfname"];  	
		$lname = $_POST["clname"];
		$pass = $_POST["cpass"]; 	
		$gender = $_POST["cgender"];		
		$phone= $_POST["cpn"];  	
		$email = $_POST["cemail"];  	
		$address = $_POST["caddress"];  	
		$pc = $_POST["cpostcode"];  	
		$state = $_POST["cstate"]; 
	$update= mysqli_query($connect, "UPDATE customer SET 
											   cfname='$fname',
											   clname='$lname',
											   cpass='$pass',
											   cgender='$gender',
											   cpn='$phone',
											   cemail='$email',
											   caddress='$address',
											   cpostcode='$pc',
											   cstate='$state'
											   WHERE cid='$cid'");
	
	
	
		//echo "<script>alert('update failed!')</script>";
	
}
?>