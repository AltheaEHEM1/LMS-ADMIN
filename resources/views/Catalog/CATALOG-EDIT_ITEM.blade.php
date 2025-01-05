@include('Asidebar_header')

<!-- Direction of Tabs -->
<section class="bg-gray-100 fixed ml-72 px-11 py-6 w-full top-20 left-0"> 
    <p class="text-sm text-gray-600">
        <i class="fas fa-home text-gray-800"></i>
        <a a href="/DASHBORDandingpage_employee">Dashboard</a>
        <a a href="/CATALOG">/ Catalog</a>  
        <a a href="/CATALOG-VIEW_ITEM">/ View</a> / Edit
    </p>
</section>

<!-- Scrollable Box below the Direction Tabs -->
<div class="bg-white border border-gray-300 rounded-lg h-[75vh] overflow-y-auto shadow-sm fixed top-[calc(8rem+1rem)] left-[59%] transform -translate-x-1/2 w-3/4">
    <!-- Header Section -->
    <div class="bg-white p-6">
        <h1 class="text-xl font-bold text-bg-[#012A4A] mb-2"> EDIT ITEM ID</h1>
        <hr class="mt-2 border-gray-300" />
    </div>

    {{-- ICONS SECTIONS --}}
    <div class="flex justify-between items-center px-6">
        <a href="CATALOG-VIEW_ITEM" class="px-4 py-2 hover:text text-[#012A4A] flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>
        </a>

        <button class="pr-6 text-red-600 hover:text-red-800 flex items-center">
            <i class="fas fa-trash mr-2"></i>
        </button>
    </div>

    <!-- Media Details Section -->
    <!-- Item Information Section -->
    <div class="rounded-md p-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">

            <!-- Cover Photo Section -->
            <div class="flex flex-col items-center">
                <img src="https://via.placeholder.com/100" class="w-40 h-60 object-cover border rounded-lg shadow-md mb-4">
                <button onclick="toggleCoverPhotoPopup()" class="btn btn-outline-primary px-3 py-2 text-sm border border-gray-300 rounded-md text-[#012A4A] hover:bg-gray-100">
                    Change Cover Photo
                </button>
            </div>

            <!-- Form Fields Section -->
            <div class="col-span-2 grid grid-cols-1 gap-4">
                <!-- Media Type -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Media Type</label>
                    <input id="mediaType" type="text" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

                <!-- Category -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Category</label>
                    <input id="category" type="text" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 focus:outline-none focus:ring-2 focus:ring-green-500">
                    <p class="text-sm text-gray-500 mt-1">Category not listed? Please "Add new category" first.</p>
                </div>

                <!-- Title -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Title</label>
                    <input id="title" type="text" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

                <!-- ISBN -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">ISBN</label>
                    <input id="isbn" type="text" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

                <!-- ISBN 13 -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">ISBN 13</label>
                    <input id="isbn13" type="text" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

                <!-- Edition -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Edition</label>
                    <input id="edition" type="text" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

                <!-- Year -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Year</label>
                    <input id="year" type="text" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

                <!-- Tag -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Tag</label>
                    <input id="tag" type="text" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

            </div>
        </div>
    </div>

    <!-- Save Changes Button -->
    <div class="flex justify-end mt-4">
        <button class="btn btn-primary px-4 py-2 mx-6 my-6 background bg-gray-300 text-white rounded-md hover:bg-[#012A4A]">Save Changes</button>
    </div>

</div>

<!-- Change Cover Photo Popup -->
<div id="cover-photo-popup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-lg font-bold mb-4">Change Cover Photo</h2>
        <form id="change-cover-photo-form">
            <label class="block mb-2 text-sm text-gray-600" for="coverPhoto">Upload New Cover Photo</label>
            <input type="file" id="coverPhoto" class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none mb-4">
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="toggleCoverPhotoPopup()" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md">Cancel</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Upload</button>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript for Popup -->
<script>
    function toggleCoverPhotoPopup() {
        const popup = document.getElementById('cover-photo-popup');
        popup.classList.toggle('hidden');
    }

    // Handle the cover photo upload
    document.getElementById('change-cover-photo-form').addEventListener('submit', function (e) {
        e.preventDefault();
        const coverPhotoInput = document.getElementById('coverPhoto');
        if (coverPhotoInput.files.length > 0) {
            const newCoverPhoto = URL.createObjectURL(coverPhotoInput.files[0]);
            document.getElementById('current-cover-photo').src = newCoverPhoto;
            toggleCoverPhotoPopup();
        }
    });
</script>
