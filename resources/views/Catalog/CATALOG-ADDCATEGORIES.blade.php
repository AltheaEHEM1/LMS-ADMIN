@include('Asidebar_header')
@vite('resources/js/catalog-addcategories.js')

    <!-- Direction of Tabs -->
    <section class="bg-gray-100 fixed ml-72 px-11 py-6 w-full top-20 left-0"> 
        <p class="text-sm text-gray-600">
            <i class="fas fa-home text-gray-800"></i>
            <a a href="/DASHBORDandingpage_employee">Dashboard</a>
            <a a href="/CATALOG">/ Catalog</a>  / Categories
        </p>
    </section>

    <!-- Scrollable Box -->
    <div class="bg-white border border-gray-300 rounded-lg h-[75vh] overflow-y-auto shadow-sm fixed top-[calc(8rem+1rem)] left-[59%] transform -translate-x-1/2 w-3/4">
        <div class="p-4 text-gray-500">
            <!-- Header -->
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-gray-800">Categories</h2>
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
            </div>

            <!-- Action Buttons -->
            <div class="flex items-start space-x-2 my-2 pl-6">
                <button
                    class="bg-white text-[#012A4A] px-4 py-2 border-2 border-[#012A4A] rounded-md hover:bg-[#012A4A] hover:text-white"
                    onclick="showModal('addCategoryModal')"
                >
                    New Category
                </button>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto px-6">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-[#012A4A] text-white text-sm leading-normal">
                            <th class="py-3 px-6 text-left">ID</th>
                            <th class="py-3 px-6 text-left">Name</th>
                            <th class="py-3 px-6 text-left">Slug</th>
                            <th class="py-3 px-6 text-center">Items</th>
                            <th class="py-3 px-6 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td id="categoryID" class="px-6 py-2 text-left">123456</td>
                            <td id="categoryName" class="px-6 py-2 text-left">Fiction</td>
                            <td id="categorySlug" class="px-6 py-2 text-left">Fiction</td>
                            <!-- Center-align the Items column -->
                            <td id="categoryItems" class="px-6 py-2 text-center">10</td>
                            <td class="px-6 py-2 text-center space-x-2">
                                <button class="text-blue-500" onclick="showModal('viewCategoryModal')">
                                    <i class="fa fa-eye"></i>
                                </button>
                                <button class="text-green-500" onclick="showModal('editCategoryModal')">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button class="text-red-500" onclick="showModal('deleteCategoryModal')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Repeat rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!-- Add Category Modal -->
<div id="addCategoryModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-md w-1/6">
        <h2 class="text-lg font-semibold mb-4">Add New Category</h2>
        <div>
            <label class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-full" />
        </div>
        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700">Slug</label>
            <input type="text" class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-full" />
        </div>
        <div class="space-y-4">
            <div>
                <label class="text-sm font-semibold text-gray-700">Upload Photo</label>
                <!-- Photo Upload Input (Larger Image) -->
                <div class="w-48 h-48 flex items-center justify-center mx-auto mb-4">
                    <img src="./images/photo.png" alt="photo" class="w-full h-full object-cover">
                </div>
                <!-- File Upload Input (Block Format) -->
                <input type="file" id="uploadPhoto" name="photo" accept="image/*" class="w-full mt-1 px-3 py-2 border rounded">
            </div>
        </div>
        <div class="mt-6 flex justify-end space-x-2">
            <button onclick="closeModal('addCategoryModal')" class="px-4 py-2 bg-gray-300 rounded-md">Cancel</button>
            <button class="px-4 py-2 bg-[#012A4A] text-white rounded-md">Submit</button>
        </div>
    </div>
</div>


<!-- View Category Modal -->
<div id="viewCategoryModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-md w-1/6">
        <!-- Modal Header -->
        <div class="flex justify-between items-center border-b pb-2 mb-4">
            <h2 class="text-lg font-semibold">View Category ID</h2>
            <button onclick="closeModal('viewCategoryModal')" class="text-gray-600 hover:text-gray-800">
                <i class="fa fa-times"></i>
            </button>
        </div>

        <!-- Category Details -->
        <div class="text-left">
            <h3 class="text-base font-medium mb-2">Category Details</h3>
            <ul class="space-y-2">
            <div class="space-y-4">
            <div class="w-48 h-48 flex items-center justify-center mx-auto mb-4">
                <img src="./images/photo.png" alt="photo" class="w-full h-full object-cover">
            </div>

        </div>
                <li>
                    <strong>Name:</strong>
                    <span id="categoryName">Biography</span>
                </li>
                <li>
                    <strong>Slug:</strong>
                    <span id="categorySlug">Biography</span>
                </li>
                <li>
                    <strong>Item(s):</strong>
                    <span id="categoryItems">10</span>
                </li>
                <li>
                    <strong>Published:</strong>
                    <span id="categoryPublished">Yes</span>
                </li>
                <li>
                    <strong>Created:</strong>
                    <span id="categoryCreated">2024-11-03 03:16:12</span>
                </li>
                <li>
                    <strong>Modified:</strong>
                    <span id="categoryModified">2024-11-03 03:16:12</span>
                </li>
            </ul>
        </div>

        <!-- Close Button -->
        <div class="mt-6 flex justify-end">
            <button onclick="closeModal('viewCategoryModal')" class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400">
                Close
            </button>
        </div>
    </div>
</div>


<!-- Edit Category Modal -->
<div id="editCategoryModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-md w-1/6">
        <h2 class="text-lg font-semibold mb-4">Edit Category</h2>
        <div>
            <label class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-full"/>
        </div>
        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700">Slug</label>
            <input type="text" class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-full"/>
        </div>
        <div class="space-y-4">
            <div>
                <label class="text-sm font-semibold text-gray-700">Upload Photo</label>
                <!-- Photo Upload Input (Larger Image) -->
                <div class="w-48 h-48 flex items-center justify-center mx-auto mb-4">
                    <img src="./images/photo.png" alt="photo" class="w-full h-full object-cover">
                </div>
                <!-- File Upload Input (Block Format) -->
                <input type="file" id="uploadPhoto" name="photo" accept="image/*" class="w-full mt-1 px-3 py-2 border rounded">
            </div>
        </div>
        <div class="mt-6 flex justify-end space-x-2">
            <button onclick="closeModal('editCategoryModal')" class="px-4 py-2 bg-gray-300 rounded-md">Cancel</button>
            <button class="px-4 py-2 bg-[#012A4A] text-white rounded-md">Save</button>
        </div>
    </div>
</div>

<!-- Delete Category Modal -->
<div id="deleteCategoryModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-md text-center">
        <h2 class="text-lg font-semibold text-red-500 mb-4">Delete this item?</h2>
        <p>Are you sure you want to delete this category? This action cannot be undone.</p>
        <div class="mt-6 flex justify-center space-x-4">
            <button onclick="closeModal('deleteCategoryModal')" class="px-4 py-2 bg-gray-300 rounded-md">Cancel</button>
            <button class="px-4 py-2 bg-red-500 text-white rounded-md">Delete</button>
        </div>
    </div>
</div>