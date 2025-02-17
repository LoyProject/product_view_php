<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Product Details</title>
</head>

<?php include 'header.php'; ?>

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
                            class="object-contain w-full max-h-[540px] mx-auto" 
                            alt="<?php $data['name'] ?>"/>
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
        <h3 class="text-2xl font-semibold mt-8 mb-2">Related Products</h3>
        <hr class="mb-4">
        <div class="rounded-lg">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-2 w-full">
                <?php
                    $sql = "SELECT p.id, p.name, p.description, p.image, c.name as category_name FROM products p JOIN categories c ON p.category_id = c.id WHERE p.id != $product_id ORDER BY RAND() LIMIT 5";
                    $result = $conn->query($sql);
                ?>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($product = $result->fetch_assoc()): ?>
                        <div class="bg-white shadow-md border p-2 w-full rounded-lg overflow-hidden hover:border-red-500 flex flex-col">
                            <img src="../images/<?= htmlspecialchars($product['image']) ?>" 
                                class="w-full h-52 object-cover rounded-lg" 
                                alt="<?= htmlspecialchars($product['name']) ?>" />

                            <div class="pt-4 px-2 flex-grow">
                                <h3 class="text-lg font-bold"><?= htmlspecialchars($product['name']) ?></h3>
                                <p class="text-xs text-red-500 font-bold"><?= htmlspecialchars($product['category_name']) ?></p>
                                <p class="mt-3 text-xs text-gray-500"><?= htmlspecialchars($product['description']) ?></p>
                                <br>
                            </div>

                            <div class="p-2 mt-auto">
                                <a href="product_detail.php?id=<?= htmlspecialchars($product['id']) ?>"
                                    class="w-full py-2 text-center block rounded-md bg-red-100 text-red-500 text-xs font-bold 
                                        transition duration-300 hover:bg-red-500 hover:text-white shadow-md">
                                    View
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p class="text-gray-500 text-sm font-semibold">No products available.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

</body>

</html>