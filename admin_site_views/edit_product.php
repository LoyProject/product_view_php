<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}
?>

<?php
    include '../database/db_connection.php';

    $productId = $_GET['id'];
    $sql = "SELECT name, description, image FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $stmt->bind_result($name, $description, $image);
    $stmt->fetch();
    $stmt->close();
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('name').value = "<?php echo $name; ?>";
        document.getElementById('description').value = "<?php echo $description; ?>";
        document.getElementById('image').value = "<?php echo $image; ?>";
    });

    function displayFileName(input) {
        const file = input.files[0];
        const previewImage = document.getElementById('preview-image');

        const reader = new FileReader();
        reader.onload = function(e) {
            previewImage.src = e.target.result;
            previewImage.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    }

    function editProductBtn(event) {
        event.preventDefault();

        const formData = new FormData(document.getElementById('editProductForm'));
        formData.append('id', "<?php echo $productId; ?>");

        axios.post('../database/update_product.php', formData)
            .then(response => {
                Swal.fire({
                    icon: 'success',
                    title: 'Product Updated',
                    text: response.data.message,
                }).then(() => {
                    window.location.href = '../admin_site_views/product.php';
                });
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: error.response.data.message,
                });
            });
    }
    </script>
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
                    <h1 class="p-4 text-2xl font-bold mb-4">Edit Product</h1>
                    <form id="editProductForm" onsubmit="editProductBtn(event)">
                        <div class="p-4 space-y-2">
                            <label class=" font-md text-slate-500" for="name">
                                Product Name
                            </label>
                            <input
                                class="block border border-slate-100 shadow-sm w-full px-2 py-3 rounded-md focus:outline-none focus:border-red-500 focus:ring-1 ring-red-500 text-slate-500"
                                type="text" id="name" name="name" autocomplete="off" required></input>
                        </div>
                        <div class="p-4 space-y-2">
                            <label class=" font-md text-slate-500" for="description">
                                Product Description
                            </label>
                            <textarea
                                class="block border border-slate-100 shadow-sm w-full px-2 py-3 rounded-md focus:outline-none focus:border-red-500 focus:ring-1 ring-red-500 text-slate-500"
                                id="description" name="description" autocomplete="off" required></textarea>
                        </div>
                        <div class="p-4 space-y-2">
                            <label class=" font-md text-slate-500" for="image">
                                Product Image
                            </label>
                            <label id="label-image"
                                class="block hover:border-red-500 border-2 border-dashed border-slate-100 shadow-sm w-full px-2 h-52 rounded-md text-slate-500 cursor-pointer flex flex-col justify-center items-center">
                                <input type="file" id="image" name="image" accept="image/*" autocomplete="off"
                                    class="hidden" onchange="displayFileName(this)" required />
                                <img id="preview-image" src="<?php echo '../images/' . $image; ?>"
                                    class="w-full h-48 object-contain rounded <?php echo empty($image) ? 'hidden' : ''; ?>" />
                            </label>
                        </div>
                        <div class="p-4 space-y-2 text-right">
                            <button type="button"
                                class="text-white bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline font-[sans-serif]"
                                onclick="window.location.href = '../admin_site_views/product.php';">Cancel</button>
                            <button type="submit"
                                class="text-white bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline font-[sans-serif]">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>