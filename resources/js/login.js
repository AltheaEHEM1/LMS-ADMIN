// Get the form and the input elements
const form = document.getElementById('SigninForm');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const togglePasswordIcon = document.getElementById('togglePassword');
const eyeIcon = togglePasswordIcon.querySelector('i');

// Ensure password is hidden by default
passwordInput.type = 'password';
eyeIcon.classList.remove('fa-eye-slash');
eyeIcon.classList.add('fa-eye');

// Add event listener to handle form submission
form.addEventListener('submit', async function (e) {
    e.preventDefault();

    const email = emailInput.value.trim();
    const password = passwordInput.value.trim();

    if (email === '' || password === '') {
        alert('Please enter both email and password.');
        return; // Stop form submission if validation fails
    }

    try {
        // Send login data to the server using fetch
        const response = await fetch('/login_employee', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({ email, password }),
        });

        const result = await response.json();

        if (response.ok) {
            // Login successful, redirect to the dashboard
            window.location.href = '/DASHBORDLandingpage_employee';
        } else {
            // Show error message
            alert(result.message || 'Login failed. Please try again.');
        }
    } catch (error) {
        console.error('Error during login:', error);
        alert('An error occurred. Please try again.');
    }
});

// Toggle password visibility
togglePasswordIcon.addEventListener('click', function () {
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
