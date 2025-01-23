<?php
include 'db_connection.php';

header('Content-Type: application/json');
session_start();

file_put_contents('debug.log', json_encode($_POST), FILE_APPEND); // Log incoming POST data

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($username) || empty($password)) {
        file_put_contents('debug.log', "Missing username or password\n", FILE_APPEND); // Log missing data
        echo json_encode(['success' => false, 'message' => 'Username and password are required.']);
        exit();
    }

    // Debug valid username and password
    file_put_contents('debug.log', "Username: $username, Password: $password\n", FILE_APPEND);

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid username or password.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid username or password.']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    file_put_contents('debug.log', "Invalid request method\n", FILE_APPEND); // Log invalid request
}
?>