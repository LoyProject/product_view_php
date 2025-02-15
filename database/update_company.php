<?php
    include 'db_connection.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = 1;
        
        function clean_input($data) {
            return trim(htmlspecialchars($data, ENT_QUOTES, 'UTF-8'));
        }

        $companyName = clean_input($_POST['name']);
        $contact = clean_input($_POST['contact']);
        $address = clean_input($_POST['address']);
        $email = clean_input($_POST['email']);
        $description = clean_input($_POST['description']);
        $location = clean_input($_POST['location']);
        $facebook = clean_input($_POST['facebook']);
        $telegram = clean_input($_POST['telegram']);
        $youtube = clean_input($_POST['youtube']);

        $target_dir_logo = "../images_logo/";
        $target_dir_slideshow = "../images_slideshow/";

        function upload_single_image($file_input_name, $target_dir) {
            if (!empty($_FILES[$file_input_name]['name'])) {
                $filename = time() . '-' . basename($_FILES[$file_input_name]['name']);
                $target_file = $target_dir . $filename;
                
                if (move_uploaded_file($_FILES[$file_input_name]['tmp_name'], $target_file)) {
                    return $filename;
                }
            }
            return null;
        }

        $update_image_header = upload_single_image('image-header', $target_dir_logo);
        $update_image_footer = upload_single_image('image-footer', $target_dir_logo);
        $update_image1 = upload_single_image('image1', $target_dir_logo);
        $update_image2 = upload_single_image('image2', $target_dir_logo);
        $update_image3 = upload_single_image('image3', $target_dir_logo);

        $uploaded_slideshow_images = [];
        if (!empty($_FILES['slideshow_images']['name'][0])) {
            foreach ($_FILES['slideshow_images']['name'] as $key => $name) {
                if (!empty($name)) {
                    $random_string = bin2hex(random_bytes(4));
                    $filename = time() . "-slideshow-" . $random_string . "-" . basename($name);
                    $target_file = $target_dir_slideshow . $filename;
                    
                    if (move_uploaded_file($_FILES['slideshow_images']['tmp_name'][$key], $target_file)) {
                        $uploaded_slideshow_images[] = $filename;
                    }
                }
            }
        }

        $sql = "SELECT slideshow_images FROM companies WHERE id=1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($old_slideshow_images_json);
        $stmt->fetch();
        $stmt->close();

        $existing_slideshow_images = !empty($old_slideshow_images_json) ? json_decode($old_slideshow_images_json, true) : [];
        $final_slideshow_images = array_merge($existing_slideshow_images, $uploaded_slideshow_images);

        $update_slideshow_images = !empty($final_slideshow_images) ? json_encode($final_slideshow_images) : null;

        $sql = "UPDATE companies SET 
            name=?, contact=?, address=?, email=?, description=?, location=?, 
            facebook=?, telegram=?, youtube=?, 
            logo_header=IFNULL(?, logo_header), 
            logo_footer=IFNULL(?, logo_footer), 
            image1=IFNULL(?, image1), 
            image2=IFNULL(?, image2), 
            image3=IFNULL(?, image3),
            slideshow_images=IFNULL(?, slideshow_images) 
            WHERE id=1";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssssssss", 
            $companyName, $contact, $address, $email, $description, $location, 
            $facebook, $telegram, $youtube, 
            $update_image_header, $update_image_footer, 
            $update_image1, $update_image2, $update_image3, 
            $update_slideshow_images
        );

        if ($stmt->execute()) {
            echo "Company details updated successfully.";
        } else {
            echo "Error updating company: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
?>
