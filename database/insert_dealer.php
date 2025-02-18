<?php
    header('Content-Type: application/json');

    include 'db_connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function clean_input($data) {
            return trim(htmlspecialchars($data, ENT_QUOTES, 'UTF-8'));
        }

        $name = clean_input($_POST['name']);
        $contact = clean_input($_POST['contact']);
        $address = clean_input($_POST['address']);
        $map = clean_input($_POST['map']);
        
        $image = time() . '-' . $_FILES['image']['name'];
        $target_dir = "../images_dealer/";
        $target_file = $target_dir . time() . '-' . basename($_FILES["image"]["name"]);

        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            die(json_encode(['status' => 'error', 'message' => 'File upload failed. Check folder permissions.']));
        }

        $stmt = $conn->prepare("INSERT INTO dealers (name, contact, address, map, image) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $contact, $address, $map, $image);   

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
