
<div class="slideshow-container">

<div class="mySlides fade">
  <img src="img/banner1.jpg" style="width:107%">
  <div class="text">Caption Text</div>
</div>

<div class="mySlides fade">
  <img src="img/banner2.jpg" style="width:107%">
  <div class="text">Caption Two</div>
</div>

<div class="mySlides fade">
  <img src="img/banner3.jpg" style="width:107%">
  <div class="text">Caption Three</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<div style="background:linear-gradient(to right,#EAE5E5,#C4AECD);">
<hr><h1>Shop Now</h1>
		
<div class="row">
	<div class="column">
    <a href="#"><img src="pimg/orion dr.you.jpg" alt="Biscuit" width="150px" height="150px"></a>
	<p>Biscuit</p>
		<a href='products1.php'><i class='fa fa-shopping-cart'></i> Details</a>
  </div>
  <div class="column">
     <a href=""><img src="pimg/yogurt-jelly-candy-1609602685.jpg" alt="Candy" width="150px" height="150px;"></a>
	<p>Candy</p>
		<a href='products2.php'><i class='fa fa-shopping-cart'></i> Details</a>
  </div>
  <div class="column">
     <a href="#"><img src="pimg/wasabi-almond-1609609618.jpg" alt="Chips" width="150px" height="150px"></a>
	<p>Chips</p>
		<a href='products3.php'><i class='fa fa-shopping-cart'></i> Details</a>
  </div>
  <div class="column">
     <a href="#"><img src="pimg/royce chocolate_nama.jpg" alt="Chocolate" width="150px" height="150px"></a>
	<p>Chocolate</p>
	<div >
		<a href='products4.php'><i class='fa fa-shopping-cart'></i> Details</a>
	</div>
  </div>
   <div class="column">
     <a href="#"><img src="pimg/fish toufu.jpg" alt="Other" width="150px" height="150px"></a>
	<p>Other</p>
	<div >
		<a href='products5.php'><i class='fa fa-shopping-cart'></i>Details</a>
	</div>
  </div>
</div>
	<br><br><hr>
</div> 
	

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
