
// Note: This file is used for demo purposes only
function Menu(e) {
    let list = document.querySelector('ul');
    e.name === 'menu' ? (e.name = "close", list.classList.add('top-[80px]'), list.classList.add('opacity-100')) : (e.name = "menu", list.classList.remove('top-[80px]'), list.classList.remove('opacity-100'))
}

// Reference to the Product Grid Container
fetch('../database/fetch_product.php')
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
                <a href="product-detail.html?id=${product.id}" class="block max-w-sm bg-white rounded-lg shadow-md overflow-hidden transform transition-transform hover:scale-105">
                    <img class="w-full h-80 object-contain" src="../../public/images/${product.image}" alt="${product.name}">
                    <div class="p-5">
                        <h2 class="text-xl font-semibold text-gray-800">${product.name}</h2>
                        <p class="text-gray-600 mt-2">${product.description}</p>
                    </div>
                </a>
            `).join('');
            productGrid.innerHTML = productHTML;
        }

        // Function to navigate to the next or previous page
        function goToPage(page) {
            currentPage = page;
            fetchProducts(page);
        }

        // Function to navigate to the next or previous page
        function prevPage() {
            if (currentPage > 1) {
                currentPage--;
                fetchProducts(currentPage);
            }
        }

        // Function to navigate to the next or previous page
        function nextPage() {
            if (currentPage * productsPerPage < products.length) {
                currentPage++;
                fetchProducts(currentPage);
            }
        }
    })
    .catch(error => console.error('Error fetching products:', error));

// Reference to the Product Grid Container
// const productsPerPage = 8;
// let currentPage = 1;


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
        <a href="product-detail.html?id=${product.id}" class="block max-w-sm bg-white rounded-lg shadow-md overflow-hidden transform transition-transform hover:scale-105">
            <img class="w-full h-80 object-contain" src="${product.image}" alt="${product.title}">
            <div class="p-5">
                <h2 class="text-xl font-semibold text-gray-800">${product.title}</h2>
                <p class="text-gray-600 mt-2">${product.description}</p>
            </div>
        </a>
    `).join('');
    productGrid.innerHTML = productHTML;
}

// Function to navigate to the next or previous page
function goToPage(page) {
    currentPage = page;
    fetchProducts(page);
}

// Function to navigate to the next or previous page
function prevPage() {
    if (currentPage > 1) {
        currentPage--;
        fetchProducts(currentPage);
    }
}

// Function to navigate to the next or previous page
function nextPage() {
    if (currentPage * productsPerPage < products.length) {
        currentPage++;
        fetchProducts(currentPage);
    }
}

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
    const product = products.find(p => p.id === productId);

    // If product is found, update the product detail page
    if (product) {
        const productTitle = document.getElementById('productTitle');
        const productDescription = document.getElementById('productDescription');
        const productImage = document.getElementById('productImage');
        if (productTitle) productTitle.textContent = product.title;
        if (productDescription) productDescription.textContent = product.description;
        if (productImage) productImage.src = product.image;
    } else {
        const productDetail = document.getElementById('productDetail');
        if (productDetail) productDetail.innerHTML = '<p>Product not found.</p>';
    }
});

//const modal = document.getElementById('contactModal');
function toggleModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.toggle('hidden');
}

// Close the modal when the user clicks outside of the modal
document.querySelector('a[href="#contact"]').addEventListener('click', function(event) {
    event.preventDefault();
    toggleModal('contactModal');
});

// Mobile menu toggle function
function onToggleMenu(e) {
    const navLinks = document.querySelector('.nav-links');
    const icon = e.querySelector('ion-icon');
    icon.name = icon.name === 'menu' ? 'close' : 'menu';
    navLinks.classList.toggle('top-[9%]');
}