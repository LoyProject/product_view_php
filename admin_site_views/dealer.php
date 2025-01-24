<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dealer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>
<?php
include 'header.php';
?>

<body>
    <div class="relative font-[sans-serif] pt-[70px] h-screen">
        <div class="flex items-start">
            <?php include 'sidebar.php'; ?>
            <div class="main-content w-full overflow-auto p-6">
                <div class="container mx-auto p-2 rounded-lg">
                    <div class="px-8 font-[sans-serif] overflow-x-auto">
                        <div class="mb-4 flex justify-between items-center">
                            <h2 class="text-2xl font-bold">Dealer List</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>