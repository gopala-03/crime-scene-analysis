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
session_start();
if (!isset($_SESSION['username'])) {
	header('Location: login.php');
	exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// code to save form data to database
	
// Define variables and initialize with empty values
$case_name = $case_type = $victim_name = $accused_name = $place_of_the_crime = $date = $time = $client_name = $accusation = $suspects = $hearings = $defence_arguments = $judgement = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Get form data
    $case_name = trim($_POST["case_name"]);
    $case_type = trim($_POST["case_type"]);
    $victim = trim($_POST["victim_name"]);
    $accused = trim($_POST["accused_name"]);
    $place_of_the_crime = trim($_POST["place_of_the_crime"]);
    $date = trim($_POST["date"]);
    $time = trim($_POST["time"]);
    $client_name = trim($_POST["client_name"]);
    $accusation = trim($_POST["accusation"]);
	$suspects = trim($_POST["suspects"]);
    $hearings = trim($_POST["hearings"]);
    $defense_arguments = trim($_POST["defense_arguments"]);
    $judgement = trim($_POST["judgement"]);
    
    // Prepare an INSERT statement
    $sql = "INSERT INTO cases_adv (case_name, case_type, victim_name, accused_name, place_of_the_crime, date, time, client_name, accusation, suspects, hearings, defense_arguments, judgement) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
     
    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sssssssssssss", $case_name, $case_type, $victim_name, $accused_name, $place_of_the_crime, $date, $time, $client_name, $accusation, $suspects, $hearings, $defence_arguments, $judgement);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Redirect to new case page with success message
            header("location: new_case.php?success=true");
            exit();
        } else{
            // Redirect to new case page with error message
            header("location: new_case.php?error=stmt_failed");
            exit();
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}
 
// Close connection
mysqli_close($conn);

	// redirect to view page
	header('Location: view_case.php');
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>New Case Form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<h1 style="font-size: xx-large; color: bisque; font-family:Verdana, Geneva, Tahoma, sans-serif">New Case Form</h1><br>
		<form method="POST" action="new_case.php" enctype="multipart/form-data">
			<label for="case_name" style="font-size: large; color: bisque;">Case Name</label>
			<input type="text" name="case_name" id="case_name" required>

			<label for="case_type" style="font-size: large; color: bisque;">Case Type</label>
			<input type="text" name="case_type" id="case_type" required><br><br>

			<label for="victim_name" style="font-size: large; color: bisque;">Victim Name</label>
			<input type="text" name="victim_name" id="victim_name" required>

			<label for="accused_name" style="font-size: large; color: bisque;">Accused Name</label>
			<input type="text" name="accused_name" id="accused_name" required><br><br>

			<label for="place_of_the_crime" style="font-size: large; color: bisque;">Place of the Crime</label>
			<input type="text" name="crime_place" id="crime_place" required>

			<label for="date" style="font-size: large; color: bisque;">Date</label>
			<input type="date" name="crime_date" id="crime_date" required>

			<label for="time" style="font-size: large; color: bisque;">Time</label>
			<input type="time" name="crime_time" id="crime_time" required><br><br>

			<label for="client_name" style="font-size: large; color: bisque;">Client Name</label>
			<input type="text" name="client_name" id="client_name" required><br><br>

			<label for="accusation" style="font-size: large; color: bisque;">Accusation</label>
			<textarea name="accusation" id="accusation" rows="4" cols="50" required></textarea><br><br>

			<label for="suspects" style="font-size: large; color: bisque;">Suspects</label>
			<textarea name="suspects" id="suspects" rows="4" cols="50" required></textarea><br><br>

			<label for="hearings" style="font-size: large; color: bisque;">Hearings</label>
			<textarea name="hearings" id="hearings" rows="4" cols="50" required></textarea><br><br>

			<label for="defense_arguments" style="font-size: large; color: bisque;">Defense Arguments</label>
			<textarea name="defense_arguments" id="defense_arguments" rows="4" cols="50" required></textarea><br><br>

			<label for="judgement" style="font-size: large; color: bisque;">Judgement</label>
			<textarea name="judgement" id="judgement" rows="4" cols="50" required></textarea><br><br>

			<div class="adv">
				<a style="--clr: bisque;"><button type="submit"><span style="color: aliceblue; font-size: large;">Submit</span><i></i></button></a>
			</div>
		</form>
    </div>
</body>
</html>
