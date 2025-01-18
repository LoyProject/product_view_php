
// Reference to the Product Grid Container
fetch('database/fetch_product.php')
    .then(response => response.json())
    .then(data => {
        const products = data;
        const productsPerPage = 5;
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
        

        // Function to navigate to the next or previous page
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

        function updatePaginationHighlight(activePage) {
            const buttons = document.querySelectorAll('#pagination li.page-item');
            buttons.forEach((button, index) => {
                if (index === activePage - 1) {
                    button.classList.remove('bg-gray-100', 'text-gray-800');
                    button.classList.add('bg-red-500', 'text-white');
                } else {
                    button.classList.remove('bg-red-500', 'text-white');
                    button.classList.add('bg-gray-100', 'text-gray-800');
                }
            });
        }

        function setupPagination() {
            const totalPages = Math.ceil(products.length / productsPerPage);
            let paginationHTML = '';

            // Previous page button
            paginationHTML += `
                <li class="page-np flex items-center justify-center shrink-0 border hover:bg-red-500 w-9 h-9 rounded-md"
                    onclick="prevPage();">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-gray-400" viewBox="0 0 55.753 55.753">
                        <path d="M12.745 23.915c.283-.282.59-.52.913-.727L35.266 1.581a5.4 5.4 0 0 1 7.637 7.638L24.294 27.828l18.705 18.706a5.4 5.4 0 0 1-7.636 7.637L13.658 32.464a5.367 5.367 0 0 1-.913-.727 5.367 5.367 0 0 1-1.572-3.911 5.369 5.369 0 0 1 1.572-3.911z" />
                    </svg>
                </li>`;

            if (totalPages <= 5) {
                // Display all page numbers when totalPages <= 5
                for (let i = 1; i <= totalPages; i++) {
                    paginationHTML += `
                        <li class="page-item flex items-center justify-center shrink-0 border hover:bg-red-500 hover:text-white cursor-pointer text-base font-bold px-[13px] h-9 rounded-md ${i === currentPage ? 'bg-red-500 text-white' : 'bg-gray-100 text-gray-800'}"
                            onclick="goToPage(${i});">
                            ${i}
                        </li>`;
                }
            } else {
                // Display limited page numbers with ellipses when totalPages > 5
                paginationHTML += `
                    <li class="page-item flex items-center justify-center shrink-0 border hover:bg-red-500 hover:text-white cursor-pointer text-base font-bold px-[13px] h-9 rounded-md ${1 === currentPage ? 'bg-red-500 text-white' : 'bg-gray-100 text-gray-800'}"
                        onclick="goToPage(1);">
                        1
                    </li>`;

                if (currentPage > 3) {
                    paginationHTML += `<li class="page-item flex items-center justify-center shrink-0 text-base font-bold px-[13px] h-9">...</li>`;
                }

                for (let i = Math.max(2, currentPage - 1); i <= Math.min(totalPages - 1, currentPage + 1); i++) {
                    paginationHTML += `
                        <li class="page-item flex items-center justify-center shrink-0 border hover:bg-red-500 hover:text-white cursor-pointer text-base font-bold px-[13px] h-9 rounded-md ${i === currentPage ? 'bg-red-500 text-white' : 'bg-gray-100 text-gray-800'}"
                            onclick="goToPage(${i});">
                            ${i}
                        </li>`;
                }

                if (currentPage < totalPages - 2) {
                    paginationHTML += `<li class="page-item flex items-center justify-center shrink-0 text-base font-bold px-[13px] h-9">...</li>`;
                }

                paginationHTML += `
                    <li class="page-item flex items-center justify-center shrink-0 border hover:bg-red-500 hover:text-white cursor-pointer text-base font-bold px-[13px] h-9 rounded-md ${totalPages === currentPage ? 'bg-red-500 text-white' : 'bg-gray-100 text-gray-800'}"
                        onclick="goToPage(${totalPages});">
                        ${totalPages}
                    </li>`;
            }

            // Next page button
            paginationHTML += `
                <li class="page-np flex items-center justify-center shrink-0 border hover:bg-red-500 w-9 h-9 rounded-md"
                    onclick="nextPage();">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-gray-400 rotate-180" viewBox="0 0 55.753 55.753">
                        <path d="M12.745 23.915c.283-.282.59-.52.913-.727L35.266 1.581a5.4 5.4 0 0 1 7.637 7.638L24.294 27.828l18.705 18.706a5.4 5.4 0 0 1-7.636 7.637L13.658 32.464a5.367 5.367 0 0 1-.913-.727 5.367 5.367 0 0 1-1.572-3.911 5.369 5.369 0 0 1 1.572-3.911z" />
                    </svg>
                </li>`;

            pagination.innerHTML = paginationHTML;
            updatePaginationHighlight(currentPage);
        }

    })
    .catch(error => {
        console.error('Error fetching products:', error);
    }); 