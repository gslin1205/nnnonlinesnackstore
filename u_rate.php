<!DOCTYPE html>
<?php
include"sidenavdashboard.php"; 
if(isset($_GET["rate"]))
{ 

$limit = 5;  
if (isset($_GET["page"])) {
	$page  = $_GET["page"]; 
} 
else{ 
	$page=1;
};  
$start_from = ($page-1) * $limit; 

?>
<html>
<head>

<style>
body {
    font-family: "Lato", sans-serif;
    background:url("timg/bgr2.jpg") no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

.rate{background:white;
	height:auto;
	width:80%;
	margin:2% 2%;
	background:hsla(67, 95%, 95%, 1);
	margin-top:10px;
}
.pagination{margin:2% 25%;
display:inline-block;
}
</style>
<script>
</script>
</head>
<body>

<div class="main">
<h2 style="margin-left:2%;">Product review</h2>
<div>
			<div class="rate">	
				<div>		
				<?php
				$ratinguery = "SELECT * FROM item_rating where userId='$_SESSION[cid]' ORDER BY userId ASC LIMIT $start_from, $limit";
				$ratingResult = mysqli_query($connect, $ratinguery);
				if(mysqli_num_rows($ratingResult)>0){
					while($rating = mysqli_fetch_array($ratingResult)){
						$date=date_create($rating['created']);
						$reviewDate = date_format($date,"M d, Y");			
					?>

						<div class="h4">
							<br>
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
								</div style="display:inline-block;">
								&nbsp; &nbsp; Title &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp;<input type="text" style="width:515px;" value="<?php echo $rating['title']; ?>" disabled><br>
								&nbsp; &nbsp; Comment &nbsp;: &nbsp;<textarea rows="5" cols="55" style="resize:none;" disabled><?php echo $rating['comments']; ?></textarea>							
							</div>		
					<?php echo"<hr>";
					}	
				}else{
					echo "<br><br><br><br><p style='padding:1em; font-size:16px;'><i>No any review from you... <br>you may leave your review on any products that you has been purchase or interest. </i></p><br><br><br><br>";
				}

}?>
				</div>
			</div>
		</div>	
</div>
</body>
   <?php  

$result_db = mysqli_query($connect,"SELECT COUNT(userId) FROM item_rating where userId='$_SESSION[cid]'"); 
$row_db = mysqli_fetch_row($result_db);  
$total_records = $row_db[0];  
$total_pages = ceil($total_records / $limit); 
/* echo  $total_pages; */
$pagLink = "<div class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {	
              $pagLink .= "<li class='page-item'><a class='page-link' href='u_rate.php?rate=$_SESSION[cid]&page=".$i."'>".$i."</a></li>";	
}
echo $pagLink . "</div>";  
?>
</html>