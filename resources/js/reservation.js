document.addEventListener('DOMContentLoaded', () => {
    // Function to open the View Modal and populate it with dynamic data
    function openViewModal(button) {
        // Fetch data from the button's data attributes
        const bookTitle = button.getAttribute('data-book-title') || "N/A";
        const reservationDate = button.getAttribute('data-reservation-date') || "N/A";
        const status = button.getAttribute('data-status') || "Pending";
        const photo = button.getAttribute('data-photo') || "https://via.placeholder.com/150"; // Default photo if none provided
        const borrowerName = button.getAttribute('data-borrower-name') || "N/A";
        const borrowerEmail = button.getAttribute('data-borrower-email') || "N/A";
        const bookId = button.getAttribute('data-borrower-bid') || "N/A";
        const borrowId = button.getAttribute('data-borrower-id') || "N/A";
        const userId = button.getAttribute('data-borrower-uid') || "N/A";
        
        // Populate modal fields
        document.querySelector('#ViewModal #book-image').setAttribute('src', photo);
        document.querySelector('#ViewModal #book-title').textContent = bookTitle;
        document.querySelector('#ViewModal #book-author').textContent = button.getAttribute('data-book-author') || "Unknown";
        document.querySelector('#ViewModal #borrower-name').textContent = borrowerName;
        document.querySelector('#ViewModal #borrower-email').textContent = borrowerEmail;
        document.querySelector('#ViewModal #booking-date').textContent = reservationDate; // FIXED: Properly set the span text
        document.querySelector('#ViewModal #status').value = status;
        document.querySelector('#ViewModal #borrowId').value = borrowId;

        // Open the modal
        openModal('ViewModal');
    }

    // Function to open the modal by ID
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('hidden'); // Remove the hidden class
            modal.classList.add('flex'); // Add the flex class to display the modal
        }
    }

    // Function to close the modal by ID
    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('hidden'); // Add the hidden class to hide the modal
            modal.classList.remove('flex'); // Remove the flex class
        }
    }

    // Expose functions globally if needed
    window.openModal = openModal;
    window.closeModal = closeModal;
    window.openViewModal = openViewModal;

});
