<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}
?>

<?php

    include '../database/db_connection.php';

    $id = $_GET['id'];

    if ($id) {
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Failed to delete record']);
        }

        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid ID']);
    }

    $conn->close();
?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    window.location.href = '../admin_site_views/user.php';
});
</script>