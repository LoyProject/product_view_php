<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Product Details</title>
</head>

<?php
include 'header.php';
?>

<body class="bg-[#f8f9ff]">
    <?php include '../database/db_connection.php'; ?>

    <div class="px-8 mb-8 mt-24 container-md mx-auto">
        <div class="p-8 mt-4 rounded-lg bg-white">
            <?php
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $product_id = intval($_GET['id']);
                $stmt = $conn->prepare("SELECT p.image, p.name, p.description, c.name as category_name FROM products p JOIN categories c ON p.category_id = c.id WHERE p.id = ?");
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
                    <div class="h-full flex flex-col justify-between px-4">
                        <div class="w-full flex flex-col gap-4 h-full">
                            <div>
                                <h1 class="text-4xl font-bold text-black text-bold font-[sans-serif]">
                                    <?php echo ($data['name']) ?>
                                </h1>
                            </div>
                            <hr class="border-gray-200">
                            <div class="flex justify-between items-center">
                                <p class="font-[sans-serif]">Category</p>
                                <p class="text-gray-500 font-[sans-serif]"> <?php echo ($data['category_name']) ?></p>
                            </div>
                            <hr class="border-gray-200">
                            <div>
                                <h2 class="font-[sans-serif]">Description</h2>
                                <article class="text-wrap">
                                    <p class="text-sm text-gray-500 leading-relaxed break-words font-[sans-serif]">
                                        <?php echo ($data['description']) ?>
                                    </p>
                                </article>
                            </div>
                            <div class="mt-auto">
                                <a href="product.php"
                                    class="block px-2 max-w-[150px] py-3 bg-red-500 hover:bg-red-600 text-white text-md font-[sans-serif] rounded text-center">Back
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
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-2 w-full">
                <?php
                $sql = "SELECT id, name, description, image FROM products WHERE id != $product_id ORDER BY RAND() LIMIT 5";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="bg-white shadow-[0_4px_12px_-5px_rgba(0,0,0,0.4)] border p-2 w-full rounded-lg font-[sans-serif] overflow-hidden mx-auto mt-4 hover:border-red-500 border-2 flex flex-col">';
                        echo '<div>';
                        echo '<img src="images/' . htmlspecialchars($row["image"]) . '" class="w-full h-52 object-cover rounded-lg" />';
                        echo '</div>';
                        echo '<div class="pt-6 text-start px-2">';
                        echo '<h3 class="text-xl font-bold font-[sans-serif]">' . htmlspecialchars($row["name"]) . '</h3>';
                        echo '</div>';
                        echo '<div class="text-start flex-grow px-2">';
                        echo '<article class="text-wrap">';
                        echo '<p class="mt-3 text-sm text-gray-500 leading-relaxed break-words">' . htmlspecialchars($row["description"]) . '</p>';
                        echo '</article>';
                        echo '</div>';
                        echo '<div class="p-2">';
                        echo '<a href="product_detail.php?id=' . htmlspecialchars($row["id"]) . '" class="mt-6 px-5 py-2.5 w-full inline-block text-center rounded-md bg-gray-200 text-gray-500 text-xs tracking-wider font-semibold outline-none hover:bg-gray-400 hover:text-white">View</a>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>

</body>

</html>