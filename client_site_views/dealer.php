<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title> Loy Team Project </title>
</head>

<?php include 'header.php' ?>

<body>
    
    <div class="px-8 mb-8 mt-24 container-md mx-auto">
        <div class="font-sans">
            <div class="lg:max-w-5xl max-w-3xl mx-auto">
                <div class="max-w-2xl mx-auto text-center">
                    <h2 class="text-gray-800 text-3xl font-extrabold">Visit To Our Dealer</h2>
                    <p class="text-gray-800 text-sm mt-4 leading-relaxed">Our dealer is location that you can visit to
                        see our products and services. You can also get a consultation from our team.
                    </p>
                </div>
                <div id="dealer-grid" class="mt-8 grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-5 gap-2 w-full">
                    <?php

                    include '../database/db_connection.php';

                    $sql = "SELECT name, contact, address, map, image FROM dealers LIMIT 5";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="border rounded-lg overflow-hidden">';
                                echo '<img src="../images_dealer/' . $row["image"] . '" class="w-full h-56 object-cover" />';
                                echo '<div class="p-4">';
                                    echo '<h4 class="text-gray-800 text-base font-bold">' . $row["name"] . '</h4>';
                                    echo '<div class="space-x-2 flex items-center">';
                                        echo '<p class="text-gray-500 text-xs mt-1 leading-relaxed hover:text-red-500">' . $row["contact"] . '</p>';
                                    echo '</div>';
                                    echo '<article class="text-wrap">';
                                        echo '<p class="text-gray-500 text-xs mt-1 leading-relaxed break-words hover:text-red-500">' . $row["address"] . '</p>';
                                    echo '</article>';
                                    echo '<div class="mt-4">';
                                        echo '<a href="' . $row["map"] . '" target="_blank">';
                                            echo '<button class="w-full bg-red-500 hover:bg-red-700 text-white font-xs py-2 px-4 rounded focus:outline-none focus:shadow-outline">';
                                                echo 'View Location';
                                            echo '</button>';
                                        echo '</a>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    ?>
                </div>
                <div class="mt-8">
                <div class="container mx-auto">
                    <div class="flex justify-center">
                        <button id="load-more" type="button"
                            class="px-5 py-2.5 w-52 rounded-lg text-red-300 text-sm tracking-wider font-semibold border-2 border-none outline-none hover:border-red-500 hover:text-red-500">
                            Load More
                        </button>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>
</body>

</html>