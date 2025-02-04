<?php
    include '../database/db_connection.php';

    $userId = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($userId > 0) {
        $sql = "SELECT full_name, role, username, password FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->bind_result($name, $role, $username, $password);
        $stmt->fetch();
        $stmt->close();
    } else {
        die("Invalid account ID.");
    }

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('name').value = "<?php echo $name; ?>";
            document.getElementById('role').value = "<?php echo $role; ?>";
            document.getElementById('username').value = "<?php echo $username; ?>";
            document.getElementById('password').value = "<?php echo $password; ?>";
            document.getElementById('confirm_password').value = "<?php echo $password; ?>";
        });

        function editAccount(event) {
            event.preventDefault();

            const formData = new FormData(document.getElementById(event.target.id));
            formData.append('id', "<?php echo $userId; ?>");

            const password = formData.get('password');
            const confirmPassword = formData.get('confirm_password');

            if (password !== confirmPassword) {
                Swal.fire({
                    icon: 'error',
                    title: 'Password Mismatch',
                    text: 'Password and Confirm Password do not match. Please try again.'
                });
                return;
            }

            Swal.fire({
                title: 'Updating Account...',
                text: 'Please wait while the account is being updated.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            axios.post('../database/update_user.php', formData)
                .then(response => {
                    Swal.close();
                    Swal.fire({
                        icon: 'success',
                        title: 'Account Updated',
                        text: response.data.message,
                    }).then(() => {
                        document.getElementById('editAccountForm').reset();
                        window.location.href = 'account.php?id=<?php echo $userId; ?>';
                    });
                })
                .catch(error => {
                    Swal.close();
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: error.response?.data?.message || 'An error occurred. Please try again.',
                    });
                });
        }
    </script>
</head>

<body>
    <?php include 'header.php'; ?>

    <div class="relative font-sans pt-[70px] min-h-screen">
        <div class="flex items-start">
            <?php include 'sidebar.php'; ?>

            <div class="main-content w-full overflow-auto p-6">
                <div class="container mx-auto">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Account</h2>
                        <a href="dashboard.php">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none">
                                Back
                            </button>
                        </a>
                    </div>

                    <form id="editAccountForm" onsubmit="editAccount(event)">
                        <div class="mb-6">
                            <label for="name" class="block text-gray-700 font-medium mb-2">Full Name</label>
                            <input type="text" id="name" name="name" required autocomplete="off"
                                class="w-full border border-gray-300 shadow-sm px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                        </div>

                        <div class="mb-6">
                            <label for="username" class="block text-gray-700 font-medium mb-2">Username</label>
                            <input type="username" id="username" name="username" required autocomplete="off"
                                class="w-full border border-gray-300 shadow-sm px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                        </div>

                        <div class="mb-6 hidden">
                            <label for="role" class="block text-gray-700 font-medium mb-2">Role</label>
                            <select id="role" name="role"
                                class="w-full border border-gray-300 shadow-sm px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                                <option value="Admin">Admin</option>
                                <option value="Editor">Editor</option>
                                <option value="Viewer">Viewer</option>
                            </select>
                        </div>

                        <div class="mb-6">
                            <label for="password" class="block text-gray-700 font-normal mb-2">Password</label>
                            <input type="password" id="password" name="password" required autocomplete="off"
                                class="w-full border border-gray-300 shadow-sm px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                            <span class="text-xs text-red-500">Delete all text before insert new password.</span>
                        </div>

                        <div class="mb-6">
                            <label for="confirm_password" class="block text-gray-700 font-medium mb-2">Confirm Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" required autocomplete="off"
                                class="w-full border border-gray-300 shadow-sm px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                        </div>

                        <div class="flex justify-end space-x-4">
                            <button type="button" onclick="document.getElementById('editAccountForm').reset()"
                                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none">
                                Clear
                            </button>
                            <button type="submit"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
