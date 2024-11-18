function addPekerjaan() {
    const container = document.getElementById("pekerjaan-container"); // Container untuk input baru
    const inputWrapper = document.createElement("div"); // Wrapper untuk input dan ikon
    inputWrapper.classList.add("relative", "mb-5"); // Menambahkan kelas untuk styling

    const input = document.createElement("input"); // Membuat elemen input baru
    input.type = "text";
    input.name = "todaysActivity[]"; // Menggunakan array untuk menyimpan banyak input
    input.placeholder = "Masukkan pekerjaan tambahan";
    input.classList.add(
        "form-control",
        "bg-gray-50",
        "border",
        "border-gray-300",
        "text-gray-900",
        "text-sm",
        "rounded-lg",
        "focus:ring-blue-500",
        "focus:border-blue-500",
        "block",
        "w-full",
        "p-2.5",
        "pl-10"
    );

    // Ikon untuk input
    const icon = document.createElement("span");
    icon.classList.add("icon");
    icon.innerHTML = '<i class="fas fa-user text-gray-400"></i>';

    inputWrapper.appendChild(input); // Menambahkan input ke wrapper
    inputWrapper.appendChild(icon); // Menambahkan ikon ke wrapper
    container.appendChild(inputWrapper); // Menambahkan wrapper ke container
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
