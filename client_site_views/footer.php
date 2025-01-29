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
$resultLogo = $conn->query("SELECT * FROM logo");

if ($resultLogo && $rowLogo = $resultLogo->fetch_assoc()) {
    $logoFullPath = $logoPath . $rowLogo['image'];
} else {
    $logoFullPath = $logoPath . 'default-logo.png';
}

$conn->close();
?>

<footer class="font-sans tracking-wide bg-gray-200 text-black px-10 pt-12 pb-6">
    <div class="container-xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="flex items-center justify-center">
                <a href="#" class="flex items-center">
                    <img src="<?= htmlspecialchars($logoFullPath) ?>" alt="logo" class="w-48" />
                </a>
            </div>
            <div class="lex items-start justify-start md:justify-center">
                <div class="flex flex-col items-start space-y-2">
                    <h4 class="font-bold font-[sans-serif] text-red-500">Address</h4>
                    <p class="text-gray-500 text-sm font-[sans-serif] hover:text-red-500">#12/7, Khlong luang District,
                        Pathum Thai 12120,
                        Thailand</p>
                </div>
            </div>
            <div class="flex items-start justify-start md:justify-center">
                <div class="flex flex-col items-start space-y-2">
                    <h4 class="font-bold font-[sans-serif] text-red-500">Contact Us</h4>
                    <p class="text-gray-500 text-sm font-[sans-serif] hover:text-red-500">contact@example.com</p>
                    <p class="text-gray-500 text-sm font-[sans-serif] hover:text-red-500">+85512 345 678</p>
                </div>
            </div>
        </div>
    </div>
    <hr class="mt-8 border-gray-300" />
    <div class="mt-4">
        <p class='text-gray-500 text-sm'>©2025 Loy Team. All rights reserved.</p>
    </div>
</footer>