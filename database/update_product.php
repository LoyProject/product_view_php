<?php
    include 'db_connection.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];

        function clean_input($data) {
            return trim(htmlspecialchars($data, ENT_QUOTES, 'UTF-8'));
        }

        $name = clean_input($_POST['name']);
        $description = clean_input($_POST['description']);
        $category_id = clean_input($_POST['category']);
        
        $image = $_FILES['image']['name'];
        $target_dir = "../images/";
        $target_file = $target_dir . time() . '-' . basename($image);

        if (!empty($image) && move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $sql = "SELECT image FROM products WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->bind_result($old_image);
            $stmt->fetch();
            $stmt->close();

            if (!empty($old_image) && file_exists("../images/" . $old_image)) {
                unlink("../images/" . $old_image);
            }

            $sql = "UPDATE products SET name=?, description=?, image=?, category_id=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssii", $name, $description, basename($target_file), $category_id, $id);

            if ($stmt->execute()) {
                echo "Product updated successfully.";
            } else {
                echo "Error updating product: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $sql = "UPDATE products SET name=?, description=?, category_id=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssii", $name, $description, $category_id, $id);

            if ($stmt->execute()) {
                echo "Product updated successfully.";
            } else {
                echo "Error updating product: " . $stmt->error;
            }

            $stmt->close();
        }
    }

    $conn->close();
?>
