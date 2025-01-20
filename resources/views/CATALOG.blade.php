@include('Asidebar_header')
@vite('resources/js/catalog.js')

    <!-- Direction of Tabs -->
    <section class="bg-gray-100 fixed ml-72 px-11 py-6 w-full top-20 left-0"> 
        <p class="text-sm text-gray-600">
            <i class="fas fa-home text-gray-800"></i>
            <a a href="/DASHBORDandingpage_employee">Dashboard</a>
            <a a href="{{ route('catalogs') }}">/ Catalog</a> 
        </p>
    </section>

    <!-- Scrollable Box below the Direction Tabs -->
    <div class="bg-white border border-gray-300 rounded-lg h-[75vh] overflow-y-auto shadow-sm fixed top-[calc(8rem+1rem)] left-[59%] transform -translate-x-1/2 w-3/4">
        <div class="p-6">
            <!-- Header -->
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold text-gray-800">Catalog</h2>
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

            <p class="flex items-end text-gray-600">Manage your library catalog here.</p>

            <!-- Divider -->
            <hr class="mt-2 border-gray-300" />

            <!-- Action Buttons -->
            <div class="flex items-end space-x-2 px-4 py-4">
                <a href="CATALOG-ADDCATEGORIES" class="bg-white text-[#012A4A] px-4 py-2 border-2 border-[#012A4A] rounded-md hover:bg-[#012A4A] hover:text-white">Categories</a>
                <a href="CATALOG-ADDBOOK" class="bg-white text-[#012A4A] px-4 py-2 border-2 border-[#012A4A] rounded-md hover:bg-[#012A4A] hover:text-white">Add Book</a>
            </div>


            <!-- Table -->
            <div class="overflow-x-auto mt-4">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-[#012A4A] text-white text-sm leading-normal">
                            <th class="py-3 px-6 text-left">ID</th>
                            <th class="py-3 px-6 text-left">Title</th>
                            <th class="py-3 px-6 text-left">Type</th>
                            <th class="py-3 px-6 text-left">Author</th>
                            <th class="py-3 px-6 text-left">Publisher</th>
                            <th class="py-3 px-6 text-left">Identifier</th>
                            <th class="py-3 px-6 text-center">Copies</th>
                            <th class="py-3 px-6 text-center">Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($books as $book)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left text-gray-700">{{ $book->id }}</td>
                                <td class="py-3 px-6 text-left text-gray-700">{{ $book->title }}</td>
                                <td class="py-3 px-6 text-left text-gray-700">{{ $book->media_type }}</td>
                                <td class="py-3 px-6 text-left text-gray-700">{{ $book->category }}</td>
                                <td class="py-3 px-6 text-left text-gray-700">{{ $book->isbn }}</td>
                                <td class="py-3 px-6 text-left text-gray-700">{{ $book->isbn_13 }}</td>
                                <td class="py-3 px-6 text-left text-gray-700">{{ $book->edition }}</td>
                                <td class="py-3 px-6 text-center">
                                    <a href="{{ url('catalog/view', $book->id) }}" class="text-blue-500 hover:underline pr-2">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <button onclick="togglePopup('addNewCopyPopup')" class="text-green-500 hover:underline">
                                        <i class="fa fa-plus"></i> 
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    
                    
                </table>
            </div>
        </div>
    </div>


    <!-- Add New Copy Popup -->
    <div id="addNewCopyPopup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
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
                        <div class="w-10 h-4 bg-gray-300 rounded-full shadow-inner transition-colors" id="toggle-bg"></div>
                        <div class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition-transform" id="toggle-dot"></div>
                    </div>
                </label>
                <label for="active" class="text-sm text-gray-600">Active</label>
            </div>
            

            <p class="text-xs text-gray-600">Make this item active for checking out, OPAC listing and other activities.</p>
            
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="togglePopup('addNewCopyPopup')" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md">Close</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Submit</button>
            </div>
        </form>
    </div>
</div>