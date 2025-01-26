@include('Asidebar_header')
@vite('resources/js/catalog-addbook.js')

    <!-- Direction of Tabs -->
    <section class="bg-gray-100 fixed ml-72 px-11 py-6 w-full top-20 left-0"> 
        <p class="text-sm text-gray-600">
            <i class="fas fa-home text-gray-800"></i>
            <a a href="/DASHBORDandingpage_employee">Dashboard</a>
            <a a href="/CATALOG">/ Catalog</a> / Add Book
        </p>
    </section>

    <!-- Scrollable Box below the Direction Tabs -->
    <div class="bg-white border border-gray-300 rounded-lg h-[75vh] overflow-y-auto shadow-sm fixed top-[calc(8rem+1rem)] left-[59%] transform -translate-x-1/2 w-3/4">
        <!-- Header Section -->
        <div class="bg-white p-6">
            <h1 class="text-xl font-bold text-[#012A4A] mb-2">Add New Item</h1>
            <hr class="mt-2 border-gray-300" />
        </div>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="ml-6 rounded-md p-6">
            <!-- Form Fields Section -->
            <div class="col-span-2 grid grid-cols-1 gap-4">
                <!-- Form Fields -->
                <form id="addBookForm" method="POST" action="{{ route('book.store') }}">
                    @csrf <!-- CSRF Token -->

                    <!-- First Row: Type, Category, Author -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Type</label>
                            <input name="media_type" type="text" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-full focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Category</label>
                            <input name="category" type="text" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-full focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Author</label>
                            <input name="Author" type="text" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-full focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                    </div>

                    <!-- Second Row: Title, ISBN 10, ISBN 13 -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Title</label>
                            <input name="title" type="text" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-full focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">ISBN 10</label>
                            <input name="isbn" type="text" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-full focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">ISBN 13</label>
                            <input name="isbn_13" type="text" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-full focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                    </div>

                    <!-- Third Row: ASIN, Published Year, Publisher -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">ASIN</label>
                            <input name="edition" type="text" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-full focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Published Year</label>
                            <input name="publishedyear" type="text" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-full focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Publisher</label>
                            <input name="publisher" type="text" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-full focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                    </div>

                    <!-- Fourth Row: Pages, Tag, Stock -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Pages</label>
                            <input name="pages" type="text" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-full focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tag</label>
                            <input name="tag" type="text" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-full focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Stock</label>
                            <input name="stock" type="text" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-full focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                    </div>

                    <!-- Fifth Row: Language, Photo -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Language</label>
                            <input name="stock" type="text" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-full focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Photo</label>
                            <input name="photo" type="file" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-full focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        <div class="flex justify-center items-center">
                            <button type="submit" class="px-4 py-2 bg-[#012A4A] text-white rounded-md mt-4 w-full sm:w-auto">Save Changes</button>
                        </div>
                    </div>
                </form>

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

