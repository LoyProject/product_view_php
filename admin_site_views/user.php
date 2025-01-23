<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<?php
include 'header.php';
?>

<body>
    <div>
        <div class="relative font-[sans-serif] pt-[70px] h-screen">
            <div class="flex items-start">
                <?php include 'sidebar.php'; ?>
                <div class="main-content w-full overflow-auto p-6">
                    <div class="container-xl mx-auto">
                        <div class="flex justify-between item-center">
                            <h2 class="p-4 text-2xl font-bold">User</h2>
                            <a href="new_user.php">
                                <button
                                    class="text-white bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline font-[sans-serif]">
                                    Add New
                                </button>
                            </a>
                        </div>
                        <table class="w-full text-left table-fixed min-w-max">
                            <thead>
                                <tr>
                                    <th class="p-4 border-b border-slate-300 bg-slate-50">
                                        <p class="block text-sm font-normal leading-none text-slate-500">ID</p>
                                    </th>
                                    <th class="p-4 border-b border-slate-300 bg-slate-50">
                                        <p class="block text-sm font-normal leading-none text-slate-500">Username</p>
                                    </th>
                                    <th class="p-4 border-b border-slate-300 bg-slate-50">
                                        <p class="block text-sm font-normal leading-none text-slate-500">
                                            Password
                                        </p>
                                    </th>
                                    <th class="p-4 border-b border-slate-300 bg-slate-50">
                                        <p class="block text-sm font-normal leading-none text-slate-500">Role</p>
                                    </th>
                                    <th class="p-4 border-b border-slate-300 bg-slate-50">
                                        <p class="block text-sm font-normal leading-none text-slate-500">Action</p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="p-4 border-b border-slate-300">
                                        <p class="block text-sm font-normal leading-none text-slate-800">1</p>
                                    </td>
                                    <td class="p-4 border-b border-slate-300">
                                        <p class="block text-sm font-normal leading-none text-slate-800">Admin</p>
                                    </td>
                                    <td class="p-4 border-b border-slate-300">
                                        <p class="block text-sm font-normal leading-none text-slate-800">1</p>
                                    </td>
                                    <td class="p-4 border-b border-slate-300">
                                        <p class="block text-sm font-normal leading-none text-slate-800">Admin</p>
                                    </td>
                                    <td class="p-4 border-b border-slate-300">

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>