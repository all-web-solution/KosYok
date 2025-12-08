<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Kos Melati Indah Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Livewire Styles -->
    <style>
        @livewireStyles
    </style>
    <style>
        :root {
            --primary: #00a859;
            --primary-dark: #008245;
            --primary-light: #e8f7f0;
            --primary-gradient: linear-gradient(135deg, #00a859 0%, #00c985 100%);
            --secondary: #ff7a00;
            --secondary-gradient: linear-gradient(135deg, #ff7a00 0%, #ff9a3d 100%);
            --accent: #7b61ff;
            --accent-gradient: linear-gradient(135deg, #7b61ff 0%, #9d8aff 100%);
            --dark: #1a1d29;
            --dark-light: #2a2f3d;
            --light: #f8fafc;
            --gray: #8a94a6;
            --gray-light: #e2e8f0;
            --white: #ffffff;
            
            --shadow-xs: 0 1px 3px rgba(0, 0, 0, 0.05);
            --shadow-sm: 0 4px 12px rgba(0, 0, 0, 0.08);
            --shadow-md: 0 8px 24px rgba(0, 0, 0, 0.12);
            --shadow-lg: 0 16px 48px rgba(0, 0, 0, 0.15);
            --shadow-xl: 0 24px 64px rgba(0, 0, 0, 0.18);
            
            --radius-sm: 10px;
            --radius-md: 16px;
            --radius-lg: 24px;
            --radius-xl: 32px;
            --radius-full: 50%;
            
            --transition-fast: 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-base: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --transition-slow: 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f0f9ff 0%, #e8f7f0 100%);
            color: var(--dark);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            line-height: 1.2;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--light);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-gradient);
            border-radius: 4px;
        }

        /* Header */
        .login-header {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: var(--shadow-sm);
            padding: 1rem 5%;
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: var(--primary-gradient);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            box-shadow: var(--shadow-sm);
        }

        .logo-text {
            display: flex;
            flex-direction: column;
        }

        .logo-text h1 {
            font-size: 1.3rem;
            font-weight: 800;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.5px;
            line-height: 1.1;
        }

        .logo-text span {
            font-size: 0.7rem;
            color: var(--gray);
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .home-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 0.5rem 1rem;
            border-radius: var(--radius-md);
            transition: all var(--transition-base);
        }

        .home-link:hover {
            background: var(--primary-light);
        }

        /* Login Container */
        .login-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 5%;
            position: relative;
            overflow: hidden;
        }

        .login-bg {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80') no-repeat center center;
            background-size: cover;
            opacity: 0.05;
            z-index: 0;
        }

        .login-content {
            width: 100%;
            max-width: 450px;
            position: relative;
            z-index: 2;
            animation: slideUp 0.6s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-card {
            background: var(--white);
            border-radius: var(--radius-xl);
            padding: 2.5rem;
            box-shadow: var(--shadow-xl);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: var(--primary-gradient);
        }

        .login-header-content {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-icon {
            width: 70px;
            height: 70px;
            background: var(--primary-light);
            border-radius: var(--radius-full);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: var(--primary);
            font-size: 1.8rem;
            box-shadow: var(--shadow-md);
        }

        .login-title {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            color: var(--dark);
        }

        .login-subtitle {
            color: var(--gray);
            font-size: 0.95rem;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--dark);
            font-size: 0.9rem;
        }

        .form-control {
            width: 100%;
            padding: 0.9rem 1rem 0.9rem 3rem;
            border: 2px solid var(--gray-light);
            border-radius: var(--radius-md);
            font-size: 0.95rem;
            transition: all var(--transition-base);
            background: var(--white);
            font-family: 'Inter', sans-serif;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(0, 168, 89, 0.1);
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 2.5rem;
            transform: translateY(-50%);
            color: var(--gray);
            font-size: 1rem;
        }

        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 2.5rem;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--gray);
            cursor: pointer;
            font-size: 1rem;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Remember Me & Forgot Password */
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .checkbox-container input {
            display: none;
        }

        .checkmark {
            width: 20px;
            height: 20px;
            border: 2px solid var(--gray-light);
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all var(--transition-fast);
        }

        .checkbox-container input:checked + .checkmark {
            background: var(--primary);
            border-color: var(--primary);
        }

        .checkbox-container input:checked + .checkmark::after {
            content: '✓';
            color: white;
            font-size: 0.8rem;
        }

        .forgot-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all var(--transition-fast);
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        /* Button */
        .btn {
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: var(--radius-md);
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all var(--transition-base);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
            font-family: 'Inter', sans-serif;
        }

        .btn-primary {
            background: var(--primary-gradient);
            color: white;
            box-shadow: var(--shadow-md);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
            color: var(--gray);
            font-size: 0.85rem;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--gray-light);
        }

        .divider-text {
            padding: 0 1rem;
        }

        /* Social Login */
        .social-login {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .social-btn {
            padding: 0.8rem;
            border: 2px solid var(--gray-light);
            border-radius: var(--radius-md);
            background: var(--white);
            color: var(--dark);
            font-weight: 500;
            cursor: pointer;
            transition: all var(--transition-base);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 0.9rem;
        }

        .social-btn:hover {
            border-color: var(--primary);
            transform: translateY(-1px);
        }

        .social-btn-google {
            color: #DB4437;
        }

        .social-btn-facebook {
            color: #4267B2;
        }

        /* Register Link */
        .register-link {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--gray-light);
            color: var(--gray);
            font-size: 0.9rem;
        }

        .register-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            margin-left: 0.5rem;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        /* Footer */
        .login-footer {
            text-align: center;
            padding: 1.5rem 5%;
            background: rgba(255, 255, 255, 0.9);
            border-top: 1px solid var(--gray-light);
            color: var(--gray);
            font-size: 0.85rem;
        }

        /* Success Message */
        .success-message {
            position: fixed;
            top: 100px;
            right: 20px;
            background: var(--primary-gradient);
            color: white;
            padding: 1rem 1.5rem;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-lg);
            transform: translateX(400px);
            transition: transform var(--transition-base);
            z-index: 2001;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .success-message.show {
            transform: translateX(0);
        }

        /* Loading */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.9);
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(5px);
        }

        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 5px solid #f3f3f3;
            border-top: 5px solid var(--primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 1rem;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Error Messages */
        .error-message {
            color: #e74c3c;
            font-size: 0.85rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .form-control.error {
            border-color: #e74c3c;
        }

        /* Livewire Form Elements */
        .livewire-form-group {
            margin-bottom: 1.5rem;
        }

        .livewire-form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--dark);
            font-size: 0.9rem;
        }

        .livewire-input {
            width: 100%;
            padding: 0.9rem 1rem;
            border: 2px solid var(--gray-light);
            border-radius: var(--radius-md);
            font-size: 0.95rem;
            transition: all var(--transition-base);
            background: var(--white);
            font-family: 'Inter', sans-serif;
        }

        .livewire-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(0, 168, 89, 0.1);
        }

        .livewire-error {
            color: #e74c3c;
            font-size: 0.85rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .livewire-checkbox {
            width: 16px;
            height: 16px;
            border: 2px solid var(--gray-light);
            border-radius: 4px;
            cursor: pointer;
        }

        .livewire-button {
            background: var(--primary-gradient);
            color: white;
            border: none;
            padding: 1rem;
            border-radius: var(--radius-md);
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all var(--transition-base);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
        }

        .livewire-button:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .remember-me-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .login-card {
                padding: 2rem 1.5rem;
            }
            
            .login-title {
                font-size: 1.5rem;
            }
            
            .social-login {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
            
            .form-options {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            
            .home-link {
                margin-top: 0.5rem;
            }
        }

        /* Animation for form focus */
        .form-group:focus-within .form-label {
            color: var(--primary);
        }

        /* Floating animation */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .floating {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</head>
<body>
    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay">
        <div style="text-align: center;">
            <div class="loading-spinner"></div>
            <p style="color: #666; font-weight: 500;">Memproses login...</p>
        </div>
    </div>

    <!-- Success Message -->
    <div class="success-message" id="successMessage">
        <i class="fas fa-check-circle"></i> <span id="successText">Login berhasil!</span>
    </div>

    <!-- Header -->
    <header class="login-header">
        <div class="header-content">
            <a href="{{ url('/') }}" class="logo">
                <div class="logo-icon">
                    <i class="fas fa-home"></i>
                </div>
                <div class="logo-text">
                    <h1>Kos Melati Indah</h1>
                    <span>Dashboard Management</span>
                </div>
            </a>
            
            <a href="{{ url('/') }}" class="home-link">
                <i class="fas fa-arrow-left"></i> Kembali ke Beranda
            </a>
        </div>
    </header>

    <!-- Login Container -->
    {{$slot}}

    <!-- Footer -->
    <footer class="login-footer">
        <p>&copy; 2024 Kos Melati Indah Dashboard. Hak cipta dilindungi.</p>
        <p style="margin-top: 0.5rem; font-size: 0.8rem;">
            <a href="#" style="color: var(--primary); text-decoration: none; margin: 0 0.5rem;">Kebijakan Privasi</a> | 
            <a href="#" style="color: var(--primary); text-decoration: none; margin: 0 0.5rem;">Syarat & Ketentuan</a> | 
            <a href="#" style="color: var(--primary); text-decoration: none; margin: 0 0.5rem;">Bantuan</a>
        </p>
    </footer>

    <!-- Livewire Scripts -->
    @livewireScripts
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize password toggle
            setupPasswordToggle();
            
            // Check for saved credentials
            checkRememberedUser();
            
            // Livewire specific setup
            setupLivewireListeners();
        });

        // Password toggle visibility
        function setupPasswordToggle() {
            const passwordToggle = document.getElementById('passwordToggle');
            if (passwordToggle) {
                const passwordInput = document.getElementById('password');
                
                passwordToggle.addEventListener('click', function() {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                    
                    // Toggle icon
                    const icon = this.querySelector('i');
                    icon.className = type === 'password' ? 'fas fa-eye' : 'fas fa-eye-slash';
                });
            }
        }

        // Check for remembered user from localStorage
        function checkRememberedUser() {
            const rememberedEmail = localStorage.getItem('kosMelati_rememberedEmail');
            if (rememberedEmail) {
                const emailInput = document.getElementById('email');
                const rememberCheckbox = document.getElementById('remember');
                
                if (emailInput) emailInput.value = rememberedEmail;
                if (rememberCheckbox) rememberCheckbox.checked = true;
            }
        }

        // Setup Livewire event listeners
        function setupLivewireListeners() {
            // Listen for Livewire loading state
            Livewire.hook('request', ({ uri, options, payload, respond, succeed, fail }) => {
                showLoading();
                
                succeed(({ status, json }) => {
                    hideLoading();
                    
                    // Save email to localStorage if "Remember me" is checked
                    const emailInput = document.getElementById('email');
                    const rememberCheckbox = document.getElementById('remember');
                    
                    if (rememberCheckbox && rememberCheckbox.checked && emailInput) {
                        localStorage.setItem('kosMelati_rememberedEmail', emailInput.value);
                    } else {
                        localStorage.removeItem('kosMelati_rememberedEmail');
                    }
                });
                
                fail(() => {
                    hideLoading();
                });
            });
        }

        // Show loading overlay
        function showLoading() {
            const loadingOverlay = document.getElementById('loadingOverlay');
            if (loadingOverlay) {
                loadingOverlay.style.display = 'flex';
            }
        }

        // Hide loading overlay
        function hideLoading() {
            const loadingOverlay = document.getElementById('loadingOverlay');
            if (loadingOverlay) {
                loadingOverlay.style.display = 'none';
            }
        }

        // Show success message
        function showSuccessMessage(message) {
            const successMessage = document.getElementById('successMessage');
            const successText = document.getElementById('successText');
            
            if (successMessage && successText) {
                successText.textContent = message;
                successMessage.classList.add('show');
                
                setTimeout(() => {
                    successMessage.classList.remove('show');
                }, 3000);
            }
        }

        // Social login functions (optional)
        function loginWithGoogle() {
            showLoading();
            setTimeout(() => {
                hideLoading();
                showSuccessMessage('Mengarahkan ke Google login...');
                // In real app: window.location.href = 'google-auth-url';
            }, 1000);
        }

        function loginWithFacebook() {
            showLoading();
            setTimeout(() => {
                hideLoading();
                showSuccessMessage('Mengarahkan ke Facebook login...');
                // In real app: window.location.href = 'facebook-auth-url';
            }, 1000);
        }

        // Handle keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Ctrl + Enter to submit form
            if (e.ctrlKey && e.key === 'Enter') {
                const form = document.querySelector('form[wire\\:submit="login"]');
                if (form) {
                    form.dispatchEvent(new Event('submit'));
                }
            }
            
            // Focus on password field when / is pressed
            if (e.key === '/' && e.target.tagName !== 'INPUT') {
                e.preventDefault();
                const passwordInput = document.getElementById('password');
                if (passwordInput) passwordInput.focus();
            }
        });

        // Prevent zoom on mobile for inputs
        document.addEventListener('touchstart', function(e) {
            if (e.target.tagName === 'INPUT') {
                document.body.style.fontSize = '16px';
            }
        });

        document.addEventListener('touchend', function() {
            setTimeout(() => {
                document.body.style.fontSize = '';
            }, 1000);
        });
    </script>
</body>
</html>