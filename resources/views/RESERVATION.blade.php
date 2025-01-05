@include('Asidebar_header')
<!-- Direction of Tabs -->
<section class="bg-gray-100 fixed ml-72 px-11 py-6 w-full top-20 left-0"> 
    <p class="text-sm text-gray-600">
        <i class="fas fa-home text-gray-800"></i>
        <a a href="/DASHBORDandingpage_employee">Dashboard</a> / Reservation
    </p>
</section>

<!-- Scrollable Box below the Direction Tabs -->
<div class="bg-white border border-gray-300 rounded-lg h-[75vh] overflow-y-auto shadow-sm fixed top-[calc(8rem+1rem)] left-[59%] transform -translate-x-1/2 w-3/4">
    <div class="p-4 text-center text-gray-500">
        <!--cONTENTS-->
        <div class="p-6">
            <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold text-gray-800">Reservations</h2>
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
        </div>


        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-[#012A4A] text-white">
                    <th class="py-2 px-4 text-center">Member</th>
                    <th class="py-2 px-4 text-center">Book Title</th>
                    <th class="py-2 px-4 text-center">Reservation Date</th>
                    <th class="py-2 px-4 text-center">Status</th>
                    <th class="py-2 px-4 text-center">Details</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4">Nadine Borja</td>
                    <td class="py-3 px-4">The 48 Laws of Power</td>
                    <td class="py-3 px-4">01-01-2025</td>
                    <td class="py-3 px-4 text-green-600">Active</td>
                    <td onclick="openModal('ViewModal')" class="py-3 px-4">View</td>
                </tr>
                <!-- Repeat for other rows -->
            </tbody>
        </table>

        <div class="flex justify-center mt-4 space-x-1">
            <button class="w-8 h-8 text-black rounded-full flex items-center justify-center hover:bg-[#011B33] hover:text-[#F4F7FF]">1</button>
            <button class="w-8 h-8 text-black rounded-full flex items-center justify-center hover:bg-[#011B33] hover:text-[#F4F7FF]">2</button>
            <button class="w-8 h-8 text-black rounded-full flex items-center justify-center hover:bg-[#011B33] hover:text-[#F4F7FF]">3</button>
            <button class="w-8 h-8 text-black rounded-full flex items-center justify-center hover:bg-[#011B33] hover:text-[#F4F7FF]">4</button>
            <button class="w-8 h-8 text-black rounded-full flex items-center justify-center hover:bg-[#011B33] hover:text-[#F4F7FF]">5</button>
        </div>
    </div>
</div>

<!--modals-->
        <!-- New Modal -->
        <div id="ViewModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center hidden">
            <div class="bg-white p-7 rounded-lg shadow-md w-[70%] ml-[20%] mt-20">
                <h1 class="text-2xl font-bold mb-4">Reservations</h1>
                <p class="text-gray-600 mb-6">Manage library member or patron accounts and login options.</p>


                <div class="flex gap-8">
    <!-- Book Image -->
    <div class="w-1/3">
        <img src="https://via.placeholder.com/150" alt="Noli Me Tangere" class="w-full h-72 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mt-4">Noli Me Tangere</h2>
        <p class="text-gray-500">Rizal, Jose P.</p>
    </div>

    <!-- Information and Borrowing Sections -->
    <div class="w-2/3 space-y-6">
        <!-- Information Section -->
        <div>
            <h3 class="text-lg font-semibold">Information</h3>
            <div class="text-sm text-gray-600 space-y-1">
                <p><strong>ISBN:</strong> 9710807528</p>
                <p><strong>Publisher:</strong> Mandaluyong City: National Book Store</p>
                <p><strong>Item Type:</strong> Book</p>
                <p><strong>Edition:</strong> Fifth Edition</p>
                <p><strong>Description:</strong> xxii, 381 pages, 1 unnumbered leaf of plate</p>
                <p><strong>Loan Period:</strong> 3 days</p>
            </div>
        </div>

        <!-- Borrower's Information Section -->
        <div>
            <h3 class="text-lg font-semibold">Borrower's Information</h3>
            <div class="text-sm text-gray-600 space-y-1">
                <p><strong>Name:</strong> Althea Amor J. Asis</p>
                <p><strong>Phone no.:</strong> +639123456789</p>
                <p><strong>Email Address:</strong> altheaamorjasis@gmail.com</p>
            </div>
        </div>

        <!-- Borrowing Details Section -->
        <div>
            <h3 class="text-lg font-semibold">Borrowing Details</h3>
            <div class="flex gap-4 items-center">
                <div>
                    <label for="booking-date" class="block text-sm font-medium text-gray-700">Booking date</label>
                    <input type="date" id="booking-date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="returning-date" class="block text-sm font-medium text-gray-700">Returning date</label>
                    <input type="date" id="returning-date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        <option>Approved</option>
                        <option>Denied</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>





                <!-- Modal Footer -->
                <div class="flex justify-end">
                    <button type="button" onclick="closeModal('ViewModal')" class="mr-2 px-3 py-1 bg-gray-300 text-gray-700 rounded hover:bg-gray-200">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-[#011B33]">Save</button>
                </div>


            </div>
        </div>




                    




                   
             










  


</body>
</html>
