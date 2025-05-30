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
        orderBox.className = "order-box active";

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

function closeModal() {
    document.getElementById("statusModal").style.display = "none";
    document.getElementById("modalOverlay").style.display = "none";
    // Aktifkan kembali input jika ingin cek ulang
    document.getElementById("trackingInput").readOnly = false;
    document.getElementById("trackingInput").value = "";
    document.getElementById("successMessage").style.display = "none";
    document.getElementById("orderDetails").innerHTML = "";
}

// Function to open the modal
function showModal() {
    document.getElementById("statusModal").style.display = "block";
    document.getElementById("statusModal").style.display = "block";
    var statusContainer = document.getElementById("statusContainer");
    if (statusContainer) statusContainer.style.display = "none";
    document.getElementById("modalOverlay").style.display = "block";
}

// Simulate API response (replace with actual API call)
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

    return mockData[trackingNumber] || { success: false };
}

    document.addEventListener("DOMContentLoaded", function () {
        const itemsPerPage = 3;
        let currentPage = 1;

        function showPage(page) {
            const boxes = document.querySelectorAll('.order-box');
            const totalPages = Math.ceil(boxes.length / itemsPerPage);

            if (page < 1) page = 1;
            if (page > totalPages) page = totalPages;

            // Sembunyikan semua box
            boxes.forEach(box => box.classList.remove('active'));

            // Tampilkan box sesuai halaman
            for (let i = (page - 1) * itemsPerPage; i < page * itemsPerPage; i++) {
                if (boxes[i]) boxes[i].classList.add('active');
            }

            // Update indikator halaman aktif
            document.querySelectorAll('#pagination .page-item').forEach(item => {
                const pageNum = item.getAttribute('data-page');
                if (!isNaN(pageNum)) {
                    item.classList.remove('active');
                    if (parseInt(pageNum) === page) item.classList.add('active');
                }
            });

            // Disable previous/next jika diperlukan
            document.querySelector('#pagination .page-item[data-page="prev"]').classList.toggle('disabled', page === 1);
            document.querySelector('#pagination .page-item[data-page="next"]').classList.toggle('disabled', page === totalPages);
        }

        // Event listener untuk pagination
        document.querySelectorAll('#pagination .page-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const target = this.getAttribute('data-page');

                if (target === 'prev') {
                    showPage(currentPage - 1);
                } else if (target === 'next') {
                    showPage(currentPage + 1);
                } else {
                    showPage(parseInt(target));
                }
            });
        });


        // Load halaman pertama saat pertama kali
        showPage(1);
    });
