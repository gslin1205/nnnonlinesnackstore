<!DOCTYPE html>
<?php
include"sidenavdashboard.php"; 
if(isset($_GET["details"]))
{
?>
<html>
<head>
<style>
.order{background:white;
	height:auto;
	width:80%;
	margin:2% 2%;
	background:hsla(67, 95%, 95%, 1);
	margin-top:10px;
	padding: 12px 100px 12px 10px; 
	font-size:16px;
}

</style>
<script>
</script>
</head>
<body>

<div class="main">
<h2 style="margin-left:2%;">Order history</h2>
<div class="order">
<?php
			$order=mysqli_query($connect,"select id, name, phone, address, products, totalprice, ordate from orders where oid='$_SESSION[cid]'");
			$count=1;
			//datetime
			if(mysqli_num_rows($order)>0){
			    while(list($id,$name,$phone,$address,$products,$totalprice,$date)=mysqli_fetch_array($order)){
				 
					echo "
					    <div style='border:black 1px solid; width:3%; text-align:center; border-radius:50%; position:absolute;'>
						$count
						</div>
						<div style='margin-left:7%;'>
						<p><b>Name  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;: </b> $name</p>
						<p><b>Contact Number &nbsp; &nbsp; &nbsp;: </b> $phone</p>
						
						<p><b>Shipping Address  &nbsp; &nbsp;: </b>$address</p>
						<p><b>Products purchased: </b><br> $products</p>
						<p><b>Order ID  &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : </b> $id</p>
						<p><b>Ordate  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp;: </b> $date</p>
						<p><b>Amount &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: </b> RM $totalprice</p>
						</div>						
						<hr>
						
					";
					$count++;
					}
			}
		    else{
					echo "<br><br><br><br><p style='padding:1em;'><i>No order history yet... you may purchase <a href='products.php'>here</a></i></p><br><br><br><br>";
				}
?>
</table>
</div>
</div>
<?php } ?>
</body>
</html>