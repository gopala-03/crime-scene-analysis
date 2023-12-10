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


if(isset($_GET['case_id'])){
	$case_id = $_GET['case_id'];
 
	// Query the database to retrieve the case details
	$sql = "SELECT * FROM cases_adv WHERE case_id = $case_id";
	$result = mysqli_query($conn, $sql);
	
	$row = mysqli_fetch_assoc($result);
 
	// Display the case details
	// ...
 } else {
	// handle the case where the "id" parameter is not set in the URL
	$row = array(); // set $row to an empty array
 }

?>

<!DOCTYPE html>
<html>
<head>
	<title>View Case</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<h1>Case Details</h1><br><br>
		<p><strong>Case Name:</strong> <?php echo isset($row['case_name']) ? $row['case_name'] : ''; ?></p>
		<p><strong>Case Type:</strong> <?php echo isset($row['case_type']) ? $row['case_type'] : ''; ?></p>
		<p><strong>Victim Name:</strong> <?php echo isset($row['victim_name']) ? $row['victim_name'] : ''; ?></p>
		<p><strong>Accused Name:</strong> <?php echo isset($row['accused_name']) ? $row['accused_name'] : ''; ?></p>
		<p><strong>Place of the Crime:</strong> <?php echo isset($row['place_of_the_crime']) ? $row['place_of_the_crime'] : ''; ?></p>
		<p><strong>Date:</strong> <?php echo isset($row['date']) ? $row['date'] : ''; ?></p>
		<p><strong>Time:</strong> <?php echo isset($row['time']) ? $row['time'] : ''; ?></p>
		<p><strong>Client Name:</strong> <?php echo isset($row['client_name']) ? $row['client_name'] : ''; ?></p>
		<p><strong>Accusation:</strong> <?php echo isset($row['accusation']) ? $row['accusation'] : ''; ?></p>
		<p><strong>Suspects:</strong> <?php echo isset($row['suspects']) ? $row['suspects'] : ''; ?></p>
		<p><strong>Hearings:</strong> <?php echo isset($row['hearings']) ? $row['hearings'] : ''; ?></p>
		<p><strong>Defense Arguments:</strong> <?php echo isset($row['defense_arguments']) ? $row['defense_arguments'] : ''; ?></p>
		<p><strong>Judgement:</strong> <?php echo isset($row['judgement']) ? $row['judgement'] : ''; ?></p><br><br>
		<div class="adv">
		<a href="advocate.php" style="--clr:bisque;"><span>Back to Advocate Profile</span><i></i></a>
        </div>
	</div>
</body>
</html>
