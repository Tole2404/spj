<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuitansi LS - {{ $kegiatan->nama_kegiatan }}</title>
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
            display: flex;
            flex-direction: column;
            /* height: 90%;  Adjusted to fit content appropriately */
            padding-bottom: 20px;
        }

        .border-top-black {
            border-top: 1.5px solid black;
        }

        .money-box {
            border: 1px solid black;
            padding: 2px 8px;
            display: inline-block;
            font-weight: bold;
        }

        td {
            vertical-align: top;
            padding-bottom: 6px;
        }
    </style>
</head>

<body class="text-black">
    <!-- Action Bar (Hidden when printing) -->
    <div class="no-print fixed top-0 left-0 right-0 bg-white border-b border-gray-200 shadow-sm z-50">
        <div class="max-w-4xl mx-auto px-4 py-2 flex items-center justify-between">
            <!-- Correct route parameter name 'kegiatan_id' -->
            <a href="{{ route('kegiatan.pilih-detail', $kegiatan->id) }}"
                class="text-gray-600 hover:text-gray-900 text-sm flex items-center gap-2">
                &larr; Kembali
            </a>
            <div class="flex gap-2">
                <a href="{{ route('kwitansi.download', ['kegiatan_id' => $kegiatan->id, 'jenis' => 'LS']) }}"
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

        <!-- Top Title Outside Box -->
        <div class="text-center font-bold mb-2 uppercase text-[11pt]">KUITANSI LS</div>

        <!-- Main Content Box -->
        <div class="main-box">

            <!-- Content Section -->
            <div class="p-8 pb-4">

                <!-- Header Meta Data (Right Aligned) -->
                <div class="flex justify-end mb-8 text-sm">
                    <table class="w-[55%]">
                        <tr>
                            <td class="w-32">Tahun Anggaran</td>
                            <td class="w-2">:</td>
                            <td>{{ date('Y') }}</td>
                        </tr>
                        <tr>
                            <td>Nomor Bukti</td>
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
                            <td>522131</td> <!-- Hardcoded match image or dynamic -->
                        </tr>
                    </table>
                </div>

                <!-- Main Title -->
                <div class="text-center mb-10">
                    <h1 class="text-xl font-bold uppercase">KUITANSI / BUKTI PEMBAYARAN</h1>
                </div>

                <!-- Table Content -->
                <table class="w-full text-[10.5pt] mb-12">
                    <tr>
                        <td class="w-40 py-1">Sudah diterima dari</td>
                        <td class="w-4 py-1">:</td>
                        <td class="py-1">
                            Pejabat Pembuat Komitmen Satuan Kerja
                            {{ $kegiatan->unitKerja->nama_unit ?? 'Sekretariat Badan Pengembangan Sumber Daya Manusia' }}
                        </td>
                    </tr>
                    <tr>
                        <td class="py-1 align-middle">Uang sebesar</td>
                        <td class="py-1 align-middle">:</td>
                        <td class="py-1">
                            <span class="money-box">Rp. {{ number_format($totalKonsumsi, 0, ',', '.') }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-1">Terbilang</td>
                        <td class="py-1">:</td>
                        <td class="py-1 font-bold capitalize">
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

                <!-- Middle Signatures Area -->
                <div class="flex justify-between mt-4 mb-2">
                    <!-- Left: PPK -->
                    <div class="text-center w-[45%]">
                        <p class="mb-24 leading-tight">
                            a.n Kuasa Pengguna Anggaran/<br>
                            Pejabat Pembuat Komitmen (PPK)
                        </p>
                        <div>
                            <p class="font-bold underline">{{ $kegiatan->ppk->nama ?? '.....................' }}</p>
                            <p>NIP. {{ $kegiatan->ppk->nip ?? '' }}</p>
                        </div>
                    </div>

                    <!-- Right: Menerima -->
                    <div class="text-center w-[45%]">
                        <p class="mb-1">Jakarta, {{ now()->translatedFormat('d F Y') }}</p>
                        <p class="mb-24 leading-tight">
                            Yang Menerima,<br>
                            Pembuat Daftar
                        </p>
                        <div>
                            <p class="font-bold underline">{{ auth()->user()->name ?? '..........................' }}
                            </p>
                            <p>NIP. {{ auth()->user()->nip ?? '..........................' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Section (Separated by Border Top) -->
            <div class="border-top-black p-6 pt-4 text-[10pt]">
                <div class="flex justify-between mt-2">
                    <!-- Left Footer: Mengetahui -->
                    <div class="text-center w-[45%]">
                        <p class="mb-24 leading-tight">
                            Yang Mengetahui,<br>
                            {{ $kegiatan->ppk->jabatan ?? 'Pranata Komputer Ahli Muda' }}
                        </p>
                        <div>
                            <p class="font-bold underline">{{ $kegiatan->ppk->nama ?? '.....................' }}</p>
                            <p>NIP. {{ $kegiatan->ppk->nip ?? '' }}</p>
                        </div>
                    </div>

                    <!-- Right Footer: Empty space as per image -->
                    <div class="text-center w-[45%]">
                        <!-- Intentionally blank/empty -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>