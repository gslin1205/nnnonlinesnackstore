<?php include("dataconnection1.php");
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@1,300&display=swap" rel="stylesheet">


  <title>Product Details</title>

<title></title>

<style>

*
{margin:0px;
  padding:0px;
  box-sizing:border-box;
		
}

table {
    border-collapse: separate;
}

body{
	background-color: #c1d0d9;
	padding:0;
}
.pd_all{
	padding: 90px 40px 50px 40px ;
	
}

.carousel-inner > .item > img{
    width: 45vh;
	height: 45vh;
	display:flex;
  }

.text-center{
	padding: 30px 0 30;
	font-size: 27pt;
	font-weight:normal;
}

.item{
	width:45vh;
    height:45vh;
    display:flex;
    
    }

.item000{
	width:80%;
    height:100%;
    display: flex;
	justify-content: center;
    }
  

.item12{
  display:flex;
  height:80%;
  top: 2vh;
  
  }
 
.item123{
  display:flex;
  flex-direction:column;
  line-height: 30px;
  width:100%;
  padding: 0 0 0 50px;
  
}



.dk123{
  
  height:70vh;
  display:flex;
  flex-wrap: wrap;
  
}

.dk123 input{
    height:30px;
    width:30px;
}

.title h2{
	text-align: center;
	font-size: 21pt;
	padding-bottom: 25px;
	padding-top: 10px;
	letter-spacing: 0.5px;
	word-spacing: 2px;
}


.form-submit{
	border: 2px solid transparent;
	box-shadow: 0 0 30px 2px grey;
	background-color: #c1d0d9;
	width:100%;
	padding: 40px 0px 15px 200px;
}


.pname1{
	font-size: 22pt;
	font-family: noto;
}

.pprice1 {
	font-size: 22px;
	font-family: helvetica;
}

.pstock1{
	font-size: 15px;
	opacity: 50%;
	font-weight:600;
}

.expiry{
	width:100%;
}

.word{
	
	font-size: 12pt;
}

.words{
	font-family: 'Fraunces', serif;
	font-size: 12pt;
	font-weight:600;
	letter-spacing:0.05em;
	word-spacing:5px;

}



button.btn{
	padding: 5px;
	background-color: transparent;
}

.btn:hover{
	background-color: #5a768c;
	cursor: pointer;
	color:white;
}

.footer{
    width: 100%;
    height: 40vh;
}

.center {
	margin: auto;
	width: 80%;
	text-align: center;
	border: 3px solid ;
	border-color: #8db2c4;
}

.fcenter a{
	text-decoration: none;
	font-weight: normal;
}

.fcenter1 p{
	text-decoration: none;
	font-weight: normal;
}

.fright a{
	text-decoration: none;
	font-weight: normal;
}

a.nav-link{
	font-weight: normal;
}

h3{
	font-size:10pt;
	font-weight:bold;
}

a.image-link {
	height:900px;
}

.modal {
z-index:1;
display:none;
padding-top:10px;
position:fixed;
left:0;
top:0;
width:100%;
height:100%;
overflow:auto;
background-color:rgb(0,0,0);
background-color:rgba(0,0,0,0.8);
font-size: 5rem;
}

.modal-content{
    display: inline-block;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    right: 50%;
    width: 40%;
	max-width: 350px;
    text-align: center;
	font-size: 5rem;
}


.modal-hover-opacity {
opacity:1;
filter:alpha(opacity=100);
-webkit-backface-visibility:hidden;
}

.modal-hover-opacity:hover {
opacity:0.60;
filter:alpha(opacity=60);
-webkit-backface-visibility:hidden;
}


p.close{
text-decoration:none;
float:right;
font-weight:bold;
color:white;
cursor:pointer;
font-size: 5rem;
}

.container1 {
width:200px;
display:inline-block;
}

.modal-content, #caption 
{   
  
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}


@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

.minus, .plus {
    border: none;
    width: 30px;
	height:30px;
    font-size: 16px;
}

input[type=number].quantity::-webkit-inner-spin-button { 
   -webkit-appearance: none; 
    margin: 0; 
}

.quantity {
    padding: 10px;
    border: none;
    width: 40px;
}

.form-control[disabled], fieldset[disabled] .form-control {
    cursor:default;
}
.pd12 
{
	display:flex;
	padding-left: 20px;
	
}
.pd12 input[type="number"]
{
	width:40px;
	height: 30px;
}

.qty2{
	display:flex;
}

.atcbtn{
	font-weight: bold;
}
</style>
 

