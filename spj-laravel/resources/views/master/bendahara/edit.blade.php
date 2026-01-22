@extends('layouts.app')

@section('title', 'Edit Bendahara')
@section('page-title', 'Edit Bendahara')
@section('page-subtitle', 'Ubah data bendahara')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Form Edit Bendahara</h2>
            </div>
            <form action="{{ route('master.bendahara.update', $bendahara->id) }}" method="POST" class="card-body space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Nama <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama" value="{{ old('nama', $bendahara->nama) }}" required
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
                    <input type="text" name="nip" value="{{ old('nip', $bendahara->nip) }}" required
                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary @error('nip') border-red-500 @enderror"
                        placeholder="Nomor Induk Pegawai">
                    @error('nip')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jabatan</label>
                        <input type="text" name="jabatan" value="{{ old('jabatan', $bendahara->jabatan) }}"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary"
                            placeholder="Contoh: Bendahara Pengeluaran">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Gol/Pangkat</label>
                        <input type="text" name="gol_pangkat" value="{{ old('gol_pangkat', $bendahara->gol_pangkat) }}"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary"
                            placeholder="Contoh: III/c">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Eselon</label>
                        <input type="text" name="eselon" value="{{ old('eselon', $bendahara->eselon) }}"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary"
                            placeholder="Contoh: IV">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir"
                            value="{{ old('tgl_lahir', $bendahara->tgl_lahir?->format('Y-m-d')) }}"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-1 focus:ring-primary focus:border-primary">
                    </div>
                </div>

                <div>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="is_active" value="1" {{ $bendahara->is_active ? 'checked' : '' }}
                            class="rounded border-gray-300 text-primary focus:ring-primary">
                        <span class="text-sm text-gray-700">Aktif</span>
                    </label>
                </div>

                <div class="flex gap-3 pt-4">
                    <button type="submit" class="btn-primary">Update</button>
                    <a href="{{ route('master.bendahara.index') }}" class="btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection