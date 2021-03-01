<?php include("dataconnection1.php");?>
<!doctype html>
<html lang="en">
<head>
    <title>NNN</title>
	
<style>
/* Hero Demo Content*/
.hero{
    width: 100%;
    height: 100vh;
    background: url("timg/bg2_1.jpg") center no-repeat;
    background-size: cover;
    position: relative;
}

.center{
	position: absolute;
	top: 50%;
	left: 23%;
	transform: translate(-50%, -50%);
	text-align: left;
	color: white;
}

.nnn{
	font-family: Times-New Roman;
	font-size: 100px;
}

.nnn2{
	font-size: 30px;
}

.nnn3{
	font-size: 15px;
	
}

.center2{
	padding:90px 0 50px;
	text-align: center;
	color: white;
}

.prod1{
	font-size: 45px;
	font-family: 'Cormorant Garamond', serif;
	color: #3a506e;
	
}

.prod2{
	font-size: 15px;
	color: #2d3f57;
}

#nav-shop{
    display: inline-block;
    background-color: transparent;
    color: #000000;
    padding: 1rem 2rem;
    border-radius: 2rem;
	border-style: groove;
	border-width: 1.3px;
	text-decoration: none;
    transition: background-color .5s ease;
}

#nav-ss:hover{
    background-color: #698999;
	border-color: #698999;
	color:#34495e;

}

#nav-ss{
    display: inline-block;
    background-color: transparent;
    color: black;
    padding: 1rem 2rem;
    border-radius: 2rem;
	border-color: black;
	border-style: groove;
	border-width: 1.3px;
	text-decoration: none;
    transition: background-color .5s ease;
}

.ss2{
	position: absolute;
	top: 185%;
	left: 50%;
	transform: translate(-50%, -50%);
	text-align: center;
}

#nav-shop:hover{
    background-color: #304247;
	border-color: #304247;
	color:#698999;

}

.hero::after{
    content: '';
    width: inherit;
    height: inherit;
    position: absolute;
    top: 0;
    left: 0;
    background-color: rgba(0,0,0,.3);
}

.ss{
    width: 100%;
    height: 98vh;
    background-color: #34495e;
}




.prod{
    width: 100%;
    height: 270vh;
    background-color: #698999;
	
}

.about{
    width: 100%;
    height: 90vh;
    background-color: #34495e;
}

.footer{
    width: 100%;
    height: 40vh;
    background-color: white;
}

/* Hero end*/

	</style>
</head>
<body>
    <?php include("header.php");?>

	
    <section class="hero"></section>
		<div class="center">
			<div class="nnn" ><b>N N N</b> </div>
			<div class="nnn2">S N A C K   &nbsp S T O R E</div>
			<br>
			<div class="nnn3"><em>Turn Your Favourite Snack Into Your Shopping List Now !</em></div>
			<br/>
			 <a href="#ss" id="nav-shop"><b>GET STARTED</b></a>
		</div>
	
	
	
	<section class="ss" id="ss">
		<?php include("slideshow.php")?>
		<div class="ss2">
		<a href="#p" id="nav-ss"><b>NEXT</b></a>
		</div>
	</section>
	
	
	<section class="prod" id="p">
	
	<div class="center2">
		<div class="prod1">Morsel, Nibble, Delicious</div><br>
		<div class="prod2">Order Now and Get Same-Day Delivery</div>
	</div>
	<?php include("related2.php")?>
	</section>
	
	<section class="about" id="bottom">
	<?php include("bottom.php")?>
	</section>
	
	<section class="footer">
	<?php include("footer1.php")?>
	</section>
	
    
</body>
</html>