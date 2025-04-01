<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body style="background: linear-gradient(135deg, rgb(35, 59, 212), rgb(1, 29, 89)); height: 100vh; display: flex; justify-content: center; align-items: center;">

    <div class="card p-4 shadow-lg rounded" 
         style="width: 400px; background: rgba(255, 255, 255, 0.95); border-radius: 15px;">

        <div class="text-center">
            <img src="{{ asset('img/37.png') }}" alt="Admin Login" width="80">
        </div>

        <h2 class="text-center text-primary mt-2 fw-bold">Admin Login</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST" class="mt-3">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">📧 Email Address</label>
                <input type="email" id="email" name="email" class="form-control rounded-pill"
                       required placeholder="Enter email">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-bold">🔑 Password</label>
                <input type="password" id="password" name="password" class="form-control rounded-pill"
                       required placeholder="Enter password">
            </div>

            <button type="submit" class="btn btn-primary w-100 fw-bold rounded-pill">
                🚀 Login
            </button>
        </form>

        <p class="text-center mt-3">
            New Admin? 
            <a href="{{ route('admin.register') }}" class="text-decoration-none fw-bold">Register Here</a>
        </p>

        <div class="text-center text-secondary mt-2">
            <p>© 2025 Ambik Riverside Camp & Resorts, Kachholi</p>
        </div>
    </div>

    <style>
        .card {
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
            transition: 0.3s;
        }

        .card:hover {
            transform: scale(1.03);
            box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.3);
        }

        input::placeholder {
            font-size: 0.9rem;
            color: #aaa;
        }

        .btn-primary {
            background-color: #004e92;
            border: none;
        }

        .btn-primary:hover {
            background-color: #002c58;
        }

        h2 {
            font-weight: 800;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
