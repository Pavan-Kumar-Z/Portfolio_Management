<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holding Information</title>
    <link rel="stylesheet" href="viewtransaction.css">
</head>
<body>
    <div class="holding-info">
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

$sql = "SELECT * FROM transactions where ID = '" . $_SESSION['Pan_no'] . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Holding ID: " . $row["Holding_Id"] . "<br>";
        echo "Portfolio ID: " . $row["Portfolio_Id"] . "<br>";
        echo "Quantity: " . $row["quantity"] . "<br>";
        echo "Type: " . $row["Buysell"] . "<br>";
       
        echo "<hr>"; 
    }
} else {
    echo "No results";
}

// Close connection
$conn->close();
?>

    </div>
</body>
</html>
