<?php

    include '../database/db_connection.php';

    $limit = isset($_GET['limit']) ? intval($_GET['limit']) : 10;
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $offset = ($page - 1) * $limit;

    $total_sql = "SELECT COUNT(*) as total FROM dealers";
    $total_result = $conn->query($total_sql);
    $total_row = $total_result->fetch_assoc();
    $total_records = $total_row['total'];
    $total_pages = ceil($total_records / $limit);

    $sql = "SELECT * FROM dealers ORDER BY id DESC LIMIT $limit OFFSET $offset";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dealer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("loading").style.display = "none";
        document.getElementById("content").style.display = "block";
    });
    </script>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="relative font-[sans-serif] pt-[70px] h-screen">
        <div class="flex items-start">
            <?php include 'sidebar.php'; ?>
            <div class="main-content w-full overflow-auto p-6">
                <div id="loading" class="fixed inset-0 bg-gray-200 bg-opacity-75 flex items-center justify-center z-50">
                    <div class="loader ease-linear rounded-full border-8 border-t-8 border-gray-200 h-32 w-32"></div>
                </div>
                <div class="container-xl mx-auto" id="content" style="display: none;">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Dealer List</h2>
                        <a href="new_dealer.php">
                            <button class="bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-700">
                                Add New
                            </button>
                        </a>
                    </div>
                    <table class="w-full table-auto border-collapse">
                        <thead class="text-left">
                            <tr>
                                <th class="p-4 border-b border-slate-300 bg-slate-50">
                                    <p class="block text-sm font-bold leading-none text-slate-500">ID</p>
                                </th>
                                <th class="p-4 border-b border-slate-300 bg-slate-50">
                                    <p class="block text-sm font-bold leading-none text-slate-500">Name</p>
                                </th>
                                <th class="p-4 border-b border-slate-300 bg-slate-50">
                                    <p class="block text-sm font-bold leading-none text-slate-500">Contact</p>
                                </th>
                                <th class="p-4 border-b border-slate-300 bg-slate-50">
                                    <p class="block text-sm font-bold leading-none text-slate-500">Address</p>
                                </th>
                                <th class="p-4 border-b border-slate-300 bg-slate-50">
                                    <p class="block text-sm font-bold leading-none text-slate-500">Image</p>
                                </th>
                                <th class="p-4 border-b border-slate-300 bg-slate-50">
                                    <p class="block text-sm font-bold leading-none text-slate-500">Google Map</p>
                                </th>
                                <th class="p-4 border-b border-slate-300 bg-slate-50">
                                    <p class="block text-sm font-bold leading-none text-slate-500">Action</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                            <tr class="hover:bg-slate-50">
                                <td class="px-4 border-b border-slate-200 w-0.5/6">
                                    <p class="block text-xs text-slate-800"><?= htmlspecialchars($row["id"]) ?></p>
                                </td>
                                <td class="px-4 border-b border-slate-200 w-1/6">
                                    <p class="block text-xs text-slate-800"><?= htmlspecialchars($row["name"]) ?></p>
                                </td>
                                <td class="px-4 border-b border-slate-200 w-1/6">
                                    <p class="block text-xs text-slate-800"><?= htmlspecialchars($row["contact"]) ?></p>
                                </td>
                                <td class="px-4 border-b border-slate-200 w-1/6">
                                    <p class="block text-xs text-slate-800 truncate">
                                        <?= htmlspecialchars($row["address"]) ?></p>
                                </td>
                                <td class="px-4 border-b border-slate-200 w-0.5/6">
                                    <img src="../images_dealer/<?= htmlspecialchars($row["image"]) ?>"
                                        class="w-14 h-14 object-cover">
                                </td>
                                <td class="px-4 border-b border-slate-200 w-1/6">
                                    <p class="block text-xs text-slate-800 truncate">
                                        <?= htmlspecialchars($row["map"]) ?></p>
                                </td>
                                <td class="px-4 border-b border-slate-200 w-1/6">
                                    <button class="mr-4">
                                        <a href="edit_dealer.php?id=<?= htmlspecialchars($row["id"]) ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-5 fill-blue-500 hover:fill-blue-700"
                                                viewBox="0 0 348.882 348.882">
                                                <path
                                                    d="m333.988 11.758-.42-.383A43.363 43.363 0 0 0 304.258 0a43.579 43.579 0 0 0-32.104 14.153L116.803 184.231a14.993 14.993 0 0 0-3.154 5.37l-18.267 54.762c-2.112 6.331-1.052 13.333 2.835 18.729 3.918 5.438 10.23 8.685 16.886 8.685h.001c2.879 0 5.693-.592 8.362-1.76l52.89-23.138a14.985 14.985 0 0 0 5.063-3.626L336.771 73.176c16.166-17.697 14.919-45.247-2.783-61.418zM130.381 234.247l10.719-32.134.904-.99 20.316 18.556-.904.99-31.035 13.578zm184.24-181.304L182.553 197.53l-20.316-18.556L294.305 34.386c2.583-2.828 6.118-4.386 9.954-4.386 3.365 0 6.588 1.252 9.082 3.53l.419.383c5.484 5.009 5.87 13.546.861 19.03z"
                                                    data-original="#000000" />
                                                <path
                                                    d="M303.85 138.388c-8.284 0-15 6.716-15 15v127.347c0 21.034-17.113 38.147-38.147 38.147H68.904c-21.035 0-38.147-17.113-38.147-38.147V100.413c0-21.034 17.113-38.147 38.147-38.147h131.587c8.284 0 15-6.716 15-15s-6.716-15-15-15H68.904C31.327 32.266.757 62.837.757 100.413v180.321c0 37.576 30.571 68.147 68.147 68.147h181.798c37.576 0 68.147-30.571 68.147-68.147V153.388c.001-8.284-6.715-15-14.999-15z"
                                                    data-original="#000000" />
                                            </svg>
                                        </a>
                                    </button>
                                    <button class="mr-4">
                                        <a href="delete_dealer.php?id=<?= htmlspecialchars($row["id"]) ?>"
                                            onclick="return confirm('Are you sure you want to delete this dealer?');">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-5 fill-red-500 hover:fill-red-700" viewBox="0 0 24 24">
                                                <path
                                                    d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                                    data-original="#000000" />
                                                <path
                                                    d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                                    data-original="#000000" />
                                            </svg>
                                        </a>
                                    </button>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                            <?php else: ?>
                            <tr>
                                <td colspan="7" class="p-4 border-b border-slate-200 text-center">No records found</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <div class="flex justify-between items-center mt-4">
                        <p class="text-sm text-gray-500">Showing <?= $offset + 1 ?> to
                            <?= min($offset + $limit, $total_records) ?> of <?= $total_records ?> entries
                        </p>
                        <div class="flex space-x-2">
                            <?php if ($page > 1): ?>
                            <a href="?page=<?= $page - 1 ?>&limit=<?= $limit ?>">
                                <button
                                    class="bg-gray-200 text-gray-600 text-xs font-bold py-2 px-4 rounded hover:bg-red-500 hover:text-white w-20">
                                    Previous
                                </button>
                            </a>
                            <?php endif; ?>
                            <?php if ($page < $total_pages): ?>
                            <a href="?page=<?= $page + 1 ?>&limit=<?= $limit ?>">
                                <button
                                    class="bg-gray-200 text-gray-600 text-xs font-bold py-2 px-4 rounded hover:bg-red-700 hover:text-white w-20">
                                    Next
                                </button>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>