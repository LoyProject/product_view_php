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
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-sticky" aria-expanded="false" onclick="toggleMenu()">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul id="menu-list"
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="../index.php"
                            class="block py-2 px-3 text-gray-900 rounded hover:text-red-500 md:p-0 dark:text-white dark:hover:text-red-500"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-red-500 rounded rounded hover:text-red-500 md:p-0 dark:text-white dark:hover:text-red-500">Dealer</a>
                    </li>
                    <li>
                        <a id="open-modal-service-btn" href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:text-red-500 md:p-0 dark:text-white dark:hover:text-red-500">Services</a>
                    </li>
                    <li>
                        <a id="open-modal-contact-btn" href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:text-red-500 md:p-0 dark:text-white dark:hover:text-red-500">Contact</a>
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

    <div class="container mx-auto p-16 mt-8">
        <div class="font-sans">
            <div class="lg:max-w-5xl max-w-3xl mx-auto">
                <div class="max-w-2xl mx-auto text-center">
                    <h2 class="text-gray-800 text-3xl font-extrabold">Visit To Our Dealer</h2>
                    <p class="text-gray-800 text-sm mt-4 leading-relaxed">Our dealer is location that you can visit to
                        see our products and services. You can also get a consultation from our team.
                    </p>
                </div>

                <div class="grid lg:grid-cols-4 md:grid-cols-3 gap-6 max-md:justify-center mt-8">
                    <div class="border rounded-lg overflow-hidden">
                        <img src="https://readymadeui.com/team-1.webp" class="w-full h-56 object-cover" />
                        <div class="p-4">
                            <h4 class="text-gray-800 text-base font-bold">John Doe</h4>
                            <p class="text-gray-800 text-xs mt-1">Software Engineer</p>
                            <div class="space-x-4 mt-4">
                                <button type="button"
                                    class="w-6 h-6 inline-flex items-center justify-center rounded-full border-none outline-none bg-[#03a9f4] hover:bg-[#03a1f4]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14px" fill="#fff"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M508.5 71.5L17.5 221.5c-13.2 4.2-12.9 13.6-2.2 17.1l117.4 36.8 45.1 140.4c5.5 15.2 11 20.8 22.3 20.8 9.2 0 13.3-4.2 22.9-12.9l53.7-51.7 111.4 82.7c20.5 11.4 35 5.5 40.1-18.7l72.7-348.6c6.7-28.5-10.7-41.3-29.5-34.1zM186.6 282.7L380.7 145c10.4-6.5 19.8-2.9 12.1 4.1L215.2 320.7l-8.5 59.6-20.1-97.6z"
                                            data-original="#03a9f4" />
                                    </svg>
                                </button>
                                <button type="button"
                                    class="w-6 h-6 inline-flex items-center justify-center rounded-full border-none outline-none bg-blue-600 hover:bg-blue-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14px" fill="#fff"
                                        viewBox="0 0 155.139 155.139">
                                        <path
                                            d="M89.584 155.139V84.378h23.742l3.562-27.585H89.584V39.184c0-7.984 2.208-13.425 13.67-13.425l14.595-.006V1.08C115.325.752 106.661 0 96.577 0 75.52 0 61.104 12.853 61.104 36.452v20.341H37.29v27.585h23.814v70.761h28.48z"
                                            data-original="#010002" />
                                    </svg>
                                </button>
                                <button type="button"
                                    class="w-6 h-6 inline-flex items-center justify-center rounded-full border-none outline-none bg-[#0077b5] hover:bg-[#0055b5]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14px" fill="#fff"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 0h4.45a6.52 6.52 0 0 0 2.75 5.72A6.34 6.34 0 0 0 23.99 8v4.46h-2.89a9.22 9.22 0 0 1-5.18-1.59v6.88a5.88 5.88 0 1 1-5.88-5.88c.23 0 .45.01.67.03v3.1a2.77 2.77 0 1 0 2.77 2.77V0z"
                                            data-original="#0077b5" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>