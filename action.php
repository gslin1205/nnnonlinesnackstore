<?php
	session_start();
	require 'dataconnection1.php';

	// Add products into the cart table
	if (isset($_POST['pid'])) {
	  $pid = $_POST['pid'];
	  $pname = $_POST['pname'];
	  $pprice = $_POST['pprice'];
	  $pimage = $_POST['pimage'];
	  $pcode = $_POST['pcode'];
	  $pqty = $_POST['pqty'];
	  $total_price = $pprice * $pqty;

	  $stmt = $connect->prepare('SELECT product_code FROM cart WHERE product_code=?');
	  $stmt->bind_param('s',$pcode);
	  $stmt->execute();
	  $res = $stmt->get_result();
	  $r = $res->fetch_assoc();
	  $code = $r['product_code'] ?? '';

	  if (!$code) {
	    $query = $connect->prepare('INSERT INTO cart (product_name,product_price,product_image,qty,total_price,product_code) VALUES (?,?,?,?,?,?)');
	    $query->bind_param('ssssss',$pname,$pprice,$pimage,$pqty,$total_price,$pcode);
	    $query->execute();

	    echo '<div class="alert alert-success alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Item added to your cart!</strong>
						</div>';
	  } else {
	    echo '<div class="alert alert-danger alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Item already added to your cart!</strong>
						</div>';
	  }
	}

	// Get no.of items available in the cart table
	if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
	  $stmt = $connect->prepare('SELECT * FROM cart');
	  $stmt->execute();
	  $stmt->store_result();
	  $rows = $stmt->num_rows;

	  echo $rows;
	}

	// Remove single items from cart
	if (isset($_GET['remove'])) {
	  $id = $_GET['remove'];
	  $stmt = $connect->prepare('DELETE FROM cart WHERE id=?');
	  $stmt->bind_param('i',$id);
	  $stmt->execute();

	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'Item removed from the cart!';

	  $URL="cart.php?cart&cid=$_SESSION[cid]";
	  echo '<META HTTP-EQUIV="refresh" content="0; URL=' . $URL . '">';
	}

	// Remove all items at once from cart
	if (isset($_GET['clear'])) {
	  $stmt = $connect->prepare('DELETE FROM cart');
	  $stmt->execute();
	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'All Item removed from the cart!';
	  $URL="cart.php?cart&cid=$_SESSION[cid]";
	  echo '<META HTTP-EQUIV="refresh" content="0; URL=' . $URL . '">';
	}

	// Set total price of the product in the cart table
	if (isset($_POST['qty'])) {
	  $qty = $_POST['qty'];
	  $pid = $_POST['pid'];
	  $pprice = $_POST['pprice'];

	  $tprice = $qty * $pprice;

	  $stmt = $connect->prepare('UPDATE cart SET qty=?, total_price=? WHERE id=?');
	  $stmt->bind_param('isi',$qty,$tprice,$pid);
	  $stmt->execute();
	}

	// Checkout and save customer info in the orders table
	if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
 
	  $oid = $_POST['oid'];
	  $name = $_POST['name'];
	  $email = $_POST['email'];
	  $phone = $_POST['phone'];
	  $products = $_POST['products'];
	  $totalprice = $_POST['totalprice'];
	  $address = $_POST['address'];
	  //$qty = $_POST["qty"];
	  //$balance = $row["pstock"] - $qty;
	  $data = '';
	  
	  $stmt = $connect->prepare('INSERT INTO orders (oid,name,email,phone,address,products,totalprice)VALUES(?,?,?,?,?,?,?)');
	  $stmt->bind_param('sssssss',$oid,$name,$email,$phone,$address,$products,$totalprice);
	  $stmt->execute();
	 // $stmt2 = $connect->prepare('DELETE FROM cart');
	  //$stmt2->execute();
	  $cartresult = $connect->prepare("SELECT * FROM cart");
	  $cartresult->execute();
	  $result = $cartresult->get_result();	
	  foreach($result as $i){
		$qty=$i['qty'];
		$productId=$i['product_code'];
		$stmt3 = $connect->prepare('UPDATE products SET pstock=pstock-? WHERE pid=?');
		$stmt3->bind_param('is',$qty,$productId);
		$stmt3->execute();
	}
	 $stmt2 = $connect->prepare('DELETE FROM cart');
	 $stmt2->execute();
}	
?>