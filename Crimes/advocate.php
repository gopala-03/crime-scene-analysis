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
if($_SERVER['REQUEST_METHOD']==='POST'){
	$username = $_POST['username'];
	$password = $_POST['password'];
}
$_SESSION['username'] = "Patrick";
$_SESSION['password'] = "Pat123";
// // Check if user is logged in as Advocate
// if (isset($_SESSION['username']) && $_SESSION['role'] === 'advocate') {
//   // User is logged in as Advocate
// } else {
//   // User is not logged in as Advocate
//   //header('Location: login.php');
//   exit();
// }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Advocate Profile</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="adv">
		<h1 style="color: antiquewhite;">Welcome Lawyer, <?php echo $_SESSION['username']; ?></h1>
		<h2 style="color: aliceblue;">What would you like to do?</h2>
		<ul>
			<a href="new_case.php" style="--clr:#ff1867"><span>New Case</span><i></i></a>
			<a href="old_case.php" style="--clr:#ff1867"><span>Old Case</span><i></i></a>
			<a href="case_det_updtd_pol.php" style="--clr:#ff1867"><span>Updated Case Details</span><i></i></a>
		</ul>
    <div class="button"> 
	<a href="logout.php" style="--clr:#ff1867"><span>Logout</span><i></i></a>
	</div>
</div>
</body>
</html>
