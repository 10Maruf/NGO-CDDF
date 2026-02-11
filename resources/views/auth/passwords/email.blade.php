<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | AFADBD</title>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/application/'.application()->fav_icon) }}">
    
    <!-- CSS Assets -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/theme.min.css') }}">
    
    <!-- Custom Auth Styles -->
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
        }
        
        .auth-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .auth-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            border: 1px solid #e9ecef;
            overflow: hidden;
            max-width: 450px;
            width: 100%;
        }
        
        .auth-header {
            background-color: #fff;
            padding: 40px 30px 30px;
            text-align: center;
            border-bottom: 1px solid #f1f1f1;
        }
        
        .auth-icon {
            width: 80px;
            height: 80px;
            background-color: #f7fafc;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            border: 3px solid #e2e8f0;
        }
        
        .auth-title {
            color: #2d3748;
            font-size: 24px;
            font-weight: 600;
            margin: 0;
        }
        
        .auth-subtitle {
            color: #718096;
            font-size: 14px;
            margin-top: 10px;
            line-height: 1.5;
        }
        
        .auth-body {
            padding: 40px 30px;
        }
        
        .form-floating {
            margin-bottom: 20px;
        }
        
        .form-floating .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            padding: 20px 15px 8px;
            height: 58px;
            transition: all 0.2s ease;
            background: white;
            font-size: 14px;
        }
        
        .form-floating .form-control:focus {
            border-color: #3182ce;
            box-shadow: 0 0 0 3px rgba(49, 130, 206, 0.1);
            outline: none;
        }
        
        .form-floating .form-control.is-invalid {
            border-color: #e53e3e;
        }
        
        .form-floating label {
            color: #a0aec0;
            font-size: 14px;
            padding-left: 15px;
        }
        
        .invalid-feedback {
            font-size: 12px;
            margin-top: 5px;
            color: #e53e3e;
        }
        
        .btn-reset {
            background-color: #3182ce;
            border: none;
            border-radius: 8px;
            padding: 15px;
            font-weight: 600;
            font-size: 16px;
            color: white;
            width: 100%;
            transition: all 0.2s ease;
            cursor: pointer;
        }
        
        .btn-reset:hover {
            background-color: #2c5282;
            transform: translateY(-1px);
        }
        
        .btn-reset:active {
            transform: translateY(0);
        }
        
        .back-link {
            text-align: center;
            margin-top: 20px;
        }
        
        .back-link a {
            color: #3182ce;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.2s ease;
        }
        
        .back-link a:hover {
            color: #2c5282;
            text-decoration: underline;
        }
        
        .alert {
            border: none;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 20px;
            padding: 12px 16px;
        }
        
        .alert-success {
            background-color: #c6f6d5;
            color: #2f855a;
            border-left: 4px solid #38a169;
        }
        
        /* Responsive */
        @media (max-width: 480px) {
            .auth-card {
                margin: 10px;
                border-radius: 12px;
            }
            
            .auth-header,
            .auth-body {
                padding: 30px 20px;
            }
            
            .auth-title {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    <div class="auth-wrapper">
        <div class="auth-card">
            <!-- Header Section -->
            <div class="auth-header">
                <div class="auth-icon">
                    <i class="feather feather-lock" style="font-size: 32px; color: white;"></i>
                </div>
                <h1 class="auth-title">Reset Password</h1>
                <p class="auth-subtitle">Enter your email address and we'll send you a link to reset your password</p>
            </div>
            
            <!-- Body Section -->
            <div class="auth-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        <i class="feather feather-check-circle me-2"></i>
                        {{ session('status') }}
                    </div>
                @endif
                
                <form method="POST" action="{{ route('password.email') }}" id="resetForm">
                    @csrf
                    
                    <!-- Email Input -->
                    <div class="form-floating">
                        <input type="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               id="email" 
                               name="email" 
                               placeholder="Enter your email"
                               value="{{ old('email') }}" 
                               required 
                               autofocus>
                        <label for="email">
                            <i class="feather feather-mail me-2"></i>Email Address
                        </label>
                        @error('email')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    
                    <!-- Reset Button -->
                    <button type="submit" class="btn btn-reset">
                        <i class="feather feather-send me-2"></i>Send Password Reset Link
                    </button>
                </form>
                
                <!-- Back to Login -->
                <div class="back-link">
                    <a href="{{ route('login') }}">
                        <i class="feather feather-arrow-left me-2"></i>Back to Login
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- JavaScript Assets -->
    <script src="{{ asset('admin/assets/js/vendors.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/common.min.js') }}"></script>
    
    <!-- Custom JavaScript -->
    <script>
        // Auto focus email field
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('email').focus();
        });
        
        // Form validation feedback  
        const emailInput = document.getElementById('email');
        emailInput.addEventListener('input', function() {
            if (this.classList.contains('is-invalid')) {
                this.classList.remove('is-invalid');
            }
        });
    </script>
</body>
</html>
