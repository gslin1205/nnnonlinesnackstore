<?php include("dataconnection.php"); 
		include("admin.php");
		
$countries = array("AF" => "Afghanistan",
"Åland Islands" => "Åland Islands",
"Albania" => "Albania",
"Algeria" => "Algeria",
"AS" => "American Samoa",
"Andorra" => "Andorra",
"Angola" => "Angola",
"Anguilla" => "Anguilla",
"Antarctica" => "Antarctica",
"Antigua" => "Antigua and Barbuda",
"Argentina" => "Argentina",
"Armenia" => "Armenia",
"Aruba" => "Aruba",
"Australia" => "Australia",
"Austria" => "Austria",
"Azerbaijan" => "Azerbaijan",
"Bahamas" => "Bahamas",
"Bahrain" => "Bahrain",
"Bangladesh" => "Bangladesh",
"Barbados" => "Barbados",
"Belarus" => "Belarus",
"Belgium" => "Belgium",
"Belize" => "Belize",
"Benin" => "Benin",
"Bermuda" => "Bermuda",
"Bhutan" => "Bhutan",
"Bolivia" => "Bolivia",
"Bosnia" => "Bosnia and Herzegovina",
"Botswana" => "Botswana",
"Bouvet Island" => "Bouvet Island",
"Brazil" => "Brazil",
"British" => "British Indian Ocean Territory",
"Brunei" => "Brunei Darussalam",
"Bulgaria" => "Bulgaria",
"Burkina Faso" => "Burkina Faso",
"Burundi" => "Burundi",
"Cambodia" => "Cambodia",
"Cameroon" => "Cameroon",
"Canada" => "Canada",
"Cape Verde" => "Cape Verde",
"Cayman Islands" => "Cayman Islands",
"African" => "Central African Republic",
"Chad" => "Chad",
"Chile" => "Chile",
"China" => "China",
"Christmas Island" => "Christmas Island",
"Keeling" => "Cocos (Keeling) Islands",
"Colombia" => "Colombia",
"Comoros" => "Comoros",
"Congo" => "Congo",
"Cook Islands" => "Cook Islands",
"Costa Rica" => "Costa Rica",
"Cote D'ivoire" => "Cote D'ivoire",
"Croatia" => "Croatia",
"Cuba" => "Cuba",
"Cyprus" => "Cyprus",
"Czech" => "Czech Republic",
"Denmark" => "Denmark",
"Djibouti" => "Djibouti",
"Dominica" => "Dominica",
"Dominican" => "Dominican Republic",
"Ecuador" => "Ecuador",
"Egypt" => "Egypt",
"El Salvador" => "El Salvador",
"Equatorial Guinea" => "Equatorial Guinea",
"Eritrea" => "Eritrea",
"Estonia" => "Estonia",
"Ethiopia" => "Ethiopia",
"Malvinas" => "Falkland Islands (Malvinas)",
"Faroe Islands" => "Faroe Islands",
"Fiji" => "Fiji",
"Finland" => "Finland",
"France" => "France",
"French Guiana" => "French Guiana",
"French Polynesia" => "French Polynesia",
"French Southern Territories" => "French Southern Territories",
"Gabon" => "Gabon",
"Gambia" => "Gambia",
"Georgia" => "Georgia",
"Germany" => "Germany",
"Ghana" => "Ghana",
"Gibraltar" => "Gibraltar",
"Greece" => "Greece",
"Greenland" => "Greenland",
"Grenada" => "Grenada",
"Guadeloupe" => "Guadeloupe",
"Guam" => "Guam",
"Guatemala" => "Guatemala",
"Guernsey" => "Guernsey",
"Guinea" => "Guinea",
"Guyana" => "Guyana",
"Haiti" => "Haiti",
"Heard Island" => "Heard Island and Mcdonald Islands",
"Vatican" => "Holy See (Vatican City State)",
"Honduras" => "Honduras",
"Hong Kong" => "Hong Kong",
"Hungary" => "Hungary",
"Iceland" => "Iceland",
"India" => "India",
"Indonesia" => "Indonesia",
"Iran" => "Iran, Islamic Republic of",
"Iraq" => "Iraq",
"Ireland" => "Ireland",
"Isle of Man" => "Isle of Man",
"Israel" => "Israel",
"Italy" => "Italy",
"Jamaica" => "Jamaica",
"Japan" => "Japan",
"Jersey" => "Jersey",
"Jordan" => "Jordan",
"Kazakhstan" => "Kazakhstan",
"Kenya" => "Kenya",
"Kiribati" => "Kiribati",
"Korea" => "Korea",
"Kuwait" => "Kuwait",
"Kyrgyzstan" => "Kyrgyzstan",
"Lao's" => "Lao's",
"Latvia" => "Latvia",
"Lebanon" => "Lebanon",
"Lesotho" => "Lesotho",
"Liberia" => "Liberia",
"Libyan" => "Libyan Arab Jamahiriya",
"Liechtenstein" => "Liechtenstein",
"Lithuania" => "Lithuania",
"Luxembourg" => "Luxembourg",
"Macao" => "Macao",
"Macedonia" => "Macedonia",
"Madagascar" => "Madagascar",
"Malawi" => "Malawi",
"Malaysia" => "Malaysia",
"Maldives" => "Maldives",
"Mali" => "Mali",
"Malta" => "Malta",
"Marshall Islands" => "Marshall Islands",
"Martinique" => "Martinique",
"Mauritania" => "Mauritania",
"Mauritius" => "Mauritius",
"Mayotte" => "Mayotte",
"Mexico" => "Mexico",
"Micronesia" => "Micronesia",
"Moldova" => "Moldova",
"Monaco" => "Monaco",
"Mongolia" => "Mongolia",
"Montenegro" => "Montenegro",
"Montserrat" => "Montserrat",
"Morocco" => "Morocco",
"Mozambique" => "Mozambique",
"Myanmar" => "Myanmar",
"Namibia" => "Namibia",
"Nauru" => "Nauru",
"Nepal" => "Nepal",
"Netherlands" => "Netherlands",
"New Caledonia" => "New Caledonia",
"New Zealand" => "New Zealand",
"Nicaragua" => "Nicaragua",
"Niger" => "Niger",
"Nigeria" => "Nigeria",
"Niue" => "Niue",
"Norfolk" => "Norfolk Island",
"Northern Mariana" => "Northern Mariana Islands",
"Norway" => "Norway",
"Oman" => "Oman",
"Pakistan" => "Pakistan",
"Palau" => "Palau",
"Palestinian Territory" => "Palestinian Territory, Occupied",
"Panama" => "Panama",
"Papua New Guinea" => "Papua New Guinea",
"Paraguay" => "Paraguay",
"Peru" => "Peru",
"Philippines" => "Philippines",
"Pitcairn" => "Pitcairn",
"Poland" => "Poland",
"Portugal" => "Portugal",
"Puerto Rico" => "Puerto Rico",
"Qatar" => "Qatar",
"Reunion" => "Reunion",
"Romania" => "Romania",
"Russian" => "Russian Federation",
"Rwanda" => "Rwanda",
"Saint Helena" => "Saint Helena",
"Saint Kitts" => "Saint Kitts and Nevis",
"Saint Lucia" => "Saint Lucia",
"Saint Pierre" => "Saint Pierre and Miquelon",
"Saint Vincent" => "Saint Vincent and The Grenadines",
"Samoa" => "Samoa",
"San Marino" => "San Marino",
"Sao Tome" => "Sao Tome and Principe",
"Saudi Arabia" => "Saudi Arabia",
"Senegal" => "Senegal",
"Serbia" => "Serbia",
"Seychelles" => "Seychelles",
"Sierra Leone" => "Sierra Leone",
"Singapore" => "Singapore",
"Slovakia" => "Slovakia",
"Slovenia" => "Slovenia",
"Solomon Islands" => "Solomon Islands",
"Somalia" => "Somalia",
"South Africa" => "South Africa",
"South Georgia" => "South Georgia and The South Sandwich Islands",
"Spain" => "Spain",
"Sri Lanka" => "Sri Lanka",
"Sudan" => "Sudan",
"Suriname" => "Suriname",
"Svalbard " => "Svalbard and Jan Mayen",
"Swaziland" => "Swaziland",
"Sweden" => "Sweden",
"Switzerland" => "Switzerland",
"Syrian" => "Syrian Arab Republic",
"Taiwan" => "Taiwan, Province of China",
"Tajikistan" => "Tajikistan",
"Tanzania" => "Tanzania, United Republic of",
"Thailand" => "Thailand",
"Timor-leste" => "Timor-leste",
"Togo" => "Togo",
"Tokelau" => "Tokelau",
"Tonga" => "Tonga",
"Trinidad" => "Trinidad and Tobago",
"Tunisia" => "Tunisia",
"Turkey" => "Turkey",
"Turkmenistan" => "Turkmenistan",
"Turks" => "Turks and Caicos Islands",
"Tuvalu" => "Tuvalu",
"Uganda" => "Uganda",
"Ukraine" => "Ukraine",
"Arab" => "United Arab Emirates",
"UK" => "United Kingdom",
"US" => "United States",
"Uruguay" => "Uruguay",
"Uzbekistan" => "Uzbekistan",
"Vanuatu" => "Vanuatu",
"Venezuela" => "Venezuela",
"VietNam" => "Viet Nam",
"Virgin Islands," => "Virgin Islands, British",
"Wallis and Futuna" => "Wallis and Futuna",
"Western Sahara" => "Western Sahara",
"Yemen" => "Yemen",
"Zambia" => "Zambia",
"Zimbabwe" => "Zimbabwe");
?>

