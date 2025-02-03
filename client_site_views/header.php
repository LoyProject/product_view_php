<?php
// Detect the base path dynamically
$scriptPath = dirname($_SERVER['SCRIPT_NAME']);
$depth = substr_count($scriptPath, '/');
$basePath = ($depth > 1) ? '../' : '';

// Include database connection
$databasePath = $basePath . 'database/db_connection.php';
if (file_exists($databasePath)) {
    include $databasePath;
} else {
    die("Error: Database connection file not found at " . $databasePath);
}

$logoPath = $basePath . 'images_logo/';
$resultLogo = $conn->query("SELECT logo_header AS image FROM companies");

if ($resultLogo && $rowLogo = $resultLogo->fetch_assoc()) {
    $logoFullPath = $logoPath . $rowLogo['image'];
} else {
    $logoFullPath = $logoPath . 'default-logo.png';
}

$conn->close();
?>

<nav class="bg-gray-50 fixed w-full z-20 top-0 left-0 border-b">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="../index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="<?= htmlspecialchars($logoFullPath) ?>" class="h-8">
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
            </ul>
        </div>
    </div>
</nav>

<script>
function toggleMenu() {
    const navLinks = document.getElementById('navbar-sticky');
    navLinks.classList.toggle('hidden');
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