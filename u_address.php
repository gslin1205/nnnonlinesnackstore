<!DOCTYPE html>
<?php
include"sidenavdashboard.php"; 
		if(isset($_GET["address"]))
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

form p{
	padding:20px;
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

.demoInputBox{padding:7px; 
border:#F0F0F0 1px solid; 
border-radius:4px;
}

#editfrm input:active, #editfrm textarea:active{
 outline: none !important;
 border:2px solid #ff884d;
}

#editfrm input[type=button]:hover, #editfrm input[type=submit]:hover{
	opacity:0.8;
	border-radius:5px;
	box-shadow: 3px 5px #ffffcc;
}

#editfrm input[type=submit]:active{cursor: progress;}

</style>
<script>
function cancel_test()
{
	alert("Changes you made may not be saved.");	
}
function cancel2()
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
<h2 style="margin-left:2%; ">Modify Address</h2>
	<form name="editfrm" id="editfrm" method="POST" action="">
	    <p>Address:<textarea style="resize:none; position:absolute;" class="demoInputBox" cols="50" rows="4" required="please fill your address" name="caddress"><?php echo $row['caddress']; ?></textarea></p>
		<br><p style="margin-top:60px;">Post code:<input type="text" class="demoInputBox" style="height:35px;" name="cpostcode" pattern="[0-9]{5}" required value="<?php echo $row['cpostcode']; ?>"></p>
		<p>State:<select name = "cstate" class="demoInputBox">
									<option value = "Johor"<?php
																if($row['cstate']=="Johor") 
																echo "selected";?>>Johor</option>
									
									<option value = "Kedah"<?php
																if($row['cstate']=="Kedah") 
																echo "selected";?>>Kedah</option>
									<option value = "Kelantan"<?php
																if($row['cstate']=="Kelantan") 
																echo "selected";?>>Kelantan</option>
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
	
		<p><br><input type="submit" name="savebtn" onclick="" value="Update address">
	            <input type="button" onclick="cancel2()" name="back" value="Back"></a></p>
		</div>
	</form>
	 <?php 
		}
		  ?>
</div>
</body>
</html>
<?php 
if(isset($_POST['savebtn']))
{
	 	  	
	$address = $_POST["caddress"];  	
	$pc = $_POST["cpostcode"];  	
	$state = $_POST["cstate"]; 
		
		
	$update= mysqli_query($connect, "UPDATE customer SET 
											   caddress='$address',
											   cpostcode='$pc',											   
											   cstate='$state'									   											 
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
?>