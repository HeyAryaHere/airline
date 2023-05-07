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

// Check if email already exists
$email = $_POST["Email"];
$sql = "SELECT * FROM user WHERE Email='$email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	// Email already exists, redirect to login page
	header("Location: login.html");
	exit();
}

// Save user details to database
$name = $_POST["name"];
$password = $_POST["password"];
$sql = "INSERT INTO user (Name, Email, Password) VALUES ('$name', '$email', '$password')";
if (mysqli_query($conn, $sql)) {
	// User details saved, redirect to login page
	header("Location: home.html");
	exit();
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
