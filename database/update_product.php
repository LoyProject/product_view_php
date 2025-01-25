<?php
    include 'db_connection.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $image = $_FILES['image']['name'];
        $target_dir = "../images/";
        $target_file = $target_dir . time() . '-' . basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
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

            $sql = "UPDATE products SET name=?, description=?, image=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $name, $description, basename($target_file), $id);

            if ($stmt->execute()) {
                echo "Product updated successfully.";
            } else {
                echo "Error updating product: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $sql = "UPDATE products SET name=?, description=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssi", $name, $description, $id);

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
