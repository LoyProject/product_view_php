<?php
    include 'db_connection.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $role = $_POST['role'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $active = 1;

        $sql = "UPDATE users SET full_name=?, role=?, username=?, password=?, active=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssii", $name, $role, $username, $password, $active, $id);

        if ($stmt->execute()) {
            echo "User updated successfully.";
        } else {
            echo "Error updating user: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
?>
