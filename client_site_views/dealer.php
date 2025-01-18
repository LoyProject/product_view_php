<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title> Loy Team Project </title>
</head>
<body>
    <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://readymadeui.com/readymadeui.svg" class="h-8" alt="Flowbite Logo">
                <!-- <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span> -->
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button
                    data-collapse-toggle="navbar-sticky"
                    type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-sticky"
                    aria-expanded="false"
                    onclick="toggleMenu()">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul id="menu-list" class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="../index.php" class="block py-2 px-3 text-red-500 rounded rounded hover:text-red-500 md:p-0 dark:text-white dark:hover:text-red-500" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:text-red-500 md:p-0 dark:text-white dark:hover:text-red-500">Dealer</a>
                    </li>
                    <li>
                        <a id="open-modal-service-btn" href="#" class="block py-2 px-3 text-gray-900 rounded hover:text-red-500 md:p-0 dark:text-white dark:hover:text-red-500">Services</a>
                    </li>
                    <li>
                        <a id="open-modal-contact-btn" href="#" class="block py-2 px-3 text-gray-900 rounded hover:text-red-500 md:p-0 dark:text-white dark:hover:text-red-500">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
        <script>
            function toggleMenu() {
                const navLinks = document.getElementById('navbar-sticky');
                navLinks.classList.toggle('hidden');
            }
            // Manage active menu item
            const menuItems = document.querySelectorAll('.menu-item');
            menuItems.forEach(item => {
                item.addEventListener('click', () => {
                    // Remove active class from all menu items
                    menuItems.forEach(link => {
                        link.classList.remove('text-red-500');
                        link.classList.add('text-gray-900'); // Reset to default color
                    });
                    // Add active class to the clicked menu item
                    item.classList.remove('text-gray-900');
                    item.classList.add('text-red-500');
                });
            });
        </script>
</body>
</html>