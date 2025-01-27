<?php
    include '../database/db_connection.php';

    try {
        $limit = isset($_GET['limit']) ? intval($_GET['limit']) : 10;
        $page = isset($_GET['page']) ? max(intval($_GET['page']), 1) : 1;
        $offset = ($page - 1) * $limit;

        $total_sql = "SELECT COUNT(*) as total FROM products";
        $total_result = $conn->query($total_sql);

        if (!$total_result) {
            throw new Exception("Failed to fetch total records.");
        }

        $total_row = $total_result->fetch_assoc();
        $total_records = $total_row['total'];
        $total_pages = ceil($total_records / $limit);

        $sql = "SELECT id, name, description, image FROM products ORDER BY id DESC LIMIT ? OFFSET ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ii', $limit, $offset);
        $stmt->execute();
        $result = $stmt->get_result();
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function toggleText(button) {
            const p = button.previousElementSibling;
            if (button.textContent === 'See more') {
                p.style.maxHeight = 'none';
                p.style.overflow = 'visible';
                button.textContent = 'See less';
            } else {
                p.style.maxHeight = '2.5em';
                p.style.overflow = 'hidden';
                button.textContent = 'See more';
            }
        }
    </script>
</head>

<body>
    <?php include 'header.php'; ?>

    <div class="relative font-sans pt-[70px] min-h-screen">
        <div class="flex">
            <?php include 'sidebar.php'; ?>

            <div class="main-content w-full overflow-auto p-6">
                <div class="container mx-auto">
                    <div class="flex justify-between mb-4 items-center">
                        <h2 class="text-2xl font-bold">Product List</h2>
                        <a href="new_product.php">
                            <button class="bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-700">
                                Add New
                            </button>
                        </a>
                    </div>

                    <table class="w-full table-auto border-collapse">
                        <thead class="text-left">
                            <tr class="bg-gray-200">
                                <th class="p-4 border">ID</th>
                                <th class="p-4 border">Name</th>
                                <th class="p-4 border">Description</th>
                                <th class="p-4 border">Image</th>
                                <th class="p-4 border">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($result->num_rows > 0): ?>
                                <?php while ($row = $result->fetch_assoc()): ?>
                                    <tr class="hover:bg-gray-100">
                                        <td class="p-4 border w-0.5/5"> <?= $row['id'] ?> </td>
                                        <td class="p-4 border w-1.5/5"> <?= htmlspecialchars($row['name']) ?> </td>
                                        <td class="p-4 border w-2/5">
                                            <p class="truncate text-sm" style="max-height: 2.5em; overflow: hidden; white-space: normal;">
                                                <?= htmlspecialchars($row['description']) ?>
                                            </p>
                                            <?php if (str_word_count($row['description']) > 20): ?>
                                                <button class="text-blue-500 hover:underline text-xs" onclick="toggleText(this)">See more</button>
                                            <?php endif; ?>
                                        </td>
                                        <td class="p-4 border w-0.5/5">
                                            <img src="../images/<?= htmlspecialchars($row['image']) ?>" class="w-16 h-16" alt="Product Image">
                                        </td>
                                        <td class="p-4 border w-0.5/5">
                                            <a href="edit_product.php?id=<?= $row['id'] ?>" class="text-blue-500 hover:text-blue-700">Edit</a>
                                            |
                                            <a href="delete_product.php?id=<?= $row['id'] ?>" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center p-4">No products found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                    <div class="flex justify-between items-center mt-4">
                        <p class="text-sm text-gray-500">Showing <?= $offset + 1 ?> to <?= min($offset + $limit, $total_records) ?> of <?= $total_records ?> entries</p>
                        <div class="flex space-x-2">
                            <?php if ($page > 1): ?>
                                <a href="?page=<?= $page - 1 ?>&limit=<?= $limit ?>" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Previous</a>
                            <?php endif; ?>
                            <?php if ($page < $total_pages): ?>
                                <a href="?page=<?= $page + 1 ?>&limit=<?= $limit ?>" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Next</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
