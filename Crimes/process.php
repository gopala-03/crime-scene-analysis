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

$_SESSION['username'] = $_POST['username'];
$_SESSION['password'] = $_POST['password'];
$_SESSION['role'] = $_POST['role'];


// $data = array(
//   'username' => $_SESSION['username'],
//   'password' => $_SESSION['password'],
//   'role' => $_SESSION['role']
// );

// // Create the HTTP request
// $options = array(
//   'http' => array(
//     'method' => 'POST',
//     'content' => http_build_query($data)
//   )
// );

// $context = stram_context_create($options)

// //$response = file_post_contents('http://localhost/CAD/police.php')

if($_SESSION['role'] === 'police'){
    header('Location: police.php');
    exit();
}else{
    header('Location: advocate.php');
    exit();
}


?>
