@extends('layouts.app')

@section('title', 'Master Unit Kerja')
@section('page-title', 'Unit Kerja')
@section('page-subtitle', 'Data Unit Kerja Kementerian Pekerjaan Umum')

@section('content')
    <div class="card">
        <div class="card-header flex justify-between items-center">
            <h2 class="card-title">Daftar Unit Kerja</h2>
            <a href="{{ route('master.unit-kerja.create') }}" class="btn-primary">
                + Tambah Unit Kerja
            </a>
        </div>

        <div class="p-5 border-b border-gray-200">
            <form action="{{ route('master.unit-kerja.index') }}" method="GET" class="space-y-3">
                <div class="flex gap-3">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari kode, nama unit, atau unor..." class="form-input flex-1">
                    <select name="unor_id" class="form-select">
                        <option value="">Semua Unor</option>
                        @foreach($unors as $unor)
                            <option value="{{ $unor->id }}" {{ request('unor_id') == $unor->id ? 'selected' : '' }}>
                                {{ $unor->nama_unor }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex gap-2">
                    <button type="submit" class="btn-primary">
                        Cari & Filter
                    </button>
                    @if(request('search') || request('unor_id'))
                        <a href="{{ route('master.unit-kerja.index') }}" class="btn-secondary">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th class="w-16">No</th>
                        <th>Kode</th>
                        <th>Nama Unit Kerja</th>
                        <th>Unit Organisasi</th>
                        <th class="w-32 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($unitKerjas as $index => $uk)
                        <tr>
                            <td class="text-center">{{ $unitKerjas->firstItem() + $index }}</td>
                            <td class="font-medium text-primary">{{ $uk->kode_unit }}</td>
                            <td>{{ $uk->nama_unit }}</td>
                            <td>
                                <span class="text-xs bg-gray-100 px-2 py-1 rounded">
                                    {{ $uk->unor->nama_unor }}
                                </span>
                            </td>
                            <td>
                                <div class="flex gap-2 justify-center">
                                    <a href="{{ route('master.unit-kerja.edit', $uk) }}"
                                        class="text-primary hover:text-primary-dark text-sm font-medium">
                                        Edit
                                    </a>
                                    <form action="{{ route('master.unit-kerja.destroy', $uk) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-8 text-gray-500">
                                Tidak ada data
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($unitKerjas->hasPages())
            <div class="p-5 border-t border-gray-200">
                {{ $unitKerjas->appends(request()->query())->links() }}
            </div>
        @endif
    </div>
@endsection