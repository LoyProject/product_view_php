
// Reference to the Product Grid Container
fetch('databassss/fetch_product.php')
    .then(response => response.json())
    .then(data => {
        const products = data;
        const productsPerPage = 8;
        let currentPage = 1;

        const productGrid = document.getElementById('productGrid');
        if (productGrid) {
            fetchProducts(currentPage);
        }

        // Function to fetch products based on the current page
        function fetchProducts(page) {
            const start = (page - 1) * productsPerPage;
            const end = start + productsPerPage;
            const paginatedProducts = products.slice(start, end);

            if (paginatedProducts.length > 0) {
                displayProducts(paginatedProducts);
            } else {
                productGrid.innerHTML = '<p>No products available.</p>';
            }
        }

        // Function to display products in the grid
        function displayProducts(products) {
            const productHTML = products.map(product => `
                <a href="client_site_views/product-detail.php?id=${product.id}" target="_blank" class="block max-w-sm bg-white rounded-lg shadow-md overflow-hidden transform transition-transform hover:scale-105">
                    <img class="w-full h-80 object-contain" src="../images/${product.image}" alt="${product.name}">
                    <div class="p-5">
                        <h2 class="text-xl font-semibold text-gray-800">${product.name}</h2>
                        <p class="text-gray-600 mt-2">${product.description}</p>
                    </div>
                </a>
            `).join('');
            productGrid.innerHTML = productHTML;
        }

        // Function to navigate to the next or previous page
        window.goToPage = function(page) {
            currentPage = page;
            fetchProducts(page);
        }

        // Function to navigate to the previous page
        window.prevPage = function() {
            if (currentPage > 1) {
                goToPage(currentPage - 1);
            }
        }

        // Function to navigate to the next page
        window.nextPage = function() {
            if (currentPage * productsPerPage < products.length) {
                goToPage(currentPage + 1);
            }
        }

        // Function to change background color of pagination buttons
        window.changeBgColor = function(element) {
            const paginationButtons = document.querySelectorAll('#pagination li');
            paginationButtons.forEach(button => button.classList.remove('bg-blue-500', 'text-white'));
            element.classList.add('bg-blue-500', 'text-white');
        }
    })
    .catch(error => {
        console.error('Error fetching products:', error);
    });

// Function to Fetch Product ID from URL
function getProductId() { 
    const params = new URLSearchParams(window.location.search);
    return parseInt(params.get('id'), 10);
}

// Function to Fetch Product Details
function changeBgColor(element) {
    // Reset background color for all pagination buttons
    const buttons = document.querySelectorAll('#pagination li');
    buttons.forEach(button => {
        button.classList.remove('bg-blue-500', 'text-white');
        button.classList.add('bg-gray-100', 'text-gray-800');
    });

    // Set background color for the clicked button
    element.classList.remove('bg-gray-100', 'text-gray-800');
    element.classList.add('bg-blue-500', 'text-white');
}

document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const productId = parseInt(urlParams.get('id'));

    fetch('database/fetch_product.php')
        .then(response => response.json())
        .then(data => {
            const product = data.find(p => p.id === productId);

            // If product is found, update the product detail page
            if (product) {
                const productTitle = document.getElementById('productTitle');
                const productDescription = document.getElementById('productDescription');
                const productImage = document.getElementById('productImage');
                if (productTitle) productTitle.textContent = product.name;
                if (productDescription) productDescription.textContent = product.description;
                if (productImage) productImage.src = `images/${product.image}`;
            } else {
                const productDetail = document.getElementById('productDetail');
                if (productDetail) productDetail.innerHTML = '<p>Product not found.</p>';
            }
        })
        .catch(error => console.error('Error fetching product:', error));
});

//const modal = document.getElementById('contactModal');
function toggleModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.toggle('hidden');
}

// Close the modal when the user clicks outside of the modal
const contactLink = document.querySelector('a[href="#contact"]');
if (contactLink) {
    contactLink.addEventListener('click', function(event) {
        event.preventDefault();
        toggleModal('contactModal');
    });
}