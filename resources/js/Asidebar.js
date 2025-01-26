document.addEventListener("DOMContentLoaded", function() {
    // Handle sidebar item active state
    const sidebarItems = document.querySelectorAll('.sidebar-item');
    sidebarItems.forEach(item => {
        item.addEventListener('click', () => {
            sidebarItems.forEach(i => i.classList.remove('active')); // Remove active state from all items
            item.classList.add('active'); // Add active state to the clicked item
        });
    });

    // Handle the Reports dropdown
    const reportsMenu = document.querySelector('.dropdown');
    const dropdownMenu = reportsMenu.querySelector('.dropdown-menu');

    if (reportsMenu) {
        reportsMenu.addEventListener('click', (event) => {
            event.stopPropagation(); // Prevent the click from closing the dropdown
            dropdownMenu.classList.toggle('show'); // Toggle the dropdown
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (event) => {
            if (!reportsMenu.contains(event.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    }
});
