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
// existing PHP code
if (isset($_POST['login'])) {
  // Retrieve user input
  $username = $_POST['username'];
  $password = $_POST['password'];
  $role = $_POST['role'];

  // Validate login
  if ($role === 'advocate') {
      // Redirect to advocate page
      header('Location: advocate.php');
      exit();
  } else if ($role === 'police') {
      // Redirect to police page
      header('Location: police.php');
      exit();
  } else {
      // Invalid login
      $error = 'Invalid username or password';
  }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class = "road">
    <div class="box">
          <div class="borderLine"></div>
          <form action="process.php" method="post">
            <h2>Login</h2>
            <div class="inputBox">
              <input type="text" required="required" name="username">
              <span>Username</span>
              <i></i>
            </div>
            <div class="inputBox">
              <input type="password" required="required" name="password">
              <span>Password</span>
              <i></i>
            </div>
            <label for="role">Login as</label>
			<select name="role" id="role">
				<option value="advocate">advocate</option>
				<option value="police">police</option>
			</select>
            <div class="links">
              <a href="#">Forgot Password</a>
              <a href="#">Signup</a>
            </div>
            <input type="submit" value="Login" name="login">
	        <?php if (!empty($error)): ?>
				<p><?php echo $error; ?></p>
			<?php endif; ?>
          </form>
    </div>
	<div class="police">
          	<div class="light_beam"></div>
          	<h4>Police</h4>
          	<h3>Police</h3>
          	<div class="side_mirror"></div>
          	<span>
            	<b></b>
            	<i></i>
          	</span>
        	</div>
        	<div class="police">
          	<div class="light_beam"></div>
          	<h4>Police</h4>
          	<h3>Police</h3>
          	<div class="side_mirror"></div>
          	<span>
            	<b></b>
            	<i></i>
          	</span>
        	</div>
  
  	<div class="burgular">
          	<div class="light_beam"></div>
          	<div class="side_mirror"></div>
          	<span>
            	<b></b>
            	<i></i>
          	</span>
        	</div> 
</div>
</body>
</html>