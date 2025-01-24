<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<?php
include 'header.php';
?>

<body>
    <?php include '../database/db_connection.php'; ?>
    <script src="../js/script-admin.js"></script>
    <div class="relative font-[sans-serif] pt-[70px] h-screen">
        <div class="flex items-start">
            <?php include 'sidebar.php'; ?>

            <section class="main-content w-full overflow-auto p-6 hidden" id="Dashboard">
                <div>
                    <div class="flex items-center">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

</html>