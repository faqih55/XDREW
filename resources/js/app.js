import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// ===== Page Transition Handler =====
document.addEventListener('DOMContentLoaded', function() {
    setupPageTransitions();
});

function setupPageTransitions() {
    // Animasi entrance untuk halaman pertama kali load
    const mainContent = document.querySelector('main') || document.body;
    if (mainContent) {
        mainContent.style.opacity = '0';
        mainContent.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            mainContent.classList.add('page-enter');
            mainContent.style.opacity = '1';
            mainContent.style.transform = 'translateY(0)';
        }, 100);
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
        
        link.addEventListener('click', function(e) {
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
    
    // Tampilkan overlay transisi
    showTransitionOverlay();
    
    // Animasi keluar halaman saat ini
    if (mainContent) {
        mainContent.classList.remove('page-enter');
        mainContent.classList.add('page-exit');
    }
    
    // Tunggu animasi selesai, lalu navigasi
    setTimeout(() => {
        window.location.href = url;
    }, 400);
}

function showTransitionOverlay() {
    // Cek apakah overlay sudah ada
    let overlay = document.getElementById('page-transition-overlay');
    
    if (!overlay) {
        overlay = document.createElement('div');
        overlay.id = 'page-transition-overlay';
        overlay.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(78, 222, 163, 0.1) 0%, rgba(14, 21, 17, 0.3) 100%);
            z-index: 9999;
            pointer-events: none;
            backdrop-filter: blur(2px);
        `;
        document.body.appendChild(overlay);
    }
    
    overlay.classList.add('transition-overlay');
    overlay.style.opacity = '1';
    overlay.style.pointerEvents = 'none';
    
    // Hapus overlay setelah beberapa waktu
    setTimeout(() => {
        overlay.classList.remove('transition-overlay');
        overlay.style.opacity = '0';
    }, 500);
}
