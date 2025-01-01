@include('Asidebar_header')
    <!-- Direction of Tabs -->
    <section class="bg-gray-100 fixed ml-72 px-11 py-6 w-full top-20 left-0"> 
    <p class="text-sm text-gray-600">
        <i class="fas fa-home text-gray-800"></i>
        Dashboard
    </p>
    </section>

    <!-- Scrollable Box below the Direction Tabs -->
    <div class="absolute top-[calc(8rem+1rem)] left-[59%] transform -translate-x-1/2 w-3/4 overflow-y-auto max-h-[calc(100vh-10rem)]">
        <div class="bg-[#012A4A] text-white rounded-xl p-6 w-[100%] mx-auto h-40 flex items-center justify-between">
            <!-- Left Section: Text -->
            <div class="pl-20">
                <h2 class="text-4xl font-bold mt-1">Welcome to Novella</h2>
                <p class="mt-3">Unlock endless worlds of knowledge with a library designed <br>for effortless exploration and discovery.</p>
            </div>

            <!-- Right Section: Logo -->
            <div class="pr-6">
                <img src="./images/tabicon.png" alt="novela Logo" class="h-40 w-auto">
            </div>
        </div>

        <!-- Cards Section below Welcome -->
        <div class="grid grid-cols-3 gap-6 mt-6 w-[93%] mx-auto">
            <div class="bg-white shadow-md p-6 text-center rounded-lg">
                <h3 class="text-xl font-semibold">Books</h3>
                <div class="mt-4">
                    <canvas id="booksChart" class="mx-auto"></canvas>
                </div>
            </div>
            <div class="bg-white shadow-md p-6 text-center rounded-lg">
                <h3 class="text-xl font-semibold">Reserved</h3>
                <div class="mt-4">
                    <canvas id="reservedChart" class="mx-auto"></canvas>
                </div>
            </div>
            <div class="bg-white shadow-md p-6 text-center rounded-lg">
                <h3 class="text-xl font-semibold">Overdue</h3>
                <div class="mt-4">
                    <canvas id="overdueChart" class="mx-auto"></canvas>
                </div>
            </div>
        </div>

        <!-- Updated 4 Boxes -->
        <div class="mt-10 grid grid-cols-2 gap-6">
            <!-- Box 1: New Arrival -->
            <div class="bg-white shadow-md rounded p-4">
                <h3 class="text-lg text-[#011B33] font-bold mb-2">New Arrival</h3>
                <hr class="border-gray-300 mb-2" />

                <!-- Content under the line -->
                <!-- Book 1 -->
                <div class="mt-4 flex items-start space-x-4">
                    <!-- Left column: Book Image -->
                    <div class="w-1/5">
                        <img src="https://via.placeholder.com/20" class="w-full h-auto max-w-[75px] rounded shadow-md">
                    </div>
                    <!-- Right column: ISBN and Title -->
                    <div class="w-4/5">
                        <p class="text-sm text-[#011B33] font-semibold">ISBN: 978-3-16-148410-0</p>
                        <p class="text-sm text-gray-700">The Great Gatsby</p>
                    </div>
                </div>
            </div>

            <!-- Box 2: Checkouts -->
            <div class="bg-white shadow-md rounded p-4">
                <h3 class="text-lg text-[#011B33] font-bold mb-2">Checkouts</h3>
                <hr class="border-gray-300 mb-2" />

                <!-- Content under the line -->
                <!-- Book 1 -->
                <div class="mt-4 flex items-start space-x-4">
                    <!-- Left column: Book Image -->
                    <div class="w-1/5">
                        <img src="https://via.placeholder.com/20" class="w-full h-auto max-w-[75px] rounded shadow-md">
                    </div>
                    <!-- Right column: Book Title, Author, Due Date -->
                    <div class="w-4/5">
                        <p class="text-sm text-[#011B33] font-semibold">ADD BOOK TITLE</p>
                        <p class="text-sm text-gray-700">ADD BOOK AUTHOR</p>
                        <p class="text-sm text-gray-700">Due Mon, Dec 16, 24</p>
                    </div>
                </div>
            </div>

            <!-- Box 3: Member -->
            <div class="bg-white shadow-md rounded p-4">
                <h3 class="text-lg text-[#011B33] font-bold mb-2">Member</h3>
                <hr class="border-gray-300 mb-2" />

                <!-- Content under the line -->
                <!-- Member 1 -->
                <div class="mt-4 flex items-start space-x-4">
                    <!-- Left column: Member Image -->
                    <div class="w-1/5">
                        <img src="https://via.placeholder.com/20" class="w-full h-auto max-w-[75px] rounded shadow-md">
                    </div>
                    <!-- Right column: Member Details (Name, Date Joined) -->
                    <div class="w-4/5">
                        <p class="text-sm text-[#011B33] font-semibold">ADD BOOK TITLE</p>
                        <p class="text-sm text-gray-700">Due Sun, Oct 27, 24</p>
                    </div>
                </div>
            </div>

            <!-- Box 4: Overdues -->
            <div class="bg-white shadow-md rounded p-4">
                <h3 class="text-lg text-[#011B33] font-bold mb-2">Overdues</h3>
                <hr class="border-gray-300 mb-2" />

                <!-- Content under the line -->
                <!-- Overdue 1 -->
                <div class="mt-4 flex items-start space-x-4">
                    <!-- Left column: Book Image -->
                    <div class="w-1/5">
                        <img src="https://via.placeholder.com/20" class="w-full h-auto max-w-[75px] rounded shadow-md">
                    </div>
                    <!-- Right column: Book Details (Title, Author, Due Date) -->
                    <div class="w-4/5">
                        <p class="text-sm text-[#011B33] font-semibold">ADD BOOK TITLE</p>
                        <p class="text-sm text-gray-700">ADD BOOK AUTHOR</p>
                        <p class="text-sm text-gray-700">Due Mon, Dec 16, 24</p>
                    </div> 
                </div>
            </div>
        </div>
    </div>

    <script>
    // Books Chart
    const booksCtx = document.getElementById('booksChart').getContext('2d');
    new Chart(booksCtx, {
        type: 'bar',
        data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
        datasets: [{
            label: 'Books Issued',
            data: [50, 60, 45, 70, 65],
            backgroundColor: 'rgba(75, 192, 192, 0.6)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
        },
        options: {
        responsive: true,
        maintainAspectRatio: false,
        }
    });

    // Reserved Chart
    const reservedCtx = document.getElementById('reservedChart').getContext('2d');
    new Chart(reservedCtx, {
        type: 'bar',
        data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
        datasets: [{
            label: 'Books Reserved',
            data: [10, 15, 8, 12, 9],
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
        },
        options: {
        responsive: true,
        maintainAspectRatio: false,
        }
    });

    // Overdue Chart
    const overdueCtx = document.getElementById('overdueChart').getContext('2d');
    new Chart(overdueCtx, {
        type: 'line',
        data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
        datasets: [{
            label: 'Overdue Books',
            data: [5, 8, 2, 4, 7],
            backgroundColor: 'rgba(255, 159, 64, 0.6)',
            borderColor: 'rgba(255, 159, 64, 1)',
            borderWidth: 2,
            fill: true,
        }]
        },
        options: {
        responsive: true,
        maintainAspectRatio: false,
        }
    });
    </script>
