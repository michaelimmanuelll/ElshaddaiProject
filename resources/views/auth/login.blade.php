<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - GPdI El-Shaddai</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;900&family=Crimson+Pro:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-black: #0a0a0a;
            --soft-black: #1a1a1a;
            --gray: #666;
            --light-gray: #999;
            --white: #ffffff;
            --off-white: #f5f5f5;
        }

        body {
            font-family: 'Crimson Pro', serif;
            background: var(--primary-black);
            color: var(--white);
            min-height: 100vh;
            display: flex;
            overflow: hidden;
        }

        /* Split Screen Layout */
        .login-container {
            display: flex;
            width: 100%;
            height: 100vh;
        }

        /* Left Side - Image/Brand */
        .login-left {
            flex: 1;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.7)),
                        url('https://images.unsplash.com/photo-1438232992991-995b7058bbb3?w=800') center/cover;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 4rem;
            position: relative;
            filter: grayscale(100%);
        }

        .login-left::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.4) 100%);
            z-index: 1;
        }

        .brand-section {
            position: relative;
            z-index: 2;
            animation: fadeInLeft 1s ease;
        }

        .brand-logo {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 900;
            letter-spacing: 3px;
            margin-bottom: 1rem;
            color: var(--white);
        }

        .brand-tagline {
            font-size: 1rem;
            color: var(--light-gray);
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .quote-section {
            position: relative;
            z-index: 2;
            animation: fadeInLeft 1s ease 0.3s backwards;
        }

        .quote-text {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            line-height: 1.6;
            font-style: italic;
            margin-bottom: 1rem;
            color: var(--white);
        }

        .quote-author {
            font-size: 0.9rem;
            color: var(--light-gray);
            letter-spacing: 1px;
        }

        /* Right Side - Login Form */
        .login-right {
            flex: 1;
            background: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4rem;
            position: relative;
        }

        .login-form-container {
            width: 100%;
            max-width: 450px;
            animation: fadeInRight 1s ease;
        }

        .form-header {
            margin-bottom: 3rem;
        }

        .form-title {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            font-weight: 700;
            color: var(--primary-black);
            margin-bottom: 0.5rem;
            letter-spacing: -1px;
        }

        .form-subtitle {
            font-size: 1rem;
            color: var(--gray);
            line-height: 1.6;
        }

        .login-form {
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 2rem;
        }

        .form-label {
            display: block;
            font-size: 0.85rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--gray);
            margin-bottom: 0.8rem;
            font-weight: 600;
        }

        .form-input {
            width: 100%;
            padding: 1rem 1.5rem;
            font-size: 1rem;
            font-family: 'Crimson Pro', serif;
            border: 2px solid #e0e0e0;
            background: var(--white);
            color: var(--primary-black);
            transition: all 0.3s ease;
            outline: none;
        }

        .form-input:focus {
            border-color: var(--primary-black);
            box-shadow: 0 0 0 3px rgba(10, 10, 10, 0.1);
        }

        .form-input::placeholder {
            color: var(--light-gray);
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .checkbox-group input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: var(--primary-black);
        }

        .checkbox-group label {
            font-size: 0.9rem;
            color: var(--gray);
            cursor: pointer;
        }

        .forgot-link {
            font-size: 0.9rem;
            color: var(--primary-black);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .forgot-link:hover {
            color: var(--gray);
        }

        .submit-btn {
            width: 100%;
            padding: 1.2rem;
            background: var(--primary-black);
            color: var(--white);
            border: 2px solid var(--primary-black);
            font-size: 0.9rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.4s ease;
            font-family: 'Crimson Pro', serif;
        }

        .submit-btn:hover {
            background: transparent;
            color: var(--primary-black);
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 2rem 0;
            color: var(--gray);
            font-size: 0.85rem;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e0e0e0;
        }

        .divider span {
            padding: 0 1rem;
            letter-spacing: 1px;
        }

        .social-login {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .social-btn {
            padding: 1rem;
            border: 2px solid #e0e0e0;
            background: var(--white);
            color: var(--primary-black);
            font-size: 0.85rem;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            font-family: 'Crimson Pro', serif;
            font-weight: 600;
        }

        .social-btn:hover {
            border-color: var(--primary-black);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .register-link {
            text-align: center;
            font-size: 0.95rem;
            color: var(--gray);
        }

        .register-link a {
            color: var(--primary-black);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .register-link a:hover {
            color: var(--gray);
            text-decoration: underline;
        }

        .back-home {
            position: absolute;
            top: 2rem;
            right: 2rem;
            padding: 0.8rem 1.5rem;
            border: 1px solid var(--primary-black);
            background: transparent;
            color: var(--primary-black);
            text-decoration: none;
            font-size: 0.85rem;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .back-home:hover {
            background: var(--primary-black);
            color: var(--white);
        }

        /* Animations */
        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Alert Message */
        .alert {
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
            border-left: 3px solid;
            background: rgba(0, 0, 0, 0.03);
            font-size: 0.9rem;
            display: none;
        }

        .alert.success {
            border-color: #28a745;
            color: #155724;
        }

        .alert.error {
            border-color: #dc3545;
            color: #721c24;
        }

        .alert.show {
            display: block;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Loading State */
        .submit-btn.loading {
            pointer-events: none;
            opacity: 0.7;
        }

        .submit-btn.loading::after {
            content: '';
            width: 16px;
            height: 16px;
            border: 2px solid var(--white);
            border-radius: 50%;
            border-top-color: transparent;
            display: inline-block;
            margin-left: 10px;
            animation: spin 0.6s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Responsive */
        @media (max-width: 968px) {
            .login-container {
                flex-direction: column;
            }

            .login-left {
                min-height: 40vh;
                padding: 2rem;
            }

            .brand-logo {
                font-size: 2rem;
            }

            .quote-text {
                font-size: 1.3rem;
            }

            .login-right {
                padding: 2rem;
            }

            .form-title {
                font-size: 2.5rem;
            }

            .back-home {
                top: 1rem;
                right: 1rem;
                padding: 0.6rem 1rem;
                font-size: 0.8rem;
            }
        }

        @media (max-width: 576px) {
            .social-login {
                grid-template-columns: 1fr;
            }

            .form-options {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }
        }

        /* Password Toggle */
        .password-group {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--gray);
            cursor: pointer;
            font-size: 1.2rem;
            padding: 0;
            transition: color 0.3s ease;
        }

        .toggle-password:hover {
            color: var(--primary-black);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Left Side - Brand -->
        <div class="login-left">
            <div class="brand-section">
                <div class="brand-logo">EL-SHADDAI</div>
                <div class="brand-tagline">Gereja Pentakosta di Indonesia</div>
            </div>

            <div class="quote-section">
                <div class="quote-text">
                    "Marilah kepada-Ku, semua yang letih lesu dan berbeban berat, Aku akan memberi kelegaan kepadamu."
                </div>
                <div class="quote-author">— Matius 11:28</div>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="login-right">
            <a href="{{ route('dashboard') }}" class="back-home">
                ← Kembali ke Beranda
            </a>

            <div class="login-form-container">
                <div class="form-header">
                    <h1 class="form-title">Masuk</h1>
                    <p class="form-subtitle">
                        Selamat datang kembali! Silakan masuk ke akun Anda untuk mengakses sistem gereja.
                    </p>
                </div>

                <div id="alertMessage" class="alert"></div>

                <form class="login-form" id="loginForm" method="POST" action="{{ route('login') }}">
                @csrf <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="form-input" 
                        placeholder="nama@email.com"
                        value="{{ old('email') }}"
                        required
                    >
                    @error('email')
                        <span style="color: #dc3545; font-size: 0.8rem;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Kata Sandi</label>
                    <div class="password-group">
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            class="form-input" 
                            placeholder="Masukkan kata sandi"
                            required
                        >
                        <button type="button" class="toggle-password" onclick="togglePassword()">
                            👁️
                        </button>
                    </div>
                </div>

                <button type="submit" class="submit-btn" id="submitBtn">
                    Masuk
                </button>
                </form>

                <div class="divider">
                    <span>atau masuk dengan</span>
                </div>

                <div class="social-login">
                    <button class="social-btn" onclick="socialLogin('google')">
                        <span>🔍</span>
                        Google
                    </button>
                    <button class="social-btn" onclick="socialLogin('facebook')">
                        <span>📘</span>
                        Facebook
                    </button>
                </div>

                <div class="register-link">
                    Belum punya akun? <a href="#">Daftar sekarang</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle Password Visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleBtn = document.querySelector('.toggle-password');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleBtn.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                toggleBtn.textContent = '👁️';
            }
        }


        // Show Alert Message
        function showAlert(message, type) {
            const alertElement = document.getElementById('alertMessage');
            alertElement.textContent = message;
            alertElement.className = `alert ${type} show`;

            // Hide alert after 5 seconds
            setTimeout(() => {
                alertElement.classList.remove('show');
            }, 5000);
        }

        // Social Login
        function socialLogin(provider) {
            showAlert(`Login dengan ${provider} akan segera tersedia.`, 'success');
            console.log(`Attempting to login with ${provider}`);
            // Implement social login logic here
        }

        // Auto-focus on email input
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('email').focus();
        });

        // Enter key handling
        document.getElementById('password').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                document.getElementById('loginForm').dispatchEvent(new Event('submit'));
            }
        });
    </script>
</body>
</html>