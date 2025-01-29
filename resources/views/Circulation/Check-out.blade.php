@include('Asidebar_header')
@vite('resources/js/check-out.js')

    <!-- Direction of Tabs -->
    <section class="bg-gray-100 fixed ml-72 px-11 py-6 w-full top-20 left-0"> 
        <p class="text-sm text-gray-600">
            <i class="fas fa-home text-gray-800"></i>
            <a a href="/DASHBORDandingpage_employee">Dashboard</a>
            <a a href="/CIRCULATION">/ Circulation</a> / Check-out
        </p>
    </section>

    <!-- Scrollable Box below the Direction Tabs -->
    <div class="bg-white border border-gray-300 rounded-lg h-[75vh] overflow-y-auto shadow-sm fixed top-[calc(8rem+1rem)] left-[59%] transform -translate-x-1/2 w-3/4">
        <!-- Header Section -->
        <div class="bg-white p-6">
            <h1 class="text-xl font-bold text-[#012A4A] mb-2">Check-out</h1>
            <hr class="mt-2 border-gray-300" />
        </div>

        <div class="ml-6 rounded-md p-4">
            <!-- Form Fields Section -->
            <div class="col-span-2 grid grid-cols-1 gap-4">

                <!-- Form Fields -->
                <form action="{{ route('circulations.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="customer" class="block text-sm font-medium text-gray-700">Customer</label>
                        <select id="customer" name="customer" class="select2 form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-72">
                            <option value="" disabled selected>Select a customer</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->firstName }} {{ $customer->lastName }}</option>
                            @endforeach
                        </select>
                    </div>
                
                    <div>
                        <label for="book" class="block text-sm font-medium text-gray-700">Book</label>
                        <select id="book" name="book" class="select2 form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-72">
                            <option value="" disabled selected>Select a book</option>
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}">{{ $book->title }} ({{ $book->copies }} copies available)</option>
                            @endforeach
                        </select>
                    </div>
                
                    <div>
                        <label for="borrowed_date" class="block text-sm font-medium text-gray-700">Borrowed Date</label>
                        <input type="date" id="borrowed_date" name="borrowed_date" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-72">
                    </div>
                
                    <div>
                        <label for="due_date" class="block text-sm font-medium text-gray-700">Due Date</label>
                        <input type="date" id="due_date" name="due_date" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-72" min="" required>
                    </div>
                
                    <div>
                        <label for="copies_borrowed" class="block text-sm font-medium text-gray-700">Copies Borrowed</label>
                        <input type="number" id="copies_borrowed" name="copies_borrowed" min="1" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-72">
                    </div>
                
                    <div class="flex mt-2">
                        <button id="saveButton" class="px-4 py-2 bg-gray-300 text-white rounded-md hover:bg-[#012A4A]">
                            Save Changes
                        </button>
                    </div>
                </form>

                <!-- Save Changes Button (Moved to Next Line) -->
                
            </div>

        </div>
    </div>

<!-- Upload Cover Photo Modal -->
<div id="uploadModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-md text-center">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Upload Cover Photo</h2>
        <input type="file" id="fileInput" class="mb-4 border border-gray-300 p-2 w-full rounded-md">
        <div class="flex items-center justify-center space-x-4">
            <button onclick="closeModal('uploadModal')" class="px-4 py-2 bg bg-gray-400 text-white rounded-md">Close</button>
            <button onclick="closeModal('uploadModal')" class="px-4 py-2 bg-[#012A4A] text-white rounded-md">Upload</button>
        </div>
    </div>
</div>

<!-- Save Changes Pop-Up Modal -->
<div id="saveModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-10 rounded-lg shadow-md text-center w-1/4">
        <div class="flex justify-center mb-4">
            <i class="fas fa-check-circle text-green-500 text-4xl"></i>
        </div>
        <p class="text-gray-700 font-medium text-2xl">Added Successfully!</p>
        <button onclick="closeModal('saveModal')" class="mt-4 px-4 py-2 bg-green-500 text-white rounded-md">OK</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get today's date in YYYY-MM-DD format
        const today = new Date().toISOString().split('T')[0];

        // Set the minimum date for the due_date input
        const dueDateInput = document.getElementById('due_date');
        dueDateInput.setAttribute('min', today);
    });
</script>