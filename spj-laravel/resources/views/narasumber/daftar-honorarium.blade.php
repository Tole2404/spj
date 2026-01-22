<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Honorarium - {{ $kegiatan->nama_kegiatan }}</title>
    <style>
        @media print {
            @page {
                margin: 2cm;
                size: landscape;
            }

            .no-print {
                display: none;
            }
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            line-height: 1.3;
            margin: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
        }

        .header h2 {
            margin: 5px 0;
            font-size: 15px;
        }

        .header p {
            margin: 3px 0;
            font-size: 11px;
        }

        .info-table {
            width: 100%;
            margin-bottom: 15px;
            font-size: 10px;
        }

        .info-table td {
            padding: 2px 0;
        }

        .info-table td:first-child {
            width: 140px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px 4px;
            text-align: left;
            font-size: 10px;
        }

        th {
            background-color: #e8e8e8;
            font-weight: bold;
            text-align: center;
        }

        .center {
            text-align: center;
        }

        .right {
            text-align: right;
        }

        .signature-section {
            margin-top: 30px;
        }

        .signature-box {
            width: 48%;
            display: inline-block;
            text-align: center;
            vertical-align: top;
        }

        .signature-box p {
            margin: 4px 0;
        }

        .signature-space {
            height: 50px;
        }

        .print-btn {
            background-color: #7C3AED;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .print-btn:hover {
            background-color: #6D28D9;
        }

        .total-row {
            background-color: #f5f5f5;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="no-print">
        <button onclick="window.print()" class="print-btn">🖨️ Print Daftar Honorarium</button>
        <button onclick="window.close()" class="print-btn" style="background-color: #6B7280;">← Kembali</button>
    </div>

    <div class="header">
        <h2>DAFTAR PEMBAYARAN HONORARIUM</h2>
        <h2>{{ strtoupper($kegiatan->nama_kegiatan) }}</h2>
        <p>{{ $kegiatan->unor->nama_unor ?? '-' }}</p>
    </div>

    <table class="info-table">
        <tr>
            <td>Kegiatan</td>
            <td>: {{ $kegiatan->nama_kegiatan }}</td>
        </tr>
        <tr>
            <td>Tanggal Pelaksanaan</td>
            <td>: {{ $kegiatan->tanggal_mulai ? $kegiatan->tanggal_mulai->format('d F Y') : '-' }}
                @if($kegiatan->tanggal_selesai && $kegiatan->tanggal_selesai != $kegiatan->tanggal_mulai)
                    s.d. {{ $kegiatan->tanggal_selesai->format('d F Y') }}
                @endif
            </td>
        </tr>
        <tr>
            <td>Unit Kerja</td>
            <td>: {{ $kegiatan->unitKerja->nama_unit ?? '-' }}</td>
        </tr>
    </table>

    <table>
        <thead>
            <tr>
                <th style="width: 30px;">No</th>
                <th style="width: 180px;">Nama</th>
                <th style="width: 90px;">Jenis</th>
                <th style="width: 140px;">Golongan Jabatan</th>
                <th style="width: 110px;">NPWP</th>
                <th style="width: 50px;">PPh 21</th>
                <th style="width: 90px;">Honorarium<br>Bruto</th>
                <th style="width: 80px;">Pajak<br>Dipotong</th>
                <th style="width: 95px;">Honorarium<br>Netto</th>
            </tr>
        </thead>
        <tbody>
            @forelse($narasumbers as $index => $narasumber)
                <tr>
                    <td class="center">{{ $index + 1 }}</td>
                    <td>{{ $narasumber->nama_narasumber }}</td>
                    <td class="center">{{ ucfirst(str_replace('_', ' ', $narasumber->jenis)) }}</td>
                    <td>{{ $narasumber->golongan_jabatan }}</td>
                    <td class="center">{{ $narasumber->npwp ?? '-' }}</td>
                    <td class="center">{{ $narasumber->tarif_pph21 }}%</td>
                    <td class="right">{{ number_format($narasumber->honorarium_bruto, 0, ',', '.') }}</td>
                    <td class="right">{{ number_format($narasumber->pph21, 0, ',', '.') }}</td>
                    <td class="right"><strong>{{ number_format($narasumber->honorarium_netto, 0, ',', '.') }}</strong></td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="center" style="padding: 20px; color: #999;">
                        Belum ada data honorarium
                    </td>
                </tr>
            @endforelse
        </tbody>
        @if($narasumbers->count() > 0)
            <tfoot>
                <tr class="total-row">
                    <td colspan="8" class="right"><strong>TOTAL HONORARIUM:</strong></td>
                    <td class="right"><strong>Rp {{ number_format($totalHonorarium, 0, ',', '.') }}</strong></td>
                </tr>
            </tfoot>
        @endif
    </table>

    <div class="signature-section">
        <div class="signature-box" style="margin-right: 4%;">
            <p>Mengetahui,</p>
            <p><strong>Pejabat Pembuat Komitmen</strong></p>
            <div class="signature-space"></div>
            <p>_________________________</p>
            <p style="font-size: 10px;">NIP.</p>
        </div>
        <div class="signature-box">
            <p>&nbsp;</p>
            <p><strong>Bendahara Pengeluaran</strong></p>
            <div class="signature-space"></div>
            <p>_________________________</p>
            <p style="font-size: 10px;">NIP.</p>
        </div>
    </div>

    <div style="margin-top: 20px; font-size: 9px; color: #666;">
        <p><strong>Keterangan:</strong></p>
        <ul style="margin: 5px 0; padding-left: 20px;">
            <li>PPh 21: Pajak Penghasilan Pasal 21 yang dipotong dari honorarium bruto</li>
            <li>Honorarium Netto: Jumlah yang diterima setelah dipotong pajak</li>
        </ul>
    </div>
</body>

</html>