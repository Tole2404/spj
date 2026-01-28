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

        <!-- Search & Actions Card -->
        <div class="bg-white rounded-lg border border-gray-200 p-4">
            <div class="flex flex-col md:flex-row md:items-end gap-3">
                <!-- Search Form -->
                <form method="GET" action="{{ route('master.waktu-konsumsi.index') }}" class="flex flex-col sm:flex-row sm:items-end gap-3 flex-1">
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pencarian</label>
                        <input type="text" name="search" value="{{ request('search') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                            placeholder="Cari nama, kode, atau tipe...">
                    </div>
                    <div class="flex gap-2">
                        <button type="submit" class="flex-1 sm:flex-none px-3 sm:px-4 py-1.5 sm:py-2 text-sm bg-primary text-white rounded-lg hover:bg-primary-dark transition">
                            Cari
                        </button>
                        <a href="{{ route('master.waktu-konsumsi.index') }}"
                            class="flex-1 sm:flex-none px-3 sm:px-4 py-1.5 sm:py-2 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition text-center">
                            Reset
                        </a>
                    </div>
                </form>

                <!-- Toggle Add Form Button -->
                <button type="button" id="toggleAddForm"
                    class="w-full md:w-auto px-3 sm:px-4 py-1.5 sm:py-2 text-sm bg-green-600 text-white rounded-lg hover:bg-green-700 transition flex items-center justify-center gap-2">
                    <span id="toggleIcon">+</span>
                    <span id="toggleText">Tambah</span>
                </button>
            </div>
        </div>

        <!-- Inline Add Form (Hidden by default) -->
        <div id="addFormContainer" class="hidden">
            <div class="bg-green-50 rounded-lg border border-green-200 p-4">
                <form action="{{ route('master.waktu-konsumsi.store') }}" method="POST" class="flex flex-col sm:flex-row sm:items-end gap-3">
                    @csrf
                    <div class="flex-1">
                        <label for="nama_waktu" class="block text-sm font-medium text-gray-700 mb-1">
                            Nama Waktu <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nama_waktu" id="nama_waktu" value="{{ old('nama_waktu') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('nama_waktu') border-red-500 @enderror"
                            placeholder="Contoh: Makan Pagi" required>
                        @error('nama_waktu')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full sm:w-40">
                        <label for="tipe" class="block text-sm font-medium text-gray-700 mb-1">
                            Tipe <span class="text-red-500">*</span>
                        </label>
                        <select name="tipe" id="tipe"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary @error('tipe') border-red-500 @enderror"
                            required>
                            <option value="makan" {{ old('tipe') == 'makan' ? 'selected' : '' }}>Makan (WM)</option>
                            <option value="snack" {{ old('tipe') == 'snack' ? 'selected' : '' }}>Snack (WS)</option>
                        </select>
                        @error('tipe')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex gap-2 w-full sm:w-auto">
                        <button type="submit"
                            class="flex-1 sm:flex-none px-4 sm:px-6 py-1.5 sm:py-2 text-sm bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-medium">
                            Simpan
                        </button>
                        <button type="button" id="cancelAdd"
                            class="flex-1 sm:flex-none px-3 sm:px-4 py-1.5 sm:py-2 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Table Card -->
        <div class="bg-white rounded-lg border border-gray-200">
            <div class="px-4 py-3 border-b border-gray-200 flex items-center justify-between">
                <h3 class="font-semibold text-gray-900">Daftar Waktu Konsumsi</h3>
                <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded">
                    {{ $waktuKonsumsi->total() }} item
                </span>
            </div>

            <!-- Desktop Table (Hidden on mobile) -->
            <div class="hidden md:block overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 w-12">NO</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-600">KODE</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-600">NAMA WAKTU</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-600">TIPE</th>
                            <th class="px-4 py-3 text-center text-xs font-medium text-gray-600 w-40">AKSI</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($waktuKonsumsi as $index => $wk)
                            <!-- View Row -->
                            <tr class="hover:bg-gray-50" id="viewRow{{ $wk->id }}">
                                <td class="px-4 py-3 text-gray-500">{{ $waktuKonsumsi->firstItem() + $index }}</td>
                                <td class="px-4 py-3 text-gray-600">
                                    <code class="bg-blue-50 text-blue-700 px-2 py-1 rounded text-xs font-medium">{{ $wk->kode_waktu }}</code>
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-900">{{ $wk->nama_waktu }}</td>
                                <td class="px-4 py-3">
                                    @if($wk->tipe == 'makan')
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                            🍽️ Makan
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-700">
                                            🍪 Snack
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-center gap-2">
                                        <button type="button" onclick="showEditRow({{ $wk->id }})"
                                            class="px-3 py-1 bg-blue-50 text-blue-600 rounded hover:bg-blue-100 text-xs font-medium">
                                            Edit
                                        </button>
                                        <form action="{{ route('master.waktu-konsumsi.destroy', $wk->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin hapus waktu konsumsi ini?')">
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
                            <!-- Edit Row (Hidden by default) -->
                            <tr class="bg-yellow-50 hidden" id="editRow{{ $wk->id }}">
                                <td class="px-4 py-3 text-gray-500">{{ $waktuKonsumsi->firstItem() + $index }}</td>
                                <td colspan="4" class="px-4 py-3">
                                    <form action="{{ route('master.waktu-konsumsi.update', $wk->id) }}" method="POST" class="flex items-center gap-3">
                                        @csrf
                                        @method('PUT')
                                        <code class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-xs">{{ $wk->kode_waktu }}</code>
                                        <input type="text" name="nama_waktu" value="{{ $wk->nama_waktu }}"
                                            class="flex-1 px-3 py-1.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary text-sm"
                                            placeholder="Nama Waktu" required>
                                        <select name="tipe"
                                            class="w-32 px-3 py-1.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary text-sm"
                                            required>
                                            <option value="makan" {{ $wk->tipe == 'makan' ? 'selected' : '' }}>Makan</option>
                                            <option value="snack" {{ $wk->tipe == 'snack' ? 'selected' : '' }}>Snack</option>
                                        </select>
                                        <button type="submit"
                                            class="px-4 py-1.5 bg-green-600 text-white rounded-lg hover:bg-green-700 text-xs font-medium">
                                            Simpan
                                        </button>
                                        <button type="button" onclick="hideEditRow({{ $wk->id }})"
                                            class="px-4 py-1.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 text-xs font-medium">
                                            Batal
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-8 text-center text-gray-500">
                                    Belum ada data waktu konsumsi
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Mobile Cards (Hidden on desktop) -->
            <div class="md:hidden divide-y divide-gray-100">
                @forelse($waktuKonsumsi as $index => $wk)
                    <!-- View Card -->
                    <div class="p-4" id="viewCard{{ $wk->id }}">
                        <div class="flex items-start justify-between mb-3">
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <code class="bg-blue-50 text-blue-700 px-2 py-1 rounded text-xs font-medium">{{ $wk->kode_waktu }}</code>
                                    @if($wk->tipe == 'makan')
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                            🍽️ Makan
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-700">
                                            🍪 Snack
                                        </span>
                                    @endif
                                </div>
                                <h4 class="font-medium text-gray-900">{{ $wk->nama_waktu }}</h4>
                            </div>
                            <span class="text-xs text-gray-400">#{{ $waktuKonsumsi->firstItem() + $index }}</span>
                        </div>
                        <div class="flex gap-2">
                            <button type="button" onclick="showEditCard({{ $wk->id }})"
                                class="flex-1 px-3 py-1.5 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 text-xs font-medium text-center">
                                Edit
                            </button>
                            <form action="{{ route('master.waktu-konsumsi.destroy', $wk->id) }}" method="POST" class="flex-1"
                                onsubmit="return confirm('Yakin hapus waktu konsumsi ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-full px-3 py-1.5 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 text-xs font-medium">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- Edit Card (Hidden by default) -->
                    <div class="p-4 bg-yellow-50 hidden" id="editCard{{ $wk->id }}">
                        <form action="{{ route('master.waktu-konsumsi.update', $wk->id) }}" method="POST" class="space-y-3">
                            @csrf
                            @method('PUT')
                            <div class="flex items-center justify-between">
                                <code class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-xs">{{ $wk->kode_waktu }}</code>
                                <span class="text-xs text-gray-400">#{{ $waktuKonsumsi->firstItem() + $index }}</span>
                            </div>
                            <input type="text" name="nama_waktu" value="{{ $wk->nama_waktu }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary text-sm"
                                placeholder="Nama Waktu" required>
                            <select name="tipe"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary text-sm"
                                required>
                                <option value="makan" {{ $wk->tipe == 'makan' ? 'selected' : '' }}>Makan (WM)</option>
                                <option value="snack" {{ $wk->tipe == 'snack' ? 'selected' : '' }}>Snack (WS)</option>
                            </select>
                            <div class="flex gap-2">
                                <button type="submit"
                                    class="flex-1 px-3 py-1.5 bg-green-600 text-white rounded-lg hover:bg-green-700 text-xs font-medium">
                                    Simpan
                                </button>
                                <button type="button" onclick="hideEditCard({{ $wk->id }})"
                                    class="flex-1 px-3 py-1.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 text-xs font-medium">
                                    Batal
                                </button>
                            </div>
                        </form>
                    </div>
                @empty
                    <div class="p-8 text-center text-gray-500">
                        Belum ada data waktu konsumsi
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="px-4 py-3 border-t border-gray-200">
                <!-- Mobile: stacked layout -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <div class="text-sm text-gray-600 text-center sm:text-left">
                        Menampilkan <span class="font-medium">{{ $waktuKonsumsi->firstItem() ?? 0 }}</span> 
                        - <span class="font-medium">{{ $waktuKonsumsi->lastItem() ?? 0 }}</span> 
                        dari <span class="font-medium">{{ $waktuKonsumsi->total() }}</span> data
                    </div>
                    @if($waktuKonsumsi->hasPages())
                        <div class="flex items-center justify-center gap-1 sm:gap-2 flex-wrap">
                            {{-- Previous --}}
                            @if($waktuKonsumsi->onFirstPage())
                                <span class="px-2 sm:px-3 py-1 text-gray-400 bg-gray-100 rounded text-xs sm:text-sm cursor-not-allowed">←</span>
                            @else
                                <a href="{{ $waktuKonsumsi->previousPageUrl() }}" class="px-2 sm:px-3 py-1 bg-primary text-white rounded text-xs sm:text-sm hover:bg-primary-dark transition">←</a>
                            @endif

                            {{-- Page Numbers --}}
                            @foreach($waktuKonsumsi->getUrlRange(1, $waktuKonsumsi->lastPage()) as $page => $url)
                                @if($page == $waktuKonsumsi->currentPage())
                                    <span class="px-2 sm:px-3 py-1 bg-primary text-white rounded text-xs sm:text-sm font-medium">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}" class="px-2 sm:px-3 py-1 bg-gray-100 text-gray-700 rounded text-xs sm:text-sm hover:bg-gray-200 transition">{{ $page }}</a>
                                @endif
                            @endforeach

                            {{-- Next --}}
                            @if($waktuKonsumsi->hasMorePages())
                                <a href="{{ $waktuKonsumsi->nextPageUrl() }}" class="px-2 sm:px-3 py-1 bg-primary text-white rounded text-xs sm:text-sm hover:bg-primary-dark transition">→</a>
                            @else
                                <span class="px-2 sm:px-3 py-1 text-gray-400 bg-gray-100 rounded text-xs sm:text-sm cursor-not-allowed">→</span>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Toggle Add Form
        const toggleBtn = document.getElementById('toggleAddForm');
        const addFormContainer = document.getElementById('addFormContainer');
        const toggleIcon = document.getElementById('toggleIcon');
        const toggleText = document.getElementById('toggleText');
        const cancelAddBtn = document.getElementById('cancelAdd');

        function showAddForm() {
            addFormContainer.classList.remove('hidden');
            toggleIcon.textContent = '−';
            toggleText.textContent = 'Tutup';
            toggleBtn.classList.remove('bg-green-600', 'hover:bg-green-700');
            toggleBtn.classList.add('bg-gray-600', 'hover:bg-gray-700');
        }

        function hideAddForm() {
            addFormContainer.classList.add('hidden');
            toggleIcon.textContent = '+';
            toggleText.textContent = 'Tambah';
            toggleBtn.classList.remove('bg-gray-600', 'hover:bg-gray-700');
            toggleBtn.classList.add('bg-green-600', 'hover:bg-green-700');
        }

        toggleBtn.addEventListener('click', function() {
            if (addFormContainer.classList.contains('hidden')) {
                showAddForm();
            } else {
                hideAddForm();
            }
        });

        cancelAddBtn.addEventListener('click', hideAddForm);

        // Desktop: Inline Edit Functions
        function showEditRow(id) {
            document.getElementById('viewRow' + id).classList.add('hidden');
            document.getElementById('editRow' + id).classList.remove('hidden');
        }

        function hideEditRow(id) {
            document.getElementById('editRow' + id).classList.add('hidden');
            document.getElementById('viewRow' + id).classList.remove('hidden');
        }

        // Mobile: Card Edit Functions
        function showEditCard(id) {
            document.getElementById('viewCard' + id).classList.add('hidden');
            document.getElementById('editCard' + id).classList.remove('hidden');
        }

        function hideEditCard(id) {
            document.getElementById('editCard' + id).classList.add('hidden');
            document.getElementById('viewCard' + id).classList.remove('hidden');
        }

        // Show add form if there are validation errors
        @if($errors->any())
            showAddForm();
        @endif
    </script>
    @endpush
@endsection