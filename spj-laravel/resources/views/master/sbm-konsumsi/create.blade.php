@extends('layouts.app')

@section('title', 'Tambah SBM Konsumsi')
@section('page-title', 'Tambah SBM Konsumsi')
@section('page-subtitle', 'Form Tambah Data SBM Konsumsi Baru')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-lg border border-gray-200">
            <div class="px-4 sm:px-6 py-4 border-b border-gray-200">
                <h3 class="font-semibold text-gray-900">Informasi SBM Konsumsi</h3>
                <p class="text-sm text-gray-500 mt-0.5">Lengkapi data di bawah ini dengan benar</p>
            </div>

            <form action="{{ route('master.sbm-konsumsi.store') }}" method="POST" class="p-4 sm:p-6 space-y-4">
                @csrf

                <!-- Nama Provinsi -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Nama Provinsi <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama_provinsi" value="{{ old('nama_provinsi') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('nama_provinsi') border-red-500 @enderror"
                        placeholder="DKI JAKARTA" required>
                    @error('nama_provinsi')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Satuan & Tahun -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Satuan <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="satuan" value="{{ old('satuan', 'Orang/Kali') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('satuan') border-red-500 @enderror"
                            placeholder="Orang/Kali" required>
                        @error('satuan')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Tahun Anggaran <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="tahun_anggaran" value="{{ old('tahun_anggaran', date('Y')) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('tahun_anggaran') border-red-500 @enderror"
                            placeholder="{{ date('Y') }}" min="2020" max="2099" required>
                        @error('tahun_anggaran')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Harga Makan & Snack -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Harga Max Makan (Rp) <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="harga_max_makan" value="{{ old('harga_max_makan') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('harga_max_makan') border-red-500 @enderror"
                            placeholder="75000" min="0" required>
                        @error('harga_max_makan')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Harga Max Snack (Rp) <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="harga_max_snack" value="{{ old('harga_max_snack') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('harga_max_snack') border-red-500 @enderror"
                            placeholder="50000" min="0" required>
                        @error('harga_max_snack')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 pt-4 border-t border-gray-200">
                    <button type="submit"
                        class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition font-medium text-center">
                        Simpan Data
                    </button>
                    <a href="{{ route('master.sbm-konsumsi.index') }}"
                        class="px-6 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection