<?php
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    include '../database/db_connection.php';

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = intval($_GET['id']);

        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'error' => 'Failed to delete record']);
            }

            $stmt->close();
        } else {
            echo json_encode(['success' => false, 'error' => 'Failed to prepare delete statement']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid or missing ID']);
    }

    $conn->close();
?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.location.href = '../admin_site_views/user.php';
    });
</script>
