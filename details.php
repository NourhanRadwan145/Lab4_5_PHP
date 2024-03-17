<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
</head>
<body>
    <h1>Product Details</h1>
    <?php
    require_once 'config.php';
    require_once 'database.php';

    $db = new App\Database();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE id = $id";
        $result = $db->query($sql);
        $row = $db->fetchArray($result);

        if ($row) {
            echo "<h2>{$row['name']}</h2>";
            echo "<p>Description: {$row['description']}</p>";
            echo "<p>Price: {$row['price']}</p>";
            // Add more details as needed
        } else {
            echo "<p>Product not found.</p>";
        }
    } else {
        echo "<p>Invalid product ID.</p>";
    }
    ?>
</body>
</html>
