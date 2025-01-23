<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Product Detail</title>
</head>

<?php
include 'header.php';
?>

<body class="bg-gray-100 white:bg-gray-900">
    <?php include '../database/db_connection.php';?>

    <div class="px-8 mb-8 mt-24 container-md mx-auto">
        <div class="p-8 mt-4 rounded-lg bg-white">
            <?php
                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                    $product_id = intval($_GET['id']);
                    $stmt = $conn->prepare("SELECT image, name,description FROM products WHERE id = ?");
                    $stmt->bind_param("i", $product_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $data = $result->fetch_assoc();
                }
            ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                <div class="col-span-1 h-auto">
                    <div class="container flex justify-center items-center h-full w-full rounded-lg overflow-hidden">
                        <img src="../images/<?php echo ($data['image']) ?>"
                            class="object-contain w-full max-h-[540px] mx-auto" />
                    </div>
                </div>
                <div class="col-span-1 h-auto">
                    <div class="h-full flex flex-col justify-between">
                        <div class="w-full flex flex-col gap-6 h-full">
                            <div>
                                <h1 class="text-4xl font-bold text-black text-bold"><?php echo($data['name'])?></h1>
                                <div class="flex items-center space-x-1 mt-6">
                                    <svg class="w-4 h-4 fill-red-500" viewBox="0 0 14 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                    </svg>
                                    <svg class="w-4 h-4 fill-red-500" viewBox="0 0 14 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                    </svg>
                                    <svg class="w-4 h-4 fill-red-500" viewBox="0 0 14 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                    </svg>
                                    <svg class="w-4 h-4 fill-red-500" viewBox="0 0 14 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                    </svg>
                                    <svg class="w-4 h-4 fill-[#CED5D8]" viewBox="0 0 14 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h2 class="font-bold">Description</h2>
                                <article class="text-wrap">
                                    <p class="mt-3 text-sm text-gray-500 leading-relaxed break-words">
                                        <?php echo($data['description'])?></p>
                                </article>
                            </div>
                            <div class="mt-auto">
                                <a href="../"
                                    class="block px-2 max-w-[150px] py-3 bg-red-500 hover:bg-red-600 text-white text-md font-semibold rounded text-center">Back
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="px-8 mb-8 container-md mx-auto">
        <h3 class="text-2xl font-semibold mt-8">Related Products</h3>
        <hr>
        <div class="rounded-lg">
            <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-5 gap-2 w-full">
                <?php
                    $sql = "SELECT id, name, description, image FROM products WHERE id != $product_id ORDER BY RAND() LIMIT 5";
                    $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<div class="bg-white shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] border p-2 w-full max-w-sm rounded-lg font-[sans-serif] overflow-hidden mx-auto mt-4 hover:border-red-500 border-2 flex flex-col">';
                                    echo '<div>';
                                        echo '<img src="../images/' . $row["image"] . '" class="w-full h-52 object-cover rounded-lg" />';
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
                                        echo '<a href="product-detail.php?id=' . $row["id"] . '" class="mt-6 px-5 py-2.5 w-full inline-block text-center rounded-lg text-red-300 text-sm tracking-wider font-semibold border-2 border-red-300 outline-none hover:border-red-500 hover:text-red-500">View</a>';
                                    echo '</div>';
                                echo '</div>';
                            }
                        }
                    ?>
            </div>
        </div>
    </div>

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
     include 'footer.php';
    ?>

</body>

</html>