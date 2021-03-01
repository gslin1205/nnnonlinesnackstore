<html lang="en">

<head>
  <title>Harvest vase</title>
  <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi" rel="stylesheet">
  
 <style>
body {
  background-color: #fdf1ec;
}

.wrapper {
  height: 300px;
  width: 625px;
  margin: 50px auto;
  border-radius: 7px 7px 7px 7px;
  /* VIA CSS MATIC https://goo.gl/cIbnS */
  -webkit-box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
  box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
}

.product-img {
  float: left;
  height: 300px;
  width: 310px;
}

.product-img img {
  border-radius: 7px 0 0 7px;
}

.product-info {
  float: left;
  height: 300px;
  width: 315px;
  border-radius: 0 7px 10px 7px;
  background-color: #ffffff;
}

.product-text {
 width:100%;
 height:3vh;
}

.product-text h1 {
  margin: 0 0 0 38px;
  padding-top: 35px;
  font-size: 32px;
  color: #474747;
}

.product-text h1,
.product-price-btn p {
  font-family: 'Bentham', serif;
}

.product-text h2 {
  left:3vw;
  position:relative;
  font-size: 13px;
  font-family: 'Raleway', sans-serif;
  font-weight: 400;
  text-transform: uppercase;
  color: #d2d2d2;
  letter-spacing: 0.2em;
}

.product-text p {
  height: 125px;
  margin: 0 0 0 38px;
  font-family: 'Playfair Display', serif;
  color: #8d8d8d;
  line-height: 1.7em;
  font-size: 15px;
  font-weight: lighter;
  overflow: hidden;
}

.product-price-btn {
 
  position: relative;
}

.product-price-btn p {
  
  position:relative;
  top: 28vh;
  left:7vw;

  font-family: 'Trocchi', serif;
  
  font-size: 28px;
  font-weight: lighter;
  color: #474747;
}

span {
  display: inline-block;
  height: 50px;
  font-family: 'Suranna', serif;
  font-size: 34px;
}

.product-price-btn a {

  position:relative;
  height: 40px;
  width: 160px;
 top:33vh;
 left:6vw;
  box-sizing: border-box;
  border: transparent;
  border-radius: 60px;
  font-family: 'Raleway', sans-serif;
  font-size: 14px;
  font-weight: 500;
  text-transform: uppercase;
  text-decoration:none;
  letter-spacing: 0.2em;
  cursor: pointer;
  outline: none;
  padding: 14px 43px;
  
  
	background-color: white;
	color:#b0ddeb;
	border:#b0ddeb;
    border-radius: 2rem;
	border-style: groove;
}

.product-price-btn a:hover {
	
	background-color: #b0ddeb;
	color: #ffffff;
}

#nav-more{
    position:absolute;
    background-color: transparent;
    color: white;
    padding: 1rem 2rem;
    border-radius: 2rem;
	  border-style: groove;
	border-width: 1.3px;
	text-decoration: none;
    transition: background-color .5s ease;
   left:42vw;

}

#nav-more:hover{
    background-color: #304247;
	border-color: #304247;
	color:#698999;
}

#nav-more1{
  position:relative;
  left:46vw;
  top:6vw;  
    background-color: transparent;
    color: white;
    padding: 1rem 2rem;
    border-radius: 2rem;
	border-style: groove;
	border-width: 1.3px;
	text-decoration: none;
    transition: background-color .5s ease;

}

#nav-more1:hover{
    background-color: #304247;
	border-color: #304247;
	color:#698999;
}
.product-img img{
  height:300px ;
  width:310px;

}
 </style>
</head>

<body>
<?php 
$related="SELECT * FROM products WHERE p_isdelete='0' ORDER BY rand() LIMIT 3 ";
$products=mysqli_query($connect, $related);

while($row = $products->fetch_assoc()):
		?>
		
  <div class="wrapper">
    <div class="product-img">
	  <img src="pimg/<?= $row['pimg'] ?>" class="card-img-top">
    </div>
    <div class="product-info">

      <div class="product-text">
        <h1 class="card-title text-center text-info"><?= $row['pname'] ?></h1>
		  <h2><?= $row['pstock'] ?> stocks</h2>
      </div>

      <div class="product-price-btn">
		<p>RM&nbsp;&nbsp;<span><?= number_format($row['pprice'],2) ?></span> </p>
		<a href="product_details.php?view&pid=<?php echo $row['pid']; ?> ">Details</a>
		
      </div>
    </div>
  </div>
<?php endwhile; ?>

<a href="products.php" id="nav-more"><b>MORE PRODUCTS</b></a>
<a href="#bottom" id="nav-more1"><b>NEXT</b></a>

</body>

</html>