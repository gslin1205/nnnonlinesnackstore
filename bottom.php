<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" >
  <title>Layered Card Hover</title>
  
<style>
body{
    padding: 0;
    justify-content:center;
    align-items: center;
    min-height: 100vh;
    font-family: sans-serif;
  }
  .box{
	  padding:80px 0;
    width: 800px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    grid-gap: 15px;
    margin: 0 auto;
  }
  .card{
    position: relative;
    width: 300px;
    height: 350px;
    background: #fff;
    margin: 0 auto;
    border-radius: 4px;
    box-shadow:0 2px 10px rgba(0,0,0,.2);
  }
  .card:before,
  .card:after
  {
    content:"";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 4px;
    background: #fff;
    transition: 0.5s;
    z-index:-1;
  }
  .card:hover:before{
  transform: rotate(20deg);
  box-shadow: 0 2px 20px rgba(0,0,0,.2);
  }
  .card:hover:after{
  transform: rotate(10deg);
  box-shadow: 0 2px 20px rgba(0,0,0,.2);
  }
  .card .imgBx{
  position: absolute;
  top: 10px;
  left: 10px;
  bottom: 10px;
  right: 10px;
  background: #222;
  transition: 0.5s;
  z-index: 1;
  }
  
  .card:hover .imgBx
  {
    bottom: 80px;
  }

  .card .imgBx img{
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
  }

  .card .details{
      position: absolute;
      left: 10px;
      right: 10px;
      bottom: 10px;
      height: 60px;
      text-align: center;
  }

  .card .details h2{
   margin: 0;
   padding: 0;
   font-weight: 600;
   font-size: 20px;
   color: #777;
   text-transform: uppercase;
  } 

  .card .details h2 span{
  font-weight: 500;
  font-size: 14px;
  color: #f38695;
  display: block;
  margin-top: 5px;
   } 
#nav-about1{
    background-color: transparent;
    color: #34495e
	border-color: #34495e;
    border-radius: 2rem;
	border-width: 1px;
	text-decoration: none;
    transition: background-color .5s ease;
}

#nav-about1:hover{
    background-color: white;

}
</style>
</head>
<body>
  <div class="box">
      <div class="card">
        <div class="imgBx">
            <img src="timg/bottom.jpg" alt="about us">
        </div>
        <div class="details">
            <h2>About Us<br><span><a href="#" id="nav-about1"><b>CLICK ME TO FIND OUT !</a></span></h2>
        </div>
      </div>
    
       <div class="card">
         <div class="imgBx">
            <img src="timg/bottom2.jpg" alt="contact us">
         </div>
         <div class="details">
            <h2>Contact Us<br><span><a href="#contact" id="nav-about1"><b>CLICK ME TO FIND OUT !</a></span></h2>
          </div>
       </div>
 
  </div>
</body>
</html>