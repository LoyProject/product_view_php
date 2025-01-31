<?php
    include '../database/db_connection.php';

    $sql = "SELECT name, contact, address, email, logo_header, logo_footer FROM companies WHERE id = 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->bind_result($name, $contact, $address, $email, $logoHeader, $logoFooter);
    $stmt->fetch();
    $stmt->close();

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function editCompany(event) {
            event.preventDefault();

            const formData = new FormData(document.getElementById(event.target.id));

            Swal.fire({
                title: 'Updating company...',
                text: 'Please wait while the company is being updated.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            axios.post('../database/update_company.php', formData)
                .then(response => {
                    Swal.close();
                    Swal.fire({
                        icon: 'success',
                        title: 'Company Updated',
                        text: response.data.message,
                    }).then(() => {
                        window.location.href = '../admin_site_views/company.php';
                    });
                })
                .catch(error => {
                    Swal.close();
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: error.response?.data?.message || 'An error occurred. Please try again.',
                    });
                });
        }
        
        function displayFileNameHeader(input) {
            const file = input.files[0];
            const previewImage = document.getElementById('preview-image-header');

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                    previewImage.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        }

        function displayFileNameFooter(input) {
            const file = input.files[0];
            const previewImage = document.getElementById('preview-image-footer');

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                    previewImage.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        }

        function resetImagePreview() {
            const previewImageHeader = document.getElementById('preview-image-header');
            const fileNameLabelHeader = document.getElementById('file-name-header');
            const uploadIconHeader = document.getElementById('upload-icon-header');
            const previewImageFooter = document.getElementById('preview-image-footer');
            const fileNameLabelFooter = document.getElementById('file-name-footer');
            const uploadIconFooter = document.getElementById('upload-icon-footer');

            document.getElementById('editCompanyForm').reset();
            previewImageHeader.classList.add('hidden');
            fileNameLabelHeader.style.display = 'block';
            uploadIconHeader.style.display = 'block';
            previewImageFooter.classList.add('hidden');
            fileNameLabelFooter.style.display = 'block';
            uploadIconFooter.style.display = 'block';
        }
    </script>
