<?php
// Connect to database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "airline";
$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Retrieve user details from database
$email = $_POST["email"];
$password = $_POST["password"];
$sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	// User found, redirect to home page
	header("Location: home.html");
	exit();
} else {
	// User not found, display error message
	echo "Invalid email or password.";
}

mysqli_close($conn);
?>
