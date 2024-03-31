<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "portfolio_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve holding ID from query parameter
$holding_id = $_GET['holding_id'];

// SQL query to insert data into the watchlist table
$sql = "INSERT INTO watchlist (ID, Holding_ID) VALUES ('" . $_SESSION['Pan_no'] . "', '" . $holding_id . "')";

// Execute the query
$result = $conn->query($sql);

// Check if the query was successful
if ($result === TRUE) {
    echo "<script>";
    echo "alert('Added successfully');";
    echo "</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
