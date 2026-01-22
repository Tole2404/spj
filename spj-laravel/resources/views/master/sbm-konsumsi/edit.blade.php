@extends('layouts.app')

@section('title', 'Edit SBM Konsumsi')
@section('page-title', 'Edit SBM Konsumsi')
@section('page-subtitle', 'Form Edit Data SBM Konsumsi')

@section('content')
    <div class="max-w-4xl">
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Edit Informasi SBM</h2>
                <p class="text-sm text-gray-500 mt-0.5">Perbarui data yang diperlukan</p>
            </div>

            <form action="{{ route('master.sbm-konsumsi.update', $sbm->id) }}" method="POST" class="p-6 space-y-6">
                @csrf
                @method('PUT')

                <!-- ID Provinsi -->
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">
                        ID Provinsi <span class="text-red-500">*</span>
                    </label>
                    <input type="number" name="id_provinsi" value="{{ old('id_provinsi', $sbm->id_provinsi) }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all @error('id_provinsi') border-red-500 @enderror"
                        min="0" required>
                    @error('id_provinsi')
                        <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nama Provinsi & Satuan -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2">
                            Nama Provinsi <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nama_provinsi" value="{{ old('nama_provinsi', $sbm->nama_provinsi) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all @error('nama_provinsi') border-red-500 @enderror"
                            required>
                        @error('nama_provinsi')
                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2">
                            Satuan <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="satuan" value="{{ old('satuan', $sbm->satuan) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all @error('satuan') border-red-500 @enderror"
                            required>
                        @error('satuan')
                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Harga Makan & Snack -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2">
                            Harga Max Makan (Rp) <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="harga_max_makan"
                            value="{{ old('harga_max_makan', $sbm->harga_max_makan) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all @error('harga_max_makan') border-red-500 @enderror"
                            min="0" required>
                        @error('harga_max_makan')
                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2">
                            Harga Max Snack (Rp) <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="harga_max_snack"
                            value="{{ old('harga_max_snack', $sbm->harga_max_snack) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all @error('harga_max_snack') border-red-500 @enderror"
                            min="0" required>
                        @error('harga_max_snack')
                            <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Tahun Anggaran -->
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">
                        Tahun Anggaran <span class="text-red-500">*</span>
                    </label>
                    <input type="number" name="tahun_anggaran" value="{{ old('tahun_anggaran', $sbm->tahun_anggaran) }}"
                        class="w-full md:w-1/2 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all @error('tahun_anggaran') border-red-500 @enderror"
                        min="2020" max="2099" required>
                    @error('tahun_anggaran')
                        <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
                    <button type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-amber-500 to-orange-600 text-white font-medium rounded-lg hover:shadow-lg transition-all">
                        Update Data
                    </button>
                    <a href="{{ route('master.sbm-konsumsi.index') }}"
                        class="px-6 py-3 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition-colors">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection