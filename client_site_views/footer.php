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
$companyDetailsQuery = "SELECT logo_footer AS image, address, email, contact, facebook, telegram, youtube FROM companies";
$result = $conn->query($companyDetailsQuery);

if ($result && $row = $result->fetch_assoc()) {
    $logoFullPath = $logoPath . $row['image'];
    $companyAddress = $row['address'];
    $companyEmail = $row['email'];
    $companyPhone = $row['contact'];
    $facebookLink = $row['facebook'];
    $telegramLink = $row['telegram'];
    $youtubeLink = $row['youtube'];
} else {
    $logoFullPath = $logoPath . 'default-logo.png';
    $companyAddress = 'Address not found';
    $companyEmail = 'Email not found';
    $companyPhone = 'Contact not found';
    $facebookLink = 'https://www.facebook.com';
    $telegramLink = 'https://www.telegram.com';
    $youtubeLink = 'https://www.youtube.com';
}

$conn->close();
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<footer class="font-sans tracking-wide bg-white text-black px-6 md:px-6 lg:px-16 py-4">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Logo & Address -->
            <div class="flex flex-col items-start space-y-4">
                <a href="#" class="flex items-center">
                    <img src="<?= htmlspecialchars($logoFullPath) ?>" alt="logo" class="w-24 md:w-28" />
                </a>
                <div>
                    <h4 class="font-bold text-red-500">Address</h4>
                    <p class="text-gray-600 text-sm hover:text-red-500 transition-all">
                        <?= htmlspecialchars($companyAddress) ?>
                    </p>
                </div>
            </div>

            <!-- Empty Space (Optional: You can add social media links here) -->
            <div class="flex flex-col items-start space-y-2">
                <h4 class="font-bold text-red-500">Follow Us</h4>
                <div class="flex space-x-4">
                    <a href="<?= htmlspecialchars($facebookLink) ?>" target="_blank"
                        class="text-gray-600 hover:text-red-500 transition-all">
                        <i class="fab fa-facebook-f text-blue-600"></i>
                    </a>
                    <a href="<?= htmlspecialchars($telegramLink) ?>" target="_blank"
                        class="text-gray-600 hover:text-red-500 transition-all">
                        <i class="fab fa-telegram-plane text-blue-500"></i>
                    </a>
                    <a href="<?= htmlspecialchars($youtubeLink) ?>" target="_blank"
                        class="text-gray-600 hover:text-red-500 transition-all">
                        <i class="fab fa-youtube text-red-600"></i>
                    </a>
                </div>
            </div>

            <!-- Navigation Links -->
            <div class="flex flex-col items-start space-y-2">
                <h4 class="font-bold text-red-500">Our Pages</h4>
                <nav class="flex flex-col space-y-1">
                    <a href="<?= $basePath ?>index.php"
                        class="text-gray-600 text-sm hover:text-red-500 transition-all">Home</a>
                    <a href="<?= $basePath ?>client_site_views/product.php"
                        class="text-gray-600 text-sm hover:text-red-500 transition-all">Products</a>
                    <a href="<?= $basePath ?>client_site_views/dealer.php"
                        class="text-gray-600 text-sm hover:text-red-500 transition-all">Dealer</a>
                </nav>
            </div>

            <!-- Contact Information -->
            <div class="flex flex-col items-start space-y-2">
                <h4 class="font-bold text-red-500">Contact Us</h4>
                <p class="text-gray-600 text-sm hover:text-red-500 transition-all">
                    <?= htmlspecialchars($companyEmail) ?>
                </p>
                <p class="text-gray-600 text-sm hover:text-red-500 transition-all">
                    <?= htmlspecialchars($companyPhone) ?>
                </p>
            </div>
        </div>
    </div>

    <!-- Divider Line -->
    <hr class="mt-8 border-gray-300" />

    <!-- Copyright Section -->
    <div class="mt-4 text-center">
        <p class="text-gray-500 text-sm">©2025 Loy Team. All rights reserved.</p>
    </div>
</footer>