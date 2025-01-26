<?php
    header('Content-Type: application/json');

    include 'db_connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $image = time() . '-' . $_FILES['image']['name'];
        $target_dir = "../images_logo/";
        $target_file = $target_dir . $image;
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

        $result = $conn->query("SELECT * FROM logo ORDER BY id DESC LIMIT 1");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $old_image = $row['image'];
            $old_image_path = $target_dir . $old_image;

            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }

            $conn->query("DELETE FROM logo WHERE id = " . $row['id']);
        }

        $stmt = $conn->prepare("INSERT INTO logo (image) VALUES (?)");
        $stmt->bind_param("s", $image);

        if ($stmt->execute()) {
            $response['status'] = 'success';
            $response['message'] = 'New logo inserted successfully';
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