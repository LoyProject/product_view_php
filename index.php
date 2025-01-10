<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <title> Loy Team Project </title>
    </head>

    <body class="bg-gray-100 white:bg-gray-900">

        <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo">
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
                </a>
                <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <!-- <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Get started
                    </button> -->
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
                            <a href="#" class="block py-2 px-3 text-red-500 rounded rounded hover:text-red-500 md:p-0 dark:text-white dark:hover:text-red-500" aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:text-red-500 md:p-0 dark:text-white dark:hover:text-red-500">About</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:text-red-500 md:p-0 dark:text-white dark:hover:text-red-500">Services</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:text-red-500 md:p-0 dark:text-white dark:hover:text-red-500">Contact</a>
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

        <div class="mt-20"></div>

        <div class="sm:px-10 lg:px-20 flex flex-col justify-start">
            <div class="mt-5"></div>
            <h1 class="text-3xl font-bold text-black-900 dark:text-black">Our Products</h1>
            <div class="mt-5"></div>
            <hr class="border-black h-2 w-full">
        </div>
        
        <!-- This is the main section where the products will be displayed -->
        <section class="py-10 px-5 sm:px-10 lg:px-20 flex justify-center items-center">
            <div id="productGrid" class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-5 gap-3 w-full"></div>
        </section>
        
        <!-- This is the pagination section -->
        <ul id="pagination" class="py-10 px-5 flex space-x-5 justify-center font-[sans-serif]"></ul>

        <script src="js/script.js"></script>
        
        <!-- This is the footer section -->
        <footer class="font-sans tracking-wide bg-black text-white px-10 pt-12 pb-6">
            <div class="flex flex-wrap justify-between gap-10">
                <div class="max-w-md">
                    <a href='javascript:void(0)'>
                        <img src="https://readymadeui.com/readymadeui.svg" alt="logo" class='w-36' />
                    </a>
                    <div class="mt-6">
                        <p class="leading-relaxed text-sm">ReadymadeUI is a library of pre-designed UI components built for Tailwind CSS. It offers a collection of versatile, ready-to-use components that streamline the development process by providing a wide range of UI elements.</p>
                    </div>
                </div>

                <div class="max-lg:min-w-[140px]">
                    <h4 class="font-semibold text-base relative max-sm:cursor-pointer">Services</h4>

                    <ul class="mt-6 space-y-4">
                        <li>
                            <a href='javascript:void(0)' class='hover:text-red-500 text-sm'>Web Development</a>
                        </li>
                        <li>
                            <a href='javascript:void(0)' class='hover:text-red-500 text-sm'>Pricing</a>
                        </li>
                        <li>
                            <a href='javascript:void(0)' class='hover:text-red-500 text-sm'>Support</a>
                        </li>
                        <li>
                            <a href='javascript:void(0)' class='hover:text-red-500 text-sm'>Client Portal</a>
                        </li>
                        <li>
                            <a href='javascript:void(0)' class='hover:text-red-500 text-sm'>Resources</a>
                        </li>
                    </ul>
                </div>

                <div class="max-lg:min-w-[140px]">
                    <h4 class="font-semibold text-base relative max-sm:cursor-pointer">Company</h4>
                    <ul class="space-y-4 mt-6">
                    <li>
                        <a href='javascript:void(0)' class='hover:text-red-500 text-sm'>About us</a>
                    </li>
                    <li>
                        <a href='javascript:void(0)' class='hover:text-red-500 text-sm'>Careers</a>
                    </li>
                    <li>
                        <a href='javascript:void(0)' class='hover:text-red-500 text-sm'>Blog</a>
                    </li>
                    <li>
                        <a href='javascript:void(0)' class='hover:text-red-500 text-sm'>Portfolio</a>
                    </li>
                    <li>
                        <a href='javascript:void(0)' class='hover:text-red-500 text-sm'>Events</a>
                    </li>
                    </ul>
                </div>

                <div class="max-lg:min-w-[140px]">
                    <h4 class="font-semibold text-base relative max-sm:cursor-pointer">Additional</h4>

                    <ul class="space-y-4 mt-6">
                    <li>
                        <a href='javascript:void(0)' class='hover:text-red-500 text-sm'>FAQ</a>
                    </li>
                    <li>
                        <a href='javascript:void(0)' class='hover:text-red-500 text-sm'>Partners</a>
                    </li>
                    <li>
                        <a href='javascript:void(0)' class='hover:text-red-500 text-sm'>Sitemap</a>
                    </li>
                    <li>
                        <a href='javascript:void(0)' class='hover:text-red-500 text-sm'>Contact</a>
                    </li>
                    <li>
                        <a href='javascript:void(0)' class='hover:text-red-500 text-sm'>News</a>
                    </li>
                    </ul>
                </div>
            </div>

        <hr class="mt-10 mb-6 border-gray-300" />

        <div class="flex flex-wrap max-md:flex-col gap-4">
            <ul class="md:flex md:space-x-6 max-md:space-y-2">
            <li>
                <a href='javascript:void(0)' class='hover:text-white text-sm'>Terms of Service</a>
            </li>
            <li>
                <a href='javascript:void(0)' class='hover:text-white text-sm'>Privacy Policy</a>
            </li>
            <li>
                <a href='javascript:void(0)' class='hover:text-white text-sm'>Security</a>
            </li>
            </ul>
            <p class='text-sm md:ml-auto'>© 2025 Power by Loy Team. All rights reserved.</p>
        </div>
        </footer>

    </body>
</html>
