// Function to open the modal
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');

        // Ensure cancel button works again when modal is reopened
        const cancelButton = modal.querySelector('.mr-2');
        if (cancelButton) {
            // Remove existing listeners first to avoid duplicates
            cancelButton.removeEventListener('click', closeModalHandler);
            // Now add the listener again
            cancelButton.addEventListener('click', closeModalHandler);
        }
    } else {
        console.error(`Modal with ID "${modalId}" not found.`);
    }
}

// Function to close the modal
function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    } else {
        console.error(`Modal with ID "${modalId}" not found.`);
    }
}

// Close modal handler function for cancel button
function closeModalHandler(event) {
    event.preventDefault();
    const modalId = event.target.closest('.fixed').id; // Get the closest modal ID
    closeModal(modalId); // Close the modal
}

// Add event listener for modals when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    // Select all buttons that open modals (e.g., Edit Photo, Edit Profile, Edit Address, Logout)
    const modalButtons = document.querySelectorAll('[onclick^="openModal("]');
    
    modalButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault(); // Prevent any default action
            const modalId = button.getAttribute('onclick').match(/'([^']+)'/)[1]; // Extract modal ID from onclick
            openModal(modalId);  // Open the corresponding modal
        });
    });

    // **Logout Modal: Target Cancel Button Specifically**
    const logoutCancelButton = document.getElementById('logout-cancel-btn');
    if (logoutCancelButton) {
        logoutCancelButton.addEventListener('click', (e) => {
            e.preventDefault();
            console.log("Cancel button clicked"); // Debugging log to check if it's being triggered
            closeModal('LogoutModal');  // Ensure the modal ID matches the actual ID in the HTML
        });
    }
});


// const cancelButton = document.querySelector('#LogoutModal button[type="button"]');
//  if (cancelButton) {
//      cancelButton.addEventListener('click', function() {
//          closeModal('LogoutModal');
//      });
//  }