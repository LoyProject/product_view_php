<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
</head>
<body>
    <h1>Product Detail Page</h1>
    <?php
    
        include 'db_connection.php';

        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $product_id = intval($_GET['id']);
            $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
            $stmt->bind_param("i", $product_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<p>Name: " . htmlspecialchars($row["name"]) . "</p>";
                    echo "<p>Description: " . htmlspecialchars($row["description"]) . "</p>";
                    echo "<img src='images/" . htmlspecialchars($row["image"]) . "' alt='Product Image' width='200' height='300'>";
                }
            } else {
                echo "<p>No results found for the specified product.</p>";
            }
            $stmt->close();
        } else {
            echo "<p>Invalid product ID.</p>";
        }

        $conn->close();
    ?>
</body>
</html>