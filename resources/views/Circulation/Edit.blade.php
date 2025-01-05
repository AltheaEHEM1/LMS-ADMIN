@include('Asidebar_header')

    <!-- Direction of Tabs -->
    <section class="bg-gray-100 fixed ml-72 px-11 py-6 w-full top-20 left-0"> 
        <p class="text-sm text-gray-600">
            <i class="fas fa-home text-gray-800"></i>
            <a a href="/DASHBORDandingpage_employee">Dashboard</a>
            <a a href="/CIRCULATION">/ Circulation</a> / Edit
        </p>
    </section>

    <!-- Scrollable Box below the Direction Tabs -->
    <div class="bg-white border border-gray-300 rounded-lg h-[75vh] overflow-y-auto shadow-sm fixed top-[calc(8rem+1rem)] left-[59%] transform -translate-x-1/2 w-3/4">
        <!-- Header Section -->
        <div class="bg-white p-6">
            <h1 class="text-xl font-bold text-[#012A4A] mb-2">Edit</h1>
            <hr class="mt-2 border-gray-300" />
        </div>

        <div class="ml-30 rounded-md p-6 mb-6 w-3/4 mx-auto">
            <div class="space-y-6 flex justify-center items-center">
                <div class="flex flex-col p-6">
                    <!-- Row 1: Member, Phone Number, Email -->
                    <div class="flex space-x-8 items-center justify-center">
                        <div class="p-4">
                            <label class="block text-sm font-medium text-gray-700">Member</label>
                            <div class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 bg-gray-100">
                                John Doe
                            </div>
                        </div>

                        <div class="p-4">
                            <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <div class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 bg-gray-100">
                                123-456-7890
                            </div>
                        </div>

                        <div class="p-4">
                            <label class="block text-sm font-medium text-gray-700">Email Address</label>
                            <div class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 bg-gray-100">
                                john.doe@example.com
                            </div>
                        </div>
                    </div>

                    <!-- Row 2: Booking Date, Returning Date, Status -->
                    <div class="flex space-x-8 items-center justify-center">
                        <div class="p-4">
                            <label class="block text-sm font-medium text-gray-700">Booking Date</label>
                            <input id="bookingDate" type="date" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>

                        <div class="p-4">
                            <label class="block text-sm font-medium text-gray-700">Returning Date</label>
                            <input id="returningDate" type="date" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>

                        <div class="p-4">
                            <label class="block text-sm font-medium text-gray-700">Status</label>
                            <select id="status" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 focus:outline-none focus:ring-2 focus:ring-green-500">
                                <option value="overdue">Overdue</option>
                                <option value="cancelled">Cancelled</option>
                                <option value="checkin">Check-in</option>
                            </select>
                        </div>
                    </div>

                    <!-- Row 3: Quick Return Date, Extend Return Date -->
                    <div class="flex space-x-8 items-center justify-center">
                        <div class="p-4">
                            <label class="block text-sm font-medium text-gray-700">Quick Return Date</label>
                            <input id="quickReturnDate" type="date" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>

                        <div class="p-4">
                            <label class="block text-sm font-medium text-gray-700">Extend Return Date</label>
                            <input id="extendReturnDate" type="date" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                    </div>

                    <!-- Save Changes Button -->
                    <div class="flex justify-center mt-6">
                        <button id="saveButton" class="px-6 py-3 bg-[#012A4A] text-white rounded-md hover:bg-[#013d66]">
                            Save Changes
                        </button>
                    </div>
                </div>
                
            </div>

        </div>

 

 
    </div>

        




<!-- JavaScript for Pop-Ups -->
<script>
    // Function to show modal
    function showModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
    }

    // Function to close modal
    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }

    // Event listeners for buttons
    document.getElementById('uploadButton').addEventListener('click', function () {
        showModal('uploadModal');
    });

    document.getElementById('saveButton').addEventListener('click', function () {
        showModal('saveModal');
    });
</script>
