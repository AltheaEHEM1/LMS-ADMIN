@include('Asidebar_header')
@vite('resources/js/catalog-reports_category.js')

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
        <h1 class="text-xl font-semibold text-gray-800 p-4 border-b flex">Categories</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 p-10">
                <!-- Category Cards-->
                <div class="bg-white p-4 rounded-lg shadow-md transform hover:scale-105 transition-all duration-300">
                        <a href="/CategoryList" class="block">
                                <img 
                                src="https://via.placeholder.com/300x200" 
                                alt="[categoty img]" 
                                class="w-full h-45 object-cover rounded-t-lg"
                                >
                                <div class="p-1 text-center font-semibold">[category name]</div>
                        </a>
                </div>
        </div>
    </div>
</div>