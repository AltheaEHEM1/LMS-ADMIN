@include('Asidebar_header')
        <!-- Direction of Tabs -->
        <section class="bg-gray-100 fixed ml-72 px-11 py-6 w-full top-20 left-0"> 
            <p class="text-sm text-gray-600">
                <i class="fas fa-home text-gray-800"></i>
                <a a href="/DASHBORDandingpage_employee">Dashboard</a> / Employee
            </p>
        </section>

        <!-- Scrollable Box below the Direction Tabs -->
        <div class="bg-white border border-gray-300 rounded-lg h-[75vh] overflow-y-auto shadow-sm fixed top-[calc(8rem+1rem)] left-[59%] transform -translate-x-1/2 w-3/4">
            <div class="p-4 text-center text-gray-500">
                <!-- No content -->

                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xl font-semibold text-gray-800">Employees</h2>
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
                    @if ($errors->any())
                    <div class="text-red-500 mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
    
                    <div class="mb-4 flex justify-start">
                        <button onclick="openModal('NewModal')" class="bg-[#012A4A] text-white px-4 py-2 rounded-lg shadow hover:bg-[#028ABE]">
                            New Employee
                        </button>
                    </div>


                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr class="bg-[#012A4A] text-white">
                                    <th class="py-2 px-4 text-center">User</th>
                                    <th class="py-2 px-4 text-center">Username</th>
                                    <th class="py-2 px-4 text-center">Join</th>
                                    <th class="py-2 px-4 text-center">Status</th>
                                    <th class="py-2 px-4 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b hover:bg-gray-50">
                                    
                                    <td class="py-3 px-4 flex items-center space-x-3">
                                        <div class="bg-gray-200 rounded-full w-10 h-10 flex items-center justify-center text-black font-bold">
                                            N
                                        </div>
                                        <div class="items-start text-left">
                                            <p class="font-medium">Nadine Borja</p>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">nadine9567@gmail.com</td>
                                    <td class="py-3 px-4">1-1-2025</td>
                                    <td class="py-3 px-4 text-green-600">Active</td>
                                    <td class="py-3 px-4 flex justify-center items-center space-x-5">
                                        <!-- View Icon -->
                                        <button onclick="openModal('ViewModal')" class="text-blue-500 hover:text-blue-700">
                                            <i class="fa fa-eye w-5 h-5"></i>
                                        </button>
                                        <!-- Edit Icon -->
                                        <button onclick="openModal('EditModal')" class="text-gray-600 hover:text-gray-800">
                                            <i class="fa fa-pencil-alt w-5 h-5"></i>
                                        </button>
                                        <!-- Delete Icon -->
                                        <button onclick="openModal('DeleteModal')" class="text-red-600 hover:text-gray-800">
                                            <i class="fa fa-trash-alt w-5 h-5"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Repeat for other rows -->
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            
        </div>
        
    <!--modals-->
        <!-- New Member Modal -->
            <div id="NewModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center hidden">
                <div class="bg-white p-7 rounded-lg shadow-md w-[60%] ml-[20%] mt-20">
                    <h2 class="text-xl font-semibold mb-4">Add New Employee</h2>

                    <form id="newEmployeeForm" action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                        @csrf
                        <!-- Name Section (Inline: First Name, Middle Name, Last Name) -->
                        <div class="grid grid-cols-3 gap-4 mb-4">
                            <div>
                                <label class="text-sm text-gray-600">First Name <span class="text-red-500">*</span></label>
                                <input type="text" name="firstName" id="firstName" placeholder="Althea Amor" 
                                       class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800" required>
                                <p id="firstNameError" class="text-red-500 text-sm hidden">First Name is required.</p>
                            </div>
                        
                            <!-- Middle Name -->
                            <div>
                                <label class="text-sm text-gray-600">Middle Name</label>
                                <input type="text" name="middleName" id="middleName" placeholder="J" 
                                       class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800">
                                <p id="middleNameError" class="text-red-500 text-sm hidden">Middle Name is required.</p>
                            </div>
                        
                            <!-- Last Name -->
                            <div>
                                <label class="text-sm text-gray-600">Last Name <span class="text-red-500">*</span></label>
                                <input type="text" name="lastName" id="lastName" placeholder="Asis" 
                                       class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800" required>
                                <p id="lastNameError" class="text-red-500 text-sm hidden">Last Name is required.</p>
                            </div>
                        </div>

                        <!-- Phone No., Date of Birth, Email, and Address Section (Left Side) -->
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <!-- Left Side -->
                            <div class="space-y-4">
                                <div>
                                    <label class="text-sm text-gray-600">Phone No. <span class="text-red-500">*</span></label>
                                    <input type="text" name="phoneNo" id="phoneNo" placeholder="+639123456789" 
                                           class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800" required>
                                    <p id="phoneNoError" class="text-red-500 text-sm hidden">Phone No. is required.</p>
                                </div>

                                <div>
                                    <label class="text-sm text-gray-600">Date of Birth <span class="text-red-500">*</span></label>
                                    <input type="date" name="date_of_birth" class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800" id="dob" required>
                                    <p id="dobError" class="text-red-500 text-sm hidden">Date of Birth is required.</p>
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email <span class="text-red-500">*</span></label>
                                    <input type="email" name="email" placeholder="Enter your email" id="email" name="email" required class="w-full mt-1 border border-[#011B33] rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                    <p id="emailError" class="text-red-500 text-sm hidden">Email is required.</p>
                                    <p id="emailErrorInvalid" class="text-red-500 text-sm hidden error-message">Please enter a valid email address.</p>
                                </div>

                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-700">Password <span class="text-red-500">*</span></label>
                                    <input type="password" name="password" id="password" placeholder="Enter your password" 
                                           class="w-full mt-1 border rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                                    <p id="passwordError" class="text-red-500 text-sm hidden">Password is required.</p>
                                </div>
                            
                                <!-- Confirm Password -->
                                <div>
                                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password <span class="text-red-500">*</span></label>
                                    <input type="password" name="password_confirmation" id="confirmPassword" placeholder="Confirm your password" 
                                           class="w-full mt-1 border rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                                    <p id="confirmPasswordError" class="text-red-500 text-sm hidden">Passwords do not match.</p>
                                </div>
                                

                                <div>
                                    <label class="text-sm text-gray-600">Address <span class="text-red-500">*</span></label>
                                    <textarea placeholder="Enter address here" name="address" class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800" rows="3" id="address" required></textarea>
                                    <p id="addressError" class="text-red-500 text-sm hidden">Address is required.</p>
                                </div>
                            </div>

                            <!-- Right Side (Photo Upload Section) -->
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

                                <!-- Modal Trigger Button -->
                                <button type="button" onclick="openModal('AccessModal')" class="px-4 py-2 bg-[#012A4A] text-white rounded-md">
                                    Employee Accessibility
                                </button>

                                <!-- Modal -->
                                <div id="AccessModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center">
                                    <div class="bg-white p-6 rounded-lg w-1/3">
                                        <h2 class="text-lg font-semibold text-gray-700 mb-4">Employee accessibility</h2>
                                        <div class="mt-4">
                                            <label class="text-sm text-gray-600">Employee Permissions <span class="text-red-500">*</span></label>
                                            <div class="mt-2">
                                                <label class="block">
                                                    <input type="checkbox" name="dashboard" id="dashboard" class="mr-2"> Dashboard
                                                </label>
                                                <label class="block">
                                                    <input type="checkbox" name="employee" id="employee" class="mr-2"> Employee
                                                </label>
                                                <label class="block">
                                                    <input type="checkbox" name="reservation" id="reservation" class="mr-2"> Reservation
                                                </label>
                                                <label class="block">
                                                    <input type="checkbox" name="catalog" id="catalog" class="mr-2"> Catalog
                                                </label>
                                                <label class="block">
                                                    <input type="checkbox" name="members" id="members" class="mr-2"> Members
                                                </label>
                                                <label class="block">
                                                    <input type="checkbox" name="circulations" id="circulations" class="mr-2"> Circulations
                                                </label>
                                                <label class="block">
                                                    <input type="checkbox" name="circulationReports" id="circulationsReports" class="mr-2"> Circulations Reports
                                                </label>
                                                <label class="block">
                                                    <input type="checkbox" name="membersReports" id="membersReports" class="mr-2"> Members Reports
                                                </label>
                                                <label class="block">
                                                    <input type="checkbox" name="overdueReports" id="overdueReports" class="mr-2"> Overdue Reports
                                                </label>
                                                <label class="block">
                                                    <input type="checkbox" name="catalogReports" id="catalogReports" class="mr-2"> Catalog Reports
                                                </label>
                                            </div>
                                            <p id="employeePermissionsError" class="text-red-500 text-sm hidden">Permissions are required.</p>
                                        </div>
                                        <div class="mt-4 flex space-x-2 justify-end">
                                            <button onclick="closeModal('AccessModal')" class="px-3 py-2 bg-gray-500 text-white rounded-md">Close</button>
                                            
                                            <button type="button" onclick="savePermissions()" class="px-3 py-2 bg-blue-500 text-white rounded hover:bg-[#011B33]">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Footer -->
                    <div class="flex justify-end">
                        <!-- Cancel Button -->
                        <button type="button" onclick="closeModal('NewModal')" 
                                class="mr-2 px-3 py-1 bg-gray-300 text-gray-700 rounded hover:bg-gray-200">
                            Cancel
                        </button>
                        <!-- Submit Button -->
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-[#011B33]">
                            Save
                        </button>
                    </div>
                    </form>

                    
                </div>
            </div>



        <!-- View Modal -->
            <div id="ViewModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center hidden">
                <div class="bg-white p-7 rounded-lg shadow-md w-[60%] ml-[20%] mt-20">
                    <!-- Modal Header with Close Button -->
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold">View Employee Details</h2>
                        <button onclick="closeModal('ViewModal')" class="text-gray-600 hover:text-gray-900 text-2xl">&times;</button>
                    </div>

                    <!-- Employee Details and Photo Section -->
                    <div class="flex justify-between mb-4">
                        <!-- Left Side: Employee Details -->
                        <div class="w-1/2 pr-4">
                            <dl class="space-y-2">
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">First Name</dt>
                                    <dd class="text-sm text-gray-900">Althea</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Middle Name</dt>
                                    <dd class="text-sm text-gray-900">Jacinto</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Last Name</dt>
                                    <dd class="text-sm text-gray-900">Asis</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Phone No.</dt>
                                    <dd class="text-sm text-gray-900">+639123456789</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Date of Birth</dt>
                                    <dd class="text-sm text-gray-900">03-02-2004</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Address</dt>
                                    <dd class="text-sm text-gray-900">210 sto. nino st. brgy holy spirit</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Email</dt>
                                    <dd class="text-sm text-gray-900">altheaamor12@gmail.com</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Joined</dt>
                                    <dd class="text-sm text-gray-900">2024-10-27 11:50:52</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Modified</dt>
                                    <dd class="text-sm text-gray-900">2024-10-27 11:50:52</dd>
                                </div>
                            </dl>
                        </div>

                        <!-- Right Side: Photo Upload Section -->
                        <div class="w-1/2 pl-4">
                            <div class="w-48 h-48 flex items-center justify-center mx-auto mb-4">
                                <img src="./images/photo.png" alt="photo" class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        <!-- Edit Modal -->
            <div id="EditModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center hidden">
                    <div class="bg-white p-7 rounded-lg shadow-md w-[60%] ml-[20%] mt-20">
                        <h2 class="text-xl font-semibold mb-4">Edit Employee Info</h2>

                        <form id="EditEmployeeForm" onsubmit="return validateForm()">
                        <!-- Name Section (Inline: First Name, Middle Name, Last Name) -->
                        <div class="grid grid-cols-3 gap-4 mb-4">
                            <div>
                                <label class="text-sm text-gray-600">First Name <span class="text-red-500">*</span></label>
                                <input type="text" placeholder="Althea Amor" class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800" id="firstName" required>
                                <p id="firstNameError" class="text-red-500 text-sm hidden">First Name is required.</p>
                            </div>

                            <div>
                                <label class="text-sm text-gray-600">Middle Name <span class="text-red-500">*</span></label>
                                <input type="text" placeholder="J" class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800" id="middleName" required>
                                <p id="middleNameError" class="text-red-500 text-sm hidden">Middle Name is required.</p>
                            </div>

                            <div>
                                <label class="text-sm text-gray-600">Last Name <span class="text-red-500">*</span></label>
                                <input type="text" placeholder="Asis" class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800" id="lastName" required>
                                <p id="lastNameError" class="text-red-500 text-sm hidden">Last Name is required.</p>
                            </div>
                        </div>

                        <!-- Phone No., Date of Birth, Email, and Address Section (Left Side) -->
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <!-- Left Side -->
                            <div class="space-y-4">
                                <div>
                                    <label class="text-sm text-gray-600">Phone No. <span class="text-red-500">*</span></label>
                                    <input type="text" placeholder="+639123456789" class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800" id="phoneNo" required>
                                    <p id="phoneNoError" class="text-red-500 text-sm hidden">Phone No. is required.</p>
                                </div>

                                <div>
                                    <label class="text-sm text-gray-600">Date of Birth <span class="text-red-500">*</span></label>
                                    <input type="date" class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800" id="dob" required>
                                    <p id="dobError" class="text-red-500 text-sm hidden">Date of Birth is required.</p>
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email <span class="text-red-500">*</span></label>
                                    <input type="email" placeholder="Enter your email" id="email" name="email" required class="w-full mt-1 border border-[#011B33] rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                    <p id="emailError" class="text-red-500 text-sm hidden">Email is required.</p>
                                    <p id="emailErrorInvalid" class="text-red-500 text-sm hidden error-message">Please enter a valid email address.</p>
                                </div>

                                <div>
                                    <label class="text-sm text-gray-600">Address <span class="text-red-500">*</span></label>
                                    <textarea placeholder="Enter address here" class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800" rows="3" id="address" required></textarea>
                                    <p id="addressError" class="text-red-500 text-sm hidden">Address is required.</p>
                                </div>
                            </div>

                            <!-- Right Side (Photo Upload Section) -->
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

                                <!-- Modal Trigger Button -->
                                `<button onclick="openModal('editAccessModal')"  class="px-4 py-2 bg-[#012A4A] text-white rounded-md">Employee Accessibility</button>

                                <!-- Modal -->
                                <div id="editAccessModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center">
                                    <div class="bg-white p-6 rounded-lg w-1/3">
                                        <h2 class="text-lg font-semibold text-gray-700 mb-4">Employee accessibility</h2>
                                        <div class="mt-4">
                                            <label class="text-sm text-gray-600">Employee Permissions <span class="text-red-500">*</span></label>
                                            <div class="mt-2">
                                                <label class="block">
                                                    <input type="checkbox" id="dashboard" class="mr-2"> Dashboard
                                                </label>
                                                <label class="block">
                                                    <input type="checkbox" id="employee" class="mr-2"> Employee
                                                </label>
                                                <label class="block">
                                                    <input type="checkbox" id="reservation" class="mr-2"> Reservation
                                                </label>
                                                <label class="block">
                                                    <input type="checkbox" id="catalog" class="mr-2"> Catalog
                                                </label>
                                                <label class="block">
                                                    <input type="checkbox" id="members" class="mr-2"> Members
                                                </label>
                                                <label class="block">
                                                    <input type="checkbox" id="circulations" class="mr-2"> Circulations
                                                </label>
                                                <label class="block">
                                                    <input type="checkbox" id="circulationsReports" class="mr-2"> Circulations Reports
                                                </label>
                                                <label class="block">
                                                    <input type="checkbox" id="membersReports" class="mr-2"> Members Reports
                                                </label>
                                                <label class="block">
                                                    <input type="checkbox" id="overdueReports" class="mr-2"> Overdue Reports
                                                </label>
                                                <label class="block">
                                                    <input type="checkbox" id="catalogReports" class="mr-2"> Catalog Reports
                                                </label>
                                            </div>
                                            <p id="employeePermissionsError" class="text-red-500 text-sm hidden">Permissions are required.</p>
                                        </div>
                                        <div class="mt-4 flex space-x-2 justify-end">
                                            <button onclick="closeModal('editAccessModal')" class="px-3 py-2 bg-gray-500 text-white rounded-md">Close</button>
                                            <button type="submit" class="px-3 py-2 bg-blue-500 text-white rounded hover:bg-[#011B33]">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                        <!-- Modal Footer -->
                        <div class="flex justify-end">
                            <button type="button" onclick="closeModal('EditModal')" class="mr-2 px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-200">Cancel</button>
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-[#011B33]">Save</button>
                        </div>
                    </div>
                </div>


         <!-- Delete Modal -->
        <div id="DeleteModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center hidden">
            <div class="bg-white p-6 rounded-lg shadow-md w-[60%] max-w-sm">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-trash text-red-500 text-xl"></i>
                    <h1 class="text-2xl font-semibold mb-3 mt-4">Delete this item?</h1>
                </div>
                <p class="text-gray-700 mb-6">Are you sure you want to delete book name from the library? Note: All copies and related data such as loan information will be removed permanently.</p>
                <div class="flex justify-end">
                <button type="button" onclick="closeModal('DeleteModal')" class="mr-2 px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-200">Cancel</button>
                <button type="submit" class="flex items-center px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Delete
                </button>
                </div>
            </div>
        </div>


        <script>
                // Function to open a modal by ID
                function openModal(modalId) {
                const modal = document.getElementById(modalId);
                if (modal) {
                        modal.classList.remove('hidden'); // Remove the hidden class
                        modal.classList.add('flex'); // Add the flex class to display the modal
                }
                }

                // Function to close a modal by ID
                function closeModal(modalId) {
                const modal = document.getElementById(modalId);
                if (modal) {
                        modal.classList.add('hidden'); // Add the hidden class to hide the modal
                        modal.classList.remove('flex'); // Remove the flex class
                }
                }

                //New Modal validations
                // Form Validation
            function validateForm() {
            let isValid = true;

            // Check required fields
            const firstName = document.getElementById('firstName');
            const middleName = document.getElementById('middleName');
            const lastName = document.getElementById('lastName');
            const phoneNo = document.getElementById('phoneNo');
            const dob = document.getElementById('dob');
            const email = document.getElementById('email');
            const address = document.getElementById('address');
            
            // First Name Validation
            if (firstName.value.trim() === "") {
                document.getElementById('firstNameError').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('firstNameError').classList.add('hidden');
            }

            // Middle Name Validation
            if (middleName.value.trim() === "") {
                document.getElementById('middleNameError').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('middleNameError').classList.add('hidden');
            }

            // Last Name Validation
            if (lastName.value.trim() === "") {
                document.getElementById('lastNameError').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('lastNameError').classList.add('hidden');
            }

            // Phone No. Validation
            if (phoneNo.value.trim() === "") {
                document.getElementById('phoneNoError').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('phoneNoError').classList.add('hidden');
            }

            // Date of Birth Validation
            if (dob.value.trim() === "") {
                document.getElementById('dobError').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('dobError').classList.add('hidden');
            }

            // Email Validation
            if (email.value.trim() === "") {
                document.getElementById('emailError').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('emailError').classList.add('hidden');
            }

            // Email Format Validation
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email.value.trim())) {
                document.getElementById('emailErrorInvalid').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('emailErrorInvalid').classList.add('hidden');
            }

            // Address Validation
            if (address.value.trim() === "") {
                document.getElementById('addressError').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('addressError').classList.add('hidden');
            }

            return isValid;
        }

        function savePermissions() {
            // Add logic to save permissions
            console.log("Permissions saved");
            // Close the modal
            closeModal('AccessModal');
        }
        </script>


</body>
</html>
