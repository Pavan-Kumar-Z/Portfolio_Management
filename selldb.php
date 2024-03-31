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

$date = date("Y-m-d H:i:s");
$sql2 = "INSERT INTO `transactions`(`quantity`, `Buysell`, `ID`, `Holding_Id`, `Portfolio_Id`, `dates`) VALUES ('$quantity','SELL','$ID','$holding_id','$portfolio_id','$date')";

$result1 = $conn->query($sql2);
$stmt = $conn->prepare("UPDATE holdingportfolio SET quantity = quantity - ? WHERE ID = ? AND Holding_Id = ? AND Portfolio_Id = ?");
$stmt->bind_param("iiii", $input_quantity, $user_id, $holding_id, $portfolio_id);

// Set parameters and execute
$input_quantity = $quantity/* Quantity input by user */;
$user_id = $ID/* User ID */;
$holding_id =  $holding_id/* Holding ID */;
$portfolio_id = $portfolio_id/* Portfolio ID */;

$stmt->execute();

$stmt->close();
if ($result1 === TRUE  && $stmt->execute()) {
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
