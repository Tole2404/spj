@extends('layouts.app')

@section('title', $title)
@section('page-title', $title)
@section('page-subtitle', 'Halaman ini sedang dalam pengembangan')

@section('content')
    <div class="card">
        <div class="card-body text-center py-5">
            <i class="bi bi-tools display-1 text-muted mb-3"></i>
            <h3 class="mb-3">{{ $title }}</h3>
            <p class="text-muted mb-4">Halaman ini masih dalam tahap pengembangan.</p>
            <a href="{{ route('home') }}" class="btn btn-primary">
                <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
            </a>
        </div>
    </div>
@endsection