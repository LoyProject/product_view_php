<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <title> Loy Team Project </title>
    </head>

    <body class="bg-gray-100 white:bg-gray-900"> 
        <script src ="js/script.js"></script>
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
                            <a href="../product_view_php/client_site_views/dealer.php" class="block py-2 px-3 text-gray-900 rounded hover:text-red-500 md:p-0 dark:text-white dark:hover:text-red-500">Dealer</a>
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

        <div id="open-modal-service" aria-hidden="true" class="hidden fixed inset-0 p-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Our Services</h3>
                <button id="close-modal-service-btn" type="button" class="text-gray-400 bg-transparent hover:bg-red-500 hover:text-white rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                    />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    With less than a month to go before the European Union enacts new
                    consumer privacy laws for its citizens, companies around the world
                    are updating their terms of service agreements to comply.
                </p>
                </div>
            </div>
            </div>
        </div>

        <div id="open-modal-contact" aria-hidden="true" class="hidden fixed inset-0 p-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Contact Us</h3>
                        <button id="close-modal-contact-btn" type="button" class="text-gray-400 bg-transparent hover:bg-red-500 hover:text-white rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                            />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            With less than a month to go before the European Union enacts new
                            consumer privacy laws for its citizens, companies around the world
                            are updating their terms of service agreements to comply.
                        </p>
                    </div>
                </div>
            </div>
        </div>
  
        <script>
            document.getElementById("open-modal-service-btn").addEventListener("click", function (event) {
            event.preventDefault(); // Prevent default link behavior
            document.getElementById("open-modal-service").classList.remove("hidden");
            });

            document.getElementById("close-modal-service-btn").addEventListener("click", function () {
                document.getElementById("open-modal-service").classList.add("hidden");
            });

            document.getElementById("open-modal-contact-btn").addEventListener("click", function (event) {
            event.preventDefault(); // Prevent default link behavior
            document.getElementById("open-modal-contact").classList.remove("hidden");
            });

            document.getElementById("close-modal-contact-btn").addEventListener("click", function () {
                document.getElementById("open-modal-contact").classList.add("hidden");
            });
        </script>

        <?php
            include('database/db_connection.php');

                if (isset($_GET['offset']) && isset($_GET['limit'])) {
                    $offset = intval($_GET['offset']);
                    $limit = intval($_GET['limit']);

                    $sql = "SELECT id, name, description, image FROM products LIMIT $offset, $limit";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="bg-white shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] border p-2 w-full max-w-sm rounded-lg font-[sans-serif] overflow-hidden mx-auto mt-4 hover:border-red-500 border-2">';
                                echo '<div>';
                                    echo '<img src="images/' . $row["image"] . '" class="w-full rounded-lg" />';
                                echo '</div>';
                                echo '<div class="pt-6 text-center">';
                                    echo '<h3 class="text-xl font-bold">' . $row["name"] . '</h3>';
                                echo '</div>';
                                echo '<div class="text-start">';
                                    echo '<article class="text-wrap">';
                                        echo '<p class="mt-3 text-sm text-gray-500 leading-relaxed break-words">' . $row["description"] . '</p>';
                                    echo '</article>';
                                    echo '<a href="client_site_views/product-detail.php?id=' . $row["id"] . '" class="mt-6 px-5 py-2.5 w-full inline-block text-center rounded-lg text-red-300 text-sm tracking-wider font-semibold border-2 border-red-300 outline-none hover:border-red-500 hover:text-red-500">View</a>';
                                echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo '<script>document.getElementById("load-more").style.display = "none";</script>'; // Hide the button
                    }
                    exit(); // Prevent further output
                }
        ?>

        <div class="p-16 container mx-auto">
            <div class="p-8 rounded-lg">
                <div class="flex rounded-md border-2 border-gray-100 focus:border-red-500 hover:border-red-500 overflow-hidden w-full font-[sans-serif]">
                    <input 
                        type="email" 
                        placeholder="Search Something..." 
                        class="w-full h-16 outline-none bg-white text-gray-600 text-sm px-4 py-3 border-transparent "/>
                    <button 
                        type="button" 
                        class="w-52 flex items-center justify-center bg-red-500 px-5 hover:bg-red-600">
                        <svg 
                            xmlns="http://www.w3.org/2000/svg" 
                            viewBox="0 0 192.904 192.904" 
                            width="16px" 
                            class="fill-white">
                            <path
                                d="m190.707 180.101-47.078-47.077c11.702-14.072 18.752-32.142 18.752-51.831C162.381 36.423 125.959 0 81.191 0 36.422 0 0 36.423 0 81.193c0 44.767 36.422 81.187 81.191 81.187 19.688 0 37.759-7.049 51.831-18.751l47.079 47.078a7.474 7.474 0 0 0 5.303 2.197 7.498 7.498 0 0 0 5.303-12.803zM15 81.193C15 44.694 44.693 15 81.191 15c36.497 0 66.189 29.694 66.189 66.193 0 36.496-29.692 66.187-66.189 66.187C44.693 147.38 15 117.689 15 81.193z">
                            </path>
                        </svg>
                    </button>
                </div>
                <div>
                    <h3 class="text-2xl font-semibold mt-8">Products</h3>
                </div>
                <hr class="mt-4 border-gray-200" />
                <div class="mt-2">
                    <div id="product-grid" class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-5 gap-2 w-full">
                        <?php
                            $sql = "SELECT id, name, description, image FROM products LIMIT 10";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<div class="bg-white shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] border p-2 w-full max-w-sm rounded-lg font-[sans-serif] overflow-hidden mx-auto mt-4 hover:border-red-500 border-2">';
                                        echo '<div>';
                                            echo '<img src="images/' . $row["image"] . '" class="w-full rounded-lg" />';
                                        echo '</div>';
                                        echo '<div class="pt-6 text-center">';
                                            echo '<h3 class="text-xl font-bold">' . $row["name"] . '</h3>';
                                        echo '</div>';
                                        echo '<div class="text-start">';
                                            echo '<article class="text-wrap">';
                                            echo '<p class="mt-3 text-sm text-gray-500 leading-relaxed break-words">' . $row["description"] . '</p>';
                                            echo '</article>';
                                            echo '<a href="client_site_views/product-detail.php?id=' . $row["id"] . '" class="mt-6 px-5 py-2.5 w-full inline-block text-center rounded-lg text-red-300 text-sm tracking-wider font-semibold border-2 border-red-300 outline-none hover:border-red-500 hover:text-red-500">View</a>';
                                        echo '</div>';
                                    echo '</div>';
                                }
                            }
                        ?>
                    </div>
                </div>
                <script>
                    let offset = 10;
                    const limit = 10;

                    document.addEventListener("DOMContentLoaded", () => {
                        const loadMoreButton = document.getElementById('load-more');

                        loadMoreButton.addEventListener('click', function () {
                            const button = this;
                            button.disabled = true; // Temporarily disable the button
                            button.innerText = "Loading...";

                            fetch(`<?php echo $_SERVER['PHP_SELF']; ?>?offset=${offset}&limit=${limit}`)
                                .then(response => response.text())
                                .then(data => {
                                    if (data.trim() === "") {
                                        button.innerText = "No More Products";
                                        button.disabled = true;
                                    } else {
                                        document.getElementById('product-grid').innerHTML += data;
                                        button.innerText = "Load More";
                                        button.disabled = false;
                                        offset += limit;
                                    }
                                })
                                .catch(error => {
                                    console.error("Error loading products:", error);
                                    button.innerText = "Load More";
                                    button.disabled = false;
                                });
                        });
                    });
                </script>
                <div class="mt-8">
                <div class="container mx-auto">
                    <div class="flex justify-center">
                        <button id="load-more" type="button" class="px-5 py-2.5 w-52 rounded-lg text-red-300 text-sm tracking-wider font-semibold border-2 border-none outline-none hover:border-red-500 hover:text-red-500">
                            Load More
                        </button>
                    </div>
                </div>
                </div>
            </div>
        </div>
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
