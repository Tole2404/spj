@extends('layouts.app')

@section('title', 'Daftar Hadir')
@section('page-title', 'Daftar Hadir')
@section('page-subtitle', $kegiatan->nama_kegiatan)

@section('content')
    <div class="max-w-4xl mx-auto space-y-4">
        <!-- Action Bar -->
        <div class="flex items-center justify-between bg-white p-4 rounded-lg border border-gray-200 no-print">
            <a href="{{ route('kegiatan.pilih-detail', $kegiatan->id) }}" class="text-gray-500 hover:text-gray-700 text-sm">
                ← Kembali ke Detail
            </a>
            <button onclick="window.print()"
                class="px-4 py-2 bg-primary text-white text-sm font-medium rounded hover:bg-primary-dark transition">
                🖨️ Cetak
            </button>
        </div>

        <!-- Daftar Hadir Form -->
        <div class="bg-white p-8 rounded-lg border border-gray-200 shadow-sm print-content">
            <!-- Header -->
            <div class="text-center mb-6">
                <h1 class="text-lg font-bold text-gray-900 uppercase">DAFTAR HADIR</h1>
                <p class="text-sm text-gray-600 mt-1">{{ $kegiatan->nama_kegiatan }}</p>
                <p class="text-xs text-gray-500 mt-1">
                    {{ $kegiatan->tanggal_mulai ? $kegiatan->tanggal_mulai->format('d F Y') : '-' }}
                    @if($kegiatan->tanggal_selesai && $kegiatan->tanggal_selesai != $kegiatan->tanggal_mulai)
                        - {{ $kegiatan->tanggal_selesai->format('d F Y') }}
                    @endif
                </p>
            </div>

            <!-- Table -->
            <table class="w-full border-collapse border border-gray-400 text-sm">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-400 px-3 py-2 w-10 text-center">No</th>
                        <th class="border border-gray-400 px-3 py-2 text-left">Nama</th>
                        <th class="border border-gray-400 px-3 py-2 text-left w-40">Instansi</th>
                        <th class="border border-gray-400 px-3 py-2 text-center" colspan="2">Tanda Tangan</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = $kegiatan->jumlah_peserta ?? 20; $half = ceil($total / 2); @endphp
                    @for($i = 1; $i <= $half; $i++)
                        @php $odd = $i * 2 - 1; $even = $i * 2; @endphp
                        <tr>
                            <td class="border border-gray-400 px-2 py-3 text-center">{{ $i }}</td>
                            <td class="border border-gray-400 px-2 py-3"></td>
                            <td class="border border-gray-400 px-2 py-3"></td>
                            <td class="border border-gray-400 px-2 py-3 w-24 text-gray-400 text-xs">{{ $odd }}. ............</td>
                            <td class="border border-gray-400 px-2 py-3 w-24 text-gray-400 text-xs text-right">{{ $even <= $total ? $even . '. ............' : '' }}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>

            <!-- Footer -->
            <div class="mt-8 flex justify-end">
                <div class="text-center">
                    <p class="text-sm">Jakarta, {{ now()->format('d F Y') }}</p>
                    <p class="text-sm mt-1">Mengetahui,</p>
                    <p class="text-sm font-medium mt-16">_______________________</p>
                    <p class="text-xs text-gray-500">Nama / NIP</p>
                </div>
            </div>
        </div>
    </div>

    <style>
        @media print {
            @page {
                size: A4;
                margin: 15mm;
            }

            .no-print {
                display: none !important;
            }

            .print-content {
                border: none !important;
                box-shadow: none !important;
                padding: 0 !important;
                width: 100%;
            }

            body {
                -webkit-print-color-adjust: exact;
                font-size: 11pt;
            }

            table {
                page-break-inside: auto;
            }

            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }
        }
    </style>
@endsection