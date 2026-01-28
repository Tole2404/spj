<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Hadir Narasumber - {{ $kegiatan->nama_kegiatan }}</title>
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
                <h1 class="text-lg font-bold text-gray-900 uppercase">DAFTAR HADIR NARASUMBER/MODERATOR/PANITIA</h1>
                <h2 class="text-base font-bold text-gray-800 mt-1">{{ strtoupper($kegiatan->nama_kegiatan) }}</h2>
                <p class="text-sm text-gray-600 mt-1">{{ $kegiatan->unor->nama_unor ?? '-' }}</p>
            </div>

            <!-- Info Table -->
            <table class="w-full mb-5 text-sm">
                <tr>
                    <td class="py-1 w-40 font-medium text-gray-700">Kegiatan</td>
                    <td class="py-1">: {{ $kegiatan->nama_kegiatan }}</td>
                </tr>
                <tr>
                    <td class="py-1 font-medium text-gray-700">Tanggal Pelaksanaan</td>
                    <td class="py-1">: {{ $kegiatan->tanggal_mulai ? $kegiatan->tanggal_mulai->format('d F Y') : '-' }}
                        @if($kegiatan->tanggal_selesai && $kegiatan->tanggal_selesai != $kegiatan->tanggal_mulai)
                            s.d. {{ $kegiatan->tanggal_selesai->format('d F Y') }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="py-1 font-medium text-gray-700">Tempat</td>
                    <td class="py-1">: {{ $kegiatan->detail_lokasi ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-1 font-medium text-gray-700">Unit Kerja</td>
                    <td class="py-1">: {{ $kegiatan->unitKerja->nama_unit ?? '-' }}</td>
                </tr>
            </table>

            <!-- Narasumber Table -->
            <table class="w-full border-collapse border border-gray-400 text-sm">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-400 px-3 py-2 w-10 text-center">No</th>
                        <th class="border border-gray-400 px-3 py-2 text-left">Nama</th>
                        <th class="border border-gray-400 px-3 py-2 text-center w-32">Jenis</th>
                        <th class="border border-gray-400 px-3 py-2 text-left w-44">Golongan/Jabatan</th>
                        <th class="border border-gray-400 px-3 py-2 text-center w-32">Tanda Tangan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($narasumbers as $index => $narasumber)
                        <tr>
                            <td class="border border-gray-400 px-2 py-3 text-center">{{ $index + 1 }}</td>
                            <td class="border border-gray-400 px-2 py-3">{{ $narasumber->nama_narasumber }}</td>
                            <td class="border border-gray-400 px-2 py-3 text-center">
                                {{ ucfirst(str_replace('_', ' ', $narasumber->jenis)) }}</td>
                            <td class="border border-gray-400 px-2 py-3">{{ $narasumber->golongan_jabatan }}</td>
                            <td class="border border-gray-400 px-2 py-3"></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="border border-gray-400 px-4 py-6 text-center text-gray-500">
                                Belum ada data narasumber
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Signature Section -->
            <div class="mt-10 grid grid-cols-2 gap-8 text-sm text-center">
                <div>
                    <p class="text-gray-600">Mengetahui,</p>
                    <p class="font-semibold mt-1">Pejabat Pembuat Komitmen</p>
                    <div class="h-16"></div>
                    <p class="font-medium">_________________________</p>
                    <p class="text-xs text-gray-500 mt-1">NIP.</p>
                </div>
                <div>
                    <p class="text-gray-600">&nbsp;</p>
                    <p class="font-semibold mt-1">Bendahara Pengeluaran</p>
                    <div class="h-16"></div>
                    <p class="font-medium">_________________________</p>
                    <p class="text-xs text-gray-500 mt-1">NIP.</p>
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