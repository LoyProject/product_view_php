<?php
    $servername = "220.158.232.172";
    $username = "product_mh01";
    $password = "cL6sC3iRnWc3APyK";
    $dbname = "product_mh01";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM products";

    $result = $conn->query($sql);

    $data = array();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row; 
        }
        echo json_encode($data);
    } else {
        echo "0 results";
    }
    $conn->close();
?>