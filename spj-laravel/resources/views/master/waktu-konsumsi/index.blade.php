@extends('layouts.app')

@section('title', 'Master Waktu Konsumsi')
@section('page-title', 'Master Waktu Konsumsi')
@section('page-subtitle', 'Kelola waktu makan (Pagi, Siang, Sore, Snack)')

@section('content')
    <div class="space-y-4">
        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded">
                <p class="text-green-700 font-medium">{{ session('success') }}</p>
            </div>
        @endif

        <!-- Table Card -->
        <div class="bg-white rounded-lg border border-gray-200">
            <div class="px-4 py-3 border-b border-gray-200 flex items-center justify-between">
                <h3 class="font-semibold text-gray-900">Daftar Waktu Konsumsi</h3>
                <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded">
                    {{ $waktuKonsumsi->count() }} item
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 w-12">#</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-600">Nama Waktu</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-600">Kode</th>
                            <th class="px-4 py-3 text-center text-xs font-medium text-gray-600 w-32">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($waktuKonsumsi as $index => $wk)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-500">{{ $index + 1 }}</td>
                                <td class="px-4 py-3 font-medium text-gray-900">{{ $wk->nama_waktu }}</td>
                                <td class="px-4 py-3 text-gray-600">
                                    <code class="bg-gray-100 px-2 py-1 rounded text-xs">{{ $wk->kode_waktu }}</code>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <span class="text-xs text-gray-400">Pre-defined</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-8 text-center text-gray-500">
                                    Belum ada data waktu konsumsi
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Info -->
        <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded">
            <p class="text-blue-700 text-sm">
                <strong>Info:</strong> Data waktu konsumsi ini adalah master data untuk form input konsumsi.
                Untuk keamanan, data ini tidak dapat diedit atau dihapus.
            </p>
        </div>
    </div>
@endsection