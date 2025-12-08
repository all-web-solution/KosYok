<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
// {
//     public LoginForm $form;

//     /**
//      * Handle an incoming authentication request.
//      */
//     public function login(): void
//     {
//         $this->validate();

//         $this->form->authenticate();

//         Session::regenerate();

//         $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
//     }
// }; ?>

<div class="login-container">
        <div class="login-bg"></div>
        <div class="login-content">
            <div class="login-card">
                <div class="login-header-content">
                    <div class="login-icon floating">
                        <i class="fas fa-lock"></i>
                    </div>
                    <h2 class="login-title">Masuk ke Dashboard</h2>
                    <p class="login-subtitle">Akses panel manajemen Kos Melati Indah</p>
                </div>

                <!-- Livewire Login Form -->
                <div>
                    <!-- Session Status -->
                    @if (session('status'))
                        <div style="background: var(--primary-light); color: var(--primary); padding: 1rem; border-radius: var(--radius-md); margin-bottom: 1.5rem; border-left: 4px solid var(--primary);">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form wire:submit="login">
                        <!-- Email Address -->
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
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
                                   placeholder="masukan email">
                            @error('form.email')
                                <div class="error-message">
                                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-icon">
                                <i class="fas fa-key"></i>
                            </div>
                            <input wire:model="form.password" 
                                   id="password" 
                                   class="form-control @error('form.password') error @enderror"
                                   type="password"
                                   name="password"
                                   required 
                                   autocomplete="current-password"
                                   placeholder="masukan password">
                            <button type="button" class="password-toggle" id="passwordToggle">
                                <i class="fas fa-eye"></i>
                            </button>
                            @error('form.password')
                                <div class="error-message">
                                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="form-options">
                            <label class="checkbox-container">
                                <input wire:model="form.remember" 
                                       id="remember" 
                                       type="checkbox" 
                                       class="remember-checkbox"
                                       name="remember">
                                <span class="checkmark"></span>
                                Ingat saya
                            </label>
                            
                            @if (Route::has('password.request'))
                                <a class="forgot-link" href="{{ route('password.request') }}" wire:navigate>
                                    Lupa password?
                                </a>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                            <i class="fas fa-sign-in-alt"></i> 
                            <span wire:loading.remove>Masuk</span>
                            <span wire:loading>
                                <i class="fas fa-spinner fa-spin"></i> Memproses...
                            </span>
                        </button>
                    </form>

                    <!-- Optional: Social Login Divider -->
                    <div class="divider">
                        <span class="divider-text">atau lanjutkan dengan</span>
                    </div>

                    <!-- Optional: Social Login Buttons -->
                    <div class="social-login">
                        <button type="button" class="social-btn social-btn-google" onclick="loginWithGoogle()">
                            <i class="fab fa-google"></i> Google
                        </button>
                        <button type="button" class="social-btn social-btn-facebook" onclick="loginWithFacebook()">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </button>
                    </div>

                    <!-- Optional: Register Link -->
                    <div class="register-link">
                        Belum punya akun?
                        <a href="{{ route('register') }}" wire:navigate>Daftar sekarang</a>
                    </div>
                </div>
                <!-- End Livewire Login Form -->
            </div>
        </div>
    </div>