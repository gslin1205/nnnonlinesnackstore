<?php 
session_start();
if(!isset($_SESSION['cid']))
{
	?>
	<script>
	alert("Please log in!");
	</script>
	<?php
	header("refresh:0.5; url=login.php");
}
include("Admin/dataconnection.php");

$cid=$_SESSION['cid'];
$result=mysqli_query($connect,"SELECT * from customer where cid='$cid'");

$row=mysqli_fetch_assoc($result);

echo"<h1>HoME PAGE</h1>";
echo"<br> Welcome ".$row["clname"];
echo"<br><a href='logout.php'>LOGOUT</a>";
echo"<br><a href='add.php'>Add</a>";
echo"<br><a href='userdashboard.php'>db</a>";
?>