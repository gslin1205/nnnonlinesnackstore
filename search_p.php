
<?php include("dataconnection1.php"); ?>

<?
	if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='edit')
			{
	$pid=$_GET['pid'];
	$result=mysqli_query($connect,"select pimg from products where pid='$pid'")
	or die("query is incorrect...");

	list($image)=mysqli_fetch_array($result);
	$path="pimg/$picture";//adminimg is file name

	if(file_exists($path)==true)
	{
		unlink($path);
	}
	
	else
	{}
	} 
?>

<html>
<head>

<?php
if (isset($_GET['del'])) 
{
	$pid=$_GET['id'];
	mysqli_query($connect,"UPDATE products SET p_isdelete=1 where pid='$pid'");
?>
<script>
	alert("Product is deleted");
</script>
<?php
	header("refresh:0.5; url='product_search.php'");
}
?>

<script>
function confirmation()
{
	var option;
	option=confirm("Do you want to delete the record?");
	
	return answer;
}

function cancel()
{ 
		window.location.href = "product_delete.php";
}
</script>
</head><title>Search by Category</title>

<body>
		
		<?php
		
		if(isset($_GET["searchbtn"]))
		{
			$pname=$_GET["searchpid"];
			
			$result = mysqli_query($connect, "SELECT * from products WHERE p_isdelete=0 AND pname LIKE '%$pname%' ");	
			
			if(mysqli_num_rows($result)==0)
			{
				echo "<br> Result could not be found!";
			}
			
			else
			{
			
			?><table border="1"><tr>
				<th>Product Name</th>
				<th>Image</th>
				<th>Price (RM)</th>
				<th></th>
				
			</tr> <?php
				while($row= mysqli_fetch_array($result))
				{ ?>
				
				<tr>
				<td><?php echo $row['pname'];?></td>
				<td><img src="pimg/<?php echo $row['pimg'];?>" style="width:50px; height:50px;"></td>
				<td><?php echo $row['pprice'];?></td>
				<td><a href="product_details.php?view&pid=<?php echo $row ['pid'];?>" class="btn btn-info btn-block">Details</a></td>
                
			</tr> 
			<?php 
			}
			
		}
		}
		
		
		
		?>
		
		<form  name="search_form" method="GET" action="">
		<p>Search by Product Name: <input type="text" name="searchpid">
		<input type="submit" value="Search" name="searchbtn">
		
			<a href='products.php'>Back</a>

</form>
</body>
</html>