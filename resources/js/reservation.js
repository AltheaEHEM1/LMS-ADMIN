// Function to open the modal
function openModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.remove('hidden');
}

// Function to close the modal
function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.add('hidden');
}

// Close modal when clicking outside of it
window.addEventListener('click', function(event) {
    const modal = document.getElementById('ViewModal');
    if (event.target === modal) {
        closeModal('ViewModal');
    }
});
