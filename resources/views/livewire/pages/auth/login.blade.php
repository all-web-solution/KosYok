<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new
#[Layout('layouts.guest')] // Pastikan ini mengarah ke layout guest Anda (bukan dashboard)
class extends Component
{
    public LoginForm $form;

    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --primary-light: #e0e7ff;
            --text-dark: #1f2937;
            --text-gray: #6b7280;
            --bg-light: #f3f4f6;
            --white: #ffffff;
            --radius-md: 0.5rem;
            --radius-lg: 1rem;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--bg-light);
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        /* Dekorasi Background sederhana */
        .login-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary-light) 0%, transparent 100%);
            z-index: 0;
        }

        .login-card {
            background: var(--white);
            width: 100%;
            max-width: 450px;
            padding: 2.5rem;
            border-radius: var(--radius-lg);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 10;
        }

        .login-header-content {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-icon {
            width: 60px;
            height: 60px;
            background: var(--primary-light);
            color: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin: 0 auto 1rem;
        }

        .login-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .login-subtitle {
            color: var(--text-gray);
            font-size: 0.875rem;
        }

        .form-group {
            margin-bottom: 1.25rem;
            position: relative;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-gray);
            z-index: 10;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.5rem; /* Padding kiri untuk icon */
            border: 1px solid #d1d5db;
            border-radius: var(--radius-md);
            font-size: 0.95rem;
            transition: all 0.2s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--primary-light);
        }

        .form-control.error {
            border-color: #ef4444;
            background-color: #fef2f2;
        }

        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text-gray);
            cursor: pointer;
            padding: 0;
        }

        .password-toggle:hover {
            color: var(--text-dark);
        }

        .error-message {
            color: #ef4444;
            font-size: 0.75rem;
            margin-top: 0.25rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            color: var(--text-gray);
        }

        .forgot-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        .btn-primary {
            width: 100%;
            padding: 0.75rem;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: var(--radius-md);
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: background-color 0.2s;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
        }

        .btn-primary:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 1.5rem 0;
            color: var(--text-gray);
            font-size: 0.875rem;
        }

        .divider::before, .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e5e7eb;
        }

        .divider-text {
            padding: 0 0.75rem;
        }

        .social-login {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .social-btn {
            padding: 0.6rem;
            border: 1px solid #e5e7eb;
            background: white;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            cursor: pointer;
            font-size: 0.875rem;
            color: var(--text-dark);
            transition: all 0.2s;
        }

        .social-btn:hover {
            background-color: #f9fafb;
            border-color: #d1d5db;
        }

        .register-link {
            text-align: center;
            font-size: 0.875rem;
            color: var(--text-gray);
        }

        .register-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            margin-left: 0.25rem;
        }
    </style>

    <div class="login-container">
        <div class="login-bg"></div>

        <div class="login-content">
            <div class="login-card">
                <div class="login-header-content">
                    <div class="login-icon">
                        <i class="fas fa-home"></i> </div>
                    <h2 class="login-title">Masuk Dashboard</h2>
                    <p class="login-subtitle">Panel Manajemen Kos Melati Indah</p>
                </div>

                @if (session('status'))
                    <div style="background: var(--primary-light); color: var(--primary-dark); padding: 0.75rem; border-radius: var(--radius-md); margin-bottom: 1.5rem; font-size: 0.875rem;">
                        {{ session('status') }}
                    </div>
                @endif

                <form wire:submit="login">
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-wrapper">
                            <div class="input-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <input wire:model="form.email"
                                   id="email"
                                   class="form-control @error('form.email') error @enderror"
                                   type="email"
                                   name="email"
                                   required
                                   autofocus
                                   autocomplete="username"
                                   placeholder="nama@email.com">
                        </div>
                        @error('form.email')
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group" x-data="{ showPassword: false }">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-wrapper">
                            <div class="input-icon">
                                <i class="fas fa-key"></i>
                            </div>

                            <input wire:model="form.password"
                                   id="password"
                                   class="form-control @error('form.password') error @enderror"
                                   :type="showPassword ? 'text' : 'password'"
                                   name="password"
                                   required
                                   autocomplete="current-password"
                                   placeholder="••••••••">

                            <button type="button"
                                    class="password-toggle"
                                    @click="showPassword = !showPassword"
                                    title="Lihat Password">
                                <i class="fas" :class="showPassword ? 'fa-eye-slash' : 'fa-eye'"></i>
                            </button>
                        </div>

                        @error('form.password')
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-options">
                        <label class="checkbox-container">
                            <input wire:model="form.remember" type="checkbox" id="remember">
                            <span>Ingat saya</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="forgot-link" href="{{ route('password.request') }}" wire:navigate>
                                Lupa password?
                            </a>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                        <span wire:loading.remove>
                            <i class="fas fa-sign-in-alt" style="margin-right: 5px"></i> Masuk
                        </span>
                        <span wire:loading>
                            <i class="fas fa-spinner fa-spin" style="margin-right: 5px"></i> Memproses...
                        </span>
                    </button>
                </form>

                <div class="divider">
                    <span class="divider-text">atau masuk dengan</span>
                </div>

                <div class="social-login">
                    <button type="button" class="social-btn" onclick="alert('Fitur login Google belum diaktifkan')">
                        <i class="fab fa-google" style="color: #DB4437"></i> Google
                    </button>
                    <button type="button" class="social-btn" onclick="alert('Fitur login Facebook belum diaktifkan')">
                        <i class="fab fa-facebook-f" style="color: #4267B2"></i> Facebook
                    </button>
                </div>

                <div class="register-link">
                    Belum punya akun?
                    <a href="{{ route('register') }}" wire:navigate>Daftar sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>
