@include('Asidebar_header')

    <!-- Direction of Tabs -->
    <section class="bg-gray-100 fixed ml-72 px-11 py-6 w-full top-20 left-0"> 
        <p class="text-sm text-gray-600">
            <i class="fas fa-home text-gray-800"></i>
            Dashboard / Catalog / Add Book
        </p>
    </section>

    <!-- Scrollable Box below the Direction Tabs -->
    <div class="bg-white border border-gray-300 rounded-lg h-[75vh] overflow-y-auto shadow-sm fixed top-[calc(8rem+1rem)] left-[59%] transform -translate-x-1/2 w-3/4">
        <!-- Header Section -->
        <div class="bg-white p-6">
            <h1 class="text-xl font-bold text-[#012A4A] mb-2">Add New Item</h1>
            <hr class="mt-2 border-gray-300" />
        </div>

        <div class="ml-6 rounded-md p-6">
            <!-- Form Fields Section -->
            <div class="col-span-2 grid grid-cols-1 gap-4">
                <!-- Form Fields -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Media Type</label>
                    <input id="mediaType" type="text" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Category</label>
                    <input id="category" type="text" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 focus:outline-none focus:ring-2 focus:ring-green-500">
                    <p class="text-sm text-gray-500 mt-1">Category not listed? Please "Add new category" first.</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Title</label>
                    <input id="title" type="text" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">ISBN</label>
                    <input id="isbn" type="text" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">ISBN 13</label>
                    <input id="isbn13" type="text" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Edition</label>
                    <input id="edition" type="text" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Year</label>
                    <input id="year" type="text" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Tag</label>
                    <input id="tag" type="text" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

                <!-- Buttons Section -->
                <div class="flex items-center space-x-2 mt-4">
                    <!-- Upload Cover Photo Button -->
                    <button id="uploadButton" class="px-4 py-2 bg-gray-300 text-white rounded-md hover:bg-[#012A4A]">
                        Upload Cover Photo
                    </button>
                </div>

                <!-- Save Changes Button (Moved to Next Line) -->
                <div class="flex mt-2">
                    <button id="saveButton" class="px-4 py-2 bg-gray-300 text-white rounded-md hover:bg-[#012A4A]">
                        Save Changes
                    </button>
                </div>
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
