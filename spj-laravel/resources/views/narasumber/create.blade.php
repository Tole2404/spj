@extends('layouts.app')

@section('title', 'Input Narasumber')
@section('page-title', 'Input Jasa Profesi')
@section('page-subtitle', $kegiatan->nama_kegiatan)

@section('content')
<div class="max-w-4xl">
    <!-- Back Button -->
    <div class="mb-4">
        <a href="{{ route('kegiatan.pilih-detail', $kegiatan->id) }}" class="text-sm text-gray-600 hover:text-primary">
            ← Kembali ke Detail Kegiatan
        </a>
    </div>

    <div class="bg-white rounded border border-gray-200 p-4">
        <form action="{{ route('narasumber.store') }}" method="POST" id="narasumberForm">
            @csrf
            <input type="hidden" name="kegiatan_id" value="{{ $kegiatan->id }}">

            <div class="space-y-3">
                <!-- Jenis -->
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Jenis</label>
                    <select name="jenis" id="jenisSelect" required
                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-primary focus:border-primary @error('jenis') border-red-500 @enderror">
                        <option value="">-- Pilih Jenis --</option>
                        <option value="narasumber" {{ old('jenis') == 'narasumber' ? 'selected' : '' }}>Narasumber</option>
                        <option value="moderator" {{ old('jenis') == 'moderator' ? 'selected' : '' }}>Moderator</option>
                        <option value="pembawa_acara" {{ old('jenis') == 'pembawa_acara' ? 'selected' : '' }}>Pembawa Acara</option>
                        <option value="panitia" {{ old('jenis') == 'panitia' ? 'selected' : '' }}>Panitia</option>
                    </select>
                    @error('jenis')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Golongan Jabatan -->
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Golongan Jabatan</label>
                    <select name="golongan_jabatan" id="golonganSelect" required
                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-primary focus:border-primary @error('golongan_jabatan') border-red-500 @enderror">
                        <option value="">-- Pilih Golongan Jabatan --</option>
                        @foreach($sbmHonorarium as $sbm)
                            <option value="{{ $sbm->golongan_jabatan }}" 
                                    data-tarif="{{ $sbm->tarif_honorarium }}"
                                    {{ old('golongan_jabatan') == $sbm->golongan_jabatan ? 'selected' : '' }}>
                                {{ $sbm->golongan_jabatan }} (Max: Rp {{ number_format($sbm->tarif_honorarium, 0, ',', '.') }})
                            </option>
                        @endforeach
                    </select>
                    @error('golongan_jabatan')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-500 mt-1" id="tarifInfo">Tarif SBM akan ditampilkan disini</p>
                </div>

                <!-- Nama Narasumber -->
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Nama Narasumber</label>
                    <input type="text" name="nama_narasumber" id="namaNarasumber" value="{{ old('nama_narasumber') }}" required
                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-primary focus:border-primary @error('nama_narasumber') border-red-500 @enderror"
                        placeholder="Masukkan nama narasumber">
                    @error('nama_narasumber')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- NPWP (Required) -->
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">NPWP <span class="text-red-600">*</span></label>
                    <input type="text" name="npwp" id="npwpInput" value="{{ old('npwp') }}" required
                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-primary focus:border-primary @error('npwp') border-red-500 @enderror"
                        placeholder="01.234.567.8-901.000" maxlength="20">
                    @error('npwp')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tarif PPh 21 -->
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Tarif PPh 21</label>
                    <select name="tarif_pph21" id="tarifPph21Select" required
                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-primary focus:border-primary @error('tarif_pph21') border-red-500 @enderror">
                        <option value="">-- Pilih Tarif PPh 21 --</option>
                        <option value="0" {{ old('tarif_pph21') == '0' ? 'selected' : '' }}>0%</option>
                        <option value="5" {{ old('tarif_pph21', '5') == '5' ? 'selected' : '' }}>5%</option>
                        <option value="6" {{ old('tarif_pph21') == '6' ? 'selected' : '' }}>6%</option>
                        <option value="15" {{ old('tarif_pph21') == '15' ? 'selected' : '' }}>15%</option>
                    </select>
                    @error('tarif_pph21')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Honorarium Bruto -->
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Honorarium Bruto (Sebelum Pajak)</label>
                    <input type="number" name="honorarium_bruto" id="honorariumBruto" value="{{ old('honorarium_bruto') }}" required min="0"
                        class="w-full px-3 py-2 text-sm border border-gray-300 rounded focus:ring-primary focus:border-primary @error('honorarium_bruto') border-red-500 @enderror"
                        placeholder="0">
                    @error('honorarium_bruto')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-red-600 mt-1 hidden" id="errorHonorarium"></p>
                </div>

                <!-- Preview Calculation -->
                <div class="bg-gray-50 rounded p-3 text-xs space-y-1" id="previewCalculation" style="display: none;">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Honorarium Bruto:</span>
                        <span class="font-medium" id="previewBruto">Rp 0</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">PPh 21 (<span id="previewTarifPersen">0</span>%):</span>
                        <span class="font-medium text-red-600" id="previewPph21">Rp 0</span>
                    </div>
                    <div class="flex justify-between border-t border-gray-200 pt-1">
                        <span class="font-semibold text-gray-900">Honorarium Netto:</span>
                        <span class="font-bold text-primary" id="previewNetto">Rp 0</span>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end gap-2 pt-2">
                    <a href="{{ route('kegiatan.pilih-detail', $kegiatan->id) }}" 
                       class="px-4 py-2 text-sm bg-gray-100 text-gray-700 rounded hover:bg-gray-200">
                        Batal
                    </a>
                    <button type="submit" id="submitBtn"
                        class="px-4 py-2 text-sm bg-primary text-white rounded hover:bg-primary-dark disabled:opacity-50 disabled:cursor-not-allowed">
                        Simpan Narasumber
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const golonganSelect = document.getElementById('golonganSelect');
    const tarifPph21Select = document.getElementById('tarifPph21Select');
    const honorariumBrutoInput = document.getElementById('honorariumBruto');
    const submitBtn = document.getElementById('submitBtn');
    const tarifInfo = document.getElementById('tarifInfo');
    const errorHonorarium = document.getElementById('errorHonorarium');
    const previewCalculation = document.getElementById('previewCalculation');
    
    let maxTarif = 0;

    // Update tarif info when golongan changes
    golonganSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        if (selectedOption.value) {
            maxTarif = parseInt(selectedOption.dataset.tarif);
            tarifInfo.textContent = `Tarif SBM Max: Rp ${maxTarif.toLocaleString('id-ID')}`;
            tarifInfo.classList.remove('text-gray-500');
            tarifInfo.classList.add('text-primary', 'font-medium');
        } else {
            maxTarif = 0;
            tarifInfo.textContent = 'Tarif SBM akan ditampilkan disini';
            tarifInfo.classList.add('text-gray-500');
            tarifInfo.classList.remove('text-primary', 'font-medium');
        }
        validateHonorarium();
    });

    // Real-time validation & calculation
    function validateHonorarium() {
        const honorarium = parseInt(honorariumBrutoInput.value) || 0;
        const tarifPph21 = parseInt(tarifPph21Select.value) || 0;

        if (honorarium > 0 && maxTarif > 0) {
            if (honorarium > maxTarif) {
                honorariumBrutoInput.classList.add('border-red-500');
                errorHonorarium.textContent = `Melebihi tarif SBM! Max: Rp ${maxTarif.toLocaleString('id-ID')}`;
                errorHonorarium.classList.remove('hidden');
                submitBtn.disabled = true;
                previewCalculation.style.display = 'none';
            } else {
                honorariumBrutoInput.classList.remove('border-red-500');
                errorHonorarium.classList.add('hidden');
                submitBtn.disabled = false;
                
                // Calculate & show preview
                const pph21 = (honorarium * tarifPph21) / 100;
                const netto = honorarium - pph21;
                
                document.getElementById('previewBruto').textContent = `Rp ${honorarium.toLocaleString('id-ID')}`;
                document.getElementById('previewTarifPersen').textContent = tarifPph21;
                document.getElementById('previewPph21').textContent = `Rp ${pph21.toLocaleString('id-ID')}`;
                document.getElementById('previewNetto').textContent = `Rp ${netto.toLocaleString('id-ID')}`;
                previewCalculation.style.display = 'block';
            }
        } else {
            honorariumBrutoInput.classList.remove('border-red-500');
            errorHonorarium.classList.add('hidden');
            submitBtn.disabled = false;
            previewCalculation.style.display = 'none';
        }
    }

    honorariumBrutoInput.addEventListener('input', validateHonorarium);
    tarifPph21Select.addEventListener('change', validateHonorarium);
});
</script>
@endpush
@endsection
