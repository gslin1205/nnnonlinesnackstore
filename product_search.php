<?php include("dataconnection.php"); 
		include("admin.php");?>

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

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

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

<style>
ol,ul {
  padding-left: 0rem;
}

input:hover, select:hover, textarea:hover, .preferred-metod label:hover input {
      box-shadow: 0 0 3px 0 #70088a;
      }
	  
tr,td{
	text-align: center;
}


.form-control{
	width:20%;
	display: inline-block;
}
</style>
</head><title>Search by Category</title>

<body>
	<div style = "margin-left: 330px; ">
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
			
			?><table class="table table-striped">
			<tr>
				<th>ID</th>
				<th>Product Name</th>
				<th>Image 1</th>
				<th>Image 2</th>
				<th>Image 3</th>
				<th>Price (RM)</th>
				<th>Remaining Stock</th>
				<th colspan="3">Action</th>
				
			</tr> <?php
				while($row= mysqli_fetch_array($result))
				{ ?>
				
				<tr>
				<td><?php echo $row['pid'];?></td>
				<td><?php echo $row['pname'];?></td>
				<td><a class="image-link" href="pimg/<?php echo $row['pimg'];?>">
					<img src="pimg/<?php echo $row['pimg'];?>" style="width:50px; height:50px;"></a>
				</td>
				<td><a class="image-link" href="pimg/<?php echo $row['pimg2'];?>">
					<img src="pimg/<?php echo $row['pimg2'];?>" style="width:50px; height:50px;"></a>
				</td>
				<td><a class="image-link" href="pimg/<?php echo $row['pimg3'];?>">
					<img src="pimg/<?php echo $row['pimg3'];?>" style="width:50px; height:50px;"></a>
				</td>
				<td><?php echo $row['pprice'];?></td>
				<td><?php echo $row['pstock'];?></td>
				<td><a href="product_view.php?view&pid=<?php echo $row['pid'];?>" class="btn btn-outline-primary"><i class="fa fa-eye"></i></a></td>
				<td><a href="product_edit.php?edit&pid=<?php echo $row['pid'];?>" class="btn btn-outline-success"><i class="fa fa-edit"></i></a></td>
				<td><a href="product_search.php?del&id=<?php echo $row['pid'];?>" onclick="return confirmation()" class="btn btn-outline-danger"><i class="fa fa-trash"></a></td>
				
			</tr> 
			<?php 
			}
			
		}
		}
		
		
		
		?>
		
		<form  name="search_form" method="GET" action="">
		<p>Search by Product Name: <input type="text" class="form-control"  name="searchpid">
		
		<input type="submit" value="Search" name="searchbtn" class="btn btn-outline-dark">
		
		<input type="button" name="cancelbtn" value="Back" onclick="cancel()" class="btn btn-outline-dark"></p>
	</div>
</form>
</body>
</html>

<script>
$(document).ready(function() {
  $('.template-article img').each(function() {
      var currentImage = $(this);
      currentImage.wrap("<a class='image-link' href='" + currentImage.attr("src") + "'</a>");
  });
  $('.image-link').magnificPopup({type:'image'});  
});


</script>