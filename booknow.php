<!DOCTYPE html>
<html>
<head>
	<title>Book Now</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			text-align: left;
			padding: 8px;
			border-bottom: 1px solid #ddd;
		}
		tr:hover {
			background-color: #f5f5f5;
		}
		button {
			background-color: #4CAF50;
			color: white;
			padding: 8px 16px;
			border: none;
			cursor: pointer;
		}
		button:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
	<h1>Book Now</h1>

	<?php
	// PHP code to retrieve data from database and display it in a table
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "airline";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT * FROM booking";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		echo "<table>
			<tr>
				<th>Airline Name</th>
				<th>Duration</th>
				<th>Price</th>
				<th>Seats Available</th>
				<th>Book Now</th>
			</tr>";
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr>
				<td>" . $row["airline"] . "</td>
				<td>" . $row["duration"] . "</td>
				<td>" . $row["price"] . "</td>
				<td>" . $row["seats"] . "</td>
				<td><button>Book Now</button></td>
			</tr>";
		}
		echo "</table>";
	} else {
		echo "No results found.";
	}

	mysqli_close($conn);
	?>

</body>
</html>
