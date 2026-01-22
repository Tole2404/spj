@extends('layouts.app')

@section('title', 'SBM Honorarium')
@section('page-title', 'SBM Honorarium Narasumber')
@section('page-subtitle', 'Manage Tarif SBM (Super Admin Only)')

@section('content')
<div class="max-w-6xl">
    @if(session('success'))
        <div class="mb-4 px-4 py-3 bg-green-50 border border-green-200 text-green-800 rounded text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded border border-gray-200">
        <div class="px-4 py-3 border-b border-gray-200">
            <h3 class="text-sm font-semibold text-gray-900">Daftar Tarif SBM Honorarium</h3>
            <p class="text-xs text-gray-500 mt-1">10 Golongan Jabatan • Tahun Anggaran 2024</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600">No</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600">Golongan Jabatan</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-600">Keterangan</th>
                        <th class="px-4 py-3 text-right text-xs font-medium text-gray-600">Tarif Honorarium</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-600 w-24">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($sbmHonorarium as $index => $sbm)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-gray-900">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 font-medium text-gray-900">{{ $sbm->golongan_jabatan }}</td>
                            <td class="px-4 py-3 text-gray-600 text-xs">{{ $sbm->keterangan }}</td>
                            <td class="px-4 py-3 text-right">
                                <form action="{{ route('master.sbm-honorarium.update', $sbm->id) }}" method="POST" class="flex items-center justify-end gap-2">
                                    @csrf
                                    @method('PUT')
                                    <span class="text-gray-600">Rp</span>
                                    <input type="number" name="tarif_honorarium" value="{{ $sbm->tarif_honorarium }}" required min="0" 
                                        class="w-32 px-2 py-1 text-sm text-right border border-gray-300 rounded focus:ring-primary focus:border-primary"
                                        id="tarif_{{ $sbm->id }}">
                                    <button type="submit" class="px-3 py-1 text-xs bg-primary text-white rounded hover:bg-primary-dark">
                                        Update
                                    </button>
                                </form>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <span class="inline-block px-2 py-1 text-xs bg-primary bg-opacity-10 text-primary rounded">
                                    Rp {{ number_format($sbm->tarif_honorarium, 0, ',', '.') }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="px-4 py-3 bg-gray-50 border-t border-gray-200 text-xs text-gray-600">
            <p><strong>Catatan:</strong></p>
            <ul class="list-disc list-inside mt-1 space-y-1">
                <li>Tarif SBM digunakan sebagai <strong>batas maksimal</strong> honorarium yang dapat diinput</li>
                <li>Perubahan tarif akan langsung berlaku untuk input narasumber selanjutnya</li>
                <li>Update tarif hanya dapat dilakukan oleh Super Admin</li>
            </ul>
        </div>
    </div>
</div>
@endsection
