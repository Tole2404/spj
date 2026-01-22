@extends('layouts.app')

@section('title', 'Master Bendahara')
@section('page-title', 'Data Bendahara')
@section('page-subtitle', 'Kelola data bendahara pengeluaran')

@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="card">
            <div class="card-header flex justify-between items-center">
                <h2 class="card-title">Daftar Bendahara</h2>
                <a href="{{ route('master.bendahara.create') }}" class="btn-primary text-sm">
                    + Tambah Bendahara
                </a>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50 border-b">
                            <tr>
                                <th class="px-4 py-3 text-left font-medium text-gray-600">No</th>
                                <th class="px-4 py-3 text-left font-medium text-gray-600">Nama</th>
                                <th class="px-4 py-3 text-left font-medium text-gray-600">Jabatan</th>
                                <th class="px-4 py-3 text-left font-medium text-gray-600">Gol/Pangkat</th>
                                <th class="px-4 py-3 text-left font-medium text-gray-600">NIP</th>
                                <th class="px-4 py-3 text-left font-medium text-gray-600">Eselon</th>
                                <th class="px-4 py-3 text-center font-medium text-gray-600">Status</th>
                                <th class="px-4 py-3 text-center font-medium text-gray-600">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @forelse($bendaharas as $index => $bendahara)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-3">{{ $index + 1 }}</td>
                                    <td class="px-4 py-3 font-medium">{{ $bendahara->nama }}</td>
                                    <td class="px-4 py-3">{{ $bendahara->jabatan ?? '-' }}</td>
                                    <td class="px-4 py-3">{{ $bendahara->gol_pangkat ?? '-' }}</td>
                                    <td class="px-4 py-3">{{ $bendahara->nip }}</td>
                                    <td class="px-4 py-3">{{ $bendahara->eselon ?? '-' }}</td>
                                    <td class="px-4 py-3 text-center">
                                        @if($bendahara->is_active)
                                            <span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded">Aktif</span>
                                        @else
                                            <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded">Nonaktif</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <div class="flex justify-center gap-2">
                                            <a href="{{ route('master.bendahara.edit', $bendahara->id) }}"
                                                class="text-blue-600 hover:text-blue-800">Edit</a>
                                            <form action="{{ route('master.bendahara.destroy', $bendahara->id) }}" method="POST"
                                                class="inline" onsubmit="return confirm('Yakin hapus bendahara ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-4 py-8 text-center text-gray-500">
                                        Belum ada data bendahara
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection