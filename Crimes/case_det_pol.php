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
	<title>Case Details</title>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
	<div class="adv">
	<h1 style="font-size: xx-large; color: bisque; font-family:Verdana, Geneva, Tahoma, sans-serif">Case Details</h1><br><br>
	<?php
		$search = $_POST["search"];

		$sql = "SELECT * FROM cases_pol WHERE case_name='$search'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<p><strong>Case Name:</strong> " . $row["case_name"] . "</p>";
				echo "<p><strong>Case Type:</strong> " . $row["case_type"] . "</p>";
				echo "<p><strong>Victim Name:</strong> " . $row["victim_name"] . "</p>";
				echo "<p><strong>Accused Name:</strong> " . $row["accused_name"] . "</p>";
				echo "<p><strong>Place of the Crime:</strong> " . $row["place_of_the_crime"] . "</p>";
				echo "<p><strong>Date:</strong> " . $row["date"] . "</p>";
				echo "<p><strong>Time:</strong> " . $row["time"] . "</p>";
				echo "<p><strong>Suspects:</strong> " . $row["suspects"] . "</p>";
				echo "<p><strong>Evidence:</strong> " . $row["evidence"] . "</p>";
				echo "<p><strong>Culprit:</strong> " . $row["culprit"] . "</p>";
			}
		} else {
			echo "No results found for Case Name: " . $case_name;
		}
		$conn->close();
	?>

	<br>
	<div class="adv">
		<a href="advocate.php" style="--clr:bisque;"><span>Back to Advocate Profile</span><i></i></a>
    </div>
	</div>
</body>
</html>
