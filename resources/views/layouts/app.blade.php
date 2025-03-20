<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambik Resorts</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Playfair+Display:wght@500;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">


    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            padding-top: 65px;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.1);
            padding: 8px 0;
        }

        .navbar-brand img {
            height: 50px;
            transition: transform 0.3s ease-in-out;
        }

        .navbar-brand img:hover {
            transform: scale(1.05);
        }

        .navbar-nav .nav-link {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            padding: 8px 12px;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #b4880c;
        }

        .navbar-nav .nav-link.active {
            color: #b4880c !important;
        }

        .call-btn {
            background: linear-gradient(45deg, #b4880c, #df9b00);
            border: none;
            padding: 6px 14px;
            font-size: 14px;
            font-weight: bold;
            color: white;
            transition: all 0.3s ease;
        }

        .call-btn:hover {
            background: linear-gradient(45deg, #df9b00, #b4880c);
        }

        footer {
            background: linear-gradient(45deg, #00c6ff, #0072ff);
            color: white;
            padding: 30px 0;
            font-family: 'Poppins', sans-serif;
            text-align: center;
        }

        footer h5 {
            font-size: 20px;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
            color: whitesmoke;
            text-transform: uppercase;
            letter-spacing: 1.2px;
        }

        footer p {
            margin: 5px 0;
            font-size: 16px;
            font-weight: 400;
            font-family: 'Poppins', sans-serif;
        }

        footer a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease-in-out, text-shadow 0.3s ease-in-out;
        }

        footer a:hover {
            color: #FFD700;
            text-shadow: 0px 0px 8px rgba(255, 215, 0, 0.8);
            text-decoration: underline;
        }

        footer .social-icons a {
            display: inline-block;
            font-size: 24px;
            margin-right: 12px;
            color: white;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        footer .social-icons a:hover {
            color: #FFD700;
            transform: scale(1.3) rotate(5deg);
        }

        footer hr {
            border-color: rgba(255, 255, 255, 0.3);
        }

        footer .copyright {
            font-size: 14px;
            font-weight: 300;
            font-family: 'Poppins', sans-serif;
            opacity: 0.8;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg fixed-top navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('img/37.png') }}" alt="Ambik Resorts Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('perks') ? 'active' : '' }}" href="/perks">Packages</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('school') ? 'active' : '' }}" href="/school">School Picnic</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('gallary') ? 'active' : '' }}" href="/gallary">Gallery</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="/contact">Contact Us</a>
        </li>
        <li class="nav-item">
            <a class="btn call-btn" href="tel:+9824999968" role="button"><i class="fas fa-phone"></i> Call US</a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user"></i> 
                {{ session()->has('user') ? session('user')['name'] : 'Guest' }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                @if(session()->has('user'))
                    <li><a class="dropdown-item" href="{{ route('view.bookings') }}"><i class="fas fa-book"></i> View Bookings</a></li>
                    <li>
                        <form action="{{ route('user.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger"><i class="fas fa-sign-out-alt"></i> Logout</button>
                        </form>
                    </li>
                @else
                    <li><a class="dropdown-item" href="{{ route('user.login') }}"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                @endif
            </ul>
        </li>
    </ul>
</div>

        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Booking Confirmed!',
            text: "{{ session('success') }}",
            confirmButtonText: 'OK',
            timer: 5000
        }).then(() => {
            window.location.href = '/';
        });
    </script>
    @endif
    
    @if(session('logout'))
    <script>
        Swal.fire({
            icon: 'info',
            title: 'Logged Out!',
            confirmButtonText: 'OK',
            timer: 5000
        });
    </script>
    @endif

    @if(session('login'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '🔓 Logged In Successfully!',
            confirmButtonText: 'OK',
            timer: 5000
        });
    </script>
@endif


    

    @if(session('enquired'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Thank You For Contacting Us!',
            text: "{{ session('enquired') }}",
            confirmButtonText: 'OK',
            timer: 5000
        }).then(() => {
            window.location.href = '/';
        });
    </script>
    @endif

    <footer>
        <div class="container">
            <div class="row text-center text-md-start">

                <div class="col-md-4 mb-3">
                    <h5>📍 Address</h5>
                    <p>Kachholi, Gujarat 396370</p>
                </div>

                <div class="col-md-4 mb-3">
                    <h5> Contact Us</h5>
                    <p>
                        <a href="tel:9824999968"><i class="fas fa-phone"></i> 9824999968</a><br>
                        <a href="mailto:contact@ambikresort.com"><i class="fas fa-envelope"></i> contact@ambikresort.com</a>
                    </p>
                </div>

                <div class="col-md-4 mb-3">
                    <h5>🌐 Follow Us</h5>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/profile.php?id=100083112687635" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/ambikresort" target="_blank" class="me-2"><i class="fab fa-instagram"></i></a>
                        <a href="https://wa.me/9824999968" target="_blank" class="me-3"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-3">
            <div class="text-center">
                <p class="copyright">&copy; 2024 <strong>Ambik Resort</strong>. All rights reserved.</p>
            </div>
        </div>
    </footer>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>