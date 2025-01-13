<?php
    header('Content-Type: application/json');

    $servername = "220.158.232.172";
    $username = "product_mh01";
    $password = "cL6sC3iRnWc3APyK";
    $dbname = "product_mh01";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        echo json_encode(['success' => false, 'error' => 'Database connection failed']);
        exit();
    }

    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'] ?? null;
    $name = $data['name'] ?? null;
    $description = $data['description'] ?? null;
    $newImageName = $data['image'] ?? null;
    $uploadDir = "../images/";

    if ($id && $name && $description) {
        $stmt = $conn->prepare("SELECT image FROM products WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();
        $stmt->close();

        if (!$product) {
            echo json_encode(['success' => false, 'error' => 'Product not found']);
            exit();
        }

        $currentImageName = $product['image'];
        if ($newImageName) {
            $oldImagePath = $uploadDir . $currentImageName;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            $stmt = $conn->prepare("UPDATE products SET name = ?, description = ?, image = ? WHERE id = ?");
            $stmt->bind_param("sdsi", $name, $description, $newImageName, $id);
        } else {
            $stmt = $conn->prepare("UPDATE products SET name = ?, description = ? WHERE id = ?");
            $stmt->bind_param("sdi", $name, $description, $id);
        }

        if ($stmt->execute()) {
            $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $updatedProduct = $result->fetch_assoc();
            $stmt->close();

            echo json_encode(['success' => true, 'data' => $updatedProduct]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Failed to update product']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid input']);
    }

    $conn->close();
?>
