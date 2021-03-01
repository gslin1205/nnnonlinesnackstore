<?php
	require_once("dataconnection.php");
	$db_handle = new DBController();
	if(!empty($_GET["id"])) {
	$query = "UPDATE customer set status = 'active' WHERE cid='" . $_GET["id"]. "'";
	$result = $db_handle->updateQuery($query);
		if(!empty($result)) {
			$message = "Your account is activated.";
			$type = "success";
			header("refresh:0.5; url=login.php");
		} else {
		    $message = "Problem in account activation.";
		    $type = "error";
		}
	}
?>
<html>
<head>
<title>PHP User Activation</title>

</head>
<body>
<?php if(isset($message)) { ?>
<div class="message <?php echo $type; ?>"><?php echo $message; ?></div>
<?php } ?>
</body></html>
		