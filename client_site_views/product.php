<!DOCTYPE html>
<html lang="en">

<?php
    require 'header.php';
    require '../database/db_connection.php';

    $limit = 8;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    $search = isset($_GET['search']) ? trim($_GET['search']) : '';
    $categoryFilter = isset($_GET['category']) ? trim($_GET['category']) : '';

    if (!empty($categoryFilter) && !ctype_digit($categoryFilter)) {
        die("Invalid category parameter.");
    }

    $categories = [];
    $categoryQuery = $conn->query("SELECT id, name FROM categories");
    while ($row = $categoryQuery->fetch_assoc()) {
        $categories[] = $row;
    }

    $countQuery = "SELECT COUNT(*) as total FROM products 
                   JOIN categories ON products.category_id = categories.id WHERE 1";

    $params = [];
    $types = "";

    if (!empty($categoryFilter)) {
        $countQuery .= " AND products.category_id = ?";
        $params[] = $categoryFilter;
        $types .= "i";
    }

    if (!empty($search)) {
        $countQuery .= " AND (products.name LIKE ? OR categories.name LIKE ? OR products.description LIKE ?)";
        $searchParam = "%$search%";
        $params[] = $searchParam;
        $params[] = $searchParam;
        $params[] = $searchParam;
        $types .= "sss";
    }

    $stmt = $conn->prepare($countQuery);
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }

    $stmt->execute();
    $countResult = $stmt->get_result();
    $totalProducts = $countResult->fetch_assoc()['total'];
    $totalPages = ceil($totalProducts / $limit);
    $stmt->close();

    $query = "SELECT products.*, categories.name AS category_name 
              FROM products 
              JOIN categories ON products.category_id = categories.id 
              WHERE 1";

    if (!empty($categoryFilter)) {
        $query .= " AND products.category_id = ?";
    }

    if (!empty($search)) {
        $query .= " AND (products.name LIKE ? OR categories.name LIKE ? OR products.description LIKE ?)";
    }

    $query .= " ORDER BY products.id DESC LIMIT ?, ?";

    $stmt = $conn->prepare($query);

    if (!empty($params)) {
        $params[] = $offset;
        $params[] = $limit;
        $types .= "ii";
    } else {
        $params = [$offset, $limit];
        $types = "ii";
    }

    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $result = $stmt->get_result();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const menuToggle = document.getElementById("menuToggle");

        const menuDrawer = document.getElementById("menuDrawer");

        menuToggle.addEventListener("click", function() {
            menuDrawer.classList.toggle("-translate-x-full");
        });

        document.addEventListener("click", function(event) {
            if (!menuDrawer.contains(event.target) && !menuToggle.contains(event.target)) {
                menuDrawer.classList.add("-translate-x-full");
            }
        });
    });
    </script>
</head>

