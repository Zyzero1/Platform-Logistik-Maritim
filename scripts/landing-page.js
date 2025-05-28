// Daftar kota yang diizinkan untuk rute pengiriman
const allowedCities = [
    "batam", "jakarta", "surabaya", "tanjungpinang", "karimun", "lingga", "natuna", "anambas", "medan", "makassar",
    "palembang", "semarang", "bandung", "denpasar", "padang"
];

// Fungsi untuk membuka modal cek harga
function cekSearch() {
    const originInput = document.getElementById("originCity");
    const destInput = document.getElementById("destinationCity");

    if (!originInput || !destInput) {
        console.error("Input asal atau tujuan tidak ditemukan.");
        return;
    }

    const originCity = originInput.value.trim().toLowerCase();
    const destinationCity = destInput.value.trim().toLowerCase();

    // Validasi input wajib
    if (!originCity || !destinationCity) {
        alert("Silakan isi Kota Asal dan Kota Tujuan terlebih dahulu.");
        return;
    }

    // Validasi kota tersedia
    if (!allowedCities.includes(originCity)) {
        alert("Kota asal tidak dikenali.");
        return;
    }
    if (!allowedCities.includes(destinationCity)) {
        alert("Kota tujuan tidak dikenali.");
        return;
    }

    window.selectedOrigin = originCity;
    window.selectedDestination = destinationCity;

    // Tampilkan nama kota di modal
    const displayOrigin = document.getElementById("display-origin");
    const displayDestination = document.getElementById("display-destination");

    if (displayOrigin)
        displayOrigin.textContent = originCity.charAt(0).toUpperCase() + originCity.slice(1);
    if (displayDestination)
        displayDestination.textContent = destinationCity.charAt(0).toUpperCase() + destinationCity.slice(1);

    // Tampilkan modal
    const statusModal = document.getElementById("statusModal");
    if (statusModal) statusModal.style.display = "block";
}

function closeModal(modalId) {
    var modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'none';
    }
}

// Fungsi untuk tombol "CEK" di dalam modal
document.getElementById("cekButton")?.addEventListener("click", function () {
    const originCity = window.selectedOrigin;
    const destinationCity = window.selectedDestination;
    const weightInput = document.getElementById("weight");
    const totalPayment = document.getElementById("totalPayment");

    if (!originCity || !destinationCity || !weightInput || !totalPayment) {
        alert("Beberapa elemen tidak ditemukan.");
        return;
    }

    const weight = parseFloat(weightInput.value.trim());

    // Validasi format berat
    if (isNaN(weight) || weight <= 0) {
        alert("Berat harus berupa angka positif.");
        return;
    }

    // Tarif dasar per kg
    const baseRates = {
        "batam-tanjungpinang": 5000,
        "tanjungpinang-batam": 5000,
        "batam-natuna": 15000,
        "natuna-batam": 15000,
        "batam-karimun": 8000,
        "karimun-batam": 8000,
        "batam-lingga": 10000,
        "lingga-batam": 10000,
        "batam-anambas": 20000,
        "anambas-batam": 20000
    };

    const routeKey = `${originCity}-${destinationCity}`;
    const baseRatePerKg = baseRates[routeKey] || 7000;
    const minimumCharge = 25000; // Minimal biaya kirim
    const totalCost = Math.max(weight * baseRatePerKg, minimumCharge);

    totalPayment.value = `Rp. ${totalCost.toLocaleString('id-ID')}`;
});

