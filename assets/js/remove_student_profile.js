
    document.getElementById('uploadremove').addEventListener('click', function () {
        const userId = this.getAttribute('data-user-id');

        // Confirm deletion
        if (confirm("Are you sure you want to remove your profile picture?")) {
            // Make an AJAX request to remove the profile photo
            fetch('../includes/remove_profile_photo.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ user_id: userId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Profile photo removed successfully!");
                    // Update the profile photo with the default avatar
                    document.getElementById('userProfileImg').src = "../assets/images/avatar/empty-profile.png";
                } else {
                    alert("Failed to remove profile photo. Please try again.");
                }
            })
            .catch(error => console.error('Error:', error));
        }
    });
