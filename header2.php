<!doctype html>
<?php
session_start();
include ("dataconnection1.php") ;
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
	<style>
	
	*,
*::before,
*::after{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html{
    font-family: 'Roboto', sans-serif;
    font-size: 10px;
}

/*Drop down*/
.dropdownn {
    position: relative;
    display: inline-block;
	font-size:10px;
	color: #00000;
	margin-right:100px;
	margin-top:0px;
}

.dropdownn-content {
    display: none;
    position: absolute;
    color: #00000;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
	font-size:10px;
}

.dropdownn-content a {
    color: #fff;
    padding: 14px 16px;
    text-decoration: none;
    display: block;
}

.dropdownn-content a:hover {background-color:  #ffffcc;}

.dropdownn:hover .dropdownn-content {
    display: block;
	margin-right:20px;
}


header{
    width: 100%;
    position: fixed;
    top: 0;
    left: 0;
    transition: background-color .5s ease;
    z-index: 1000;
}




.container{
    width: 100%;
    max-width: 120rem;
    margin: 0 auto;
    padding: 0 1.5rem;
}

.nav{
    width: 100%;
    height: 10rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 2px solid rgba(255,255,255,.05);
    transition: height .5s ease;
}

.nav a{
    text-decoration: none;
    color: #fff;
    font-size: 1.6rem;
}


.nav .logo{
    width:50px;
	margin:15px;
}

.nav-list{
    list-style: none;
    display: flex;
    margin-right: auto;
    margin-left: 4rem;
}

.nav-link{
    margin: 0 2rem;
    position: relative;
}

.nav-link::after{
    content: '';
    width: 100%;
    height: 2px;
    background-color: #fff;
    position: absolute;
    left: 0;
    bottom: -3px;
    transform: scaleX(0);
    transform-origin: left;
    transition: transform .5s ease;
}

.nav-link:hover::after{
    transform: scaleX(1);
}

#nav-search{
   width: 130px;
  box-sizing: border-box;
  border: 0.5px solid #ccc;
  border-radius: 4px;
  font-size: 13px;
  color:white;
  background-color: transparent;
  background-image: url('timg/search.jpg');
  background-position: 0px 0px; 
  background-size: 30px;
  background-repeat: no-repeat;
  padding: 7px 20px 7px 40px;
  -webkit-transition: width 0.3s ease-in-out;
  transition: width 0.4s ease-in-out;
}


#nav-search:focus {
  width: 40%;
}

#nav-cart{
    display: inline-block;
    background-color: #fff;
    color: #313131;
    padding: 1rem 1.5rem;
    border-radius: 2rem;
    transition: background-color .5s ease;
}

#nav-cart:hover{
    background-color: #d3d3d3;
}



#nav-cta{
    display: inline-block;
    background-color: #fff;
    color: #313131;
    padding: 1rem 2rem;
    border-radius: 2rem;
    transition: background-color .5s ease;
}

#nav-cta:hover{
    background-color: #d3d3d3;
}


/*Apply styles after scroll*/
.scrolling-active{
    background-color:  #ffffcc;
    box-shadow: 0 3px 1rem rgba(0,0,0,.1);
	z-index:1200;
}

.scrolling-active .nav{
    height: 6.6rem;
}

.scrolling-active .nav a{
    color: #313131;
}

.scrolling-active #nav-search{
    color: black;
}


.scrolling-active #nav-cta{
    background-color: #fff;
    color: black;
}

/*.scrolling-active #nav-cta:hover{
    background-color: #fff;
	color:#fff;
}*/

.scrolling-active .nav-link::after{
    background-color: #313131;
}

/*Apply styles after scroll end*/

	</style>
</head>
<body>
    <header>
        <div class="container">
            <nav class="nav">
                <img src="timg/logo.png" class="logo" alt="nnn"></a>
                <ul class="nav-list">
                    <li>
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li>
                        <a href="product.php" class="nav-link">Products</a>
                    </li>
                    <li>
                        <a href="aboutus.php" class="nav-link">About Us</a>
                    </li>
					<li>
                        <a href="index.php#contact" class="nav-link">Contact Us</a>
                    </li>
                </ul>
				
				<?php /*search bar*/?>
				
				<?php if(isset($_SESSION['cid']))
				{
					echo " 
						<a href='cart.php?cart&cid=".$_SESSION['cid']."' id='nav-cart'><i class='fa fa-shopping-cart' aria-hidden='true'></i></a>";
				}
				?>
				
				&nbsp;&nbsp;&nbsp;&nbsp;
				
					<?php
                       
                        if(isset($_SESSION["cid"])){
                            $sql = "SELECT * FROM customer WHERE cid='$_SESSION[cid]'";
                            $query = mysqli_query($connect,$sql);
                            $row=mysqli_fetch_array($query);
                                
                            echo '
                            <div class="dropdownn">
								<a href="#" class="dropdownn" id="nav-cta" style="text-decoration:none;"><img src="timg/profile2.png" width="13px"> HI '.$row["cfname"].'</a>
								<div class="dropdownn-content" >
									<a href="dashboard.php"><p style="color:black;"><i class="fa fa-user-circle" aria-hidden="true" ></i>My Profile</p></a>
									<a href="logout.php"  ><p style="color:black;"><i class="fa fa-sign-in" aria-hidden="true"></i>Log out</p></a>
                                </div>
                            </div>';

                            }else{ 
                                echo '
                                <div class="dropdownn">
                                <a href="#" class="dropdownn" id="nav-cta" style="text-decoration:none;" ><img src="timg/profile2.png" width="13px"></a>
                                  <div class="dropdownn-content">
                                    <a href="login.php" ><i class="fa fa-sign-in" aria-hidden="true" ></i>Login</a>
                                    <a href="register.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a>
                                    
                                  </div>
                                </div>';
                                
                            }
                        ?>    
            </nav>
        </div>
    </header>

	

    <script>
        window.addEventListener('scroll', function () {
            let header = document.querySelector('header');
            let windowPosition = window.scrollY > 0;
            header.classList.toggle('scrolling-active', windowPosition);
        })
    </script>
</body>
</html>