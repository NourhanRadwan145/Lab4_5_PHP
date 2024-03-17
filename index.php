<?php
require_once "vendor/autoload.php";

$db = new Database();

// Pagination
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * RECORDS_PER_PAGE;

// Fetch products for the current page
$sql = "SELECT * FROM products LIMIT $offset, " . RECORDS_PER_PAGE;
$result = $db->query($sql);

// Display products
echo "<h2>Products</h2>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Name</th><th>More</th></tr>";
while ($row = $db->fetchArray($result)) {
    echo "<tr>";
    echo "<td>{$row['id']}</td>";
    echo "<td>{$row['product_name']}</td>";
    echo "<td><a href='details.php?id={$row['id']}'>More</a></td>";
    echo "</tr>";
}
echo "</table>";

// Pagination links
$sql = "SELECT COUNT(*) AS total FROM products";
$result = $db->query($sql);
$row = $db->fetchArray($result);
$total_pages = ceil($row['total'] / RECORDS_PER_PAGE);

echo "<br><br>Pages: ";
for ($i = 1; $i <= $total_pages; $i++) {
    echo "<a href='products.php?page=$i'>$i</a> ";
}

$db->close();
?>
