@extends('layouts.admin')
@section('title', 'Pelanggan | XDrew Fashion')

@section('content')
<div class="p-4 md:p-8">
    <header class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8 border-b border-black/5 pb-6">
        <div>
            <h2 class="text-3xl font-extrabold text-[#1A2E26] tracking-tight uppercase">Data <span class="text-[#10b981]">Pelanggan.</span></h2>
            <p class="text-slate-500 text-sm mt-1">Basis data pelanggan terdaftar di XDrew Fashion.</p>
        </div>
    </header>

    <div class="glass-card rounded-3xl overflow-hidden border border-black/5 shadow-2xl">
        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-sm text-left whitespace-nowrap">
                <thead class="bg-white/40 text-slate-500 text-[10px] uppercase tracking-widest border-b border-black/5">
                    <tr>
                        <th class="px-6 py-5 font-bold">Nama Pelanggan</th>
                        <th class="px-6 py-5 font-bold">Email</th>
                        <th class="px-6 py-5 font-bold">Nomor Telepon</th>
                        <th class="px-6 py-5 font-bold">Bergabung Sejak</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-black/5">
                    @forelse($data_pelanggan ?? [] as $pelanggan)
                    <tr class="hover:bg-black/5 transition-colors group">
                        <td class="px-6 py-4 flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-white/60 border border-[#10b981]/30 flex items-center justify-center text-[#10b981] font-bold">
                                {{ substr($pelanggan->NAMA_LENGKAP ?? $pelanggan->nama_lengkap ?? 'U', 0, 1) }}
                            </div>
                            <span class="font-bold text-[#1A2E26]">{{ $pelanggan->NAMA_LENGKAP ?? $pelanggan->nama_lengkap }}</span>
                        </td>
                        <td class="px-6 py-4 text-slate-600">{{ $pelanggan->EMAIL ?? $pelanggan->email }}</td>
                        <td class="px-6 py-4 text-slate-600">{{ $pelanggan->NOMOR_TELEPON ?? $pelanggan->nomor_telepon ?? '-' }}</td>
                        <td class="px-6 py-4 text-slate-500 text-xs">{{ \Carbon\Carbon::parse($pelanggan->CREATED_AT ?? $pelanggan->created_at)->format('d M Y') }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="p-12 text-center text-slate-400">Belum ada pelanggan terdaftar.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-6 border-t border-black/5">
            {{ $data_pelanggan->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</div>
@endsection