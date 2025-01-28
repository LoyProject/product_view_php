<?php
    include 'db_connection.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];

        $sql = "UPDATE categories SET name = ?, description = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $name, $description, $id);

        if ($stmt->execute()) {
            $response = [
                'status' => 'success',
                'message' => 'Category updated successfully.'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Error updating category: ' . $stmt->error
            ];
        }

        $stmt->close();
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Invalid request method.'
        ];
    }

    $conn->close();
    echo json_encode($response);
?>
