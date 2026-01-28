@extends('layouts.app')

@section('title', 'Master Bendahara')
@section('page-title', 'Data Bendahara')
@section('page-subtitle', 'Kelola data bendahara pengeluaran')

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
            <form method="GET" action="{{ route('master.bendahara.index') }}" class="flex flex-col md:flex-row md:items-end gap-3">
                <!-- Search -->
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Pencarian</label>
                    <input type="text" name="search" value="{{ request('search') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                        placeholder="Cari nama, NIP, jabatan...">
                </div>

                <!-- Filter Status -->
                <div class="w-full sm:w-36">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select name="status"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        <option value="">Semua</option>
                        <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ request('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>

                <!-- Actions -->
                <div class="flex flex-wrap gap-2">
                    <button type="submit" class="flex-1 sm:flex-none px-3 sm:px-4 py-1.5 sm:py-2 text-sm bg-primary text-white rounded-lg hover:bg-primary-dark transition">
                        Cari
                    </button>
                    <a href="{{ route('master.bendahara.index') }}"
                        class="flex-1 sm:flex-none px-3 sm:px-4 py-1.5 sm:py-2 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition text-center">
                        Reset
                    </a>
                    <a href="{{ route('master.bendahara.create') }}"
                        class="flex-1 sm:flex-none px-3 sm:px-4 py-1.5 sm:py-2 text-sm bg-green-600 text-white rounded-lg hover:bg-green-700 transition text-center">
                        + Tambah
                    </a>
                </div>
            </form>
        </div>

        <!-- Table Card -->
        <div class="bg-white rounded-lg border border-gray-200">
            <div class="px-4 py-3 border-b border-gray-200 flex items-center justify-between">
                <h3 class="font-semibold text-gray-900">Daftar Bendahara</h3>
                <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded">
                    {{ $bendaharas->total() }} data
                </span>
            </div>

            <!-- Desktop Table (Hidden on mobile) -->
            <div class="hidden lg:block overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 w-12">NO</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-600">NAMA</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-600">JABATAN</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-600">GOL/PANGKAT</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-600">NIP</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-600">ESELON</th>
                            <th class="px-4 py-3 text-center text-xs font-medium text-gray-600">STATUS</th>
                            <th class="px-4 py-3 text-center text-xs font-medium text-gray-600 w-32">AKSI</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($bendaharas as $index => $bendahara)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-500">{{ $bendaharas->firstItem() + $index }}</td>
                                <td class="px-4 py-3 font-medium text-gray-900">{{ $bendahara->nama }}</td>
                                <td class="px-4 py-3 text-gray-600">{{ $bendahara->jabatan ?? '-' }}</td>
                                <td class="px-4 py-3 text-gray-600">{{ $bendahara->gol_pangkat ?? '-' }}</td>
                                <td class="px-4 py-3">
                                    <code class="bg-gray-100 px-2 py-1 rounded text-xs">{{ $bendahara->nip }}</code>
                                </td>
                                <td class="px-4 py-3 text-gray-600">{{ $bendahara->eselon ?? '-' }}</td>
                                <td class="px-4 py-3 text-center">
                                    @if($bendahara->is_active)
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                            ✓ Aktif
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                                            Nonaktif
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('master.bendahara.edit', $bendahara->id) }}"
                                            class="px-3 py-1 bg-blue-50 text-blue-600 rounded hover:bg-blue-100 text-xs font-medium">
                                            Edit
                                        </a>
                                        <form action="{{ route('master.bendahara.destroy', $bendahara->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin hapus bendahara ini?')">
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
                                    Belum ada data bendahara
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Mobile Cards (Hidden on desktop) -->
            <div class="lg:hidden divide-y divide-gray-100">
                @forelse($bendaharas as $index => $bendahara)
                    <div class="p-4">
                        <div class="flex items-start justify-between mb-2">
                            <div>
                                <h4 class="font-medium text-gray-900">{{ $bendahara->nama }}</h4>
                                <code class="bg-gray-100 px-2 py-0.5 rounded text-xs">{{ $bendahara->nip }}</code>
                            </div>
                            <div class="flex items-center gap-2">
                                @if($bendahara->is_active)
                                    <span class="px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700">Aktif</span>
                                @else
                                    <span class="px-2 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600">Nonaktif</span>
                                @endif
                                <span class="text-xs text-gray-400">#{{ $bendaharas->firstItem() + $index }}</span>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-2 text-xs text-gray-600 mb-3">
                            <div>
                                <span class="text-gray-400">Jabatan:</span>
                                <p class="font-medium text-gray-700">{{ $bendahara->jabatan ?? '-' }}</p>
                            </div>
                            <div>
                                <span class="text-gray-400">Gol/Pangkat:</span>
                                <p class="font-medium text-gray-700">{{ $bendahara->gol_pangkat ?? '-' }}</p>
                            </div>
                            <div>
                                <span class="text-gray-400">Eselon:</span>
                                <p class="font-medium text-gray-700">{{ $bendahara->eselon ?? '-' }}</p>
                            </div>
                        </div>

                        <div class="flex gap-2">
                            <a href="{{ route('master.bendahara.edit', $bendahara->id) }}"
                                class="flex-1 px-3 py-1.5 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 text-xs font-medium text-center">
                                Edit
                            </a>
                            <form action="{{ route('master.bendahara.destroy', $bendahara->id) }}" method="POST" class="flex-1"
                                onsubmit="return confirm('Yakin hapus bendahara ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-full px-3 py-1.5 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 text-xs font-medium">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="p-8 text-center text-gray-500">
                        Belum ada data bendahara
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="px-4 py-3 border-t border-gray-200">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <div class="text-sm text-gray-600 text-center sm:text-left">
                        Menampilkan <span class="font-medium">{{ $bendaharas->firstItem() ?? 0 }}</span> 
                        - <span class="font-medium">{{ $bendaharas->lastItem() ?? 0 }}</span> 
                        dari <span class="font-medium">{{ $bendaharas->total() }}</span> data
                    </div>
                    @if($bendaharas->hasPages())
                        <div class="flex items-center justify-center gap-1 sm:gap-2 flex-wrap">
                            @if($bendaharas->onFirstPage())
                                <span class="px-2 sm:px-3 py-1 text-gray-400 bg-gray-100 rounded text-xs sm:text-sm cursor-not-allowed">←</span>
                            @else
                                <a href="{{ $bendaharas->previousPageUrl() }}" class="px-2 sm:px-3 py-1 bg-primary text-white rounded text-xs sm:text-sm hover:bg-primary-dark transition">←</a>
                            @endif

                            @php
                                $start = max(1, $bendaharas->currentPage() - 2);
                                $end = min($bendaharas->lastPage(), $bendaharas->currentPage() + 2);
                            @endphp
                            
                            @if($start > 1)
                                <a href="{{ $bendaharas->url(1) }}" class="px-2 sm:px-3 py-1 bg-gray-100 text-gray-700 rounded text-xs sm:text-sm hover:bg-gray-200 transition">1</a>
                                @if($start > 2)
                                    <span class="px-1 text-gray-400">...</span>
                                @endif
                            @endif

                            @for($page = $start; $page <= $end; $page++)
                                @if($page == $bendaharas->currentPage())
                                    <span class="px-2 sm:px-3 py-1 bg-primary text-white rounded text-xs sm:text-sm font-medium">{{ $page }}</span>
                                @else
                                    <a href="{{ $bendaharas->url($page) }}" class="px-2 sm:px-3 py-1 bg-gray-100 text-gray-700 rounded text-xs sm:text-sm hover:bg-gray-200 transition">{{ $page }}</a>
                                @endif
                            @endfor

                            @if($end < $bendaharas->lastPage())
                                @if($end < $bendaharas->lastPage() - 1)
                                    <span class="px-1 text-gray-400">...</span>
                                @endif
                                <a href="{{ $bendaharas->url($bendaharas->lastPage()) }}" class="px-2 sm:px-3 py-1 bg-gray-100 text-gray-700 rounded text-xs sm:text-sm hover:bg-gray-200 transition">{{ $bendaharas->lastPage() }}</a>
                            @endif

                            @if($bendaharas->hasMorePages())
                                <a href="{{ $bendaharas->nextPageUrl() }}" class="px-2 sm:px-3 py-1 bg-primary text-white rounded text-xs sm:text-sm hover:bg-primary-dark transition">→</a>
                            @else
                                <span class="px-2 sm:px-3 py-1 text-gray-400 bg-gray-100 rounded text-xs sm:text-sm cursor-not-allowed">→</span>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection