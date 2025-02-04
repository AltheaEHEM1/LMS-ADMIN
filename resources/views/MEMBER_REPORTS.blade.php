@include('Asidebar_header')
@vite('resources/js/member-reports.js')

<!-- Direction of Tabs -->
<section class="bg-gray-100 fixed ml-72 px-11 py-6 w-full top-20 left-0"> 
    <p class="text-sm text-gray-600">
        <i class="fas fa-home text-gray-800"></i>
        <a a href="/DASHBORDandingpage_employee">Dashboard</a> / Member Report
    </p>
</section>

<!-- Scrollable Box below the Direction Tabs -->
<div class="bg-white border border-gray-300 rounded-lg h-[75vh] overflow-y-auto shadow-sm fixed top-[calc(8rem+1rem)] left-[59%] transform -translate-x-1/2 w-3/4">
            <div class="p-4 text-center text-gray-500">
                <!--Content -->

                <div class="p-4 border-b flex justify-between items-center">
                    <h1 class="text-xl font-semibold text-gray-800">Most Circulated Members</h1>
                    <div class="flex space-x-4">
                        <button class="px-4 py-2 bg-[#012A4A] text-white text-sm rounded hover:bg-blue-600">
                            <i class="fas fa-print"></i> Print
                        </button>

                        <!-- Employee Type Dropdown -->
                        <div>
                            <select class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-800" id="employeeType" required>
                                <option value="">Range</option>
                                <option value="Today">Today</option>
                                <option value="Yesterday">Yesterday</option>
                                <option value="Last week">Last week</option>
                                <option value="This month">This month</option>
                                <option value="Last month">Last month</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-[#012A4A] text-white">
                                <th class="py-2 px-4 text-center">Name</th>
                                <th class="py-2 px-4 text-center">Email</th>
                                <th class="py-2 px-4 text-center">Join Date</th>
                                <th class="py-2 px-4 text-center">Engagement Count</th>
                                <th class="py-2 px-4 text-center">Circulated Count</th>
                            </tr>
                        </thead>
                        @foreach($members as $index => $member)
                        <tbody>
                                <td class="py-3 px-4">{{ $member->username }}</td>
                                <td class="py-3 px-4">{{ $member->email }}</td>
                                <td class="py-3 px-4">{{ $member->created_at }}</td>
                                <td class="py-3 px-4">{{ $member->engagement_count }}</td>
                                <td class="py-3 px-4">{{ $member->circulated_count }}</td>
                                
                        </tbody>
                        @endforeach
                    </table>
                </div>

            </div>
        </div>








</body>
</html>