<body class="bg-[#f8f9ff]">
    <?php
        $categoryQuery = "SELECT * FROM categories";
        $categoryResult = mysqli_query($conn, $categoryQuery); 
    ?>
    <div class="px-4 md:px-8 mb-8 mt-24 container-md mx-auto flex flex-col md:flex-row">
        <!-- Mobile Drawer Toggle Button -->
        <div class="md:hidden flex justify-between items-center p-4 bg-red-500 text-white">
            <h1 class="text-xl font-bold">Categories</h1>
            <button id="menuToggle" class="text-2xl">&equiv;</button>
        </div>

        <!-- Category Drawer (Mobile) / Sidebar (Desktop) -->
        <div id="menuDrawer"
            class="absolute md:relative md:block md:top-0 left-0 w-72 md:w-1/3 lg:w-1/4 xl:w-1/5 h-screen md:h-auto bg-white 
                transform -translate-x-full transition-transform md:translate-x-0 md:overflow-y-auto p-4 z-10 rounded-lg mr-4">

            <h1 class="text-2xl font-bold hidden md:block">Categories</h1>
            <div class="bg-gray-50 rounded-lg mt-4">
                <ul class="py-4 px-2">
                    <li class="px-2 py-2">
                        <a href="product.php"
                            class="block py-2 px-6 font-bold rounded-lg hover:bg-gray-200 
                                <?= empty($categoryFilter) ? 'text-white bg-red-500 hover:bg-red-500' : 'text-gray-700' ?>">
                            All
                        </a>
                    </li>
                    <?php while ($cat = mysqli_fetch_assoc($categoryResult)): ?>
                    <li class="px-2 py-2">
                        <a href="product.php?category=<?= $cat['id'] ?>" class="block py-2 px-6 font-bold rounded-lg hover:bg-gray-200 
                                <?= $categoryFilter == $cat['id'] ? 'text-white bg-red-500 hover:bg-red-500' : 'text-gray-700' ?> 
                                truncate overflow-hidden whitespace-nowrap">
                            <?= htmlspecialchars($cat['name']) ?>
                        </a>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>


        <!-- Right Section (Product Listings) -->
        <div class="w-full md:w-4/5 pl-6 p-4 bg-white rounded-lg">
            <h1 class="text-2xl font-bold mb-4">Products</h1>
            <form method="GET" class="mb-6 flex flex-col sm:flex-row">
                <input type="text" name="search" value="<?= htmlspecialchars($search) ?>"
                    placeholder="Search by name, category, description"
                    class="w-full sm:flex-1 p-4 border-2 rounded-md mb-4 sm:mb-0 sm:mr-4 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
                <button type="submit"
                    class="w-full sm:w-24 text-center border-2 bg-red-500 text-white p-2 rounded-md mb-4 sm:mb-0 sm:mr-4">Search
                </button>
                <button class="w-full sm:w-24 text-center border-2 bg-gray-500 text-white p-2 rounded-md mb-4 sm:mb-0">
                    <a href="product.php">Clear</a>
                </button>
            </form>
            <!-- Product Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <?php if ($result->num_rows > 0): ?>
                <?php while ($product = $result->fetch_assoc()): ?>
                    <div class="bg-white shadow-md border p-2 w-full rounded-lg overflow-hidden hover:border-red-500 flex flex-col">
                        <img src="../images/<?= htmlspecialchars($product['image']) ?>" 
                            class="w-full h-52 object-cover rounded-lg" 
                            alt="<?= htmlspecialchars($product['name']) ?>" />

                        <div class="pt-4 px-2 flex-grow">
                            <h3 class="text-lg font-bold"><?= htmlspecialchars($product['name']) ?></h3>
                            <p class="text-xs text-red-500 font-bold"><?= htmlspecialchars($product['category_name']) ?></p>
                            <p class="mt-3 text-xs text-gray-500"><?= htmlspecialchars($product['description']) ?></p>
                            <br>
                        </div>

                        <div class="p-2 mt-auto">
                            <a href="product_detail.php?id=<?= htmlspecialchars($product['id']) ?>"
                                class="w-full py-2 text-center block rounded-md bg-red-100 text-red-500 text-xs font-bold 
                                    transition duration-300 hover:bg-red-500 hover:text-white shadow-md">
                                View
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php else: ?>
                    <p class="text-gray-500 text-sm font-semibold">No products available.</p>
                <?php endif; ?>
            </div>

            <!-- Pagination -->
            <div class="mt-6 flex flex-wrap justify-center gap-2">
                <?php if ($totalPages > 1): ?>
                <?php if ($page > 1): ?>
                <a href="product.php?page=1&search=<?= urlencode($search) ?>&category=<?= urlencode($categoryFilter) ?>"
                    class="px-4 py-2 border bg-gray-200 rounded">First</a>
                <a href="product.php?page=<?= $page - 1 ?>&search=<?= urlencode($search) ?>&category=<?= urlencode($categoryFilter) ?>"
                    class="px-4 py-2 border bg-gray-200 rounded">Prev</a>
                <?php endif; ?>

                <?php for ($i = max(1, $page - 2); $i <= min($totalPages, $page + 2); $i++): ?>
                <a href="product.php?page=<?= $i ?>&search=<?= urlencode($search) ?>&category=<?= urlencode($categoryFilter) ?>"
                    class="px-4 py-2 border <?= $i == $page ? 'bg-red-500 text-white' : 'bg-gray-200' ?> rounded">
                    <?= $i ?>
                </a>
                <?php endfor; ?>

                <?php if ($page < $totalPages): ?>
                <a href="product.php?page=<?= $page + 1 ?>&search=<?= urlencode($search) ?>&category=<?= urlencode($categoryFilter) ?>"
                    class="px-4 py-2 border bg-gray-200 rounded">Next</a>
                <a href="product.php?page=<?= $totalPages ?>&search=<?= urlencode($search) ?>&category=<?= urlencode($categoryFilter) ?>"
                    class="px-4 py-2 border bg-gray-200 rounded">Last</a>
                <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>

</body>

</html>