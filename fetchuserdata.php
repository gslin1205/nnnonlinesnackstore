<!DOCTYPE html>
<?php
include("Admin/dataconnection.php");
session_start();
if(!isset($_SESSION['cid']))
{
	?>
	<script>
	alert("Please log in!");
	</script>
	<?php
	header("refresh:0.0001; url=index.php");
}
$cid=$_SESSION['cid'];
$result=mysqli_query($connect,"SELECT cfname from customer where cid='$cid'");
$row=mysqli_fetch_assoc($result);
?>