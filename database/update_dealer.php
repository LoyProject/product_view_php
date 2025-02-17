<?php
    include 'db_connection.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];

        function clean_input($data) {
            return trim(htmlspecialchars($data, ENT_QUOTES, 'UTF-8'));
        }

        $name = clean_input($_POST['name']);
        $address = clean_input($_POST['address']);
        $contact = clean_input($_POST['contact']);
        $map = clean_input($_POST['map']);
        
        $image = $_FILES['image']['name'];
        $target_dir = "../images_dealer/";
        $target_file = $target_dir . time() . '-' . basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $sql = "SELECT image FROM dealers WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->bind_result($old_image);
            $stmt->fetch();
            $stmt->close();

            if (!empty($old_image) && file_exists("../images_dealer/" . $old_image)) {
                unlink("../images_dealer/" . $old_image);
            }

            $sql = "UPDATE dealers SET name=?, contact=?, address=?, map=?, image=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssi", $name, $contact, $address, $map, basename($target_file), $id);

            if ($stmt->execute()) {
                echo "Dealer updated successfully.";
            } else {
                echo "Error updating dealer: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $sql = "UPDATE dealers SET name=?, contact=?, address=?, map=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssi", $name, $contact, $address, $map, $id);

            if ($stmt->execute()) {
                echo "Dealer updated successfully.";
            } else {
                echo "Error updating dealer: " . $stmt->error;
            }

            $stmt->close();

        }
    }

    $conn->close();
?>