<html>
<head><title>Edit Product Details</title>


	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<script>
function cancel()
{
	option=confirm("Changes you made may not be saved.");

	if (option==true) 
		window.location.href = "product_delete.php";
}

function confirmation()
{
	var option;
	option=confirm("Do you want to delete the record?");
	return option;
}

</script>


</head>

<style>

body{
	background-image: url("pimg/bg4.jpg");
}

.edit{
	text-align: center;
	padding: 10px;
	font-size: 27pt;
	padding: 10px;
	
}

p{
	text-decoration: none;
}

.form{
	text-align: left;
	
}

ol,ul,a:hover {
  padding-left: 0rem;
  text-decoration: none;
}

.button{
	text-align: center;
}

.img{
	text-align: center;
}

form {
    width: 60%;
    padding: 20px;
    background: #fff;
    box-shadow: 0 2px 5px #ccc; 
	background-color: #f5f2f2;
	opacity: 0.88;      }
	
input:hover, select:hover, textarea:hover, .preferred-metod label:hover input {
      box-shadow: 0 0 3px 0 #70088a;
      }

.form-control{
	width:50%;
	display: inline-block;
}

.price{
	width: 42%;
	display: inline-block;
	margin-left: -4px;
}

.input-group-text{
	display: inline-block;
}
</style>


