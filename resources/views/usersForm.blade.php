<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - GreenTech Solutions</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2d6a4f;
            --primary-dark: #1b4332;
            --primary-light: #52b788;
            --secondary-color: #95d5b2;
            --accent-color: #74c69d;
            --text-dark: #212529;
            --text-light: #6c757d;
            --bg-light: #f8f9fa;
            --white: #ffffff;
            --shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            --border-radius: 12px;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .signup-container {
            display: flex;
            max-width: 1200px;
            width: 100%;
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            min-height: 790px;
        }

        .signup-left {
            flex: 1;
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
            color: var(--white);
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .signup-left::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 200%;
            height: 200%;
            background: rgba(255, 255, 255, 0.05);
            transform: rotate(45deg);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
            z-index: 1;
        }

        .logo i {
            font-size: 32px;
        }

        .welcome-text {
            z-index: 1;
        }

        .welcome-text h1 {
            font-size: 36px;
            margin-bottom: 15px;
            line-height: 1.2;
        }

        .welcome-text p {
            font-size: 16px;
            opacity: 0.9;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .features {
            list-style: none;
            margin-top: 30px;
            z-index: 1;
        }

        .features li {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            font-size: 15px;
        }

        .features i {
            color: var(--secondary-color);
        }

        .signup-right {
            flex: 1.2;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            max-height: 700px;
        }

        .signup-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .signup-header h2 {
            color: var(--primary-color);
            font-size: 28px;
            margin-bottom: 10px;
        }

        .signup-header p {
            color: var(--text-light);
        }

        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
            flex: 1;
        }

        .form-group.full-width {
            flex: 0 0 100%;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-dark);
            font-weight: 500;
        }

        .form-group label.required::after {
            content: " *";
            color: #e53935;
        }

        .input-with-icon {
            position: relative;
        }

        .input-with-icon i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            z-index: 1;
        }

        .input-with-icon input,
        .input-with-icon select {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 2px solid #e1e5eb;
            border-radius: var(--border-radius);
            font-size: 16px;
            transition: var(--transition);
            background: var(--bg-light);
        }

        .input-with-icon input:focus,
        .input-with-icon select:focus {
            outline: none;
            border-color: var(--primary-color);
            background: var(--white);
            box-shadow: 0 0 0 3px rgba(45, 106, 79, 0.1);
        }

        .password-strength {
            margin-top: 8px;
            height: 4px;
            background: #e1e5eb;
            border-radius: 2px;
            overflow: hidden;
            position: relative;
        }

        .strength-bar {
            height: 100%;
            width: 0;
            border-radius: 2px;
            transition: var(--transition);
        }

        .strength-weak { background: #e53935; }
        .strength-medium { background: #ff9800; }
        .strength-strong { background: #4caf50; }

        .terms {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin: 25px 0;
            color: var(--text-dark);
        }

        .terms input[type="checkbox"] {
            margin-top: 3px;
        }

        .terms a {
            color: var(--primary-color);
            text-decoration: none;
        }

        .terms a:hover {
            text-decoration: underline;
        }

        .btn {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: var(--border-radius);
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-primary {
            background: var(--primary-color);
            color: var(--white);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(45, 106, 79, 0.3);
        }

        .btn-secondary {
            background: var(--white);
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .btn-secondary:hover {
            background: var(--bg-light);
        }

        .login-link {
            text-align: center;
            margin-top: 30px;
            color: var(--text-light);
        }

        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            margin-left: 5px;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* Validation styles */
        .input-with-icon input:valid {
            border-color: #4caf50;
        }

        .input-with-icon input:invalid:not(:focus):not(:placeholder-shown) {
            border-color: #e53935;
        }

        .error-message {
            color: #e53935;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }

        .input-with-icon input:invalid:not(:focus):not(:placeholder-shown) + .error-message {
            display: block;
        }

        @media (max-width: 992px) {
            .signup-container {
                flex-direction: column;
                max-width: 600px;
            }
            
            .signup-left {
                padding: 40px 30px;
            }
            
            .signup-right {
                padding: 40px 30px;
                max-height: none;
            }
            
            .form-row {
                flex-direction: column;
                gap: 0;
            }
        }

        @media (max-width: 576px) {
            .signup-left,
            .signup-right {
                padding: 30px 20px;
            }
            
            .welcome-text h1 {
                font-size: 28px;
            }
            
            .signup-header h2 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <!-- Section gauche avec présentation -->
        <div class="signup-left">
            <div class="logo">
                <i class="fas fa-leaf"></i>
                <span>GreenTech Solutions</span>
            </div>
            
            <div class="welcome-text">
                <h1>Rejoignez notre<br>communauté !</h1>
                <p>Créez votre compte pour commencer à gérer vos produits et profiter de tous nos services.</p>
            </div>
            
            <ul class="features">
                <li><i class="fas fa-check-circle"></i> Gestion simplifiée des produits</li>
                <li><i class="fas fa-check-circle"></i> Suivi des commandes en temps réel</li>
                <li><i class="fas fa-check-circle"></i> Statistiques détaillées</li>
                <li><i class="fas fa-check-circle"></i> Support 24h/24</li>
                <li><i class="fas fa-check-circle"></i> Rapports personnalisés</li>
            </ul>
        </div>
        
        <!-- Section droite avec formulaire -->
        <div class="signup-right">
            <div class="signup-header">
                <h2>Créer un utilisateur</h2>
                <p>Remplissez le formulaire pour créer votre utilisateur</p>
            </div>
            
            <form action="{{ route('user.store') }}" method="POST" id="signupForm">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label for="firstname" class="required">Prénom</label>
                        <div class="input-with-icon">
                            <i class="fas fa-user"></i>
                            <input type="text" id="firstname" name="firstname" placeholder="Votre prénom" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="lastname" class="required">Nom</label>
                        <div class="input-with-icon">
                            <i class="fas fa-user"></i>
                            <input type="text" id="lastname" name="lastname" placeholder="Votre nom" required>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="email" class="required">Email</label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email" placeholder="votre@email.com" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="phone" class="required">Téléphone</label>
                    <div class="input-with-icon">
                        <i class="fas fa-phone"></i>
                        <input type="tel" id="phone" name="phone" placeholder="06 XX XX XX XX" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="password" class="required">Mot de passe</label>
                        <div class="input-with-icon">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="password" name="password" placeholder="Minimum 8 caractères" 
                                   pattern=".{8,}" required>
                            <div class="error-message">Le mot de passe doit contenir au moins 8 caractères</div>
                        </div>
                        <div class="password-strength">
                            <div class="strength-bar" id="passwordStrength"></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="confirm_password" class="required">Confirmer le mot de passe</label>
                        <div class="input-with-icon">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="confirm_password" name="password_confirmation" 
                                   placeholder="Retapez votre mot de passe" required>
                            <div class="error-message" id="passwordMatchError">Les mots de passe ne correspondent pas</div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="account_type">Type de compte</label>
                    <div class="input-with-icon">
                        <i class="fas fa-briefcase"></i>
                        <select id="account_type" name="role">
                            <option value="Admin">Admin</option>
                            <option value="Client">Client</option>
                        </select>
                    </div>
                </div>
                
                <div class="terms">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">
                        J'accepte les <a href="#">conditions d'utilisation</a> et la 
                        <a href="#">politique de confidentialité</a>
                    </label>
                </div>
                
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-user-plus"></i> Créer nouveau Utilisateur
                </button>
            </form>
        </div>
    </div>
    
    <script>
        // Vérification de la force du mot de passe
        const passwordInput = document.getElementById('password');
        const strengthBar = document.getElementById('passwordStrength');
        const confirmPasswordInput = document.getElementById('confirm_password');
        const passwordMatchError = document.getElementById('passwordMatchError');

        passwordInput.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;
            
            if (password.length >= 8) strength++;
            if (password.match(/[a-z]+/)) strength++;
            if (password.match(/[A-Z]+/)) strength++;
            if (password.match(/[0-9]+/)) strength++;
            if (password.match(/[$@#&!]+/)) strength++;
            
            const width = (strength / 5) * 100;
            strengthBar.style.width = width + '%';
            
            if (strength < 2) {
                strengthBar.className = 'strength-bar strength-weak';
            } else if (strength < 4) {
                strengthBar.className = 'strength-bar strength-medium';
            } else {
                strengthBar.className = 'strength-bar strength-strong';
            }
            
            // Vérifier la correspondance des mots de passe
            checkPasswordMatch();
        });

        confirmPasswordInput.addEventListener('input', checkPasswordMatch);

        function checkPasswordMatch() {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;
            
            if (confirmPassword && password !== confirmPassword) {
                confirmPasswordInput.setCustomValidity("Les mots de passe ne correspondent pas");
                passwordMatchError.style.display = 'block';
            } else {
                confirmPasswordInput.setCustomValidity("");
                passwordMatchError.style.display = 'none';
            }
        }

        // Animation pour les inputs
        const inputs = document.querySelectorAll('input, select');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.parentElement.style.transform = 'translateY(-2px)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.parentElement.style.transform = 'translateY(0)';
            });
        });

        // Validation du formulaire
        document.getElementById('signupForm').addEventListener('submit', function(e) {
            const terms = document.getElementById('terms');
            if (!terms.checked) {
                e.preventDefault();
                alert('Veuillez accepter les conditions d\'utilisation');
                return false;
            }
            
            if (passwordInput.value !== confirmPasswordInput.value) {
                e.preventDefault();
                alert('Les mots de passe ne correspondent pas');
                return false;
            }
        });
    </script>
</body>
</html>