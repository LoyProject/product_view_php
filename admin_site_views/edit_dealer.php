<?php
    include '../database/db_connection.php';

    $dealerId = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($dealerId > 0) {
        $sql = "SELECT name, contact, address, map, image FROM dealers WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $dealerId);
        $stmt->execute();
        $stmt->bind_result($name, $contact, $address, $map, $image);
        $stmt->fetch();
        $stmt->close();
    } else {
        die("Invalid dealer ID.");
    }

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dealer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('name').value = "<?php echo $name; ?>";
            document.getElementById('contact').value = "<?php echo $contact; ?>";
            document.getElementById('address').value = "<?php echo $address; ?>";
            document.getElementById('map').value = "<?php echo $map; ?>";

            const previewImage = document.getElementById('preview-image');
            if ("<?php echo $image; ?>") {
                previewImage.src = "../images_dealer/<?php echo $image; ?>";
                previewImage.classList.remove('hidden');
                document.getElementById('file-name').style.display = 'none'; 
                document.getElementById('upload-icon').style.display = 'none';
            }
        });

        function displayFileName(input) {
            const file = input.files[0];
            const previewImage = document.getElementById('preview-image');

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                    previewImage.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        }

        function editDealer(event) {
            event.preventDefault();

            const formData = new FormData(document.getElementById('editDealerForm'));
            formData.append('id', "<?php echo $dealerId; ?>");

            Swal.fire({
                title: 'Updating Dealer...',
                text: 'Please wait while the dealer is being updated.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            axios.post('../database/update_dealer.php', formData)
                .then(response => {
                    Swal.close();
                    Swal.fire({
                        icon: 'success',
                        title: 'Dealer Updated',
                        text: response.data.message,
                    }).then(() => {
                        window.location.href = '../admin_site_views/dealer.php';
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

        function resetImagePreview() {
            const previewImage = document.getElementById('preview-image');
            const fileNameLabel = document.getElementById('file-name');
            const uploadIcon = document.getElementById('upload-icon');

            document.getElementById('editDealerForm').reset();
            previewImage.classList.add('hidden');
            fileNameLabel.style.display = 'block';
            uploadIcon.style.display = 'block';
        }
    </script>
</head>

<body>
    <?php include 'header.php'; ?>

    <div class="relative font-sans pt-[70px] min-h-screen">
        <div class="flex items-start">
            <?php include 'sidebar.php'; ?>

            <div class="main-content w-full overflow-auto p-6">
                <div class="container mx-auto">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Edit Dealer</h2>
                        <a href="dealer.php">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none">
                                Back
                            </button>
                        </a>
                    </div>

                    <form id="editDealerForm" onsubmit="editDealer(event)">
                        <div class="mb-6">
                            <label for="name" class="block text-gray-700 font-medium mb-2">Dealer Name</label>
                            <input type="text" id="name" name="name" required autocomplete="off"
                                class="w-full border border-gray-300 shadow-sm px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                        </div>

                        <div class="mb-6">
                            <label for="contact" class="block text-gray-700 font-medium mb-2">Phone Number</label>
                            <input type="tel" id="contact" name="contact" required autocomplete="off"
                                class="w-full border border-gray-300 shadow-sm px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                        </div>

                        <div class="mb-6">
                            <label for="address" class="block text-gray-700 font-medium mb-2">Address</label>
                            <textarea id="address" name="address" required autocomplete="off"
                                class="w-full border border-gray-300 shadow-sm px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500"></textarea>
                        </div>

                        <div class="mb-6">
                            <label for="map" class="block text-gray-700 font-medium mb-2">Google Map Link</label>
                            <textarea id="map" name="map" required autocomplete="off"
                                class="w-full border border-gray-300 shadow-sm px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500"></textarea>
                        </div>

                        <div class="mb-6">
                            <label for="image" class="block text-gray-700 font-medium mb-2">Image</label>
                            <label for="image"
                                class="block border-2 border-dashed border-gray-300 shadow-sm w-full h-52 rounded cursor-pointer flex flex-col justify-center items-center">
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
                                <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png"
                                    class="hidden" onchange="displayFileName(this); document.getElementById('file-name').style.display = 'none'; document.getElementById('upload-icon').style.display = 'none';">
                                <img id="preview-image" class="hidden px-2 w-full h-48 object-contain rounded">
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
</body>

</html>
