function addPekerjaan() {
    const container = document.getElementById("pekerjaan-container");
    const newInput = document.createElement("div");
    newInput.classList.add("flex", "items-center", "mb-4", "pekerjaan-item");
    newInput.innerHTML = `
    <input type="text" name="todaysActivity[]" placeholder="Masukkan pekerjaan tambahan"
        class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 flex-grow p-2.5">
    <button type="button" class="ml-2 px-3 py-1 text-white bg-red-500 hover:bg-red-700 rounded-lg font-bold text-sm" onclick="removePekerjaan(this)">-</button>`;
    container.appendChild(newInput);
}

function removePekerjaan(button) {
    const container = document.getElementById("pekerjaan-container");
    const pekerjaanItems = container.getElementsByClassName("pekerjaan-item");

    // Hanya menghapus jika jumlah pekerjaan lebih dari 1
    if (pekerjaanItems.length > 0) {
        button.parentElement.remove();
    }
}

function setClockOutTime() {
    const now = new Date();
    const hours = now.getHours().toString().padStart(2, "0");
    // Menambahkan nol di depan jika kurang dari 10
    const minutes = now.getMinutes().toString().padStart(2, "0");
    const time = hours + ":" + minutes;
    // Mengisi input hidden dengan waktu saat ini
    document.getElementById("clockOut").value = time;
}
// Panggil fungsi ini saat halaman dimuat untuk mengisi waktu '
window.onload = setClockOutTime;
