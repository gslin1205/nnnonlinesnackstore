<?php
  include('dataconnection1.php');

  if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $query = "SELECT pname FROM products WHERE pname LIKE '%$inpText%'";
    
    $result = $connect->query($query);

    if ($result->num_rows) 
	{
      while($row=$result->fetch_assoc())
	  {
		  echo "<a href='#' class='list-group-item list-group-item-action border-1'>" .$row['pname']."</a>";
	  }
    } 
	else 
	{
      echo "<p class='list-group-item border-1'>No Record</p>";
    }
  }
?>