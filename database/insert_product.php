<?php
    header('Content-Type: application/json');

    include 'db_connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function clean_input($data) {
            return trim(htmlspecialchars($data, ENT_QUOTES, 'UTF-8'));
        }

        $name = clean_input($_POST['name']);
        $description = clean_input($_POST['description']);
        $category_id = intval($_POST['category']);

        $image = time() . '-' . $_FILES['image']['name'];
        $target_dir = "../images/";
        $target_file = $target_dir . time() . '-' . basename($_FILES["image"]["name"]);

        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            die(json_encode(['status' => 'error', 'message' => 'File upload failed. Check folder permissions.']));
        }

        $stmt = $conn->prepare("INSERT INTO products (name, description, image, category_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $name, $description, $image, $category_id);

        if ($stmt->execute()) {
            $response['status'] = 'success';
            $response['message'] = 'New product inserted successfully';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error: ' . $stmt->error;
        }

        $stmt->close();
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Invalid request method';
    }

    $conn->close();
    echo json_encode($response);
?>
