@extends('layouts.app')

@section('title', 'Tambah Unit Kerja')
@section('page-title', 'Tambah Unit Kerja')
@section('page-subtitle', 'Form Tambah Data Unit Kerja')

@section('content')
    <div class="max-w-2xl">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Form Tambah Unit Kerja</h2>
            </div>

            <form action="{{ route('master.unit-kerja.store') }}" method="POST" class="card-body space-y-4">
                @csrf

                <div>
                    <label class="form-label">
                        Unit Organisasi <span class="text-red-500">*</span>
                    </label>
                    <select name="unor_id" required class="form-select @error('unor_id') border-red-500 @enderror">
                        <option value="">Pilih Unor</option>
                        @foreach($unors as $unor)
                            <option value="{{ $unor->id }}" {{ old('unor_id') == $unor->id ? 'selected' : '' }}>
                                {{ $unor->nama_unor }}
                            </option>
                        @endforeach
                    </select>
                    @error('unor_id')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="form-label">
                        Kode Unit Kerja <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="kode_unit" value="{{ old('kode_unit') }}" required
                        class="form-input @error('kode_unit') border-red-500 @enderror" placeholder="Contoh: SETJEN-ORTALA">
                    @error('kode_unit')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="form-label">
                        Nama Unit Kerja <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama_unit" value="{{ old('nama_unit') }}" required
                        class="form-input @error('nama_unit') border-red-500 @enderror"
                        placeholder="Contoh: Biro Organisasi dan Tata Laksana">
                    @error('nama_unit')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-2 pt-3 border-t border-gray-200">
                    <button type="submit" class="btn-primary">
                        Simpan
                    </button>
                    <a href="{{ route('master.unit-kerja.index') }}" class="btn-secondary">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection