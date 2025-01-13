<?php
    header('Content-Type: application/json');

    $input = json_decode(file_get_contents('php://input'), true);

    if (!isset($input['id']) || !is_numeric($input['id'])) {
        echo json_encode(['error' => 'Invalid product ID.']);
        exit;
    }

    $productId = intval($input['id']);

    $servername = "220.158.232.172";
    $username = "product_mh01";
    $password = "cL6sC3iRnWc3APyK";
    $dbname = "product_mh01";

    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        echo json_encode(['error' => 'Database connection failed.']);
        exit;
    }

    $stmt = $conn->prepare("SELECT name, description, image FROM products WHERE id = ?");
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $stmt->bind_result($name, $description, $image);
    $stmt->fetch();

    if ($name) {
        echo json_encode(['name' => $name, 'description' => $description, 'image' => $image]);
    } else {
        echo json_encode(['error' => 'Product not found.']);
    }

    $stmt->close();
    $conn->close();
?>
