<?php
    include '../database/db_connection.php';

    $limit = isset($_GET['limit']) ? intval($_GET['limit']) : 10;
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <div class="p-8">
        <div class="px-8 font-[sans-serif] overflow-x-auto">
            <div class="mb-4">
                <h2 class="text-2xl font-bold">Products List</h2>
            </div>
            <div class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
                <table class="w-full text-left table-auto min-w-max">
                    <thead>
                        <tr>
                            <th class="p-4 border-b border-slate-300 bg-slate-50">
                                <p class="block text-sm font-normal leading-none text-slate-500">ID</p>
                            </th>
                            <th class="p-4 border-b border-slate-300 bg-slate-50">
                                <p class="block text-sm font-normal leading-none text-slate-500">Name</p>
                            </th>
                            <th class="p-4 border-b border-slate-300 bg-slate-50">
                                <p class="block text-sm font-normal leading-none text-slate-500">Description</p>
                            </th>
                            <th class="p-4 border-b border-slate-300 bg-slate-50">
                                <p class="block text-sm font-normal leading-none text-slate-500">Image</p>
                            </th>
                            <th class="p-4 border-b border-slate-300 bg-slate-50">
                                <p class="block text-sm font-normal leading-none text-slate-500">Action</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr class="hover:bg-slate-50">
                                    <td class="px-4 border-b border-slate-200">
                                        <p class="block text-sm text-slate-800"><?= $row["id"] ?></p>
                                    </td>
                                    <td class="px-4 border-b border-slate-200">
                                        <p class="block text-sm text-slate-800"><?= $row["name"] ?></p>
                                    </td>
                                    <td class="px-4 border-b border-slate-200">
                                        <p class="block text-sm text-slate-800"><?= $row["description"] ?></p>
                                    </td>
                                    <td class="px-4 border-b border-slate-200">
                                        <img src="../images/<?= $row["image"] ?>" alt="Product Image" class="w-16 h-16">
                                    </td>
                                    <td class="px-4 border-b border-slate-200">
                                        <a href="edit_product.php?id=<?= $row["id"] ?>" class="text-sm text-white bg-blue-500 hover:bg-blue-700 py-1 px-2 rounded">Edit</a>
                                        <a href="delete_product.php?id=<?= $row["id"] ?>" class="text-sm text-white bg-red-500 hover:bg-red-700 py-1 px-2 rounded ml-2">Delete</a>
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
            </div>
            <div class="md:flex mt-4">
                <p class="text-sm text-gray-500 flex-1">Showing <?= $offset + 1 ?> to <?= min($offset + $limit, $total_records) ?>of<?= $total_records ?>entries</p>
                <div class="flex items-center max-md:mt-4">
                    <p class="text-sm text-gray-500">Display</p>
                    <select class="text-sm text-gray-500 border border-gray-400 rounded h-7 mx-4 px-1 outline-none" onchange="window.location.href='?page=1&limit=' + this.value;">
                        <option value="5" <?= $limit == 5 ? 'selected' : '' ?>>5</option>
                        <option value="10" <?= $limit == 10 ? 'selected' : '' ?>>10</option>
                        <option value="20" <?= $limit == 20 ? 'selected' : '' ?>>20</option>
                        <option value="50" <?= $limit == 50 ? 'selected' : '' ?>>50</option>
                        <option value="100" <?= $limit == 100 ? 'selected' : '' ?>>100</option>
                    </select>
                    <ul class="flex space-x-1 ml-2">
                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <li
                                class="flex items-center justify-center cursor-pointer text-sm w-7 h-7 <?= $page == $i ? 'bg-[#007bff] text-white' : 'text-gray-500' ?> rounded">
                                <a href="<?= $_SERVER['PHP_SELF'] ?>?page=<?= $i ?>&limit=<?= $limit ?>" class="block w-full h-full text-center leading-7"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>