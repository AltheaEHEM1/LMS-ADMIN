
document.addEventListener('DOMContentLoaded', () => {
    function togglePopup(popupId) {
        const popup = document.getElementById(popupId);
        if (popup) {
            popup.classList.toggle('hidden');
        }
    }

    // Expose the function globally if needed
    window.togglePopup = togglePopup;

    const toggleInput = document.getElementById('active');
    const toggleBg = document.getElementById('toggle-bg');
    const toggleDot = document.getElementById('toggle-dot');

    // Add event listener to the checkbox
    toggleInput.addEventListener('change', () => {
        if (toggleInput.checked) {
            // If checked, change to "active" styles
            toggleBg.classList.remove('bg-gray-300');
            toggleBg.classList.add('bg-green-500');
            toggleDot.style.transform = 'translateX(1.5rem)';
        } else {
            // If not checked, revert to "inactive" styles
            toggleBg.classList.remove('bg-green-500');
            toggleBg.classList.add('bg-gray-300');
            toggleDot.style.transform = 'translateX(0)';
        }
    });
    
    
});
