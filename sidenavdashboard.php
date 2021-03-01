<!DOCTYPE html>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/side_nav.css"></link>
<style>
body {
    font-family: "Lato", sans-serif;
    background:url("timg/bgr2.jpg") no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
.sidebottom{
	margin-top:25px;	
}
.sidebottom a{padding:10px;}

#updatefrm input[type=button], #updatefrm input[type=submit]{
	 background-color: #ff884d;
     border: none;
     color: white;
     padding: 8px;
     text-decoration: none;
     margin: 6px 4px;
     cursor: pointer;
}
#updatefrm input[type=button]:hover, #updatefrm input[type=submit]:hover{
	 opacity:0.9;
}
</style>
<script>
function returnback()
{
	alert("Changes you made may not be saved.");
	window.location="dashboard.php";
}
</script>
</head>
<body>
<?php 
include "dataconnection1.php";
include"header2.php"; 
?>
<div class="sidenav">
	<div style="margin-left:25px; margin-top:15px;">
		<center>
		<img src="cimg/<?php echo $row['cimg'];?>" id="cimg" style="width:140px; height:140px; border-radius:50%; margin-left:-15px;"><center>
		<a href='#popup1'><i class='fa fa-camera' style='font-size:16px; position:absolute; margin-top:-27px;'></i></a>
	</div>
	<!--open image-->
	<div id="myModal" class="modal">
	  <span class="close1">&times;</span>
	  <img class="modal-content" id="img01">
	  <div id="caption"></div>
	</div>
	<!--popup-->
		<div id="popup1" class="overlay">
			<div class="popup">
				<h2>Change profile image</h2>
				<a class="close" href="#">&times;</a>
				<div class="content">
					<form name="updatefrm" id="updatefrm" method="POST" action="" enctype="multipart/form-data" >
						
					<p>Image:<img src="cimg/<?php echo $row['cimg'];?>" style="width:80px; height:60px;"> 
						<input type="file" name="cimg"></p>
						<input type="submit" name="okbtn" value="Change">
						<input type="button" name="back" value="Cancel" onclick="returnback()">
						
					</form>
				</div>
			</div>
		</div>	
    <?php echo '<div style="font-size:20px; margin-top:-30px;"><br><center>'.$row["cfname"].' '.$row["clname"].'<center></div>'; ?>
	<div class="sidebottom">
  <a onclick="cancel_test()" href="dashboard.php" ><i class="fa fa-dashboard" style="margin-left:4px;"></i><span style="margin-left:15px;"></span>My Dashboard</a>
  <a onclick="cancel_test()" <?php echo "href='u_rate.php?rate=$_SESSION[cid]'"; ?> ><i class="fa fa-commenting-o" style="margin-left:4px;"></i><span style="margin-left:15px;"></span>Product review</a>
  <a onclick="cancel_test()" <?php echo "href='u_order.php?details=$_SESSION[cid]'"; ?> ><i class="fa fa-pencil-square-o" style="margin-left:4px;"></i><span style="margin-left:15px;"></span>Order history</a>
  <button class="dropdown-btn"><i class="fa fa-gear fa-spin"></i><span style="margin-left:15px;"></span>Setting <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <?php echo"<a href='u_edit.php?edit=$_SESSION[cid]' onclick='cancel_test()'>"; ?>Personal profile</a>
    <?php echo"<a href='u_pass.php?pass=$_SESSION[cid]' onclick='cancel_test()'>"; ?>Change password</a>
    <?php echo"<a href='u_address.php?address=$_SESSION[cid]' onclick='cancel_test()'>"; ?>Address</a>
  </div>
  <a href="logout.php"><i class="fa fa-sign-out" style="margin-left:4px;"></i><span style="margin-left:15px;"></span>Log out</a>
	</div>
</div>

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}

// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("cimg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close1")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>

</body>
</html> 
<?php 
if(isset($_POST['okbtn']))
{
	if(isset($_FILES['cimg']['name']) && ($_FILES['cimg']['name']!=""))
	{
		$size = $_FILES['cimg']['size'];
  		$temp = $_FILES['cimg']['tmp_name'];
  		$type = $_FILES['cimg']['type'];
		$profile_name= $_FILES['cimg']['name'];
		
		// 1st del old file from folder
		
		unlink("cimg/$picture");
		
		//new img upload to folder
		move_uploaded_file($temp,"cimg/$profile_name");
	}
	else
	{
		$profile_name=$picture;
	}

	$update= mysqli_query($connect, "UPDATE customer SET cimg='$profile_name' WHERE cid='$_SESSION[cid]'");
	
	
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