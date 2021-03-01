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

<?php include("dataconnection.php"); 
		include("admin.php");?>


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
	header("refresh:0.5; url='product_delete.php'");
}

$limit = 20;  
if (isset($_GET["page"])) {
	$page  = $_GET["page"]; 
	} 
	else{ 
	$page=1;
	};  
$start_from = ($page-1) * $limit;  
$result = mysqli_query($connect,"SELECT products.pid, products.pname, products.pimg, products.pimg2, products.pimg3, products.pprice, products.pstock, categories.catename from products INNER JOIN categories ON products.categid = categories.categid WHERE p_isdelete=0 ORDER BY pid ASC LIMIT $start_from, $limit");




?>
<html>
<head><title>Product List</title>
	
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

<script type="text/javascript">
function confirmation()
{
	var option;
	option=confirm("Do you want to delete the record?");
	return option;
}

</script>
</head>

<style>
ol,ul {
  padding-left: 0rem;
}

tr,td{
	text-align: center;
}

.pagination{
	margin-left: 320px;
}

.page-item{
	padding: 0px;
}
</style>

<body>
		
		<div style = "margin-left: 330px; ">
		<h1 class="title">List of Product</h1>
			
			<td><a href='add.php?add&pid=$pid&action' class="btn btn-outline-primary"><i class="fa fa-plus"></i></a></td>
				
		
			<a href='product_search.php' class="btn btn-outline-primary"><i class="fa fa-search"></i></a>
			<p/>
			
			<table class="table table-striped">
			<tr>
				<th>ID</th>
				<th>Product Name</th>
				<th>Image 1</th>
				<th>Image 2</th>
				<th>Image 3</th>
				<th>Price (RM)</th>
				<th>Remaining Stock</th>
				<th>Category </th>
				<th colspan="3">Action</th>
			</tr>
			
			<?php
			
			
			while(list($pid, $pname, $pimg, $pimg2, $pimg3, $pprice, $pstock, $catename) = mysqli_fetch_array($result))
			{
				



			echo"
			<tr>
				<td>$pid</td>
				<td>$pname</td>
				<td>
					<a class='image-link' href='pimg/$pimg'>
					<img src='pimg/$pimg' style='width:50px; height:50px;'>
				</td>
				<td>
					<a class='image-link' href='pimg/$pimg2'>
					<img src='pimg/$pimg2' style='width:50px; height:50px;'>
				</td>
				<td>
					<a class='image-link' href='pimg/$pimg3'>
					<img src='pimg/$pimg3' style='width:50px; height:50px;'>
				</td>
				<td>$pprice</td>
				<td>$pstock</td>
				<td>$catename</td>
				<td> <a href='product_view.php?view&pid=$pid&action' class='btn btn-outline-primary'><i class='fa fa-eye'></i></a></td>
				<td><a href='product_edit.php?edit&pid=$pid&action' class='btn btn-outline-success'><i class='fa fa-edit'></i></a></td>
				<td><a href='product_delete.php?del&id=$pid&action=del' onclick='return confirmation()' class='btn btn-outline-danger'><i class='fa fa-trash'></i></a></td>
			
			</tr>
			";
			
			}
			
			?>
			</table>
		<!--<p> Number of records : <?php echo $count; ?></p>-->
		

          </div>
<?php  

$result_db = mysqli_query($connect,"SELECT COUNT(pid) FROM products"); 
$row_db = mysqli_fetch_row($result_db);  
$total_records = $row_db[0];  
$total_pages = ceil($total_records / $limit); 
/* echo  $total_pages; */
$pagLink = "<div class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {
	
              $pagLink .= "<li class='page-item'><a class='page-link' href='product_delete.php?page=".$i."'>".$i."</a></li>";	
}
echo $pagLink . "";  
?>
          
        
		
		
      

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"> </script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"> </script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"> </script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.23/datatables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
$(document).ready(function(){
    $('#dtid').DataTable();
});


$(document).ready(function(){
	$('.viewbtn').on('click',function(){
		$('#viewmodal').modal('show');
		
		$tr = $(this).closest('tr');
		
		var data = $tr.children("td").map(function(){
			return $(this).text();
		}).get();
		
		console.log(data);
		
		$('#pid').val(data[0]);
		$('#pname').val(data[1]);
		$('#pprice').val(data[2]);
		$('#expiry').val(data[3]);
		$('#pstock').val(data[4]);
		$('#pdesc').val(data[5]);
	});
	
});

$(document).ready(function() {
  $('.template-article img').each(function() {
      var currentImage = $(this);
      currentImage.wrap("<a class='image-link' href='" + currentImage.attr("src") + "'</a>");
  });
  $('.image-link').magnificPopup({type:'image'});  
});


</script>

</body>
</html>
