<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../assets/css/maicons.css">

    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="../assets/css/theme.css">
</head>
 
<body>
    <header class="px-4 py-2 shadow bg-blue-100">
        <div class="flex justify-between">
            <div class="flex items-center">          
                <div class="text-gray-100 text-xl">
                    <div class="p-2.5 mt-1 flex items-center">
                        <img src="../image/logo.jpg" alt="Logo" class="h-8 w-8 rounded-full">
                        <h3 class="font-bold text-black text-[15px] ml-3 bg-gray-300">Doc-Appoint</h3>
                    </div>
                    <div class="my-2 bg-gray-600 h-[1px]"></div>
                </div>
            </div>

            <div class="flex items-center">
            
                <a href="{{route('notifications/adminnotification')}}">
                    <button data-notifications class="p-3 mr-3 focus:outline-none hover:bg-gray-200 hover:rounded-md" typle="button">
                        <svg class="fill-current w-5" viewBox="-21 0 512 512">
                            <path d="M213.344 512c38.636 0 70.957-27.543 78.379-64H134.965c7.426 36.457 39.746 64 78.379 64zm0 0M362.934 255.98c-.086 0-.172.02-.258.02-82.324 0-149.332-66.988-149.332-149.332 0-22.637 5.207-44.035 14.273-63.277-4.695-.446-9.453-.723-14.273-.723-82.473 0-149.332 66.855-149.332 149.332v59.477c0 42.218-18.496 82.07-50.946 109.503C2.25 370.22-2.55 384.937 1.332 399.297c4.523 16.703 21.035 27.371 38.36 27.371H386.89c18.175 0 35.308-11.777 38.996-29.59 2.86-13.781-2.047-27.543-12.735-36.523-31.02-26.004-48.96-64.215-50.218-104.575zm0 0" />
                            <path style="fill: red;" d="M469.344 106.668c0 58.91-47.754 106.664-106.668 106.664-58.91 0-106.664-47.754-106.664-106.664C256.012 47.758 303.766 0 362.676 0c58.914 0 106.668 47.758 106.668 106.668zm0 0" />
                        </svg>
                    </button>
                </a>

                <button data-dropdown class="flex items-center px-3 py-2 focus:outline-none hover:bg-gray-300 hover:rounded-md" type="button" x-data="{ open: false }" @click="open = true" :class="{ 'bg-gray-200 rounded-md': open }">
                    <img src="../image/profile.png" alt="Profle" class="h-8 w-8 rounded-full">

                    <span class="ml-4 text-sm hidden md:inline-block">Admin</span>
                    <svg class="fill-current w-3 ml-4" viewBox="0 0 407.437 407.437">
                        <path d="M386.258 91.567l-182.54 181.945L21.179 91.567 0 112.815 203.718 315.87l203.719-203.055z" />
                    </svg>

                    <div data-dropdown-items class="text-sm text-left absolute top-0 right-0 mt-16 mr-4 bg-white rounded border border-gray-400 shadow" x-show="open" @click.away="open = false">
                        <ul>
                            <li class="px-4 py-3 border-b hover:bg-gray-200"><a href="{{ route('admin/profile') }}">My Profile</a></li>
                            <li class="px-4 py-3 hover:bg-gray-200"><a href="{{route('logout') }}">Log out</a></li>
                        </ul>
                    </div>
                </button>

            </div>
        </div>
    </header>
 
    <div class="flex flex-row">
        <div class="flex flex-col w-64 h-screen overflow-y-auto bg-gray-900 border-r rtl:border-r-0 rtl:border-l dark:bg-gray-900 dark:border-gray-700">
            <div class="sidebar text-center bg-gray-900">
                <div class="text-gray-100 text-xl">
                    <div class="p-2.5 mt-1 flex items-center">
                        <i class="bi bi-app-indicator px-2 py-1 rounded-md bg-blue-600"></i>
                        <h1 class="font-bold text-gray-200 text-[15px] ml-3">Admin</h1>
                    </div>
                    <div class="my-2 bg-gray-600 h-[1px]"></div>
                </div>

                <a href="{{ route('admin/home') }}">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                        <i class="bi bi-house-door-fill"></i>
                        <span class="text-[15px] ml-4 text-gray-200 font-bold">Home</span>
                    </div>
                </a>
                <a href="{{ route('admin/add_doctor_view') }}">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                        <i class="bi bi-person-plus-fill"></i>
                        <span class="text-[15px] ml-4 text-gray-200 font-bold">Add Doctor</span>
                    </div>
                </a>
                
                <a href="{{ route('admin/appointment') }}">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                        <i class="bi bi-calendar-check-fill"></i>
                        <span class="text-[15px] ml-4 text-gray-200 font-bold">Appointment</span>
                    </div>
                </a>
                <a href="{{ route('admin/showall_doctor_view') }}">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                        <i class="bi bi-people-fill"></i>
                        <span class="text-[15px] ml-4 text-gray-200 font-bold">All Doctor</span>
                    </div>
                </a>
                
                <a href="{{ route('admin/latestnews') }}">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                        <i class="bi bi-people-fill"></i>
                        <span class="text-[15px] ml-4 text-gray-200 font-bold">Update_News</span>
                    </div>
                </a>
                <a href="{{ route('admin/profile') }}">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                        <i class="bi bi-person-fill"></i>
                        <span class="text-[15px] ml-4 text-gray-200 font-bold">Profile</span>
                    </div>
                </a>

                <a href="{{ route('logout') }}">
                    <div class="my-4 bg-gray-600 h-[1px]"></div>
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                        <i class="bi bi-box-arrow-in-right"></i>
                        <span class="text-[15px] ml-4 text-gray-200 font-bold">Logout</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="flex flex-col w-full h-screen px-4 py-8 mt-5">
            <div>@yield('contents')</div>
        </div>
    </div>
</body>
 
</html>
