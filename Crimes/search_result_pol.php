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
	<div class = "adv">
	<h1 style="font-size: x-large; color: bisque; font-family:Verdana, Geneva, Tahoma, sans-serif">Search Result</h1>
	<?php

	//check if search parameter was passed in URL
if(isset($_GET['search'])){
    //get search query from URL parameter
    $search = $_GET['search'];
    
    //prepare SQL statement
    $stmt = mysqli_prepare($conn, "SELECT * FROM cases_pol WHERE case_name=?");
    mysqli_stmt_bind_param($stmt, "s", $search);

    //execute SQL statement
    mysqli_stmt_execute($stmt);
        //get query results
        $result = mysqli_stmt_get_result($stmt);

        //display search results
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<p><strong>Case Name: </strong>" . $row["case_name"] . "</p>";
                echo "<p><strong>Case Type: </strong>" . $row["case_type"] . "</p>";
                echo "<p><strong>Victim Name: </strong>" . $row["victim_name"] . "</p>";
                echo "<p><strong>Accused Name: </strong>" . $row["accused_name"] . "</p>";
                echo "<p><strong>Place of the Crime: </strong>" . $row["place_of_the_crime"] . "</p>";
                echo "<p><strong>Date: </strong>" . $row["date"] . "</p>";
                echo "<p><strong>Time: </strong>" . $row["time"] . "</p>";
                echo "<p><strong>Suspects: </strong>" . $row["suspects"] . "</p>";
                echo "<p><strong>Evidence: </strong>" . $row["evidence"] . "</p>";
                echo "<p><strong>Culprit: </strong>" . $row["culprit"] . "</p>";
            
        } 
	}else {
            echo "No results found.";
        }
        
    //close SQL statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
	<br>
    <div class="adv">
		<a href="police.php" style="--clr:bisque; bottom: -100px;"><span>Back to Police Officials Profile</span><i></i></a>
    </div>
</div>
</body>
</html>
