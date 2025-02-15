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
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (file_exists($target_file)) {
            $response['status'] = 'error';
            $response['message'] = 'Sorry, file already exists.';
            echo json_encode($response);
            exit;
        }

        if ($_FILES["image"]["size"] > 500000) {
            $response['status'] = 'error';
            $response['message'] = 'Sorry, your file is too large.';
            echo json_encode($response);
            exit;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $response['status'] = 'error';
            $response['message'] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
            echo json_encode($response);
            exit;
        }

        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $response['status'] = 'error';
            $response['message'] = 'Sorry, there was an error uploading your file.';
            echo json_encode($response);
            exit;
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
