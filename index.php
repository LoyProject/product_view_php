<!DOCTYPE html>
<html lang="en">

<?php
    $scriptPath = dirname($_SERVER['SCRIPT_NAME']);
    $depth = substr_count($scriptPath, '/');
    $basePath = ($depth > 1) ? '../' : '';

    $databasePath = $basePath . 'database/db_connection.php';
    if (file_exists($databasePath)) {
        include $databasePath;
    } else {
        die("Error: Database connection file not found at " . $databasePath);
    }

    $logoPath = $basePath . 'images_logo/';
    $slideshowPath = $basePath . 'images_slideshow/';
    $companyDetailsQuery = "SELECT name, description, location, image1, image2, image3, slideshow_images FROM companies";
    $result = $conn->query($companyDetailsQuery);

        if ($result && $row = $result->fetch_assoc()) {
            $companyName = $row['name'];
            $companyDescription = $row['description'];
            $companyLocation = $row['location'];
            $image1 = !empty($row['image1']) ? $logoPath . $row['image1'] : $logoPath . 'default-image1.png';
            $image2 = !empty($row['image2']) ? $logoPath . $row['image2'] : $logoPath . 'default-image2.png';
            $image3 = !empty($row['image3']) ? $logoPath . $row['image3'] : $logoPath . 'default-image3.png';

            // Decode JSON slideshow images properly
            $slideshowImages = json_decode($row['slideshow_images'], true);

            // Ensure it's an array
            if (!is_array($slideshowImages)) {
                $slideshowImages = [];
            }
        } else {
            $companyName = 'Name not found';
            $companyDescription = 'Description not found';
            $companyLocation = 'Location not found';
            $image1 = $logoPath . 'default-image1.png';
            $image2 = $logoPath . 'default-image2.png';
            $image3 = $logoPath . 'default-image3.png';
            $slideshowImages = [
                'default-slide1.png',
                'default-slide2.png',
                'default-slide3.png'
            ];
        }

        // Validate slideshow images
        foreach ($slideshowImages as &$slideImage) {
            $slideImage = trim($slideImage, '"'); // Remove extra double quotes if present
            if (!empty($slideImage) && file_exists($slideshowPath . $slideImage)) {
                $slideImage = $slideshowPath . $slideImage;
            } else {
                $slideImage = $slideshowPath . 'default-slide1.png';
            }
        }
        unset($slideImage);

$conn->close();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        let slidesContainer = document.getElementById("slides-container");
        let slides = document.querySelectorAll("#slides-container .slide");
        let totalSlides = slides.length;
        let currentIndex = 0;
        const slideInterval = 3000; // 3 seconds per slide

        function showNextSlide() {
            currentIndex++;

            if (currentIndex >= totalSlides) {
                // Reset instantly to first slide without animation
                slidesContainer.style.transition = "none";
                slidesContainer.style.transform = "translateX(0)";
                currentIndex = 0;

                // Add animation back after reset
                setTimeout(() => {
                    slidesContainer.style.transition = "transform 0.7s ease-in-out";
                }, 50);
            } else {
                let offset = -currentIndex * 100; // Move slides left by 100% per slide
                slidesContainer.style.transform = `translateX(${offset}%)`;
            }
        }

        setInterval(showNextSlide, slideInterval);
    });
    </script>



    <title>Home</title>
</head>

<?php include 'client_site_views/header.php'; ?>

<body class="max-w-[1920px] mx-auto bg-[#f8f9ff]">

    <div class="text-black text-[15px] mt-16 mb-8">
        <div class="relative">
            <div class="px-4 sm:px-10">
                <div id="default-carousel" class="relative w-full mt-24 relative z-10" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div id="slideshow" class="relative w-full overflow-hidden">
                        <!-- Set height to 120 -->
                        <div id="slides-container"
                            class="flex w-full h-[600px] transition-transform duration-700 ease-in-out">
                            <?php foreach ($slideshowImages as $slideImage): ?>
                            <div class="slide w-full shrink-0">
                                <img src="<?= htmlspecialchars($slideImage) ?>"
                                    onerror="this.src='/images_slideshow/default-slide1.png'"
                                    class="w-full h-[600px] object-cover" alt="Slide">
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                        <?php foreach ($slideshowImages as $index => $slideImage): ?>
                        <button type="button" class="w-3 h-3 rounded-full bg-blue-500"
                            aria-label="Slide <?= $index + 1 ?>" data-carousel-slide-to="<?= $index ?>"></button>
                        <?php endforeach; ?>
                    </div>

                    <!-- Slider controls -->
                    <button type="button"
                        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group"
                        data-carousel-prev>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30">
                            <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button"
                        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group"
                        data-carousel-next>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30">
                            <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>

                <div class="mt-12 max-w-4xl mx-auto text-center relative z-10">
                    <h1 class="md:text-6xl text-4xl font-extrabold mb-6 md:!leading-[75px]">
                        <?= htmlspecialchars($companyName) ?></h1>
                    <p class="text-2xl font-[sans-serif]"><?= htmlspecialchars($companyDescription) ?></p>
                    <div class="mt-16 container-md mx-auto">
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
                            <div class="w-full rounded-md">
                                <img src="<?= htmlspecialchars($image1) ?>"
                                    class="object-cover h-full w-full rounded-md">
                            </div>
                            <div class="w-full rounded-md">
                                <img src="<?= htmlspecialchars($image2) ?>"
                                    class="object-cover h-full w-full rounded-md">
                            </div>
                            <div class="w-full rounded-md">
                                <img src="<?= htmlspecialchars($image3) ?>"
                                    class="object-cover h-full w-full rounded-md">
                            </div>
                        </div>
                    </div>
                    <div class="mt-16 container-md mx-auto flex items-center justify-center">
                        <div class="flex flex-row gap-4">
                            <div class="mt-24">
                                <button
                                    class="p-4 rounded-md text-white font-bold bg-red-500 transition-all hover:bg-red-600 font-[sans-serif] w-48">
                                    <a href="client_site_views/product.php">Explore Products</a>
                                </button>
                            </div>
                            <div class="mt-24">
                                <button
                                    class="p-4 rounded-md text-white font-bold bg-yellow-500 transition-all hover:bg-yellow-600 font-[sans-serif] w-48">
                                    <a href="<?= htmlspecialchars($companyLocation) ?>">Visit Shop</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img src="https://readymadeui.com/bg-effect.svg" class="absolute inset-0 w-full h-full" />
        </div>
    </div>

    <?php include('client_site_views/footer.php') ?>
</body>

</html>