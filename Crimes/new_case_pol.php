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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $case_name = $case_type = $victim_name = $accused_name = $place_of_the_crime = $date = $time = $suspects = $evidence = $culprit = "";
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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



    // Prepare an INSERT statement
    $sql = "INSERT INTO cases_pol (case_name, case_type, victim_name, accused_name, place_of_the_crime, date, time, suspects, evidence, culprit) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if($stmt = mysqli_prepare($conn, $sql)){
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "ssssssssss", $case_name, $case_type, $victim_name, $accused_name, $place_of_the_crime, $date, $time, $suspects, $evidence, $culprit);
      
      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
          // Redirect to new case page with success message
          header("location: new_case_pol.php?success=true");
          exit();
      } else{
          // Redirect to new case page with error message
          header("location: new_case_pol.php?error=stmt_failed");
          exit();
      }
  }
  
    // Close statement
    mysqli_stmt_close($stmt);

  }

 // Close connection
mysqli_close($conn);

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
	<h1 style="font-size: xx-large; color: bisque; font-family:Verdana, Geneva, Tahoma, sans-serif">New Case Form</h1><br><br>
	<form action="new_case_pol.php" method="POST" enctype="multipart/form-data">
		<label for="case_name" style="font-size: large; color: bisque;">Case Name:</label>
		<input type="text" name="case_name" required>

		<label for="case_type" style="font-size: large; color: bisque;">Case Type:</label>
		<select name="case_type">
			<option value="murder">Murder</option>
			<option value="theft">Theft</option>
			<option value="fraud">Fraud</option>
			<option value="assault">Assault</option>
			<option value="kidnapping">Kidnapping</option>
			<option value="other">Other</option>
		</select><br><br>

		<label for="victim_name" style="font-size: large; color: bisque;">Victim Name:</label>
		<input type="text" name="victim_name" required>

		<label for="accused_name" style="font-size: large; color: bisque;">Accused Name:</label>
		<input type="text" name="accused_name" required><br><br>

		<label for="place_of_the_crime" style="font-size: large; color: bisque;">Place of the Crime:</label>
		<input type="text" name="place_of_the_crime" required>

		<label for="date" style="font-size: large; color: bisque;">Date:</label>
		<input type="date" name="date" required>

		<label for="time" style="font-size: large; color: bisque;">Time:</label>
		<input type="time" name="time" required><br><br>

		<label for="suspects" style="font-size: large; color: bisque;">Suspects:</label>
		<textarea name="suspects" rows="4" cols="50"></textarea><br><br>

		<label for="evidence" style="font-size: large; color: bisque;">Evidence:</label>
		<textarea name="evidence" rows="4" cols="50"></textarea><br><br>

		<label for="culprit" style="font-size: large; color: bisque;">Culprit:</label>
		<textarea name="culprit" rows="4" cols="50"></textarea><br><br>
		
        <div class="adv">
            <a style="--clr: bisque;"><button type="submit"><span style="color: aliceblue; font-size: large;">Submit</span><i></i></button></a>
        </div>
	</form>
    </div>
</body>
</html>
