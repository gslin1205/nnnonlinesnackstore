<?php 
session_start();
include("dataconnection1.php"); 
if(isset($_POST['subbtn']))
{
	
	if(empty($_POST['cemail']) ||empty($_POST['cpass']))
	{
		echo "<script>alert('Please fill your email or password');</script>";
	}
	else
	{
		$email=$_POST['cemail'];
		$pass=$_POST['cpass'];
		
		
		$email=mysqli_real_escape_string($connect,$email);
		$pass=mysqli_real_escape_string($connect,$pass);
		//escape some special characters such as \n or quotation marks
		$uppercase = preg_match('@[A-Z]@', $pass);
		$lowercase = preg_match('@[a-z]@', $pass);
		$number    = preg_match('@[0-9]@', $pass);
		$specialChars = preg_match('@[^\w]@', $pass);
		
		//$status='Inactive';
		
		$result=mysqli_query($connect,"SELECT * from customer where cemail='$email' and BINARY cpass='$pass'");
		//Second method ---> $sql="SELECT * from user where user_name='$name' and user_pass='$pass'";
		//mysqli_query($connect,$sql);
		
		$count=mysqli_num_rows($result);
		
		if($count==1)//1 mean pass and name is match
		{
			
			$rows=mysqli_fetch_assoc($result);
			$status=$rows["status"];
			if($status=='Inactive')		
			{
				echo"<script> alert('Email verification is required!\\nPlease check your mailbox.');window.location='login.php' </script>";
			}
			else
			{
			//$_SESSION["name"]=$name;//store username in session variable
			
			$row=mysqli_fetch_assoc($result);
			$_SESSION["cid"]=$rows["cid"]; //id is session variable now create

			header("location:./index.php");
			}//redirect the user to homepage
		}
		else
		{
			echo"<script>alert('Email or password is invalid');</script>";
		}
	}
}
?>

<html>
<head>
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
	color: #000000;
	margin-right:100px;
	margin-top:0px;
}

.dropdownn-content {
    display: none;
    position: absolute;
    color: #000000;
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

.dropdownn-content a:hover {background-color: #8db2c4;}

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
    background-color: #8db2c4;
    box-shadow: 0 3px 1rem rgba(0,0,0,.1);
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
    color: #fff;
}

/*.scrolling-active #nav-cta:hover{
    background-color: #fff;
	color:#fff;
}*/

.scrolling-active .nav-link::after{
    background-color: #313131;
}

body{width:680px;
     margin-top:160px;
      font-size:16px;
	  width: 100%;
      height: 100vh;
      background: url("timg/bg3.jpg") center no-repeat;
      background-size: cover;
      position: relative;
	  color:white;}

#frmUser {border-top:#F0F0F0 2px solid;
			padding:10px;}
	   
fieldset{border: 1px solid clear;
		box-shadow: 3px 6px #2fb6a9;
		width: 120px;
		margin-left:35px;
		border-radius: 25px;
		opacity:0.9;
		text-align:center;}
		
.demoInputBox{padding:7px; 
			border:#F0F0F0 1px solid; 
			border-radius:4px;}

h1{
  text-decoration: underline;
  -webkit-text-decoration-color:  #1f7a71;
  text-decoration-color:  #1f7a71;
  -webkit-text-decoration-style: wavy;
  text-decoration-style: wavy;
}

.wrap {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-top:40px;
}

.btnLogin {
  min-width: 150px;
  min-height: 40px;
  font-family: 'Nunito', sans-serif;
  font-size: 18px;
  text-transform: uppercase;
  letter-spacing: 1.3px;
  font-weight: 700;
  color: #313133;
  background: #4FD1C5;
  background: linear-gradient(90deg, rgba(129,230,217,1) 0%, rgba(79,209,197,1) 100%);
  border: none;
  border-radius: 1000px;
  box-shadow: 12px 12px 24px rgba(79,209,197,.64);
  transition: all 0.3s ease-in-out 0s;
  cursor: pointer;
  outline: none;
  position: relative;
  padding: 10px;
  }

.btnLogin::before {
  content: '';
  border-radius: 1000px;
  min-width: calc(300px + 12px);
  min-height: calc(60px + 12px);
  border: 6px solid #00FFCB;
  box-shadow: 0 0 60px rgba(0,255,203,.64);
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  opacity: 0;
  transition: all .3s ease-in-out 0s;
}

.btnLogin:hover, .btnRegister:focus {
  color: #313133;
  background:#2fb6a9;
  transform: translateY(-6px);
}

.bottom{
	margin-top:40px;
	text-align:right;
font-family:"Brush Script MT", monospace;}

#togglePassword{
    margin-left: -30px;
	margin-top:10px;
    cursor: pointer;
	color:gray;
	position:absolute;
}

