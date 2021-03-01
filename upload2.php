
<?php

	$cn=mysqli_connect("localhost","root","","nnn") or die("Could not Connect My Sql");
	$output_dir = "Admin/cimg/";/* Path for file upload */
	$RandomNum   = time();
	$ImageName      = str_replace(' ','-',strtolower($_FILES['image']['name'][0]));
	$ImageType      = $_FILES['image']['type'][0];
 
	$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
	$ImageExt       = str_replace('.','',$ImageExt);
	$ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
	$NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
    $ret[$NewImageName]= $output_dir.$NewImageName;
	
	/* Try to create the directory if it does not exist */
	if(isset($_POST["savebtn"]))
	{	
		$fname = $_POST["cfname"];  	
		$lname = $_POST["clname"];
		$gender = $_POST["cgender"];
		$pass = $_POST["cpass"];  	
		$phone= $_POST["cpn"];  	
		$email = $_POST["cemail"];  	
		$address = $_POST["caddress"];  	
		$pc = $_POST["cpostcode"];  	
		$state = $_POST["cstate"]; 
		
		if (!file_exists($output_dir))
		{
			@mkdir($output_dir, 0777);
		}               
		move_uploaded_file($_FILES["image"]["tmp_name"][0],$output_dir."/".$NewImageName );
			 $sql = "INSERT INTO customer (cimg, cfname, clname, cgender, cpass, cpn, cemail, caddress)VALUES ('$NewImageName','$fname','$lname','$gender','$pass','$phone','$email','$address')";
			if (mysqli_query($cn, $sql)) {
				?><script>
				alert("Register successful. Please login");
				</script><?php
				header("refresh:0.5; url=index.php");
			}
			else {
			echo "Error: " . $sql . "" . mysqli_error($cn);
		 }
	}
