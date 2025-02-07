<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Products</title>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
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
    });
    </script>
</head>


<body class="bg-[#f8f9ff]">

    <?php 
    include('header.php');
    include('../database/db_connection.php');

    if (isset($_GET['offset']) && isset($_GET['limit'])) {
        $offset = intval($_GET['offset']);
        $limit = intval($_GET['limit']);
        $keyword = isset($_GET['keyword']) ? $conn->real_escape_string($_GET['keyword']) : '';

        // SQL query for loading products (with optional search filter)
        $sql = "SELECT id, name, description, image, category_id 
                FROM products 
                WHERE name LIKE '%$keyword%' OR description LIKE '%$keyword%' 
                LIMIT $offset, $limit";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $category_id = $row['category_id'];
                $category_sql = "SELECT name FROM categories WHERE id = $category_id";
                $category_result = $conn->query($category_sql);
                $category_name = $category_result->num_rows > 0 ? $category_result->fetch_assoc()['name'] : 'Uncategorized';

                echo '<div class="bg-white shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] border p-2 w-full rounded-lg font-[sans-serif] overflow-hidden mx-auto mt-4 hover:border-red-500 border-2 flex flex-col">';
                    echo '<div>';
                        echo '<img src="images/' . htmlspecialchars($row["image"]) . '" class="w-full h-52 object-cover rounded-lg" />';
                    echo '</div>';
                    echo '<div class="pt-6 text-start px-2">';
                        echo '<h3 class="text-lg font-bold font-[sans-serif]">' . htmlspecialchars($row["name"]) . '</h3>';
                        echo '<div class="container mx-auto w-12 bg-red-100">';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="text-start flex-grow px-2">';
                        echo '<p class="mt-1 text-xs text-red-500">Category: ' . htmlspecialchars($category_name) . '</p>';
                    echo '</div>';
                    echo '<div class="text-start flex-grow px-2">';
                        echo '<article class="text-wrap">';
                            echo '<p class="mt-3 text-xs text-gray-500 leading-relaxed break-words">' . htmlspecialchars($row["description"]) . '</p>';
                        echo '</article>';
                    echo '</div>';
                    echo '<div class="px-2 mt-4">';
                        echo '<a href="product_detail.php?id=' . htmlspecialchars($row["id"]) . '" class="w-full py-2.5 inline-block text-center rounded-sm bg-red-100 text-red-500 text-xs font-bold tracking-wider font-[sans-serif] outline-none hover:bg-red-400 hover:text-white">View</a>';
                    echo '</div>';
                echo '</div>';
            }
        }
        exit();
    }
    ?>


    <div class="px-8 mb-8 mt-24 container-md mx-auto">

        <div
            class="flex rounded-md border-2 border-gray-100 focus-within:border-red-500 hover:border-red-500 overflow-hidden w-full font-[sans-serif]">
            <form method="GET" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="w-full flex">
                <input type="text" name="keyword" placeholder="Search Something..."
                    value="<?php echo htmlspecialchars($keyword ?? ''); ?>"
                    class="w-full h-16 outline-none bg-white text-gray-600 text-sm px-4 py-3 border-transparent" />
                <button type="submit" class="w-52 flex items-center justify-center bg-red-500 px-5 hover:bg-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192.904 192.904" width="16px"
                        class="fill-white">
                        <path
                            d="m190.707 180.101-47.078-47.077c11.702-14.072 18.752-32.142 18.752-51.831C162.381 36.423 125.959 0 81.191 0 36.422 0 0 36.423 0 81.193c0 44.767 36.422 81.187 81.191 81.187 19.688 0 37.759-7.049 51.831-18.751l47.079 47.078a7.474 7.474 0 0 0 5.303 2.197 7.498 7.498 0 0 0 5.303-12.803zM15 81.193C15 44.694 44.693 15 81.191 15c36.497 0 66.189 29.694 66.189 66.193 0 36.496-29.692 66.187-66.189 66.187C44.693 147.38 15 117.689 15 81.193z">
                        </path>
                    </svg>
                </button>
            </form>
        </div>
        <div>
            <h3 class="text-2xl font-semibold mt-8">Products</h3>
        </div>
        <hr class="mt-4 border-gray-200" />
        <div class="grid grid-cols-1 sm:grid-cols-6 gap-8">
            <div class="col-span-1 h-auto">
                <div class="mt-6">
                    <?php
                    $category_sql = "SELECT id, name FROM categories";
                    $category_result = $conn->query($category_sql);

                    if ($category_result->num_rows > 0) {
                        echo '<div class="container h-auto w-full bg-white shadow-md rounded-lg p-4">';
                        echo '<ul class="list-disc pl-5">';
                        echo '<li class="block mb-2">';
                        echo '<a href="category.php" class="font-[sans-serif] text-red-500 hover:text-red-600 text-gray-500">All Categories</a>';
                        echo '</li>';

                        while ($category_row = $category_result->fetch_assoc()) {
                            echo '<li class="block mb-2 px-2">';
                            echo '<a href="category.php?category_id=' . htmlspecialchars($category_row["id"]) . '" class="font-[sans-serif] text-gray-500 hover:text-red-600">' . htmlspecialchars($category_row["name"]) . '</a>';
                            echo '</li>';
                        }
                        echo '</ul>';
                        echo '</div>';
                    } else {
                        echo '<div class="container h-auto w-full bg-white shadow-md rounded-lg p-4">';
                        echo '<p class="text-gray-500">No categories found.</p>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
            <div class="col-span-5 h-auto">
                <div class="mt-2">
                    <div id="product-grid" class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-5 gap-2 w-full"></div>
                </div>
                <script>
                let offset = 0;
                const limit = 10;
                const keyword = new URLSearchParams(window.location.search).get('keyword') || '';

                document.addEventListener("DOMContentLoaded", () => {
                    const loadMoreButton = document.getElementById('load-more');

                    function loadProducts() {
                        fetch(
                                `<?php echo $_SERVER['PHP_SELF']; ?>?offset=${offset}&limit=${limit}&keyword=${keyword}`
                            )
                            .then(response => response.text())
                            .then(data => {
                                if (data.trim() === "") {
                                    loadMoreButton.innerText = "No More Products";
                                    loadMoreButton.disabled = true;
                                } else {
                                    document.getElementById('product-grid').innerHTML += data;
                                    offset += limit;
                                    loadMoreButton.innerText = "Load More";
                                    loadMoreButton.disabled = false;
                                }
                            })
                            .catch(error => {
                                console.error("Error loading products:", error);
                                loadMoreButton.innerText = "Load More";
                                loadMoreButton.disabled = false;
                            });
                    }
                    loadProducts();
                    loadMoreButton.addEventListener('click', function() {
                        this.disabled = true;
                        this.innerText = "Loading...";
                        loadProducts();
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
    </div>

    <?php
    include('footer.php');
    ?>
</body>

</html>