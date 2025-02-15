<?php
    header('Content-Type: application/json');
    include 'db_connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function clean_input($data) {
            return trim(htmlspecialchars($data, ENT_QUOTES, 'UTF-8'));
        }

        $name = clean_input($_POST['name']);
        $description = clean_input($_POST['description']);

        $stmt = $conn->prepare("INSERT INTO categories (name, description) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $description);

        if ($stmt->execute()) {
            $response['status'] = 'success';
            $response['message'] = 'New category inserted successfully';
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