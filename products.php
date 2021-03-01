<?php 
	include('dataconnection1.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
	<meta name="author" content="Sahil Kumar">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,  shrink-to-fit=no ">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Product filter in php</title>

	<!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet"><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css'/>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>

.p_all{
    font-family: 'Roboto', sans-serif;
    font-size: 12pt;
}


body{
	background-color: #b0c9d9;
	padding:0;
}

.input-group{
	padding:90px 100px 35px 95px;
}

.p1{
	padding: 100px 0 0 0;
}

.container-fluid{
	padding: 100px 0 0 10;
}

.footer{
    width: 100%;
    height: 40vh;
}

</style>

</head>

<?php include("header.php");?>
<body style="margin-top: 10px;">
<!-- Search -->
<div class="p_all">

<form action="product_details1.php" method="post" class="p-3">

		<div class="input-group">
			<input type="text" name="search" id="search" class="form-control form-control-lg rounded-0 border-info" placeholder="Search Products" autocomplete="off" required>
            <div class="input-group-append">
              <input type="submit" name="submit" value="Search" class="btn btn-info btn-lg rounded-0">
            </div>
        </div>
    </form>
		
		
		
    <div class="col-md-5" style="position: relative;margin-top: -75px;margin-left: 95px;">
        <div class="list-group" id="show-list">
          <!-- Here autocomplete list will be display -->
        </div>
	</div>




        <div class="container-fluid">
		<div class="row">
        	<div class="col-lg-3">                				
				<div class="list-group">
				<h5>Filter Products</h5>
				
                			
                <div class="list-group">
				<hr>
					<h4>Category</h4>
                    <div style="height: 300; overflow-y: auto; overflow-x: hidden;">
					<?php

                    $sql="SELECT DISTINCT categories.catename FROM categories INNER JOIN products ON categories.categid = products.categid WHERE p_isdelete=0 ORDER BY catename";
					$result = $connect->query($sql);
						
					while($row = $result->fetch_assoc())
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector catename" value="<?php echo $row['catename']; ?>"  > <?php echo $row['catename']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
                    </div>
                </div>

				<div class="list-group">
					<h4>Origin</h4>
					<div style="height: 300; overflow-y: auto; overflow-x: hidden;">
                    <?php

                    $sql="SELECT DISTINCT origin FROM products WHERE p_isdelete=0 ORDER BY origin";
					$result = $connect->query($sql);
						
						while($row = $result->fetch_assoc())
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector origin" value="<?php echo $row['origin']; ?>" > <?php echo $row['origin']; ?></label>
                    </div>
                    <?php    
                    }

                    ?>
                </div> </div>
				
            </div> </div> 

            <div class="col-lg-9">

			
			
			
			
			<h5 class="text-center" id="textChange">All Products</h5>
							<hr>
            	<br />
                <div class="row filter_data">
				<div class="container"></div>
				<div class="row mt-2 pb-3">
				</div>

                </div>
            </div>
        </div>

    </div>
	</div>
	<section class="footer">
	<?php include("footer1.php")?>
	</section>
<style>
#loading
{
	text-align:center; 
	background: url('loader1.gif') no-repeat center; 
	height: 150px;
}
</style>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
  
<script>
$(document).ready(function () {
  // Send Search Text to the server
  $("#search").keyup(function () {
    let searchText = $(this).val();
    if (searchText != "") {
      $.ajax({
        url: "action_search.php",
        method: "post",
        data: {
          query: searchText,
        },
        success: function (response) {
          $("#show-list").html(response);
        },
      });
    } else {
      $("#show-list").html("");
    }
  });
  // Set searched text in input field on click of search button
  $(document).on("click", "a", function () {
    $("#search").val($(this).text());
    $("#show-list").html("");
  });
});


$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        //store data in variable
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var catename = get_filter('catename');
        var origin = get_filter('origin');
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, catename:catename, origin:origin},
            success:function(data){
                $('.filter_data').html(data);
				$("#loader").hide();
            }
        });
		
		
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

<!--cart-->
     $(document).ready(function() {

    // Send product details in the server
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pcode = $form.find(".pcode").val();
      var pqty = $form.find(".pqty").val();

      $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
          pcode: pcode
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
	

});
</script>

</body>

</html>
