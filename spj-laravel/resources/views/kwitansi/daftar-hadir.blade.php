<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Hadir - {{ $kegiatan->nama_kegiatan }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            body {
                print-color-adjust: exact;
                -webkit-print-color-adjust: exact;
            }

            .no-print {
                display: none !important;
            }

            .print-content {
                border: none !important;
                box-shadow: none !important;
                padding: 0 !important;
            }

            table {
                page-break-inside: auto;
            }

            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }
        }

        @page {
            size: A4;
            margin: 15mm;
        }
    </style>
</head>

<body class="bg-gray-100">
    <!-- Action Bar (Hidden when printing) -->
    <div class="no-print fixed top-0 left-0 right-0 bg-white border-b border-gray-200 shadow-sm z-50">
        <div class="max-w-4xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="{{ route('kegiatan.pilih-detail', $kegiatan->id) }}"
                class="text-gray-600 hover:text-gray-900 text-sm flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
            <button onclick="window.print()"
                class="px-4 py-2 bg-teal-600 text-white text-sm font-medium rounded-lg hover:bg-teal-700 transition flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                </svg>
                Cetak / Print
            </button>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-4xl mx-auto pt-20 pb-8 px-4">
        <div
            class="bg-white p-8 rounded-lg shadow-sm border border-gray-200 print-content print:shadow-none print:border-0 print:p-0">

            <!-- Header -->
            <div class="text-center mb-6">
                <h1 class="text-lg font-bold text-gray-900 uppercase">DAFTAR HADIR</h1>
                <p class="text-sm text-gray-700 mt-1 font-medium">{{ $kegiatan->nama_kegiatan }}</p>
                <p class="text-xs text-gray-500 mt-1">
                    {{ $kegiatan->tanggal_mulai ? $kegiatan->tanggal_mulai->format('d F Y') : '-' }}
                    @if($kegiatan->tanggal_selesai && $kegiatan->tanggal_selesai != $kegiatan->tanggal_mulai)
                        - {{ $kegiatan->tanggal_selesai->format('d F Y') }}
                    @endif
                </p>
            </div>

            @php $total = $kegiatan->jumlah_peserta ?? 20; @endphp

            <!-- Table -->
            <table class="w-full border-collapse border border-gray-400 text-sm">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-400 px-2 py-2 w-10 text-center">No</th>
                        <th class="border border-gray-400 px-2 py-2 text-center" style="width: 35%">Nama Lengkap</th>
                        <th class="border border-gray-400 px-2 py-2 text-center" style="width: 30%">Instansi</th>
                        <th class="border border-gray-400 px-2 py-2 text-center" style="width: 35%">Tanda Tangan</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i = 1; $i <= $total; $i++)
                        <tr>
                            <td class="border border-gray-400 px-2 py-3 text-center">{{ $i }}</td>
                            <td class="border border-gray-400 px-2 py-3"></td>
                            <td class="border border-gray-400 px-2 py-3"></td>
                            <td class="border border-gray-400 px-2 py-3">
                                <div class="flex justify-between items-start h-6">
                                    {{-- Ganjil di kiri --}}
                                    <div class="w-1/2">
                                        @if($i % 2 == 1)
                                            <span class="text-gray-600 text-xs">{{ $i }}.</span>
                                        @endif
                                    </div>
                                    {{-- Genap di kanan --}}
                                    <div class="w-1/2">
                                        @if($i % 2 == 0)
                                            <span class="text-gray-600 text-xs">{{ $i }}.</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>

            <!-- Footer/Signature -->
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

    <script>
        window.onload = function () {
            window.print();
        }
    </script>
</body>

</html>