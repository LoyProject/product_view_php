<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Create Product </title>
</head>
<body>
    <form action="../database/insert_product.php" method="post" enctype="multipart/form-data">
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="description">Product Description:</label>
        <textarea id="description" name="description" required></textarea><br><br>
        
        <label for="image">Product Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>
        
        <input type="submit" value="Create Product">
    </form>
</body>
</html>