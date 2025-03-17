<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Ambik Resorts Admin')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />

    <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />

    <style>
        .sb-sidenav {
            background-color: #1E1E2F;
            color: white;
            width: 250px;
        }

        .sb-sidenav-menu .nav-link {
            color: white;
            padding: 12px 18px;
            display: flex;
            align-items: center;
            font-size: 16px;
            font-weight: 500;
            transition: all 0.3s ease;
            border-radius: 5px;
        }

        .sb-sidenav-menu .nav-link i {
            margin-right: 12px;
        }

        .sb-sidenav-menu .nav-link:hover {
            background: linear-gradient(90deg, #2E2E48 0%, #3A3A5A 100%);
            color: #F8F9FA;
        }

        .sb-sidenav-menu .nav-link.active {
            background-color: #17A2B8 !important;
            color: white !important;
            font-weight: bold;
        }

        .navbar-brand {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .center-button {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>

    @yield('styles') {{-- Page-specific styles --}}
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="{{ route('admin.dashboard') }}">Ambik Resorts</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle"><i class="fas fa-bars"></i></button>

        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." />
                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>

        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown">
                    <i class="fas fa-user fa-fw"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    @auth
                        <li><a class="dropdown-item" href="#">{{ Auth::user()->name }}</a></li>
                    @endauth
                    @guest
                        <li><a class="dropdown-item" href="#">Guest</a></li>
                    @endguest
                    <li><hr class="dropdown-divider" /></li>
                    <li class="center-button">
                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav" class="d-flex">
        <div id="layoutSidenav_nav">
            @include('admin.partials.sidebar') {{-- Sidebar Partial --}}
        </div>

        <div id="layoutSidenav_content">
            <main class="container-fluid px-4 py-4">
                @yield('content') {{-- Page Content --}}
            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Ambik Resorts Since 2023</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    
    <script src="{{ asset('admin/js/scripts.js') }}"></script>
    @yield('scripts') {{-- Page-specific scripts --}}
</body>

</html>
