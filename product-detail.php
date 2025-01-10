<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Porduct Detail </title>
</head>
<body>
    <h1>Product Detail Page</h1>
    <?php
        $servername = "220.158.232.172";
        $username = "product_mh01";
        $password = "cL6sC3iRnWc3APyK";
        $dbname = "product_mh01";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $product_id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE id = $product_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<p>Name: " . $row["name"] . "</p>";
                echo "<p>Description: " . $row["description"] . "</p>";
                echo "<img src='images/" . $row["image"] . "' alt='Product Image' width='200' height='300'>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    ?>
</body>
</html>