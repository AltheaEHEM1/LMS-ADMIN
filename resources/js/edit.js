
    // Function to show modal
    function showModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
    }

    // Function to close modal
    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }

    // Event listeners for buttons
    document.getElementById('uploadButton').addEventListener('click', function () {
        showModal('uploadModal');
    });

    document.getElementById('saveButton').addEventListener('click', function () {
        showModal('saveModal');
    });

