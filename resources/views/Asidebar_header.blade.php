<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/tabicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!--for the graph-->
    @vite('resources/js/Asidebar.js')

    <title>Novella</title>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .sidebar-item {
            transition: background-color 0.1s ease, transform 0.1s ease;
        }
        .sidebar-item:hover {
            background-color: #028ABE;
            transform: translateX(5px);
        }
        .sidebar-item.active {
            background-color: #0E519B !important;
        }
        .sidebar-item.active:hover {
            background-color: #028ABE;
        }
        .fixed-icons {
            position: fixed;
            top: 16px;
            right: 16px;
            z-index: 20;
            display: flex;
            align-items: center;
            gap: 16px;
        }
    </style>
</head>
<body class="bg-gray-100 h-full">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="sidebar bg-[#012A4A] text-white flex flex-col w-72 fixed top-0 left-0 h-full z-10">
            <div class="p-5">
                <!-- Logo -->
                <div class="mb-10 mt-6">
                    <img src="./images/logo_login_headerC.png" alt="Logo" class="w-36 mx-auto">
                </div>

                <!-- Navigation Menu -->
                <ul class="mt-20">
                    <li><a href="/DASHBORDandingpage_employee" id="dashboard" class="sidebar-item flex items-center py-3 px-6 rounded-lg">
                        <i class="fas fa-tachometer-alt mr-4"></i> Dashboard</a></li>
                    <li><a href="/EMPLOYEE" id="employee" class="sidebar-item flex items-center py-3 px-6 rounded-lg">
                        <i class="fas fa-user-tie mr-4"></i> Employee</a></li>
                    <li><a href="/RESERVATION" id="Reservation" class="sidebar-item flex items-center py-3 px-6 rounded-lg">
                        <i class="fas fa-calendar-check mr-4"></i> Reservations</a></li>
                    <li><a href="/CATALOG" id="catalog" class="sidebar-item flex items-center py-3 px-6 rounded-lg">
                        <i class="fas fa-book-open mr-4"></i> Catalog</a></li>
                    <li><a href="/MEMBERS" id="members" class="sidebar-item flex items-center py-3 px-6 rounded-lg">
                        <i class="fas fa-users mr-4"></i> Members</a></li>
                    <li><a href="/CIRCULATION" id="circulation" class="sidebar-item flex items-center py-3 px-6 rounded-lg">
                        <i class="fas fa-exchange-alt mr-4"></i> Circulations</a></li>
                    <li><a href="/CIRCULATION_REPORTS" id="circulation_reports" class="sidebar-item flex items-center py-3 px-6 rounded-lg">
                        <i class="fas fa-chart-line mr-4"></i> Circulation Reports</a></li>
                    <li><a href="/MEMBER_REPORTS" id="member_reports" class="sidebar-item flex items-center py-3 px-6 rounded-lg">
                        <i class="fas fa-file-alt mr-4"></i> Member Reports</a></li>
                    <li><a href="/OVERDUE_REPORTS" id="overdue_reports" class="sidebar-item flex items-center py-3 px-6 rounded-lg">
                        <i class="fas fa-clock mr-4"></i> Overdue Reports</a></li>
                    <li><a href="/CATALOG_REPORTS" id="catalog_reports" class="sidebar-item flex items-center py-3 px-6 rounded-lg">
                        <i class="fas fa-chart-pie mr-4"></i> Catalog Reports</a></li>
                </ul>
            </div>
        </aside>
    </div>

    <div class="flex-1 ml-72 overflow-y-auto relative bg-blue-100">
        <!-- Header -->
        <header class="flex items-center px-10 py-4 bg-white shadow-md z-20 fixed top-0 w-full border-b border-gray-200">
            <!-- User Name & Role -->
            <a href="/Profile" class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-gray-300 rounded-full"></div>
                <div>
                    <p class="font-semibold text-gray-800">[NAME]</p>
                    <p class="text-sm text-gray-500">Administrator</p>
                </div>
            </a>

            <!-- Fixed Bell and Dropdown Icons -->
            <div class="fixed-icons">
                <!-- Notification Icon -->
               <div class="relative">
                    <i id="notificationIcon" class="fa fa-bell text-gray text-xl hover:text-[#028ABE] cursor-pointer"></i>
                    <!-- Notification Badge -->
                    <span id="notificationBadge" class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 bg-red-500 text-white text-xs font-bold rounded-full px-2 py-0.5">
                    5
                    </span>
                    <!-- Notification Box -->
                    <div id="notificationBox" class="absolute top-10 right-0 bg-white border border-gray-300 rounded-lg shadow-lg w-72 max-h-96 overflow-y-auto hidden z-50">
                    <div class="p-4 border-b border-gray-200 cursor-pointer hover:bg-gray-100">New message received</div>
                    <div class="p-4 border-b border-gray-200 cursor-pointer hover:bg-gray-100">Your book is ready for pickup</div>
                    <div class="p-4 border-b border-gray-200 cursor-pointer hover:bg-gray-100">Reminder: Return due tomorrow</div>
                    <div class="p-4 text-center text-gray-500">No more notifications</div>
                    </div>
                </div>




                <div class="relative">
                    <button id="dropdownButton" class="flex items-center space-x-2 focus:outline-none">
                        <i class="fas fa-cog text-gray-600"></i>
                        <i class="fas fa-chevron-down text-gray-600"></i>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded-lg shadow-lg z-50">
                        <a href="/Settings" id="settingsLink" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-cog mr-2"></i>Settings
                        </a>
                        <a href="#" onclick="openModal('LogoutModal')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                        </a>
                    </div>
                </div>
            </div>
        </header>
    </div>

   <!-- Modal Background with opacity (Initially hidden) -->
    <div id="LogoutModal" class="fixed inset-0 bg-gray-500 bg-opacity-50 items-center justify-center z-50 hidden">
        <!-- Modal Content -->
        <div class="bg-white p-6 rounded-lg shadow-md w-[60%] max-w-sm relative">
            <h1 class="text-2xl font-semibold text-center mb-6">Are you sure you want to log out of this account?</h1>

            <div class="flex justify-center space-x-4">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                <!-- Cancel Button -->
                <button type="button" onclick="closeModal('LogoutModal')" class="flex items-center px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-200">
                    <i class="fas fa-times mr-2"></i> Cancel
                </button>

                <!-- Log Out Button -->
                <button type="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition-colors duration-300">
                    <i class="fas fa-sign-out-alt mr-2"></i> Log out
                </button>

            </div>
        </div>
    </div>


