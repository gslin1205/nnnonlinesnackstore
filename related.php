<!--Products you may like-->
<style>
.relate{

height:350px;
width:240px;
display:flex;
margin-left:11vw;
background-color:#b2c8d4;

}

.relatedrelate{
	border-style: ridge;
	padding: 12px 15px;
	width: 100%;
}

.relatedname{
	text-align: center;
}

.relateimg{
	
	background-color: white;
	text-align: center;
}

.relateprice{
	font-size: 13pt;
	line-height: 30pt;
	font-family: helvetica;
}

.relatedtitle{
	font-size: 15pt;
	padding: 1px 2px;
	text-align: center;
}

.relatedetails{
	//background-color: #328da8;
	padding: 5px 10px;
	font-family: helvetica;
}

.btn2 {
	
}

.btn2:hover{
	color: purple;
	background-color: #5a768c;
}

.btn2 a button{
	text-decoration: none;
	color: black;
	width: 100%;
	border: none;
	height: 27px;
}

.btn2 a button:hover{
	background-color: #5a768c;
	color: white;
	cursor: pointer;
}

</style>

<br>
<?php 
$related="SELECT * FROM products WHERE p_isdelete='0' ORDER BY rand() LIMIT 3 ";
$products=mysqli_query($connect, $related);

while($row = $products->fetch_assoc()):
		?>
		
	<div class="relate">  
      
       <div class="relatedrelate">
		<div class="relateimg">
       <img src="pimg/<?= $row['pimg'] ?>" height="180" width="200">
        </div>
		
		<div class="relatedetails">		
            <b><p class="relatedtitle"><?= $row['pname'] ?></p></b>
      

        <div class="relatedname">  
			<span class="relateprice">
				RM&nbsp;&nbsp;<?= number_format($row['pprice'],2) ?>
			</span> 
                 
			<input type="hidden" class="pid" value="<?= $row['pid'] ?>">
			<p>
			
            <div class="btn2">
				<a href="product_details.php?view&pid=<?php echo $row['pid']; ?> " class="btn btn-info btn-block" ><button>Details</button></a>
			</div>
			
		</div>
      
        </div>
		</div>
    </div>
      

<?php endwhile; ?>
	  
   