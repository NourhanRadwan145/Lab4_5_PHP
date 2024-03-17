<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <h1>Products</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Details</th>
        </tr>
        <?php
        require_once 'config.php';
        require_once 'database.php';

        $db = new App\Database();

        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * RECORDS_PER_PAGE;

        $sql = "SELECT * FROM products LIMIT $offset, " . RECORDS_PER_PAGE;
        $result = $db->query($sql);

        while ($row = $db->fetchArray($result)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td><a href='details.php?id={$row['id']}'>Details</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
