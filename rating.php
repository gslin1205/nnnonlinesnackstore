<?php include('head.php'); 
include('header.php');  ?>

<script src="js/rating1.js"></script>
<link rel="stylesheet" href="css/style2.css">
<div class="container">		
	<h2 style="margin-top:130px;">Review</h2>
	<?php
	include_once("db_connect.php");
if(isset($_GET["review"]))
{
	if(isset($_SESSION["cid"])){ 
	$cid=$_GET['cid'];}
	else{}
	$pname=$_GET['pname'];
	$pid=$_GET['pid'];
	$ratingDetails = "SELECT ratingNumber, itemId FROM item_rating where itemId='$pid'";
	
	$rateResult = mysqli_query($conn, $ratingDetails) or die("database error:". mysqli_error($conn));
	$ratingNumber = 0;
	$count = 0;
	$fiveStarRating = 0;
	$fourStarRating = 0;
	$threeStarRating = 0;
	$twoStarRating = 0;
	$oneStarRating = 0;
	while($rate = mysqli_fetch_assoc($rateResult)) {
		$ratingNumber+= $rate['ratingNumber'];
		$count += 1;
		if($rate['ratingNumber'] == 5) {
			$fiveStarRating +=1;
		} else if($rate['ratingNumber'] == 4) {
			$fourStarRating +=1;
		} else if($rate['ratingNumber'] == 3) {
			$threeStarRating +=1;
		} else if($rate['ratingNumber'] == 2) {
			$twoStarRating +=1;
		} else if($rate['ratingNumber'] == 1) {
			$oneStarRating +=1;
		}
	}
	$average = 0;
	if($ratingNumber && $count) {
		$average = $ratingNumber/$count;
	}	
	
	?>

	<br>
	<div id="ratingDetails"> 		
		<div class="row">			
			<div class="col-sm-3">				
				<h4>Rating and Reviews</h4>
				<h2 class="bold padding-bottom-7"><?php printf('%.1f', $average); ?> <small>/ 5</small></h2>				
				<?php
				$averageRating = round($average, 0);
				for ($i = 1; $i <= 5; $i++) {
					$ratingClass = "btn-default btn-grey";
					if($i <= $averageRating) {
						$ratingClass = "btn-warning";
					}
				?>
				<button type="button" class="btn btn-sm <?php echo $ratingClass; ?>" aria-label="Left Align">
				  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
				</button>	
				<?php } ?>				
			</div>
			<div class="col-sm-3">
				<?php
				$fiveStarRatingPercent = round(($fiveStarRating/5)*100);
				$fiveStarRatingPercent = !empty($fiveStarRatingPercent)?$fiveStarRatingPercent.'%':'0%';	
				
				$fourStarRatingPercent = round(($fourStarRating/5)*100);
				$fourStarRatingPercent = !empty($fourStarRatingPercent)?$fourStarRatingPercent.'%':'0%';
				
				$threeStarRatingPercent = round(($threeStarRating/5)*100);
				$threeStarRatingPercent = !empty($threeStarRatingPercent)?$threeStarRatingPercent.'%':'0%';
				
				$twoStarRatingPercent = round(($twoStarRating/5)*100);
				$twoStarRatingPercent = !empty($twoStarRatingPercent)?$twoStarRatingPercent.'%':'0%';
				
				$oneStarRatingPercent = round(($oneStarRating/5)*100);
				$oneStarRatingPercent = !empty($oneStarRatingPercent)?$oneStarRatingPercent.'%':'0%';
				
				?>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $fiveStarRatingPercent; ?>">
							<span class="sr-only"><?php echo $fiveStarRatingPercent; ?></span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;"><?php echo $fiveStarRating; ?></div>
				</div>
				
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $fourStarRatingPercent; ?>">
							<span class="sr-only"><?php echo $fourStarRatingPercent; ?></span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;"><?php echo $fourStarRating; ?></div>
				</div>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $threeStarRatingPercent; ?>">
							<span class="sr-only"><?php echo $threeStarRatingPercent; ?></span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;"><?php echo $threeStarRating; ?></div>
				</div>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $twoStarRatingPercent; ?>">
							<span class="sr-only"><?php echo $twoStarRatingPercent; ?></span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;"><?php echo $twoStarRating; ?></div>
				</div>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $oneStarRatingPercent; ?>">
							<span class="sr-only"><?php echo $oneStarRatingPercent; ?></span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;"><?php echo $oneStarRating; ?></div>
				</div>
			</div>		
			<div class="col-sm-3">
			<?php if(isset($cid)){ 
					echo'<button type="button" id="rateProduct" class="btn btn-default">Rate this product</button>';
				}else{
					echo"<button onclick='visitor()' class='btn btn-default'>Rate this product</button>";
				}
				
			?>
			<script>
			function visitor(){
				alert("Visitor is not allow rate product");
			}
			</script>

			</div>		
		</div>
		<div class="row">
			<div class="col-sm-7">
				<hr/>
				<div class="review-block">		
				<?php
				
				$ratinguery = "SELECT ratingId, itemId, itemName, userId, ratingNumber, title, comments, created, modified FROM item_rating where itemId='$pid'";
				$ratingResult = mysqli_query($conn, $ratinguery) or die("database error:". mysqli_error($conn));
              
				while($rating=mysqli_fetch_assoc($ratingResult)){
					$date=date_create($rating['created']);
					$reviewDate = date_format($date,"M d, Y");			
				?>

					<div class="row">
						<div class="col-sm-3">
							<div class="review-block-name">By anonymous</div>
							<div class="review-block-date"><?php echo $reviewDate; ?></div>
						</div>
						<div class="col-sm-9">
							<div class="review-block-rate">
								<?php
								for ($i = 1; $i <= 5; $i++) {
									$ratingClass = "btn-default btn-grey";
									if($i <= $rating['ratingNumber']) {
										$ratingClass = "btn-warning";
									}
								?>
								<button type="button" class="btn btn-xs <?php echo $ratingClass; ?>" aria-label="Left Align">
								  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
								</button>								
								<?php } ?>
							</div>
							<div class="review-block-title"><?php echo $rating['title']; ?></div>
							<div class="review-block-description"><?php echo $rating['comments']; ?></div>
						</div>
					</div>
					<hr/>					
				<?php } ?>
				</div>
			</div>
		</div>	
	</div>
	<div id="ratingSection" style="display:none;">
		<div class="row">
			<div class="col-sm-12">
				<form id="ratingForm" method="POST">					
					<div class="form-group">
						<h4>Rate this product</h4>
						<button type="button" class="btn btn-warning btn-sm rateButton" aria-label="Left Align">
						  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
						  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
						  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
						  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
						  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						</button>

						<input type="hidden" class="form-control" id="rating" name="rating" value="1">
						<?php echo'<input type="hidden" class="form-control" id="itemId" name="itemId" value="'.$pid.'" >'; ?>
						<?php echo'<input type="hidden" class="form-control" id="itemName" name="itemName" value="'.$pname.'" >'; ?>
						<?php echo'<input type="hidden" class="form-control" id="cid" name="cid" value="'.$cid.'" >'; ?>
					</div>
				<?php } ?>
					<div class="form-group">
						<label for="usr">Title*</label>
						<input type="text" class="form-control" id="title" name="title" required>
					</div>
					<div class="form-group">
						<label for="comment">Comment*</label>
						<textarea class="form-control" rows="5" id="comment" name="comment" style="resize:none;" required></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-info" name="saveReview" id="saveReview">Save Review</button> 
						<button type="button" class="btn btn-info" id="cancelReview">Cancel</button>
					</div>			
				</form>
			</div>
		</div>
	</div>				
	<div style="margin:50px 0px 0px 0px;">
		<a class="btn btn-default read-more" style="background:#3399ff;color:white" href="javascript:history.back()">Back</a>		
	</div>
	
</div>	
<?php 
include('foot.php');
?>

