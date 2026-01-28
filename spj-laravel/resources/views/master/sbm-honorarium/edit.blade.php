@extends('layouts.app')

@section('title', 'Edit SBM Honorarium')
@section('page-title', 'Edit SBM Honorarium')
@section('page-subtitle', 'Form Edit Data SBM Honorarium')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-lg border border-gray-200">
            <div class="px-4 sm:px-6 py-4 border-b border-gray-200">
                <h3 class="font-semibold text-gray-900">Edit SBM Honorarium</h3>
                <p class="text-sm text-gray-500 mt-0.5">Perbarui data yang diperlukan</p>
            </div>

            <form action="{{ route('master.sbm-honorarium.update', $sbm->id) }}" method="POST" class="p-4 sm:p-6 space-y-4">
                @csrf
                @method('PUT')

                <!-- Golongan Jabatan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Golongan Jabatan <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="golongan_jabatan" value="{{ old('golongan_jabatan', $sbm->golongan_jabatan) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('golongan_jabatan') border-red-500 @enderror"
                        required>
                    @error('golongan_jabatan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Keterangan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Keterangan
                    </label>
                    <input type="text" name="keterangan" value="{{ old('keterangan', $sbm->keterangan) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('keterangan') border-red-500 @enderror"
                        placeholder="Deskripsi tambahan (opsional)">
                    @error('keterangan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tarif & Tahun -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Tarif Honorarium (Rp) <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="tarif_honorarium"
                            value="{{ old('tarif_honorarium', $sbm->tarif_honorarium) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('tarif_honorarium') border-red-500 @enderror"
                            min="0" required>
                        @error('tarif_honorarium')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Tahun Anggaran <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="tahun_anggaran" value="{{ old('tahun_anggaran', $sbm->tahun_anggaran) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('tahun_anggaran') border-red-500 @enderror"
                            min="2020" max="2099" required>
                        @error('tahun_anggaran')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 pt-4 border-t border-gray-200">
                    <button type="submit"
                        class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition font-medium text-center">
                        Update Data
                    </button>
                    <a href="{{ route('master.sbm-honorarium.index') }}"
                        class="px-6 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection