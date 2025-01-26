<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function addUserBtn(event) {
            event.preventDefault();
            const formData = new FormData(document.getElementById('addUserForm'));

            const password = formData.get('password');
            const confirmPassword = formData.get('conpassword');

            if (password !== confirmPassword) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Passwords do not match.',
                });
                return;
            }

            Swal.fire({
                title: 'Adding User...',
                text: 'Please wait while the user is being added.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            axios.post('../database/insert_user.php', formData)
                .then(response => {
                    Swal.close();
                    Swal.fire({
                        icon: 'success',
                        title: 'User Added',
                        text: 'The user has been added successfully!',
                    });
                    document.getElementById('addUserForm').reset();
                })
                .catch(error => {
                    swal.close();
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'There was an error adding the user.',
                    });
                });
        }
    </script>
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
                        <form id="addUserForm" onsubmit="addUserBtn(event)">
                            <div class="p-4 space-y-2">
                                <label class="font-md text-slate-500" for="name">
                                    Full Name
                                </label>
                                <input
                                    class="block border border-slate-100 shadow-sm w-full px-2 py-3 rounded-md focus:outline-none focus:border-red-500 focus:ring-1 ring-red-500 text-slate-500"
                                    type="text" id="name" name="name" autocomplete="off" required>
                            </div>
                            <div class="p-4 space-y-2">
                                <label class="font-md text-slate-500" for="username">
                                    Username
                                </label>
                                <input
                                    class="block border border-slate-100 shadow-sm w-full px-2 py-3 rounded-md focus:outline-none focus:border-red-500 focus:ring-1 ring-red-500 text-slate-500"
                                    type="text" id="username" name="username" autocomplete="off" required>
                            </div>
                            <div class="p-4 space-y-2">
                                <label class="font-md text-slate-500" for="role">
                                    Role
                                </label>
                                <select
                                    class="block border border-slate-100 shadow-sm w-full px-2 py-3 rounded-md focus:outline-none focus:border-red-500 focus:ring-1 ring-red-500 text-slate-500"
                                    id="role" name="role" required autocomplete="off">
                                    <option value="Admin">Admin</option>
                                    <option value="Editor">Editor</option>
                                    <option value="Viewer">Viewer</option>
                                </select>
                            </div>
                            <div class="p-4 space-y-2">
                                <label class="font-md text-slate-500" for="password">
                                    Password
                                </label>
                                <input
                                    class="block border border-slate-100 shadow-sm w-full px-2 py-3 rounded-md focus:outline-none focus:border-red-500 focus:ring-1 ring-red-500 text-slate-500"
                                    type="password" id="password" name="password" autocomplete="off" required>
                            </div>
                            <div class="p-4 space-y-2">
                                <label class="font-md text-slate-500" for="conpassword">
                                    Confirm Password
                                </label>
                                <input
                                    class="block border border-slate-100 shadow-sm w-full px-2 py-3 rounded-md focus:outline-none focus:border-red-500 focus:ring-1 ring-red-500 text-slate-500"
                                    type="password" id="conpassword" name="conpassword" autocomplete="off" required>
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