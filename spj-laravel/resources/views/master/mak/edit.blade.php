@extends('layouts.app')

@section('title', 'Edit MAK')
@section('page-title', 'Edit MAK')
@section('page-subtitle', 'Form edit data MAK')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-lg border border-gray-200">
            <div class="px-4 sm:px-6 py-4 border-b border-gray-200">
                <h3 class="font-semibold text-gray-900">Form Edit MAK</h3>
            </div>

            <form action="{{ route('master.mak.update', $mak->id) }}" method="POST" class="p-4 sm:p-6 space-y-4">
                @csrf
                @method('PUT')

                <!-- Tahun & Kode Row -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Tahun -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Tahun <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="tahun" value="{{ old('tahun', $mak->tahun) }}" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('tahun') border-red-500 @enderror"
                            min="2020" max="2100">
                        @error('tahun')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kode -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Kode <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="kode" value="{{ old('kode', $mak->kode) }}" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('kode') border-red-500 @enderror">
                        @error('kode')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Nama -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Nama <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama" value="{{ old('nama', $mak->nama) }}" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('nama') border-red-500 @enderror">
                    @error('nama')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Satker -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Satker <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="satker" value="{{ old('satker', $mak->satker) }}" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('satker') border-red-500 @enderror">
                    @error('satker')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Akun & Paket Row -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Akun -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Akun <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="akun" value="{{ old('akun', $mak->akun) }}" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('akun') border-red-500 @enderror">
                        @error('akun')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Paket -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Paket <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="paket" value="{{ old('paket', $mak->paket) }}" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('paket') border-red-500 @enderror">
                        @error('paket')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 pt-4 border-t border-gray-200">
                    <button type="submit"
                        class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition font-medium text-center">
                        Update MAK
                    </button>
                    <a href="{{ route('master.mak.index') }}"
                        class="px-6 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection