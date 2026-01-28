<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuitansi {{ $jenis }} - {{ $kegiatan->nama_kegiatan }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .no-print {
                display: none !important;
            }

            @page {
                size: A4;
                margin: 0;
            }
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10pt;
            line-height: 1.3;
            background-color: #f3f4f6;
        }

        .sheet {
            width: 210mm;
            min-height: 297mm;
            padding: 1.27cm 15mm;
            margin: 0 auto;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        @media print {
            .sheet {
                width: 100%;
                height: 100%;
                box-shadow: none;
                margin: 0;
                padding: 1.27cm 15mm;
            }

            body {
                background-color: white;
            }
        }

        /* Border box wrapper for the entire content */
        .main-box {
            border: 1.5px solid black;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .border-top-black {
            border-top: 1.5px solid black;
        }

        td {
            vertical-align: top;
            padding-bottom: 4px;
        }
    </style>
</head>

<body class="text-black">
    <!-- Action Bar (Hidden when printing) -->
    <div class="no-print fixed top-0 left-0 right-0 bg-white border-b border-gray-200 shadow-sm z-50">
        <div class="max-w-4xl mx-auto px-4 py-2 flex items-center justify-between">
            <a href="{{ route('kegiatan.pilih-detail', $kegiatan->id) }}"
                class="text-gray-600 hover:text-gray-900 text-sm flex items-center gap-2">
                &larr; Kembali
            </a>
            <div class="flex gap-2">
                <a href="{{ route('kwitansi.download', ['kegiatan_id' => $kegiatan->id, 'jenis' => $jenis]) }}"
                    class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700">
                    Download PDF
                </a>
                <button onclick="window.print()"
                    class="px-4 py-2 bg-gray-800 text-white text-sm font-medium rounded hover:bg-gray-900">
                    Cetak
                </button>
            </div>
        </div>
    </div>

    <!-- Spacer -->
    <div class="h-16 no-print"></div>

    <div class="sheet">

        <!-- Main Content Box (One Big Border) -->
        <div class="main-box">

            <!-- Upper Content Section (Header + Body) -->
            <div class="p-6 pb-2 flex-grow">

                <!-- Header (Inside Box) -->
                <div class="flex justify-between items-start mb-6">
                    <!-- Left: Logo -->
                    <div class="pt-2">
                        <span class="text-green-700 font-bold italic text-lg">
                            <img src="{{ asset('images/logo_kementerian.png') }}" class="h-16"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='inline'">
                            <span style="display:none">qrsimbpk</span>
                        </span>
                    </div>

                    <!-- Right: Meta Data -->
                    <div class="text-sm font-bold w-[60%]">
                        <div class="mb-2 uppercase text-left">KUITANSI {{ $jenis }}</div>
                        <table class="w-full">
                            <tr>
                                <td class="w-32">Tahun Anggaran</td>
                                <td class="w-2">:</td>
                                <td>{{ date('Y') }}</td>
                            </tr>
                            <tr>
                                <td>No. Bukti</td>
                                <td>:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>MAK</td>
                                <td>:</td>
                                <td>{{ $kegiatan->mak->kode ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Akun</td>
                                <td>:</td>
                                <td>524113</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Title -->
                <div class="text-center mb-10">
                    <h1 class="text-xl font-bold uppercase">KUITANSI / BUKTI PEMBAYARAN</h1>
                </div>

                <!-- Table Content -->
                <table class="w-full text-[10.5pt] mb-8">
                    <tr>
                        <td class="w-40 py-1">Sudah terima dari</td>
                        <td class="w-4 py-1">:</td>
                        <td class="py-1">
                            Pejabat Pembuat Komitmen Satuan Kerja<br>
                            {{ $kegiatan->unitKerja->nama_unit ?? 'Sekretariat Badan Pengembangan Sumber Daya Manusia' }}
                        </td>
                    </tr>
                    <tr>
                        <td class="py-1">Uang sebesar</td>
                        <td class="py-1">:</td>
                        <td class="py-1 font-bold">
                            Rp. {{ number_format($totalKonsumsi, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="py-1">Terbilang</td>
                        <td class="py-1">:</td>
                        <td class="py-1 font-bold bg-gray-100 print:bg-transparent capitalize">
                            {{ ucwords(trim($terbilang)) }} rupiah
                        </td>
                    </tr>
                    <tr>
                        <td class="py-1">Untuk Pembayaran</td>
                        <td class="py-1">:</td>
                        <td class="py-1 text-justify leading-snug">
                            {{ $kegiatan->uraian_kegiatan ?? ('Himpunan perjalanan dinas dalam rangka ' . $kegiatan->nama_kegiatan) }}
                        </td>
                    </tr>
                </table>

                <!-- Middle Signatures -->
                <div class="flex justify-between mt-12 mb-8 px-4">
                    <!-- Left: Mengetahui -->
                    <div class="text-center w-1/2">
                        <p class="mb-20 leading-tight">
                            Yang Mengetahui,<br>
                            {{ $kegiatan->ppk->jabatan ?? 'Pejabat Pembuat Komitmen, Bagian Hukum, Kerja Sama, Komunikasi Publik' }}
                        </p>
                        <div class="mt-4">
                            <p class="font-bold underline">{{ $kegiatan->ppk->nama ?? '..........................' }}
                            </p>
                            <p>{{ $kegiatan->ppk->nip ?? '' }}</p>
                        </div>
                    </div>

                    <!-- Right: Menerima -->
                    <div class="text-center w-1/2">
                        <p class="mb-1">Jakarta, {{ now()->translatedFormat('d F Y') }}</p>
                        <p class="mb-20 leading-tight">
                            Yang Menerima,<br>
                            <span class="font-bold">Pembuat Daftar</span>
                        </p>
                        <div class="mt-4">
                            <p class="font-bold underline">{{ auth()->user()->name ?? '..........................' }}
                            </p>
                            <p>{{ auth()->user()->nip ?? 'NIP: ..........................' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Section (Separated by Border Top) -->
            <div class="border-top-black relative p-6 pt-4 text-[10pt]">
                <!-- Top Right Date -->
                <div class="absolute top-1 right-6 text-sm">
                    Lunas dibayar Tgl {{ now()->translatedFormat('d F Y') }}
                </div>

                <div class="flex justify-between mt-8">
                    <!-- Left Footer -->
                    <div class="text-center w-1/2">
                        <p class="mb-20 leading-tight">
                            Setuju dibebankan pada mata anggaran<br>berkenan,<br>
                            an. Kuasa Pengguna Anggaran<br>
                            Pejabat Pembuat Komitmen
                        </p>
                        <div>
                            <p class="font-bold underline">{{ $kegiatan->ppk->nama ?? '.....................' }}</p>
                            <p>{{ $kegiatan->ppk->nip ?? '' }}</p>
                        </div>
                    </div>

                    <!-- Right Footer -->
                    <div class="text-center w-1/2 flex flex-col justify-end">
                        <p class="mb-20 leading-tight">
                            Bendahara Pengeluaran
                        </p>
                        <div>
                            <p class="font-bold underline">{{ $kegiatan->bendahara->nama ?? '.....................' }}
                            </p>
                            <p>{{ $kegiatan->bendahara->nip ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>