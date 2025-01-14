<?php
    // $servername = "220.158.232.172";
    // $username = "product_mh01";
    // $password = "cL6sC3iRnWc3APyK";
    // $dbname = "product_mh01";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "product_views";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>