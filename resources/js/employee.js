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
    

    function openEditModal(button) {
        // Get data attributes from the button
        const id = button.getAttribute('data-id');
        const firstName = button.getAttribute('data-first-name');
        const middleName = button.getAttribute('data-middle-name');
        const lastName = button.getAttribute('data-last-name');
        const phone = button.getAttribute('data-phone');
        const dob = button.getAttribute('data-dob');
        const address = button.getAttribute('data-address');
        const email = button.getAttribute('data-email');
        const photo = button.getAttribute('data-photo');
    
        // Set the values in the modal form
        document.getElementById('firstName').value = firstName || ''; // Default to empty string if null
        document.getElementById('middleName').value = middleName || '';
        document.getElementById('lastName').value = lastName || '';
        document.getElementById('phoneNo').value = phone || '';
        document.getElementById('dob').value = dob || '';
        document.getElementById('address').value = address || '';
        document.getElementById('email').value = email || '';
        alert(`Employee ID: ${id}`);
    
    // Alternatively, set it as text in a specific element
        document.getElementById('displayId').innerText = `Employee ID: ${id}`;
        // Update the photo preview
        const photoPreview = document.querySelector('#EditModal img');
        if (photoPreview) {
            photoPreview.src = photo || '/path/to/default/photo.jpg'; // Use a fallback photo if none is provided
        }
    
        // Store the employee ID in a hidden input (if needed)
        document.getElementById('EditEmployeeForm').setAttribute('data-id', id);
    
        // Show the modal
        openModal('EditModal');
    }
    
    
    

    // Expose functions globally if needed
    window.openModal = openModal;
    window.closeModal = closeModal;
    window.openViewModal = openViewModal;
    window.openEditModal = openEditModal;


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

        const id = this.getAttribute('data-id');
        const formData = new FormData(this);

        fetch(`/employee/update/${id}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Employee updated successfully');
                location.reload(); // Refresh the page or update the UI
            } else {
                alert('Error updating employee');
            }
        })
        .catch(error => console.error('Error:', error));
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
