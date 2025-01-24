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
        async function loginFormBtn(event) {
            event.preventDefault(); // Prevent the default form submission behavior

            // Fetch form values
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value.trim();

            // Validate inputs
            if (!username || !password) {
                Swal.fire({
                    icon: 'error',
                    title: 'Missing Fields',
                    text: 'Username and password are required.',
                    timer: 1500,
                    showConfirmButton: false,
                });
                return;
            }

            try {
                // Display loading state
                Swal.fire({
                    title: 'Logging in...',
                    text: 'Please wait while we process your request.',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    },
                });

                // Perform the login request using Axios
                const response = await axios.post('../database/login_process.php', {
                    username,
                    password
                }, {
                    headers: {
                        'Content-Type': 'application/json', // Send JSON data
                    },
                });

                // Handle the server response
                Swal.close(); // Close the loading dialog

                if (response.data.success) {
                    // Redirect to the target page
                    window.location.href = 'dashboard.php';
                } else {
                    // Show an error dialog
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Failed',
                        text: response.data.message || 'Invalid username or password.',
                        timer: 2000,
                        showConfirmButton: false,
                    });
                }
            } catch (error) {
                // Close the loading dialog
                Swal.close();

                // Show a generic error dialog
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An unexpected error occurred. Please try again later.',
                });

                console.error('Error:', error); // Log the error for debugging
            }
        }
    </script>

</head>

<body>

    <div class="bg-gray-50 font-[sans-serif]">
        <div class="min-h-screen flex flex-col items-center justify-center py-6 px-4">
            <div class="max-w-md w-full">
                <a href="javascript:void(0)"><img src="https://readymadeui.com/readymadeui.svg" alt="logo"
                        class='w-40 mb-8 mx-auto block' />
                </a>
                <div class="p-8 rounded-2xl bg-white shadow">
                    <h2 class="text-gray-800 text-center text-2xl font-bold">Sign in</h2>
                    <form id="login-form" onsubmit="loginFormBtn(event)" class="mt-8 space-y-4">
                        <div>
                            <label class="text-gray-800 text-sm mb-2 block">User name</label>
                            <div class="relative flex items-center">
                                <input name="username" type="text" id="username" required
                                    class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-red-500"
                                    placeholder="Enter user name" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                    class="w-4 h-4 absolute right-4" viewBox="0 0 24 24">
                                    <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                                    <path
                                        d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z"
                                        data-original="#000000"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <label class="text-gray-800 text-sm mb-2 block">Password</label>
                            <div class="relative flex items-center">
                                <input name="password" id="password" type="password" required
                                    class="w-full text-gray-800 text-sm border border-gray-300 px-4 py-3 rounded-md outline-red-500"
                                    placeholder="Enter password" />
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                    class="w-4 h-4 absolute right-4 cursor-pointer" viewBox="0 0 128 128">
                                    <path
                                        d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z"
                                        data-original="#000000"></path>
                                </svg>
                            </div>
                        </div>

                        <div class="!mt-8">
                            <button type="submit"
                                class="w-full py-3 px-4 text-sm tracking-wide rounded-lg text-white bg-red-500 hover:bg-red-600 focus:outline-none">
                                Sign in
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>