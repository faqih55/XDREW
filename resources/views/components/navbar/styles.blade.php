<style>
    @keyframes float-orb-1 {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(20px, -20px) scale(1.1); }
        66% { transform: translate(-10px, 15px) scale(0.9); }
    }
    @keyframes float-orb-2 {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(-20px, 15px) scale(0.95); }
        66% { transform: translate(15px, -15px) scale(1.05); }
    }
    @keyframes float-orb-3 {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(15px, 20px) scale(1.1); }
        66% { transform: translate(-15px, -10px) scale(0.9); }
    }
    .orb-1 { animation: float-orb-1 12s ease-in-out infinite; }
    .orb-2 { animation: float-orb-2 15s ease-in-out infinite; }
    .orb-3 { animation: float-orb-3 10s ease-in-out infinite; }
    
    /* Clean Minimalist Frosted Glass Navbar Styling */
    .glass-pill {
        background: rgba(255, 255, 255, 0.75) !important;
        backdrop-filter: blur(16px) saturate(180%) !important;
        -webkit-backdrop-filter: blur(16px) saturate(180%) !important;
        border: 1px solid rgba(255, 255, 255, 0.5) !important;
        border-radius: 9999px !important;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05) !important;
        transition: all 0.4s ease !important;
    }

    /* Default Navbar item colors */
    .glass-pill a, .glass-pill button, .glass-pill span {
        color: #1A2E26 !important;
        font-weight: 600 !important;
        font-family: 'Outfit', 'Poppins', sans-serif !important;
        letter-spacing: 0.05em !important;
        transition: all 0.3s ease !important;
    }
    
    .glass-pill a.nav-link {
        border-radius: 9999px !important;
        padding: 0 12px !important;
    }

    /* Hover navbar item style */
    .glass-pill a.nav-link:not([class*="text-[#4edea3]"]):hover, 
    .glass-pill button:hover {
        background: rgba(255, 255, 255, 0.6) !important;
        color: #10b981 !important;
    }

    .glass-pill a.nav-link:not([class*="text-[#4edea3]"]):hover span,
    .glass-pill button:hover span {
        color: #10b981 !important;
    }

    /* Active Navigation Link */
    .glass-pill a[class*="text-[#4edea3]"],
    .glass-pill a.text-\[\#4edea3\] {
        background: rgba(78, 222, 163, 0.15) !important;
        color: #10b981 !important;
    }
    
    .glass-pill a[class*="text-[#4edea3]"] span,
    .glass-pill a.text-\[\#4edea3\] span {
        color: #10b981 !important;
    }

    .glass-pill .material-symbols-outlined {
        color: inherit !important;
        font-family: 'Material Symbols Outlined' !important;
        font-weight: normal !important;
        letter-spacing: normal !important;
        text-transform: none !important;
    }
    
    /* Logo overrides */
    .glass-pill a.group\/logo span {
        color: #1A2E26 !important;
        font-weight: 800 !important;
        letter-spacing: -0.02em !important;
    }
    .glass-pill a.group\/logo:hover span {
        color: #10b981 !important;
    }
    .glass-pill span.bg-\[\#4edea3\] {
        background-color: #10b981 !important;
        box-shadow: 0 0 8px rgba(78, 222, 163, 0.6) !important;
    }
    .glass-pill span.animate-ping {
        background-color: #10b981 !important;
    }

    /* Active Search toggle styling */
    .glass-pill button[class*="bg-[#4edea3]/20"], 
    .glass-pill button[class*="border-[#4edea3]/30"] {
        background: rgba(78, 222, 163, 0.15) !important;
        color: #10b981 !important;
    }

    .glass-dropdown {
        background: rgba(255, 255, 255, 0.9) !important;
        backdrop-filter: blur(20px) saturate(180%) !important;
        -webkit-backdrop-filter: blur(20px) saturate(180%) !important;
        border: 1px solid rgba(255, 255, 255, 0.6) !important;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08) !important;
        border-radius: 2rem !important;
    }
    .glass-dropdown a, .glass-dropdown button, .glass-dropdown p, .glass-dropdown div {
        color: #1A2E26 !important;
    }
    .glass-dropdown .bg-white\/5 {
        background-color: rgba(0, 0, 0, 0.03) !important;
    }

    .glass-btn-hover:hover {
        background: rgba(255, 255, 255, 0.5) !important;
    }

    /* Transition tweaks */
    .glass-pill,
    .glass-pill a,
    .glass-pill button,
    .glass-pill span,
    .glass-pill div {
        transition-timing-function: cubic-bezier(0.25, 0.8, 0.25, 1) !important;
    }

    .glass-pill:hover,
    .glass-pill:hover a,
    .glass-pill:hover button,
    .glass-pill:hover span,
    .glass-pill:hover div {
        transition-timing-function: cubic-bezier(0.34, 1.56, 0.64, 1) !important;
    }

    .glass-pill a,
    .glass-pill button {
        position: relative;
    }
    
    .glass-pill a::after,
    .glass-pill button::after {
        content: '';
        position: absolute;
        inset: 0;
        pointer-events: auto;
        z-index: 1;
    }
    
    @media (hover: hover) {
        .glass-pill a:hover::after,
        .glass-pill button:hover::after {
            left: -16px;
            right: -16px;
            top: -8px;
            bottom: -8px;
        }
    }
</style>