</style>
<title>User Login</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" type="text/css" href="css/login1.css"></link>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
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
                        <a href="aboutus.php#contact" class="nav-link">Contact Us</a>
                    </li>
                </ul>
				
				<?php /*search bar*/?>
				
				<a href="#" id="nav-cart"><img src="timg/cart2.png" width="13px"></a>
				
				&nbsp;&nbsp;&nbsp;&nbsp;
				
					<?php
                       
                        if(isset($_SESSION["cid"])){
                            $sql = "SELECT cfname FROM customer WHERE cid='$_SESSION[cid]'";
                            $query = mysqli_query($connect,$sql);
                            $row=mysqli_fetch_array($query);
                                
                            echo '
                            <div class="dropdownn">
								<a href="#" class="dropdownn" id="nav-cta" style="text-decoration:none;"><img src="timg/profile2.png" width="13px"> HI '.$row["cfname"].'</a>
								<div class="dropdownn-content">
									<a href="dashboard.php"><i class="fa fa-user-circle" aria-hidden="true" ></i>My Profile</a>
									<a href="logout.php"  ><i class="fa fa-sign-in" aria-hidden="true"></i>Log out</a>
                                </div>
                            </div>';

                            }else{ 
                                echo '
                                <div class="dropdownn">
                                <a href="#" class="dropdownn" id="nav-cta" style="text-decoration:none;" ><img src="timg/profile2.png" width="13px"></a>
                                  <div class="dropdownn-content">
                                    <a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
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
<form name="frmUser" method="post" action="">
<fieldset style="width:500px; "><br>
<h1 style="text-align:center; letter-spacing: 1px;">Login</h1>
<div style="margin-top:50px;">
<input type="email" class="demoInputBox" name="cemail" size="28"  style="font-family: FontAwesome; font-size:16px; height:35px;" placeholder="&#xf0e0;   Email">
<br>
<input type="password" class="demoInputBox" id="mypassword" name="cpass" size="28" style="font-family: FontAwesome;font-size:16px; height:35px;" placeholder="&#xf023;    Password">
<i class="far fa-eye" style="cursor: pointer;" id="togglePassword"></i>
	<div class="wrap">
		<input type="submit" name="subbtn" class="btnLogin" value="Submit">
	</div>
<br>
<div class="bottom">
	<div>
		<a href="#popup1" style="text-decoration:none;"><b>Forgot your password?</b></a><span style="margin: 0 10px"></span>
	</div>
No account of us?<a href="register.php" style="text-decoration:none;"><b> click here</b></a> to register.<span style="margin: 0 10px"></span>
</div>
<div id="popup1" class="overlay">
		<div class="popup">
			<h2>Reset Password</h2>
			<a class="close" href="#">&times;</a>
			<form name="reset" method="POST" action="">
			<div class="content"><br><br>
				<input type="email" name="email" size="25" style="height:30px;" placeholder="Enter your email">
				<input type="submit" name="okbtn" value="submit">
			</div>
			</form>
		</div>
	</div>	
</fieldset>
</form>

</body>
</html>
<script src="js/app.js">
</script>
<?php
	if(isset($_POST['okbtn']))
	{
		$mail=$_POST['email'];
		
		$mail=mysqli_real_escape_string($connect,$mail);
	
		$sql=mysqli_query($connect,"SELECT * from customer where cemail='$mail'");
	
		$count2=mysqli_num_rows($sql);
		
		if($count2==1)//1 mean email is match
		{
			$rows=mysqli_fetch_assoc($sql);
			$status=$rows["status"];
			if($status=='Inactive')		
			{
				echo"<script> alert('Email verification is required!\\nPlease check your mailbox.');</script>";
			}
			else
			{
					$email = $_POST['email'];
					$result = mysqli_query($connect,"SELECT * FROM customer where cemail='" . $_POST['email'] . "'");
					$row = mysqli_fetch_assoc($result);
					$fetch_user_id=$row['cemail'];
					$email_id=$row['cemail'];
					$actual_link = "http://localhost/FYP/reset.php?email=" . $email_id;  //follow your xampp to change the link location 
					if($email==$fetch_user_id) {
					$to = $email_id;
					$subject = "NNN Online Snack Store Reset Password Email";
					$txt = "<html><body>";
					$txt .= "<img src='https://i.imgur.com/v52gFvY.png'\>";
					$txt .= "<br>Hi dear ".$rows['cfname'] ."<br>Click this link to reset your password.   " . $actual_link ."</body></html>";
					$headers = "From: NNN Online Snacks Store<stackstorennn@gmail.com>\r\n";
					$headers .= "Content-type: text/html";
					if(mail($to,$subject,$txt,$headers)){
						echo"<script> alert('Please via your email to reset password.');window.location='login.php' </script>";
					}
				}
				else{
					echo"<script> alert('Problem in reset. Try Again!');</script>";
					}
			}
		}
		else
		{echo"<script> alert('Email is not existing, please go and register');window.location='register.php';</script>";}
	}

		?>
		