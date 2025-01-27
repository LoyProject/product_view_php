<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Logo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="../js/script-admin.js"></script>
    <script>
        function handleImageChange(event) {
            const file = event.target.files[0];
            const iconUpload = document.getElementById('upload-icon');
            const previewImage = document.getElementById('preview-image');
            const fileNameSpan = document.getElementById('file-name');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    iconUpload.classList.add('hidden');
                    previewImage.classList.remove('hidden');
                    fileNameSpan.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                iconUpload.classList.remove('hidden');
                previewImage.classList.add('hidden');
                logoImageLabel.classList.remove('hidden');
                fileNameSpan.classList.remove('hidden');
            }
        }

        function clearImage() {
            const iconUpload = document.getElementById('upload-icon');
            const previewImage = document.getElementById('preview-image');
            const fileNameSpan = document.getElementById('file-name');
            const imageInput = document.getElementById('image');

            imageInput.value = '';
            iconUpload.classList.remove('hidden');
            previewImage.classList.add('hidden');
            fileNameSpan.classList.remove('hidden');
        }

        function uploadImage() {
            const imageInput = document.getElementById('image');
            const file = imageInput.files[0];

            if (!file) {
                Swal.fire('No file selected', 'Please select an image file to upload.', 'warning');
                return;
            }

            const formData = new FormData();
            formData.append('image', file);

            axios.post('../database/insert_logo.php', formData, {
                headers: { 'Content-Type': 'multipart/form-data' }
            })
            .then(response => {
                Swal.fire('Success', 'Image uploaded successfully!', 'success');
                clearImage();
            })
            .catch(error => {
                Swal.fire('Error', 'There was an error uploading the image.', 'error');
            });
        }
    </script>
</head>

<body>
    <?php include 'header.php'; ?>
    <?php include '../database/db_connection.php'; ?>

    <div class="relative font-[sans-serif] pt-[70px] h-screen">
        <div class="flex items-start">
            <?php include 'sidebar.php'; ?>
            <div class="main-content w-full overflow-auto p-6">
                <div class="container-xl mx-auto">
                    <div class="item-center">
                        <h2 class="p-4 text-2xl font-bold">Upload Logo</h2>
                        <div class="flex">
                            <label id="lable-image" class="block border-2 border-dashed border-gray-300 shadow-sm w-full h-52 rounded cursor-pointer flex flex-col justify-center items-center">
                                <div id="upload-icon" class="text-gray-500 mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-11" viewBox="0 0 32 32">
                                        <path
                                            d="M23.75 11.044a7.99 7.99 0 0 0-15.5-.009A8 8 0 0 0 9 27h3a1 1 0 0 0 0-2H9a6 6 0 0 1-.035-12 1.038 1.038 0 0 0 1.1-.854 5.991 5.991 0 0 1 11.862 0A1.08 1.08 0 0 0 23 13a6 6 0 0 1 0 12h-3a1 1 0 0 0 0 2h3a8 8 0 0 0 .75-15.956z"
                                            fill="currentColor" />
                                        <path
                                            d="M20.293 19.707a1 1 0 0 0 1.414-1.414l-5-5a1 1 0 0 0-1.414 0l-5 5a1 1 0 0 0 1.414 1.414L15 16.414V29a1 1 0 0 0 2 0V16.414z"
                                            fill="currentColor" />
                                    </svg>
                                </div>
                                <span id="file-name" class="text-gray-400 text-center">
                                    <strong>Upload Image</strong><br>Only .png, .jpeg, .jpg files are allowed.
                                </span>
                                <input type="file" id="image" name="image" accept="image/*" autocomplete="off"
                                    class="hidden" accept=".jpg, .jpeg, .png" required onchange="handleImageChange(event)" />
                                <?php
                                    if ($result = $conn->query("SELECT * FROM logo")) {
                                        $row = $result->fetch_assoc();
                                        echo '<img id="preview-image" class="p-2 w-full h-52 object-contain rounded" src="../images_logo/' . $row['image'] . '" />';
                                        echo '<script>
                                            document.getElementById("upload-icon").classList.add("hidden");
                                            document.getElementById("preview-image").classList.remove("hidden");
                                            document.getElementById("file-name").classList.add("hidden");
                                        </script>';
                                        $conn->close();
                                    }
                                ?>
                            </label>   
                        </div>
                        <div class="flex justify-end mt-4">
                            <button type="button" onclick="clearImage()" class="text-white bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mr-4 rounded focus:outline-none focus:shadow-outline font-[sans-serif]">
                                Clear
                            </button>
                            <button onclick="uploadImage()"
                                class="text-white bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline font-[sans-serif]">
                                Upload
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>