    document.addEventListener("DOMContentLoaded", function () {
        // Select all elements with the class "play-video"
        const videoLinks = document.querySelectorAll(".play-video");
        const videoPlayer = document.getElementById("videoPlayer");

        videoLinks.forEach(link => {
            link.addEventListener("click", function () {
                const videoUrl = this.getAttribute("data-video-url");
                if (videoUrl) {
                    videoPlayer.src = videoUrl;
                }
            });
        });
    });