</head>
<body>
<?php include("header.php");?>
<div id="message"></div>
<a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
  
		<?php
		    if(isset($_GET["view"]))
			{
			$pid = $_GET["pid"];

			$result = mysqli_query($connect, "SELECT pimg,pimg2, pimg3, pid, pname, pprice, expiry, pstock, origin, pdesc,pqty from products where pid='$pid'");
			
			$row = mysqli_fetch_assoc($result);
			}
		?>
		                                                                    <div class="pd_all">                               
		<b><div class="text-center">Product Details</div></b><p/>
		
	<form action="" class="form-submit">
      <div class="item000">  


    <div class="item12 carousel slide" id="myCarousel" >
		<!--Indicators-->
		<ol class="carousel-indicators img123">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>
		
		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<div class="item active">
				<img src="pimg/<?php echo $row['pimg'];?>" onclick="onClick(this)" class="modal-hover-opacity" style="cursor:pointer;" alt="img1" >
			</div>

			<div class="item">
				<img src="pimg/<?php echo $row['pimg2'];?>" onclick="onClick(this)" class="modal-hover-opacity" style="cursor:pointer;" alt="img2">
			</div>

			<div class="item">
			  <img src="pimg/<?php echo $row['pimg3'];?>" onclick="onClick(this)" class="modal-hover-opacity" style="cursor:pointer;" alt="img3">
			</div>
		</div>
		
		
		
		<!-- Left and right controls -->
		  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
			
		  </a>
		  <a class="right carousel-control" href="#myCarousel" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			
		  </a>
    </div>
	  
	  <div id="modal01" class="modal" onclick="this.style.display='none'">
			  <p class="close">&times;&nbsp;&nbsp;&nbsp;&nbsp;</p>
			  <div class="modal-content">
				<img id="img01" style="max-width:100%">
			  </div>
		</div>
		
      <div class="item123" >
        <span class="pname1"> <b><?php echo $row["pname"];?> </b></span> 
		<span class="pprice1">   RM <?php echo $row["pprice"];?>  </span>
		<span class="pstock1"> <?php echo $row["pstock"];?> stocks </span>
        <span class="expiry word"> Expiry &nbsp: &nbsp<span class="words"><?php echo $row["expiry"];?> </span></span>
        <span class="word">   Origin &nbsp: &nbsp<span class="words"><?php echo $row["origin"];?>  </span></span>
        <hr>
        <span class="word"> Description &nbsp: <p><span class="words"><?php echo $row["pdesc"];?> </span></span>


		<input type="hidden" class="pid" value="<?= $row['pid'] ?>">
                <input type="hidden" class="pname" value="<?= $row['pname'] ?>">
                <input type="hidden" class="pprice" value="<?= $row['pprice'] ?>">
                <input type="hidden" class="pimage" value="<?= $row['pimg'] ?>">
				<input type="hidden" class="pcode" value="<?= $row['pid'] ?>">	
		
		<?php if($row["pstock"]=="0")
				{ ?>
					<div class="qty2">
						<p>Quantity &nbsp; &nbsp; &nbsp; :
							<div class="pd12">
								<input type="number" class="form-control pqty" value="0" disabled> 
							</div>&nbsp
					
					<?php
					echo ' OUT OF STOCK ';
					?> </div>
					<?php
				}
				
			  else
				
				{
					if(isset($_SESSION["cid"]))
					{ ?>
						
						<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
						
						<div class="qty2">
							<p>Quantity &nbsp; &nbsp; &nbsp; :
							<div class="pd12 quantity-block">
								<input class="minus" type="button" value="-">
								<input type="number" class="form-control pqty quantity" value="<?= $row['pqty'] ?>" max="<?= $row['pstock'] ?>" min="1" onkeyup="if(this.value<0){this.value= this.value * -1}" disabled>
								<input class="plus" type="button" value="+">
							</div>
						</div>
						
						<button type="submit" class="btn btn-info btn-block addItemBtn"><i class="fa-fa-cart-plus"></i>&nbsp;&nbsp;<span class="atcbtn">Add to cart</span>&nbsp;&nbsp;</button>  	
					<?php }
				
					else 
					{ ?>
						<p>
						
						<div class="qty2">
							Quantity &nbsp; &nbsp; &nbsp; : 
							<div class="pd12 quantity-block">
								<input class="minus" type="button" value="-">
									<input type="number" class="form-control pqty quantity" value="<?= $row['pqty'] ?>" max="<?= $row['pstock'] ?>" min="1" onkeyup="if(this.value<0){this.value= this.value * -1}" disabled>
								<input class="plus" type="button" value="+">
							</div>
						</div>
						<br>
						<button type="submit" class="btn btn-info btn-block addItemBtn" onclick="login()"><i class="fa-fa-cart-plus"></i>&nbsp;&nbsp;Add to cart&nbsp;&nbsp;</button>
					<?php }
				} ?>
				

<script>
function login()
{
	alert("Please log in!");
	window.location="login.php";
}
</script>

	</div>
	&nbsp;&nbsp;
        
    </div></div>
		<div class="center">
      <?php include("review.php") ?>
	  </div>
	</form>
	  <span class="title"><h2>Also You May Like</h2></span><br>
	
      <div  class="dk123">

      <?php include("related.php"); ?>
            
      </div>
        <span>  <input type="hidden" class="pid" value="<?= $row['pid'] ?>">     </span>  
      <p> <input type="hidden" class="pname" value="<?= $row['pname'] ?>"> </p> 
		  <p>  <input type="hidden" class="pimage" value="<?= $row['pimg'] ?>"> </p>
      <p> <input type="hidden" class="pcode" value="<?= $row['pid'] ?>">  </p>

</div>
 <!-- Displaying Products End -->

	<section class="footer">
	<?php include("footer1.php")?>
	</section>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Send product details in the server
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pqty = $form.find(".pqty").val();
	  var pcode = $form.find(".pcode").val();

      $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
		  pcode : pcode
        },
        success: function(response) {
          $("#message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  
$('.plus').on('click', function(e) {
    var val = parseInt($(this).prev('input').val());
     if (val < $(this).prev('input').attr('max'))
       {
    $(this).prev('input').attr('value', val + 1);
         }
});

$('.minus').on('click', function(e) {
    var val = parseInt($(this).next('input').val());
    if (val !== 1) {
        $(this).next('input').attr('value', val - 1);
    }
});


$(document).ready(function() {
  $('.template-article img').each(function() {
      var currentImage = $(this);
      currentImage.wrap("<a class='image-link' href='" + currentImage.attr("src") + "'</a>");
  });
  $('.image-link').magnificPopup({type:'image'});  
});

function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
}
  </script>
</body>
</html> 