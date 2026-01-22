<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Hadir Narasumber - {{ $kegiatan->nama_kegiatan }}</title>
    <style>
        @media print {
            @page {
                margin: 2cm;
            }

            .no-print {
                display: none;
            }
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            margin: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h2 {
            margin: 5px 0;
            font-size: 16px;
        }

        .header p {
            margin: 3px 0;
            font-size: 12px;
        }

        .info-table {
            width: 100%;
            margin-bottom: 20px;
            font-size: 11px;
        }

        .info-table td {
            padding: 3px 0;
        }

        .info-table td:first-child {
            width: 150px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
            font-weight: bold;
            text-align: center;
        }

        .center {
            text-align: center;
        }

        .signature-section {
            margin-top: 40px;
        }

        .signature-box {
            width: 48%;
            display: inline-block;
            text-align: center;
            vertical-align: top;
        }

        .signature-box p {
            margin: 5px 0;
        }

        .signature-space {
            height: 60px;
        }

        .print-btn {
            background-color: #4F46E5;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .print-btn:hover {
            background-color: #4338CA;
        }
    </style>
</head>

<body>
    <div class="no-print">
        <button onclick="window.print()" class="print-btn">🖨️ Print Daftar Hadir</button>
        <button onclick="window.close()" class="print-btn" style="background-color: #6B7280;">← Kembali</button>
    </div>

    <div class="header">
        <h2>DAFTAR HADIR NARASUMBER/MODERATOR/PANITIA</h2>
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
            <td>Tempat</td>
            <td>: {{ $kegiatan->tempat ?? '-' }}</td>
        </tr>
        <tr>
            <td>Unit Kerja</td>
            <td>: {{ $kegiatan->unitKerja->nama_unit ?? '-' }}</td>
        </tr>
    </table>

    <table>
        <thead>
            <tr>
                <th style="width: 40px;">No</th>
                <th>Nama</th>
                <th style="width: 150px;">Jenis</th>
                <th style="width: 200px;">Golongan Jabatan</th>
                <th style="width: 150px;">Tanda Tangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($narasumbers as $index => $narasumber)
                <tr>
                    <td class="center">{{ $index + 1 }}</td>
                    <td>{{ $narasumber->nama_narasumber }}</td>
                    <td class="center">{{ ucfirst(str_replace('_', ' ', $narasumber->jenis)) }}</td>
                    <td>{{ $narasumber->golongan_jabatan }}</td>
                    <td></td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="center" style="padding: 20px; color: #999;">
                        Belum ada data narasumber
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="signature-section">
        <div class="signature-box" style="margin-right: 4%;">
            <p>Mengetahui,</p>
            <p><strong>Pejabat Pembuat Komitmen</strong></p>
            <div class="signature-space"></div>
            <p>_________________________</p>
            <p style="font-size: 11px;">NIP.</p>
        </div>
        <div class="signature-box">
            <p>&nbsp;</p>
            <p><strong>Bendahara Pengeluaran</strong></p>
            <div class="signature-space"></div>
            <p>_________________________</p>
            <p style="font-size: 11px;">NIP.</p>
        </div>
    </div>
</body>

</html>