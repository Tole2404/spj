@extends('layouts.app')

@section('title', 'Form Input Barang')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">
                <i class="bi bi-box-seam"></i> Form Input Barang
            </h4>
        </div>
        <div class="card-body p-4">
            <div class="alert alert-info">
                <strong>Kegiatan:</strong> {{ $kegiatan->nama_kegiatan }}
            </div>

            <form action="{{ route('barang.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id_kegiatan" value="{{ $kegiatan->id }}">

                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-cup-straw"></i> Pagu Snack + Makan *
                    </label>
                    <input type="number" name="pagu_snack_makan"
                        class="form-control @error('pagu_snack_makan') is-invalid @enderror"
                        placeholder="Masukkan pagu snack dan makan" value="{{ old('pagu_snack_makan') }}" min="0" required>
                    @error('pagu_snack_makan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Total anggaran untuk snack dan makan</small>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-pencil"></i> ATK (Alat Tulis Kantor) *
                    </label>
                    <input type="number" name="atk" class="form-control @error('atk') is-invalid @enderror"
                        placeholder="Masukkan budget ATK" value="{{ old('atk') }}" min="0" required>
                    @error('atk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Budget untuk pembelian alat tulis kantor</small>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-bag"></i> Seminar Kit *
                    </label>
                    <input type="number" name="seminar_kit" class="form-control @error('seminar_kit') is-invalid @enderror"
                        placeholder="Masukkan budget seminar kit" value="{{ old('seminar_kit') }}" min="0" required>
                    @error('seminar_kit')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Budget untuk seminar kit peserta</small>
                </div>

                <div class="alert alert-info">
                    <i class="bi bi-info-circle-fill"></i>
                    <strong>Informasi:</strong> Setelah submit, sistem akan langsung membuat kwitansi UP untuk barang-barang
                    tersebut.
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle"></i> Simpan & Generate Kwitansi
                    </button>
                    <a href="{{ route('kegiatan.pilih-detail', $kegiatan->id) }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection