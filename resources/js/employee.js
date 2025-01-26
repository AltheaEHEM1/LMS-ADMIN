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

    // Function to open the View Modal with dynamic data
    function openViewModal(button) {
        // Fetch data from the button's data attributes
        const firstName = button.getAttribute('data-first-name') || "N/A";
        const middleName = button.getAttribute('data-middle-name') || "N/A";
        const lastName = button.getAttribute('data-last-name') || "N/A";
        const phone = button.getAttribute('data-phone') || "N/A";
        const dob = button.getAttribute('data-dob') || "N/A";
        const address = button.getAttribute('data-address') || "N/A";
        const email = button.getAttribute('data-email') || "N/A";
        const joined = button.getAttribute('data-joined') || "N/A";
        const modified = button.getAttribute('data-modified') || "N/A";
    
        // Populate modal fields
        document.querySelector('#ViewModal [data-key="first-name"]').textContent = firstName;
        document.querySelector('#ViewModal [data-key="middle-name"]').textContent = middleName;
        document.querySelector('#ViewModal [data-key="last-name"]').textContent = lastName;
        document.querySelector('#ViewModal [data-key="phone"]').textContent = phone;
        document.querySelector('#ViewModal [data-key="dob"]').textContent = dob;
        document.querySelector('#ViewModal [data-key="address"]').textContent = address;
        document.querySelector('#ViewModal [data-key="email"]').textContent = email;
        document.querySelector('#ViewModal [data-key="joined"]').textContent = joined;
        document.querySelector('#ViewModal [data-key="modified"]').textContent = modified;
        const photo = button.getAttribute('data-photo') || "/path/to/default/photo.jpg"; // Default photo if none provided

        const photoElement = document.querySelector('#ViewModal img[data-key="photo"]');
        if (photoElement) {
            photoElement.setAttribute('src', photo);
        }
    
        // Open the modal
        openModal('ViewModal');
    }
    

    // Expose functions globally if needed
    window.openModal = openModal;
    window.closeModal = closeModal;
    window.openViewModal = openViewModal;


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
