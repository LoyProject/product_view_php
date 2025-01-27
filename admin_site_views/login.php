<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            const icon = document.querySelector('#password + svg');
            if (type === 'password') {
                icon.setAttribute('fill', '#bbb');
                icon.setAttribute('stroke', '#bbb');
            } else {
                icon.setAttribute('fill', '#000');
                icon.setAttribute('stroke', '#000');
            }
        }

        async function loginFormBtn(event) {
            event.preventDefault();

            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            try {
                Swal.fire({
                    title: 'Logging in...',
                    text: 'Please wait while we process your request.',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    },
                });

                const response = await axios.post('../database/login_process.php', {
                    username, password
                }, {
                    headers: {
                        'Content-Type': 'application/json',
                    },
                });

                Swal.close();

                if (response.data.success) {
                    window.location.href = 'dashboard.php';
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Failed',
                        text: response.data.message || 'Invalid username or password.',
                        timer: 2000,
                        showConfirmButton: false,
                    });
                }
            } catch (error) {
                Swal.close();

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An unexpected error occurred. Please try again later.',
                });

                console.error('Error:', error);
            }
        }
    </script>
</head>

<body class="bg-gray-50 font-sans">
    <div class="min-h-screen flex items-center justify-center py-6 px-4">
        <div class="max-w-md w-full">
            <?php
                include '../database/db_connection.php';
                if ($resultLogo = $conn->query("SELECT * FROM logo")) {
                    $rowLogo = $resultLogo->fetch_assoc();
                    echo '<img src="../images_logo/' . $rowLogo['image'] . '" alt="logo" class="w-40 mb-8 mx-auto block" />';
                }
                $conn->close();
            ?>
            
            <div class="p-8 rounded-2xl bg-white shadow">
                <h2 class="text-gray-800 text-center text-2xl font-bold">Sign in</h2>
                <form id="login-form" onsubmit="loginFormBtn(event)" class="mt-8 space-y-4">
                    <div>
                        <label for="username" class="text-gray-800 text-sm mb-2 block">User name</label>
                        <div class="relative flex items-center">
                            <input name="username" type="text" id="username" required
                                class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500"
                                placeholder="Enter user name" />
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-4 h-4 absolute right-4" viewBox="0 0 24 24">
                                <circle cx="10" cy="7" r="6"></circle>
                                <path d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <label for="password" class="text-gray-800 text-sm mb-2 block">Password</label>
                        <div class="relative flex items-center">
                            <input name="password" id="password" type="password" required
                                class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500"
                                placeholder="Enter password" />
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-4 h-4 absolute right-4 cursor-pointer" viewBox="0 0 128 128" onclick="togglePasswordVisibility()">
                                <path d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z"></path>
                            </svg>
                        </div>
                    </div>

                    <div class="mt-8">
                        <button type="submit"
                            class="w-full py-3 px-4 text-sm tracking-wide rounded-lg text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">
                            Sign in
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
