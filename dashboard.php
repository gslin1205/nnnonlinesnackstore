<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<style>
.main{display:block;}
.left p,.right p, .bottom p, .bottom2 p, .bottom2 th, .bottom2 td{font-size:16px;}

.left{position:absolute;

	  background:#f3ffe6;
	    display:inline-block;
  width:29%;
  height:38%;
  margin:2% 2%;
  padding:1em;
  line-height:1.5em;
  background:hsla(67, 95%, 95%, 1);
 /*box-shadow: 8px 8px #ffcc99;*/
  overflow: hidden;
  overflow-wrap: break-word;
	 box-sizing: border-box;
}

.right{position:absolute;
	   background:#f3ffe6;
	   display:inline-block;
  width:31%;
  height:38%;
  margin:2% 33%;
  padding:1em;
  line-height:1.5em;
  background:hsla(67, 95%, 95%, 1);
     /*box-shadow: 8px 8px #ffcc99;*/
	 overflow: hidden;
	 overflow-wrap: break-word;
	 box-sizing: border-box;
}
.bottom{position:absolute;
		background:#f3ffe6;
		display:inline-block;
  width:62%;
    height:38%;
  margin:23% 2%;
  padding:1em;
  line-height:1.4em;
  background:hsla(67, 95%, 95%, 1);
  /*box-shadow: 8px 8px #ffcc99;*/
  	 overflow: hidden;
	 overflow-wrap: break-word;
	 box-sizing: border-box;
}
.bottom2{position:absolute;
		display:inline-block;
		width:62%;
		height:auto;
		margin:44% 2%;	    
		padding:1em;
		background:#f3ffe6;
        background:hsla(67, 95%, 95%, 1);
		box-sizing: border-box;

}

</style>
</head>
<body>
<?php include"sidenavdashboard.php"; ?>
<div class="main">
<h2 style="margin-left:2%; ">My Profile</h2>
	<div class="left">
	<u style="letter-spacing:1px;">Personal Profile</u>  |  <?php echo"<a href='u_edit.php?edit=$_SESSION[cid]'>edit</a>"; ?>
	<p>First Name: <?php echo $row["cfname"]; ?></p>
	<p>Last Name: <?php echo $row["clname"]; ?></p>
	<p>Email: <?php echo $row["cemail"]; ?> </p>
	<p>Gender: <?php echo $row["cgender"];?></p>
	<p>Mobile number: <?php if(empty($row["cpn"])){
					echo "<i>fill your mobile number <a href='u_edit.php?edit=$_SESSION[cid]'>here</a>...</i>";
							}
			  else{         
					echo ' (+60)'.$row["cpn"].'';
				  } ?></p>
	 
	</div>
	<div class="right">
	<u style="letter-spacing:1px;">Address</u>  |  <?php echo"<a href='u_address.php?address=$_SESSION[cid]'>edit</a>"; ?>
	<?php 
			if(empty($row["caddress"])){
                echo '
                    <p>Address: fill your address...</p>';
			}
            else{                        
                echo '     
					<p>Address: '.$row["caddress"].'</p>
					<p>Postcode: '.$row["cpostcode"].'</p>
					<p>State: '.$row["cstate"].'</p>';
            }
							
    ?>    
	</div>
	
	<div class="bottom">
	<u style="letter-spacing:1px;">Review</u>&nbsp; &nbsp;|&nbsp; &nbsp;<?php echo"<a href='u_rate.php?rate=$_SESSION[cid]&page=1'>more details</a>"; ?>
	<div class="row">
				
			<div>		
				<?php
				
				$ratinguery = "SELECT * FROM item_rating where userId='$_SESSION[cid]' ORDER BY rand() LIMIT 1";
				$ratingResult = mysqli_query($connect, $ratinguery);
				if(mysqli_num_rows($ratingResult)>0){
					while($rating = mysqli_fetch_assoc($ratingResult)){
						$date=date_create($rating['created']);
						$reviewDate = date_format($date,"M d, Y");			
					?>
					<div class="h4">
							
							<h4><?php echo "<b>&nbsp; &nbsp;".$rating['itemName']."</b>&nbsp; &nbsp; &nbsp;".$reviewDate; ?></h4>
														
							<div class="review-block-rate">
								&nbsp;&nbsp;<?php
								for ($i = 1; $i <= 5; $i++) {
									$ratingClass = "btn-default btn-grey";
									if($i <= $rating['ratingNumber']) {
										$ratingClass = "btn-warning";
									}
								?>
								<button type="button" class="btn btn-xs <?php echo $ratingClass; ?>">
								  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
								</button>								
								<?php } ?>
							</div>
							&nbsp; &nbsp; Title &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp;<input type="text" style="width:650px;" value="<?php echo $rating['title']; ?>" disabled><br>
							&nbsp; &nbsp; Comment &nbsp;: &nbsp;<textarea rows="4" cols="70" style="resize:none;" disabled><?php echo $rating['comments']; ?></textarea>
							
						</div>		
			  <?php }
				}
				else{
					echo "<br><br><p style='padding:1em;'><i>No any review from you... <br>you may leave your review on any products that you has been purchase or interest. </i></p>";
				}					
				?>
			</div>
			
		</div>	
	</div>
	
	<div class="bottom2">
	<u style="letter-spacing:1px;">Order history</u>&nbsp; &nbsp;|&nbsp; &nbsp;<?php echo"<a href='u_order.php?details=$_SESSION[cid]'>more details</a>"; ?>
		
		<?php
			$order=mysqli_query($connect,"select name, phone, products, totalprice from orders where oid='$_SESSION[cid]' ORDER BY rand() LIMIT 2 ");
			$count=1;
			
			if(mysqli_num_rows($order)>0){
			    while(list($name,$phone,$products,$totalprice)=mysqli_fetch_array($order)){
				 
					echo "
					    <table class='table table-hover'>
						<tr style='background-color:#ffcc99; '>
						<th>No.</th>
						<th>Name</th>
						<th>Contact Number</th>
						<th>Products purchased</th>
						<th>Amount (RM)</th>	
						</tr>
						
						<tr>
						<td>$count</td>
						<td>$name</td>			
						<td>$phone</td>              
						<td>$products</td>
						<td>RM $totalprice</td>			
						</tr>
					";
					$count++;
					}
			}
		    else{
					echo "<br><br><p><i>No order history yet... you may purchase <a href='products.php'>here</a></i></p>";
				}
			 
		?>
		</table>
	</div>
	


</div>
</body>
</html>