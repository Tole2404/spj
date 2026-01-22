@extends('layouts.app')

@section('title', 'Kuitansi ' . $jenis)
@section('page-title', 'Preview Kuitansi ' . $jenis)
@section('page-subtitle', $kegiatan->nama_kegiatan)

@section('content')
    <div class="max-w-4xl mx-auto space-y-4">
        <!-- Action Bar -->
        <div class="flex items-center justify-between bg-white p-4 rounded-lg border border-gray-200">
            <a href="{{ route('kegiatan.pilih-detail', $kegiatan->id) }}" class="text-gray-500 hover:text-gray-700 text-sm">
                ← Kembali ke Detail
            </a>
            <a href="{{ route('kwitansi.download', ['kegiatan_id' => $kegiatan->id, 'jenis' => $jenis]) }}"
                class="px-4 py-2 bg-primary text-white text-sm font-medium rounded hover:bg-primary-dark transition">
                📥 Download PDF
            </a>
        </div>

        <!-- Kuitansi Preview -->
        <div class="bg-white p-8 rounded-lg border border-gray-200 shadow-sm" id="kuitansi-content">
            <!-- Header -->
            <div class="text-center mb-6">
                <h1 class="text-xl font-bold text-gray-900">KUITANSI {{ $jenis }}</h1>
                <p class="text-sm text-gray-600 mt-1">BUKTI PEMBAYARAN</p>
            </div>

            <!-- Info Header -->
            <div class="grid grid-cols-3 gap-4 mb-6 text-sm">
                <div>
                    <span class="text-gray-500">Tahun Anggaran</span>
                    <p class="font-medium">{{ date('Y') }}</p>
                </div>
                <div>
                    <span class="text-gray-500">No. Bukti</span>
                    <p class="font-medium">{{ str_pad($kegiatan->id, 5, '0', STR_PAD_LEFT) }}/{{ $jenis }}/{{ date('Y') }}
                    </p>
                </div>
                <div>
                    <span class="text-gray-500">Tanggal</span>
                    <p class="font-medium">{{ now()->format('d F Y') }}</p>
                </div>
            </div>

            <hr class="my-4">

            <!-- Administrative Info -->
            <div class="grid grid-cols-2 gap-4 mb-4 text-sm bg-gray-50 p-3 rounded">
                @if($kegiatan->ppk)
                <div>
                    <span class="text-gray-500 text-xs">Nama Satker:</span>
                    <p class="font-medium">{{ $kegiatan->ppk->satker }}</p>
                </div>
                @endif
                @if($kegiatan->mak)
                <div>
                    <span class="text-gray-500 text-xs">Nomor MAK:</span>
                    <p class="font-mono text-xs font-medium">{{ $kegiatan->mak->kode }}</p>
                </div>
                @endif
            </div>

            <!-- Content -->
            <table class="w-full text-sm mb-6">
                <tr>
                    <td class="py-2 w-40 align-top text-gray-600">Sudah terima dari</td>
                    <td class="py-2 font-medium">: Pejabat Pembuat Komitmen 
                        @if($kegiatan->ppk)
                            <br>&nbsp;&nbsp;{{ $kegiatan->ppk->nama }}
                            <br>&nbsp;&nbsp;NIP. {{ $kegiatan->ppk->nip }}
                        @else
                            Satuan Kerja {{ $kegiatan->unitKerja->nama_unit ?? '-' }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="py-2 align-top text-gray-600">Uang sebesar</td>
                    <td class="py-2 font-bold text-primary">: Rp {{ number_format($totalKonsumsi, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td class="py-2 align-top text-gray-600">Terbilang</td>
                    <td class="py-2 font-medium italic">: {{ ucwords(trim($terbilang)) }} rupiah</td>
                </tr>
                <tr>
                    <td class="py-2 align-top text-gray-600">Untuk Pembayaran</td>
                    <td class="py-2">: 
                        @if($kegiatan->mak)
                            {{ $kegiatan->mak->nama }}<br>
                            &nbsp;&nbsp;<span class="text-xs text-gray-500">Kegiatan: {{ $kegiatan->nama_kegiatan }}</span>
                        @else
                            Konsumsi dalam rangka {{ $kegiatan->nama_kegiatan }}
                        @endif
                    </td>
                </tr>
            </table>

            <!-- Detail Konsumsi -->
            @if($konsumsis->count() > 0)
                <div class="mb-6">
                    <h3 class="text-xs font-semibold text-gray-500 uppercase mb-2">Rincian Konsumsi</h3>
                    <table class="w-full text-sm border border-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-3 py-2 text-left text-xs font-medium text-gray-600 border-b">Item</th>
                                <th class="px-3 py-2 text-center text-xs font-medium text-gray-600 border-b w-16">Qty</th>
                                <th class="px-3 py-2 text-right text-xs font-medium text-gray-600 border-b w-24">Harga</th>
                                <th class="px-3 py-2 text-right text-xs font-medium text-gray-600 border-b w-28">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($konsumsis as $item)
                                <tr>
                                    <td class="px-3 py-2 border-b">{{ $item->nama_konsumsi }} <span
                                            class="text-xs text-gray-400">({{ $item->kategori }})</span></td>
                                    <td class="px-3 py-2 text-center border-b">{{ $item->jumlah }}</td>
                                    <td class="px-3 py-2 text-right border-b">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                    <td class="px-3 py-2 text-right border-b font-medium">Rp
                                        {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-gray-50">
                            <tr>
                                <td colspan="3" class="px-3 py-2 text-right font-semibold">Total:</td>
                                <td class="px-3 py-2 text-right font-bold text-primary">Rp
                                    {{ number_format($totalKonsumsi, 0, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            @endif

            <!-- Signatures -->
            <div class="grid grid-cols-2 gap-8 mt-8 text-sm text-center">
                <div>
                    <p class="text-gray-600 mb-16">Yang Mengetahui,</p>
                    <p class="font-medium">Kepala {{ $kegiatan->unitKerja->nama_unit ?? 'Unit Kerja' }}</p>
                    <p class="text-gray-500 mt-1">{{ $kegiatan->unor->nama_unor ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-gray-600">Jakarta, {{ now()->format('d F Y') }}</p>
                    <p class="mb-16">Yang Menerima,</p>
                    <p class="font-medium">Pembuat Daftar</p>
                </div>
            </div>
        </div>
    </div>
@endsection