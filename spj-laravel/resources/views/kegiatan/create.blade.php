@extends('layouts.app')

@section('title', 'Tambah Kegiatan')
@section('page-title', 'Tambah Kegiatan')
@section('page-subtitle', 'Form Input Data Kegiatan Baru')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg border border-gray-200">
            <div class="px-5 py-3 border-b border-gray-200">
                <h2 class="text-base font-semibold text-gray-900">Informasi Kegiatan</h2>
            </div>

            <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data" class="p-5 space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        Nama Kegiatan <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama_kegiatan" value="{{ old('nama_kegiatan') }}"
                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary @error('nama_kegiatan') border-red-500 @enderror"
                        placeholder="Masukkan nama kegiatan" required>
                    @error('nama_kegiatan')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Unit Organisasi <span class="text-red-500">*</span>
                        </label>
                        <select name="unor_id" required
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary @error('unor_id') border-red-500 @enderror">
                            <option value="">Pilih Unit Organisasi</option>
                            @foreach($unors as $unor)
                                <option value="{{ $unor->id }}" {{ old('unor_id') == $unor->id ? 'selected' : '' }}>
                                    {{ $unor->nama_unor }}
                                </option>
                            @endforeach
                        </select>
                        @error('unor_id')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Unit Kerja <span class="text-red-500">*</span>
                        </label>
                        <select name="unit_kerja_id" required
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary @error('unit_kerja_id') border-red-500 @enderror">
                            <option value="">Pilih Unit Kerja</option>
                            @foreach($unitKerjas as $uk)
                                <option value="{{ $uk->id }}" {{ old('unit_kerja_id') == $uk->id ? 'selected' : '' }}>
                                    {{ $uk->nama_unit }}
                                </option>
                            @endforeach
                        </select>
                        @error('unit_kerja_id')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Tanggal Mulai <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary @error('tanggal_mulai') border-red-500 @enderror">
                        @error('tanggal_mulai')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">
                            Tanggal Selesai <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" required
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary @error('tanggal_selesai') border-red-500 @enderror">
                        @error('tanggal_selesai')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        Jumlah Peserta <span class="text-red-500">*</span>
                    </label>
                    <input type="number" name="jumlah_peserta" value="{{ old('jumlah_peserta') }}" required min="1"
                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary @error('jumlah_peserta') border-red-500 @enderror"
                        placeholder="Contoh: 25">
                    @error('jumlah_peserta')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Akun (MAK) -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        Akun (MAK) <span class="text-red-500">*</span>
                    </label>
                    <select name="mak_id" required
                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary @error('mak_id') border-red-500 @enderror">
                        <option value="">Pilih Akun MAK</option>
                        @foreach($makData as $mak)
                            <option value="{{ $mak->id }}" {{ old('mak_id') == $mak->id ? 'selected' : '' }}>
                                {{ $mak->kode }} - {{ $mak->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('mak_id')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Bendahara -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        Bendahara
                    </label>
                    <select name="bendahara_id"
                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary @error('bendahara_id') border-red-500 @enderror">
                        <option value="">Pilih Bendahara</option>
                        @foreach($bendaharaData as $bendahara)
                            <option value="{{ $bendahara->id }}" {{ old('bendahara_id') == $bendahara->id ? 'selected' : '' }}>
                                {{ $bendahara->nama }} - {{ $bendahara->nip }}
                            </option>
                        @endforeach
                    </select>
                    @error('bendahara_id')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Provinsi -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        Provinsi <span class="text-red-500">*</span>
                    </label>
                    <select name="provinsi_id" required
                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary @error('provinsi_id') border-red-500 @enderror">
                        <option value="">Pilih Provinsi</option>
                        @foreach($provinsiData as $prov)
                            <option value="{{ $prov->id }}" {{ old('provinsi_id') == $prov->id ? 'selected' : '' }}>
                                {{ $prov->nama_provinsi }}
                            </option>
                        @endforeach
                    </select>
                    @error('provinsi_id')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-500">Provinsi akan menentukan tarif SBM yang berlaku</p>
                </div>

                <!-- Detail Lokasi -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        Detail Lokasi <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="detail_lokasi" value="{{ old('detail_lokasi') }}" required
                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary @error('detail_lokasi') border-red-500 @enderror"
                        placeholder="Contoh: Ruang Rapat Lt. 3, Hotel Santika Bandung">
                    @error('detail_lokasi')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- PPK -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        PPK <span class="text-red-500">*</span>
                    </label>
                    <select name="ppk_id" required
                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary @error('ppk_id') border-red-500 @enderror">
                        <option value="">Pilih PPK</option>
                        @foreach($ppkData as $ppk)
                            <option value="{{ $ppk->id }}" {{ old('ppk_id') == $ppk->id ? 'selected' : '' }}>
                                {{ $ppk->nama }} ({{ $ppk->nip }})
                            </option>
                        @endforeach
                    </select>
                    @error('ppk_id')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        File Laporan Kegiatan
                    </label>
                    <input type="file" name="file_laporan" accept=".pdf,.doc,.docx"
                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary file:mr-3 file:py-1 file:px-3 file:rounded file:border-0 file:text-sm file:bg-primary file:text-white file:cursor-pointer hover:file:bg-primary-dark">
                    <p class="mt-1 text-xs text-gray-500">Format: PDF, DOC, DOCX (Maks: 10MB)</p>
                </div>

                <div class="flex items-center gap-2 pt-3 border-t border-gray-200">
                    <button type="submit"
                        class="px-4 py-2 text-sm bg-primary text-white font-medium rounded hover:bg-primary-dark transition-colors">
                        Simpan & Lanjutkan
                    </button>
                    <a href="{{ route('home') }}"
                        class="px-4 py-2 text-sm bg-gray-100 text-gray-700 font-medium rounded hover:bg-gray-200 transition-colors">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection