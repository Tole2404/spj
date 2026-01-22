@extends('layouts.app')

@section('title', 'Edit User')
@section('page-title', 'Edit User')
@section('page-subtitle', 'Form edit user')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-lg border border-gray-200 p-6">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nama -->
            <div class="mb-4">
                <label class="form-label">Nama <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                    class="form-input @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label class="form-label">Email <span class="text-red-500">*</span></label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                    class="form-input @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password (Optional) -->
            <div class="mb-4">
                <label class="form-label">Password <span class="text-gray-400">(isi jika ingin ganti)</span></label>
                <input type="password" name="password"
                    class="form-input @error('password') border-red-500 @enderror"
                    placeholder="Minimal 8 karakter">
                <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah password</p>
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Confirmation -->
            <div class="mb-4">
                <label class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation"
                    class="form-input"
                    placeholder="Ketik ulang password baru">
            </div>

            <!-- Role -->
            <div class="mb-4">
                <label class="form-label">Role <span class="text-red-500">*</span></label>
                <select name="role" required
                    class="form-input @error('role') border-red-500 @enderror"
                    {{ Auth::user()->role === 'admin' ? 'disabled' : '' }}>
                    <option value="">Pilih Role</option>
                    <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                    @if(Auth::user()->role === 'super_admin')
                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="super_admin" {{ old('role', $user->role) == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                    @endif
                </select>
                @if(Auth::user()->role === 'admin')
                    <input type="hidden" name="role" value="{{ $user->role }}">
                    <p class="text-xs text-gray-500 mt-1">Admin tidak dapat mengubah role</p>
                @endif
                @error('role')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div class="mb-4">
                <label class="form-label">Status <span class="text-red-500">*</span></label>
                <select name="status" required
                    class="form-input @error('status') border-red-500 @enderror"
                    {{ Auth::user()->role === 'admin' ? 'disabled' : '' }}>
                    <option value="active" {{ old('status', $user->status) == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="suspended" {{ old('status', $user->status) == 'suspended' ? 'selected' : '' }}>Suspended</option>
                </select>
                @if(Auth::user()->role === 'admin')
                    <input type="hidden" name="status" value="{{ $user->status }}">
                    <p class="text-xs text-gray-500 mt-1">Hanya Super Admin yang bisa mengubah status</p>
                @endif
                @error('status')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
                <button type="submit"
                    class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition">
                    Update User
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
