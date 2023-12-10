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
	<title>Search Results</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="adv">
	<h1 style="font-size: x-large; color: black; font-family:Verdana, Geneva, Tahoma, sans-serif">Search Result</h1>
	<?php
		// get the case name from the URL
		if(isset($_GET['search'])){
			$search = $_GET['search'];
			$stmt = mysqli_prepare($conn, "SELECT * FROM cases_adv WHERE case_name=?");
			mysqli_stmt_bind_param($stmt, "s", $search);
			
			//execute SQL statement
			mysqli_stmt_execute($stmt);
			
			//get query results
			$result = mysqli_stmt_get_result($stmt);

			// check if any rows were returned
		   if (mysqli_num_rows($result) > 0) {
				// output data of each row 
					while($row = mysqli_fetch_assoc($result)) {
							echo "<h1>" . $row["case_name"] . "</h2>";
							echo "<p><strong>Case Type:</strong> " . $row["case_type"] . "</p>";
							echo "<p><strong>Victim Name:</strong> " . $row["victim_name"] . "</p>";
							echo "<p><strong>Accused Name:</strong> " . $row["accused_name"] . "</p>";
				            echo "<p><strong>Place of the Crime:</strong> " . $row["place_of_the_crime"] . "</p>";
				    		echo "<p><strong>Date:</strong> " . $row["date"] . "</p>";
							echo "<p><strong>Time:</strong> " . $row["time"] . "</p>";
							echo "<p><strong>Client Name:</strong> " . $row["client_name"] . "</p>";
							echo "<p><strong>Accusation:</strong> " . $row["accusation"] . "</p>";
							echo "<p><strong>Suspects:</strong> " . $row["suspects"] . "</p>";
							echo "<p><strong>Hearings:</strong> " . $row["hearings"] . "</p>";
							echo "<p><strong>Defense Arguments:</strong> " . $row["defense_arguments"] . "</p>";
							echo "<p><strong>Judgement:</strong> " . $row["judgement"] . "</p>";
						}
					} else {
						echo "No results found.";
						}
					
					// close the database connection
					mysqli_stmt_close($stmt);
					mysqli_close($conn);
		}

	?>
    <div class="adv">
		<a href="advocate.php" style="--clr:bisque; bottom: -100px;"><span>Back to Advocate Profile</span><i></i></a>
    </div>
	</div>
</body>
</html>
