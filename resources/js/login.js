// Get the form and input elements
const form = document.getElementById('SigninForm');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const togglePasswordIcon = document.getElementById('togglePassword');
const eyeIcon = togglePasswordIcon.querySelector('i');

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

        if (response.ok) {
            // Redirect handled by Laravel if login is successful
            const result = await response.json();
            window.location.href = result.redirect || '/DASHBORDLandingpage_employee';
        } else if (response.status === 422) {
            // Laravel validation error
            const errorData = await response.json();
            alert(errorData.errors.email || 'Invalid input. Please try again.');
        } else {
            // General error
            const errorData = await response.json();
            alert(errorData.message || 'Login failed. Please try again.');
        }
    } catch (error) {
        console.error('Error during login:', error);
        alert('An error occurred. Please try again.');
    }
});

// Toggle password visibility
togglePasswordIcon.addEventListener('click', function () {
    const isPasswordHidden = passwordInput.type === 'password';
    passwordInput.type = isPasswordHidden ? 'text' : 'password';

    // Update the eye icon
    eyeIcon.classList.toggle('fa-eye');
    eyeIcon.classList.toggle('fa-eye-slash');
});
