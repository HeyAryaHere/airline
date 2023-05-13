<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Get the search parameters from the query string
    $from = $_GET['from'];
    $to = $_GET['to'];
    $date = $_GET['date'];

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "airline";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement
    $sql = "SELECT * FROM destination WHERE from_user = '$from' AND to_user = '$to' AND Date = '$date'";

    // Execute the SQL statement
    $result = $conn->query($sql);

    // Check if any results were found
    if ($result->num_rows > 0) {
        // Loop through the results and display them
        while($row = $result->fetch_assoc()) {
            echo "<p>Flight from " . $row["from_user"] . " to " . $row["to_user"] . " on " . $row["Date"] . " is available.</p>";
            echo "<a href='booknow.php?from=" . $row["from_user"] . "&to=" . $row["to_user"] . "&Date=" . $row["Date"] . "'>Book Now</a>";
        }
    } else {
        echo "No flights found.";
    }

    // Close the database connection
    $conn->close();
}
?>
