// Function to open the modal
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');  // Ensure modal displays as flex
    } else {
        console.error(`Modal with ID "${modalId}" not found.`);
    }
}

// Function to close the modal
function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.remove('flex');
        modal.classList.add('hidden');  // Ensure modal is hidden
    } else {
        console.error(`Modal with ID "${modalId}" not found.`);
    }
}

// **Note**: Uncomment if ever needed.
// // Function to handle save action
// function saveChanges() {
//     console.log("Changes Saved!");
//     // Add your save logic here
//     closeModal('ViewModal');  // Close the modal after saving
// }

// Add event listener for modals when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    // Select all buttons that open modals (e.g., View)
    const modalButtons = document.querySelectorAll('[onclick^="openModal("]');
    
    modalButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault(); // Prevent any default action
            const modalId = button.getAttribute('onclick').match(/'([^']+)'/)[1]; // Extract modal ID from onclick
            openModal(modalId);  // Open the corresponding modal
        });
    });

    // **Cancel Button**: General case for Cancel buttons inside any modal
    const cancelButtons = document.querySelectorAll('.mr-2');  // Targets buttons with 'mr-2' class (Cancel button)
    
    cancelButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const modalId = button.closest('.fixed').id; // Get the modal ID by finding the closest '.fixed' parent
            closeModal(modalId);  // Close the modal when Cancel is clicked
        });
    });

    // **Save Button**: Select all Save buttons and handle their actions
    // **Note**: Uncomment if ever needed.
    // const saveButtons = document.querySelectorAll('.save-btn');  // Targets Save buttons with 'save-btn' class
    // saveButtons.forEach(button => {
    //     button.addEventListener('click', (e) => {
    //         e.preventDefault(); // Prevent default action
    //         saveChanges();  // Handle save action and close the modal
    //     });
    // });
});
