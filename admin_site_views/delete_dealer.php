<?php
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    include '../database/db_connection.php';

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = intval($_GET['id']);

        $stmt = $conn->prepare("SELECT image FROM dealers WHERE id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $row = $result->fetch_assoc()) {
                $imageName = $row['image'];
                $imagePath = "../images_dealer/" . $imageName;

                if (file_exists($imagePath) && unlink($imagePath)) {
                    $deleteStmt = $conn->prepare("DELETE FROM dealers WHERE id = ?");
                    if ($deleteStmt) {
                        $deleteStmt->bind_param("i", $id);
                        if ($deleteStmt->execute()) {
                            echo json_encode(['success' => true]);
                        } else {
                            echo json_encode(['success' => false, 'error' => 'Failed to delete record']);
                        }
                        $deleteStmt->close();
                    } else {
                        echo json_encode(['success' => false, 'error' => 'Failed to prepare delete statement']);
                    }
                } else {
                    echo json_encode(['success' => false, 'error' => 'Failed to delete image file']);
                }
            } else {
                echo json_encode(['success' => false, 'error' => 'Image not found for the given ID']);
            }

            $stmt->close();
        } else {
            echo json_encode(['success' => false, 'error' => 'Failed to prepare select statement']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid or missing ID']);
    }

    $conn->close();
?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.location.href = '../admin_site_views/dealer.php';
    });
</script>
