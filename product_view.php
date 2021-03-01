<?php include("dataconnection.php"); 
	include("admin.php");?>

<!DOCTYPE html>
<html>
<head> <title>Product Details</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
 <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
 
<script>
function cancel()
{ 
		window.location.href = "product_delete.php";
}
</script>

<style>
body{
	background-image: url("pimg/bg4.jpg");
	//background-repeat: no-repeat;
	//background-size: cover;
}

.pdtitle{
	text-align: center;
}

.pdtitle h1
{
	font-size: 27pt;
	padding: 10px;
}

ol,ul {
  padding-left: 0rem;
}

.products-content{
	margin: auto;
	display: block;
}

.img{
	text-align: center;
}

.item {
      position: relative;
      margin: 10px 0;
	  font-family:"Trebuchet MS"
	  
      }
	  
form {
      width: 60%;
      padding: 20px;
      background: #fff;
      box-shadow: 0 2px 5px #ccc; 
	   background-color: #f5f2f2;
	   opacity: 0.88;
      }
	  
.button{
	text-align: center;
}

.form-control{
	width:50%;
	display: inline-block;
}

.price{
	width: 43%;
}

.input-group-text{
	display: inline-block;
}

</style>
</head>
<body>


<form class="all" style = "margin-left: 350px; ">

		<?php
		    if(isset($_GET["view"]))
			{
			$pid = $_GET["pid"];

			$result = mysqli_query($connect, "SELECT * from products where pid='$pid'");
			
			$row = mysqli_fetch_assoc($result);
			}
		?>
		
<form class="testbox">		
	<div class="products-content">
		<div class="products">
			<div class="pdtitle"><h1>Product Details</h1></div><hr>
			
			<div class="item">
			<p>
			<p>Product ID &nbsp &nbsp &nbsp&nbsp: &nbsp <input type="text"  name="pid" size="10" class="form-control" value="<?php echo $row['pid'];?>"disabled>
			
			<p>Product Name &nbsp: &nbsp <input type="text"  class="form-control" name="pname" size="40" value="<?php echo $row['pname'];?>"disabled>
			</div>
			
			<div class="img">
			<p>Image 1 &nbsp : &nbsp
			<a class='image-link' href="pimg/<?php echo $row['pimg'] ?>">
			<img src="pimg/<?php echo $row['pimg'];?>" style="width:100px; height:100px;"></a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
			
			Image 2 &nbsp : &nbsp 
			<a class='image-link' href="pimg/<?php echo $row['pimg2'] ?>">
			<img src="pimg/<?php echo $row['pimg2'];?>" style="width:100px; height:100px;"></a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
			
			Image 3 &nbsp : &nbsp 
			<a class='image-link' href="pimg/<?php echo $row['pimg3'] ?>">
			<img src="pimg/<?php echo $row['pimg3'];?>" style="width:100px; height:100px;"> </a>
			</div>
			
			<p>Price &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp : &nbsp <span class="input-group-text">RM</span><input type="text"  name="pprice" size="10" class="form-control price" value="<?php echo $row['pprice'];?>"disabled>
			
			<p>Expiry &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: &nbsp <input type="text"  name="expiry"" class="form-control" value="<?php echo $row['expiry'];?>"disabled>
			
			<p>Stock &nbsp&nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp: &nbsp <input type="text"  name="pstock" size="10"  class="form-control" value="<?php echo $row['pstock'];?>"disabled>
			
			<p>Origin &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp:&nbsp <input type="text"  name="origin" size="10" class="form-control" value="<?php echo $row['origin'];?>"disabled>
			</p>
			
			<p>Descriptions &nbsp&nbsp :&nbsp <textarea cols="60" rows="4" name="pdesc" style="resize:none;" class="form-control" disabled><?php echo $row ['pdesc']?></textarea>
			
			
			
			<div class="button">
				<a href="javascript:history.go(-1)"  name="cancelbtn" value="Cancel"  class='btn btn-outline-primary'>Back</a>
			</div>
		</div>
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
