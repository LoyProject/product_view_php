<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function viewImage() {
            const imageInput = document.getElementById('image');
            const file = imageInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    Swal.fire({
                        title: file.name,
                        imageUrl: e.target.result,
                        imageAlt: 'Product Image',
                        confirmButtonText: 'Close'
                    });
                }
                reader.readAsDataURL(file);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No image selected!',
                });
            }
        }

        function removeImage() {
            const imageInput = document.getElementById('image');
            imageInput.value = '';
        }
    </script>
    <script>
        function addProductBtn(event) {
            event.preventDefault();
            const formData = new FormData(document.getElementById('productForm'));

            axios.post('../database/insert_product.php', formData)
                .then(response => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Product Added',
                        text: 'The product has been added successfully!',
                    });
                    document.getElementById('productForm').reset();
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'There was an error adding the product.',
                    });
                });
        }
    </script>
</head>
<body>
    <div class="container mx-auto p-2 rounded-lg">
        <h1 class="px-4 pt-4 text-2xl font-bold">Add New Product</h1>
        <form id="productForm" onsubmit="addProductBtn(event)">
            <div class="p-4 space-y-2">
                <label class="font-md text-slate-500" for="name">Product Name</label>
                <input class="block border border-slate-100 shadow-sm w-full px-2 py-3 rounded-md focus:outline-none focus:border-red-500 focus:ring-1 ring-red-500 text-slate-500" type="text" id="name" name="name" autocomplete="off" required>
            </div>
            <div class="p-4 space-y-2">
                <label class="font-md text-slate-500" for="description">Product Description</label>
                <textarea class="block border border-slate-100 shadow-sm w-full px-2 py-3 rounded-md focus:outline-none focus:border-red-500 focus:ring-1 ring-red-500 text-slate-500" id="description" name="description" autocomplete="off" required></textarea>
            </div>
            <div class="p-4 space-y-2">
                <label class="font-md text-slate-500" for="image">Product Image</label>
                <input class="block border border-slate-100 shadow-sm w-full px-2 py-3 rounded-md focus:outline-none focus:border-red-500 focus:ring-1 ring-red-500 text-slate-500" type="file" id="image" name="image" accept="image/*" autocomplete="off" required>
                <button type="button" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md" onclick="viewImage()">View Image</button>
                <button type="button" class="mt-2 px-4 py-2 bg-red-500 text-white rounded-md" onclick="removeImage()">Delete Image</button>
            </div>
            <div class="p-4 space-y-2 text-right">
                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md">Add Product</button>
            </div>
        </form>

    </div>
</body>
</html>