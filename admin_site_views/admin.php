<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <?php
    include '../database/db_connection.php';
    ?>
    <script src="../js/script-admin.js"></script>
    <div class="relative font-[sans-serif] pt-[70px] h-screen">
        <header class='flex shadow-md py-1 px-4 sm:px-7 bg-white min-h-[70px] tracking-wide z-[110] fixed top-0 w-full'>
      <div class='flex flex-wrap items-center justify-between gap-4 w-full relative'>
        <a href="javascript:void(0)"><img src="https://readymadeui.com/readymadeui.svg" alt="logo" class='w-36' />
        </a>
  
        <div id="collapseMenu"
          class='max-lg:hidden lg:!block max-lg:before:fixed max-lg:before:bg-black max-lg:before:opacity-50 max-lg:before:inset-0 max-lg:before:z-50'>
          <button id="toggleClose" class='lg:hidden fixed top-2 right-4 z-[100] rounded-full bg-white p-3'>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-black" viewBox="0 0 320.591 320.591">
              <path
                d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
                data-original="#000000"></path>
              <path
                d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
                data-original="#000000"></path>
            </svg>
          </button>
  
          <div
            class="max-lg:fixed max-lg:bg-white max-lg:w-1/2 max-lg:min-w-[300px] max-lg:top-0 max-lg:left-0 max-lg:p-6 max-lg:h-full max-lg:shadow-md max-lg:overflow-auto z-50">
            <div class='flex items-center max-lg:flex-col-reverse max-lg:ml-auto gap-8'>
              <div
                class='flex w-full bg-gray-100 px-4 py-2.5 rounded outline-none border focus-within:border-blue-600 focus-within:bg-transparent transition-all'>
                <input type='text' placeholder='Search something...'
                  class='w-full text-sm bg-transparent rounded outline-none pr-2' />
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192.904 192.904" width="16px"
                  class="cursor-pointer fill-gray-400">
                  <path
                    d="m190.707 180.101-47.078-47.077c11.702-14.072 18.752-32.142 18.752-51.831C162.381 36.423 125.959 0 81.191 0 36.422 0 0 36.423 0 81.193c0 44.767 36.422 81.187 81.191 81.187 19.688 0 37.759-7.049 51.831-18.751l47.079 47.078a7.474 7.474 0 0 0 5.303 2.197 7.498 7.498 0 0 0 5.303-12.803zM15 81.193C15 44.694 44.693 15 81.191 15c36.497 0 66.189 29.694 66.189 66.193 0 36.496-29.692 66.187-66.189 66.187C44.693 147.38 15 117.689 15 81.193z">
                  </path>
                </svg>
              </div>
              <div class='flex items-center space-x-6 max-lg:flex-wrap'>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cursor-pointer fill-[#333] hover:fill-[#077bff]"
                  viewBox="0 0 511 511.999">
                  <path
                    d="M498.7 222.695c-.016-.011-.028-.027-.04-.039L289.805 13.81C280.902 4.902 269.066 0 256.477 0c-12.59 0-24.426 4.902-33.332 13.809L14.398 222.55c-.07.07-.144.144-.21.215-18.282 18.386-18.25 48.218.09 66.558 8.378 8.383 19.44 13.235 31.273 13.746.484.047.969.07 1.457.07h8.32v153.696c0 30.418 24.75 55.164 55.168 55.164h81.711c8.285 0 15-6.719 15-15V376.5c0-13.879 11.293-25.168 25.172-25.168h48.195c13.88 0 25.168 11.29 25.168 25.168V497c0 8.281 6.715 15 15 15h81.711c30.422 0 55.168-24.746 55.168-55.164V303.14h7.719c12.586 0 24.422-4.903 33.332-13.813 18.36-18.367 18.367-48.254.027-66.633zm-21.243 45.422a17.03 17.03 0 0 1-12.117 5.024h-22.72c-8.285 0-15 6.714-15 15v168.695c0 13.875-11.289 25.164-25.168 25.164h-66.71V376.5c0-30.418-24.747-55.168-55.169-55.168H232.38c-30.422 0-55.172 24.75-55.172 55.168V482h-66.71c-13.876 0-25.169-11.29-25.169-25.164V288.14c0-8.286-6.715-15-15-15H48a13.9 13.9 0 0 0-.703-.032c-4.469-.078-8.66-1.851-11.8-4.996-6.68-6.68-6.68-17.55 0-24.234.003 0 .003-.004.007-.008l.012-.012L244.363 35.02A17.003 17.003 0 0 1 256.477 30c4.574 0 8.875 1.781 12.113 5.02l208.8 208.796.098.094c6.645 6.692 6.633 17.54-.031 24.207zm0 0"
                    data-original="#000000" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cursor-pointer fill-[#333] hover:fill-[#077bff]"
                  viewBox="0 0 371.263 371.263">
                  <path
                    d="M305.402 234.794v-70.54c0-52.396-33.533-98.085-79.702-115.151.539-2.695.838-5.449.838-8.204C226.539 18.324 208.215 0 185.64 0s-40.899 18.324-40.899 40.899c0 2.695.299 5.389.778 7.964-15.868 5.629-30.539 14.551-43.054 26.647-23.593 22.755-36.587 53.354-36.587 86.169v73.115c0 2.575-2.096 4.731-4.731 4.731-22.096 0-40.959 16.647-42.995 37.845-1.138 11.797 2.755 23.533 10.719 32.276 7.904 8.683 19.222 13.713 31.018 13.713h72.217c2.994 26.887 25.869 47.905 53.534 47.905s50.54-21.018 53.534-47.905h72.217c11.797 0 23.114-5.03 31.018-13.713 7.904-8.743 11.797-20.479 10.719-32.276-2.036-21.198-20.958-37.845-42.995-37.845a4.704 4.704 0 0 1-4.731-4.731zM185.64 23.952c9.341 0 16.946 7.605 16.946 16.946 0 .778-.12 1.497-.24 2.275-4.072-.599-8.204-1.018-12.336-1.138-7.126-.24-14.132.24-21.078 1.198-.12-.778-.24-1.497-.24-2.275.002-9.401 7.607-17.006 16.948-17.006zm0 323.358c-14.431 0-26.527-10.3-29.342-23.952h58.683c-2.813 13.653-14.909 23.952-29.341 23.952zm143.655-67.665c.479 5.15-1.138 10.12-4.551 13.892-3.533 3.773-8.204 5.868-13.353 5.868H59.89c-5.15 0-9.82-2.096-13.294-5.868-3.473-3.772-5.09-8.743-4.611-13.892.838-9.042 9.282-16.168 19.162-16.168 15.809 0 28.683-12.874 28.683-28.683v-73.115c0-26.228 10.419-50.719 29.282-68.923 18.024-17.425 41.498-26.887 66.528-26.887 1.198 0 2.335 0 3.533.06 50.839 1.796 92.277 45.929 92.277 98.325v70.54c0 15.809 12.874 28.683 28.683 28.683 9.88 0 18.264 7.126 19.162 16.168z"
                    data-original="#000000" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cursor-pointer fill-[#333] hover:fill-[#077bff]"
                  viewBox="0 0 24 24">
                  <path
                    d="M18 2c2.206 0 4 1.794 4 4v12c0 2.206-1.794 4-4 4H6c-2.206 0-4-1.794-4-4V6c0-2.206 1.794-4 4-4zm0-2H6a6 6 0 0 0-6 6v12a6 6 0 0 0 6 6h12a6 6 0 0 0 6-6V6a6 6 0 0 0-6-6z"
                    data-original="#000000" />
                  <path d="M12 18a1 1 0 0 1-1-1V7a1 1 0 0 1 2 0v10a1 1 0 0 1-1 1z" data-original="#000000" />
                  <path d="M6 12a1 1 0 0 1 1-1h10a1 1 0 0 1 0 2H7a1 1 0 0 1-1-1z" data-original="#000000" />
                </svg>
              </div>

              <div class="dropdown-menu relative flex shrink-0 group">
                <img src="https://readymadeui.com/team-1.webp" alt="profile-pic"
                  class="w-9 h-9 max-lg:w-16 max-lg:h-16 rounded-full border-2 border-gray-300 cursor-pointer" />
  
                <div
                  class="dropdown-content hidden group-hover:block shadow-md p-2 bg-white rounded-md absolute top-9 right-0 w-56">
                  <div class="w-full">
                    <a href="javascript:void(0)"
                      class="text-sm text-gray-800 cursor-pointer flex items-center p-2 rounded-md hover:bg-gray-100 dropdown-item transition duration-300 ease-in-out">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-3 fill-current"
                        viewBox="0 0 512 512">
                        <path
                          d="M437.02 74.98C388.668 26.63 324.379 0 256 0S123.332 26.629 74.98 74.98C26.63 123.332 0 187.621 0 256s26.629 132.668 74.98 181.02C123.332 485.37 187.621 512 256 512s132.668-26.629 181.02-74.98C485.37 388.668 512 324.379 512 256s-26.629-132.668-74.98-181.02zM111.105 429.297c8.454-72.735 70.989-128.89 144.895-128.89 38.96 0 75.598 15.179 103.156 42.734 23.281 23.285 37.965 53.687 41.742 86.152C361.641 462.172 311.094 482 256 482s-105.637-19.824-144.895-52.703zM256 269.507c-42.871 0-77.754-34.882-77.754-77.753C178.246 148.879 213.13 114 256 114s77.754 34.879 77.754 77.754c0 42.871-34.883 77.754-77.754 77.754zm170.719 134.427a175.9 175.9 0 0 0-46.352-82.004c-18.437-18.438-40.25-32.27-64.039-40.938 28.598-19.394 47.426-52.16 47.426-89.238C363.754 132.34 315.414 84 256 84s-107.754 48.34-107.754 107.754c0 37.098 18.844 69.875 47.465 89.266-21.887 7.976-42.14 20.308-59.566 36.542-25.235 23.5-42.758 53.465-50.883 86.348C50.852 364.242 30 312.512 30 256 30 131.383 131.383 30 256 30s226 101.383 226 226c0 56.523-20.86 108.266-55.281 147.934zm0 0"
                          data-original="#000000"></path>
                      </svg>
                      Account</a>
                    <hr class="my-2 -mx-2" />
  
                    <a href="javascript:void(0)"
                      class="text-sm text-gray-800 cursor-pointer flex items-center p-2 rounded-md hover:bg-gray-100 dropdown-item transition duration-300 ease-in-out">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4 mr-3 fill-current" viewBox="0 0 24 24">
                        <path d="M19.56 23.253H4.44a4.051 4.051 0 0 1-4.05-4.05v-9.115c0-1.317.648-2.56 1.728-3.315l7.56-5.292a4.062 4.062 0 0 1 4.644 0l7.56 5.292a4.056 4.056 0 0 1 1.728 3.315v9.115a4.051 4.051 0 0 1-4.05 4.05zM12 2.366a2.45 2.45 0 0 0-1.393.443l-7.56 5.292a2.433 2.433 0 0 0-1.037 1.987v9.115c0 1.34 1.09 2.43 2.43 2.43h15.12c1.34 0 2.43-1.09 2.43-2.43v-9.115c0-.788-.389-1.533-1.037-1.987l-7.56-5.292A2.438 2.438 0 0 0 12 2.377z" data-original="#000000"></path>
                        <path d="M16.32 23.253H7.68a.816.816 0 0 1-.81-.81v-5.4c0-2.83 2.3-5.13 5.13-5.13s5.13 2.3 5.13 5.13v5.4c0 .443-.367.81-.81.81zm-7.83-1.62h7.02v-4.59c0-1.933-1.577-3.51-3.51-3.51s-3.51 1.577-3.51 3.51z" data-original="#000000"></path>
                      </svg>
                      Dashboard</a>
                    <a href="javascript:void(0)"
                      class="text-sm text-gray-800 cursor-pointer flex items-center p-2 rounded-md hover:bg-gray-100 dropdown-item transition duration-300 ease-in-out">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-3 fill-current" viewBox="0 0 24 24">
                        <path
                          d="M18 2c2.206 0 4 1.794 4 4v12c0 2.206-1.794 4-4 4H6c-2.206 0-4-1.794-4-4V6c0-2.206 1.794-4 4-4zm0-2H6a6 6 0 0 0-6 6v12a6 6 0 0 0 6 6h12a6 6 0 0 0 6-6V6a6 6 0 0 0-6-6z"
                          data-original="#000000" />
                        <path d="M12 18a1 1 0 0 1-1-1V7a1 1 0 0 1 2 0v10a1 1 0 0 1-1 1z" data-original="#000000" />
                        <path d="M6 12a1 1 0 0 1 1-1h10a1 1 0 0 1 0 2H7a1 1 0 0 1-1-1z" data-original="#000000" />
                      </svg>
                      Posts</a>
                    <a href="javascript:void(0)"
                      class="text-sm text-gray-800 cursor-pointer flex items-center p-2 rounded-md hover:bg-gray-100 dropdown-item transition duration-300 ease-in-out">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-3 fill-current"
                        viewBox="0 0 510 510">
                        <g fill-opacity=".9">
                          <path
                            d="M255 0C114.75 0 0 114.75 0 255s114.75 255 255 255 255-114.75 255-255S395.25 0 255 0zm0 459c-112.2 0-204-91.8-204-204S142.8 51 255 51s204 91.8 204 204-91.8 204-204 204z"
                            data-original="#000000" />
                          <path d="M267.75 127.5H229.5v153l132.6 81.6 20.4-33.15-114.75-68.85z" data-original="#000000" />
                        </g>
                      </svg>
                      Schedules</a>
                    <a href="javascript:void(0)"
                      class="text-sm text-gray-800 cursor-pointer flex items-center p-2 rounded-md hover:bg-gray-100 dropdown-item transition duration-300 ease-in-out">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-3 fill-current" viewBox="0 0 6 6">
                        <path
                          d="M3.172.53a.265.266 0 0 0-.262.268v2.127a.265.266 0 0 0 .53 0V.798A.265.266 0 0 0 3.172.53zm1.544.532a.265.266 0 0 0-.026 0 .265.266 0 0 0-.147.47c.459.391.749.973.749 1.626 0 1.18-.944 2.131-2.116 2.131A2.12 2.12 0 0 1 1.06 3.16c0-.65.286-1.228.74-1.62a.265.266 0 1 0-.344-.404A2.667 2.667 0 0 0 .53 3.158a2.66 2.66 0 0 0 2.647 2.663 2.657 2.657 0 0 0 2.645-2.663c0-.812-.363-1.542-.936-2.03a.265.266 0 0 0-.17-.066z"
                          data-original="#000000" />
                      </svg>
                      Logout</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <button id="toggleOpen" class='lg:hidden !ml-7 outline-none'>
          <svg class="w-7 h-7" fill="#000" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
              clip-rule="evenodd"></path>
          </svg>
        </button>
      </div>
        </header>
            <div class="flex items-start">
                <nav id="sidebar" class="lg:min-w-[250px] w-max max-lg:min-w-8">
                    <div id="sidebar-collapse-menu" style="height: calc(100vh - 72px)"
                        class="bg-white shadow-lg h-screen fixed py-6 px-4 top-[70px] left-0 overflow-auto z-[99] lg:min-w-[250px] lg:w-max max-lg:w-0 max-lg:invisible transition-all duration-500">
                        <ul class="space-y-2 mb-2">
                            <li>
                                <a href="javascript:void(0)"
                                onclick="document.getElementById('Dashboard').style.display='block';
                                document.getElementById('Products').style.display='none';
                                document.getElementById('AddProducts').style.display='none';
                                document.getElementById('Profile').style.display='none';
                                resetMenuColors();
                                this.classList.add('text-red-500');
                                this.querySelector('svg').classList.add('fill-red-500');"
                                class="text-gray-800 text-sm flex items-center hover:bg-gray-100 rounded-md px-4 py-2 transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-[18px] h-[18px] mr-3" viewBox="0 0 24 24">
                                    <path d="M19.56 23.253H4.44a4.051 4.051 0 0 1-4.05-4.05v-9.115c0-1.317.648-2.56 1.728-3.315l7.56-5.292a4.062 4.062 0 0 1 4.644 0l7.56 5.292a4.056 4.056 0 0 1 1.728 3.315v9.115a4.051 4.051 0 0 1-4.05 4.05zM12 2.366a2.45 2.45 0 0 0-1.393.443l-7.56 5.292a2.433 2.433 0 0 0-1.037 1.987v9.115c0 1.34 1.09 2.43 2.43 2.43h15.12c1.34 0 2.43-1.09 2.43-2.43v-9.115c0-.788-.389-1.533-1.037-1.987l-7.56-5.292A2.438 2.438 0 0 0 12 2.377z" data-original="#000000"></path>
                                    <path d="M16.32 23.253H7.68a.816.816 0 0 1-.81-.81v-5.4c0-2.83 2.3-5.13 5.13-5.13s5.13 2.3 5.13 5.13v5.4c0 .443-.367.81-.81.81zm-7.83-1.62h7.02v-4.59c0-1.933-1.577-3.51-3.51-3.51s-3.51 1.577-3.51 3.51z" data-original="#000000"></path>
                                </svg>
                                <span>Dashboard</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="space-y-2 mb-2">
                            <li>
                                <a href="javascript:void(0)"
                                    onclick=" document.getElementById('Products').style.display='block';
                                    document.getElementById('AddProducts').style.display='none';
                                    document.getElementById('Dashboard').style.display='none';
                                    document.getElementById('Profile').style.display='none';
                                    resetMenuColors();
                                    this.classList.add('text-red-500');
                                    this.querySelector('svg').classList.add('fill-red-500');"
                                    class="text-gray-800 text-sm flex items-center hover:bg-gray-100 rounded-md px-4 py-2 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-[18px] h-[18px] mr-3"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M7 4h14a1 1 0 0 1 .96 1.28l-2.4 8A1 1 0 0 1 18 14H9.42l-.95 3.57a1 1 0 0 1-.97.73H4a1 1 0 1 1 0-2h2.68l3.2-12H4a1 1 0 1 1 0-2h3a1 1 0 0 1 .97.76zM9.38 12H16l1.8-6H9.98zM10 20a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm10 0a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"
                                            data-original="#000000" />
                                    </svg>
                                    <span>Products</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="space-y-2 mb-2">
                            <li>
                                <a href="javascript:void(0)"
                                    onclick="document.getElementById('AddProducts').style.display='block';
                                    document.getElementById('Dashboard').style.display='none';
                                    document.getElementById('Products').style.display='none';
                                    document.getElementById('Profile').style.display='none';
                                    resetMenuColors();
                                    this.classList.add('text-red-500');
                                    this.querySelector('svg').classList.add('fill-red-500');"
                                    class="text-gray-800 text-sm flex items-center hover:bg-gray-100 rounded-md px-4 py-2 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-[18px] h-[18px] mr-3"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M18 2c2.206 0 4 1.794 4 4v12c0 2.206-1.794 4-4 4H6c-2.206 0-4-1.794-4-4V6c0-2.206 1.794-4 4-4zm0-2H6a6 6 0 0 0-6 6v12a6 6 0 0 0 6 6h12a6 6 0 0 0 6-6V6a6 6 0 0 0-6-6z"
                                            data-original="#000000" />
                                        <path d="M12 18a1 1 0 0 1-1-1V7a1 1 0 0 1 2 0v10a1 1 0 0 1-1 1z" data-original="#000000" />
                                        <path d="M6 12a1 1 0 0 1 1-1h10a1 1 0 0 1 0 2H7a1 1 0 0 1-1-1z" data-original="#000000" />
                                    </svg>
                                    <span>New Products</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="space-y-2 mb-2">
                            <li>
                                <a href="javascript:void(0)" 
                                    onclick=" document.getElementById('Profile').style.display='block';
                                    document.getElementById('AddProducts').style.display='none';
                                    document.getElementById('Dashboard').style.display='none';
                                    document.getElementById('Products').style.display='none';
                                    resetMenuColors();
                                    this.classList.add('text-red-500');
                                    this.querySelector('svg').classList.add('fill-red-500');"
                                    class="text-gray-800 text-sm flex items-center hover:bg-gray-100 rounded-md px-4 py-2 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-[18px] h-[18px] mr-3"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M437.02 74.98C388.668 26.63 324.379 0 256 0S123.332 26.629 74.98 74.98C26.63 123.332 0 187.621 0 256s26.629 132.668 74.98 181.02C123.332 485.37 187.621 512 256 512s132.668-26.629 181.02-74.98C485.37 388.668 512 324.379 512 256s-26.629-132.668-74.98-181.02zM111.105 429.297c8.454-72.735 70.989-128.89 144.895-128.89 38.96 0 75.598 15.179 103.156 42.734 23.281 23.285 37.965 53.687 41.742 86.152C361.641 462.172 311.094 482 256 482s-105.637-19.824-144.895-52.703zM256 269.507c-42.871 0-77.754-34.882-77.754-77.753C178.246 148.879 213.13 114 256 114s77.754 34.879 77.754 77.754c0 42.871-34.883 77.754-77.754 77.754zm170.719 134.427a175.9 175.9 0 0 0-46.352-82.004c-18.437-18.438-40.25-32.27-64.039-40.938 28.598-19.394 47.426-52.16 47.426-89.238C363.754 132.34 315.414 84 256 84s-107.754 48.34-107.754 107.754c0 37.098 18.844 69.875 47.465 89.266-21.887 7.976-42.14 20.308-59.566 36.542-25.235 23.5-42.758 53.465-50.883 86.348C50.852 364.242 30 312.512 30 256 30 131.383 131.383 30 256 30s226 101.383 226 226c0 56.523-20.86 108.266-55.281 147.934zm0 0"
                                            data-original="#000000" />
                                    </svg>
                                    <span>Profile</span>
                                </a>
                            </li>
                        </ul>
                        <script>
                            function resetMenuColors() {
                                const menuItems = document.querySelectorAll('nav#sidebar a');
                                menuItems.forEach(item => {
                                    item.classList.remove('text-red-500');
                                    const svg = item.querySelector('svg');
                                    if (svg) {
                                        svg.classList.remove('fill-red-500');
                                    }
                                });
                            }
                        </script>
                        <ul class="space-y-2 mb-2">
                            <li>
                                <a href="javascript:void(0)"
                                    class="text-gray-800 text-sm flex items-center hover:bg-gray-100 rounded-md px-4 py-2 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-[18px] h-[18px] mr-3"
                                        viewBox="0 0 6.35 6.35">
                                        <path
                                            d="M3.172.53a.265.266 0 0 0-.262.268v2.127a.265.266 0 0 0 .53 0V.798A.265.266 0 0 0 3.172.53zm1.544.532a.265.266 0 0 0-.026 0 .265.266 0 0 0-.147.47c.459.391.749.973.749 1.626 0 1.18-.944 2.131-2.116 2.131A2.12 2.12 0 0 1 1.06 3.16c0-.65.286-1.228.74-1.62a.265.266 0 1 0-.344-.404A2.667 2.667 0 0 0 .53 3.158a2.66 2.66 0 0 0 2.647 2.663 2.657 2.657 0 0 0 2.645-2.663c0-.812-.363-1.542-.936-2.03a.265.266 0 0 0-.17-.066z"
                                            data-original="#000000" />
                                    </svg>
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                        <!-- <div class="mt-6">
                            <h6 class="text-blue-600 text-sm font-bold px-4">General Settings</h6>
                            <ul class="mt-3 space-y-2">
                                <li>
                                    <a href="javascript:void(0)"
                                    class="text-gray-800 text-sm flex items-center hover:bg-gray-100 rounded-md px-4 py-2 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-[18px] h-[18px] mr-3"
                                        viewBox="0 0 214.27 214.27">
                                            <path
                                                d="M196.926 55.171c-.11-5.785-.215-11.25-.215-16.537a7.5 7.5 0 0 0-7.5-7.5c-32.075 0-56.496-9.218-76.852-29.01a7.498 7.498 0 0 0-10.457 0c-20.354 19.792-44.771 29.01-76.844 29.01a7.5 7.5 0 0 0-7.5 7.5c0 5.288-.104 10.755-.215 16.541-1.028 53.836-2.436 127.567 87.331 158.682a7.495 7.495 0 0 0 4.912 0c89.774-31.116 88.368-104.849 87.34-158.686zm-89.795 143.641c-76.987-27.967-75.823-89.232-74.79-143.351.062-3.248.122-6.396.164-9.482 30.04-1.268 54.062-10.371 74.626-28.285 20.566 17.914 44.592 27.018 74.634 28.285.042 3.085.102 6.231.164 9.477 1.032 54.121 2.195 115.388-74.798 143.356z"
                                                data-original="#000000" />
                                            <path
                                                d="m132.958 81.082-36.199 36.197-15.447-15.447a7.501 7.501 0 0 0-10.606 10.607l20.75 20.75a7.477 7.477 0 0 0 5.303 2.196 7.477 7.477 0 0 0 5.303-2.196l41.501-41.5a7.498 7.498 0 0 0 .001-10.606 7.5 7.5 0 0 0-10.606-.001z"
                                                data-original="#000000" />
                                        </svg>
                                        <span>Security</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        class="text-gray-800 text-sm flex items-center hover:bg-gray-100 rounded-md px-4 py-2 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-[18px] h-[18px] mr-3"
                                        viewBox="0 0 64 64">
                                        <path
                                            d="M61.4 29.9h-6.542a9.377 9.377 0 0 0-18.28 0H2.6a2.1 2.1 0 0 0 0 4.2h33.978a9.377 9.377 0 0 0 18.28 0H61.4a2.1 2.1 0 0 0 0-4.2Zm-15.687 7.287A5.187 5.187 0 1 1 50.9 32a5.187 5.187 0 0 1-5.187 5.187ZM2.6 13.1h5.691a9.377 9.377 0 0 0 18.28 0H61.4a2.1 2.1 0 0 0 0-4.2H26.571a9.377 9.377 0 0 0-18.28 0H2.6a2.1 2.1 0 0 0 0 4.2Zm14.837-7.287A5.187 5.187 0 0 1 22.613 11a5.187 5.187 0 0 1-10.364 0 5.187 5.187 0 0 1 5.187-5.187ZM61.4 50.9H35.895a9.377 9.377 0 0 0-18.28 0H2.6a2.1 2.1 0 0 0 0 4.2h15.015a9.377 9.377 0 0 0 18.28 0H61.4a2.1 2.1 0 0 0 0-4.2Zm-34.65 7.287A5.187 5.187 0 1 1 31.937 53a5.187 5.187 0 0 1-5.187 5.187Z"
                                            data-name="Layer 47" data-original="#000000" />
                                        </svg>
                                        <span>Preferences</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        class="text-gray-800 text-sm flex items-center hover:bg-gray-100 rounded-md px-4 py-2 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-[18px] h-[18px] mr-3"
                                        viewBox="0 0 64 64">
                                        <path
                                            d="M32.667 5.11A25.116 25.116 0 0 0 32 5.045V2.88a2.08 2.08 0 1 0-4.16 0v2.165C15.027 6.102 4.96 16.837 4.96 29.92v18.5L3.47 52.8h-.59a2.08 2.08 0 1 0 0 4.16h54.08a2.08 2.08 0 1 0 0-4.16h-.59l-1.49-4.38v-9.568a18.585 18.585 0 0 1-4.16 1.209v8.703a2.08 2.08 0 0 0 .11.67l1.145 3.366H7.865l1.144-3.366a2.08 2.08 0 0 0 .111-.67V29.92c0-11.488 9.312-20.8 20.8-20.8.142 0 .285.001.426.004a18.7 18.7 0 0 1 2.32-4.014zM23.68 61.12a2.08 2.08 0 0 1 2.08-2.08h8.32a2.08 2.08 0 1 1 0 4.16h-8.32a2.08 2.08 0 0 1-2.08-2.08z"
                                            data-original="#000000" />
                                        <g fill-rule="evenodd" clip-rule="evenodd">
                                            <path
                                            d="M46.56 12.909c-4.221 0-7.627 3.434-7.627 7.651s3.406 7.651 7.627 7.651c4.22 0 7.626-3.434 7.626-7.651s-3.406-7.651-7.626-7.651zm-3.467 7.651c0-1.936 1.56-3.491 3.467-3.491 1.906 0 3.466 1.555 3.466 3.491s-1.56 3.491-3.466 3.491c-1.906 0-3.467-1.555-3.467-3.491z"
                                            data-original="#000000" />
                                            <path
                                            d="M44.342 2.88a2.08 2.08 0 0 0-2.005 1.526l-.75 2.711a14.256 14.256 0 0 0-4.138 2.402l-2.709-.703a2.08 2.08 0 0 0-2.325.978l-2.218 3.86a2.08 2.08 0 0 0 .316 2.49l1.964 2.01a14.478 14.478 0 0 0 0 4.813l-1.965 2.009a2.08 2.08 0 0 0-.315 2.49l2.218 3.86a2.08 2.08 0 0 0 2.325.978l2.709-.702a14.256 14.256 0 0 0 4.139 2.402l.749 2.71a2.08 2.08 0 0 0 2.005 1.526h4.436a2.08 2.08 0 0 0 2.005-1.526l.75-2.71a14.257 14.257 0 0 0 4.14-2.402l2.706.702a2.08 2.08 0 0 0 2.326-.978l2.218-3.86a2.08 2.08 0 0 0-.316-2.49l-1.964-2.01a14.477 14.477 0 0 0 0-4.813l1.965-2.009a2.08 2.08 0 0 0 .315-2.49l-2.219-3.86a2.08 2.08 0 0 0-2.324-.978l-2.709.702a14.256 14.256 0 0 0-4.138-2.402l-.749-2.71a2.08 2.08 0 0 0-2.007-1.526zm.956 6.421.626-2.261h1.271l.627 2.261a2.08 2.08 0 0 0 1.446 1.45 10.098 10.098 0 0 1 4.38 2.544 2.08 2.08 0 0 0 1.983.532l2.257-.585.644 1.12-1.64 1.678a2.08 2.08 0 0 0-.528 1.971c.208.812.32 1.666.32 2.549s-.112 1.737-.32 2.549a2.08 2.08 0 0 0 .527 1.97l1.641 1.68-.644 1.12-2.257-.586a2.08 2.08 0 0 0-1.982.532 10.096 10.096 0 0 1-4.38 2.544 2.08 2.08 0 0 0-1.447 1.45l-.628 2.261h-1.272l-.624-2.261a2.08 2.08 0 0 0-1.447-1.45 10.097 10.097 0 0 1-4.38-2.544 2.08 2.08 0 0 0-1.983-.532l-2.257.585-.645-1.12 1.642-1.678a2.08 2.08 0 0 0 .527-1.971c-.208-.812-.32-1.666-.32-2.549s.112-1.737.32-2.548a2.08 2.08 0 0 0-.527-1.972l-1.642-1.678.645-1.12 2.257.585a2.08 2.08 0 0 0 1.982-.532 10.097 10.097 0 0 1 4.38-2.544 2.08 2.08 0 0 0 1.447-1.45z"
                                            data-original="#000000" />
                                        </g>
                                        </svg>
                                        <span>Notification Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        class="text-gray-800 text-sm flex items-center hover:bg-gray-100 rounded-md px-4 py-2 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-[18px] h-[18px] mr-3"
                                        viewBox="0 0 32 32">
                                        <path fill-rule="evenodd"
                                            d="M20.063 7.94a3.96 3.96 0 0 1-5.342 3.713l2.362 2.815a6.601 6.601 0 1 0-7.24-8.627l2.364 2.818a3.96 3.96 0 1 1 7.856-.718zm-7.885 9.415L3.718 7.35A1.32 1.32 0 1 1 5.73 5.645l20.055 23.712a1.32 1.32 0 1 1-2.015 1.705l-2.03-2.401a8.886 8.886 0 0 1-2.645.4H13.11a8.886 8.886 0 0 1-8.886-8.886c0-.518.272-.993.747-1.198 1.095-.47 3.427-1.27 7.208-1.622zm7.634 9.025c-.235.026-.474.04-.716.04H13.11a6.248 6.248 0 0 1-6.184-5.362c1.35-.454 3.751-1.047 7.37-1.2zm-.347-9.072 2.476 2.95a21.397 21.397 0 0 1 3.34.8 6.204 6.204 0 0 1-.78 2.25l1.77 2.111a8.845 8.845 0 0 0 1.712-5.244c0-.518-.272-.993-.747-1.198-1.149-.493-3.657-1.349-7.771-1.67z"
                                            clip-rule="evenodd" data-original="#000000" />
                                        </svg>
                                        <span>Account Deactivation</span>
                                    </a>
                                </li>
                            </ul>
                        </div> -->
                    </div>
                </nav>
        
                <button id="toggle-sidebar"
                class='lg:hidden w-8 h-8 z-[100] fixed top-[74px] left-[10px] cursor-pointer bg-[#007bff] flex items-center justify-center rounded-full outline-none transition-all duration-500'>
                <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" class="w-3 h-3" viewBox="0 0 55.752 55.752">
                    <path
                    d="M43.006 23.916a5.36 5.36 0 0 0-.912-.727L20.485 1.581a5.4 5.4 0 0 0-7.637 7.638l18.611 18.609-18.705 18.707a5.398 5.398 0 1 0 7.634 7.635l21.706-21.703a5.35 5.35 0 0 0 .912-.727 5.373 5.373 0 0 0 1.574-3.912 5.363 5.363 0 0 0-1.574-3.912z"
                    data-original="#000000" />
                </svg>
                </button>
                <section class="main-content w-full overflow-auto p-6 hidden" id="Dashboard">
                    <div>
                        <div class="flex items-center">
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                </section>

                <section class="main-content w-full overflow-auto p-6 hidden" id="Products">
                    <div class="p-8">
                        <div class=" font-[sans-serif] overflow-x-auto">
                            <h1 class="text-left">Products</h1>
                        </div>
                        <div class="container p-8 font-[sans-serif] overflow-x-auto">
                            <table class="min-w-full bg-white">
                                <thead class="whitespace-nowrap">
                                    <tr class="font-bold bg-red-500 text-white">
                                        <th class="pl-4 w-8">
                                            <input id="checkbox" type="checkbox" class="hidden peer" />
                                            <label for="checkbox"
                                                class="relative flex items-center justify-center p-0.5 peer-checked:before:hidden before:block before:absolute before:w-full before:h-full before:bg-white w-5 h-5 cursor-pointer bg-blue-500 border border-gray-400 rounded overflow-hidden">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-full fill-white" viewBox="0 0 520 520">
                                                    <path
                                                    d="M79.423 240.755a47.529 47.529 0 0 0-36.737 77.522l120.73 147.894a43.136 43.136 0 0 0 36.066 16.009c14.654-.787 27.884-8.626 36.319-21.515L486.588 56.773a6.13 6.13 0 0 1 .128-.2c2.353-3.613 1.59-10.773-3.267-15.271a13.321 13.321 0 0 0-19.362 1.343q-.135.166-.278.327L210.887 328.736a10.961 10.961 0 0 1-15.585.843l-83.94-76.386a47.319 47.319 0 0 0-31.939-12.438z"
                                                    data-name="7-Check" data-original="#000000" />
                                                </svg>
                                            </label>
                                        </th>
                                        <th class="p-4 text-left text-sm font-semibold">
                                            Name
                                        </th>
                                        <th class="p-4 text-left text-sm font-semibold">
                                            Role
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-gray-400 inline cursor-pointer ml-2"
                                                viewBox="0 0 401.998 401.998">
                                                <path
                                                    d="M73.092 164.452h255.813c4.949 0 9.233-1.807 12.848-5.424 3.613-3.616 5.427-7.898 5.427-12.847s-1.813-9.229-5.427-12.85L213.846 5.424C210.232 1.812 205.951 0 200.999 0s-9.233 1.812-12.85 5.424L60.242 133.331c-3.617 3.617-5.424 7.901-5.424 12.85 0 4.948 1.807 9.231 5.424 12.847 3.621 3.617 7.902 5.424 12.85 5.424zm255.813 73.097H73.092c-4.952 0-9.233 1.808-12.85 5.421-3.617 3.617-5.424 7.898-5.424 12.847s1.807 9.233 5.424 12.848L188.149 396.57c3.621 3.617 7.902 5.428 12.85 5.428s9.233-1.811 12.847-5.428l127.907-127.906c3.613-3.614 5.427-7.898 5.427-12.848 0-4.948-1.813-9.229-5.427-12.847-3.614-3.616-7.899-5.42-12.848-5.42z"
                                                    data-original="#000000" />
                                            </svg>
                                        </th>
                                        <th class="p-4 text-left text-sm font-semibold">
                                            Active
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-gray-400 inline cursor-pointer ml-2"
                                                viewBox="0 0 401.998 401.998">
                                                <path
                                                    d="M73.092 164.452h255.813c4.949 0 9.233-1.807 12.848-5.424 3.613-3.616 5.427-7.898 5.427-12.847s-1.813-9.229-5.427-12.85L213.846 5.424C210.232 1.812 205.951 0 200.999 0s-9.233 1.812-12.85 5.424L60.242 133.331c-3.617 3.617-5.424 7.901-5.424 12.85 0 4.948 1.807 9.231 5.424 12.847 3.621 3.617 7.902 5.424 12.85 5.424zm255.813 73.097H73.092c-4.952 0-9.233 1.808-12.85 5.421-3.617 3.617-5.424 7.898-5.424 12.847s1.807 9.233 5.424 12.848L188.149 396.57c3.621 3.617 7.902 5.428 12.85 5.428s9.233-1.811 12.847-5.428l127.907-127.906c3.613-3.614 5.427-7.898 5.427-12.848 0-4.948-1.813-9.229-5.427-12.847-3.614-3.616-7.899-5.42-12.848-5.42z"
                                                    data-original="#000000" />
                                            </svg>
                                        </th>
                                        <th class="p-4 text-left text-sm font-semibold">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="whitespace-nowrap">
                                    <tr class="odd:bg-blue-50">
                                        <td class="pl-4 w-8">
                                            <input id="checkbox1" type="checkbox" class="hidden peer" />
                                            <label for="checkbox1"
                                                class="relative flex items-center justify-center p-0.5 peer-checked:before:hidden before:block before:absolute before:w-full before:h-full before:bg-white w-5 h-5 cursor-pointer bg-blue-500 border border-gray-400 rounded overflow-hidden">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-full fill-white" viewBox="0 0 520 520">
                                                    <path
                                                    d="M79.423 240.755a47.529 47.529 0 0 0-36.737 77.522l120.73 147.894a43.136 43.136 0 0 0 36.066 16.009c14.654-.787 27.884-8.626 36.319-21.515L486.588 56.773a6.13 6.13 0 0 1 .128-.2c2.353-3.613 1.59-10.773-3.267-15.271a13.321 13.321 0 0 0-19.362 1.343q-.135.166-.278.327L210.887 328.736a10.961 10.961 0 0 1-15.585.843l-83.94-76.386a47.319 47.319 0 0 0-31.939-12.438z"
                                                    data-name="7-Check" data-original="#000000" />
                                                </svg>
                                            </label>
                                        </td>
                                        <td class="p-4 text-sm">
                                            <div class="flex items-center cursor-pointer w-max">
                                                <img src='https://readymadeui.com/profile_4.webp' class="w-9 h-9 rounded-full shrink-0" />
                                                <div class="ml-4">
                                                    <p class="text-sm text-black">Gladys Jones</p>
                                                    <p class="text-xs text-gray-500 mt-0.5">gladys@example.com</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4 text-sm text-black">
                                            Admin
                                        </td>
                                        <td class="p-4">
                                            <label class="relative cursor-pointer">
                                                <input type="checkbox" class="sr-only peer" checked />
                                                <div
                                                    class="w-11 h-6 flex items-center bg-gray-300 rounded-full peer peer-checked:after:translate-x-full after:absolute after:left-[2px] peer-checked:after:border-white after:bg-white after:border after:border-gray-300 after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#007bff]">
                                                </div>
                                            </label>
                                        </td>
                                        <td class="p-4">
                                            <button class="mr-4" title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-blue-500 hover:fill-blue-700"
                                                    viewBox="0 0 348.882 348.882">
                                                    <path
                                                    d="m333.988 11.758-.42-.383A43.363 43.363 0 0 0 304.258 0a43.579 43.579 0 0 0-32.104 14.153L116.803 184.231a14.993 14.993 0 0 0-3.154 5.37l-18.267 54.762c-2.112 6.331-1.052 13.333 2.835 18.729 3.918 5.438 10.23 8.685 16.886 8.685h.001c2.879 0 5.693-.592 8.362-1.76l52.89-23.138a14.985 14.985 0 0 0 5.063-3.626L336.771 73.176c16.166-17.697 14.919-45.247-2.783-61.418zM130.381 234.247l10.719-32.134.904-.99 20.316 18.556-.904.99-31.035 13.578zm184.24-181.304L182.553 197.53l-20.316-18.556L294.305 34.386c2.583-2.828 6.118-4.386 9.954-4.386 3.365 0 6.588 1.252 9.082 3.53l.419.383c5.484 5.009 5.87 13.546.861 19.03z"
                                                    data-original="#000000" />
                                                    <path
                                                    d="M303.85 138.388c-8.284 0-15 6.716-15 15v127.347c0 21.034-17.113 38.147-38.147 38.147H68.904c-21.035 0-38.147-17.113-38.147-38.147V100.413c0-21.034 17.113-38.147 38.147-38.147h131.587c8.284 0 15-6.716 15-15s-6.716-15-15-15H68.904C31.327 32.266.757 62.837.757 100.413v180.321c0 37.576 30.571 68.147 68.147 68.147h181.798c37.576 0 68.147-30.571 68.147-68.147V153.388c.001-8.284-6.715-15-14.999-15z"
                                                    data-original="#000000" />
                                                </svg>
                                            </button>
                                            <button title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-red-500 hover:fill-red-700" viewBox="0 0 24 24">
                                                    <path
                                                    d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                                    data-original="#000000" />
                                                    <path d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                                    data-original="#000000" />
                                                </svg>
                                            </button>
                                        </td>                                       
                                    </tr>
                                </tbody>
                            </table>
                            <div class="md:flex m-4">
                                <p class="text-sm text-gray-500 flex-1">Showind 1 to 5 of 100 entries</p>
                                <div class="flex items-center max-md:mt-4">
                                    <p class="text-sm text-gray-500">Display</p>
                                    <select class="text-sm text-gray-500 border border-gray-400 rounded h-7 mx-4 px-1 outline-none">
                                    <option>5</option>
                                    <option>10</option>
                                    <option>20</option>
                                    <option>50</option>
                                    <option>100</option>
                                    </select>
                                    <ul class="flex space-x-1 ml-2">
                                    <li class="flex items-center justify-center cursor-pointer bg-blue-100 w-7 h-7 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-gray-500" viewBox="0 0 55.753 55.753">
                                            <path
                                                d="M12.745 23.915c.283-.282.59-.52.913-.727L35.266 1.581a5.4 5.4 0 0 1 7.637 7.638L24.294 27.828l18.705 18.706a5.4 5.4 0 0 1-7.636 7.637L13.658 32.464a5.367 5.367 0 0 1-.913-.727 5.367 5.367 0 0 1-1.572-3.911 5.369 5.369 0 0 1 1.572-3.911z"
                                                data-original="#000000" />
                                        </svg>
                                    </li>
                                    <li class="flex items-center justify-center cursor-pointer text-sm w-7 h-7 text-gray-500 rounded">
                                        1
                                    </li>
                                    <li class="flex items-center justify-center cursor-pointer text-sm bg-[#007bff] text-white w-7 h-7 rounded">
                                        2
                                    </li>
                                    <li class="flex items-center justify-center cursor-pointer text-sm w-7 h-7 text-gray-500 rounded">
                                        3
                                    </li>
                                    <li class="flex items-center justify-center cursor-pointer text-sm w-7 h-7 text-gray-500 rounded">
                                        4
                                    </li>
                                    <li class="flex items-center justify-center cursor-pointer bg-blue-100 w-7 h-7 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-gray-500 rotate-180" viewBox="0 0 55.753 55.753">
                                            <path
                                                d="M12.745 23.915c.283-.282.59-.52.913-.727L35.266 1.581a5.4 5.4 0 0 1 7.637 7.638L24.294 27.828l18.705 18.706a5.4 5.4 0 0 1-7.636 7.637L13.658 32.464a5.367 5.367 0 0 1-.913-.727 5.367 5.367 0 0 1-1.572-3.911 5.369 5.369 0 0 1 1.572-3.911z"
                                                data-original="#000000" />
                                        </svg>
                                    </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="main-content w-full overflow-auto p-6 hidden" id="AddProducts">
                    <div id="alert-message" class="font-[sans-serif] space-y-6 hidden">
                        <div class="bg-green-100 text-green-800 p-4 rounded-lg relative" role="alert">
                            <strong class="font-bold text-sm">Success!</strong>
                            <span class="block text-sm sm:inline max-sm:mt-2 max-sm:ml-0 ml-4 mr-8">This is a success message that requires your attention.</span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-7 hover:bg-green-200 rounded-lg transition-all p-2 cursor-pointer fill-green-500 absolute right-4 top-1/2 -translate-y-1/2" viewBox="0 0 320.591 320.591" onclick="document.getElementById('alert-message').classList.add('hidden');">
                                <path
                                    d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
                                    data-original="#000000" />
                                <path
                                    d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
                                    data-original="#000000" />
                            </svg>
                        </div>
                    </div>
                    <div id="alert-message-error" class="font-[sans-serif] space-y-6 hidden">
                        <div class="bg-red-100 text-red-800  p-4 rounded-lg relative" role="alert">
                            <strong class="font-bold text-sm">Error!</strong>
                            <span class="block text-sm sm:inline max-sm:mt-2 max-sm:ml-0 ml-4 mr-8">This is a error message that requires your attention.</span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-7 hover:bg-red-200 rounded-lg transition-all p-2 cursor-pointer fill-red-500 absolute right-4 top-1/2 -translate-y-1/2" viewBox="0 0 320.591 320.591" onclick="document.getElementById('alert-message-error').classList.add('hidden');">
                                <path
                                    d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
                                    data-original="#000000" />
                                <path
                                    d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
                                    data-original="#000000" />
                            </svg>
                        </div>
                    </div>
                    <div id="alert-message-warning" class="font-[sans-serif] space-y-6 hidden">
                        <div class="bg-yellow-100 text-yellow-800 p-4 rounded-lg relative" role="alert">
                            <strong class="font-bold text-sm">Warning!</strong>
                            <span class="block text-sm sm:inline max-sm:mt-2 max-sm:ml-0 ml-4 mr-8">This is a warning message that requires your attention.</span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-7 hover:bg-yellow-200 rounded-lg transition-all p-2 cursor-pointer fill-yellow-500 absolute right-4 top-1/2 -translate-y-1/2" viewBox="0 0 320.591 320.591" onclick="document.getElementById('alert-message-warning').classList.add('hidden');">
                                <path
                                    d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
                                    data-original="#000000" />
                                <path
                                    d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
                                    data-original="#000000" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="container mx-auto p-2 rounded-lg">
                            <h1 class="p-4 text-2xl font-bold mb-4">Add New Product</h1>
                            <form id="productForm" onsubmit="submitForm(event)">
                                <div class="p-4">
                                    <label class="block text-black-500 text-sm font-bold mb-2 font-[sans-serif]"
                                        for="product-name">
                                        <h6 class="text-sm font-bold">Product Name</h6>
                                    </label>
                                    <input
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
                                        type="text" id="name" name="name" required>
                                    </input>
                                </div>
                                <div class="p-4">
                                    <label class="block text-black-500 text-sm font-bold mb-2" for="product-description">
                                        <h6 class="text-sm font-bold">Product Description</h6>
                                    </label>
                                    <textarea
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
                                        id="description" name="description" required 
                                        rows="5">
                                    </textarea>
                                </div>
                                <div class="p-4">
                                    <label class="block text-black-500 text-sm font-bold mb-2" for="product-category">
                                        <h6 class="text-sm font-bold">Product Category</h6>
                                    </label>
                                    <input
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline"
                                        id="product-category" type="text">
                                    </input>
                                </div>
                                <div class="p-4">
                                    <label class="block text-black-500 text-sm font-bold mb-2" for="product-image">
                                        <h6 class="text-sm font-bold">Product Image</h6>
                                    </label>
                                    <label id="lable-image"
                                        class="bg-gray-300 text-black font-semibold text-base rounded h-52 flex flex-col items-center justify-center cursor-pointer border-2 border-gray-300 border-dashed mx-auto font-[sans-serif]">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-11 mb-2 fill-gray-500"
                                            viewBox="0 0 32 32" id="upload-icon">
                                            <path
                                                d="M23.75 11.044a7.99 7.99 0 0 0-15.5-.009A8 8 0 0 0 9 27h3a1 1 0 0 0 0-2H9a6 6 0 0 1-.035-12 1.038 1.038 0 0 0 1.1-.854 5.991 5.991 0 0 1 11.862 0A1.08 1.08 0 0 0 23 13a6 6 0 0 1 0 12h-3a1 1 0 0 0 0 2h3a8 8 0 0 0 .75-15.956z"
                                                data-original="#000000" />
                                            <path
                                                d="M20.293 19.707a1 1 0 0 0 1.414-1.414l-5-5a1 1 0 0 0-1.414 0l-5 5a1 1 0 0 0 1.414 1.414L15 16.414V29a1 1 0 0 0 2 0V16.414z"
                                                data-original="#000000" />
                                        </svg>
                                        <span id="file-name" class="text-xs font-medium text-gray-400 mt-2">Only .png, .jpeg, .jpg are allowed.</span>
                                        <input type="file" id="image" name="image" accept="image/*" class="hidden" accept=".jpg, .jpeg, .png"
                                            onchange="displayFileName(this); if(this.files.length > 0) document.getElementById('file-name').style.display = 'none';"/>
                                        <img id="preview-image" class="hidden w-full h-52 object-contain rounded" />
                                    </label>
                                </div>
                                <div class="p-4 space-x-4">
                                    <button
                                        class="text-white bg-red-500 hover:bg-red-700 text-gray-300 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline font-[sans-serif]"
                                        type="button" onclick="document.getElementById('productForm').reset();
                                        document.getElementById('preview-image').classList.add('hidden');
                                        document.getElementById('alert-message-warning').classList.remove('hidden');
                                        setTimeout(() => {
                                            document.getElementById('alert-message-warning').classList.add('hidden');
                                        }, 6000);
                                        document.getElementById('file-name').style.display = 'block';">
                                        Cancel
                                    </button>
                                    <button
                                        class="text-white bg-green-500 hover:bg-green-700 text-gray-300 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline font-[sans-serif]"
                                        type="submit" onclick="saveData()">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
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

                            function showAlert(message, type) {
                                const alertBox = document.getElementById('alert-message');
                                alertBox.classList.remove('hidden');
                                setTimeout(() => {
                                    alertBox.classList.add('hidden');
                                }, 6000);
                            }

                            function showAlertError(message, type) {
                                const alertBox = document.getElementById('alert-message-error');
                                alertBox.classList.remove('hidden');
                                setTimeout(() => {
                                    alertBox.classList.add('hidden');
                                }, 6000);
                            }

                            function saveData() {
                                const formData = new FormData(document.getElementById('productForm'));
                                fetch('../database/insert_product.php', {
                                    method: 'POST',
                                    body: formData,
                                })
                                .then(response => response.json())
                                .then(data => {
                                    console.log(data); // Log the response data for debugging
                                    if (data.status === 'success') {
                                        showAlert();
                                        document.getElementById('productForm').reset();
                                    } else {
                                        showAlertError(data.message);
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    showAlertError('An error occurred while saving the product.');
                                });
                            }

                            function submitForm(event) {
                                event.preventDefault();
                                saveData();
                            }
                        </script>
                        </script>
                    </div>
                </section>
                
                <section class="main-content w-full overflow-auto p-6 hidden" id="Profile">
                    <div class="flex items-center">
                        <h1>Profile</h1>
                    </div>
                </section>
            </div>
    </div>
</body>

</html>