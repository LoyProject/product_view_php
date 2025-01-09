<?php
    $servername = "220.158.232.172";
    $username = "product_mh01";
    $password = "cL6sC3iRnWc3APyK";
    $dbname = "product_mh01";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $image = time() . '-' .$_FILES['image']['name'];
        $target_dir = "../../public/images/";
        $target_file = $target_dir . time() . '-' . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            exit;
        }

        if ($_FILES["image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            exit;
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit;
        }

        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }

        $stmt = $conn->prepare("INSERT INTO products (name, description, image) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $description, $image);

        if ($stmt->execute()) {
            echo "New product inserted successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
?>
