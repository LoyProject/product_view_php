<?php
session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Decode JSON input
    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['username']) && isset($input['password'])) {
        $username = $input['username'];
        $password = $input['password'];

        // Escape the input to prevent SQL injection
        $username = $conn->real_escape_string($username);

        // Query the database for the user
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                echo json_encode([
                    'success' => true,
                    'message' => 'Login successful',
                    'user' => [
                        'id' => $user['id'],
                        'username' => $user['username'],
                        'role' => $user['role'],
                        'full_name' => $user['full_name']
                    ]
                ]);
            } else {
                echo json_encode(['success' => false, 'error' => 'Invalid password.']);
            }
        } else {
            echo json_encode(['success' => false, 'error' => 'User not found.']);
        }

        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'Username and password are required.']);
    }
}

$conn->close();
?>
