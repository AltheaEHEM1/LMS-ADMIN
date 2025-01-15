document.addEventListener('DOMContentLoaded', () => {
    function showModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }

    // Export the functions to the global scope if needed
    window.showModal = showModal;
    window.closeModal = closeModal;
});
