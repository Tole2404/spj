@extends('layouts.app')

@section('title', 'Form Belanja Jasa Profesi')

@section('content')
    <div class="card">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">
                <i class="bi bi-person-badge"></i> Form Belanja Jasa Profesi - Honorarium
            </h4>
        </div>
        <div class="card-body p-4">
            <div class="alert alert-info">
                <strong>Kegiatan:</strong> {{ $kegiatan->nama_kegiatan }}
            </div>

            <form action="{{ route('honorarium.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id_kegiatan" value="{{ $kegiatan->id }}">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-person"></i> Nama Narasumber/Penerima *
                        </label>
                        <input type="text" name="nama_narasumber"
                            class="form-control @error('nama_narasumber') is-invalid @enderror"
                            placeholder="Contoh: Dr. John Doe" value="{{ old('nama_narasumber') }}" required>
                        @error('nama_narasumber')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-card-list"></i> Jenis Honorarium *
                        </label>
                        <select name="jenis_honorarium" class="form-select @error('jenis_honorarium') is-invalid @enderror"
                            required>
                            <option value="">Pilih Jenis</option>
                            <option value="Narasumber">Narasumber</option>
                            <option value="Moderator">Moderator</option>
                            <option value="Panitia">Panitia</option>
                            <option value="Pembawa Acara">Pembawa Acara</option>
                        </select>
                        @error('jenis_honorarium')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-clock"></i> Jumlah Jam/Kegiatan *
                        </label>
                        <input type="number" name="jumlah_jam" id="jumlah_jam"
                            class="form-control @error('jumlah_jam') is-invalid @enderror" placeholder="0"
                            value="{{ old('jumlah_jam') }}" min="1" required>
                        @error('jumlah_jam')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-cash-coin"></i> Tarif per Jam *
                        </label>
                        <input type="number" name="tarif_per_jam" id="tarif_per_jam"
                            class="form-control @error('tarif_per_jam') is-invalid @enderror" placeholder="0"
                            value="{{ old('tarif_per_jam') }}" min="0" required>
                        @error('tarif_per_jam')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-calculator"></i> Total Honorarium (Otomatis)
                        </label>
                        <input type="text" id="total" class="form-control bg-light" value="Rp 0" readonly>
                        <small class="text-muted">Jam × Tarif</small>
                    </div>
                </div>

                <div class="alert alert-warning">
                    <i class="bi bi-info-circle-fill"></i>
                    <strong>Informasi:</strong> Belanja Jasa Profesi akan menggunakan <strong>Kwitansi LS
                        (Langsung)</strong> sesuai regulasi.
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-check-circle"></i> Simpan & Generate Kwitansi LS
                    </button>
                    <a href="{{ route('kegiatan.pilih-detail', $kegiatan->id) }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            // Auto-calculate total
            document.addEventListener('DOMContentLoaded', function () {
                const jumlahInput = document.getElementById('jumlah_jam');
                const tarifInput = document.getElementById('tarif_per_jam');
                const totalInput = document.getElementById('total');

                function calculateTotal() {
                    const jumlah = parseFloat(jumlahInput.value) || 0;
                    const tarif = parseFloat(tarifInput.value) || 0;
                    const total = jumlah * tarif;

                    totalInput.value = 'Rp ' + total.toLocaleString('id-ID');
                }

                jumlahInput.addEventListener('input', calculateTotal);
                tarifInput.addEventListener('input', calculateTotal);
            });
        </script>
    @endpush
@endsection