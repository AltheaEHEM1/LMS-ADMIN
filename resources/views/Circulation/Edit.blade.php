@include('Asidebar_header')
@vite('resources/js/edit.js')

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
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded-md mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="ml-30 rounded-md p-6 mb-6 w-3/4 mx-auto">
            <div class="space-y-6 flex justify-center items-center">
                <div class="flex flex-col p-6">
                    <!-- Row 1: Member, Phone Number, Email -->
                    <div class="flex space-x-8 items-center justify-center">
                        <div class="p-4">
                            <label class="block text-sm font-medium text-gray-700">Member</label>
                            <div class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 bg-gray-100">
                                {{$circulation->user->firstName}} {{$circulation->user->lastName}}
                            </div>
                        </div>

                        <div class="p-4">
                            <label class="block text-sm font-medium text-gray-700">Book Title</label>
                            <div class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 bg-gray-100">
                                {{$circulation->book->title}}
                            </div>
                        </div>

                        <div class="p-4">
                            <label class="block text-sm font-medium text-gray-700">Email Address</label>
                            <div class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 bg-gray-100">
                                {{$circulation->user->email}}
                            </div>
                        </div>
                    </div>

                    <!-- Row 2: Booking Date, Returning Date, Status -->
                    <div class="flex space-x-8 items-center justify-center">
                        <div class="p-4">
                            <label class="block text-sm font-medium text-gray-700">Booking Date</label>
                            <div class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 bg-gray-100">
                                {{$circulation->borrowed_date}}
                            </div>
                        </div>

                        <div class="p-4">
                            <label class="block text-sm font-medium text-gray-700">Returning Date</label>
                            <div class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 bg-gray-100">
                                {{$circulation->due_date}}
                            </div>
                        </div>

                        <div class="p-4">
                            <label class="block text-sm font-medium text-gray-700">Old Status</label>
                            <div class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 bg-gray-100">
                                {{$circulation->status}}
                            </div>
                        </div>

                        
                    </div>

                    <!-- Row 3: Quick Return Date, Extend Return Date -->
                    <form action="{{ route('circulation.update') }}" method="POST">
                        @csrf
                        <div class="flex space-x-8 items-center justify-center">
                            <input type="hidden" value={{$circulation->id}} id="DrecordId" name="circulationId">
                            <div class="p-4">
                                <label class="block text-sm font-medium text-gray-700">Return Date</label>
                                <input id="extendReturnDate" type="date" name="returndate" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 focus:outline-none focus:ring-2 focus:ring-green-500">
                            </div>
                            <div class="p-4">
                                <label class="block text-sm font-medium text-gray-700">Updating Status</label>
                                <select id="status" name="status" class="form-control border border-gray-300 rounded-lg px-4 py-2 text-sm w-72 focus:outline-none focus:ring-2 focus:ring-green-500">
                                    <option value="borrowed">Borrowed</option>
                                    <option value="returned">Returned</option>
                                    <option value="overdue">Overdue</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>
                        </div>
                        

                        <!-- Save Changes Button -->
                        <div class="flex justify-center mt-6">
                            <button id="saveButton" class="px-6 py-3 bg-[#012A4A] text-white rounded-md hover:bg-[#013d66]">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
                
            </div>

        </div>

 

 
    </div>

        