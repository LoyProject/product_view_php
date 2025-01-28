<nav class="bg-gray-50 fixed w-full z-20 top-0 left-0 border-b">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://readymadeui.com/readymadeui.svg" class="h-8" alt="Flowbite Logo">
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-sticky" aria-expanded="false">
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
                class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                <li>
                    <a href="../index.php"
                        class="block py-2 px-3 text-black rounded hover:text-red-500 md:p-0 dark:text-black dark:hover:text-red-500"
                        onclick="handleMenuClick(event)" aria-current="page">Home</a>
                </li>
                <li>
                    <a href="client_site_views/dealer.php"
                        class="block py-2 px-3 text-black rounded hover:text-red-500 md:p-0 dark:text-black dark:hover:text-red-500"
                        onclick="handleMenuClick(event)">Dealer</a>
                </li>
                <li>
                    <a id="open-modal-service-btn" href="#"
                        class="block py-2 px-3 text-black rounded hover:text-red-500 md:p-0 dark:text-black dark:hover:text-red-500"
                        onclick="handleMenuClick(event)">Services</a>
                </li>
                <li>
                    <a id="open-modal-contact-btn" href="#"
                        class="block py-2 px-3 text-black rounded hover:text-red-500 md:p-0 dark:text-black dark:hover:text-red-500"
                        onclick="handleMenuClick(event)">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
function toggleMenu() {
    const navLinks = document.getElementById('navbar-sticky');

}

// Highlight the menu item based on the current URL
document.addEventListener("DOMContentLoaded", function() {
    const currentUrl = window.location.pathname; // Get the current URL path
    const links = document.querySelectorAll('#menu-list a');

    links.forEach(link => {
        if (link.getAttribute('href') === currentUrl) {
            link.classList.add('text-red-500'); // Add the red text class
        } else {
            link.classList.remove('text-red-500'); // Ensure others are not highlighted
        }
    });
});
</script>

<div id="open-modal-service" aria-hidden="true"
    class="hidden fixed inset-0 p-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Our Services</h3>
                <button id="close-modal-service-btn" type="button"
                    class="text-gray-400 bg-transparent hover:bg-red-500 hover:text-white rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
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

<div id="open-modal-contact" aria-hidden="true"
    class="hidden fixed inset-0 p-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Contact Us</h3>
                <button id="close-modal-contact-btn" type="button"
                    class="text-gray-400 bg-transparent hover:bg-red-500 hover:text-white rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
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