<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watchlist</title>
    <link rel="stylesheet" href="userpage.css">

</head>
<body>
    <header>
    <div id = "container">
    <h3 class="name">Portfolio Management</h3>
    <a href = "addholding.php" class = "tag">ADD HOLDINGS</a>
    </header>
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

// SQL query to select data from the portfolio table
$sql = "SELECT * FROM holding WHERE holding_Id IN (SELECT Holding_ID FROM watchlist WHERE ID = '" . $_SESSION['Pan_no'] . "')";



$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["holding_Id"] . "<br>";
        echo "Name: " . $row["holding_name"] . "<br>";
        echo "Type: " . $row["holding_type"] . "<br>";
        echo "Highest Price: " . $row["highest"] . "<br>";

        // Determine the type of holding and fetch additional information accordingly
        if ($row["holding_type"] == "stock") {
            $stock_sql = "SELECT * FROM stock WHERE ID = '" . $row["holding_Id"] . "'";
            $stock_result = $conn->query($stock_sql);
            if ($stock_result->num_rows > 0) {
                $stock_row = $stock_result->fetch_assoc();
                echo "Price: " . $stock_row["Price"] . "<br>";
            }
        } elseif ($row["holding_type"] == "FO") {
            $fo_sql = "SELECT * FROM fo WHERE ID = '" . $row["holding_Id"] . "'";
            $fo_result = $conn->query($fo_sql);
            if ($fo_result->num_rows > 0) {
                $fo_row = $fo_result->fetch_assoc();
                echo "Lot Size: " . $fo_row["Lotsize"] . "<br>";
                echo "Premium Price: " . $fo_row["Premium_Price"] . "<br>";
                echo "Expiry Date: " . $fo_row["EXP_Date"] . "<br>";
            }
        }

        echo "<hr>"; // Separating each holding's information
    }
} else {
    echo "No Holdings Watchlisted";
}

$conn->close();
?>
    
</body>
</html>