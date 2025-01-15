    
    document.addEventListener('DOMContentLoaded', () => {
        // Function to toggle popup visibility
        function togglePopup() {
            const popup = document.getElementById('popup');
            if (popup) {
                popup.classList.toggle('hidden');
            } else {
                console.error("Popup element not found.");
            }
        }

        // Expose the function globally for inline onclick usage
        window.togglePopup = togglePopup;

        // Optional: Add event listener for the "Active" toggle switch
        const toggleInput = document.getElementById('active');
        if (toggleInput) {
            toggleInput.addEventListener('change', () => {
                const toggleBg = toggleInput.closest('label').querySelector('div');
                const toggleDot = toggleBg.querySelector('.dot');

                if (toggleInput.checked) {
                    // Add active styles to the dot
                    toggleDot.classList.remove('bg-white');
                    toggleDot.classList.add('bg-green-500');
                    toggleDot.style.transform = 'translateX(1.5rem)';
                } else {
                    // Revert styles when inactive
                    toggleDot.classList.remove('bg-green-500');
                    toggleDot.classList.add('bg-white');
                    toggleDot.style.transform = 'translateX(0)';
                }
            });
    }
    });
