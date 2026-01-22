@extends('layouts.app')

@section('title', 'Master SBM Konsumsi')
@section('page-title', 'Master SBM Konsumsi')
@section('page-subtitle', 'Satuan Biaya Masukan - Konsumsi Rapat per Provinsi')

@section('content')
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <!-- Header -->
        <div class="px-6 py-5 border-b border-gray-200 flex items-center justify-between">
            <div>
                <h2 class="text-lg font-semibold text-gray-900">Daftar SBM Konsumsi {{ date('Y') }}</h2>
                <p class="text-sm text-gray-500 mt-0.5">{{ $sbm->count() }} data terdaftar</p>
            </div>
            <a href="{{ route('master.sbm-konsumsi.create') }}"
                class="inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-primary to-purple-600 text-white text-sm font-medium rounded-lg hover:shadow-lg transition-all">
                <span class="mr-1.5">+</span> Tambah Data
            </a>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">No
                        </th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Provinsi</th>
                        <th class="px-6 py-3.5 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Satuan</th>
                        <th class="px-6 py-3.5 text-right text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Makan</th>
                        <th class="px-6 py-3.5 text-right text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Snack</th>
                        <th class="px-6 py-3.5 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Tahun</th>
                        <th class="px-6 py-3.5 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($sbm as $item)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center justify-center w-8 h-8 bg-gray-100 text-gray-700 text-sm font-medium rounded-lg">
                                    {{ $loop->iteration }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-medium text-gray-900">{{ $item->nama_provinsi }}</div>
                                @if($item->id_provinsi == 0)
                                    <div class="text-xs text-gray-500 mt-0.5">Tingkat Menteri/Eselon I</div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-gray-600">{{ $item->satuan }}</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span
                                    class="inline-flex items-center px-3 py-1 bg-green-50 text-green-700 text-sm font-medium rounded-lg">
                                    Rp {{ number_format($item->harga_max_makan, 0, ',', '.') }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span
                                    class="inline-flex items-center px-3 py-1 bg-blue-50 text-blue-700 text-sm font-medium rounded-lg">
                                    Rp {{ number_format($item->harga_max_snack, 0, ',', '.') }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="inline-flex items-center px-3 py-1 bg-purple-50 text-purple-700 text-sm font-medium rounded-lg">
                                    {{ $item->tahun_anggaran }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('master.sbm-konsumsi.edit', $item->id) }}"
                                        class="px-3 py-1.5 bg-amber-50 text-amber-700 text-sm font-medium rounded-lg hover:bg-amber-100 transition-colors">
                                        Edit
                                    </a>
                                    <form action="{{ route('master.sbm-konsumsi.destroy', $item->id) }}" method="POST"
                                        class="inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1.5 bg-red-50 text-red-700 text-sm font-medium rounded-lg hover:bg-red-100 transition-colors">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Info -->
    <div class="mt-4 p-4 bg-blue-50 border-l-4 border-blue-500 rounded-lg">
        <p class="text-sm text-blue-700">
            <span class="font-semibold">Informasi:</span> Data SBM Konsumsi digunakan untuk validasi harga konsumsi rapat
            sesuai dengan peraturan yang berlaku.
        </p>
    </div>
@endsection