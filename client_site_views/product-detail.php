<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Product Detail</title>
</head>
<body>
<nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
        </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button
                    data-collapse-toggle="navbar-sticky"
                    type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-sticky"
                    aria-expanded="false"
                    onclick="toggleMenu()">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                    <ul id="menu-list" class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="#" class="block py-2 px-3 text-red-500 rounded rounded hover:text-red-500 md:p-0 dark:text-white dark:hover:text-red-500" aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:text-red-500 md:p-0 dark:text-white dark:hover:text-red-500">Dealer</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:text-red-500 md:p-0 dark:text-white dark:hover:text-red-500">Services</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:text-red-500 md:p-0 dark:text-white dark:hover:text-red-500">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <!-- <?php
    
        $servername = "220.158.232.172";
        $username = "product_mh01";
        $password = "cL6sC3iRnWc3APyK";
        $dbname = "product_mh01";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $product_id = intval($_GET['id']);
            $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
            $stmt->bind_param("i", $product_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<p>Name: " . htmlspecialchars($row["name"]) . "</p>";
                    echo "<p>Description: " . htmlspecialchars($row["description"]) . "</p>";
                    echo "<img src='../images/" . htmlspecialchars($row["image"]) . "' alt='Product Image' width='200' height='300'>";
                }
            } else {
                echo "<p>No results found for the specified product.</p>";
            }
            $stmt->close();
        } else {
            echo "<p>Invalid product ID.</p>";
        }

        $conn->close();
    ?> -->

