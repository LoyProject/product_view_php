<!DOCTYPE html>
<html lang="en">

<?php
    require 'header.php';
    require '../database/db_connection.php';

    $limit = 12;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    $categories = [];
    $categoryQuery = $conn->query("SELECT DISTINCT category_id FROM products");
    while ($row = $categoryQuery->fetch_assoc()) {
        $categories[] = $row['category_id'];
    }

    $search = $_GET['search'] ?? '';
    $categoryFilter = $_GET['category'] ?? '';

    $query = "SELECT products.*, categories.name AS category_name 
        FROM products 
        JOIN categories ON products.category_id = categories.id 
        WHERE 1";

    if (!empty($categoryFilter)) {
        $query .= " AND (products.name LIKE '%$search%' OR products.description LIKE '%$search%')";
    }

    if (!empty($search)) {
        $query .= " AND (products.name LIKE '%$search%' OR categories.name LIKE '%$search%' OR products.description LIKE '%$search%')";
    }
    
    $countQuery = $conn->query($query);
    $totalProducts = $countQuery->num_rows;
    $totalPages = ceil($totalProducts / $limit);

    $query .= " ORDER BY products.id DESC LIMIT $offset, $limit";
    $result = $conn->query($query);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f8f9ff]">

    <div class="px-8 mb-8 mt-24 container-md mx-auto flex">
        
        <!-- Left Sidebar (Category List) -->
        <?php 
            $categoryQuery = "SELECT * FROM categories";
            $categoryResult = mysqli_query($conn, $categoryQuery); 
        ?>
        <div class="w-1/4 bg-white p-4 rounded-lg">
            <h2 class="text-lg font-bold mb-2">Categories</h2>
            <ul>
                <li><a href="product.php" class="block p-2 hover:bg-gray-200">All Categories</a></li>
                <?php while ($cat = mysqli_fetch_assoc($categoryResult)): ?>
                    <li>
                        <a href="product.php?category=<?= $cat['id'] ?>"
                        class="block p-2 hover:bg-gray-200">
                        <?= htmlspecialchars($cat['name']) ?>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>

        <!-- Right Section (Product Listings) -->
        <div class="w-3/4 pl-6">
            <h1 class="text-2xl font-bold mb-4">Products</h1>

            <form method="GET" class="flex gap-4 mb-6">
                <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" 
                       placeholder="Search by name, category, description"
                       class="w-full p-2 border rounded-md">
                <button type="submit" class="w-24 text-center bg-blue-500 text-white p-2 rounded-md">Search</button>
                <a href="product.php" class="w-32 text-center bg-gray-500 text-white p-2 rounded-md">Clear Filter</a>
            </form>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <?php while ($product = $result->fetch_assoc()): ?>
                    <div class="bg-white shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] border p-2 w-full rounded-lg font-[sans-serif] overflow-hidden mx-auto mt-4 hover:border-red-500 border-2 flex flex-col">
                        <div>
                            <img src="../images/<?= htmlspecialchars($product['image']) ?>" class="w-full h-52 object-cover rounded-lg" />
                        </div>
                        <div class="pt-6 text-start px-2">
                            <h3 class="text-lg font-bold font-[sans-serif]"><?= htmlspecialchars($product['name']) ?></h3>
                        </div>
                        <div class="text-start flex-grow px-2">
                            <p class="mt-1 text-xs text-red-500">Category: <?= htmlspecialchars($product['category_name']) ?></p>
                        </div>
                        <div class="text-start flex-grow px-2">
                            <article class="text-wrap">
                                <p class="mt-3 text-xs text-gray-500 leading-relaxed break-words"><?= htmlspecialchars($product['description']) ?></p>
                            </article>
                        </div>
                        <div class="px-2 mt-4">
                            <a href="product_detail.php?id=<?= htmlspecialchars($product['id']) ?>" class="w-full py-2.5 inline-block text-center rounded-sm bg-red-100 text-red-500 text-xs font-bold tracking-wider font-[sans-serif] outline-none hover:bg-red-400 hover:text-white">
                                View
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div class="mt-6 flex justify-center">
                <?php if ($totalPages > 1): ?>
                    <nav class="flex space-x-2">
                        
                        <!-- First Page Button -->
                        <?php if ($page > 1): ?>
                            <a href="product_page.php?page=1&search=<?= urlencode($search) ?>&category=<?= urlencode($categoryFilter) ?>"
                            class="px-4 py-2 border bg-gray-200 rounded">First</a>
                        <?php endif; ?>

                        <!-- Previous Button -->
                        <?php if ($page > 1): ?>
                            <a href="product_page.php?page=<?= $page - 1 ?>&search=<?= urlencode($search) ?>&category=<?= urlencode($categoryFilter) ?>"
                            class="px-4 py-2 border bg-gray-200 rounded">Prev</a>
                        <?php endif; ?>

                        <!-- Dynamic Page Numbers -->
                        <?php
                        $maxPagesToShow = 5; // Show only 5 page numbers
                        $startPage = max(1, $page - floor($maxPagesToShow / 2));
                        $endPage = min($totalPages, $startPage + $maxPagesToShow - 1);

                        for ($i = $startPage; $i <= $endPage; $i++): ?>
                            <a href="product_page.php?page=<?= $i ?>&search=<?= urlencode($search) ?>&category=<?= urlencode($categoryFilter) ?>"
                            class="px-4 py-2 border <?= $i == $page ? 'bg-blue-500 text-white' : 'bg-gray-200' ?> rounded">
                                <?= $i ?>
                            </a>
                        <?php endfor; ?>

                        <!-- Next Button -->
                        <?php if ($page < $totalPages): ?>
                            <a href="product_page.php?page=<?= $page + 1 ?>&search=<?= urlencode($search) ?>&category=<?= urlencode($categoryFilter) ?>"
                            class="px-4 py-2 border bg-gray-200 rounded">Next</a>
                        <?php endif; ?>

                        <!-- Last Page Button -->
                        <?php if ($page < $totalPages): ?>
                            <a href="product_page.php?page=<?= $totalPages ?>&search=<?= urlencode($search) ?>&category=<?= urlencode($categoryFilter) ?>"
                            class="px-4 py-2 border bg-gray-200 rounded">Last</a>
                        <?php endif; ?>

                    </nav>
                <?php endif; ?>
            </div>

        </div>
    </div>

    <?php include('footer.php'); ?>

</body>
</html>
