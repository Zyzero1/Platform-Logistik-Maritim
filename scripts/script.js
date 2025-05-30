document.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault(); // Optional: cegah redirect sementara

            // Hapus kelas 'active' dari semua item
            document.querySelectorAll('.dropdown-item').forEach(link => {
                link.classList.remove('active');
            });

            // Tambahkan kelas 'active' hanya pada item yang diklik
            this.classList.add('active');

            // Jika perlu redirect setelah klik
            window.location.href = this.getAttribute('href');
        });
    });

document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll(".nav-link");
    const indicator = document.querySelector(".indicator");

    // Fungsi untuk posisikan indikator
    function moveIndicator(element) {
        const linkRect = element.getBoundingClientRect();
        const navRect = document.querySelector("nav").getBoundingClientRect();

        const left = linkRect.left - navRect.left + (linkRect.width / 2) - 30;

        indicator.style.left = `${left}px`;
        indicator.style.opacity = "1";
    }

    // Saat hover
    links.forEach(link => {
        link.addEventListener("mouseenter", () => {
            moveIndicator(link);
        });

        link.addEventListener("mouseleave", () => {
            if (!link.classList.contains("active")) {
                indicator.style.opacity = "0";
            }
        });
    });

    // Saat klik (set active)
    links.forEach(link => {
        link.addEventListener("click", function (e) {
            // Hapus kelas aktif dari semua link
            links.forEach(l => l.classList.remove("active"));
            // Tambahkan kelas aktif ke link yang diklik
            this.classList.add("active");
            moveIndicator(this);
        });
    });

    // Set default indikator pada menu aktif awal
    const activeLink = document.querySelector(".nav-link.active");
    if (activeLink) {
        moveIndicator(activeLink);
        indicator.style.opacity = "1";
    }
});