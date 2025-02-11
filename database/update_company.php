<?php
    include 'db_connection.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = 1;
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $description = $_POST['description'];
        $location = $_POST['location'];
        $facebook = $_POST['facebook'];
        $telegram = $_POST['telegram'];
        $youtube = $_POST['youtube'];

        $target_dir = "../images_logo/";
        $image_header = isset($_FILES['image-header']['name']) ? $_FILES['image-header']['name'] : '';
        $image_footer = isset($_FILES['image-footer']['name']) ? $_FILES['image-footer']['name'] : '';
        $image1 = isset($_FILES['image1']['name']) ? $_FILES['image1']['name'] : '';
        $image2 = isset($_FILES['image2']['name']) ? $_FILES['image2']['name'] : '';
        $image3 = isset($_FILES['image3']['name']) ? $_FILES['image3']['name'] : '';

        $update_image_header = null;
        $update_image_footer = null;
        $update_image1 = null;
        $update_image2 = null;
        $update_image3 = null;

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

        if (!empty($image1)) {
            $target_file1 = $target_dir . time() . '-image1-' . basename($image1);
            if (move_uploaded_file($_FILES['image1']['tmp_name'], $target_file1)) {
                $update_image1 = basename($target_file1);
            }
        }

        if (!empty($image2)) {
            $target_file2 = $target_dir . time() . '-image2-' . basename($image2);
            if (move_uploaded_file($_FILES['image2']['tmp_name'], $target_file2)) {
                $update_image2 = basename($target_file2);
            }
        }

        if (!empty($image3)) {
            $target_file3 = $target_dir . time() . '-image3-' . basename($image3);
            if (move_uploaded_file($_FILES['image3']['tmp_name'], $target_file3)) {
                $update_image3 = basename($target_file3);
            }
        }

        $sql = "SELECT logo_header, logo_footer, image1, image2, image3 FROM companies WHERE id=1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($old_header, $old_footer, $old_image1, $old_image2, $old_image3);
        $stmt->fetch();
        $stmt->close();

        if (!empty($update_image_header)) {
            if (!empty($old_header)) {
                unlink("../images_logo/" . $old_header);
            }
        }

        if (!empty($update_image_footer)) {
            if (!empty($old_footer)) {
                unlink("../images_logo/" . $old_footer);
            }
        }

        if (!empty($update_image1)) {
            if (!empty($old_image1)) {
                unlink("../images_logo/" . $old_image1);
            }
        }

        if (!empty($update_image2)) {
            if (!empty($old_image2)) {
                unlink("../images_logo/" . $old_image2);
            }
        }

        if (!empty($update_image3)) {
            if (!empty($old_image3)) {
                unlink("../images_logo/" . $old_image3);
            }
        }

        $sql = "UPDATE companies SET name=?, contact=?, address=?, email=?, description=?, location=?, facebook=?, telegram=?, youtube=?, logo_header=IFNULL(?, logo_header), logo_footer=IFNULL(?, logo_footer), image1=IFNULL(?, image1), image2=IFNULL(?, image2), image3=IFNULL(?, image3) WHERE id=1";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssssssss", $name, $contact, $address, $email, $description, $location, $facebook, $telegram, $youtube, $update_image_header, $update_image_footer, $update_image1, $update_image2, $update_image3);

        if ($stmt->execute()) {
            echo "Company details updated successfully.";
        } else {
            echo "Error updating company: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
?>
