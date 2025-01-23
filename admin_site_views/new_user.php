<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New</title>
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
                            <h2 class="p-4 text-2xl font-bold">Create New</h2>
                            <a href="user.php">
                                <button
                                    class="text-white bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline font-[sans-serif]">
                                    Back
                                </button>
                            </a>
                        </div>
                        <form id="addUserForm">
                            <div class="p-4 space-y-2">
                                <label class=" font-md text-slate-500" for="product-name">
                                    Full Name
                                </label>
                                <input
                                    class="block border border-slate-100 shadow-sm w-full px-2 py-3 rounded-md focus:outline-none focus:border-red-500 focus:ring-1 ring-red-500 text-slate-500"
                                    type="text" id="name" name="name" autocomplete="off" required></input>
                            </div>
                            <div class="p-4 space-y-2">
                                <label class=" font-md text-slate-500" for="product-name">
                                    Username
                                </label>
                                <input
                                    class="block border border-slate-100 shadow-sm w-full px-2 py-3 rounded-md focus:outline-none focus:border-red-500 focus:ring-1 ring-red-500 text-slate-500"
                                    type="text" id="username" name="username" autocomplete="off" required></input>
                            </div>
                            <div class="p-4 space-y-2">
                                <label class=" font-md text-slate-500" for="role">
                                    Role
                                </label>
                                <select
                                    class="block border border-slate-100 shadow-sm w-full px-2 py-3 rounded-md focus:outline-none focus:border-red-500 focus:ring-1 ring-red-500 text-slate-500"
                                    id="role" name="role" required autocomplete="off">
                                    <option value="admin">Admin</option>
                                    <option value="editor">Editor</option>
                                    <option value="viewer">Viewer</option>
                                </select>
                            </div>
                            <div class="p-4 space-y-2">
                                <label class=" font-md text-slate-500" for="product-name">
                                    Password
                                </label>
                                <input
                                    class="block border border-slate-100 shadow-sm w-full px-2 py-3 rounded-md focus:outline-none focus:border-red-500 focus:ring-1 ring-red-500 text-slate-500"
                                    type="password" id="password" name="password" autocomplete="off" required></input>
                            </div>
                            <div class="p-4 space-y-2">
                                <label class=" font-md text-slate-500" for="product-name">
                                    Confirm Password
                                </label>
                                <input
                                    class="block border border-slate-100 shadow-sm w-full px-2 py-3 rounded-md focus:outline-none focus:border-red-500 focus:ring-1 ring-red-500 text-slate-500"
                                    type="password" id="conpassword" name="conpassword" autocomplete="off"
                                    required></input>
                            </div>

                            <div class="p-4 space-x-4 flex justify-end">
                                <button
                                    class="text-white bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline font-[sans-serif]"
                                    type="button" onclick="document.getElementById('addUserForm').reset();
                                        window.location.href = 'user.php';">
                                    Cancel
                                </button>
                                <button
                                    class="text-white bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline font-[sans-serif]"
                                    type="submit">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>