</head>
<body>
    <?php include 'header.php'; ?>
    
    <script>
         document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('name').value = "<?php echo $name; ?>";
            document.getElementById('contact').value = "<?php echo $contact; ?>";
            document.getElementById('address').value = "<?php echo $address; ?>";
            document.getElementById('email').value = "<?php echo $email; ?>";
            
            if ("<?php echo $logoHeader; ?>") {
                document.getElementById('preview-image-header').src = "../images_logo/<?php echo $logoHeader; ?>";
                document.getElementById('preview-image-header').classList.remove('hidden');
                document.getElementById('file-name-header').style.display = 'none';
                document.getElementById('upload-icon-header').style.display = 'none';
            }
            if ("<?php echo $logoFooter; ?>") {
                document.getElementById('preview-image-footer').src = "../images_logo/<?php echo $logoFooter; ?>";
                document.getElementById('preview-image-footer').classList.remove('hidden');
                document.getElementById('file-name-footer').style.display = 'none';
                document.getElementById('upload-icon-footer').style.display = 'none';   
            }
        });
    </script>

    <div class="relative font-sans pt-[70px] min-h-screen">
        <div class="flex">
            <?php include 'sidebar.php'; ?>

            <div class="main-content w-full overflow-auto p-6">
                <div class="container-xl mx-auto">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Company Profile</h2>
                        <a href="new_product.php">
                            <button class="hidden bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-700">
                                Add New
                            </button>
                        </a>
                    </div>

                    <div class="container mx-auto">
                        <form id="editCompanyForm" onsubmit="editCompany(event)">
                            <div class="mb-6">
                                <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                                <input type="text" id="name" name="name" required autocomplete="off"
                                    class="w-full border border-gray-300 shadow-sm px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                            </div>

                            <div class="mb-6">
                                <label for="contact" class="block text-gray-700 font-medium mb-2">Contact Number</label>
                                <input type="text" id="contact" name="contact" required autocomplete="off"
                                    class="w-full border border-gray-300 shadow-sm px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                            </div>

                            <div class="mb-6">
                                <label for="address" class="block text-gray-700 font-medium mb-2">Address</label>
                                <textarea id="address" name="address" required autocomplete="off"
                                    class="w-full border border-gray-300 shadow-sm px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500"></textarea>
                            </div>

                            <div class="mb-6">
                                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                                <input type="email" id="email" name="email" required autocomplete="off"
                                    class="w-full border border-gray-300 shadow-sm px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                            </div>

                            <div class="mb-6">
                                <label for="image-header" class="block text-gray-700 font-medium mb-2">Logo Header</label>
                                <label for="image-header"
                                    class="block border-2 border-dashed border-gray-300 shadow-sm w-full h-52 rounded cursor-pointer flex flex-col justify-center items-center">
                                    <div id="upload-icon-header" class="text-gray-500 mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-11" viewBox="0 0 32 32">
                                            <path
                                                d="M23.75 11.044a7.99 7.99 0 0 0-15.5-.009A8 8 0 0 0 9 27h3a1 1 0 0 0 0-2H9a6 6 0 0 1-.035-12 1.038 1.038 0 0 0 1.1-.854 5.991 5.991 0 0 1 11.862 0A1.08 1.08 0 0 0 23 13a6 6 0 0 1 0 12h-3a1 1 0 0 0 0 2h3a8 8 0 0 0 .75-15.956z"
                                                fill="currentColor" />
                                            <path
                                                d="M20.293 19.707a1 1 0 0 0 1.414-1.414l-5-5a1 1 0 0 0-1.414 0l-5 5a1 1 0 0 0 1.414 1.414L15 16.414V29a1 1 0 0 0 2 0V16.414z"
                                                fill="currentColor" />
                                        </svg>
                                    </div>
                                    <span id="file-name-header" class="text-gray-400 text-center">
                                        <strong>Upload Image</strong><br>Only .png, .jpeg, .jpg files are allowed.
                                    </span>
                                    <input type="file" id="image-header" name="image-header" accept=".jpg, .jpeg, .png"
                                        class="hidden" onchange="displayFileNameHeader(this); document.getElementById('file-name-header').style.display = 'none'; document.getElementById('upload-icon-header').style.display = 'none';">
                                    <img id="preview-image-header" class="hidden px-2 w-full h-48 object-contain rounded">
                                </label>
                            </div>

                            <div class="mb-6">
                                <label for="image-footer" class="block text-gray-700 font-medium mb-2">Logo footer</label>
                                <label for="image-footer"
                                    class="block border-2 border-dashed border-gray-300 shadow-sm w-full h-52 rounded cursor-pointer flex flex-col justify-center items-center">
                                    <div id="upload-icon-footer" class="text-gray-500 mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-11" viewBox="0 0 32 32">
                                            <path
                                                d="M23.75 11.044a7.99 7.99 0 0 0-15.5-.009A8 8 0 0 0 9 27h3a1 1 0 0 0 0-2H9a6 6 0 0 1-.035-12 1.038 1.038 0 0 0 1.1-.854 5.991 5.991 0 0 1 11.862 0A1.08 1.08 0 0 0 23 13a6 6 0 0 1 0 12h-3a1 1 0 0 0 0 2h3a8 8 0 0 0 .75-15.956z"
                                                fill="currentColor" />
                                            <path
                                                d="M20.293 19.707a1 1 0 0 0 1.414-1.414l-5-5a1 1 0 0 0-1.414 0l-5 5a1 1 0 0 0 1.414 1.414L15 16.414V29a1 1 0 0 0 2 0V16.414z"
                                                fill="currentColor" />
                                        </svg>
                                    </div>
                                    <span id="file-name-footer" class="text-gray-400 text-center">
                                        <strong>Upload Image</strong><br>Only .png, .jpeg, .jpg files are allowed.
                                    </span>
                                    <input type="file" id="image-footer" name="image-footer" accept=".jpg, .jpeg, .png"
                                        class="hidden" onchange="displayFileNameFooter(this); document.getElementById('file-name-footer').style.display = 'none'; document.getElementById('upload-icon-footer').style.display = 'none';">
                                    <img id="preview-image-footer" class="hidden px-2 w-full h-48 object-contain rounded">
                                </label>
                            </div>

                            <div class="flex justify-end space-x-4">
                                <button type="button" onclick="resetImagePreview()"
                                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none">
                                    Clear
                                </button>
                                <button type="submit"
                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
