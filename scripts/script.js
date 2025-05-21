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