@include('Asidebar_header')
@vite('resources/js/circulation.js')

    <!-- Direction of Tabs -->
    <section class="bg-gray-100 fixed ml-72 px-11 py-6 w-full top-20 left-0"> 
        <p class="text-sm text-gray-600">
            <i class="fas fa-home text-gray-800"></i>
            <a a href="/DASHBORDandingpage_employee">Dashboard</a>
            <a a href="/CATALOG">/ Circulation</a> 
        </p>
    </section>

    <!-- Scrollable Box below the Direction Tabs -->
    <div class="bg-white border border-gray-300 rounded-lg h-[75vh] overflow-y-auto shadow-sm fixed top-[calc(8rem+1rem)] left-[59%] transform -translate-x-1/2 w-3/4">
        <div class="p-6">
            <!-- Header -->
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold text-gray-800">Circulation</h2>
                <div class="flex items-center space-x-2">
                    <input
                        type="text"
                        placeholder="Search"
                        class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 focus:outline-none focus:ring-2 focus:ring-green-500"
                    />
                    <button class="p-2 rounded-md bg-gray-100 hover:bg-gray-200">
                        <i class="fa fa-search w-5 h-5 text-gray-600"></i>
                    </button>
                </div>
            </div>


            <!-- Divider -->
            <hr class="mt-2 border-gray-300" />

            <!-- Action Buttons -->
            <div class="flex items-end space-x-2 px-4 py-4">
                <a href="Check-out" class="bg-white text-[#012A4A] px-4 py-2 border-2 border-[#012A4A] rounded-md hover:bg-[#012A4A] hover:text-white">Check-out</a>
            </div>


            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-[#012A4A] text-white text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Check-out</th>
                            <th class="py-3 px-6 text-left">Due Date</th>
                            <th class="py-3 px-6 text-left">Member</th>
                            <th class="py-3 px-6 text-left">Title</th>
                            <th class="py-3 px-6 text-left">ISBN</th>
                            <th class="py-3 px-6 text-left">Status</th>
                            <th class="py-3 px-6 text-center">Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left text-gray-700">Jan 2, 2025</td>
                            <td class="py-3 px-6 text-left text-gray-700">Jan 2, 2025</td>
                            <td class="py-3 px-6 text-left text-gray-700">A Brief History of Time</td>
                            <td class="py-3 px-6 text-left text-gray-700">Stvyn Policarpio</td>
                            <td class="py-3 px-6 text-left text-gray-700">9780451524935</td>
                            <td class="py-3 px-6 text-left text-gray-700">Overdue</td>
                            <td class="py-3 px-6 text-center">
                                <a href="/Edit" class="text-blue-500 hover:text-blue-700">Edit</a>
                            </td>

                        </tr>
                        <!-- Repeat rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    

    