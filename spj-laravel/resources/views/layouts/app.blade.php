<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SPJ Laravel')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: '#14b8a6',
                            dark: '#0f766e',
                            light: '#2dd4bf',
                        }
                    }
                }
            }
        }
    </script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }
    </style>

    @stack('styles')
</head>

<body class="bg-white flex flex-col min-h-screen">
    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 bg-primary z-50">
        <!-- Top Bar: Brand + User -->
        <div class="border-b border-teal-600">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="flex items-center justify-between h-14">
                    <!-- Brand -->
                    <a href="{{ route('home') }}" class="flex items-center space-x-2">
                        <div class="w-7 h-7 bg-white rounded flex items-center justify-center">
                            <span class="text-primary font-bold text-sm">S</span>
                        </div>
                        <span class="text-white font-bold text-lg">SPJ Laravel</span>
                    </a>

                    <!-- User Info -->
                    @auth
                        <div class="flex items-center space-x-4">
                            <div class="text-right hidden md:block">
                                <div class="text-white text-sm font-medium">{{ Auth::user()->name }}</div>
                                <div class="text-teal-200 text-xs">{{ ucfirst(Auth::user()->role) }}</div>
                            </div>
                            <div class="w-9 h-9 rounded-full bg-white flex items-center justify-center">
                                <span class="text-primary font-bold text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-white hover:text-teal-200 transition text-sm">
                                    Logout
                                </button>
                            </form>
                        </div>
                    @endauth
                </div>
            </div>
        </div>

        <!-- Menu Bar -->
        <div class="bg-white border-b border-gray-200">
            <div class="container mx-auto px-6 lg:px-12">
                <div class="flex items-center justify-center space-x-6 h-12">
                    <!-- Dashboard -->
                    <a href="{{ route('home') }}"
                        class="flex items-center px-4 py-2 text-sm font-medium transition-colors {{ request()->routeIs('home') ? 'text-primary border-b-2 border-primary' : 'text-gray-600 hover:text-primary' }}">
                        Dashboard
                    </a>

                    <!-- Master Dropdown (Admin + Super Admin only) -->
                    @if(Auth::check() && in_array(Auth::user()->role, ['admin', 'super_admin']))
                        <div class="relative group">
                            <button
                                class="flex items-center px-4 py-2 text-sm font-medium transition-colors {{ request()->routeIs('master.*') || request()->is('users*') ? 'text-primary border-b-2 border-primary' : 'text-gray-600 hover:text-primary' }}">
                                Master
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div
                                class="absolute left-0 top-full mt-0 w-48 bg-white rounded-b-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all border border-gray-200">
                                <a href="{{ route('master.unor.index') }}"
                                    class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary">Unit
                                    Organisasi</a>
                                <a href="{{ route('master.unit-kerja.index') }}"
                                    class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary">Unit
                                    Kerja</a>
                                <div class="border-t border-gray-100"></div>
                                <a href="{{ route('master.waktu-konsumsi.index') }}"
                                    class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary">Waktu
                                    Konsumsi</a>
                                <a href="{{ route('master.mak.index') }}"
                                    class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary">MAK
                                    (Akun)</a>
                                <a href="{{ route('master.ppk.index') }}"
                                    class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary">PPK</a>
                                <a href="{{ route('master.bendahara.index') }}"
                                    class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary">Bendahara</a>
                                <div class="border-t border-gray-100"></div>
                                <a href="{{ route('users.index') }}"
                                    class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary">User
                                    Management</a>
                                <div class="border-t border-gray-100"></div>
                                <a href="{{ route('master.sbm-konsumsi.index') }}"
                                    class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary">SBM
                                    Konsumsi</a>
                                <a href="{{ route('master.sbm-honorarium') }}"
                                    class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary rounded-b-lg">SBM
                                    Honorarium</a>
                            </div>
                        </div>
                    @endif

                    <!-- Transaksi Dropdown -->
                    <div class="relative group">
                        <button
                            class="flex items-center px-4 py-2 text-sm font-medium transition-colors {{ request()->routeIs('kegiatan.*') ? 'text-primary border-b-2 border-primary' : 'text-gray-600 hover:text-primary' }}">
                            Transaksi
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div
                            class="absolute left-0 top-full mt-0 w-48 bg-white rounded-b-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all border border-gray-200">
                            <a href="{{ route('kegiatan.index') }}"
                                class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary">Daftar
                                Kegiatan</a>
                            <a href="{{ route('kegiatan.create') }}"
                                class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-primary rounded-b-lg">Tambah
                                Kegiatan</a>
                        </div>
                    </div>

                    <!-- Laporan -->
                    <a href="#"
                        class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 hover:text-primary transition-colors">
                        Laporan
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="pt-28 px-6 lg:px-12 pb-8">
        <div class="container max-w-6xl mx-auto">
            <!-- Page Header -->
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-primary">
                    @yield('page-title', 'Dashboard')
                </h1>
                <p class="text-gray-600 mt-1">
                    @yield('page-subtitle', 'Sistem Pengelolaan Kegiatan & Belanja')
                </p>
            </div>

            <!-- Flash Messages -->
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-50 border-l-4 border-green-500 rounded-lg">
                    <p class="text-green-700 font-medium">{{ session('success') }}</p>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4 p-4 bg-red-50 border-l-4 border-red-500 rounded-lg">
                    <p class="text-red-700 font-medium">{{ session('error') }}</p>
                </div>
            @endif

            <!-- Page Content -->
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-auto">
        <div class="container max-w-6xl mx-auto px-6 lg:px-12 py-6">
            <div class="text-center">
                <p class="text-sm text-gray-600">
                    &copy; {{ date('Y') }} Kementerian Pekerjaan Umum dan Perumahan Rakyat
                </p>
                <p class="text-xs text-gray-500 mt-1">
                    Sistem Pengelolaan Keuangan & Belanja
                </p>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>

</html>