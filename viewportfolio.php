<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Portfolio</title>
    <link rel="stylesheet" href="viewportfolio.css">
</head>
<body>
    <header>
    <div id = "container">
    <h3 class="name">Portfolio Management</h3>
    <a href = "page.php" class = "tag">LOGOUT</a>
    </div>
    </header>
    <div class="portfolio-info">
    <?php
session_start();

    
// Database connection
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

$portfolio_id = $_GET['portfolio_id'];

// SQL query to select data from the holding table
$sql = "SELECT * FROM holdingportfolio WHERE ID = '{$_SESSION['Pan_no']}' AND Portfolio_Id = $portfolio_id";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Quanity: " . $row["quantity"] . "<br>";
        $sql1 = "SELECT * FROM holding WHERE holding_Id = {$row['Holding_Id']}";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
            while ($row1 = $result1->fetch_assoc()) {
                echo "ID: " . $row1["holding_Id"] . "<br>";
                echo "Name: " . $row1["holding_name"] . "<br>";
                echo "Type: " . $row1["holding_type"] . "<br>";
                echo "Highest Price: " . $row1["highest"] . "<br>";
                if ($row1["holding_type"] == "stock") {
                    $stock_sql = "SELECT * FROM stock WHERE ID = '" . $row1["holding_Id"] . "'";
                    $stock_result = $conn->query($stock_sql);
                    if ($stock_result->num_rows > 0) {
                        $stock_row = $stock_result->fetch_assoc();
                        echo "Price: " . $stock_row["Price"] . "<br>";
                    }
                } elseif ($row1["holding_type"] == "FO") {
                    $fo_sql = "SELECT * FROM fo WHERE ID = '" . $row1["holding_Id"] . "'";
                    $fo_result = $conn->query($fo_sql);
                    if ($fo_result->num_rows > 0) {
                        $fo_row = $fo_result->fetch_assoc();
                        echo "Lot Size: " . $fo_row["Lotsize"] . "<br>";
                        echo "Premium Price: " . $fo_row["Premium_Price"] . "<br>";
                        echo "Expiry Date: " . $fo_row["EXP_Date"] . "<br>";
                    }
                }
            }
            
        }
        
        echo "<hr>"; // Separating each holding's information
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>

    </div>
    
</body>
</html>