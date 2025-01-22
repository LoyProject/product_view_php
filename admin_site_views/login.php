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
        function loginFormBtn(event) {
            event.preventDefault();
            const form = new FormData(event.target);
            
            Swal.fire({
                title: 'Logging in...',
                text: 'Please wait while we process your request.',
                allowOutsideClick: false,
                didOpen: () => { Swal.showLoading(); }
            });

            axios.post('../database/login_process.php', form)
                .then(response => {
                    Swal.close();
                    if (response.data.success) {
                        window.location.href = 'admin.php';
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Login Failed',
                            text: response.data.message,
                            timer: 1000,
                            showConfirmButton: false,
                            customClass: {
                                popup: 'bg-white rounded-lg shadow-md p-4',
                                title: 'text-red-600 text-lg font-bold',
                                content: 'text-gray-700 text-sm'
                            },
                        });
                    }
                })
                .catch(error => {
                    Swal.close();
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while processing your request.'
                    });
                });
        }
    </script>
</head>
<body class="bg-gray-100">
    <div class="flex flex-col justify-center items-center h-screen">
        <a href="javascript:void(0)"><img src="https://readymadeui.com/readymadeui.svg" alt="logo" class='w-40 mb-8 mx-auto block'/></a>
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <h2 class="text-2xl font-bold text-center mb-6">Admin Login</h2>
            <form id="login-form" class="space-y-4" onsubmit="loginFormBtn(event)">
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" name="username" id="username" class="w-full p-2 border rounded-md focus:ring focus:ring-blue-500 focus:outline-none" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" class="w-full p-2 border rounded-md focus:ring focus:ring-blue-500 focus:outline-none" required>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
