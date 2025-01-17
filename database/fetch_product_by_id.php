<?php
header('Content-Type: application/json');

// Get JSON input and validate
$input = json_decode(file_get_contents('php://input'), true);

if (!isset($input['id']) || !is_numeric($input['id'])) {
    echo json_encode(['error' => 'Invalid product ID.']);
    exit;
}

$productId = intval($input['id']);


include 'db_connection.php';

if ($conn->connect_error) {
    echo json_encode(['error' => 'Database connection failed: ' . $conn->connect_error]);
    exit;
}

// Prepare and execute the query
$stmt = $conn->prepare("SELECT name, description, image FROM products WHERE id = ?");
if (!$stmt) {
    echo json_encode(['error' => 'Failed to prepare statement: ' . $conn->error]);
    exit;
}

$stmt->bind_param("i", $productId);
if (!$stmt->execute()) {
    echo json_encode(['error' => 'Query execution failed: ' . $stmt->error]);
    exit;
}

$stmt->bind_result($name, $description, $image);
$stmt->fetch();

if ($name) {
    // Return the fetched data
    echo json_encode([
        'name' => $name,
        'description' => $description,
        'image' => $image
    ]);
} else {
    echo json_encode(['error' => 'Product not found.']);
}

// Clean up
$stmt->close();
$conn->close();
?>

