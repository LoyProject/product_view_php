<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
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

        function addProductBtn(event) {
            event.preventDefault();
            const formData = new FormData(document.getElementById('addProductForm'));
            
            Swal.fire({
                title: 'Adding Product...',
                text: 'Please wait while the product is being added.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            axios.post('../database/insert_product.php', formData)
                .then(response => {
                    Swal.close();
                    Swal.fire({
                        icon: 'success',
                        title: 'Product Added',
                        text: 'The product has been added successfully!',
                    });
                    document.getElementById('addProductForm').reset();
                })
                .catch(error => {
                    Swal.close();
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'There was an error adding the product.',
                    });
                });
        }
    </script>
</head>

<?php include 'header.php' ?>

<body>
    <div class="relative font-[sans-serif] pt-[70px] h-screen">
        <div class="flex items-start">
            <?php include 'sidebar.php'; ?>
            <div class="main-content w-full overflow-auto p-6">
                <div class="container-xl mx-auto">
                    <div class="flex justify-between item-center">
                        <h2 class="p-4 text-2xl font-bold">Create New</h2>
                        <a href="product.php">
                            <button
                                class="text-white bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline font-[sans-serif]">
                                Back
                            </button>
                        </a>
                    </div>
                    <form id="addProductForm" onsubmit="addProductBtn(event)">
                        <div class="p-4 space-y-2">
                            <label class=" font-md text-slate-500" for="product-name">
                                Product Name
                            </label>
                            <input
                                class="block border border-slate-100 shadow-sm w-full px-2 py-3 rounded-md focus:outline-none focus:border-red-500 focus:ring-1 ring-red-500 text-slate-500"
                                type="text" id="name" name="name" autocomplete="off" required></input>
                        </div>
                        <div class="p-4 space-y-2">
                            <label class=" font-md text-slate-500" for="product-description">
                                Product Description
                            </label>
                            <textarea
                                class="block border border-slate-100 shadow-sm w-full px-2 py-3 rounded-md focus:outline-none focus:border-red-500 focus:ring-1 ring-red-500 text-slate-500"
                                id="description" name="description" autocomplete="off" required></textarea>
                        </div>
                        <div class="p-4 space-y-2">
                            <label id="lable-image"
                                class="block hover:border-red-500 border-2 border-dashed border-slate-100 shadow-sm w-full px-2 h-52 rounded text-slate-500 cursor-pointer mx-auto flex flex-col justify-center items-center">
                                <div id="upload-icon" class="flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-11 mb-2 fill-gray-500"
                                        viewBox="0 0 32 32">
                                        <path
                                            d="M23.75 11.044a7.99 7.99 0 0 0-15.5-.009A8 8 0 0 0 9 27h3a1 1 0 0 0 0-2H9a6 6 0 0 1-.035-12 1.038 1.038 0 0 0 1.1-.854 5.991 5.991 0 0 1 11.862 0A1.08 1.08 0 0 0 23 13a6 6 0 0 1 0 12h-3a1 1 0 0 0 0 2h3a8 8 0 0 0 .75-15.956z"
                                            data-original="#000000" />
                                        <path
                                            d="M20.293 19.707a1 1 0 0 0 1.414-1.414l-5-5a1 1 0 0 0-1.414 0l-5 5a1 1 0 0 0 1.414 1.414L15 16.414V29a1 1 0 0 0 2 0V16.414z"
                                            data-original="#000000" />
                                    </svg>
                                </div>
                                <label class=" font-md text-slate-500" id="product-image">
                                    Upload Image
                                </label>
                                <span id="file-name" class="text-xs font-medium text-gray-400 mt-2">Only
                                    .png,
                                    .jpeg, .jpg are allowed.</span>
                                <input type="file" id="image" name="image" accept="image/*" autocomplete="off"
                                    class="hidden" accept=".jpg, .jpeg, .png" required onchange="displayFileName(this); if(this.files.length > 0);
                                    document.getElementById('file-name').style.display = 'none';
                                    document.getElementById('upload-icon').style.display = 'none';
                                    document.getElementById('product-image').style.display = 'none';
                                    document.getElementById('lable-image').classList.add('border-red-500');" />
                                <img id="preview-image" class="hidden p-2 w-full h-52 object-contain rounded" />
                            </label>
                        </div>
                        <div class="p-4 space-x-4 flex justify-end">
                            <button
                                class="text-white bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline font-[sans-serif]"
                                type="button" onclick="document.getElementById('addProductForm').reset();
                                        document.getElementById('preview-image').classList.add('hidden');
                                        document.getElementById('file-name').style.display = 'block';
                                        document.getElementById('upload-icon').style.display = 'block';
                                        document.getElementById('lable-image').classList.remove('border-red-500');">
                                Clear
                            </button>
                            <button
                                class="text-white bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline font-[sans-serif]"
                                type="submit">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>