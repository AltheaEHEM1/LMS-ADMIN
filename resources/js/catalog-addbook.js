document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('myModal');
    const openModalButton = document.getElementById('openModalButton');
    const closeModalButton = document.getElementById('closeModalButton');

    // Function to show the modal
    const showModal = () => {
        modal.classList.remove('hidden');
    };

    // Function to close the modal
    const closeModal = () => {
        modal.classList.add('hidden');
    };

    // Event listeners for opening and closing the modal
    openModalButton.addEventListener('click', showModal);
    closeModalButton.addEventListener('click', closeModal);

    // Close the modal when clicking outside its content
    modal.addEventListener('click', (event) => {
        if (event.target === modal) {
            closeModal();
        }
    });
});
