import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// ===== Page Transition Handler =====
document.addEventListener('DOMContentLoaded', function () {
    setupPageTransitions();
});

function setupPageTransitions() {
    // Animasi entrance untuk halaman pertama kali load
    const mainContent = document.querySelector('main') || document.body;
    if (mainContent) {
        mainContent.style.opacity = '0';
        mainContent.style.transform = 'translateY(15px)';
        mainContent.style.transition = 'opacity 0.8s cubic-bezier(0.22, 1, 0.36, 1), transform 0.8s cubic-bezier(0.22, 1, 0.36, 1)';

        setTimeout(() => {
            mainContent.style.opacity = '1';
            mainContent.style.transform = 'translateY(0)';
        }, 50);
    }

    // Setup untuk semua link navigasi
    setupNavigationTransitions();
}

function setupNavigationTransitions() {
    // Pilih semua link yang seharusnya trigger animasi transisi
    const navLinks = document.querySelectorAll('a[href^="/"], a[href^="' + window.location.origin + '"]');

    navLinks.forEach(link => {
        // Skip link yang membuka di tab baru atau link anchor
        if (link.target === '_blank' || link.href.includes('#')) {
            return;
        }

        link.addEventListener('click', function (e) {
            const href = this.getAttribute('href');

            // Skip jika link mengarah ke halaman yang sama
            if (href === window.location.pathname) {
                return;
            }

            e.preventDefault();
            handlePageTransition(href);
        });
    });
}

function handlePageTransition(url) {
    const mainContent = document.querySelector('main') || document.body;

    // Animasi keluar halaman saat ini
    if (mainContent) {
        mainContent.style.transition = 'opacity 0.4s ease-in-out, transform 0.4s ease-in-out';
        mainContent.style.opacity = '0';
        mainContent.style.transform = 'translateY(-10px)';
    }

    // Tunggu animasi selesai, lalu navigasi
    setTimeout(() => {
        window.location.href = url;
    }, 350); // Waktu dipercepat sedikit agar klik terasa lebih responsif
}
