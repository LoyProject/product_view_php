<?php
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    include '../database/db_connection.php';

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = intval($_GET['id']);

        $stmt = $conn->prepare("DELETE FROM categories WHERE id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'Category deleted successfully.']);
            } else {
                echo json_encode(['success' => false, 'error' => 'Failed to delete category.']);
            }

            $stmt->close();
        } else {
            echo json_encode(['success' => false, 'error' => 'Failed to prepare delete statement.']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid or missing category ID.']);
    }

    $conn->close();
?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.location.href = '../admin_site_views/category.php';
    });
</script>
