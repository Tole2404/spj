@extends('layouts.app')

@section('title', 'Edit PPK')
@section('page-title', 'Edit PPK')
@section('page-subtitle', 'Form edit data PPK')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-lg border border-gray-200">
            <div class="px-4 sm:px-6 py-4 border-b border-gray-200">
                <h3 class="font-semibold text-gray-900">Form Edit PPK</h3>
            </div>

            <form action="{{ route('master.ppk.update', $ppk->id) }}" method="POST" class="p-4 sm:p-6 space-y-4">
                @csrf
                @method('PUT')

                <!-- Nama & NIP Row -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Nama -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Nama <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nama" value="{{ old('nama', $ppk->nama) }}" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('nama') border-red-500 @enderror">
                        @error('nama')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- NIP -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            NIP <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nip" value="{{ old('nip', $ppk->nip) }}" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('nip') border-red-500 @enderror">
                        @error('nip')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Satker -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Satker <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="satker" value="{{ old('satker', $ppk->satker) }}" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('satker') border-red-500 @enderror">
                    @error('satker')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- KDPPK -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        KDPPK <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="kdppk" value="{{ old('kdppk', $ppk->kdppk) }}" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('kdppk') border-red-500 @enderror">
                    @error('kdppk')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-gray-500 text-xs mt-1">Kode PPK (biasanya 2 digit)</p>
                </div>

                <!-- Actions -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 pt-4 border-t border-gray-200">
                    <button type="submit"
                        class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition font-medium text-center">
                        Update PPK
                    </button>
                    <a href="{{ route('master.ppk.index') }}"
                        class="px-6 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection