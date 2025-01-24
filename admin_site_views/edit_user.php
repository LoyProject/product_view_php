<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}
?>

<?php
    include '../database/db_connection.php';

    $userId = $_GET['id'];
    $sql = "SELECT full_name, username, role, password FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($name, $username, $role, $password);
    $stmt->fetch();
    $stmt->close();
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('name').value = "<?php echo $name; ?>";
        document.getElementById('username').value = "<?php echo $username; ?>";
        document.getElementById('role').value = "<?php echo $role; ?>";
        document.getElementById('password').value = "<?php echo $password; ?>";
        document.getElementById('conpassword').value = "<?php echo $password; ?>";
    });

    function editUserBtn(event) {
        event.preventDefault();

        const password = document.getElementById('password').value;
        const conpassword = document.getElementById('conpassword').value;

        if (password !== conpassword) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Passwords do not match!',
            });
            return;
        }

        const formData = new FormData(document.getElementById('editUserForm'));
        formData.append('id', "<?php echo $userId; ?>");

        axios.post('../database/update_user.php', formData)
            .then(response => {
                Swal.fire({
                    icon: 'success',
                    title: 'User Updated',
                    text: response.data.message,
                }).then(() => {
                    window.location.href = '../admin_site_views/user.php';
                });
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: error.response.data.message,
                });
            });
    }
    </script>
</head>

<?php
include 'header.php';
?>

<body>
    <div class="relative font-[sans-serif] pt-[70px] h-screen">
        <div class="flex items-start">
            <?php include 'sidebar.php'; ?>
            <div class="main-content w-full overflow-auto p-6">
                <div class="container mx-auto p-2 rounded-lg">
                    <h1 class="p-4 text-2xl font-bold mb-4">Edit Product</h1>
                    <form id="editUserForm" onsubmit="editUserBtn(event)">
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
                                type="button" onclick="document.getElementById('editUserForm').reset();
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
</body>

</html>