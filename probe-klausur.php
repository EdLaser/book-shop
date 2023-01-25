<?php
$db_con = new mysqli("localhost", "testdb", "testpw", "testuser")
    or die("Keine Verbindung zur Datenbank moeglich: ");

$artikel = [];
$query = "SELECT * FROM Products WHERE Menge = 0;";

$res = $db_con->query($query) or die("failure!");

if ($result->num_rows > 0) {
    echo '<table>';
    echo '<tr>';
    echo '<th>Product Name</th>';
    echo '<th>View Product</th>';
    echo '</tr>';
    // Loop through the results
    while ($row = $result->fetch_assoc()) {
        // Display the product as an HTML table
        echo '<tr>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td><a href="product_detail.php?id=' . $row['id'] . '">View Product Details</a></td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo 'No out of stock products found.';
}

// Close the connection
$conn->close();
