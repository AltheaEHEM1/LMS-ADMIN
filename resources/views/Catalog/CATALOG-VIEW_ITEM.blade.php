@include('Asidebar_header')
@vite('resources/js/catalog-view_item.js')


    <!-- Direction of Tabs -->
    <section class="bg-gray-100 fixed ml-72 px-11 py-6 w-full top-20 left-0"> 
        <p class="text-sm text-gray-600">
            <i class="fas fa-home text-gray-800"></i>
            <a a href="/DASHBORDandingpage_employee">Dashboard</a>
            <a a href="/CATALOG">/ Catalog</a>  / View 
        </p>
    </section>

    <!-- Scrollable Box below the Direction Tabs -->
    <div class="bg-white border border-gray-300 rounded-lg h-[75vh] overflow-y-auto shadow-sm fixed top-[calc(8rem+1rem)] left-[59%] transform -translate-x-1/2 w-3/4">
        <!-- Header Section -->
        <div class="bg-white p-6">
            <h1 class="text-xl font-bold text-bg-[#012A4A] mb-2">Details</h1>
            <hr class="mt-2 border-gray-300" />
        </div>

        <div class="flex items-end pl-6 space-x-2">
            <a href="CATALOG" class="px-4 py-2 hover:text text-[#012A4A] flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>
            </a>
            <a href="CATALOG-EDIT_ITEM" class="px-4 py-2 bg-white text-[#012A4A] border-2 border-[#012A4A] rounded-md hover:bg-[#012A4A] hover:text-white">
                Edit Item
            </a>
            <button onclick="togglePopup()" class="px-4 py-2 bg-white text-[#012A4A] border-2 border-[#012A4A] rounded-md hover:bg-[#012A4A] hover:text-white">
                Add New Copy
            </button>
        </div>

        <!-- Media Details Section -->
        <div class="rounded-md mt-4 p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
                <!-- Book Image -->
                <div class="w-full flex justify-center">
                    <div class="w-40 h-56 md:w-48 md:h-64 overflow-hidden rounded-lg shadow-lg">
                        <img src="https://via.placeholder.com/100" class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Book Details -->
                <div class="col-span-2">
                    <div class="grid grid-cols-2 gap-y-2 text-sm text-gray-700">
                        <!-- Labels and Details -->
                        <div class="font-medium text-gray-600">ID:</div>
                        <div id="book-id">10651661</div>

                        <div class="font-medium text-gray-600">Title:</div>
                        <div id="book-title">
                            <a href="#" class="text-blue-500 hover:underline">1984: 75th Anniversary</a>
                        </div>

                        <div class="font-medium text-gray-600">Author:</div>
                        <div id="book-author">George Orwell</div>

                        <div class="font-medium text-gray-600">Category:</div>
                        <div id="book-category">
                            <a href="#" class="text-blue-500 hover:underline">Unknown [Category]</a>
                        </div>

                        <div class="font-medium text-gray-600">Media Type:</div>
                        <div id="book-media-type">Book</div>

                        <div class="font-medium text-gray-600">ISBN:</div>
                        <div id="book-isbn">0451524934</div>

                        <div class="font-medium text-gray-600">ISBN 13:</div>
                        <div id="book-isbn13">9780451524935</div>

                        <div class="font-medium text-gray-600">Edition:</div>
                        <div id="book-edition">7th Edition</div>

                        <div class="font-medium text-gray-600">Year:</div>
                        <div id="book-year">1961</div>

                        <div class="font-medium text-gray-600">Publisher:</div>
                        <div id="book-publisher">Signet Classic</div>

                        <div class="font-medium text-gray-600">Tags:</div>
                        <div id="book-tags">
                            <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded">Classics</span>
                            <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded">Political</span>
                            <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded">Psychological</span>
                            <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded">Satire</span>
                            <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded">Literary</span>
                        </div>

                        <div class="font-medium text-gray-600">Copies:</div>
                        <div id="book-copies">1</div>

                        <div class="font-medium text-gray-600">Active:</div>
                        <div id="book-active">Yes</div>

                        <div class="font-medium text-gray-600">User:</div>
                        <div id="book-user">Administrator</div>

                        <div class="font-medium text-gray-600">Published:</div>
                        <div id="IsbookPublished">Yes</div>

                        <div class="font-medium text-gray-600">Created:</div>
                        <div id="date-created">DATE</div>

                        <div class="font-medium text-gray-600">Modified:</div>
                        <div id="date-modified">DATE</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Add New Copy Popup -->
<div id="popup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-lg font-bold mb-4">Add New Copy</h2>
        <form>
            <label class="block mb-2 text-sm text-gray-600" for="accessionNo">Accession No.</label>
            <input type="text" id="accessionNo" class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none mb-4">
            
            <label class="block mb-2 text-sm text-gray-600" for="copyNo">Copy No.</label>
            <input type="text" id="copyNo" class="w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none mb-4">
            
            <div class="flex items-center mb-2">
                <label for="active" class="flex items-center cursor-pointer">
                    <div class="relative">
                        <input type="checkbox" id="active" class="sr-only">
                        <div class="w-10 h-4 bg-gray-300 rounded-full shadow-inner"></div>
                        <div class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition"></div>
                    </div>
                </label>
                <label for="active" class="text-sm text-gray-600">Active</label>
            </div>

            <p class="text-xs text-gray-600">Make this item active for checking out, OPAC listing and other activities.</p>
            
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="togglePopup()" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md">Close</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Submit</button>
            </div>
        </form>
    </div>
</div>
