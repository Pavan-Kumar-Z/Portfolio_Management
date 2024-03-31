<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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

$holding_id = $_GET['holding_Id'];
$portfolio_id = $_GET['portfolio_id'];
$quantity = $_GET['quantity'];

$ID = $_SESSION['Pan_no'];

// Use prepared statements to avoid SQL injection and properly quote string values

// SQL query to insert data into the holdingportfolio table
$sql = "INSERT INTO `holdingportfolio`(`quantity`, `ID`, `Holding_Id`, `Portfolio_Id`) VALUES ('$quantity','$ID','$holding_id','$portfolio_id')";

// SQL query to insert data into the transactions table
$date = date("Y-m-d H:i:s");
$sql2 = "INSERT INTO `transactions`(`quantity`, `Buysell`, `ID`, `Holding_Id`, `Portfolio_Id`, `dates`) VALUES ('$quantity','BUY','$ID','$holding_id','$portfolio_id','$date')";

// Execute the queries
$result1 = $conn->query($sql);
$result2 = $conn->query($sql2);

// Check if the queries were successful
if ($result1 === TRUE && $result2 === TRUE) {
    echo "<script>";
    echo "alert('Added successfully');";
    echo "</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}

$conn->close();
?>
</body>
</html>
