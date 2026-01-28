@extends('layouts.app')

@section('title', 'Edit Waktu Konsumsi')
@section('page-title', 'Edit Waktu Konsumsi')
@section('page-subtitle', 'Ubah data waktu konsumsi')

@section('content')
    <div class="max-w-2xl">
        <div class="bg-white rounded-lg border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="font-semibold text-gray-900">Form Edit Waktu Konsumsi</h3>
            </div>

            <form action="{{ route('master.waktu-konsumsi.update', $waktuKonsumsi->id) }}" method="POST"
                class="p-6 space-y-4">
                @csrf
                @method('PUT')

                <!-- Nama Waktu -->
                <div>
                    <label for="nama_waktu" class="block text-sm font-medium text-gray-700 mb-1">
                        Nama Waktu <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama_waktu" id="nama_waktu"
                        value="{{ old('nama_waktu', $waktuKonsumsi->nama_waktu) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('nama_waktu') border-red-500 @enderror"
                        placeholder="Contoh: Makan Pagi" required>
                    @error('nama_waktu')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kode Waktu -->
                <div>
                    <label for="kode_waktu" class="block text-sm font-medium text-gray-700 mb-1">
                        Kode Waktu <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="kode_waktu" id="kode_waktu"
                        value="{{ old('kode_waktu', $waktuKonsumsi->kode_waktu) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('kode_waktu') border-red-500 @enderror"
                        placeholder="Contoh: PAGI" required>
                    @error('kode_waktu')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-gray-500 text-xs mt-1">Kode singkat untuk identifikasi waktu konsumsi</p>
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
                    <button type="submit"
                        class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition font-medium">
                        Update
                    </button>
                    <a href="{{ route('master.waktu-konsumsi.index') }}"
                        class="px-6 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection