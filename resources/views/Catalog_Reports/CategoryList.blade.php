@include('Asidebar_header')
<!-- Direction of Tabs -->
<section class="bg-gray-100 fixed ml-72 px-11 py-6 w-full top-20 left-0"> 
    <p class="text-sm text-gray-600">
        <i class="fas fa-home text-gray-800"></i>
        <a a href="/DASHBORDandingpage_employee">Dashboard</a> 
        <a a href="/CATALOG_REPORTS">/ Catalog Reports</a>/ Catalog List
    </p>
</section>

 <!-- Scrollable Box below the Direction Tabs -->
 <div class="bg-white border border-gray-300 rounded-lg h-[75vh] overflow-y-auto shadow-sm fixed top-[calc(8rem+1rem)] left-[59%] transform -translate-x-1/2 w-3/4">
            <div class="p-4 text-center text-gray-500">
                <!--Content -->

                <div class="p-4 border-b flex justify-between items-center">
                    <h1 class="text-xl font-semibold text-gray-800">[Category Name]</h1>
                    <div class="flex space-x-4">
                        <button class="px-4 py-2 bg-[#012A4A] text-white text-sm rounded hover:bg-blue-600">
                            <i class="fas fa-print"></i> Print
                        </button>

                        <!-- Employee Type Dropdown -->
                        <div>
                            <select class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800" id="employeeType" required>
                                <option value="">Range</option>
                                <option value="security">Today</option>
                                <option value="janitor">Yesterday</option>
                                <option value="technician">Last week</option>
                                <option value="maintenance">This month</option>
                                <option value="maintenance">Last month</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-[#012A4A] text-white">
                                <th class="py-2 px-4 text-center">Title</th>
                                <th class="py-2 px-4 text-center">ISBN</th>
                                <th class="py-2 px-4 text-center">ASIN</th>
                                <th class="py-2 px-4 text-center">Copy</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 px-4">A Brief History of Time</td>
                                <td class="py-3 px-4">9780061120084</td>
                                <td class="py-3 px-4">076790818X</td>
                                <td class="py-3 px-4">2</td>
                            </tr>
                            <!-- Repeat for other rows -->
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

<script>
    const dropdownButton = document.getElementById('dropdown-button');
    const dropdownMenu = document.getElementById('dropdown-menu');

    dropdownButton.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden'); // Toggle the 'hidden' class
    });

    // Close dropdown if clicked outside
    document.addEventListener('click', (event) => {
        if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
        }
    });
</script>

    
</body>
</html>


