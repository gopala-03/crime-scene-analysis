<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "Crimes";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Crime Scene Analysis and Investigation</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="road">
	<div class="button">
	<a href="login.php" style="--clr:#ff1867"><span>CRIMES AND JUSTICE</span><i></i></a>
	</div>
	<div class="police">
          	<div class="light_beam"></div>
          	<h4>Police</h4>
          	<h3>Police</h3>
          	<div class="side_mirror"></div>
          	<span>
            	<b></b>
            	<i></i>
          	</span>
        	</div>
        	<div class="police">
          	<div class="light_beam"></div>
          	<h4>Police</h4>
          	<h3>Police</h3>
          	<div class="side_mirror"></div>
          	<span>
            	<b></b>
            	<i></i>
          	</span>
        	</div>
  
  	<div class="burgular">
          	<div class="light_beam"></div>
          	<div class="side_mirror"></div>
          	<span>
            	<b></b>
            	<i></i>
          	</span>
        	</div> 
     </div>
</body>
</html>