<body>

		<?php
		if(isset($_GET["edit"]))
		{
			$pid=$_GET["pid"];
			
			$result = mysqli_query($connect, "SELECT * from products WHERE pid='$pid'");
			$row = mysqli_fetch_assoc($result);
		?>
<form name="editfrm" method="post" action="" class="testbox" style = "margin-left: 360px; ">		
<div >		
		<h1 class="edit">Edit a Product</h1><hr>

		<form name="editfrm" method="post" action="" enctype="multipart/form-data" class="form" >
			
			<p>Product ID &nbsp &nbsp &nbsp &nbsp: &nbsp <input type="text" name="pid" size="10" class="form-control" value="<?php echo $row['pid'];?>"disabled>
			
			
			<p>Product Name &nbsp: &nbsp <input type="text" name="pname" size="40" class="form-control" value="<?php echo $row['pname']; ?>">
		 
		 <div class="img">
		 
			<p>Image 1 &nbsp : &nbsp 
			<a class='image-link' href="pimg/<?php echo $row['pimg'] ?>">
			<img src="pimg/<?php echo $row['pimg'];?>" style="width:100px; height:100px;"> </a>
			<a href="pimg_update.php?update&pid=<?php echo $row['pid']; ?>">Change </a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
			
			
			Image 2 &nbsp : &nbsp 
			<a class='image-link' href="pimg/<?php echo $row['pimg2'] ?>">
			<img src="pimg/<?php echo $row['pimg2'];?>" style="width:100px; height:100px;"> 
			<a href="pimg2_update.php?update&pid=<?php echo $row['pid']; ?>">Change </a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
			
			<p>Image 3 &nbsp : &nbsp 
			<a class='image-link' href="pimg/<?php echo $row['pimg3'] ?>">
			<img src="pimg/<?php echo $row['pimg3'];?>" style="width:100px; height:100px;"> 
			<a href="pimg3_update.php?update&pid=<?php echo $row['pid']; ?>">Change </a>&nbsp &nbsp &nbsp &nbsp 
		</div>
	
	
			<p>Price &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  : &nbsp <span class="input-group-text">RM</span>
				<input type="text" name="pprice" pattern="\d+(\.\d{2})?"  class="form-control price" value="<?php echo $row['pprice']; ?>">
				
				
				
			<p>Expiry &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp: &nbsp<input type="text" name="expiry" size="20" class="form-control" value="<?php echo $row['expiry']; ?>">
		 
			<p>Stock &nbsp&nbsp&nbsp&nbsp &nbsp &nbsp &nbsp &nbsp&nbsp: &nbsp<input type="number" name="pstock" min="0" max="1000" class="form-control" value="<?php echo $row['pstock']; ?>">
			
			<p>Origin &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp:&nbsp 
			<select name="origin" class="form-control">
			<option value=""><?php echo $row['origin'];?></option>
			
			<?php

			foreach($countries as $key => $value) {

			?>
			<option value="<?= $key ?>" title="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
			<?php

			}

			?>
			</select>
			
			<p>Descriptions &nbsp :&nbsp <textarea cols="40" rows="4" name="pdesc" style="resize:none;"class="form-control" ><?php echo $row ['pdesc']?></textarea>
		 
			<div class="button">
				<p/><button type="submit" name="savebtn" value="Update" onclick="update()" class="btn btn-outline-success"><i class="fa fa-save"></i></button>
				
				<button class="btn btn-outline-primary"><a href="product_delete.php" name="cancelbtn" value="Cancel" onclick="cancel()" >Back</a></button>
				
				<button class="btn btn-outline-danger"><i class="fa fa-trash"></i><a href="product_edit.php?del&pid=<?php echo $row['pid']; ?>&action=del" onclick="return confirmation()" ></a></button>
			</div>
			

		</form>
	    <?php 
		}
		  ?>
	</div>
	
