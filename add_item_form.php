<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Item</title>
</head>
<body>
    <h2>Add New Item</h2>
    <form action="add_item.php" method="POST">
        <label for="product_name">Product Name:</label><br>
        <input type="text" id="product_name" name="product_name" required><br><br>
        
        <label for="category">Category:</label><br>
        <input type="text" id="category" name="category" required><br><br>
        
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required></textarea><br><br>
        
        <label for="list_price">List Price:</label><br>
        <input type="number" id="list_price" name="list_price" min="0" required><br><br>
        
        <button type="submit">Add Item</button>
    </form>
</body>
</html>
