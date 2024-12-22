<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>@yield('title', 'SIPENDA')</title>
    <style>
        :root {
            --primary-color: #2563eb;
            --hover-color: #1e40af;
            --background-light: #f8fafc;
            --white: #ffffff;
            --gray-dark: #1f2937;
            --red: #ef4444;
            --red-hover: #dc2626;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        .navbar .nav-link {
            color: var(--gray-dark);
            font-weight: 500;
            padding: 0.5rem 1rem;
            margin: 0 0.5rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }

        .navbar .nav-link:hover {
            color: var(--primary-color);
            background: var(--background-light);
            transform: scale(1.05);
            /* Menambahkan efek pembesaran saat hover */
            opacity: 0.9;
            /* Menurunkan opacity untuk efek visual */
        }

        .navbar .nav-link.active {
            color: var(--white);
            background: var(--primary-color);
        }

        .btn-logout {
            background: var(--red);
            color: var(--white);
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            background: var(--red-hover);
        }

        .main-content {
            margin-top: 4rem;
        }

        .footer {
            background: var(--background-light);
            padding: 1rem;
            text-align: center;
            font-size: 0.875rem;
            color: #4b5563;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center gap-2"
                href="{{ auth()->check() ? (auth()->user()->isAdmin() ? route('admin.dashboard') : route('siswa.dashboard')) : '#' }}">
                <img src="{{ asset('/images/logo.svg') }}" alt="Logo" width="30" height="30">
                <span class="fw-bold text-primary">SIPENDA</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if (auth()->check())
                        @if (auth()->user()->isAdmin())
                            <li class="nav-item">
                                <a class="nav-link @if (request()->is('admin/dashboard')) active @endif"
                                    href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if (request()->is('admin/siswa')) active @endif"
                                    href="{{ route('admin.siswa.index') }}">Manajemen Siswa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if (request()->is('admin/pendaftaran*')) active @endif"
                                    href="{{ route('admin.pendaftaran.index') }}">Manajemen Pendaftaran</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if (request()->is('admin/kelas*')) active @endif"
                                    href="{{ route('admin.kelas.index') }}">Manajemen Kelas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if (request()->is('admin/guru*')) active @endif"
                                    href="{{ route('admin.guru.index') }}">Manajemen Guru</a>
                            </li>
                        @elseif(auth()->user()->isSiswa())
                            <li class="nav-item">
                                <a class="nav-link @if (request()->is('siswa/dashboard')) active @endif"
                                    href="{{ route('siswa.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if (request()->is('siswa/pendaftaran')) active @endif"
                                    href="{{ route('siswa.pendaftaran.form') }}">Pendaftaran</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if (request()->is('siswa/nilai')) active @endif"
                                    href="{{ route('siswa.nilai.create') }}">Nilai</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if (request()->is('siswa/informasi-pribadi')) active @endif"
                                    href="{{ route('siswa.informasi-pribadi') }}">Informasi Pribadi</a>
                            </li>
                        @endif
                    @endif
                    <li class="nav-item">
                        <button type="button" class="btn btn-logout" data-bs-toggle="modal"
                            data-bs-target="#logoutModal">Logout</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container main-content">
        @yield('content')
    </div>

    <footer class="footer">
        <p class="mb-0">&copy; 2024 SIPENDA. All rights reserved.</p>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin keluar?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
