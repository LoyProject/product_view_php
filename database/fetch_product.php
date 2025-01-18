<?php
    include 'db_connection.php';

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