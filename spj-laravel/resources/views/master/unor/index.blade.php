@extends('layouts.app')

@section('title', 'Master Unit Organisasi')
@section('page-title', 'Unit Organisasi')
@section('page-subtitle', 'Data Unit Organisasi Kementerian Pekerjaan Umum')

@section('content')
    <div class="card">
        <div class="card-header flex justify-between items-center">
            <h2 class="card-title">Daftar Unit Organisasi</h2>
            <a href="{{ route('master.unor.create') }}" class="btn-primary">
                + Tambah Unor
            </a>
        </div>

        <div class="p-5 border-b border-gray-200">
            <form action="{{ route('master.unor.index') }}" method="GET" class="flex gap-3">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kode atau nama unor..."
                    class="form-input flex-1">
                <button type="submit" class="btn-primary">
                    Cari
                </button>
                @if(request('search'))
                    <a href="{{ route('master.unor.index') }}" class="btn-secondary">
                        Reset
                    </a>
                @endif
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th class="w-16">No</th>
                        <th>Kode Unor</th>
                        <th>Nama Unit Organisasi</th>
                        <th class="w-32 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($unors as $index => $unor)
                        <tr>
                            <td class="text-center">{{ $unors->firstItem() + $index }}</td>
                            <td class="font-medium text-primary">{{ $unor->kode_unor }}</td>
                            <td>{{ $unor->nama_unor }}</td>
                            <td>
                                <div class="flex gap-2 justify-center">
                                    <a href="{{ route('master.unor.edit', $unor) }}"
                                        class="text-primary hover:text-primary-dark text-sm font-medium">
                                        Edit
                                    </a>
                                    <form action="{{ route('master.unor.destroy', $unor) }}" method="POST"
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
                            <td colspan="4" class="text-center py-8 text-gray-500">
                                Tidak ada data
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($unors->hasPages())
            <div class="p-5 border-t border-gray-200">
                {{ $unors->links() }}
            </div>
        @endif
    </div>
@endsection