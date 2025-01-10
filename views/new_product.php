<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title> Admin Dashboard </title>
</head>
<body>
    <div class="flex h-screen bg-gray-200">
        <div class="w-64 bg-white shadow-md">
            <div class="p-4 font-bold text-xl border-b">Menu</div>
            <ul class="mt-4">
                <a href="#" onclick="showSection('dashboard')"><li class="px-4 py-2 hover:bg-gray-100">Dashboard</li></a>
                <a href="#" onclick="showSection('product')"><li class="px-4 py-2 hover:bg-gray-100">Product</li></a>
                <a href="#" onclick="showSection('setting')"><li class="px-4 py-2 hover:bg-gray-100">Setting</li></a>
            </ul>
        </div>

        <div class="flex-1 p-6">
            <div id="product" class="bg-white p-4 rounded shadow-md">
                <h1 class="text-2xl font-bold mb-4">Product List</h1>
                <?php
                    $conn = new mysqli("220.158.232.172", "product_mh01", "cL6sC3iRnWc3APyK", "product_mh01");
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $limit = 5;
                    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
                    $offset = ($page - 1) * $limit;

                    $total_sql = "SELECT COUNT(*) as total FROM products";
                    $total_result = $conn->query($total_sql);
                    $total_row = $total_result->fetch_assoc();
                    $total_records = $total_row['total'];
                    $total_pages = ceil($total_records / $limit);

                    $sql = "SELECT id, name, description, image FROM products ORDER BY id DESC LIMIT $limit OFFSET $offset";
                    $result = $conn->query($sql);
                ?>

                <table class="min-w-full bg-white border text-left">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b w-1/12">ID</th>
                            <th class="py-2 px-4 border-b w-2/12">Name</th>
                            <th class="py-2 px-4 border-b w-2/12">Description</th>
                            <th class="py-2 px-4 border-b w-2/12">Image</th>
                            <th class="py-2 px-4 border-b w-3/12">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td class="py-2 px-4 border-b"><?= $row["id"] ?></td>
                                    <td class="py-2 px-4 border-b"><?= $row["name"] ?></td>
                                    <td class="py-2 px-4 border-b"><?= $row["description"] ?></td>
                                    <td class="py-2 px-4 border-b"><img src="../images/<?= $row["image"] ?>" alt="Product Image" class="w-16 h-16"></td>
                                    <td class="py-2 px-4 border-b">
                                        <button class="bg-blue-500 text-white px-4 py-2 rounded">Edit</button>
                                        <button class="bg-red-500 text-white px-4 py-2 rounded" onclick="confirmDelete(<?= $row['id'] ?>)">Delete</button>

                                        <script>
                                            function confirmDelete(id) {
                                                if (confirm('Are you sure you want to delete this product?')) {
                                                    window.location.href = '../database/delete_product.php?id=' + id;
                                                    <?php
                                                        $servername = "220.158.232.172";
                                                        $username = "product_mh01";
                                                        $password = "cL6sC3iRnWc3APyK";
                                                        $dbname = "product_mh01";

                                                        $conn = new mysqli($servername, $username, $password, $dbname);

                                                        if ($conn->connect_error) {
                                                            die("Connection failed: " . $conn->connect_error);
                                                        }

                                                        if (isset($_GET['id'])) {
                                                            $product_id = $_GET['id'];

                                                            $sql = "DELETE FROM products WHERE id = ?";

                                                            if ($stmt = $conn->prepare($sql)) {
                                                                $stmt->bind_param("i", $product_id);

                                                                if ($stmt->execute()) {
                                                                    echo "Product deleted successfully.";
                                                                } else {
                                                                    echo "Error deleting product: " . $stmt->error;
                                                                }

                                                                $stmt->close();
                                                            } else {
                                                                echo "Error preparing statement: " . $conn->error;
                                                            }

                                                            $conn->close();
                                                        } else {
                                                            echo "No product ID provided.";
                                                            $conn->close();
                                                        }
                                                    ?>
                                                }
                                            }
                                        </script>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="py-2 px-4 border-b text-center">No products found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <div class="flex items-center justify-end space-x-2 mt-4">
                    <?php if ($page > 1): ?>
                        <a href="?page=<?= $page - 1 ?>" class="px-4 py-2 text-gray-600 bg-white border border-gray-300 rounded hover:bg-gray-100">Previous</a>
                    <?php else: ?>
                        <span class="px-4 py-2 text-gray-400 bg-gray-100 border border-gray-300 rounded">Previous</span>
                    <?php endif; ?>

                    <select onchange="location = this.value;" class="px-4 py-2 text-gray-600 bg-white border border-gray-300 rounded">
                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <option value="?page=<?= $i ?>" <?= $i == $page ? 'selected' : '' ?>><?= $i ?></option>
                        <?php endfor; ?>
                    </select>

                    <?php if ($page < $total_pages): ?>
                        <a href="?page=<?= $page + 1 ?>" class="px-4 py-2 text-gray-600 bg-white border border-gray-300 rounded hover:bg-gray-100">Next</a>
                    <?php else: ?>
                        <span class="px-4 py-2 text-gray-400 bg-gray-100 border border-gray-300 rounded">Next</span>
                    <?php endif; ?>
                </div>

                <?php $conn->close(); ?>                
            </div>
        </div>
    </div>
</body>
</html>