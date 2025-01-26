
 // Set modal open/close for logout
 const logoutLink = document.querySelector('a[href="#"]');
 if (logoutLink) {
     logoutLink.addEventListener('click', function(e) {
         e.preventDefault(); // Prevent the default link behavior
         openModal('LogoutModal');
     });
 }

 // Close modal when cancel button is clicked
 const cancelButton = document.querySelector('#LogoutModal button[type="button"]');
 if (cancelButton) {
     cancelButton.addEventListener('click', function() {
         closeModal('LogoutModal');
     });
 }