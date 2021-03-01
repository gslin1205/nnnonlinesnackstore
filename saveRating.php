<?php
include_once("db_connect.php");

if(!empty($_POST['rating']) && !empty($_POST['itemId'])){
	$itemId = $_POST['itemId'];
	$userID = $_POST['cid'];
	$pname = $_POST['itemName'];
	$insertRating = "INSERT INTO item_rating (itemId, itemName, userId, ratingNumber, title, comments, created, modified) VALUES ('".$itemId."','".$pname."', '".$userID."', '".$_POST['rating']."', '".$_POST['title']."', '".$_POST["comment"]."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')";
	mysqli_query($conn, $insertRating) or die("database error: ". mysqli_error($conn));		
}
?>
