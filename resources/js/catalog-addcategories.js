document.addEventListener('DOMContentLoaded', () => {
    function showModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden'); // ✅ Fixed
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden'); // ✅ Fixed
    }

    // Function to populate and open the View Category Modal
    function openViewCategoryModal(button) {
        // Fetch category details from the selected row
        const categoryId = button.closest('tr').querySelector('#categoryID').textContent.trim();
        const categoryName = button.closest('tr').querySelector('#categoryName').textContent.trim();
        const categoryItems = button.closest('tr').querySelector('#categoryItems').textContent.trim();
        const categoryCreated = button.getAttribute('data-created') || "N/A"; 
        const categoryModified = button.getAttribute('data-modified') || "N/A"; 
        const photo = button.getAttribute('data-photo') || "./images/photo.png"; // Default photo

        // Populate modal fields
        document.querySelector('#viewCategoryModal #categoryName').textContent = categoryName;
        document.querySelector('#viewCategoryModal #categoryItems').textContent = categoryItems;
        document.querySelector('#viewCategoryModal #categoryCreated').textContent = categoryCreated;
        document.querySelector('#viewCategoryModal #categoryModified').textContent = categoryModified;

        // Set the photo in the modal
        const photoElement = document.querySelector('#viewCategoryModal img[data-key="photo"]');
        if (photoElement) {
            photoElement.setAttribute('src', photo);
        }

        // Open the modal
        showModal('viewCategoryModal');
    }

    // Attach event listeners to all view buttons
    document.querySelectorAll('.view-category-btn').forEach(button => {
        button.addEventListener('click', function () {
            openViewCategoryModal(this);
        });
    });

    function openEditCategoryModal(button) {
        // Fetch category details from the button attributes
        const categoryId = button.getAttribute('data-id');
        const categoryName = button.getAttribute('data-name');
        const categoryPhoto = button.getAttribute('data-photo') || "./images/photo.png"; // Default photo

        // Populate modal fields
        document.querySelector('#editCategoryId').value = categoryId;
        document.querySelector('#editCategoryName').value = categoryName;
        
        const photoElement = document.querySelector('#editCategoryPhoto');
        if (photoElement) {
            photoElement.setAttribute('src', categoryPhoto);
        }

        // Set the form action dynamically
        const form = document.querySelector('#editCategoryForm');
        form.action = `/categories/${categoryId}`; // Assuming RESTful update route

        // Open the modal
        showModal('editCategoryModal');
    }

    // Attach event listeners to all edit buttons
    document.querySelectorAll('.edit-category-btn').forEach(button => {
        button.addEventListener('click', function () {
            openEditCategoryModal(this);
        });
    });


    function openDeleteCategoryModal(button) {
        const categoryId = button.getAttribute('data-id');
    
        // Set the hidden input field
        document.getElementById('deleteCategoryId').value = categoryId;
    
        // Update the form action dynamically with the correct category ID
        const form = document.getElementById('deleteCategoryForm');
        form.action = `/categories/${categoryId}`;
    
        // Open the modal
        showModal('deleteCategoryModal');
    }
    
    // Attach event listeners to all delete buttons
    document.querySelectorAll('.delete-category-btn').forEach(button => {
        button.addEventListener('click', function () {
            openDeleteCategoryModal(this);
        });
    });


    // Export functions globally
    window.showModal = showModal;
    window.closeModal = closeModal;
});
