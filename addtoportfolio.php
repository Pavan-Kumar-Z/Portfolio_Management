<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="addtoportfolio.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
<header>
    <div id = "cont">
    <h3 class="name">Portfolio Management</h3>
    </div>
</header>
    <div class = "container">
    <?php
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

    // SQL query to select data from the holding table
    $sql = "SELECT * FROM holding";
    $result = $conn->query($sql);
    $portfolio_id = $_GET['portfolio_id'];

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "" . $row["holding_Id"] . "<br>";
            echo "" . $row["holding_name"] . "<br>";
            echo "" . $row["holding_type"] . "<br>";
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
           

            echo "<form action='addtoportfoliodb.php' method='GET'>";
            echo "<input type='number' id='quantity' name='quantity' min='1' max='100'>";
            echo "<input type='hidden' name='holding_Id' value='" . $row["holding_Id"] . "'>";
            echo "<input type='hidden' name='portfolio_id' value='" . $portfolio_id . "'>";
            echo "<input type='submit' value='Add Holding' class='tag2'>";
            echo "</form>";

            
            echo "<hr>"; // Separating each holding's information
        }
    } else {
        echo "No results";
    }

    $conn->close();
    ?>
    </div>
</body>
</html>
