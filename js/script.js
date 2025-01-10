// Note: This file is used for demo purposes only
function Menu(e) {
    let list = document.querySelector('ul');
    e.name === 'menu' ? (e.name = "close", list.classList.add('top-[80px]'), list.classList.add('opacity-100')) : (e.name = "menu", list.classList.remove('top-[80px]'), list.classList.remove('opacity-100'))
}

// Reference to the Product Grid Container
fetch('database/fetch_product.php')
    .then(response => response.json())
    .then(data => {
        const products = data;
        const productsPerPage = 10;
        let currentPage = 1;

        const productGrid = document.getElementById('productGrid');
        const pagination = document.getElementById('pagination');

        if (productGrid) {
            fetchProducts(currentPage);
            setupPagination();
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
                <a href="product-detail.php?id=${product.id}" target="_blank" class="block max-w-sm bg-white rounded-lg shadow-md overflow-hidden transform transition-transform hover:scale-105 hover:border-blue-500 border">
                    <img class="w-full h-80 object-contain" src="images/${product.image}" alt="${product.name}">
                    <div class="p-5">
                        <h2 class="text-xl font-semibold text-gray-800">${product.name}</h2>
                        <p class="text-gray-600 mt-2">${product.description}</p>
                    </div>
                </a>
            `).join('');
            productGrid.innerHTML = productHTML;
        }

        // Function to navigate to a specific page
        window.goToPage = function (page) {
            currentPage = page;
            fetchProducts(page);
            updatePaginationHighlight(page);
        };

        // Function to navigate to the previous page
        window.prevPage = function () {
            if (currentPage > 1) {
                currentPage--;
                fetchProducts(currentPage);
                updatePaginationHighlight(currentPage);
            }
        };

        // Function to navigate to the next page
        window.nextPage = function () {
            const totalPages = Math.ceil(products.length / productsPerPage);
            if (currentPage < totalPages) {
                currentPage++;
                fetchProducts(currentPage);
                updatePaginationHighlight(currentPage);
            }
        };

        // Function to update background color for the active pagination button
        function updatePaginationHighlight(activePage) {
            const buttons = document.querySelectorAll('#pagination li.page-item');
            buttons.forEach((button, index) => {
                if (index === activePage - 1) {
                    button.classList.remove('bg-gray-100', 'text-gray-800');
                    button.classList.add('bg-blue-500', 'text-white');
                } else {
                    button.classList.remove('bg-blue-500', 'text-white');
                    button.classList.add('bg-gray-100', 'text-gray-800');
                }
            });
        }

        // Function to setup pagination buttons
        function setupPagination() {
            const totalPages = Math.ceil(products.length / productsPerPage);
            let paginationHTML = '';

            paginationHTML += `
                <li class="flex items-center justify-center shrink-0 border hover:bg-blue-500 w-9 h-9 rounded-md"
                    onclick="prevPage();">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-gray-400" viewBox="0 0 55.753 55.753">
                        <path d="M12.745 23.915c.283-.282.59-.52.913-.727L35.266 1.581a5.4 5.4 0 0 1 7.637 7.638L24.294 27.828l18.705 18.706a5.4 5.4 0 0 1-7.636 7.637L13.658 32.464a5.367 5.367 0 0 1-.913-.727 5.367 5.367 0 0 1-1.572-3.911 5.369 5.369 0 0 1 1.572-3.911z" />
                    </svg>
                </li>`;

            for (let i = 1; i <= totalPages; i++) {
                paginationHTML += `
                    <li class="page-item flex items-center justify-center shrink-0 border hover:bg-blue-500 hover:text-white cursor-pointer text-base font-bold px-[13px] h-9 rounded-md ${i === currentPage ? 'bg-blue-500 text-white' : 'bg-gray-100 text-gray-800'}"
                        onclick="goToPage(${i});">
                        ${i}
                    </li>`;
            }

            paginationHTML += `
                <li class="flex items-center justify-center shrink-0 border hover:bg-blue-500 w-9 h-9 rounded-md"
                    onclick="nextPage();">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-gray-400 rotate-180" viewBox="0 0 55.753 55.753">
                        <path d="M12.745 23.915c.283-.282.59-.52.913-.727L35.266 1.581a5.4 5.4 0 0 1 7.637 7.638L24.294 27.828l18.705 18.706a5.4 5.4 0 0 1-7.636 7.637L13.658 32.464a5.367 5.367 0 0 1-.913-.727 5.367 5.367 0 0 1-1.572-3.911 5.369 5.369 0 0 1 1.572-3.911z" />
                    </svg>
                </li>`;

            pagination.innerHTML = paginationHTML;

            // Highlight the initial active button
            updatePaginationHighlight(currentPage);
        }
    })
    .catch(error => console.error('Error fetching products:', error));

// Mobile menu toggle function
function onToggleMenu(e) {
    const navLinks = document.querySelector('.nav-links');
    const icon = e.querySelector('ion-icon');
    icon.name = icon.name === 'menu' ? 'close' : 'menu';
    navLinks.classList.toggle('top-[9%]');
}
