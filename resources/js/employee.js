document.addEventListener('DOMContentLoaded', () => {
    // Function to open a modal by ID
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('hidden'); // Remove the hidden class
            modal.classList.add('flex'); // Add the flex class to display the modal
        }
    }

    // Function to close a modal by ID
    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('hidden'); // Add the hidden class to hide the modal
            modal.classList.remove('flex'); // Remove the flex class
        }
    }

    // Form Validation
    function validateForm() {
        let isValid = true;

        const requiredFields = [
            { id: 'firstName', errorId: 'firstNameError' },
            { id: 'middleName', errorId: 'middleNameError' },
            { id: 'lastName', errorId: 'lastNameError' },
            { id: 'phoneNo', errorId: 'phoneNoError' },
            { id: 'dob', errorId: 'dobError' },
            { id: 'email', errorId: 'emailError' },
            { id: 'address', errorId: 'addressError' }
        ];

        // Check required fields
        requiredFields.forEach(field => {
            const input = document.getElementById(field.id);
            const error = document.getElementById(field.errorId);

            if (input && error) {
                if (input.value.trim() === "") {
                    error.classList.remove('hidden');
                    isValid = false;
                } else {
                    error.classList.add('hidden');
                }
            }
        });

        // Email Format Validation
        const email = document.getElementById('email');
        const emailErrorInvalid = document.getElementById('emailErrorInvalid');
        if (email && emailErrorInvalid) {
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email.value.trim())) {
                emailErrorInvalid.classList.remove('hidden');
                isValid = false;
            } else {
                emailErrorInvalid.classList.add('hidden');
            }
        }

        return isValid;
    }

    // Expose functions globally if needed
    window.openModal = openModal;
    window.closeModal = closeModal;
    window.validateForm = validateForm;

    function savePermissions() {
        // Add logic to save permissions
        console.log("Permissions saved");
        // Close the modal
        closeModal('AccessModal');
    }
});
