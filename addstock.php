<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="portfolio.css">
    
    <title>ADD STOCK</title>
    <script src="addstock.js"></script>
</head>
<body>

<h2>Add New Stock</h2>

<form action="addstockdb.php" method="POST">
    <input type="radio" id="stock_radio" name="type" value="stock" onclick="toggleFields()" checked>
    <label for="stock_radio">Stock</label>
    <input type="radio" id="fo_radio" name="type" value="fo" onclick="toggleFields()">
    <label for="fo_radio">F/O</label><br>

    <div id="stock_fields">
        <label for="id">ID:</label><br>
        <input type="text" id="id" name="id" required><br>
        <label for="name">Holding Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="highest_price">Highest Price:</label><br>
        <input type="text" id="highest_price" name="highest_price"><br>
        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price"><br>
    </div>

    <div id="fo_fields" style="display: none;">
        <label for="lot_size">Lot Size:</label><br>
        <input type="text" id="lot_size" name="lot_size"><br>
        <label for="premium_price">Premium Price:</label><br>
        <input type="text" id="premium_price" name="premium_price"><br>
        <label for="expiry_date">Expiry Date:</label><br>
        <input type="date" id="expiry_date" name="expiry_date"><br>
    </div>

    <input type="submit" value="ADD STOCK">

</form>

</body>
</html>
