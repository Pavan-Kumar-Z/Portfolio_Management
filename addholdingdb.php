<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "portfolio_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$holding_id = $_GET['holding_id'];

$sql = "INSERT INTO watchlist (ID, Holding_ID) VALUES ('" . $_SESSION['Pan_no'] . "', '" . $holding_id . "')";

$result = $conn->query($sql);

if ($result === TRUE) {
    echo "<script>";
    echo "alert('Added to watchlist');";
    echo "</script>";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