</div>
</form>

</body>
</html>
<?php
if (isset($_GET['del'])) 
{
	$pid=$_GET['pid'];
	mysqli_query($connect,"UPDATE products SET p_isdelete=1 where pid='$pid'");
?>
<script>
	alert("Product is deleted");
</script>
<?php
	header("refresh:0.5; url='product_delete.php'");
}
?>

<?php 

if(isset($_POST['savebtn']))
{
	$pname=$_POST["pname"];
	$pdesc=$_POST["pdesc"];
	$pprice=$_POST["pprice"];
	$expiry=$_POST["expiry"];
	$pstock=$_POST["pstock"];
	$origin	=$_POST["origin"];
 
	$sql=mysqli_query($connect,"update products SET pname='$pname',pdesc='$pdesc', pprice='$pprice',expiry='$expiry', pstock='$pstock', origin='$origin' WHERE pid='$pid'");
	
	echo "<script>alert('update successfully!')</script>";
	
	$URL="product_delete.php";
	echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
	echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}
?>

<script>
$(document).ready(function() {
  $('.template-article img').each(function() {
      var currentImage = $(this);
      currentImage.wrap("<a class='image-link' href='" + currentImage.attr("src") + "'</a>");
  });
  $('.image-link').magnificPopup({type:'image'});  
});

</script>