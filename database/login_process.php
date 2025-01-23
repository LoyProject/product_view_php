<?php
session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Read the raw POST data and decode the JSON
    $input = json_decode(file_get_contents('php://input'), true);

    // Check if the data is valid
    if (isset($input['username']) && isset($input['password'])) {
        $username = $input['username'];
        $password = $input['password'];

        // Escape the inputs to prevent SQL injection
        $username = $conn->real_escape_string($username);
        $password = $conn->real_escape_string($password);

        // Query to check the user credentials
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);

        // Check if user exists
        if ($result->num_rows > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Invalid username or password.']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Username and password are required.']);
    }
}

$conn->close();
?>