<div class="font-sans tracking-wide max-md:mx-auto">
      <div class="bg-gradient-to-r from-gray-600 via-gray-900 to-gray-900 md:min-h-[350px] grid items-start grid-cols-1 lg:grid-cols-5 md:grid-cols-2">

        <div class="lg:col-span-3 h-full p-6">
          <div class="relative h-full flex items-center justify-center lg:min-h-[580px]">
            <img src="https://readymadeui.com/images/watch6.webp" alt="Product" class="lg:w-3/5 w-3/4 aspect-[511/580] object-contain max-lg:p-8" />

            <div class="flex space-x-4 items-end absolute right-0 max-md:right-4 bottom-0">
              <div class="bg-white w-9 h-9 grid items-center justify-center rounded-full rotate-90 shrink-0 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-[#333] inline" viewBox="0 0 24 24">
                  <path fill-rule="evenodd" d="M11.99997 18.1669a2.38 2.38 0 0 1-1.68266-.69733l-9.52-9.52a2.38 2.38 0 1 1 3.36532-3.36532l7.83734 7.83734 7.83734-7.83734a2.38 2.38 0 1 1 3.36532 3.36532l-9.52 9.52a2.38 2.38 0 0 1-1.68266.69734z" clip-rule="evenodd" data-original="#000000"></path>
                </svg>
              </div>
              <div class="bg-[#333] w-9 h-9 grid items-center justify-center rounded-full -rotate-90 shrink-0 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-[#fff] inline" viewBox="0 0 24 24">
                  <path fill-rule="evenodd" d="M11.99997 18.1669a2.38 2.38 0 0 1-1.68266-.69733l-9.52-9.52a2.38 2.38 0 1 1 3.36532-3.36532l7.83734 7.83734 7.83734-7.83734a2.38 2.38 0 1 1 3.36532 3.36532l-9.52 9.52a2.38 2.38 0 0 1-1.68266.69734z" clip-rule="evenodd" data-original="#000000"></path>
                </svg>
              </div>
            </div>
          </div>
        </div>

        <div class="lg:col-span-2 bg-gray-100 py-6 px-8 h-full">
          <div>
            <h2 class="text-xl font-bold text-gray-800">Smart Watch Timex</h2>

            <div class="flex space-x-1 mt-2">
              <svg class="w-4 h-4 fill-gray-800" viewBox="0 0 14 13" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
              </svg>
              <svg class="w-4 h-4 fill-gray-800" viewBox="0 0 14 13" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
              </svg>
              <svg class="w-4 h-4 fill-gray-800" viewBox="0 0 14 13" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
              </svg>
              <svg class="w-4 h-4 fill-gray-800" viewBox="0 0 14 13" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
              </svg>
              <svg class="w-4 h-4 fill-[#CED5D8]" viewBox="0 0 14 13" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
              </svg>
            </div>
          </div>

          <div class="mt-6">
            <h3 class="text-lg font-bold text-gray-800">Price</h3>
            <p class="text-gray-800 text-3xl font-bold mt-2">$130</p>
          </div>

          <div class="mt-6">
            <h3 class="text-lg font-bold text-gray-800">Choose a Color</h3>
            <div class="flex flex-wrap gap-2 mt-2">
              <button type="button" class="w-10 h-10 bg-black border-2 border-white hover:border-gray-800 rounded-full shrink-0"></button>
              <button type="button" class="w-10 h-10 bg-gray-400 border-2 border-white hover:border-gray-800 rounded-full shrink-0"></button>
              <button type="button" class="w-10 h-10 bg-orange-400 border-2 border-white hover:border-gray-800 rounded-full shrink-0"></button>
              <button type="button" class="w-10 h-10 bg-red-400 border-2 border-white hover:border-gray-800 rounded-full shrink-0"></button>
            </div>
          </div>

          <div class="mt-6">
            <h3 class="text-lg font-bold text-gray-800">Quantity</h3>
            <div class="flex divide-x border w-max mt-2 rounded overflow-hidden">
              <button type="button" class="bg-gray-100 w-10 h-9 font-semibold flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-current inline" viewBox="0 0 124 124">
                  <path d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z" data-original="#000000"></path>
                </svg>
              </button>
              <div class="w-10 h-9 font-semibold flex items-center justify-center text-gray-800 text-lg">
                1
              </div>
              <button type="button" class="bg-gray-800 text-white w-10 h-9 font-semibold flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-current inline" viewBox="0 0 42 42">
                  <path d="M37.059 16H26V4.941C26 2.224 23.718 0 21 0s-5 2.224-5 4.941V16H4.941C2.224 16 0 18.282 0 21s2.224 5 4.941 5H16v11.059C16 39.776 18.282 42 21 42s5-2.224 5-4.941V26h11.059C39.776 26 42 23.718 42 21s-2.224-5-4.941-5z" data-original="#000000"></path>
                </svg>
              </button>
            </div>
          </div>

          <div class="flex gap-4 mt-6">
            <button type="button" class="w-full max-w-[200px] px-4 py-3 bg-gray-800 hover:bg-gray-900 text-white text-sm font-semibold rounded">Buy now</button>
            <button type="button" class="w-full max-w-[200px] px-4 py-2.5 border border-gray-800 bg-transparent hover:bg-gray-50 text-gray-800 text-sm font-semibold rounded">Add to cart</button>
          </div>

          <div class="flex flex-wrap items-center text-sm text-gray-800 mt-8">
            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-6 mr-3" viewBox="0 0 48 48">
              <path d="M15.5 33.3h19.1v2H15.5z" data-original="#000000" />
              <path d="M45.2 35.3H43v-2h2.2c.4 0 .8-.4.8-.8v-9.1c0-.4-.3-.6-.5-.7l-3.2-1.3c-.3-.2-.8-.5-1.1-1l-6.5-10c-.1-.2-.4-.3-.7-.3H2.8c-.4 0-.8.4-.8.8v21.6c0 .4.4.8.8.8h3.9v2H2.8C1.3 35.3 0 34 0 32.5V10.9c0-1.5 1.3-2.8 2.8-2.8h31.3c1 0 1.9.5 2.4 1.3l6.5 10 .4.4 2.9 1.2c1.1.5 1.7 1.4 1.7 2.5v9.1c0 1.4-1.3 2.7-2.8 2.7z" data-original="#000000" />
              <path d="M26.5 21H3.9v-9.4h22.6zM5.9 19h18.6v-5.4H5.9zm32.9 2H27.9v-9.4h6.3zm-8.9-2h5.7L33 13.6h-3.1zm-19 20.9c-3.1 0-5.6-2.5-5.6-5.6s2.5-5.6 5.6-5.6 5.6 2.5 5.6 5.6-2.5 5.6-5.6 5.6zm0-9.2c-2 0-3.6 1.6-3.6 3.6s1.6 3.6 3.6 3.6 3.6-1.6 3.6-3.6-1.6-3.6-3.6-3.6zm27.9 9.2c-3.1 0-5.6-2.5-5.6-5.6s2.5-5.6 5.6-5.6 5.6 2.5 5.6 5.6-2.5 5.6-5.6 5.6zm0-9.2c-2 0-3.6 1.6-3.6 3.6s1.6 3.6 3.6 3.6 3.6-1.6 3.6-3.6-1.6-3.6-3.6-3.6z" data-original="#000000" />
            </svg>
            Free delivery on order $100
          </div>
        </div>
      </div>

      <div class="lg:mt-12 mt-6 max-w-2xl px-6">
        <h3 class="text-lg font-bold text-gray-800">Smartwatch Features</h3>

        <ul class="grid sm:grid-cols-2 gap-3 mt-4">
          <li class="flex items-center text-sm text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" width="17" class="mr-4 bg-green-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
              <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
            </svg>
            Fitness Tracking
          </li>
          <li class="flex items-center text-sm text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" width="17" class="mr-4 bg-green-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
              <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
            </svg>
            Heart Rate Monitoring
          </li>
          <li class="flex items-center text-sm text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" width="17" class="mr-4 bg-green-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
              <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
            </svg>
            Sleep Tracking
          </li>
          <li class="flex items-center text-sm text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" width="17" class="mr-4 bg-green-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
              <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
            </svg>
            Waterproof Design
          </li>
          <li class="flex items-center text-sm text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" width="17" class="mr-4 bg-green-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
              <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
            </svg>
            Notifications
          </li>
          <li class="flex items-center text-sm text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" width="17" class="mr-4 bg-green-500 fill-white rounded-full p-[3px]" viewBox="0 0 24 24">
              <path d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z" data-original="#000000" />
            </svg>
            Touchscreen Interface
          </li>
        </ul>

        <div class="mt-6">
          <h3 class="text-lg font-bold text-gray-800">Product Description</h3>
          <p class="text-sm text-gray-600 mt-4">Enhance your daily routine with our advanced smartwatch. Featuring fitness tracking capabilities, heart rate monitoring, sleep tracking, and a waterproof design, this smartwatch is designed to keep up with your active lifestyle. Receive notifications and stay connected with its touchscreen interface, offering convenience at your fingertips. Upgrade to a smarter way of living with this essential accessory.</p>
        </div>
      </div>
    </div>
        <footer class="font-sans tracking-wide bg-black text-white px-10 pt-12 pb-6">
            <div class="flex flex-wrap justify-between gap-10">
                <div class="max-w-md">
                    <a href='javascript:void(0)'>
                        <img src="https://readymadeui.com/readymadeui.svg" alt="logo" class='w-36' />
                    </a>
                    <div class="mt-6">
                        <p class="leading-relaxed text-sm">ReadymadeUI is a library of pre-designed UI components built for Tailwind CSS. It offers a collection of versatile, ready-to-use components that streamline the development process by providing a wide range of UI elements.</p>
                    </div>
                </div>

                <div class="max-lg:min-w-[140px]">
                    <h4 class="font-semibold text-base relative max-sm:cursor-pointer">Services</h4>

                    <ul class="mt-6 space-y-4">
                        <li>
                            <a href='javascript:void(0)' class='hover:text-red-500 text-sm'>Web Development</a>
                        </li>
                        <li>
                            <a href='javascript:void(0)' class='hover:text-red-500 text-sm'>Pricing</a>
                        </li>
                        <li>
                            <a href='javascript:void(0)' class='hover:text-red-500 text-sm'>Support</a>
                        </li>
                        <li>
                            <a href='javascript:void(0)' class='hover:text-red-500 text-sm'>Client Portal</a>
                        </li>
                        <li>
                            <a href='javascript:void(0)' class='hover:text-red-500 text-sm'>Resources</a>
                        </li>
                    </ul>
                </div>

                <div class="max-lg:min-w-[140px]">
                    <h4 class="font-semibold text-base relative max-sm:cursor-pointer">Company</h4>
                    <ul class="space-y-4 mt-6">
                    <li>
                        <a href='javascript:void(0)' class='hover:text-red-500 text-sm'>About us</a>
                    </li>
                    <li>
                        <a href='javascript:void(0)' class='hover:text-red-500 text-sm'>Careers</a>
                    </li>
                    <li>
                        <a href='javascript:void(0)' class='hover:text-red-500 text-sm'>Blog</a>
                    </li>
                    <li>
                        <a href='javascript:void(0)' class='hover:text-red-500 text-sm'>Portfolio</a>
                    </li>
                    <li>
                        <a href='javascript:void(0)' class='hover:text-red-500 text-sm'>Events</a>
                    </li>
                    </ul>
                </div>

                <div class="max-lg:min-w-[140px]">
                    <h4 class="font-semibold text-base relative max-sm:cursor-pointer">Additional</h4>

                    <ul class="space-y-4 mt-6">
                    <li>
                        <a href='javascript:void(0)' class='hover:text-red-500 text-sm'>FAQ</a>
                    </li>
                    <li>
                        <a href='javascript:void(0)' class='hover:text-red-500 text-sm'>Partners</a>
                    </li>
                    <li>
                        <a href='javascript:void(0)' class='hover:text-red-500 text-sm'>Sitemap</a>
                    </li>
                    <li>
                        <a href='javascript:void(0)' class='hover:text-red-500 text-sm'>Contact</a>
                    </li>
                    <li>
                        <a href='javascript:void(0)' class='hover:text-red-500 text-sm'>News</a>
                    </li>
                    </ul>
                </div>
            </div>

            <hr class="mt-10 mb-6 border-gray-300" />

            <div class="flex flex-wrap max-md:flex-col gap-4">
                <ul class="md:flex md:space-x-6 max-md:space-y-2">
                <li>
                    <a href='javascript:void(0)' class='hover:text-white text-sm'>Terms of Service</a>
                </li>
                <li>
                    <a href='javascript:void(0)' class='hover:text-white text-sm'>Privacy Policy</a>
                </li>
                <li>
                    <a href='javascript:void(0)' class='hover:text-white text-sm'>Security</a>
                </li>
                </ul>
                <p class='text-sm md:ml-auto'>© 2025 Power by Loy Team. All rights reserved.</p>
            </div>
        </footer>
</body>
</html>