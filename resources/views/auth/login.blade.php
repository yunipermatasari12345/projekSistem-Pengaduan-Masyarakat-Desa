@extends('layouts.app')

@section('content')
<div class="login-wrapper">
    <!-- Header Section -->
    <div class="login-header text-center">
        <div class="login-icon">
            <i class="fas fa-user-shield"></i>
        </div>
        <h2 class="text-white fw-bold mb-2"><i class="fas fa-lock me-2"></i>LOGIN ADMIN</h2>
        <p class="text-light">Akses sistem pengelolaan pengaduan masyarakat</p>
    </div>

    <!-- Form Section -->
    <div class="login-form-wrapper">
        @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="fas fa-exclamation-triangle me-2"></i>
            {{ $errors->first() }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="login-card">
            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <div class="form-group mb-4">
                    <label class="form-label"><i class="fas fa-envelope me-2"></i>Alamat Email</label>
                    <div class="input-group">
                        <span class="input-group-icon">
                            <i class="fas fa-at"></i>
                        </span>
                        <input type="email" name="email" class="form-control" placeholder="contoh@email.com" required>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label class="form-label"><i class="fas fa-key me-2"></i>Kata Sandi</label>
                    <div class="input-group">
                        <span class="input-group-icon">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                        <span class="input-group-icon password-toggle">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                <div class="d-grid mb-3">
                    <button class="btn btn-login" type="submit">
                        <i class="fas fa-sign-in-alt me-2"></i>MASUK KE SISTEM
                    </button>
                </div>

                <div class="login-footer text-center">
                    <a href="#" class="text-decoration-none">Lupa kata sandi?</a>
                    <div class="mt-2">
                        <a href="#" class="text-decoration-none me-2"><i class="fas fa-info-circle"></i> Bantuan</a>
                        <a href="#" class="text-decoration-none"><i class="fas fa-headset"></i> Kontak</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .login-wrapper {
        background-color: #f8fafc;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        padding: 0;
    }

    .login-header {
        background: linear-gradient(135deg, #4361ee, #3a0ca3);
        padding: 3rem 1rem 2rem;
        position: relative;
    }

    .login-icon {
        width: 80px;
        height: 80px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        color: #4361ee;
        font-size: 2rem;
    }

    .login-form-wrapper {
        max-width: 450px;
        width: 90%;
        margin: -40px auto 0;
        position: relative;
        z-index: 10;
    }

    .login-card {
        background: #fff;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        border: none;
    }

    .form-group label {
        font-weight: 500;
        color: #4a5568;
        margin-bottom: 0.5rem;
    }

    .input-group {
        position: relative;
    }

    .input-group-icon {
        background-color: #edf2f7;
        color: #4a5568;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        border-right: none;
    }

    .form-control {
        border-left: none;
        padding: 12px 15px;
        background-color: #fff;
        border-color: #e2e8f0;
    }

    .form-control:focus {
        box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.16);
        border-color: #63b3ed;
    }

    .btn-login {
        background: linear-gradient(135deg, #4361ee, #3a0ca3);
        color: white;
        padding: 12px;
        border-radius: 8px;
        font-weight: 600;
        border: none;
        transition: all 0.3s ease;
        letter-spacing: 0.5px;
    }

    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
    }

    .password-toggle {
        cursor: pointer;
        background-color: #edf2f7;
        color: #4a5568;
    }

    .login-footer {
        color: #718096;
        font-size: 0.9rem;
    }

    .login-footer a {
        color: #4a5568;
        transition: color 0.2s;
    }

    .login-footer a:hover {
        color: #4361ee;
    }

    .alert {
        border-radius: 8px;
    }
</style>

<!-- Load Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- Optional: JavaScript for password toggle -->
<script>
    document.querySelector('.password-toggle').addEventListener('click', function() {
        const passwordInput = document.querySelector('input[name="password"]');
        const icon = this.querySelector('i');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    });
</script>
@endsection
