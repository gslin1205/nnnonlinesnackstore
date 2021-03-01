<?php

//fetch_data.php

include('dataconnection1.php');

if(isset($_POST["action"])) 
{
	//yaha par wo product select karega jiska statu 1 hoga
	
	$sql = "SELECT products.pid, products.pname, products.pimg, products.pprice, products.pstock, categories.catename from products INNER JOIN categories ON products.categid = categories.categid WHERE p_isdelete = '0' ";
	
	
	if(isset($_POST["catename"]))
	{
		$catename_filter = implode("','", $_POST["catename"]);
		
		$sql.=" AND catename IN('".$catename_filter."')
		 
		";
	}
	if(isset($_POST["origin"]))
	{
		$origin_filter = implode("','", $_POST["origin"]);
		$sql .= "
		 AND origin IN('".$origin_filter."')
		";
	}

	$result = $connect->query($sql);
	
	$output = '';
	if($result->num_rows>0)
	{
		while($row = $result->fetch_assoc())
		{
			$output .='<div class="col-sm-6 col-md-4 col-lg-3 mb-2">
					<div class="card-deck" >
					  <div class="card p-2 border-secondary mb-2">
					  
				
						<img src="pimg/'.$row['pimg'].'" class="card-img-top" height="190" width="250">
						<div class="card-body p-1">
						  <h4 class="card-title text-center text-info">'.$row['pname'].'</h4>
						  

						</div>
						<div class="card-footer p-1">
						  <form action="" class="form-submit">
						  <h5 class="card-text text-center text-danger">&nbsp;&nbsp;RM '. number_format($row['pprice'],2) .'</h5>
							<div class="row p-2">
							
							  
							</div>
							<input type="hidden" class="pname" value="'. $row['pname'] .'">
							<input type="hidden" class="pprice" value="'. $row['pprice'] .'">
							<input type="hidden" class="pimg" value="pimg/'. $row['pimg'] .'">
							<input type="hidden" class="pcode" value="'.$row['pid'] .'">
							
								<a href="product_details.php?view&pid='.$row ['pid'].'" class="btn btn-info btn-block">Details</a>
								
						  
						  
						  </form>
						</div>
					  </div>
					</div>
				  </div>';
		}
	}
	else
	{
		$output = '<h3>No Records Found</h3>';
	}
	echo $output;
}

?>
