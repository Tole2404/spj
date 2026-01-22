@extends('layouts.app')

@section('title', 'Master PPK')
@section('page-title', 'Master PPK')
@section('page-subtitle', 'Pejabat Pembuat Komitmen')

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
            <form method="GET" action="{{ route('master.ppk.index') }}" class="flex items-end gap-3">
                <!-- Search -->
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Pencarian</label>
                    <input type="text" name="search" value="{{ request('search') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                        placeholder="Cari nama, NIP, satker, KDPPK...">
                </div>

                <!-- Actions -->
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition">
                    Cari
                </button>
                <a href="{{ route('master.ppk.index') }}"
                    class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition">
                    Reset
                </a>
                <a href="{{ route('master.ppk.create') }}"
                    class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                    + Tambah PPK
                </a>
            </form>
        </div>

        <!-- Table Card -->
        <div class="bg-white rounded-lg border border-gray-200">
            <div class="px-4 py-3 border-b border-gray-200 flex items-center justify-between">
                <h3 class="font-semibold text-gray-900">Daftar PPK</h3>
                <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded">
                    {{ $ppkData->total() }} item
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 w-12">NO</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-600">NAMA</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-600">NIP</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-600">SATKER</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-600">KDPPK</th>
                            <th class="px-4 py-3 text-center text-xs font-medium text-gray-600 w-40">AKSI</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($ppkData as $index => $ppk)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-500">{{ $ppkData->firstItem() + $index }}</td>
                                <td class="px-4 py-3 font-medium text-gray-900">{{ $ppk->nama }}</td>
                                <td class="px-4 py-3 text-gray-600">
                                    <code class="bg-gray-100 px-2 py-1 rounded text-xs">{{ $ppk->nip }}</code>
                                </td>
                                <td class="px-4 py-3 text-gray-600">{{ $ppk->satker }}</td>
                                <td class="px-4 py-3 text-gray-600">
                                    <code
                                        class="bg-blue-50 text-blue-700 px-2 py-1 rounded text-xs font-medium">{{ $ppk->kdppk }}</code>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('master.ppk.edit', $ppk->id) }}"
                                            class="px-3 py-1 bg-blue-50 text-blue-600 rounded hover:bg-blue-100 text-xs font-medium">
                                            Edit
                                        </a>
                                        <form action="{{ route('master.ppk.destroy', $ppk->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin hapus PPK ini?')">
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
                                <td colspan="6" class="px-4 py-8 text-center text-gray-500">
                                    Belum ada data PPK
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($ppkData->hasPages())
                <div class="px-4 py-3 border-t border-gray-200">
                    {{ $ppkData->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection