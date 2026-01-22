@extends('layouts.app')

@section('title', 'Edit PPK')
@section('page-title', 'Edit PPK')
@section('page-subtitle', 'Form edit data PPK')

@section('content')
    <div class="max-w-2xl">
        <div class="bg-white rounded-lg border border-gray-200 p-6">
            <form action="{{ route('master.ppk.update', $ppk->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Nama -->
                <div class="mb-4">
                    <label class="form-label">Nama <span class="text-red-500">*</span></label>
                    <input type="text" name="nama" value="{{ old('nama', $ppk->nama) }}" required
                        class="form-input @error('nama') border-red-500 @enderror">
                    @error('nama')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- NIP -->
                <div class="mb-4">
                    <label class="form-label">NIP <span class="text-red-500">*</span></label>
                    <input type="text" name="nip" value="{{ old('nip', $ppk->nip) }}" required
                        class="form-input @error('nip') border-red-500 @enderror">
                    @error('nip')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Satker -->
                <div class="mb-4">
                    <label class="form-label">Satker <span class="text-red-500">*</span></label>
                    <input type="text" name="satker" value="{{ old('satker', $ppk->satker) }}" required
                        class="form-input @error('satker') border-red-500 @enderror">
                    @error('satker')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- KDPPK -->
                <div class="mb-4">
                    <label class="form-label">KDPPK <span class="text-red-500">*</span></label>
                    <input type="text" name="kdppk" value="{{ old('kdppk', $ppk->kdppk) }}" required
                        class="form-input @error('kdppk') border-red-500 @enderror">
                    @error('kdppk')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
                    <button type="submit"
                        class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition">
                        Update PPK
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