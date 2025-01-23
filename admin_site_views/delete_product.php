<?php

    include '../database/db_connection.php';

    $id = $_GET['id'];

    if ($id) {
        $stmt = $conn->prepare("SELECT image FROM products WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();

        if ($row && isset($row['image'])) {
            $imageName = $row['image'];
            $imagePath = "../images/" . $imageName;

            if (file_exists($imagePath) && unlink($imagePath)) {
                $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
                $stmt->bind_param("i", $id);

                if ($stmt->execute()) {
                    echo json_encode(['success' => true]);
                } else {
                    echo json_encode(['success' => false, 'error' => 'Failed to delete record']);
                }

                $stmt->close();
            } else {
                echo json_encode(['success' => false, 'error' => 'Failed to delete image file']);
            }
        } else {
            echo json_encode(['success' => false, 'error' => 'Image file not found']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid ID']);
    }

    $conn->close();
?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    window.location.href = '../admin_site_views/product.php';
});
</script>