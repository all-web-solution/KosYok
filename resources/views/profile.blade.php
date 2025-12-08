
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Kos Melati Indah</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #00a859;
            --primary-dark: #008245;
            --primary-light: #e8f7f0;
            --secondary: #ff7a00;
            --accent: #7b61ff;
            --dark: #1a1d29;
            --dark-light: #2a2f3d;
            --light: #f8fafc;
            --gray: #8a94a6;
            --gray-light: #e2e8f0;
            --white: #ffffff;
            --gradient-primary: linear-gradient(135deg, #00a859 0%, #00c985 100%);
            --gradient-dark: linear-gradient(135deg, #1a1d29 0%, #2a2f3d 100%);
            --gradient-accent: linear-gradient(135deg, #7b61ff 0%, #9d8aff 100%);
            --shadow-sm: 0 4px 12px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 8px 24px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 16px 48px rgba(0, 0, 0, 0.12);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 20px;
            --radius-full: 50%;
            --transition-fast: 0.2s ease;
            --transition-base: 0.3s ease;
            --transition-slow: 0.5s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', 'Segoe UI', sans-serif;
        }

        body {
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url('https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 168, 89, 0.1);
            backdrop-filter: blur(3px);
            z-index: 0;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--gray-light);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-dark);
        }

        /* Login Container */
        .login-container {
            display: flex;
            width: 90%;
            max-width: 1200px;
            min-height: 700px;
            background: var(--white);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            z-index: 1;
            position: relative;
        }

        /* Login Side - Left Side */
        .login-side {
            flex: 1;
            background: var(--gradient-primary);
            padding: 4rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .login-side::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
            background-size: 30px 30px;
            opacity: 0.1;
            animation: float 20s linear infinite;
        }

        @keyframes float {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .login-logo {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 3rem;
        }

        .login-logo-icon {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            backdrop-filter: blur(10px);
        }

        .login-logo-text h1 {
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 0.3rem;
        }

        .login-logo-text span {
            font-size: 1rem;
            opacity: 0.9;
        }

        .login-side-content {
            max-width: 450px;
        }

        .login-side-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .login-side-description {
            font-size: 1.1rem;
            margin-bottom: 2.5rem;
            opacity: 0.9;
            line-height: 1.6;
        }

        .login-features {
            list-style: none;
            margin-top: 2rem;
        }

        .login-features li {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 1.2rem;
            font-size: 1rem;
        }

        .login-features i {
            width: 24px;
            height: 24px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: var(--radius-full);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
        }

        /* Form Side - Right Side */
        .form-side {
            flex: 1;
            padding: 4rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: var(--white);
        }

        .form-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .form-header h2 {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.8rem;
            position: relative;
            display: inline-block;
        }

        .form-header h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: var(--gradient-primary);
            border-radius: 2px;
        }

        .form-header p {
            color: var(--gray);
            font-size: 1rem;
            margin-top: 1.5rem;
        }

        /* Form Styling */
        .login-form {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 1.8rem;
            position: relative;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--dark);
            font-size: 0.95rem;
        }

        .input-with-icon {
            position: relative;
        }

        .input-with-icon i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            font-size: 1.1rem;
            z-index: 1;
        }

        .form-control {
            width: 100%;
            padding: 1rem 1rem 1rem 3.2rem;
            border: 2px solid var(--gray-light);
            border-radius: var(--radius-md);
            font-size: 1rem;
            transition: var(--transition-base);
            background: var(--white);
            color: var(--dark);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(0, 168, 89, 0.1);
        }

        .form-control:focus + i {
            color: var(--primary);
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
            color: var(--dark);
        }

        .remember-me input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: var(--primary);
        }

        .forgot-password {
            color: var(--primary);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: var(--transition-fast);
        }

        .forgot-password:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .btn-login {
            width: 100%;
            padding: 1.1rem;
            background: var(--gradient-primary);
            color: white;
            border: none;
            border-radius: var(--radius-md);
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-base);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-sm);
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .btn-login:active {
            transform: translateY(-1px);
        }

        .login-divider {
            display: flex;
            align-items: center;
            margin: 2rem 0;
            color: var(--gray);
        }

        .login-divider::before,
        .login-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--gray-light);
        }

        .login-divider span {
            padding: 0 1rem;
            font-size: 0.9rem;
        }

        .social-login {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .btn-social {
            padding: 0.9rem;
            border: 2px solid var(--gray-light);
            border-radius: var(--radius-md);
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition-base);
        }

        .btn-social.google {
            color: #DB4437;
        }

        .btn-social.facebook {
            color: #4267B2;
        }

        .btn-social:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-sm);
            border-color: var(--primary-light);
        }

        .register-link {
            text-align: center;
            margin-top: 2rem;
            color: var(--gray);
            font-size: 0.95rem;
        }

        .register-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            margin-left: 5px;
            transition: var(--transition-fast);
        }

        .register-link a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        /* Error Message */
        .error-message {
            background: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            padding: 0.8rem 1rem;
            border-radius: var(--radius-sm);
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            display: none;
            align-items: center;
            gap: 10px;
        }

        .error-message.show {
            display: flex;
        }

        /* Success Message */
        .success-message {
            background: rgba(40, 167, 69, 0.1);
            color: #28a745;
            padding: 0.8rem 1rem;
            border-radius: var(--radius-sm);
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            display: none;
            align-items: center;
            gap: 10px;
        }

        .success-message.show {
            display: flex;
        }

        /* Password Strength */
        .password-strength {
            height: 4px;
            background: var(--gray-light);
            border-radius: 2px;
            margin-top: 0.5rem;
            overflow: hidden;
        }

        .strength-meter {
            height: 100%;
            width: 0;
            background: #dc3545;
            border-radius: 2px;
            transition: var(--transition-base);
        }

        .strength-meter.weak { width: 33%; background: #dc3545; }
        .strength-meter.medium { width: 66%; background: #ffc107; }
        .strength-meter.strong { width: 100%; background: #28a745; }

        /* Toggle Password Visibility */
        .toggle-password {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--gray);
            cursor: pointer;
            font-size: 1.1rem;
            transition: var(--transition-fast);
        }

        .toggle-password:hover {
            color: var(--primary);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .login-container {
                flex-direction: column;
                max-width: 500px;
                min-height: auto;
            }
            
            .login-side, .form-side {
                padding: 3rem 2rem;
            }
            
            .login-side {
                order: 2;
            }
            
            .form-side {
                order: 1;
            }
            
            .login-logo {
                justify-content: center;
            }
            
            .login-side-content {
                text-align: center;
                max-width: 100%;
            }
            
            .login-features {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }
            
            .login-features li {
                justify-content: center;
                margin-bottom: 1rem;
            }
        }

        @media (max-width: 576px) {
            .login-container {
                width: 95%;
                border-radius: var(--radius-md);
            }
            
            .login-side, .form-side {
                padding: 2rem 1.5rem;
            }
            
            .login-logo-icon {
                width: 50px;
                height: 50px;
                font-size: 1.5rem;
            }
            
            .login-logo-text h1 {
                font-size: 1.8rem;
            }
            
            .login-side-title {
                font-size: 2rem;
            }
            
            .form-header h2 {
                font-size: 1.8rem;
            }
            
            .login-features {
                grid-template-columns: 1fr;
            }
            
            .social-login {
                grid-template-columns: 1fr;
            }
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-side, .form-side {
            animation: fadeInUp 0.6s ease-out;
        }

        .form-side {
            animation-delay: 0.2s;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Left Side - Branding & Info -->
        <div class="login-side">
            <div class="login-logo">
                <div class="login-logo-icon">
                    <i class="fas fa-home"></i>
                </div>
                <div class="login-logo-text">
                    <h1>Kos Melati Indah</h1>
                    <span>Admin Dashboard</span>
                </div>
            </div>
            
            <div class="login-side-content">
                <h2 class="login-side-title">Selamat Datang di Dashboard Admin</h2>
                <p class="login-side-description">
                    Akses panel administrasi untuk mengelola informasi kamar, penghuni, keuangan, dan seluruh operasional Kos Melati Indah.
                </p>
                
                <ul class="login-features">
                    <li><i class="fas fa-check"></i> Kelola Kamar & Penghuni</li>
                    <li><i class="fas fa-check"></i> Pantau Keuangan & Pembayaran</li>
                    <li><i class="fas fa-check"></i> Kelola Reservasi Online</li>
                    <li><i class="fas fa-check"></i> Laporan & Analitik</li>
                    <li><i class="fas fa-check"></i> Notifikasi Otomatis</li>
                    <li><i class="fas fa-check"></i> Keamanan Terenkripsi</li>
                </ul>
            </div>
        </div>
        
        <!-- Right Side - Login Form -->
        <div class="form-side">
            <div class="form-header">
                <h2>Masuk ke Dashboard</h2>
                <p>Masukkan kredensial Anda untuk mengakses panel admin</p>
            </div>
            
            <div class="error-message" id="errorMessage">
                <i class="fas fa-exclamation-circle"></i>
                <span id="errorText">Username atau password salah</span>
            </div>
            
            <div class="success-message" id="successMessage">
                <i class="fas fa-check-circle"></i>
                <span id="successText">Login berhasil! Mengalihkan...</span>
            </div>
            
            <form class="login-form" id="loginForm">
                <div class="form-group">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-with-icon">
                        <i class="fas fa-user"></i>
                        <input type="text" id="username" class="form-control" placeholder="Masukkan username Anda" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" class="form-control" placeholder="Masukkan password Anda" required>
                        <button type="button" class="toggle-password" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div class="password-strength">
                        <div class="strength-meter" id="passwordStrength"></div>
                    </div>
                </div>
                
                <div class="remember-forgot">
                    <label class="remember-me">
                        <input type="checkbox" id="rememberMe">
                        <span>Ingat saya</span>
                    </label>
                    <a href="#" class="forgot-password">Lupa password?</a>
                </div>
                
                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i> Masuk
                </button>
                
                <div class="login-divider">
                    <span>Atau masuk dengan</span>
                </div>
                
                <div class="social-login">
                    <button type="button" class="btn-social google">
                        <i class="fab fa-google"></i> Google
                    </button>
                    <button type="button" class="btn-social facebook">
                        <i class="fab fa-facebook-f"></i> Facebook
                    </button>
                </div>
                
                <div class="register-link">
                    Belum punya akses admin? <a href="#">Hubungi Super Admin</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
        
        // Check password strength
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthMeter = document.getElementById('passwordStrength');
            
            // Reset strength meter
            strengthMeter.className = 'strength-meter';
            
            if (password.length === 0) return;
            
            let strength = 0;
            
            // Check password criteria
            if (password.length >= 8) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;
            
            // Update strength meter
            if (strength <= 1) {
                strengthMeter.classList.add('weak');
            } else if (strength <= 3) {
                strengthMeter.classList.add('medium');
            } else {
                strengthMeter.classList.add('strong');
            }
        });
        
        // Form submission
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const rememberMe = document.getElementById('rememberMe').checked;
            
            const errorMessage = document.getElementById('errorMessage');
            const successMessage = document.getElementById('successMessage');
            
            // Hide previous messages
            errorMessage.classList.remove('show');
            successMessage.classList.remove('show');
            
            // Simple validation (in real app, this would be server-side)
            if (!username || !password) {
                document.getElementById('errorText').textContent = 'Username dan password wajib diisi';
                errorMessage.classList.add('show');
                return;
            }
            
            // Demo credentials
            const demoCredentials = [
                { username: 'admin', password: 'admin123', role: 'Super Admin' },
                { username: 'kosmelati', password: 'melati123', role: 'Admin' },
                { username: 'penghuni', password: 'penghuni123', role: 'Penghuni' }
            ];
            
            // Check credentials
            const user = demoCredentials.find(
                cred => cred.username === username && cred.password === password
            );
            
            if (user) {
                // Success - show success message
                document.getElementById('successText').textContent = `Login berhasil! Selamat datang, ${user.role}`;
                successMessage.classList.add('show');
                
                // Save to localStorage if "Remember me" is checked
                if (rememberMe) {
                    localStorage.setItem('kosMelatiLoggedIn', 'true');
                    localStorage.setItem('kosMelatiUsername', username);
                    localStorage.setItem('kosMelatiRole', user.role);
                } else {
                    sessionStorage.setItem('kosMelatiLoggedIn', 'true');
                    sessionStorage.setItem('kosMelatiUsername', username);
                    sessionStorage.setItem('kosMelatiRole', user.role);
                }
                
                // Redirect to dashboard after 1.5 seconds
                setTimeout(() => {
                    window.location.href = 'dashboard.html';
                }, 1500);
            } else {
                // Error - show error message
                document.getElementById('errorText').textContent = 'Username atau password salah';
                errorMessage.classList.add('show');
                
                // Shake animation for error
                const form = document.getElementById('loginForm');
                form.style.animation = 'none';
                setTimeout(() => {
                    form.style.animation = 'shake 0.5s';
                }, 10);
                
                setTimeout(() => {
                    form.style.animation = '';
                }, 500);
            }
        });
        
        // Check for saved login
        window.addEventListener('DOMContentLoaded', function() {
            const savedUsername = localStorage.getItem('kosMelatiUsername') || sessionStorage.getItem('kosMelatiUsername');
            
            if (savedUsername) {
                document.getElementById('username').value = savedUsername;
                document.getElementById('rememberMe').checked = localStorage.getItem('kosMelatiLoggedIn') === 'true';
            }
        });
        
        // Forgot password link
        document.querySelector('.forgot-password').addEventListener('click', function(e) {
            e.preventDefault();
            
            const username = document.getElementById('username').value;
            const errorMessage = document.getElementById('errorMessage');
            const successMessage = document.getElementById('successMessage');
            
            if (!username) {
                document.getElementById('errorText').textContent = 'Masukkan username Anda terlebih dahulu';
                errorMessage.classList.add('show');
                successMessage.classList.remove('show');
                return;
            }
            
            // Show success message
            document.getElementById('successText').textContent = `Link reset password telah dikirim ke email terdaftar untuk ${username}`;
            successMessage.classList.add('show');
            errorMessage.classList.remove('show');
            
            // Reset after 5 seconds
            setTimeout(() => {
                successMessage.classList.remove('show');
            }, 5000);
        });
        
        // Social login buttons
        document.querySelectorAll('.btn-social').forEach(button => {
            button.addEventListener('click', function() {
                const provider = this.classList.contains('google') ? 'Google' : 'Facebook';
                alert(`Login dengan ${provider} akan diarahkan ke halaman autentikasi. (Fitur demo)`);
            });
        });
        
        // Add shake animation for error
        const style = document.createElement('style');
        style.textContent = `
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
                20%, 40%, 60%, 80% { transform: translateX(5px); }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>