
document.addEventListener('DOMContentLoaded', () => {
        function toggleCoverPhotoPopup() {
            const popup = document.getElementById('cover-photo-popup');
            popup.classList.toggle('hidden');
        }
        // Expose the function globally if needed
        window.toggleCoverPhotoPopup = toggleCoverPhotoPopup;
    });

    
    // Handle the cover photo upload
    document.getElementById('change-cover-photo-form').addEventListener('submit', function (e) {
        e.preventDefault();
        const coverPhotoInput = document.getElementById('coverPhoto');
        if (coverPhotoInput.files.length > 0) {
            const newCoverPhoto = URL.createObjectURL(coverPhotoInput.files[0]);
            document.getElementById('current-cover-photo').src = newCoverPhoto;
            toggleCoverPhotoPopup();
        }
    });