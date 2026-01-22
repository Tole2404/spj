@extends('layouts.app')

@section('title', 'Daftar Kegiatan')
@section('page-title', 'Daftar Kegiatan')
@section('page-subtitle', 'Kelola semua kegiatan yang terdaftar')

@section('content')
    <div class="card">
        <!-- Header -->
        <div class="px-4 py-3 border-b border-gray-200 flex items-center justify-between">
            <span class="text-sm text-gray-600">{{ $kegiatans->total() }} kegiatan</span>
            <a href="{{ route('kegiatan.create') }}"
                class="px-3 py-1.5 bg-primary text-white text-sm font-medium rounded hover:bg-primary-dark">
                + Tambah
            </a>
        </div>

        <!-- Search -->
        <div class="px-4 py-3 border-b border-gray-200">
            <form action="{{ route('kegiatan.index') }}" method="GET" class="flex gap-2 flex-wrap">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kegiatan..."
                    class="px-3 py-1.5 text-sm border border-gray-300 rounded w-48 focus:ring-1 focus:ring-primary focus:border-primary">
                <select name="unor_id"
                    class="px-3 py-1.5 text-sm border border-gray-300 rounded focus:ring-1 focus:ring-primary">
                    <option value="">Semua Unor</option>
                    @foreach($unors as $unor)
                        <option value="{{ $unor->id }}" {{ request('unor_id') == $unor->id ? 'selected' : '' }}>
                            {{ $unor->nama_unor }}
                        </option>
                    @endforeach
                </select>
                <button type="submit"
                    class="px-3 py-1.5 bg-gray-100 text-gray-700 text-sm rounded hover:bg-gray-200">Cari</button>
                @if(request()->hasAny(['search', 'unor_id']))
                    <a href="{{ route('kegiatan.index') }}"
                        class="px-3 py-1.5 text-gray-500 text-sm hover:text-gray-700">Reset</a>
                @endif
            </form>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-3 py-2 text-left text-xs font-medium text-gray-600 w-10">#</th>
                        <th class="px-3 py-2 text-left text-xs font-medium text-gray-600">Kegiatan</th>
                        <th class="px-3 py-2 text-left text-xs font-medium text-gray-600">Unor / Unit Kerja</th>
                        <th class="px-3 py-2 text-center text-xs font-medium text-gray-600 w-16">Peserta</th>
                        <th class="px-3 py-2 text-left text-xs font-medium text-gray-600 w-28">Periode</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($kegiatans as $index => $kegiatan)
                        <tr class="hover:bg-teal-50 hover:border-l-4 hover:border-l-primary cursor-pointer transition-all"
                            onclick="window.location='{{ route('kegiatan.pilih-detail', $kegiatan->id) }}'">
                            <td class="px-3 py-2 text-gray-500">{{ $kegiatans->firstItem() + $index }}</td>
                            <td class="px-3 py-2">
                                <span class="font-medium text-gray-900">{{ $kegiatan->nama_kegiatan }}</span>
                            </td>
                            <td class="px-3 py-2">
                                <div class="text-gray-900">{{ $kegiatan->unor->nama_unor ?? '-' }}</div>
                                <div class="text-xs text-gray-500">{{ $kegiatan->unitKerja->nama_unit ?? '-' }}</div>
                            </td>
                            <td class="px-3 py-2 text-center font-medium">
                                {{ $kegiatan->jumlah_peserta ?? '-' }}
                            </td>
                            <td class="px-3 py-2 text-gray-600 text-xs">
                                @if($kegiatan->tanggal_mulai)
                                    {{ $kegiatan->tanggal_mulai->format('d/m/Y') }}
                                    @if($kegiatan->tanggal_selesai)
                                        <span class="text-gray-400">-</span> {{ $kegiatan->tanggal_selesai->format('d/m/Y') }}
                                    @endif
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-3 py-8 text-center text-gray-500">
                                Belum ada kegiatan
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($kegiatans->hasPages())
            <div class="px-4 py-3 border-t border-gray-200 flex items-center justify-between text-sm">
                <span class="text-gray-600">{{ $kegiatans->firstItem() }}-{{ $kegiatans->lastItem() }} /
                    {{ $kegiatans->total() }}</span>
                <div class="flex gap-1">
                    @if (!$kegiatans->onFirstPage())
                        <a href="{{ $kegiatans->previousPageUrl() }}" class="px-2 py-1 bg-gray-100 rounded hover:bg-gray-200">←</a>
                    @endif
                    @if ($kegiatans->hasMorePages())
                        <a href="{{ $kegiatans->nextPageUrl() }}" class="px-2 py-1 bg-gray-100 rounded hover:bg-gray-200">→</a>
                    @endif
                </div>
            </div>
        @endif
    </div>
@endsection