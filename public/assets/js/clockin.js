function setClockInTime() {
    const now = new Date();
    const hours = now.getHours().toString().padStart(2, "0");
    const minutes = now.getMinutes().toString().padStart(2, "0");
    const time = hours + ":" + minutes;
    document.getElementById("clockIn").value = time;
}

// Call this function when the page loads to fill in the current time
window.onload = function () {
    setClockInTime();
    getLocation();
};

// Attach an event listener to ensure time is set on form submission
document.querySelector("form").addEventListener("submit", function () {
    setClockInTime(); // Ensure the time is set before submitting
});

// Geolocation function
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {
    let lat = position.coords.latitude;
    let lon = position.coords.longitude;
    document.getElementById("maps").value = "Lat: " + lat + ", Lon: " + lon;
}
