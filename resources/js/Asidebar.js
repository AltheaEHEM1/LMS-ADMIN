    
    document.addEventListener("DOMContentLoaded", function() {
        // Open and close the logout modal
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
        }

        // Toggle notification dropdown
        const notificationIcon = document.getElementById('notificationIcon');
        const notificationBox = document.getElementById('notificationBox');
        if (notificationIcon) {
            notificationIcon.addEventListener('click', () => {
                notificationBox.classList.toggle('hidden');
            });
        }

        // Close notification dropdown when clicking outside
        document.addEventListener('click', (event) => {
            if (!notificationIcon.contains(event.target) && !notificationBox.contains(event.target)) {
                notificationBox.classList.add('hidden');
            }
        });

        // Toggle dropdown menu
        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');
        if (dropdownButton) {
            dropdownButton.addEventListener('click', () => {
                dropdownMenu.classList.toggle('hidden');
            });
        }

        // Close dropdown menu when clicking outside
        document.addEventListener('click', (event) => {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });

        // Set modal open/close for logout
        const logoutLink = document.querySelector('a[href="#"]');
        if (logoutLink) {
            logoutLink.addEventListener('click', function(e) {
                e.preventDefault(); // Prevent the default link behavior
                openModal('LogoutModal');
            });
        }

        // Close modal when cancel button is clicked
        const cancelButton = document.querySelector('#LogoutModal button[type="button"]');
        if (cancelButton) {
            cancelButton.addEventListener('click', function() {
                closeModal('LogoutModal');
            });
        }
    });
