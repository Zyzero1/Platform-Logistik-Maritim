const allowedCities = [
    "batam", "jakarta", "surabaya", "tanjungpinang", "karimun", "lingga", "natuna", "anambas", "medan", "makassar",
    "palembang", "semarang", "bandung", "denpasar", "padang"
];
// Function to open the modal
function cekSearch() {
    const originCity = document.getElementById("originCity").value.trim().toLowerCase();
    const destinationCity = document.getElementById("destinationCity").value.trim().toLowerCase();

    // Cek apakah semua field sudah terisi
    if (!originCity || !destinationCity) {
        alert("Silakan isi Kota Asal dan Kota Tujuan terlebih dahulu.");
        return;
    }

    // Cek apakah kota valid
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

    // Tampilkan nilai di modal
    document.getElementById("display-origin").textContent = originCity.charAt(0).toUpperCase() + originCity.slice(1);
    document.getElementById("display-destination").textContent = destinationCity.charAt(0).toUpperCase() + destinationCity.slice(1);

    // Jika semua valid, tampilkan modal
    document.getElementById("statusModal").style.display = "block";
}

// Function to close the modal
function closeModal() {
    document.getElementById("statusModal").style.display = "none";
    document.getElementById("statusModal2").style.display = "none";
    document.getElementById("modalOverlay").style.display = "none";
    // Aktifkan kembali input jika ingin cek ulang
    document.getElementById("trackingInput").readOnly = false;
    document.getElementById("trackingInput").value = "";
    document.getElementById("successMessage").style.display = "none";
    document.getElementById("orderDetails").innerHTML = "";
}


// Event listener for the "CEK" button
document.getElementById("cekButton").addEventListener("click", function () {
    const originCity = window.selectedOrigin;
    const destinationCity = window.selectedDestination;
    const weightInput = document.getElementById("weight").value.trim();
    const weight = parseFloat(weightInput);
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
        "anambas-batam": 20000,
        // tambahkan lainnya sesuai kebutuhan
    };

    if (!originCity || !destinationCity || !weightInput) {
        alert("Silakan lengkapi semua data.");
        return;
    }

    // Validasi format berat harus angka
    if (isNaN(weight) || weight < 0) {
        alert("Berat harus berupa angka positif.");
        return;
    }

    // Cari tarif berdasarkan rute
    const routeKey = `${originCity}-${destinationCity}`;
    let baseRatePerKg = baseRates[routeKey] || 7000;

    // Hitung total biaya
    const totalCost = weight * baseRatePerKg;

    // Tampilkan hasil
    document.getElementById("totalPayment").value = `Rp. ${totalCost.toLocaleString('id-ID')}`;
});

// Function to check the status
function checkStatus() {
    const trackingNumber = document.getElementById("trackingInputMain").value.trim();
    const orderDetails = document.getElementById("orderDetails");

    // Validate input
    if (trackingNumber === "") {
        alert("Mohon isi nomor tracking terlebih dahulu.");
        return;
    }

    // Simulate API response (replace with actual API call)
    const response = simulateAPIResponse(trackingNumber);

    if (response && response.success) {
        var successMsg = document.getElementById("successMessage");
        if (successMsg) {
            successMsg.textContent = "Data berhasil ditemukan!";
            successMsg.style.display = "block";
        }
        orderDetails.innerHTML = "";
        document.getElementById("trackingInput").value = trackingNumber;
        document.getElementById("trackingInput").readOnly = true;
    
        // Add new order details
        const orderBox = document.createElement("div");
        orderBox.className = "order-box";

        // Order icon
        const orderIcon = document.createElement("div");
        orderIcon.className = "order-icon";
        const iconImg = document.createElement("img");
        iconImg.src = response.data.icon;
        iconImg.alt = response.data.type + " Icon";
        orderIcon.appendChild(iconImg);
        orderBox.appendChild(orderIcon);

        // Order details
        const orderDetailsDiv = document.createElement("div");
        orderDetailsDiv.className = "order-details";
        const typeHeading = document.createElement("h4");
        typeHeading.textContent = response.data.type;
        const priceParagraph = document.createElement("p");
        priceParagraph.textContent = `Rp. ${response.data.price}`;
        orderDetailsDiv.appendChild(typeHeading);
        orderDetailsDiv.appendChild(priceParagraph);
        orderBox.appendChild(orderDetailsDiv);

        // Location container
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
        addressSpan.textContent = response.data.origin + " - " + response.data.destination;
        const dateSpan = document.createElement("span");
        dateSpan.className = "date";
        dateSpan.textContent = response.data.date;
        locationText.appendChild(addressSpan);
        locationText.appendChild(dateSpan);
        orderLocation.appendChild(locationDot);
        orderLocation.appendChild(locationText);
        locationContainer.appendChild(orderLocation);
        orderBox.appendChild(locationContainer);

        // Order status
        const orderStatus = document.createElement("div");
        orderStatus.className = "order-status";
        const statusSpan = document.createElement("span");
        statusSpan.className = "status-complete";
        statusSpan.textContent = response.data.status;
        orderStatus.appendChild(statusSpan);
        orderBox.appendChild(orderStatus);

        // Append the entire order box to the modal
        orderDetails.appendChild(orderBox);
        showModal();
    } else if (response && response.data) {
        var successMsg = document.getElementById("successMessage");
        if (successMsg) {
            successMsg.style.display = "none";
        }
        // Show the modal
        showModal();
    } else {
        alert("Nomor tracking tidak ditemukan.");
    }
}

function simulateAPIResponse(trackingNumber) {
    // Replace this with an actual API call
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

    return mockData[trackingNumber] || { success: false };
}

function showModal() {
    const modal = document.getElementById("statusModal2");
    if (modal) {
        modal.style.display = "block";
    }
}

function closeModal() {
    const modal = document.getElementById("statusModal2");
    if (modal) {
        modal.style.display = "none";
    }
}