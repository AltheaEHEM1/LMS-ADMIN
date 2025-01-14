
// Get the form and the input elements
const form = document.getElementById('SigninForm');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const togglePasswordIcon = document.getElementById('togglePassword');
const eyeIcon = togglePasswordIcon.querySelector('i');

// Add event listener to handle form submission
form.addEventListener('submit', function (e) {
e.preventDefault();

const email = emailInput.value.trim();
const password = passwordInput.value.trim();

if (email === '' || password === '') {
    alert('Please enter both email and password.');
    return; // Stop form submission if validation fails
}

// If validation passes, navigate to the landing page
window.location.href = '/DASHBORDandingpage_employee'; // Navigate to the new page
});

    // Toggle password visibility
    // Get the toggle button and password field
    const togglePassword = document.getElementById('togglePassword');
    const passwordField = document.getElementById('password');

    // Ensure password is hidden by default
    passwordInput.type = 'password';

    // Ensure the eye icon is set to 'open eye' by default
    eyeIcon.classList.remove('fa-eye-slash');
    eyeIcon.classList.add('fa-eye');

    // Toggle password visibility logic
    togglePassword.addEventListener('click', function () {
        // Check if the password is currently hidden
        const isPasswordHidden = passwordInput.type === 'password';
        passwordInput.type = isPasswordHidden ? 'text' : 'password';

        // Update the eye icon
        if (isPasswordHidden) {
            // When password becomes visible, show the closed eye icon
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            // When password is hidden, show the open eye icon
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    });
