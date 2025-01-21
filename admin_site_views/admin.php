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
    <?php include '../database/db_connection.php'; ?>
    <script src="../js/script-admin.js"></script>
    <div class="relative font-[sans-serif] pt-[70px] h-screen">
        <header class='flex shadow-md py-1 px-4 sm:px-7 bg-white min-h-[70px] tracking-wide z-[110] fixed top-0 w-full'>
            <div class='flex flex-wrap items-center justify-between gap-4 w-full relative'>
                <a href="javascript:void(0)"><img src="https://readymadeui.com/readymadeui.svg" alt="logo"
                        class='w-36' />
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
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 cursor-pointer fill-[#333] hover:fill-[#077bff]"
                                    viewBox="0 0 511 511.999">
                                    <path
                                        d="M498.7 222.695c-.016-.011-.028-.027-.04-.039L289.805 13.81C280.902 4.902 269.066 0 256.477 0c-12.59 0-24.426 4.902-33.332 13.809L14.398 222.55c-.07.07-.144.144-.21.215-18.282 18.386-18.25 48.218.09 66.558 8.378 8.383 19.44 13.235 31.273 13.746.484.047.969.07 1.457.07h8.32v153.696c0 30.418 24.75 55.164 55.168 55.164h81.711c8.285 0 15-6.719 15-15V376.5c0-13.879 11.293-25.168 25.172-25.168h48.195c13.88 0 25.168 11.29 25.168 25.168V497c0 8.281 6.715 15 15 15h81.711c30.422 0 55.168-24.746 55.168-55.164V303.14h7.719c12.586 0 24.422-4.903 33.332-13.813 18.36-18.367 18.367-48.254.027-66.633zm-21.243 45.422a17.03 17.03 0 0 1-12.117 5.024h-22.72c-8.285 0-15 6.714-15 15v168.695c0 13.875-11.289 25.164-25.168 25.164h-66.71V376.5c0-30.418-24.747-55.168-55.169-55.168H232.38c-30.422 0-55.172 24.75-55.172 55.168V482h-66.71c-13.876 0-25.169-11.29-25.169-25.164V288.14c0-8.286-6.715-15-15-15H48a13.9 13.9 0 0 0-.703-.032c-4.469-.078-8.66-1.851-11.8-4.996-6.68-6.68-6.68-17.55 0-24.234.003 0 .003-.004.007-.008l.012-.012L244.363 35.02A17.003 17.003 0 0 1 256.477 30c4.574 0 8.875 1.781 12.113 5.02l208.8 208.796.098.094c6.645 6.692 6.633 17.54-.031 24.207zm0 0"
                                        data-original="#000000" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 cursor-pointer fill-[#333] hover:fill-[#077bff]"
                                    viewBox="0 0 371.263 371.263">
                                    <path
                                        d="M305.402 234.794v-70.54c0-52.396-33.533-98.085-79.702-115.151.539-2.695.838-5.449.838-8.204C226.539 18.324 208.215 0 185.64 0s-40.899 18.324-40.899 40.899c0 2.695.299 5.389.778 7.964-15.868 5.629-30.539 14.551-43.054 26.647-23.593 22.755-36.587 53.354-36.587 86.169v73.115c0 2.575-2.096 4.731-4.731 4.731-22.096 0-40.959 16.647-42.995 37.845-1.138 11.797 2.755 23.533 10.719 32.276 7.904 8.683 19.222 13.713 31.018 13.713h72.217c2.994 26.887 25.869 47.905 53.534 47.905s50.54-21.018 53.534-47.905h72.217c11.797 0 23.114-5.03 31.018-13.713 7.904-8.743 11.797-20.479 10.719-32.276-2.036-21.198-20.958-37.845-42.995-37.845a4.704 4.704 0 0 1-4.731-4.731zM185.64 23.952c9.341 0 16.946 7.605 16.946 16.946 0 .778-.12 1.497-.24 2.275-4.072-.599-8.204-1.018-12.336-1.138-7.126-.24-14.132.24-21.078 1.198-.12-.778-.24-1.497-.24-2.275.002-9.401 7.607-17.006 16.948-17.006zm0 323.358c-14.431 0-26.527-10.3-29.342-23.952h58.683c-2.813 13.653-14.909 23.952-29.341 23.952zm143.655-67.665c.479 5.15-1.138 10.12-4.551 13.892-3.533 3.773-8.204 5.868-13.353 5.868H59.89c-5.15 0-9.82-2.096-13.294-5.868-3.473-3.772-5.09-8.743-4.611-13.892.838-9.042 9.282-16.168 19.162-16.168 15.809 0 28.683-12.874 28.683-28.683v-73.115c0-26.228 10.419-50.719 29.282-68.923 18.024-17.425 41.498-26.887 66.528-26.887 1.198 0 2.335 0 3.533.06 50.839 1.796 92.277 45.929 92.277 98.325v70.54c0 15.809 12.874 28.683 28.683 28.683 9.88 0 18.264 7.126 19.162 16.168z"
                                        data-original="#000000" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 cursor-pointer fill-[#333] hover:fill-[#077bff]" viewBox="0 0 24 24">
                                    <path
                                        d="M18 2c2.206 0 4 1.794 4 4v12c0 2.206-1.794 4-4 4H6c-2.206 0-4-1.794-4-4V6c0-2.206 1.794-4 4-4zm0-2H6a6 6 0 0 0-6 6v12a6 6 0 0 0 6 6h12a6 6 0 0 0 6-6V6a6 6 0 0 0-6-6z"
                                        data-original="#000000" />
                                    <path d="M12 18a1 1 0 0 1-1-1V7a1 1 0 0 1 2 0v10a1 1 0 0 1-1 1z"
                                        data-original="#000000" />
                                    <path d="M6 12a1 1 0 0 1 1-1h10a1 1 0 0 1 0 2H7a1 1 0 0 1-1-1z"
                                        data-original="#000000" />
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
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                class="w-4 h-4 mr-3 fill-current" viewBox="0 0 24 24">
                                                <path
                                                    d="M19.56 23.253H4.44a4.051 4.051 0 0 1-4.05-4.05v-9.115c0-1.317.648-2.56 1.728-3.315l7.56-5.292a4.062 4.062 0 0 1 4.644 0l7.56 5.292a4.056 4.056 0 0 1 1.728 3.315v9.115a4.051 4.051 0 0 1-4.05 4.05zM12 2.366a2.45 2.45 0 0 0-1.393.443l-7.56 5.292a2.433 2.433 0 0 0-1.037 1.987v9.115c0 1.34 1.09 2.43 2.43 2.43h15.12c1.34 0 2.43-1.09 2.43-2.43v-9.115c0-.788-.389-1.533-1.037-1.987l-7.56-5.292A2.438 2.438 0 0 0 12 2.377z"
                                                    data-original="#000000"></path>
                                                <path
                                                    d="M16.32 23.253H7.68a.816.816 0 0 1-.81-.81v-5.4c0-2.83 2.3-5.13 5.13-5.13s5.13 2.3 5.13 5.13v5.4c0 .443-.367.81-.81.81zm-7.83-1.62h7.02v-4.59c0-1.933-1.577-3.51-3.51-3.51s-3.51 1.577-3.51 3.51z"
                                                    data-original="#000000"></path>
                                            </svg>
                                            Dashboard</a>
                                        <a href="javascript:void(0)"
                                            class="text-sm text-gray-800 cursor-pointer flex items-center p-2 rounded-md hover:bg-gray-100 dropdown-item transition duration-300 ease-in-out">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-3 fill-current"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M18 2c2.206 0 4 1.794 4 4v12c0 2.206-1.794 4-4 4H6c-2.206 0-4-1.794-4-4V6c0-2.206 1.794-4 4-4zm0-2H6a6 6 0 0 0-6 6v12a6 6 0 0 0 6 6h12a6 6 0 0 0 6-6V6a6 6 0 0 0-6-6z"
                                                    data-original="#000000" />
                                                <path d="M12 18a1 1 0 0 1-1-1V7a1 1 0 0 1 2 0v10a1 1 0 0 1-1 1z"
                                                    data-original="#000000" />
                                                <path d="M6 12a1 1 0 0 1 1-1h10a1 1 0 0 1 0 2H7a1 1 0 0 1-1-1z"
                                                    data-original="#000000" />
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
                                                    <path
                                                        d="M267.75 127.5H229.5v153l132.6 81.6 20.4-33.15-114.75-68.85z"
                                                        data-original="#000000" />
                                                </g>
                                            </svg>
                                            Schedules</a>
                                        <a href="javascript:void(0)"
                                            class="text-sm text-gray-800 cursor-pointer flex items-center p-2 rounded-md hover:bg-gray-100 dropdown-item transition duration-300 ease-in-out">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-3 fill-current"
                                                viewBox="0 0 6 6">
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
                            <a href="javascript:void(0)" onclick="document.getElementById('Dashboard').style.display='block';
                                document.getElementById('Products').style.display='none';
                                document.getElementById('AddProducts').style.display='none';
                                document.getElementById('Profile').style.display='none';
                                document.getElementById('Setting').style.display='none';
                                resetMenuColors();
                                this.classList.add('text-red-500');
                                this.querySelector('svg').classList.add('fill-red-500');"
                                class="text-gray-800 text-sm flex items-center hover:bg-gray-100 rounded-md px-4 py-2 transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="w-[18px] h-[18px] mr-3" viewBox="0 0 24 24">
                                    <path
                                        d="M19.56 23.253H4.44a4.051 4.051 0 0 1-4.05-4.05v-9.115c0-1.317.648-2.56 1.728-3.315l7.56-5.292a4.062 4.062 0 0 1 4.644 0l7.56 5.292a4.056 4.056 0 0 1 1.728 3.315v9.115a4.051 4.051 0 0 1-4.05 4.05zM12 2.366a2.45 2.45 0 0 0-1.393.443l-7.56 5.292a2.433 2.433 0 0 0-1.037 1.987v9.115c0 1.34 1.09 2.43 2.43 2.43h15.12c1.34 0 2.43-1.09 2.43-2.43v-9.115c0-.788-.389-1.533-1.037-1.987l-7.56-5.292A2.438 2.438 0 0 0 12 2.377z"
                                        data-original="#000000"></path>
                                    <path
                                        d="M16.32 23.253H7.68a.816.816 0 0 1-.81-.81v-5.4c0-2.83 2.3-5.13 5.13-5.13s5.13 2.3 5.13 5.13v5.4c0 .443-.367.81-.81.81zm-7.83-1.62h7.02v-4.59c0-1.933-1.577-3.51-3.51-3.51s-3.51 1.577-3.51 3.51z"
                                        data-original="#000000"></path>
                                </svg>
                                <span>Dashboard</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="space-y-2 mb-2">
                        <li>
                            <a href="javascript:void(0)" onclick=" document.getElementById('Products').style.display='block';
                                    document.getElementById('AddProducts').style.display='none';
                                    document.getElementById('Dashboard').style.display='none';
                                    document.getElementById('Profile').style.display='none';
                                    document.getElementById('Setting').style.display='none';
                                    resetMenuColors();
                                    this.classList.add('text-red-500');
                                    this.querySelector('svg').classList.add('fill-red-500');"
                                class="text-gray-800 text-sm flex items-center hover:bg-gray-100 rounded-md px-4 py-2 transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="w-[18px] h-[18px] mr-3" viewBox="0 0 24 24">
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
                            <a href="javascript:void(0)" onclick="document.getElementById('AddProducts').style.display='block';
                                    document.getElementById('Dashboard').style.display='none';
                                    document.getElementById('Products').style.display='none';
                                    document.getElementById('Profile').style.display='none';
                                    document.getElementById('Setting').style.display='none';
                                    resetMenuColors();
                                    this.classList.add('text-red-500');
                                    this.querySelector('svg').classList.add('fill-red-500');"
                                class="text-gray-800 text-sm flex items-center hover:bg-gray-100 rounded-md px-4 py-2 transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="w-[18px] h-[18px] mr-3" viewBox="0 0 24 24">
                                    <path
                                        d="M18 2c2.206 0 4 1.794 4 4v12c0 2.206-1.794 4-4 4H6c-2.206 0-4-1.794-4-4V6c0-2.206 1.794-4 4-4zm0-2H6a6 6 0 0 0-6 6v12a6 6 0 0 0 6 6h12a6 6 0 0 0 6-6V6a6 6 0 0 0-6-6z"
                                        data-original="#000000" />
                                    <path d="M12 18a1 1 0 0 1-1-1V7a1 1 0 0 1 2 0v10a1 1 0 0 1-1 1z"
                                        data-original="#000000" />
                                    <path d="M6 12a1 1 0 0 1 1-1h10a1 1 0 0 1 0 2H7a1 1 0 0 1-1-1z"
                                        data-original="#000000" />
                                </svg>
                                <span>New Products</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="space-y-2 mb-2">
                        <li>
                            <a href="javascript:void(0)" onclick="document.getElementById('Setting').style.display='block';
                                    document.getElementById('AddProducts').style.display='none';
                                    document.getElementById('Dashboard').style.display='none';
                                    document.getElementById('Products').style.display='none';
                                    document.getElementById('Profile').style.display='none';
                                    resetMenuColors();
                                    this.classList.add('text-red-500');
                                    this.querySelector('svg').classList.add('fill-red-500');"
                                class="text-gray-800 text-sm flex items-center hover:bg-gray-100 rounded-md px-4 py-2 transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="w-[20px] h-[20px] mr-3" viewBox="0 0 24 24">
                                    <path
                                        d="M8.82501 20C8.37501 20 7.98751 19.85 7.66251 19.55C7.33751 19.25 7.14168 18.8833 7.07501 18.45L6.85001 16.8C6.63334 16.7167 6.42918 16.6167 6.23751 16.5C6.04584 16.3833 5.85834 16.2583 5.67501 16.125L4.12501 16.775C3.70834 16.9583 3.29168 16.975 2.87501 16.825C2.45834 16.675 2.13334 16.4083 1.90001 16.025L0.725011 13.975C0.491678 13.5917 0.425011 13.1833 0.525011 12.75C0.625011 12.3167 0.850011 11.9583 1.20001 11.675L2.52501 10.675C2.50834 10.5583 2.50001 10.4458 2.50001 10.3375V9.6625C2.50001 9.55417 2.50834 9.44167 2.52501 9.325L1.20001 8.325C0.850011 8.04167 0.625011 7.68333 0.525011 7.25C0.425011 6.81667 0.491678 6.40833 0.725011 6.025L1.90001 3.975C2.13334 3.59167 2.45834 3.325 2.87501 3.175C3.29168 3.025 3.70834 3.04167 4.12501 3.225L5.67501 3.875C5.85834 3.74167 6.05001 3.61667 6.25001 3.5C6.45001 3.38333 6.65001 3.28333 6.85001 3.2L7.07501 1.55C7.14168 1.11667 7.33751 0.75 7.66251 0.45C7.98751 0.15 8.37501 0 8.82501 0H11.175C11.625 0 12.0125 0.15 12.3375 0.45C12.6625 0.75 12.8583 1.11667 12.925 1.55L13.15 3.2C13.3667 3.28333 13.5708 3.38333 13.7625 3.5C13.9542 3.61667 14.1417 3.74167 14.325 3.875L15.875 3.225C16.2917 3.04167 16.7083 3.025 17.125 3.175C17.5417 3.325 17.8667 3.59167 18.1 3.975L19.275 6.025C19.5083 6.40833 19.575 6.81667 19.475 7.25C19.375 7.68333 19.15 8.04167 18.8 8.325L17.475 9.325C17.4917 9.44167 17.5 9.55417 17.5 9.6625V10.3375C17.5 10.4458 17.4833 10.5583 17.45 10.675L18.775 11.675C19.125 11.9583 19.35 12.3167 19.45 12.75C19.55 13.1833 19.4833 13.5917 19.25 13.975L18.05 16.025C17.8167 16.4083 17.4917 16.675 17.075 16.825C16.6583 16.975 16.2417 16.9583 15.825 16.775L14.325 16.125C14.1417 16.2583 13.95 16.3833 13.75 16.5C13.55 16.6167 13.35 16.7167 13.15 16.8L12.925 18.45C12.8583 18.8833 12.6625 19.25 12.3375 19.55C12.0125 19.85 11.625 20 11.175 20H8.82501ZM9.00001 18H10.975L11.325 15.35C11.8417 15.2167 12.3208 15.0208 12.7625 14.7625C13.2042 14.5042 13.6083 14.1917 13.975 13.825L16.45 14.85L17.425 13.15L15.275 11.525C15.3583 11.2917 15.4167 11.0458 15.45 10.7875C15.4833 10.5292 15.5 10.2667 15.5 10C15.5 9.73333 15.4833 9.47083 15.45 9.2125C15.4167 8.95417 15.3583 8.70833 15.275 8.475L17.425 6.85L16.45 5.15L13.975 6.2C13.6083 5.81667 13.2042 5.49583 12.7625 5.2375C12.3208 4.97917 11.8417 4.78333 11.325 4.65L11 2H9.02501L8.67501 4.65C8.15834 4.78333 7.67918 4.97917 7.23751 5.2375C6.79584 5.49583 6.39168 5.80833 6.02501 6.175L3.55001 5.15L2.57501 6.85L4.72501 8.45C4.64168 8.7 4.58334 8.95 4.55001 9.2C4.51668 9.45 4.50001 9.71667 4.50001 10C4.50001 10.2667 4.51668 10.525 4.55001 10.775C4.58334 11.025 4.64168 11.275 4.72501 11.525L2.57501 13.15L3.55001 14.85L6.02501 13.8C6.39168 14.1833 6.79584 14.5042 7.23751 14.7625C7.67918 15.0208 8.15834 15.2167 8.67501 15.35L9.00001 18ZM10.05 13.5C11.0167 13.5 11.8417 13.1583 12.525 12.475C13.2083 11.7917 13.55 10.9667 13.55 10C13.55 9.03333 13.2083 8.20833 12.525 7.525C11.8417 6.84167 11.0167 6.5 10.05 6.5C9.06668 6.5 8.23751 6.84167 7.56251 7.525C6.88751 8.20833 6.55001 9.03333 6.55001 10C6.55001 10.9667 6.88751 11.7917 7.56251 12.475C8.23751 13.1583 9.06668 13.5 10.05 13.5Z"
                                        data-original="#000000" />
                                </svg>
                                <span>Setting</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="space-y-2 mb-2">
                        <li>
                            <a href="javascript:void(0)" onclick=" document.getElementById('Profile').style.display='block';
                                    document.getElementById('AddProducts').style.display='none';
                                    document.getElementById('Dashboard').style.display='none';
                                    document.getElementById('Products').style.display='none';
                                    document.getElementById('Setting').style.display='none';
                                    resetMenuColors();
                                    this.classList.add('text-red-500');
                                    this.querySelector('svg').classList.add('fill-red-500');"
                                class="text-gray-800 text-sm flex items-center hover:bg-gray-100 rounded-md px-4 py-2 transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="w-[18px] h-[18px] mr-3" viewBox="0 0 512 512">
                                    <path
                                        d="M437.02 74.98C388.668 26.63 324.379 0 256 0S123.332 26.629 74.98 74.98C26.63 123.332 0 187.621 0 256s26.629 132.668 74.98 181.02C123.332 485.37 187.621 512 256 512s132.668-26.629 181.02-74.98C485.37 388.668 512 324.379 512 256s-26.629-132.668-74.98-181.02zM111.105 429.297c8.454-72.735 70.989-128.89 144.895-128.89 38.96 0 75.598 15.179 103.156 42.734 23.281 23.285 37.965 53.687 41.742 86.152C361.641 462.172 311.094 482 256 482s-105.637-19.824-144.895-52.703zM256 269.507c-42.871 0-77.754-34.882-77.754-77.753C178.246 148.879 213.13 114 256 114s77.754 34.879 77.754 77.754c0 42.871-34.883 77.754-77.754 77.754zm170.719 134.427a175.9 175.9 0 0 0-46.352-82.004c-18.437-18.438-40.25-32.27-64.039-40.938 28.598-19.394 47.426-52.16 47.426-89.238C363.754 132.34 315.414 84 256 84s-107.754 48.34-107.754 107.754c0 37.098 18.844 69.875 47.465 89.266-21.887 7.976-42.14 20.308-59.566 36.542-25.235 23.5-42.758 53.465-50.883 86.348C50.852 364.242 30 312.512 30 256 30 131.383 131.383 30 256 30s226 101.383 226 226c0 56.523-20.86 108.266-55.281 147.934zm0 0"
                                        data-original="#000000" />
                                </svg>
                                <span>Profile</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="space-y-2 mb-2">
                        <li>
                            <a href="javascript:void(0)" onclick="document.getElementById('popup-modal').style.display='block';
                                    document.getElementById('Profile').style.display='none';
                                    document.getElementById('AddProducts').style.display='none';
                                    document.getElementById('Dashboard').style.display='none';
                                    document.getElementById('Products').style.display='none';
                                    resetMenuColors();
                                    this.classList.add('text-red-500');
                                    this.querySelector('svg').classList.add('fill-red-500');"
                                class="text-gray-800 text-sm flex items-center hover:bg-gray-100 rounded-md px-4 py-2 transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="w-[18px] h-[18px] mr-3" viewBox="0 0 6.35 6.35">
                                    <path
                                        d="M3.172.53a.265.266 0 0 0-.262.268v2.127a.265.266 0 0 0 .53 0V.798A.265.266 0 0 0 3.172.53zm1.544.532a.265.266 0 0 0-.026 0 .265.266 0 0 0-.147.47c.459.391.749.973.749 1.626 0 1.18-.944 2.131-2.116 2.131A2.12 2.12 0 0 1 1.06 3.16c0-.65.286-1.228.74-1.62a.265.266 0 1 0-.344-.404A2.667 2.667 0 0 0 .53 3.158a2.66 2.66 0 0 0 2.647 2.663 2.657 2.657 0 0 0 2.645-2.663c0-.812-.363-1.542-.936-2.03a.265.266 0 0 0-.17-.066z"
                                        data-original="#000000" />
                                </svg>
                                <span>Logout</span>
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
                    <div class="px-8 font-[sans-serif] overflow-x-auto">
                        <div class="mb-4">
                            <h2 class="text-2xl font-bold">Products List</h2>
                        </div>
                        <?php
                        include '../database/db_connection.php';

                        $limit = isset($_GET['limit']) ? intval($_GET['limit']) : 10;
                        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
                        $offset = ($page - 1) * $limit;

                        $total_sql = "SELECT COUNT(*) as total FROM products";
                        $total_result = $conn->query($total_sql);
                        $total_row = $total_result->fetch_assoc();
                        $total_records = $total_row['total'];
                        $total_pages = ceil($total_records / $limit);

                        $sql = "SELECT id, name, description, image FROM products ORDER BY id DESC LIMIT $limit OFFSET $offset";
                        $result = $conn->query($sql);
                        ?>
                        <div class="overflow-auto max-h-[700px]">
                            <table class="min-w-full bg-gray-50">
                                <thead>
                                    <tr class="font-bold bg-red-50 border-2">
                                        <th class="p-4 text-left text-sm font-semibold">ID</th>
                                        <th class="p-4 text-left text-sm font-semibold">Name</th>
                                        <th class="p-4 text-left text-sm font-semibold">Description</th>
                                        <th class="p-4 text-left text-sm font-semibold">Image</th>
                                        <th class="p-4 text-left text-sm font-semibold">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="overflow-y-auto">
                                    <?php if ($result->num_rows > 0): ?>
                                    <?php while ($row = $result->fetch_assoc()): ?>
                                    <tr class="text-sm">
                                        <td class="px-4 border-b w-0.5/5"><?= $row["id"] ?></td>
                                        <td class="px-4 border-b w-1/5"><?= $row["name"] ?></td>
                                        <td class="px-4 border-b w-2/5 text-justify">
                                            <?= $row["description"] ?>
                                        </td>
                                        <td class="px-4 border-b w-1/5"><img src="../images/<?= $row["image"] ?>"
                                                alt="Product Image" class="w-16 h-16"></td>
                                        <td class="px-4 border-b w-0.5/5">
                                            <button onclick='getProductById(<?= $row["id"] ?>)' class="mr-4"
                                                title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-5 fill-blue-500 hover:fill-blue-700"
                                                    viewBox="0 0 348.882 348.882">
                                                    <path
                                                        d="m333.988 11.758-.42-.383A43.363 43.363 0 0 0 304.258 0a43.579 43.579 0 0 0-32.104 14.153L116.803 184.231a14.993 14.993 0 0 0-3.154 5.37l-18.267 54.762c-2.112 6.331-1.052 13.333 2.835 18.729 3.918 5.438 10.23 8.685 16.886 8.685h.001c2.879 0 5.693-.592 8.362-1.76l52.89-23.138a14.985 14.985 0 0 0 5.063-3.626L336.771 73.176c16.166-17.697 14.919-45.247-2.783-61.418zM130.381 234.247l10.719-32.134.904-.99 20.316 18.556-.904.99-31.035 13.578zm184.24-181.304L182.553 197.53l-20.316-18.556L294.305 34.386c2.583-2.828 6.118-4.386 9.954-4.386 3.365 0 6.588 1.252 9.082 3.53l.419.383c5.484 5.009 5.87 13.546.861 19.03z"
                                                        data-original="#000000" />
                                                    <path
                                                        d="M303.85 138.388c-8.284 0-15 6.716-15 15v127.347c0 21.034-17.113 38.147-38.147 38.147H68.904c-21.035 0-38.147-17.113-38.147-38.147V100.413c0-21.034 17.113-38.147 38.147-38.147h131.587c8.284 0 15-6.716 15-15s-6.716-15-15-15H68.904C31.327 32.266.757 62.837.757 100.413v180.321c0 37.576 30.571 68.147 68.147 68.147h181.798c37.576 0 68.147-30.571 68.147-68.147V153.388c.001-8.284-6.715-15-14.999-15z"
                                                        data-original="#000000" />
                                                </svg>
                                            </button>
                                            <button onclick='deleteProduct(<?= $row["id"] ?>)' type="submit"
                                                title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-5 fill-red-500 hover:fill-red-700" viewBox="0 0 24 24">
                                                    <path
                                                        d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                                        data-original="#000000" />
                                                    <path
                                                        d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                                        data-original="#000000" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                    <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="py-2 px-4 border-b text-center">No products found
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="md:flex mt-4">
                            <p class="text-sm text-gray-500 flex-1">
                                Showing <?= $offset + 1 ?> to <?= min($offset + $limit, $total_records) ?> of
                                <?= $total_records ?> entries
                            </p>
                            <div class="flex items-center max-md:mt-4">
                                <p class="text-sm text-gray-500">Display</p>
                                <select
                                    class="text-sm text-gray-500 border border-gray-400 rounded h-7 mx-4 px-1 outline-none"
                                    onchange="window.location.href='?page=1&limit=' + this.value;">
                                    <option value="5" <?= $limit == 5 ? 'selected' : '' ?>>5</option>
                                    <option value="10" <?= $limit == 10 ? 'selected' : '' ?>>10</option>
                                    <option value="20" <?= $limit == 20 ? 'selected' : '' ?>>20</option>
                                    <option value="50" <?= $limit == 50 ? 'selected' : '' ?>>50</option>
                                    <option value="100" <?= $limit == 100 ? 'selected' : '' ?>>100</option>
                                </select>
                                <ul class="flex space-x-1 ml-2">
                                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                    <li
                                        class="flex items-center justify-center cursor-pointer text-sm w-7 h-7 <?= $page == $i ? 'bg-[#007bff] text-white' : 'text-gray-500' ?> rounded">
                                        <a href="<?= $_SERVER['PHP_SELF'] ?>?page=<?= $i ?>&limit=<?= $limit ?>"
                                            class="block w-full h-full text-center leading-7"><?= $i ?></a>
                                    </li>
                                    <?php endfor; ?>
                                </ul>
                            </div>
                        </div>

                        <div id=" editProductModal"
                            class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
                            <div class="bg-white p-6 rounded shadow-lg w-full max-w-md">
                                <h2 class="text-xl font-semibold mb-4">Update Product</h2>
                                <form id="updateForm" onsubmit="submitForm(event)">
                                    <input type="hidden" id="update-id" name="update-id">
                                    <div class="mb-4">
                                        <label for="update-name" class="block text-sm font-medium">Name</label>
                                        <input type="text" id="update-name" name="update-name"
                                            class="w-full border rounded px-3 py-2" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="update-description"
                                            class="block text-sm font-medium">Description</label>
                                        <textarea id="update-description" name="update-description"
                                            class="w-full border rounded px-3 py-2" rows="4" required></textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label for="update-image-preview" class="block text-sm font-medium">Current
                                            Image</label>
                                        <img id="update-image-preview" class="w-32 h-32 object-cover mb-2">
                                        <input type="file" id="update-image" name="update-image"
                                            class="w-full border rounded px-3 py-2" accept="image/*">
                                    </div>
                                    <div class="flex justify-end space-x-2">
                                        <button type="button" onclick="closeModal()"
                                            class="bg-gray-300 text-gray-700 px-4 py-2 rounded">Cancel</button>
                                        <button type="submit"
                                            class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <script>
                        function getProductById(productId) {
                            fetch('../database/fetch_product_by_id.php', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json'
                                    },
                                    body: JSON.stringify({
                                        id: productId
                                    }),
                                })
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error(`HTTP error! Status: ${response.status}`);
                                    }
                                    return response.json();
                                })
                                .then(data => {
                                    if (data.error) {
                                        alert(data.error);
                                        return;
                                    }

                                    // Populate the form with fetched product details
                                    document.getElementById('update-name').value = data.name;
                                    document.getElementById('update-description').value = data
                                        .description;

                                    // Display the current product image as a preview
                                    const imagePreview = document.getElementById(
                                        'update-image-preview');
                                    imagePreview.src = `../images/${data.image}`;
                                    imagePreview.alt = 'Product Image';

                                    // Show the modal
                                    document.getElementById('editProductModal').classList.remove(
                                        'hidden');
                                })
                                .catch(error => {
                                    console.error('Error fetching product:', error);
                                    alert('An error occurred while fetching product details.');
                                });
                        }

                        function deleteProduct(id) {
                            if (confirm("Are you sure you want to delete this product?")) {
                                fetch('../database/delete_product.php', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json'
                                        },
                                        body: JSON.stringify({
                                            id: id
                                        }),
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            alert("Product deleted successfully!");
                                        } else {
                                            alert("Error deleting data: " + data.error);
                                        }
                                    })
                                    .catch(error => console.error("Error:", error));
                            }
                        }
                        </script>

                        <script>
                        function submitForm(event) {
                            event.preventDefault();
                            const formData = new FormData(document.getElementById('updateForm'));

                            fetch('../database/update_product.php', {
                                    method: 'POST',
                                    body: formData,
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        alert('Product updated successfully!');
                                        closeModal();
                                    } else {
                                        alert('Failed to update product.');
                                    }
                                })
                                .catch(error => console.error('Error:', error));
                        }

                        function closeModal() {
                            document.getElementById('editProductModal').classList.add('hidden');
                        }
                        </script>

                    </div>
                </div>
            </section>

            <section class="main-content w-full overflow-auto p-6 hidden" id="AddProducts">
                <div id="alert-message" class="font-[sans-serif] space-y-6 hidden">
                    <div class="bg-green-100 text-green-800 p-4 rounded-lg relative" role="alert">
                        <strong class="font-bold text-sm">Success!</strong>
                        <span class="block text-sm sm:inline max-sm:mt-2 max-sm:ml-0 ml-4 mr-8">Products is created
                            successfully!</span>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-7 hover:bg-green-200 rounded-lg transition-all p-2 cursor-pointer fill-green-500 absolute right-4 top-1/2 -translate-y-1/2"
                            viewBox="0 0 320.591 320.591"
                            onclick="document.getElementById('alert-message').classList.add('hidden');">
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
                        <span class="block text-sm sm:inline max-sm:mt-2 max-sm:ml-0 ml-4 mr-8">Failed to created
                            products! Please try again later...</span>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-7 hover:bg-red-200 rounded-lg transition-all p-2 cursor-pointer fill-red-500 absolute right-4 top-1/2 -translate-y-1/2"
                            viewBox="0 0 320.591 320.591"
                            onclick="document.getElementById('alert-message-error').classList.add('hidden');">
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
                        <span class="block text-sm sm:inline max-sm:mt-2 max-sm:ml-0 ml-4 mr-8">The textbox is clear all
                            data that your input!</span>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-7 hover:bg-yellow-200 rounded-lg transition-all p-2 cursor-pointer fill-yellow-500 absolute right-4 top-1/2 -translate-y-1/2"
                            viewBox="0 0 320.591 320.591"
                            onclick="document.getElementById('alert-message-warning').classList.add('hidden');">
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
                        <h2 class="p-4 text-2xl font-bold mb-4">Add New Product</h2>
                        <form id="productForm" onsubmit="submitForm(event)">
                            <div class="p-4 space-y-2">
                                <label class=" font-md text-slate-500" for="product-name">
                                    Product Name
                                </label>
                                <input
                                    class="block border border-slate-100 shadow-sm w-full px-2 py-3 rounded-md focus:outline-none focus:border-red-500 focus:ring-1 ring-red-500 text-slate-500"
                                    type="text" id="name" name="name" required>
                                </input>
                            </div>
                            <div class="p-4 space-y-2">
                                <label class=" font-md text-slate-500" for="product-description">
                                    Product Description
                                </label>
                                <textarea
                                    class="block border border-slate-100 shadow-sm w-full px-2 py-3 rounded-md focus:outline-none focus:border-red-500 focus:ring-1 ring-red-500 text-slate-500"
                                    id="description" name="description" required rows="5">
                                    </textarea>
                            </div>
                            <div class="p-4 space-y-2">
                                <label class=" font-md text-slate-500" for="product-category">
                                    Product Category
                                </label>
                                <input
                                    class="block border border-slate-100 shadow-sm w-full px-2 py-3 rounded-md focus:outline-none focus:border-red-500 focus:ring-1 ring-red-500 text-slate-500"
                                    id="product-category" type="text">
                                </input>
                            </div>
                            <div class="p-4 space-y-2">
                                <label class=" font-md text-slate-500" for="product-image">
                                    Product Image
                                </label>
                                <label id="lable-image"
                                    class="block hover:border-red-500 border-2 border-dashed border-slate-100 shadow-sm w-full px-2 h-52 rounded-md text-slate-500 cursor-pointer flex flex-col justify-center items-center">
                                    <div id="upload-icon" class="flex justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-11 mb-2 fill-gray-500"
                                            viewBox="0 0 32 32">
                                            <path
                                                d="M23.75 11.044a7.99 7.99 0 0 0-15.5-.009A8 8 0 0 0 9 27h3a1 1 0 0 0 0-2H9a6 6 0 0 1-.035-12 1.038 1.038 0 0 0 1.1-.854 5.991 5.991 0 0 1 11.862 0A1.08 1.08 0 0 0 23 13a6 6 0 0 1 0 12h-3a1 1 0 0 0 0 2h3a8 8 0 0 0 .75-15.956z"
                                                data-original="#000000" />
                                            <path
                                                d="M20.293 19.707a1 1 0 0 0 1.414-1.414l-5-5a1 1 0 0 0-1.414 0l-5 5a1 1 0 0 0 1.414 1.414L15 16.414V29a1 1 0 0 0 2 0V16.414z"
                                                data-original="#000000" />
                                        </svg>
                                    </div>
                                    <span id="file-name" class="text-xs font-medium text-gray-400 mt-2">Only .png,
                                        .jpeg, .jpg are allowed.</span>
                                    <input type="file" id="image" name="image" accept="image/*" class="hidden"
                                        accept=".jpg, .jpeg, .png"
                                        onchange="displayFileName(this); if(this.files.length > 0); document.getElementById('file-name').style.display = 'none'; document.getElementById('upload-icon').style.display = 'none';" />
                                    <img id="preview-image" class="hidden w-full h-52 object-contain rounded" />
                                </label>
                            </div>
                            <div class="p-4 space-x-4 flex justify-end">
                                <button
                                    class="text-white bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline font-[sans-serif]"
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
                                    class="text-white bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline font-[sans-serif]"
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
                </div>
            </section>

            <section class="main-content w-full overflow-auto p-6 hidden" id="Setting">
                <div class="flex items-center">
                    <h1>Setting</h1>
                </div>
            </section>

            <section class="main-content w-full overflow-auto p-6 hidden" id="Profile">
                <div class="flex items-center">
                    <h1>Profile</h1>
                </div>
            </section>
        </div>
        <!-- <div class="flex items-center space-x-2">
            <div id="popup-modal" tabindex="-1"
                class="hidden fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-gray-900 bg-opacity-50">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="popup-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you
                                want to
                                delete this product?</h3>
                            <button data-modal-hide="popup-modal" type="button"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Yes, I'm sure
                            </button>
                            <button data-modal-hide="popup-modal" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</body>

</html>