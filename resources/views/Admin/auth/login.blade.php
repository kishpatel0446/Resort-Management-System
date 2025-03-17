<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            text-align: center;
            color: #0044cc;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        label {
            font-size: 1rem;
            color: #444;
            margin-bottom: 8px;
            display: block;
        }

        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        input[type="email"]:focus, input[type="password"]:focus {
            border-color: #0044cc;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #0044cc;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0033a0;
        }

        .error-message {
            color: red;
            font-size: 0.875rem;
            margin-top: -10px;
            margin-bottom: 20px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.875rem;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Ambik Riverside Camp & Resorts, Kachholi</h1>

                @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <button type="submit">Login</button>
            </div>
        </form>

        <div class="footer">
            <p>© 2025 Ambik Riverside Camp & Resorts, Kachholi</p>
        </div>
    </div>
</body>
</html>
