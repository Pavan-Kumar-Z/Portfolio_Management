<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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


$sql = "INSERT INTO `holdingportfolio`(`quantity`, `ID`, `Holding_Id`, `Portfolio_Id`) VALUES ('$quantity','$ID','$holding_id','$portfolio_id')";

$date = date("Y-m-d H:i:s");

$result1 = $conn->query($sql);

if ($result1 === TRUE) {
    echo "<script>";
    echo "$.ajax({
            url: 'generate_transaction_id.js',
            dataType: 'script',
            success: function(data) {
                var transaction_id = generateTransactionId();
                $.ajax({
                    type: 'GET',
                    url: 'insert_transaction.php', // PHP script to handle insertion into transactions table
                    data: { transaction_id: transaction_id, quantity: '$quantity', ID: '$ID', holding_id: '$holding_id', portfolio_id: '$portfolio_id', date: '$date' },
                    success: function(response) {
                        alert(response); // Display success or error message
                    }
                });
            }
        });";
    echo "</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


</body>
</html>