<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title> Admin Dashboard </title>
</head>
<body>
    <div class="flex h-screen bg-gray-200">
        <div class="w-64 bg-white shadow-md">
            <div class="p-4 font-bold text-xl border-b">Menu</div>
            <ul class="mt-4">
                <a href="#" onclick="showSection('dashboard')"><li class="px-4 py-2 hover:bg-gray-100">Dashboard</li></a>
                <a href="#" onclick="showSection('product')"><li class="px-4 py-2 hover:bg-gray-100">Product</li></a>
                <a href="#" onclick="showSection('setting')"><li class="px-4 py-2 hover:bg-gray-100">Setting</li></a>
            </ul>
        </div>

        <div class="flex-1 p-6">
            <div id="product" class="bg-white p-4 rounded shadow-md">
                <div class="flex justify-between items-center mb-4">
                    <h1 class="text-2xl font-bold">Product List</h1>
                    <button onclick="openForm()" class="flex items-center bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
                        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        New
                    </button>

                    <div id="popupForm" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
                        <div class="bg-white p-6 rounded shadow-lg w-96">
                            <h2 class="text-xl font-bold mb-4">Create New Product</h2>
                            <form id="productForm" onsubmit="submitForm(event)">
                                <div class="mb-4">
                                    <label class="block text-sm font-medium mb-1">Name</label>
                                    <input type="text" id="name" name="name" required 
                                        class="w-full border border-gray-300 rounded px-3 py-2">
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium mb-1">Description</label>
                                    <textarea id="description" name="description" required 
                                            class="w-full border border-gray-300 rounded px-3 py-2"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium mb-1">Image</label>
                                    <input type="file" id="image" name="image" accept="image/*" class="w-full border border-gray-300 rounded px-3 py-2">
                                </div>
                                <div class="flex justify-end">
                                    <button type="button" onclick="closeForm()" class="bg-gray-300 text-gray-700 px-4 py-2 rounded mr-2 hover:bg-gray-400">Cancel</button>
                                    <div class="ml-5"></div>
                                    <button type="submit" onclick="saveData()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save</button>
                                </div>
                            </form>
                        </div>

                        <script>
                            function saveData() {
                                const formData = new FormData(document.getElementById('productForm'));
                                fetch('../database/insert_product.php', {
                                    method: 'POST',
                                    body: formData,
                                })
                                .then(response => response.json())
                                .then(data => {
                                    document.getElementById('productForm').reset();
                                })
                                .catch(error => console.error('Error:', error));
                            }
                        </script>
                    </div>

                    <script>
                        function openForm() {
                            document.getElementById('popupForm').classList.remove('hidden');
                        }

                        function closeForm() {
                            document.getElementById('popupForm').classList.add('hidden');
                        }

                        function submitForm(event) {
                            event.preventDefault();
                            const name = document.getElementById('name').value;
                            const description = document.getElementById('description').value;
                            const image = document.getElementById('image').files[0];
                            
                            alert("New product inserted successfully!");
                            closeForm();
                        }
                    </script>
                </div>

                <?php
                    $conn = new mysqli("220.158.232.172", "product_mh01", "cL6sC3iRnWc3APyK", "product_mh01");
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $limit = 5;
                    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
                    $offset = ($page - 1) * $limit;

                    $total_sql = "SELECT COUNT(*) as total FROM products";
                    $total_result = $conn->query($total_sql);
                    $total_row = $total_result->fetch_assoc();
                    $total_records = $total_row['total'];
                    $total_pages = ceil($total_records / $limit);

                    $sql = "SELECT id, name, description, image FROM products ORDER BY id DESC LIMIT $limit OFFSET $offset";
                    $result = $conn->query($sql);
                ?>

                <table class="min-w-full bg-white border text-left">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b w-1/12">ID</th>
                            <th class="py-2 px-4 border-b w-2/12">Name</th>
                            <th class="py-2 px-4 border-b w-2/12">Description</th>
                            <th class="py-2 px-4 border-b w-2/12">Image</th>
                            <th class="py-2 px-4 border-b w-3/12">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td class="py-2 px-4 border-b"><?= $row["id"] ?></td>
                                    <td class="py-2 px-4 border-b"><?= $row["name"] ?></td>
                                    <td class="py-2 px-4 border-b"><?= $row["description"] ?></td>
                                    <td class="py-2 px-4 border-b"><img src="../images/<?= $row["image"] ?>" alt="Product Image" class="w-16 h-16"></td>
                                    <td class="py-2 px-4 border-b">
                                        <button onclick= 'getProductById(<?= $row["id"] ?>)' class="bg-blue-500 text-white px-4 py-2 rounded">Edit</button>
                                        <button onclick= 'deleteProduct(<?= $row["id"] ?>)' type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>

                                        <div id="editProductModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
                                        <div class="bg-white p-6 rounded shadow-lg w-full max-w-md">
                                            <h2 class="text-xl font-semibold mb-4">Update Product</h2>
                                            <form id="updateForm" onsubmit="submitForm(event)">
                                                <div class="mb-4">
                                                    <label for="update-name" class="block text-sm font-medium">Name</label>
                                                    <input type="text" id="update-name" name="update-name" class="w-full border rounded px-3 py-2" required />
                                                </div>
                                                <div class="mb-4">
                                                    <label for="update-description" class="block text-sm font-medium">Description</label>
                                                    <textarea id="update-description" name="update-description" class="w-full border rounded px-3 py-2" rows="4" required ></textarea>
                                                </div>
                                                    <div class="mb-4">
                                                    <label for="update-image" class="block text-sm font-medium">Image</label>
                                                    <input type="file" id="update-image" name="update-image" class="w-full border rounded px-3 py-2" accept="image/*" required />
                                                </div>
                                                <div class="flex justify-end space-x-2">
                                                    <button type="button" onclick="closeModal()" class="bg-gray-300 text-gray-700 px-4 py-2 rounded">Cancel</button>
                                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                                                </div>
                                            </form>
                                        </div>

                                        <script>
                                            function getProductById(productId) {
                                                fetch('../database/fetch_product_by_id.php', {
                                                    method: 'POST',
                                                    headers: { 'Content-Type': 'application/json' },
                                                    body: JSON.stringify({ id: productId }),
                                                })
                                                .then(response => response.json())
                                                .then(data => {
                                                    if (data.error) {
                                                        alert(data.error);
                                                        return;
                                                    }

                                                    document.getElementById('update-name').value = data.name;
                                                    document.getElementById('update-description').value = data.description;
                                                    document.getElementById('update-image').filename = data.image;

                                                    document.getElementById('editProductModal').classList.remove('hidden');
                                                })
                                                .catch(error => console.error('Error fetching product:', error));
                                            }

                                            function closeModal() {
                                                document.getElementById('editProductModal').classList.add('hidden');
                                            }

                                            function submitForm(event) {
                                                event.preventDefault();
                                                
                                                const formData = new FormData(document.getElementById('updateForm'));
                                                
                                                fetch('../database/update_product.php', {
                                                    method: 'POST',
                                                    body: formData,
                                                })
                                                .then(response => response.json())
                                                .then(data => {
                                                    if (data.success) {
                                                        alert('Product updated successfully!');
                                                        closeModal();
                                                    } else {
                                                        alert('Failed to update product.');
                                                    }
                                                })
                                                .catch(error => console.error('Error:', error));
                                            }
                                        </script>

                                        <script>
                                            function deleteProduct(id) {
                                                if (confirm("Are you sure you want to delete this product?")) {
                                                    fetch('../database/delete_product.php', {
                                                        method: 'POST',
                                                        headers: { 'Content-Type': 'application/json' },
                                                        body: JSON.stringify({ id: id }),
                                                    })
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        if (data.success) {
                                                            alert("Product deleted successfully!");
                                                        } else {
                                                            alert("Error deleting data: " + data.error);
                                                        }
                                                    })
                                                    .catch(error => console.error("Error:", error));
                                                }
                                            }
                                        </script>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="py-2 px-4 border-b text-center">No products found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <div class="flex items-center justify-end space-x-2 mt-4">
                    <?php if ($page > 1): ?>
                        <a href="?page=<?= $page - 1 ?>" class="px-4 py-2 text-gray-600 bg-white border border-gray-300 rounded hover:bg-gray-100">Previous</a>
                    <?php else: ?>
                        <span class="px-4 py-2 text-gray-400 bg-gray-100 border border-gray-300 rounded">Previous</span>
                    <?php endif; ?>

                    <select onchange="location = this.value;" class="px-4 py-2 text-gray-600 bg-white border border-gray-300 rounded">
                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <option value="?page=<?= $i ?>" <?= $i == $page ? 'selected' : '' ?>><?= $i ?></option>
                        <?php endfor; ?>
                    </select>

                    <?php if ($page < $total_pages): ?>
                        <a href="?page=<?= $page + 1 ?>" class="px-4 py-2 text-gray-600 bg-white border border-gray-300 rounded hover:bg-gray-100">Next</a>
                    <?php else: ?>
                        <span class="px-4 py-2 text-gray-400 bg-gray-100 border border-gray-300 rounded">Next</span>
                    <?php endif; ?>
                </div>

                <?php $conn->close(); ?>                
            </div>
        </div>
    </div>
</body>
</html>
