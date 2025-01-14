document.addEventListener('DOMContentLoaded', () => {
    // Function to open a modal by ID
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('hidden'); // Show the modal
            modal.classList.add('flex'); // Use flex display
        }
    }

    // Function to close a modal by ID
    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('hidden'); // Hide the modal
            modal.classList.remove('flex'); // Remove flex display
        }
    }

    // Form Validation Function
    function validateForm() {
        let isValid = true;

        // Get field elements and error messages
        const fields = [
            { id: 'firstName', errorId: 'firstNameError', name: 'First Name' },
            { id: 'middleName', errorId: 'middleNameError', name: 'Middle Name' },
            { id: 'lastName', errorId: 'lastNameError', name: 'Last Name' },
            { id: 'phoneNo', errorId: 'phoneNoError', name: 'Phone Number' },
            { id: 'dob', errorId: 'dobError', name: 'Date of Birth' },
            { id: 'email', errorId: 'emailError', name: 'Email' },
            { id: 'address', errorId: 'addressError', name: 'Address' },
        ];

        // Check required fields
        fields.forEach(({ id, errorId, name }) => {
            const field = document.getElementById(id);
            const errorElement = document.getElementById(errorId);
            if (field && errorElement) {
                if (field.value.trim() === '') {
                    errorElement.textContent = `${name} is required.`;
                    errorElement.classList.remove('hidden');
                    isValid = false;
                } else {
                    errorElement.classList.add('hidden');
                }
            }
        });

        // Email Format Validation
        const email = document.getElementById('email');
        const emailErrorInvalid = document.getElementById('emailErrorInvalid');
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (email && email.value.trim() !== '' && !emailPattern.test(email.value.trim())) {
            emailErrorInvalid.textContent = 'Invalid email format.';
            emailErrorInvalid.classList.remove('hidden');
            isValid = false;
        } else if (emailErrorInvalid) {
            emailErrorInvalid.classList.add('hidden');
        }

        return isValid;
    }

    // Attach event listeners to buttons or form if required
    const modalOpenButtons = document.querySelectorAll('[data-modal-open]');
    const modalCloseButtons = document.querySelectorAll('[data-modal-close]');

    modalOpenButtons.forEach(button => {
        const targetModal = button.getAttribute('data-modal-open');
        button.addEventListener('click', () => openModal(targetModal));
    });

    modalCloseButtons.forEach(button => {
        const targetModal = button.getAttribute('data-modal-close');
        button.addEventListener('click', () => closeModal(targetModal));
    });

    const form = document.querySelector('form'); // Replace with specific form selector if needed
    if (form) {
        form.addEventListener('submit', event => {
            if (!validateForm()) {
                event.preventDefault(); // Prevent form submission if validation fails
            }
        });
    }
});
