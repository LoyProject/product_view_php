<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title> Loy Team Project </title>
</head>

<?php
include('client_site_views/header.php');
?>

<body class="bg-gray-100 white:bg-gray-900">

    <script>
    document.getElementById("open-modal-service-btn").addEventListener("click", function(event) {
        event.preventDefault(); // Prevent default link behavior
        document.getElementById("open-modal-service").classList.remove("hidden");
    });

    document.getElementById("close-modal-service-btn").addEventListener("click", function() {
        document.getElementById("open-modal-service").classList.add("hidden");
    });

    document.getElementById("open-modal-contact-btn").addEventListener("click", function(event) {
        event.preventDefault(); // Prevent default link behavior
        document.getElementById("open-modal-contact").classList.remove("hidden");
    });

    document.getElementById("close-modal-contact-btn").addEventListener("click", function() {
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
                        echo '<div class="bg-white shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] border p-2 w-full max-w-sm rounded-lg font-[sans-serif] overflow-hidden mx-auto mt-4 hover:border-red-500 border-2 flex flex-col">';
                            echo '<div>';
                                echo '<img src="images/' . $row["image"] . '" class="w-full h-52 object-cover rounded-lg" />';
                            echo '</div>';
                            echo '<div class="pt-6 text-center">';
                                echo '<h3 class="text-xl font-bold">' . $row["name"] . '</h3>';
                            echo '</div>';
                            echo '<div class="text-start flex-grow">';
                                echo '<article class="text-wrap">';
                                    echo '<p class="mt-3 text-sm text-gray-500 leading-relaxed break-words">' . $row["description"] . '</p>';
                                echo '</article>';
                            echo '</div>';
                            echo '<div class="mt-4">';
                                echo '<a href="client_site_views/product-detail.php?id=' . $row["id"] . '" class="mt-6 px-5 py-2.5 w-full inline-block text-center rounded-lg text-red-300 text-sm tracking-wider font-semibold border-2 border-red-300 outline-none hover:border-red-500 hover:text-red-500">View</a>';
                            echo '</div>';
                        echo '</div>';
                        }
                    } else {
                        echo '<script>document.getElementById("load-more").style.display = "none";</script>';
                    }
                    exit();
                }
        ?>

    <div class="px-8 mb-8 mt-24 container-md mx-auto">
        <div class="rounded-lg">
            <div
                class="flex rounded-md border-2 border-gray-100 focus:border-red-500 hover:border-red-500 overflow-hidden w-full font-[sans-serif]">
                <input type="email" placeholder="Search Something..."
                    class="w-full h-16 outline-none bg-white text-gray-600 text-sm px-4 py-3 border-transparent " />
                <button type="button" class="w-52 flex items-center justify-center bg-red-500 px-5 hover:bg-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192.904 192.904" width="16px"
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
                                    echo '<div class="bg-white shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] border p-2 w-full max-w-sm rounded-lg font-[sans-serif] overflow-hidden mx-auto mt-4 hover:border-red-500 border-2 flex flex-col">';
                                        echo '<div>';
                                            echo '<img src="images/' . $row["image"] . '" class="w-full h-52 object-cover rounded-lg" />';
                                        echo '</div>';
                                        echo '<div class="pt-6 text-center">';
                                            echo '<h3 class="text-xl font-bold">' . $row["name"] . '</h3>';
                                        echo '</div>';
                                        echo '<div class="text-start flex-grow">';
                                            echo '<article class="text-wrap">';
                                            echo '<p class="mt-3 text-sm text-gray-500 leading-relaxed break-words">' . $row["description"] . '</p>';
                                            echo '</article>';
                                        echo '</div>';
                                        echo '<div class="mt-4">';
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

                loadMoreButton.addEventListener('click', function() {
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
                        <button id="load-more" type="button"
                            class="px-5 py-2.5 w-52 rounded-lg text-red-300 text-sm tracking-wider font-semibold border-2 border-none outline-none hover:border-red-500 hover:text-red-500">
                            Load More
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include('client_site_views/footer.php');
    ?>
</body>

</html>