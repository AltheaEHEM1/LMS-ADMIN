@include('Asidebar_header')
<!-- Direction of Tabs -->
<section class="bg-gray-100 fixed ml-72 px-11 py-6 w-full top-20 left-0"> 
    <p class="text-sm text-gray-600">
        <i class="fas fa-home text-gray-800"></i>
        <a a href="/DASHBORDandingpage_employee">Dashboard</a> / Circulation Reports
    </p>
</section>

        <!-- Scrollable Box below the Direction Tabs -->
        <div class="bg-white border border-gray-300 rounded-lg h-[75vh] overflow-y-auto shadow-sm fixed top-[calc(8rem+1rem)] left-[59%] transform -translate-x-1/2 w-3/4">
            <div class="p-4 text-center text-gray-500">
                <!--Content -->
                <div class="p-4 border-b flex justify-between items-center">
                    <h1 class="text-xl font-semibold text-gray-800">Circulation Reports</h1>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 p-5">
                    <!-- Mostly Issued Items Card -->
                    <div class="bg-[#012A4A] text-white p-6 rounded-lg shadow-lg">
                        <div class="mb-4">
                        <h3 class="text-xl font-semibold flex items-center space-x-2">
                            <span class="text-2xl">📊</span>
                            <span>Mostly Issued Items</span>
                        </h3>
                        </div>
                        <p class="mb-4 text-sm">
                        Check the most frequently issued catalog items in your library. Get insights based on branch locations and item categories.
                        </p>
                        <a href="/Mostly">
                            <button class="px-4 py-2 bg-white text-blue-900 font-medium rounded-lg hover:bg-gray-200 transition">
                                View Reports
                            </button>
                        </a>
                    </div>

                    <!-- Least Circulated Items Card -->
                    <div class="bg-[#012A4A] text-white p-6 rounded-lg shadow-lg">
                        <div class="mb-4">
                        <h3 class="text-xl font-semibold flex items-center space-x-2">
                            <span class="text-2xl">📂</span>
                            <span>Least Circulated Items</span>
                        </h3>
                        </div>
                        <p class="mb-4 text-sm">
                        Identify the catalog items with the lowest circulation in your library. Use this data to optimize inventory and resource allocation.
                        </p>

                        <a href="/Least">
                            <button class="px-4 py-2 bg-white text-blue-900 font-medium rounded-lg hover:bg-gray-200 transition">
                            View Reports
                            </button>
                        </a>
                    </div>

                    <!-- Advance Report Card -->
                    <div class="bg-[#012A4A] text-white p-6 rounded-lg shadow-lg">
                        <div class="mb-4">
                        <h3 class="text-xl font-semibold flex items-center space-x-2">
                            <span class="text-2xl">📖</span>
                            <span>Advance Report</span>
                        </h3>
                        </div>
                        <p class="mb-4 text-sm">
                        Access detailed reports about catalog performance, branch statistics, and item-specific data for strategic decision-making.
                        </p>
                        
                        <a href="/Advance">
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