// Fungsi untuk mengecek status pesanan
function checkStatus() {
    const trackingInput = document.getElementById("trackingInputMain");
    const orderDetails = document.getElementById("orderDetails");

    if (!trackingInput || !orderDetails) {
        console.error("Input atau kontainer detail pesanan tidak ditemukan.");
        return;
    }

    const trackingNumber = trackingInput.value.trim();
    if (!trackingNumber) {
        alert("Mohon isi nomor tracking terlebih dahulu.");
        return;
    }

    const response = simulateAPIResponse(trackingNumber);
    if (!response) {
        alert("Nomor tracking tidak ditemukan.");
        return;
    }

    const successMsg = document.getElementById("successMessage");
    if (successMsg) {
        successMsg.textContent = "Data berhasil ditemukan!";
        successMsg.style.display = "block";
    }

    const trackingInputReadonly = document.getElementById("trackingInput");
    if (trackingInputReadonly) {
        trackingInputReadonly.value = trackingNumber;
        trackingInputReadonly.readOnly = true;
    }

    orderDetails.innerHTML = "";

    const orderBox = document.createElement("div");
    orderBox.className = "order-box";

    // Icon
    const orderIcon = document.createElement("div");
    orderIcon.className = "order-icon";
    const iconImg = document.createElement("img");
    iconImg.src = response.data.icon;
    iconImg.alt = `${response.data.type} Icon`;
    orderIcon.appendChild(iconImg);
    orderBox.appendChild(orderIcon);

    // Detail
    const orderDetailsDiv = document.createElement("div");
    orderDetailsDiv.className = "order-details";
    const typeHeading = document.createElement("h4");
    typeHeading.textContent = response.data.type;
    const priceParagraph = document.createElement("p");
    priceParagraph.textContent = `Rp. ${response.data.price.toLocaleString("id-ID")}`;
    orderDetailsDiv.appendChild(typeHeading);
    orderDetailsDiv.appendChild(priceParagraph);
    orderBox.appendChild(orderDetailsDiv);

    // Lokasi
    const locationContainer = document.createElement("div");
    locationContainer.className = "location-container";
    const orderLocation = document.createElement("div");
    orderLocation.className = "order-location";
    const locationDot = document.createElement("i");
    locationDot.className = "fa-solid fa-location-dot";
    const locationText = document.createElement("div");
    locationText.className = "location-text";
    const addressSpan = document.createElement("span");
    addressSpan.className = "address";
    addressSpan.textContent = `${response.data.origin} - ${response.data.destination}`;
    
    const dateSpan = document.createElement("span");
    dateSpan.className = "date";
    dateSpan.textContent = response.data.date;
    
    locationText.appendChild(addressSpan);
    locationText.appendChild(dateSpan);
    orderLocation.appendChild(locationDot);
    orderLocation.appendChild(locationText);
    locationContainer.appendChild(orderLocation);
    orderBox.appendChild(locationContainer);

    // Status
    const orderStatus = document.createElement("div");
    orderStatus.className = "order-status";
    const statusSpan = document.createElement("span");
    statusSpan.className = "status-complete";
    statusSpan.textContent = response.data.status;
    orderStatus.appendChild(statusSpan);
    orderBox.appendChild(orderStatus);

    orderDetails.appendChild(orderBox);
    showModal();
}

// Simulasi API
function simulateAPIResponse(trackingNumber) {
    const mockData = {
        "LA-1234567": {
            success: true,
            data: {
                type: "Pengiriman Motor",
                price: 500000,
                origin: "Batam",
                destination: "Natuna",
                date: "12 Maret 2025",
                status: "Selesai",
                icon: "../img/motorcycle.png"
            }
        },
        "LA-7654321": {
            success: true,
            data: {
                type: "Pengiriman Mobil",
                price: 1000000,
                origin: "Lingga",
                destination: "Batam",
                date: "14 Juni 2025",
                status: "Dalam Perjalanan",
                icon: "../img/car.png"
            }
        },
        "LA-4567890": {
            success: true,
            data: {
                type: "Cargo Laut",
                price: 100000,
                origin: "Batam",
                destination: "Tanjung Pinang",
                date: "10 Mei 2025",
                status: "Selesai",
                icon: "../img/shipping.png"
            }
        }
    };

    return mockData[trackingNumber] || null;
}

// Fungsi untuk tampilkan modal
function showModal() {
    const modal = document.getElementById("statusModal2");
    if (modal) modal.style.display = "block";
}

// Fungsi untuk tutup semua jenis modal
function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = "none";
    } 

    // Reset input jika perlu
    if (modalId === "statusModal2") {
        const trackingInput = document.getElementById("trackingInput");
        const successMsg = document.getElementById("successMessage");
        const orderDetails = document.getElementById("orderDetails");

        if (trackingInput) {
            trackingInput.readOnly = false;
            trackingInput.value = "";
        }

        if (successMsg) successMsg.style.display = "none";
        if (orderDetails) orderDetails.innerHTML = "";
    }
}
