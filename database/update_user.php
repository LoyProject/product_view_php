<?php
    include 'db_connection.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];

        function clean_input($data) {
            return trim(htmlspecialchars($data, ENT_QUOTES, 'UTF-8'));
        }

        $name = clean_input($_POST['name']);
        $role = clean_input($_POST['role']);
        $username = clean_input($_POST['username']);
        $password = clean_input($_POST['password']);
        $active = 1;

        $sql = "SELECT password FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $currentHashedPassword = $row['password'];
        $stmt->close();

        if ($password === $currentHashedPassword) {
            $sql = "UPDATE users SET full_name=?, role=?, username=?, active=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssii", $name, $role, $username, $active, $id);
        } else {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $sql = "UPDATE users SET full_name=?, role=?, username=?, password=?, active=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssii", $name, $role, $username, $hashedPassword, $active, $id);
        }

        if ($stmt->execute()) {
            echo "User updated successfully.";
        } else {
            echo "Error updating user: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
?>
