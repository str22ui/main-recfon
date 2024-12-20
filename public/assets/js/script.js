const swiper = new Swiper(".swiper", {
    // Optional parameters
    direction: "horizontal",
    loop: true,

    // If we need pagination
    pagination: {
        el: ".swiper-pagination",
    },

    // Navigation arrows
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
document.addEventListener("DOMContentLoaded", function () {
    const popup = document.getElementById("popup-message");
    const closePopup = document.getElementById("close-popup");

    if (popup) {
        closePopup.addEventListener("click", function () {
            popup.style.display = "none";
        });

        // Otomatis hilang setelah beberapa detik
        setTimeout(() => {
            popup.style.display = "none";
        }, 5000); // 5000 ms = 5 detik
    }
});
