<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info</title>
    <link rel="stylesheet" href="viewusers.css">

</head>

<body>
    <header>
    <div id = "container">
    <h3 class="name">Portfolio Management</h3>
    <a href = "admin.php" class = "tag">HOME</a>
    </div>
    </header>

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

    $portfolio_id = $_GET['Portfolio_Id'];
    $ID = $_GET['ID'];
    $sql = "SELECT * FROM holdingportfolio WHERE Portfolio_Id = '$portfolio_id' AND ID = '$ID'";

    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "" . $row["Holding_Id"] . "<br>";

            $sql1 = "SELECT `holding_Id`, `holding_name`, `holding_type`, `highest` FROM `holding` WHERE holding_Id = " . $row["Holding_Id"];
            $result1 = $conn->query($sql1);
            $row1 = $result1->fetch_assoc();
            echo "" . $row1["holding_name"] . "<br>";
            echo "" . $row1["holding_type"] . "<br>";
            echo "Highest Price: " . $row1["highest"] . "<br>";


            // Determine the type of holding and fetch additional information accordingly
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

            echo "<hr>"; // Separating each holding's information
        }
    } else {
        echo "0 results";
    }


    ?>
</body>

</html>