<!DOCTYPE html>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
<head>
<title>About NNN</title>

<style>
@font-face{
	font-family: casual;
	src: url(font/casual.ttf);
}

body{
	background-color: #c1d0d9;
}

.title{
    position: absolute;
	top: 30%;
	left: 50%;
	transform: translate(-50%, -50%);
	text-align: center;
	color: #34495e;
	font-size: 50px;
	font-family: "casual";
}

.column {
  float: center;
  text-align: center;
  
 
}


/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;

}

.row {
  display: flex;
  margin-top: 250px;
	margin-left: auto;
	margin-right: auto;
  border-color: 1px;
  border-style: groove;
  padding: 0;
  width: 900px;
}

#c1 {
  text-align: center;
  flex:70%;
  padding: 80px 100px 50px 100px;
  font-family: courier new;
  line-height: 17px;
  font-size: 12px;
}

#c2 {
  flex:20%;
  padding:0;
}
</style>
</head>

<body>

<?php include("header.php");?>
<div class="title">About NNN</div>

<div class="row">
	  <div class="column" id="c1">
		<h2>Providing Snacks Since 2020</h2>
		<p>&nbsp </p><p>&nbsp </p>
		Welcome to NNN Snack Store, <p/>your number one source for all snacks. We're dedicated to giving you the very best of snacks, with a focus on dependability, customer service and uniqueness.
		<p>&nbsp </p>
		Founded in 2020 by Jenelle, NNN Snack Store has come a long way from its beginnings in a home office. When Jenelle first started out, her passion for providing the best snacks for her fellow friends drove her to do intense research and gave her the impetus to turn hard work and inspiration into to a booming online store. We now serve customers all over the Malaysia, and are thrilled to be a part of the quirky wing of the snacks industry.
		<p> &nbsp </p>
		We hope you enjoy our products as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.
		<p>&nbsp </p>
		Sincerely,<p>
		Jenelle <p>Founder of NNN Snack Store.
	  </div>
  
		<div class="column" id="c2"><img src="timg/abtus.jpg" width="400px" height="670" ></div>
</div>
<p>&nbsp </p><p>&nbsp </p
<?php include("footer1.php");?>
</body>

</html>