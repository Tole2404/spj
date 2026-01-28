@extends('layouts.app')

@section('title', 'SBM Honorarium')
@section('page-title', 'SBM Honorarium Narasumber')
@section('page-subtitle', 'Manage Tarif SBM Honorarium')

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
        <form method="GET" action="{{ route('master.sbm-honorarium.index') }}" class="flex flex-col md:flex-row md:items-end gap-3">
            <!-- Search -->
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Pencarian</label>
                <input type="text" name="search" value="{{ request('search') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                    placeholder="Cari golongan jabatan...">
            </div>

            <!-- Actions -->
            <div class="flex flex-wrap gap-2">
                <button type="submit" class="flex-1 sm:flex-none px-3 sm:px-4 py-1.5 sm:py-2 text-sm bg-primary text-white rounded-lg hover:bg-primary-dark transition">
                    Cari
                </button>
                <a href="{{ route('master.sbm-honorarium.index') }}"
                    class="flex-1 sm:flex-none px-3 sm:px-4 py-1.5 sm:py-2 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition text-center">
                    Reset
                </a>
                <a href="{{ route('master.sbm-honorarium.create') }}"
                    class="flex-1 sm:flex-none px-3 sm:px-4 py-1.5 sm:py-2 text-sm bg-green-600 text-white rounded-lg hover:bg-green-700 transition text-center">
                    + Tambah
                </a>
            </div>
        </form>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-lg border border-gray-200">
        <div class="px-4 py-3 border-b border-gray-200 flex items-center justify-between">
            <div>
                <h3 class="font-semibold text-gray-900">Daftar Tarif SBM Honorarium</h3>
                <p class="text-xs text-gray-500">Tahun Anggaran {{ date('Y') }}</p>
            </div>
            <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded">
                {{ $sbmHonorarium->total() }} data
            </span>
        </div>

        <!-- Desktop Table (Hidden on mobile) -->
        <div class="hidden lg:block overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 w-12">NO</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600">GOLONGAN JABATAN</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600">KETERANGAN</th>
                        <th class="px-4 py-3 text-right text-xs font-medium text-gray-600">TARIF HONORARIUM</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-600">TAHUN</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-600 w-32">AKSI</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($sbmHonorarium as $index => $sbm)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-gray-500">{{ $sbmHonorarium->firstItem() + $index }}</td>
                            <td class="px-4 py-3 font-medium text-gray-900">{{ $sbm->golongan_jabatan }}</td>
                            <td class="px-4 py-3 text-gray-600 text-xs">{{ $sbm->keterangan ?? '-' }}</td>
                            <td class="px-4 py-3 text-right">
                                <span class="inline-flex items-center px-2 py-1 bg-green-100 text-green-700 text-xs font-medium rounded">
                                    Rp {{ number_format($sbm->tarif_honorarium, 0, ',', '.') }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <span class="inline-flex items-center px-2 py-1 bg-purple-100 text-purple-700 text-xs font-medium rounded">
                                    {{ $sbm->tahun_anggaran }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('master.sbm-honorarium.edit', $sbm->id) }}"
                                        class="px-3 py-1 bg-blue-50 text-blue-600 rounded hover:bg-blue-100 text-xs font-medium">
                                        Edit
                                    </a>
                                    <form action="{{ route('master.sbm-honorarium.destroy', $sbm->id) }}" method="POST"
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
                            <td colspan="6" class="px-4 py-8 text-center text-gray-500">
                                Belum ada data SBM Honorarium
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Mobile Cards (Hidden on desktop) -->
        <div class="lg:hidden divide-y divide-gray-100">
            @forelse($sbmHonorarium as $index => $sbm)
                <div class="p-4">
                    <div class="flex items-start justify-between mb-2">
                        <div>
                            <h4 class="font-medium text-gray-900">{{ $sbm->golongan_jabatan }}</h4>
                            <p class="text-xs text-gray-500">{{ $sbm->keterangan ?? '-' }}</p>
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="px-2 py-0.5 bg-purple-100 text-purple-700 rounded text-xs font-medium">{{ $sbm->tahun_anggaran }}</span>
                            <span class="text-xs text-gray-400">#{{ $sbmHonorarium->firstItem() + $index }}</span>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <span class="text-xs text-gray-400">Tarif Honorarium:</span>
                        <p class="font-semibold text-green-700">Rp {{ number_format($sbm->tarif_honorarium, 0, ',', '.') }}</p>
                    </div>

                    <div class="flex gap-2">
                        <a href="{{ route('master.sbm-honorarium.edit', $sbm->id) }}"
                            class="flex-1 px-3 py-1.5 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 text-xs font-medium text-center">
                            Edit
                        </a>
                        <form action="{{ route('master.sbm-honorarium.destroy', $sbm->id) }}" method="POST" class="flex-1"
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
                    Belum ada data SBM Honorarium
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="px-4 py-3 border-t border-gray-200">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <div class="text-sm text-gray-600 text-center sm:text-left">
                    Menampilkan <span class="font-medium">{{ $sbmHonorarium->firstItem() ?? 0 }}</span> 
                    - <span class="font-medium">{{ $sbmHonorarium->lastItem() ?? 0 }}</span> 
                    dari <span class="font-medium">{{ $sbmHonorarium->total() }}</span> data
                </div>
                @if($sbmHonorarium->hasPages())
                    <div class="flex items-center justify-center gap-1 sm:gap-2 flex-wrap">
                        @if($sbmHonorarium->onFirstPage())
                            <span class="px-2 sm:px-3 py-1 text-gray-400 bg-gray-100 rounded text-xs sm:text-sm cursor-not-allowed">←</span>
                        @else
                            <a href="{{ $sbmHonorarium->previousPageUrl() }}" class="px-2 sm:px-3 py-1 bg-primary text-white rounded text-xs sm:text-sm hover:bg-primary-dark transition">←</a>
                        @endif

                        @php
                            $start = max(1, $sbmHonorarium->currentPage() - 2);
                            $end = min($sbmHonorarium->lastPage(), $sbmHonorarium->currentPage() + 2);
                        @endphp
                        
                        @if($start > 1)
                            <a href="{{ $sbmHonorarium->url(1) }}" class="px-2 sm:px-3 py-1 bg-gray-100 text-gray-700 rounded text-xs sm:text-sm hover:bg-gray-200 transition">1</a>
                            @if($start > 2)
                                <span class="px-1 text-gray-400">...</span>
                            @endif
                        @endif

                        @for($page = $start; $page <= $end; $page++)
                            @if($page == $sbmHonorarium->currentPage())
                                <span class="px-2 sm:px-3 py-1 bg-primary text-white rounded text-xs sm:text-sm font-medium">{{ $page }}</span>
                            @else
                                <a href="{{ $sbmHonorarium->url($page) }}" class="px-2 sm:px-3 py-1 bg-gray-100 text-gray-700 rounded text-xs sm:text-sm hover:bg-gray-200 transition">{{ $page }}</a>
                            @endif
                        @endfor

                        @if($end < $sbmHonorarium->lastPage())
                            @if($end < $sbmHonorarium->lastPage() - 1)
                                <span class="px-1 text-gray-400">...</span>
                            @endif
                            <a href="{{ $sbmHonorarium->url($sbmHonorarium->lastPage()) }}" class="px-2 sm:px-3 py-1 bg-gray-100 text-gray-700 rounded text-xs sm:text-sm hover:bg-gray-200 transition">{{ $sbmHonorarium->lastPage() }}</a>
                        @endif

                        @if($sbmHonorarium->hasMorePages())
                            <a href="{{ $sbmHonorarium->nextPageUrl() }}" class="px-2 sm:px-3 py-1 bg-primary text-white rounded text-xs sm:text-sm hover:bg-primary-dark transition">→</a>
                        @else
                            <span class="px-2 sm:px-3 py-1 text-gray-400 bg-gray-100 rounded text-xs sm:text-sm cursor-not-allowed">→</span>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <!-- Notes Section -->
        <div class="px-4 py-3 bg-gray-50 border-t border-gray-200">
            <p class="text-xs font-semibold text-gray-700 mb-1">Catatan:</p>
            <ul class="list-disc list-inside text-xs text-gray-600 space-y-0.5">
                <li>Tarif SBM digunakan sebagai <strong>batas maksimal</strong> honorarium yang dapat diinput</li>
                <li>Perubahan tarif akan langsung berlaku untuk input narasumber selanjutnya</li>
            </ul>
        </div>
    </div>
</div>
@endsection
