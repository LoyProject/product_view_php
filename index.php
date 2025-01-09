<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-gray-100 white:bg-gray-900">
        <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo">
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
                </a>
                <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get started</button>
                    <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                        </svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                    <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="py-10 px-5 sm:px-10 lg:px-20 flex justify-center items-center">
            <div id="productGrid" class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4 max-w-screen-xl w-full"></div>
        </section>

        <ul id="pagination" class="py-10 px-5 flex space-x-5 justify-center font-[sans-serif]">
            <li class="flex items-center justify-center shrink-0 border hover:border-blue-500 w-9 h-9 rounded-md"
            onclick="prevPage(); changeBgColor(this);"></li>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-gray-400" viewBox="0 0 55.753 55.753">
                <path
                d="M12.745 23.915c.283-.282.59-.52.913-.727L35.266 1.581a5.4 5.4 0 0 1 7.637 7.638L24.294 27.828l18.705 18.706a5.4 5.4 0 0 1-7.636 7.637L13.658 32.464a5.367 5.367 0 0 1-.913-.727 5.367 5.367 0 0 1-1.572-3.911 5.369 5.369 0 0 1 1.572-3.911z"
                data-original="#000000" />
            </svg>
            </li>
            <li class="flex items-center justify-center shrink-0 bg-blue-500 border hover:border-blue-500 cursor-pointer text-base font-bold text-white px-[13px] h-9 rounded-md"
            onclick="goToPage(1); changeBgColor(this);">1</li>
            <li class="flex items-center justify-center shrink-0 border hover:border-blue-500 cursor-pointer text-base font-bold text-gray-800 px-[13px] h-9 rounded-md"
            onclick="goToPage(2); changeBgColor(this);">2</li>
            <li class="flex items-center justify-center shrink-0 border hover:border-blue-500 cursor-pointer text-base font-bold text-gray-800 px-[13px] h-9 rounded-md"
            onclick="goToPage(3); changeBgColor(this);">3</li>
            <li class="flex items-center justify-center shrink-0 border hover:border-blue-500 cursor-pointer text-base font-bold text-gray-800 px-[13px] h-9 rounded-md"
            onclick="goToPage(4); changeBgColor(this);">4</li>
            <li class="flex items-center justify-center shrink-0 border hover:border-blue-500 w-9 h-9 rounded-md"
            onclick="nextPage(); changeBgColor(this);"></li>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-gray-400 rotate-180" viewBox="0 0 55.753 55.753">
                <path
                d="M12.745 23.915c.283-.282.59-.52.913-.727L35.266 1.581a5.4 5.4 0 0 1 7.637 7.638L24.294 27.828l18.705 18.706a5.4 5.4 0 0 1-7.636 7.637L13.658 32.464a5.367 5.367 0 0 1-.913-.727 5.367 5.367 0 0 1-1.572-3.911 5.369 5.369 0 0 1 1.572-3.911z"
                data-original="#000000" />
            </svg>
            </li>
        </ul>

        <script src="../js/script.js"></script>

        <footer class="bg-black text-white py-6">
            <div class="w-[92%] mx-auto text-center">
                <div class="mb-4">
                    <p>© 2024 Loy Team. All rights reserved.</p>
                </div>
                <div class="flex justify-center space-x-6">

                    <a href="#" class="text-white hover:text-gray-300">
                        <ion-icon name="logo-facebook" class="text-2xl"></ion-icon>
                    </a>

                    <a href="#" class="text-white hover:text-gray-300">
                        <ion-icon name="logo-twitter" class="text-2xl"></ion-icon>
                    </a>

                    <a href="#" class="text-white hover:text-gray-300">
                        <ion-icon name="logo-instagram" class="text-2xl"></ion-icon>
                    </a>

                    <a href="#" class="text-white hover:text-gray-300">
                        <ion-icon name="logo-linkedin" class="text-2xl"></ion-icon>
                    </a>
                </div>
            </div>
        </footer>
    </body>
</html>
