@extends('layouts.app')

@section('title', 'Tambah Bendahara')
@section('page-title', 'Tambah Bendahara')
@section('page-subtitle', 'Input data bendahara baru')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Form Tambah Bendahara</h2>
            </div>
            <form action="{{ route('master.bendahara.store') }}" method="POST" class="card-body space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Nama <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama" value="{{ old('nama') }}" required
                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary @error('nama') border-red-500 @enderror"
                        placeholder="Nama lengkap">
                    @error('nama')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        NIP <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nip" value="{{ old('nip') }}" required
                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary @error('nip') border-red-500 @enderror"
                        placeholder="Nomor Induk Pegawai">
                    @error('nip')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jabatan</label>
                        <input type="text" name="jabatan" value="{{ old('jabatan') }}"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary"
                            placeholder="Contoh: Bendahara Pengeluaran">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Gol/Pangkat</label>
                        <input type="text" name="gol_pangkat" value="{{ old('gol_pangkat') }}"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary"
                            placeholder="Contoh: III/c">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Eselon</label>
                        <input type="text" name="eselon" value="{{ old('eselon') }}"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary"
                            placeholder="Contoh: IV">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary">
                    </div>
                </div>

                <div class="flex gap-3 pt-4">
                    <button type="submit" class="btn-primary">Simpan</button>
                    <a href="{{ route('master.bendahara.index') }}" class="btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection