<?php
    header('Content-Type: application/json');
    include 'db_connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function clean_input($data) {
            return trim(htmlspecialchars($data, ENT_QUOTES, 'UTF-8'));
        }

        $fullname = clean_input($_POST['name']);
        $role = clean_input($_POST['role']);
        $username = clean_input($_POST['username']);
        $password = clean_input($_POST['password']);
        $active = 1;

        // Hash the password before saving it
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $conn->prepare("INSERT INTO users (full_name, role, username, password, active) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $fullname, $role, $username, $hashedPassword, $active);

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
