<?php
    header('Content-Type: application/json');

    include 'db_connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fullname = $_POST['name'];
        $role = $_POST['role'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $active = 1;

        $stmt = $conn->prepare("INSERT INTO users (full_name, role, username, password, active) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $fullname, $role, $username, $password, $active);

        if ($stmt->execute()) {
            $response['status'] = 'success';
            $response['message'] = 'New user inserted successfully';
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
