<?php
    include 'db_connection.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = 1;
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        
        $image_header = isset($_FILES['image-header']['name']) ? $_FILES['image-header']['name'] : '';
        $image_footer = isset($_FILES['image-footer']['name']) ? $_FILES['image-footer']['name'] : '';
        $target_dir = "../images_logo/";

        $update_image_header = null;
        $update_image_footer = null;

        if (!empty($image_header)) {
            $target_file_header = $target_dir . time() . '-header-' . basename($image_header);
            if (move_uploaded_file($_FILES['image-header']['tmp_name'], $target_file_header)) {
                $update_image_header = basename($target_file_header);
            }
        }
        
        if (!empty($image_footer)) {
            $target_file_footer = $target_dir . time() . '-footer-' . basename($image_footer);
            if (move_uploaded_file($_FILES['image-footer']['tmp_name'], $target_file_footer)) {
                $update_image_footer = basename($target_file_footer);
            }
        }

        $sql = "SELECT logo_header, logo_footer FROM companies WHERE id=1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($old_header, $old_footer);
        $stmt->fetch();
        $stmt->close();

        if (!empty($update_image_header) && !empty($old_header) && file_exists("../images_logo/" . $old_header)) {
            unlink("../images_logo/" . $old_header);
        }
        
        if (!empty($update_image_footer) && !empty($old_footer) && file_exists("../images_logo/" . $old_footer)) {
            unlink("../images_logo/" . $old_footer);
        }

        $sql = "UPDATE companies SET name=?, contact=?, address=?, email=?, logo_header=IFNULL(?, logo_header), logo_footer=IFNULL(?, logo_footer) WHERE id=1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $name, $contact, $address, $email, $update_image_header, $update_image_footer);

        if ($stmt->execute()) {
            echo "Company details updated successfully.";
        } else {
            echo "Error updating company: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
?>
