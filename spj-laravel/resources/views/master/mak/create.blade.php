@extends('layouts.app')

@section('title', 'Tambah MAK')
@section('page-title', 'Tambah MAK')
@section('page-subtitle', 'Form tambah data MAK baru')

@section('content')
    <div class="max-w-3xl">
        <div class="bg-white rounded-lg border border-gray-200 p-6">
            <form action="{{ route('master.mak.store') }}" method="POST">
                @csrf

                <!-- Tahun -->
                <div class="mb-4">
                    <label class="form-label">Tahun <span class="text-red-500">*</span></label>
                    <input type="number" name="tahun" value="{{ old('tahun', date('Y')) }}" required
                        class="form-input @error('tahun') border-red-500 @enderror" min="2020" max="2100">
                    @error('tahun')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kode -->
                <div class="mb-4">
                    <label class="form-label">Kode <span class="text-red-500">*</span></label>
                    <input type="text" name="kode" value="{{ old('kode') }}" required
                        class="form-input @error('kode') border-red-500 @enderror"
                        placeholder="Contoh: 12.694431.WA.7770.EBD.Z24.100.A-524111">
                    @error('kode')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nama -->
                <div class="mb-4">
                    <label class="form-label">Nama <span class="text-red-500">*</span></label>
                    <input type="text" name="nama" value="{{ old('nama') }}" required
                        class="form-input @error('nama') border-red-500 @enderror"
                        placeholder="Contoh: Evaluasi Pelaksanaan Kegiatan - Belanja Perjalanan Dinas Biasa">
                    @error('nama')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Satker -->
                <div class="mb-4">
                    <label class="form-label">Satker <span class="text-red-500">*</span></label>
                    <input type="text" name="satker" value="{{ old('satker') }}" required
                        class="form-input @error('satker') border-red-500 @enderror"
                        placeholder="Contoh: SEKRETARIAT BADAN PENGEMBANGAN SUMBER DAYA MANUSIA">
                    @error('satker')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Akun -->
                <div class="mb-4">
                    <label class="form-label">Akun <span class="text-red-500">*</span></label>
                    <input type="text" name="akun" value="{{ old('akun') }}" required
                        class="form-input @error('akun') border-red-500 @enderror"
                        placeholder="Contoh: Belanja Perjalanan Dinas Biasa">
                    @error('akun')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Paket -->
                <div class="mb-4">
                    <label class="form-label">Paket <span class="text-red-500">*</span></label>
                    <input type="text" name="paket" value="{{ old('paket') }}" required
                        class="form-input @error('paket') border-red-500 @enderror"
                        placeholder="Contoh: Evaluasi Pelaksanaan Kegiatan">
                    @error('paket')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
                    <button type="submit"
                        class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition">
                        Simpan MAK
                    </button>
                    <a href="{{ route('master.mak.index') }}"
                        class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection