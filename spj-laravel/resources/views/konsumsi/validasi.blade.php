@extends('layouts.app')

@section('title', 'Validasi SBM')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">
                <i class="bi bi-shield-check"></i> Validasi Kesesuaian SBM
            </h4>
        </div>
        <div class="card-body p-4">
            <!-- Status Validasi -->
            @if($sesuai_sbm)
                <div class="alert alert-success">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-check-circle-fill display-6 me-3"></i>
                        <div>
                            <h5 class="mb-1">✅ Sesuai SBM</h5>
                            <p class="mb-0">{{ $pesan }}</p>
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-danger">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-x-circle-fill display-6 me-3"></i>
                        <div>
                            <h5 class="mb-1">❌ Tidak Sesuai SBM</h5>
                            <p class="mb-0">{{ $pesan }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Detail Konsumsi -->
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h6 class="mb-0">Detail Konsumsi</h6>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th width="200">Nama Konsumsi</th>
                            <td>{{ $konsumsi->nama_konsumsi }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Porsi</th>
                            <td>{{ number_format($konsumsi->jumlah, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Harga per Porsi</th>
                            <td>Rp {{ number_format($konsumsi->harga, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Subtotal</th>
                            <td class="fw-bold text-primary">Rp {{ number_format($konsumsi->subtotal, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Pembelian</th>
                            <td>{{ $konsumsi->tanggal_pembelian->format('d/m/Y') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Data SBM -->
            @if($sbm)
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h6 class="mb-0">Referensi SBM (Standar Biaya Masukan)</h6>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th width="200">Harga Max Makan</th>
                                <td>Rp {{ number_format($sbm->harga_max_makan, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Harga Max Snack</th>
                                <td>Rp {{ number_format($sbm->harga_max_snack, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Tahun Anggaran</th>
                                <td>{{ $sbm->tahun_anggaran }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            @endif

            <!-- Action Buttons -->
            <div class="d-flex gap-2">
                @if($sesuai_sbm)
                    <a href="{{ route('kwitansi.generate', ['kegiatan_id' => $konsumsi->id_kegiatan, 'jenis' => 'UP']) }}"
                        class="btn btn-success">
                        <i class="bi bi-file-earmark-text"></i> Lanjut ke Generate Kwitansi
                    </a>
                @else
                    <a href="{{ route('konsumsi.koreksi', $konsumsi->id) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Koreksi Nominal atau Porsi
                    </a>
                @endif

                <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-house"></i> Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>
@endsection