@extends('layouts.app')

@section('title', 'Master MAK')
@section('page-title', 'Master MAK')
@section('page-subtitle', 'Mata Anggaran Kegiatan')

@section('content')
    <div class="space-y-4">
        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded">
                <p class="text-green-700 font-medium">{{ session('success') }}</p>
            </div>
        @endif

        <!-- Search & Filter Card -->
        <div class="bg-white rounded-lg border border-gray-200 p-4">
            <form method="GET" action="{{ route('master.mak.index') }}" class="flex items-end gap-3">
                <!-- Search -->
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Pencarian</label>
                    <input type="text" name="search" value="{{ request('search') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                        placeholder="Cari kode, nama, satker...">
                </div>

                <!-- Filter Tahun -->
                <div class="w-32">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tahun</label>
                    <select name="tahun"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        <option value="">Semua</option>
                        @foreach($tahunList as $tahun)
                            <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                                {{ $tahun }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Actions -->
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition">
                    Cari
                </button>
                <a href="{{ route('master.mak.index') }}"
                    class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition">
                    Reset
                </a>
                <a href="{{ route('master.mak.create') }}"
                    class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                    + Tambah MAK
                </a>
            </form>
        </div>

        <!-- Table Card -->
        <div class="bg-white rounded-lg border border-gray-200">
            <div class="px-4 py-3 border-b border-gray-200 flex items-center justify-between">
                <h3 class="font-semibold text-gray-900">Daftar MAK</h3>
                <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded">
                    {{ $makData->total() }} item
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 w-12">#</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-600">Tahun</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-600">Kode</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-600">Nama</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-600">Satker</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-600">Akun</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-600">Paket</th>
                            <th class="px-4 py-3 text-center text-xs font-medium text-gray-600 w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($makData as $index => $mak)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-500">
                                    {{ $makData->firstItem() + $index }}
                                </td>
                                <td class="px-4 py-3 text-gray-900">{{ $mak->tahun }}</td>
                                <td class="px-4 py-3">
                                    <code class="bg-gray-100 px-2 py-1 rounded text-xs">{{ $mak->kode }}</code>
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-900">{{ $mak->nama }}</td>
                                <td class="px-4 py-3 text-gray-600">{{ $mak->satker }}</td>
                                <td class="px-4 py-3 text-gray-600">{{ $mak->akun }}</td>
                                <td class="px-4 py-3 text-gray-600">{{ $mak->paket }}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('master.mak.edit', $mak->id) }}"
                                            class="px-3 py-1 bg-blue-50 text-blue-600 rounded hover:bg-blue-100 text-xs font-medium">
                                            Edit
                                        </a>
                                        <form action="{{ route('master.mak.destroy', $mak->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin hapus MAK ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-3 py-1 bg-red-50 text-red-600 rounded hover:bg-red-100 text-xs font-medium">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-4 py-8 text-center text-gray-500">
                                    Belum ada data MAK
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($makData->hasPages())
                <div class="px-4 py-3 border-t border-gray-200">
                    {{ $makData->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection