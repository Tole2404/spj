@extends('layouts.app')

@section('title', 'Tambah User')
@section('page-title', 'Tambah User')
@section('page-subtitle', 'Form tambah user baru')

@section('content')
    <div class="max-w-2xl">
        <div class="bg-white rounded-lg border border-gray-200 p-6">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <!-- Nama -->
                <div class="mb-4">
                    <label class="form-label">Nama <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="form-input @error('name') border-red-500 @enderror" placeholder="Contoh: John Doe">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label class="form-label">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="form-input @error('email') border-red-500 @enderror" placeholder="Contoh: john@spj.go.id">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label class="form-label">Password <span class="text-red-500">*</span></label>
                    <input type="password" name="password" required
                        class="form-input @error('password') border-red-500 @enderror" placeholder="Minimal 8 karakter">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Confirmation -->
                <div class="mb-4">
                    <label class="form-label">Konfirmasi Password <span class="text-red-500">*</span></label>
                    <input type="password" name="password_confirmation" required class="form-input"
                        placeholder="Ketik ulang password">
                </div>

                <!-- Role -->
                <div class="mb-4">
                    <label class="form-label">Role <span class="text-red-500">*</span></label>
                    <select name="role" required class="form-input @error('role') border-red-500 @enderror">
                        <option value="">Pilih Role</option>
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                        @if(Auth::user()->role === 'super_admin')
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="super_admin" {{ old('role') == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                        @endif
                    </select>
                    @error('role')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    @if(Auth::user()->role === 'admin')
                        <p class="text-xs text-gray-500 mt-1">Admin hanya bisa membuat user biasa</p>
                    @endif
                </div>

                <!-- Status -->
                <div class="mb-4">
                    <label class="form-label">Status <span class="text-red-500">*</span></label>
                    <select name="status" required class="form-input @error('status') border-red-500 @enderror">
                        <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="suspended" {{ old('status') == 'suspended' ? 'selected' : '' }}>Suspended</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
                    <button type="submit"
                        class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition">
                        Simpan User
                    </button>
                    <a href="{{ route('users.index') }}"
                        class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection