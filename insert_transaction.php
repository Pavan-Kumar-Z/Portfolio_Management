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

$quantity = $_GET['quantity'];
$ID = $_GET['ID'];
$holding_id = $_GET['holding_id'];
$portfolio_id = $_GET['portfolio_id'];
$transaction_id = $_GET['transaction_id'];
$date = date("Y-m-d H:i:s");

$sql2 = "INSERT INTO `transactions`(`quantity`, `Buysell`, `ID`, `Holding_Id`, `Portfolio_Id`, `dates`, `transactions_Id`) VALUES ('$quantity','BUY','$ID','$holding_id','$portfolio_id','$date', '$transaction_id')";

$result2 = $conn->query($sql2);

if ($result2 === TRUE) {
    echo "Transaction inserted successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}

$conn->close();
?>
