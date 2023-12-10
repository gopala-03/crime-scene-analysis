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
	$sql = "SELECT * FROM cases_pol WHERE case_id = $case_id";
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
</head>
<body>
	<?php
		// retrieve the form data using $_POST superglobal
		$case_name = $_POST['case_name'];
		$case_type = $_POST['case_type'];
		$victim_name = $_POST['victim_name'];
		$accused_name = $_POST['accused_name'];
		$place_of_the_crime = $_POST['place_of_the_crime'];
		$date = $_POST['date'];
		$time = $_POST['time'];
		$suspects = $_POST['suspects'];
		$evidence = $_POST['evidence'];
		$culprit = $_POST['culprit'];
		
		// display the form data
		echo "<h1>Case Details</h1><br><br>";
		echo "<p><b>Case Name:</b> ".$case_name."</p>";
		echo "<p><b>Case Type:</b> ".$case_type."</p>";
		echo "<p><b>Victim Name:</b> ".$victim_name."</p>";
		echo "<p><b>Accused Name:</b> ".$accused_name."</p>";
		echo "<p><b>Place of Crime:</b> ".$place_of_the_crime."</p>";
		echo "<p><b>Date:</b> ".$date."</p>";
		echo "<p><b>Time:</b> ".$time."</p>";
		echo "<p><b>Suspects:</b> ".$suspects."</p>";
		echo "<p><b>Evidence:</b> ".$evidence."</p>";
		echo "<p><b>Culprit:</b> ".$culprit."</p>";
		
		// display uploaded images
		if(isset($_FILES['victim_img']) && $_FILES['victim_img']['error'] == 0) {
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["victim_img"]["name"]);
			move_uploaded_file($_FILES["victim_img"]["tmp_name"], $target_file);
			echo "<p><b>Victim Image:</b><br><img src='".$target_file."' width='200'></p>";
		}
		
		if(isset($_FILES['accused_img']) && $_FILES['accused_img']['error'] == 0) {
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["accused_img"]["name"]);
			move_uploaded_file($_FILES["accused_img"]["tmp_name"], $target_file);
			echo "<p><b>Accused Image:</b><br><img src='".$target_file."' width='200'></p>";
		}
		
		if(isset($_FILES['culprit_img']) && $_FILES['culprit_img']['error'] == 0) {
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["culprit_img"]["name"]);
			move_uploaded_file($_FILES["culprit_img"]["tmp_name"], $target_file);
			echo "<p><b>Culprit Image:</b><br><img src='".$target_file."' width='200'></p>";
		}
	?>
	<br>
    <div class="adv">
		<a href="police.php" style="--clr:bisque;"><span>Back to Police Officials Page</span><i></i></a>
    </div>
</body>
</html>
