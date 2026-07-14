@extends('layouts.admin')
@section('title', 'Analitik | XDrew Fashion')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="p-4 md:p-8">
    <header class="flex flex-col justify-start gap-2 mb-8 border-b border-black/5 pb-6">
        <h2 class="text-3xl font-extrabold text-[#0A1612] tracking-tight uppercase">Analitik <span class="text-[#10b981]">Bisnis.</span></h2>
        <p class="text-slate-500 text-sm">Visualisasi data dan performa penjualan bulanan XDrew Fashion.</p>
    </header>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 glass-card rounded-3xl p-6 border-t-2 border-t-[#10b981] shadow-lg">
            <h3 class="font-bold text-[#0A1612] uppercase tracking-widest text-xs mb-6">Grafik Penjualan Tahun Ini</h3>
            <div class="w-full h-80 relative">
                <canvas id="salesChart"></canvas>
            </div>
        </div>

        <div class="glass-card rounded-3xl p-6 space-y-6 shadow-lg">
            <h3 class="font-bold text-[#0A1612] uppercase tracking-widest text-xs mb-4">Statistik Singkat</h3>
            <div class="p-4 bg-white/50 rounded-xl border border-black/5 hover:border-[#10b981]/30 transition-colors">
                <p class="text-[10px] text-slate-400 uppercase tracking-widest mb-1">Produk Terlaris</p>
                <p class="font-bold text-[#10b981] text-lg">{{ $nama_terlaris }}</p>
            </div>
            <div class="p-4 bg-white/50 rounded-xl border border-black/5 hover:border-[#10b981]/30 transition-colors">
                <p class="text-[10px] text-slate-400 uppercase tracking-widest mb-1">Total Pesanan</p>
                <p class="font-bold text-[#0A1612] text-lg">{{ number_format($total_pesanan) }} Pesanan</p>
            </div>
            <div class="p-4 bg-white/50 rounded-xl border border-black/5 hover:border-[#10b981]/30 transition-colors">
                <p class="text-[10px] text-slate-400 uppercase tracking-widest mb-1">Total Pelanggan</p>
                <p class="font-bold text-[#0A1612] text-lg">{{ number_format($total_pelanggan) }} Orang</p>
            </div>
            <div class="p-4 bg-white/50 rounded-xl border border-black/5 hover:border-[#10b981]/30 transition-colors">
                <p class="text-[10px] text-slate-400 uppercase tracking-widest mb-1">Total Pendapatan</p>
                <p class="font-bold text-[#10b981] text-lg">Rp {{ number_format($total_penjualan, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>
</div>

<script>
    // Konfigurasi Chart.js untuk Light Mode XDrew (Senada dengan data pelanggan/dashboard)
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('salesChart').getContext('2d');
        
        // Buat gradasi warna hijau emerald di bawah garis
        let gradient = ctx.createLinearGradient(0, 0, 0, 300);
        gradient.addColorStop(0, 'rgba(16, 185, 129, 0.15)'); // Emerald transparent
        gradient.addColorStop(1, 'rgba(16, 185, 129, 0.0)');
 
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    label: 'Total Pendapatan (Juta Rp)',
                    data: {!! json_encode($chart_data) !!},
                    borderColor: '#10b981', // Warna garis emerald
                    backgroundColor: gradient,
                    borderWidth: 2.5,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#10b981',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    fill: true,
                    tension: 0.4 // Membuat garis melengkung halus (smooth curve)
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: { color: '#64748b', font: { family: "'Poppins', sans-serif" } }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(26, 46, 38, 0.95)',
                        titleColor: '#10b981',
                        bodyColor: '#fff',
                        borderColor: 'rgba(255,255,255,0.1)',
                        borderWidth: 1,
                        padding: 10,
                        displayColors: false,
                    }
                },
                scales: {
                    x: {
                        border: { display: false },
                        grid: { color: 'rgba(0, 0, 0, 0.04)' },
                        ticks: { color: '#64748b', font: { family: "'Poppins', sans-serif" } }
                    },
                    y: {
                        border: { display: false },
                        grid: { color: 'rgba(0, 0, 0, 0.04)' },
                        ticks: { 
                            color: '#64748b', 
                            font: { family: "'Poppins', sans-serif" },
                            callback: function(value) { return 'Rp ' + value + ' Jt'; }
                        }
                    }
                }
            }
        });
    });
</script>
@endsection