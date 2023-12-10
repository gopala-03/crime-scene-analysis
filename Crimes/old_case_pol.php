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
	<title>Search Old Case</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="adv">
		<h1 style="font-size: xx-large; color: beige; font-family:Verdana, Geneva, Tahoma, sans-serif">Search Old Case</h1>
		<form method="post" action="search_result_pol.php">
			<label for="search" style="position: relative; bottom: 50px; font-size: x-large; color: beige; font-family: Verdana, Geneva, Tahoma, sans-serif;">Case Name</label>
			<input type="text" name="search" id="search" required style="position: relative; bottom: 50px; width: 300px; height: 40px;">

            
            <div class="adv">
                <a style="--clr: beige;"><button type="submit"><span style="color: beige; font-size: large;">Search</span><i></i></button></a>
            </div>
		</form>
	</div>
</body>
</html>
