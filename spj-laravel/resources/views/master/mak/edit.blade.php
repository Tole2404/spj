@extends('layouts.app')

@section('title', 'Edit MAK')
@section('page-title', 'Edit MAK')
@section('page-subtitle', 'Form edit data MAK')

@section('content')
    <div class="max-w-3xl">
        <div class="bg-white rounded-lg border border-gray-200 p-6">
            <form action="{{ route('master.mak.update', $mak->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Tahun -->
                <div class="mb-4">
                    <label class="form-label">Tahun <span class="text-red-500">*</span></label>
                    <input type="number" name="tahun" value="{{ old('tahun', $mak->tahun) }}" required
                        class="form-input @error('tahun') border-red-500 @enderror" min="2020" max="2100">
                    @error('tahun')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kode -->
                <div class="mb-4">
                    <label class="form-label">Kode <span class="text-red-500">*</span></label>
                    <input type="text" name="kode" value="{{ old('kode', $mak->kode) }}" required
                        class="form-input @error('kode') border-red-500 @enderror">
                    @error('kode')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nama -->
                <div class="mb-4">
                    <label class="form-label">Nama <span class="text-red-500">*</span></label>
                    <input type="text" name="nama" value="{{ old('nama', $mak->nama) }}" required
                        class="form-input @error('nama') border-red-500 @enderror">
                    @error('nama')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Satker -->
                <div class="mb-4">
                    <label class="form-label">Satker <span class="text-red-500">*</span></label>
                    <input type="text" name="satker" value="{{ old('satker', $mak->satker) }}" required
                        class="form-input @error('satker') border-red-500 @enderror">
                    @error('satker')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Akun -->
                <div class="mb-4">
                    <label class="form-label">Akun <span class="text-red-500">*</span></label>
                    <input type="text" name="akun" value="{{ old('akun', $mak->akun) }}" required
                        class="form-input @error('akun') border-red-500 @enderror">
                    @error('akun')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Paket -->
                <div class="mb-4">
                    <label class="form-label">Paket <span class="text-red-500">*</span></label>
                    <input type="text" name="paket" value="{{ old('paket', $mak->paket) }}" required
                        class="form-input @error('paket') border-red-500 @enderror">
                    @error('paket')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
                    <button type="submit"
                        class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition">
                        Update MAK
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