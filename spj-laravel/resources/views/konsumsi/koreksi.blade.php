@extends('layouts.app')

@section('title', 'Koreksi Konsumsi')

@section('content')
    <div class="card">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">
                <i class="bi bi-pencil-square"></i> Koreksi Nominal atau Porsi
            </h4>
        </div>
        <div class="card-body p-4">
            <div class="alert alert-warning">
                <i class="bi bi-exclamation-triangle-fill"></i>
                <strong>Perhatian!</strong> Data konsumsi tidak sesuai dengan SBM. Silakan koreksi jumlah porsi atau harga
                per porsi.
            </div>

            @if($sbm)
                <div class="card mb-4 bg-light">
                    <div class="card-body">
                        <h6 class="text-muted mb-3">Referensi SBM:</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="mb-1"><strong>Harga Max Makan:</strong> Rp
                                    {{ number_format($sbm->harga_max_makan, 0, ',', '.') }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-1"><strong>Harga Max Snack:</strong> Rp
                                    {{ number_format($sbm->harga_max_snack, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('konsumsi.update-koreksi', $konsumsi->id) }}" method="POST" id="koreksiForm">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-box"></i> Jumlah Porsi *
                        </label>
                        <input type="number" name="jumlah" id="jumlah"
                            class="form-control @error('jumlah') is-invalid @enderror"
                            value="{{ old('jumlah', $konsumsi->jumlah) }}" min="1" required>
                        @error('jumlah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-cash"></i> Harga per Porsi *
                        </label>
                        <input type="number" name="harga" id="harga"
                            class="form-control @error('harga') is-invalid @enderror"
                            value="{{ old('harga', $konsumsi->harga) }}" min="0" required>
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-calculator"></i> Subtotal (Otomatis)
                        </label>
                        <input type="text" id="subtotal" class="form-control bg-light"
                            value="Rp {{ number_format($konsumsi->subtotal, 0, ',', '.') }}" readonly>
                        <small class="text-muted">Porsi × Harga</small>
                    </div>
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-check-circle"></i> Simpan Koreksi & Validasi Ulang
                    </button>
                    <a href="{{ route('konsumsi.validasi', $konsumsi->id) }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            // Auto-calculate subtotal
            document.addEventListener('DOMContentLoaded', function () {
                const jumlahInput = document.getElementById('jumlah');
                const hargaInput = document.getElementById('harga');
                const subtotalInput = document.getElementById('subtotal');

                function calculateSubtotal() {
                    const jumlah = parseFloat(jumlahInput.value) || 0;
                    const harga = parseFloat(hargaInput.value) || 0;
                    const subtotal = jumlah * harga;

                    subtotalInput.value = 'Rp ' + subtotal.toLocaleString('id-ID');
                }

                jumlahInput.addEventListener('input', calculateSubtotal);
                hargaInput.addEventListener('input', calculateSubtotal);
            });
        </script>
    @endpush
@endsection