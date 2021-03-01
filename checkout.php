<?php
if(isset($_GET["check"]))
{
	$cid=$_GET['cid'];

	require 'dataconnection1.php';

	$totalprice = 0;
	$allItems = '';
	$items = [];

	$sql = "SELECT CONCAT(product_name, '(',qty,')') AS ItemQty, total_price FROM cart";
	$stmt = $connect->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
	  $totalprice += $row['total_price'];
	  $items[] = $row['ItemQty'];
	}
	$allItems = implode('<br>', $items);

if(isset($_POST["submit"]))
{
	header("refresh:0.5; url=Order.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form name="checkout" action="" autocomplete="on" method="post" id="placeOrder" onsubmit="menu()">
      <h2>Complete your order!</h2>
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
			<input type="hidden" name="products" value="<?= $allItems; ?>">
			<input type="hidden" name="totalprice" value="<?= $totalprice; ?>">
			<div class="form-group">
			<?php echo'<input type="hidden" class="form-control" id="oid" name="oid" value="'.$cid.'" >'; ?>
			</div>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
			<div class="form-group">
			<input type="text" name="name" placeholder="Enter Name" required>
			</div>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
			<div class="form-group">
			<input type="text" name="email" placeholder="Enter E-Mail" required>
			</div>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
			<div class="form-group">
            <input type="text" name="address" placeholder="Enter Delivery Address Here...">
			</div>
            <label for="city"><i class="fa fa-institution"></i> Phone No.</label>
			<div class="form-group">
            <input type="text" id="city" name="phone" placeholder="Enter Phone Number">
			</div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="Enter Name on Card">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="xxxx-xxxx-xxxx-xxxx">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="xx">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="xxxx">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="xxx">
              </div>
            </div>
          </div>
        </div>
		<div class="form-group">
        <input type="submit" name="submit" value="Continue to checkout" class="btn btn-danger btn-block">
		</div>
      </form>
    </div>
  </div>
  <div class="col-25">
    <div class="container">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i></span></h4>
	  <h6 class="lead"><b>Product(s) :<br> </b><?= $allItems; ?></h6>
      <hr>
      <p>Total Price<span class="price" style="color:black"><b><?= number_format($totalprice,2) ?></b></span></p>
    </div>
  </div>
</div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Sending Form data to the server
    $("#placeOrder").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: 'action.php',
        method: 'post',
        data: $('form').serialize() + "&action=order",
        success: function(response) {
          $("#order").html(response);
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

function menu(){
alert("Your Purchase has done! You will reload to main page after submit the OK buttons");
window.location.href = "index.php";
}
</script>

</body>
</html>
<?php } ?>