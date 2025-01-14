<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Product Detail</title>
</head>
<body class="bg-gray-100 white:bg-gray-900">
<script src="js/script.js"></script>
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
            <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:text-red-500 md:p-0 dark:text-white dark:hover:text-red-500">Home</a>
          </li>
          <li>
            <a href="#" class="block py-2 px-3 text-red-500 rounded rounded hover:text-red-500 md:p-0 dark:text-white dark:hover:text-red-500" aria-current="page">Dealer</a>
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
  <div class="mt-20"></div>

  <div class="container mx-auto">
    <div class="sm:px-10 lg:px-20 flex flex-col justify-start">
      <div class="font-sans tracking-wide max-md:mx-auto">
        <div class="bg-white md:min-h-[250px] grid items-start grid-cols-1 lg:grid-cols-5 md:grid-cols-2">
          <div class="lg:col-span-3 h-full p-6">
            <div class="relative h-full flex items-center justify-center lg:min-h-[480px]">
              <img src="https://readymadeui.com/images/watch6.webp" alt="Product" class="lg:w-2/5 w-2/4 aspect-[511/580] object-contain max-lg:p-8" />
            </div>
          </div>

          <div class="lg:col-span-2 bg-gray-100 py-6 px-8 h-full">
            <div>
                <h1 class="text-xl font-bold text-gray-800 font-sans">Smart Watch Timex</h1>
            </div>
            <div class="mt-6">
              <p class="text-sm text-gray-600 mt-4">Enhance your daily routine with our advanced smartwatch. Featuring fitness tracking capabilities, heart rate monitoring, sleep tracking, and a waterproof design, this smartwatch is designed to keep up with your active lifestyle. Receive notifications and stay connected with its touchscreen interface, offering convenience at your fingertips. Upgrade to a smarter way of living with this essential accessory.</p>
            </div>
            <div class="flex gap-4 mt-6">
              <button type="button" class="w-full max-w-[200px] px-4 py-3 bg-gray-800 hover:bg-gray-900 text-white text-sm font-semibold rounded">Back to Product List</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="mt-20"></div>
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