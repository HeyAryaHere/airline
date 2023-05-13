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

$email = $_POST["email"];
// Save user details to database
$name = $_POST["name"];
$password = $_POST["password"];
$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
if (mysqli_query($conn, $sql)) {
	// User details saved, redirect to login page
	header("Location: login.html");
	exit();
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
