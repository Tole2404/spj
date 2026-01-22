@extends('layouts.app')

@section('title', 'Tambah PPK')
@section('page-title', 'Tambah PPK')
@section('page-subtitle', 'Form tambah data PPK baru')

@section('content')
    <div class="max-w-2xl">
        <div class="bg-white rounded-lg border border-gray-200 p-6">
            <form action="{{ route('master.ppk.store') }}" method="POST">
                @csrf

                <!-- Nama -->
                <div class="mb-4">
                    <label class="form-label">Nama <span class="text-red-500">*</span></label>
                    <input type="text" name="nama" value="{{ old('nama') }}" required
                        class="form-input @error('nama') border-red-500 @enderror" placeholder="Contoh: Dini Rianti, S.E.">
                    @error('nama')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- NIP -->
                <div class="mb-4">
                    <label class="form-label">NIP <span class="text-red-500">*</span></label>
                    <input type="text" name="nip" value="{{ old('nip') }}" required
                        class="form-input @error('nip') border-red-500 @enderror" placeholder="Contoh: 198010172005022001">
                    @error('nip')
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

                <!-- KDPPK -->
                <div class="mb-4">
                    <label class="form-label">KDPPK <span class="text-red-500">*</span></label>
                    <input type="text" name="kdppk" value="{{ old('kdppk') }}" required
                        class="form-input @error('kdppk') border-red-500 @enderror" placeholder="Contoh: 02">
                    @error('kdppk')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
                    <button type="submit"
                        class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition">
                        Simpan PPK
                    </button>
                    <a href="{{ route('master.ppk.index') }}"
                        class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection