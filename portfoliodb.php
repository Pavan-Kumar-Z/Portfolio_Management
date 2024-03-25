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

$name = $_POST['name'];
$portfolio_id = $_POST['id'];
$ID = $_SESSION['Pan_no'];

// Use prepared statements to avoid SQL injection and properly quote string values
$sql = "INSERT INTO portfolio (Portfolio_Id, ID, Portfolio_name) VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $portfolio_id, $ID, $name);

if ($stmt->execute()) {
    echo "New record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
