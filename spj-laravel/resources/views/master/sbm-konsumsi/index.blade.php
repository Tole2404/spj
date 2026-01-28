@extends('layouts.app')

@section('title', 'Master SBM Konsumsi')
@section('page-title', 'Master SBM Konsumsi')
@section('page-subtitle', 'Satuan Biaya Masukan - Konsumsi Rapat per Provinsi')

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
            <form method="GET" action="{{ route('master.sbm-konsumsi.index') }}" class="flex flex-col md:flex-row md:items-end gap-3">
                <!-- Search -->
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Pencarian</label>
                    <input type="text" name="search" value="{{ request('search') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                        placeholder="Cari provinsi...">
                </div>

                <!-- Actions -->
                <div class="flex flex-wrap gap-2">
                    <button type="submit" class="flex-1 sm:flex-none px-3 sm:px-4 py-1.5 sm:py-2 text-sm bg-primary text-white rounded-lg hover:bg-primary-dark transition">
                        Cari
                    </button>
                    <a href="{{ route('master.sbm-konsumsi.index') }}"
                        class="flex-1 sm:flex-none px-3 sm:px-4 py-1.5 sm:py-2 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition text-center">
                        Reset
                    </a>
                    <a href="{{ route('master.sbm-konsumsi.create') }}"
                        class="flex-1 sm:flex-none px-3 sm:px-4 py-1.5 sm:py-2 text-sm bg-green-600 text-white rounded-lg hover:bg-green-700 transition text-center">
                        + Tambah
                    </a>
                </div>
            </form>
        </div>

        <!-- Table Card -->
        <div class="bg-white rounded-lg border border-gray-200">
            <div class="px-4 py-3 border-b border-gray-200 flex items-center justify-between">
                <h3 class="font-semibold text-gray-900">Daftar SBM Konsumsi</h3>
                <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded">
                    {{ $sbm->total() }} data
                </span>
            </div>

            <!-- Desktop Table (Hidden on mobile) -->
            <div class="hidden lg:block overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 w-12">NO</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-600">PROVINSI</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-600">SATUAN</th>
                            <th class="px-4 py-3 text-right text-xs font-medium text-gray-600">MAKAN</th>
                            <th class="px-4 py-3 text-right text-xs font-medium text-gray-600">SNACK</th>
                            <th class="px-4 py-3 text-center text-xs font-medium text-gray-600">TAHUN</th>
                            <th class="px-4 py-3 text-center text-xs font-medium text-gray-600 w-32">AKSI</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($sbm as $index => $item)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-500">{{ $sbm->firstItem() + $index }}</td>
                                <td class="px-4 py-3">
                                    <div class="font-medium text-gray-900">{{ $item->nama_provinsi }}</div>
                                    @if($item->id_provinsi == 0)
                                        <div class="text-xs text-gray-500">Tingkat Menteri/Eselon I</div>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-gray-600">{{ $item->satuan }}</td>
                                <td class="px-4 py-3 text-right">
                                    <span class="inline-flex items-center px-2 py-1 bg-green-100 text-green-700 text-xs font-medium rounded">
                                        Rp {{ number_format($item->harga_max_makan, 0, ',', '.') }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <span class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded">
                                        Rp {{ number_format($item->harga_max_snack, 0, ',', '.') }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <span class="inline-flex items-center px-2 py-1 bg-purple-100 text-purple-700 text-xs font-medium rounded">
                                        {{ $item->tahun_anggaran }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('master.sbm-konsumsi.edit', $item->id) }}"
                                            class="px-3 py-1 bg-blue-50 text-blue-600 rounded hover:bg-blue-100 text-xs font-medium">
                                            Edit
                                        </a>
                                        <form action="{{ route('master.sbm-konsumsi.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin hapus data ini?')">
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
                                <td colspan="7" class="px-4 py-8 text-center text-gray-500">
                                    Belum ada data SBM Konsumsi
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Mobile Cards (Hidden on desktop) -->
            <div class="lg:hidden divide-y divide-gray-100">
                @forelse($sbm as $index => $item)
                    <div class="p-4">
                        <div class="flex items-start justify-between mb-2">
                            <div>
                                <h4 class="font-medium text-gray-900">{{ $item->nama_provinsi }}</h4>
                                @if($item->id_provinsi == 0)
                                    <p class="text-xs text-gray-500">Tingkat Menteri/Eselon I</p>
                                @endif
                                <p class="text-xs text-gray-600">{{ $item->satuan }}</p>
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="px-2 py-0.5 bg-purple-100 text-purple-700 rounded text-xs font-medium">{{ $item->tahun_anggaran }}</span>
                                <span class="text-xs text-gray-400">#{{ $sbm->firstItem() + $index }}</span>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-2 text-xs mb-3">
                            <div>
                                <span class="text-gray-400">Makan:</span>
                                <p class="font-medium text-green-700">Rp {{ number_format($item->harga_max_makan, 0, ',', '.') }}</p>
                            </div>
                            <div>
                                <span class="text-gray-400">Snack:</span>
                                <p class="font-medium text-blue-700">Rp {{ number_format($item->harga_max_snack, 0, ',', '.') }}</p>
                            </div>
                        </div>

                        <div class="flex gap-2">
                            <a href="{{ route('master.sbm-konsumsi.edit', $item->id) }}"
                                class="flex-1 px-3 py-1.5 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 text-xs font-medium text-center">
                                Edit
                            </a>
                            <form action="{{ route('master.sbm-konsumsi.destroy', $item->id) }}" method="POST" class="flex-1"
                                onsubmit="return confirm('Yakin hapus data ini?')">
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
                        Belum ada data SBM Konsumsi
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="px-4 py-3 border-t border-gray-200">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <div class="text-sm text-gray-600 text-center sm:text-left">
                        Menampilkan <span class="font-medium">{{ $sbm->firstItem() ?? 0 }}</span> 
                        - <span class="font-medium">{{ $sbm->lastItem() ?? 0 }}</span> 
                        dari <span class="font-medium">{{ $sbm->total() }}</span> data
                    </div>
                    @if($sbm->hasPages())
                        <div class="flex items-center justify-center gap-1 sm:gap-2 flex-wrap">
                            @if($sbm->onFirstPage())
                                <span class="px-2 sm:px-3 py-1 text-gray-400 bg-gray-100 rounded text-xs sm:text-sm cursor-not-allowed">←</span>
                            @else
                                <a href="{{ $sbm->previousPageUrl() }}" class="px-2 sm:px-3 py-1 bg-primary text-white rounded text-xs sm:text-sm hover:bg-primary-dark transition">←</a>
                            @endif

                            @php
                                $start = max(1, $sbm->currentPage() - 2);
                                $end = min($sbm->lastPage(), $sbm->currentPage() + 2);
                            @endphp
                            
                            @if($start > 1)
                                <a href="{{ $sbm->url(1) }}" class="px-2 sm:px-3 py-1 bg-gray-100 text-gray-700 rounded text-xs sm:text-sm hover:bg-gray-200 transition">1</a>
                                @if($start > 2)
                                    <span class="px-1 text-gray-400">...</span>
                                @endif
                            @endif

                            @for($page = $start; $page <= $end; $page++)
                                @if($page == $sbm->currentPage())
                                    <span class="px-2 sm:px-3 py-1 bg-primary text-white rounded text-xs sm:text-sm font-medium">{{ $page }}</span>
                                @else
                                    <a href="{{ $sbm->url($page) }}" class="px-2 sm:px-3 py-1 bg-gray-100 text-gray-700 rounded text-xs sm:text-sm hover:bg-gray-200 transition">{{ $page }}</a>
                                @endif
                            @endfor

                            @if($end < $sbm->lastPage())
                                @if($end < $sbm->lastPage() - 1)
                                    <span class="px-1 text-gray-400">...</span>
                                @endif
                                <a href="{{ $sbm->url($sbm->lastPage()) }}" class="px-2 sm:px-3 py-1 bg-gray-100 text-gray-700 rounded text-xs sm:text-sm hover:bg-gray-200 transition">{{ $sbm->lastPage() }}</a>
                            @endif

                            @if($sbm->hasMorePages())
                                <a href="{{ $sbm->nextPageUrl() }}" class="px-2 sm:px-3 py-1 bg-primary text-white rounded text-xs sm:text-sm hover:bg-primary-dark transition">→</a>
                            @else
                                <span class="px-2 sm:px-3 py-1 text-gray-400 bg-gray-100 rounded text-xs sm:text-sm cursor-not-allowed">→</span>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Info -->
        <div class="p-4 bg-blue-50 border-l-4 border-blue-500 rounded-lg">
            <p class="text-sm text-blue-700">
                <span class="font-semibold">Informasi:</span> Data SBM Konsumsi digunakan untuk validasi harga konsumsi rapat sesuai dengan peraturan yang berlaku.
            </p>
        </div>
    </div>
@endsection