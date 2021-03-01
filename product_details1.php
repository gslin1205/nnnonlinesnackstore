<?php include("dataconnection1.php");

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
  <title>Product Details</title>

<title></title>

<style>
*
{margin:0px;
  padding:0px;
  box-sizing:border-box;
		
}
  .item{

    width:100%;
    height:70vh;
      display:flex;
      justify-content:left;
     align-items:center;
    
    }
  .item img{

    width:300px;
    height:300px;
    margin-right:10vw;
   
  }

  .item12{

  display:flex;
    
  }
 
.item123{
  display:flex;
  flex-direction:column;
}

.dk123{
  
  height:40vh;
  width:100vw;
  display:flex;
  flex-wrap: wrap;


  
}

.dk123 input{
    height:30px;
    width:30px;
}

.title h3{
	text-align: center;
}
</style>
 

</head>
<body>

<a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
 
	<b><h1 class="text-center">Product Details</h1></b>
  
	<?php
	if (isset($_POST['submit'])) {
    $data = $_POST['search'];

    $sql = "SELECT * FROM products WHERE pname ='$data' ";
    $result = $connect->query($sql);
	
    $row = $result->fetch_assoc();
		        

	echo"
	<br>
	<form action='' class='form-submit'>
	<div class='item'>
	
		<div class='item12'>
			<img src='pimg/".$row['pimg']."'>
		</div>
	
		<div class='item123' >
			<b>" .$row['pname']."<br></b>
			" .$row['pstock']." stocks remaining <br>	
			RM " .$row['pprice']." <br>
			Expiry : " .$row['expiry']."<br>		
			Origin : " .$row['origin']."<br>
			Description : " .$row['pdesc']."<br>
			
			<input type='number' class='form-control pqty' class='123' value=".$row['pqty']." max=".$row['pstock']." min='0'>
		</div>
	</div>
	
	<input type='hidden' class='pid' value=" .$row['pid'].">
    <input type='hidden' class='pname' value=" .$row['pname'].">
    <input type='hidden' class='pprice' value=" .$row['pprice'].">
    <input type='hidden' class='pimage' value=" .$row['pimg'].">
	<input type='hidden' class='pcode' value=" .$row['pid'].">
				
	
	<div class='dk'>
	<button class='btn btn-info btn-block addItemBtn'><i class='fas fa-cart-plus'></i>&nbsp;&nbsp;Add to cart</button>   
	
	
    <a href='javascript:history.go(-1)' >Cancel</a>
	</div>
	</form>
  ";} 
  
	else {
		header('location: .');
    exit();
  }?>
      
	  
	  <span class="title"><h3>Also You May Like</h3></span>
	
      <div  class="dk123">

      <?php include("related.php"); ?>
            
      </div>
        <span>  <input type="hidden" class="pid" value="<?= $row['pid'] ?>">     </span>  
      <p> <input type="hidden" class="pname" value="<?= $row['pname'] ?>"> </p> 
		  <p>  <input type="hidden" class="pimage" value="<?= $row['pimg'] ?>"> </p>
      <p> <input type="hidden" class="pcode" value="<?= $row['pid'] ?>">  </p>


 <!-- Displaying Products End -->

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
  </script>
</body>
</html> 