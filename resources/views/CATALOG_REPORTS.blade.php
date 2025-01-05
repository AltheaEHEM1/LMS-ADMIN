@include('Asidebar_header')
<!-- Direction of Tabs -->
<section class="bg-gray-100 fixed ml-72 px-11 py-6 w-full top-20 left-0"> 
    <p class="text-sm text-gray-600">
        <i class="fas fa-home text-gray-800"></i>
        <a a href="/DASHBORDandingpage_employee">Dashboard</a> / Catalog Reports
    </p>
</section>

<!-- Scrollable Box below the Direction Tabs -->
<div class="bg-white border border-gray-300 rounded-lg h-[75vh] overflow-y-auto shadow-sm fixed top-[calc(8rem+1rem)] left-[59%] transform -translate-x-1/2 w-3/4">
    <div class="p-4 text-center text-gray-500">
        <!--Content-->
        <div class="p-4 border-b flex justify-between items-center">
            <h1 class="text-xl font-semibold text-gray-800">Catalog Reports</h1>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 p-5">
    <!-- Category Reports Card -->
    <div class="bg-[#012A4A] text-white p-6 rounded-lg shadow-lg">
        <div class="mb-4">
            <h3 class="text-xl font-semibold flex items-center space-x-2">
                <span class="text-2xl">📊</span>
                <span>Category Reports</span>
            </h3>
        </div>
        <p class="mb-4 text-sm">
            Analyze the most frequently issued items within different categories in your library. Gain insights based on catalog types and branch locations.
        </p>

        <a href="/Category">
            <button class="px-4 py-2 bg-white text-blue-900 font-medium rounded-lg hover:bg-gray-200 transition">
                View Reports
            </button>
        </a>
    </div>

    <!-- New Copies Card -->
    <div class="bg-[#012A4A] text-white p-6 rounded-lg shadow-lg">
        <div class="mb-4">
            <h3 class="text-xl font-semibold flex items-center space-x-2">
                <span class="text-2xl">📚</span>
                <span>New Copies</span>
            </h3>
        </div>
        <p class="mb-4 text-sm">
            Discover newly added catalog items in your library. Track the circulation of fresh inventory and optimize stock management.
        </p>

        <a href="/New">
            <button class="px-4 py-2 bg-white text-blue-900 font-medium rounded-lg hover:bg-gray-200 transition">
                View Reports
            </button>
        </a>
    </div>

    <!-- Donated Copies Card -->
    <div class="bg-[#012A4A] text-white p-6 rounded-lg shadow-lg">
        <div class="mb-4">
            <h3 class="text-xl font-semibold flex items-center space-x-2">
                <span class="text-2xl">🎁</span>
                <span>Donated Copies</span>
            </h3>
        </div>
        <p class="mb-4 text-sm">
            Access detailed reports on donated catalog items in your library.
        </p>

        <a href="/Donated">
            <button class="px-4 py-2 bg-white text-blue-900 font-medium rounded-lg hover:bg-gray-200 transition">
                View Reports
            </button>
        </a>
    </div>
</div>


       


    </div>
</div>









  

</body>
</html>
