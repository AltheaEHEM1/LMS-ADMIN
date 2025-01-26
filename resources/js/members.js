document.addEventListener('DOMContentLoaded', () => {
    // Function to open a modal by ID
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
    }

    // Function to close a modal by ID
    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    }

    // Function to open the View Modal with dynamic data
    function openViewModal(button) {
        // Fetch dynamic data from button attributes
        const firstName = button.getAttribute('data-first-name') || "N/A";
        const middleName = button.getAttribute('data-middle-name') || "N/A";
        const lastName = button.getAttribute('data-last-name') || "N/A";
        const phone = button.getAttribute('data-phone') || "N/A";
        const email = button.getAttribute('data-email') || "N/A";
        const address = button.getAttribute('data-address') || "N/A";

        // Populate modal fields
        document.querySelector('#ViewModal [data-key="first-name"]').textContent = firstName;
        document.querySelector('#ViewModal [data-key="middle-name"]').textContent = middleName;
        document.querySelector('#ViewModal [data-key="last-name"]').textContent = lastName;
        document.querySelector('#ViewModal [data-key="phone"]').textContent = phone;
        document.querySelector('#ViewModal [data-key="email"]').textContent = email;
        document.querySelector('#ViewModal [data-key="address"]').textContent = address;

        // Open the modal
        openModal('ViewModal');
    }

    // Function to open the Edit Modal with dynamic data
    function openEditModal(button) {
        const firstName = button.getAttribute('data-first-name') || '';
        const lastName = button.getAttribute('data-last-name') || '';
        const phone = button.getAttribute('data-phone') || '';
        const email = button.getAttribute('data-email') || '';
        
        // Set the values in the Edit Modal form
        document.getElementById('editFirstName').value = firstName;
        document.getElementById('editLastName').value = lastName;
        document.getElementById('editPhone').value = phone;
        document.getElementById('editEmail').value = email;

        // Open the modal
        openModal('EditModal');
    }

    // Attach event listeners to open buttons
    const openButtons = document.querySelectorAll('[data-modal-open]');
    openButtons.forEach(button => {
        const targetModal = button.getAttribute('data-modal-open');
        button.addEventListener('click', () => openModal(targetModal));
    });

    // Attach event listeners to close buttons
    const closeButtons = document.querySelectorAll('[data-modal-close]');
    closeButtons.forEach(button => {
        const targetModal = button.getAttribute('data-modal-close');
        button.addEventListener('click', () => closeModal(targetModal));
    });

    // Expose functions globally if needed
    window.openModal = openModal;
    window.closeModal = closeModal;
    window.openViewModal = openViewModal;
    window.openEditModal = openEditModal;

    
    // baka need
    const form = document.querySelector('form'); // Replace with specific form selector if needed
    if (form) {
        form.addEventListener('submit', event => {
            if (!validateForm()) {
                event.preventDefault(); // Prevent form submission if validation fails
            }
        });
    }


});


// // Form Validation Function
// function validateForm() {
//     let isValid = true;

//     // Get field elements and error messages
//     const fields = [
//         { id: 'firstName', errorId: 'firstNameError', name: 'First Name' },
//         { id: 'middleName', errorId: 'middleNameError', name: 'Middle Name' },
//         { id: 'lastName', errorId: 'lastNameError', name: 'Last Name' },
//         { id: 'phoneNo', errorId: 'phoneNoError', name: 'Phone Number' },
//         { id: 'dob', errorId: 'dobError', name: 'Date of Birth' },
//         { id: 'email', errorId: 'emailError', name: 'Email' },
//         { id: 'address', errorId: 'addressError', name: 'Address' },
//     ];

//     // Check required fields
//     fields.forEach(({ id, errorId, name }) => {
//         const field = document.getElementById(id);
//         const errorElement = document.getElementById(errorId);
//         if (field && errorElement) {
//             if (field.value.trim() === '') {
//                 errorElement.textContent = `${name} is required.`;
//                 errorElement.classList.remove('hidden');
//                 isValid = false;
//             } else {
//                 errorElement.classList.add('hidden');
//             }
//         }
//     });

//     // Email Format Validation
//     const email = document.getElementById('email');
//     const emailErrorInvalid = document.getElementById('emailErrorInvalid');
//     const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

//     if (email && email.value.trim() !== '' && !emailPattern.test(email.value.trim())) {
//         emailErrorInvalid.textContent = 'Invalid email format.';
//         emailErrorInvalid.classList.remove('hidden');
//         isValid = false;
//     } else if (emailErrorInvalid) {
//         emailErrorInvalid.classList.add('hidden');
//     }

//     return isValid;
// }
