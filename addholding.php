<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addholding.css">
    
    <title>Add Holdings</title>
</head>
<body>

<h2>Holdings</h2>

<div class="holding-info">
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "portfolio_db";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM holding";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "" . $row["holding_Id"] . "<br>";
            echo "" . $row["holding_name"] . "<br>";
            echo "" . $row["holding_type"] . "<br>";
            echo "Highest Price: " . $row["highest"] . "<br>";


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

            echo "<a href='addholdingdb.php?holding_id=" . $row["holding_Id"] . "' class='tag1'>Add Holding</a><hr>";

        }
    } else {
        echo "No results";
    }

    $conn->close();
    ?>

</div>

</body>
</html>
