<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | {{ application()->name ?? 'AFADBD' }}</title>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/application/'.application()->fav_icon) }}">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: url("{{ asset('admin/assets/images/duralux/login_bg.jpg') }}") no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Dark overlay for better contrast */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }

        .auth-wrapper {
            position: relative;
            z-index: 10;
            width: 100%;
            padding: 20px;
            display: flex;
            justify-content: center;
        }

        .auth-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 420px;
            padding: 40px;
            color: white;
            text-align: left;
        }

        .auth-logo {
            text-align: center;
            margin-bottom: 30px;
            font-size: 20px;
            font-weight: 600;
        }

        .auth-title {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 30px;
            color: white;
            text-align: left;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            background: #ffffff;
            border: none;
            border-radius: 8px;
            padding: 14px 16px;
            font-size: 14px;
            color: #333;
            margin-bottom: 20px;
            transition: all 0.3s;
        }

        .form-control:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.5);
        }

        .form-control::placeholder {
            color: #a0aec0;
        }

        .password-container {
            position: relative;
            margin-bottom: 20px; /* Increased to account for removed input margin */
        }
        
        .password-container .form-control {
            margin-bottom: 0;
            padding-right: 40px; /* Prevent text overlapping with icon */
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #a0aec0;
            cursor: pointer;
            width: 18px;
            height: 18px;
        }
        
        .password-toggle:hover {
            color: #3182ce;
        }

        .forgot-link-wrapper {
            text-align: right;
            margin-bottom: 30px;
        }

        .forgot-link {
            color: rgba(255, 255, 255, 0.9);
            font-size: 13px;
            text-decoration: none;
            font-weight: 500;
        }

        .forgot-link:hover {
            color: white;
            text-decoration: underline;
        }

        .btn-submit {
            width: 100%;
            background: #0d2c5e; /* Dark blue button */
            color: white;
            border: none;
            border-radius: 8px;
            padding: 15px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: ALL 0.3s;
            margin-bottom: 30px;
        }

        .btn-submit:hover {
            background: #162447;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .register-text {
            text-align: center;
            font-size: 13px;
            color: rgba(255, 255, 255, 0.8);
        }

        .register-text a {
            color: white;
            font-weight: 600;
            text-decoration: none;
            margin-left: 5px;
        }
        
        .register-text a:hover {
            text-decoration: underline;
        }
        
        /* Alert styles */
        .alert {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 20px;
            font-size: 14px;
            color: #333;
            border-left: 4px solid;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .alert-success { border-left-color: #28a745; color: #155724; }
        .alert-danger { border-left-color: #dc3545; color: #721c24; }
    </style>
</head>
<body>
    <div class="auth-wrapper">
        <div class="auth-card">
            <div class="auth-logo">
                <img src="{{ asset('images/application/'.application()->fav_icon) }}" alt="Logo" style="width: 80px; height: 80px; border-radius: 50%; border: 3px solid rgba(255,255,255,0.2); padding: 5px; background: rgba(255,255,255,0.1); margin-bottom: 15px;">
                <div style="font-size: 24px;">{{ application()->name ?? 'AFADBD' }}</div>
            </div>
            
            <h1 class="auth-title">Login</h1>
            
            <!-- Alerts -->
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <!-- Email -->
                <div style="margin-bottom: 20px;">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="username@gmail.com" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div style="color: #ffcccc; font-size: 12px; margin-top: -15px; margin-bottom: 15px;">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div style="margin-bottom: 10px;">
                    <label class="form-label">Password</label>
                    <div class="password-container">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        <i data-feather="eye" class="password-toggle" onclick="togglePassword()"></i>
                    </div>
                    @error('password')
                        <div style="color: #ffcccc; font-size: 12px; margin-top: -15px; margin-bottom: 15px;">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Remember & Forgot Password -->
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                    <div style="display: flex; align-items: center;">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="margin-right: 8px; cursor: pointer;">
                        <label for="remember" style="color: rgba(255, 255, 255, 0.9); font-size: 13px; font-weight: 500; cursor: pointer; margin-bottom: 0;">Remember me</label>
                    </div>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-link">Forgot Password?</a>
                    @endif
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-submit" style="margin-bottom: 0;">Sign in</button>
            </form>
        </div>
    </div>

    <script>
        feather.replace();
        
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const icon = document.querySelector('.password-toggle');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.setAttribute('data-feather', 'eye-off');
            } else {
                passwordInput.type = 'password';
                icon.setAttribute('data-feather', 'eye');
            }
            feather.replace();
        }
    </script>
</body>
</html>
