<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Utilisateur</title>
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
            max-width: 800px;
            width: 100%;
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            padding: 40px;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 2px solid var(--secondary-color);
            padding-bottom: 20px;
        }

        .header h2 {
            color: var(--primary-color);
            font-size: 28px;
            margin-bottom: 10px;
        }

        .header p {
            color: var(--text-light);
        }

        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
                gap: 0;
            }
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
            flex: 1;
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

        .password-note {
            background-color: #f8f9fa;
            border-left: 4px solid var(--primary-color);
            padding: 10px 15px;
            margin: 15px 0;
            font-size: 14px;
            color: var(--text-light);
        }

        .btn {
            padding: 15px 30px;
            border: none;
            border-radius: var(--border-radius);
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
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

        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
            gap: 15px;
        }

        @media (max-width: 576px) {
            .form-actions {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
        }

        .error-message {
            color: #e53935;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <div class="header">
            <h2>
                <i class="fas fa-user-edit me-2"></i>
                Modifier l'utilisateur
            </h2>
            <p>Modifiez les informations de l'utilisateur</p>
        </div>
        
        <form action="{{ route('user.update', $user->id) }}" method="POST" id="editForm">
            @csrf
            @method('PUT')
            
            <div class="form-row">
                <div class="form-group">
                    <label for="firstname" class="required">Prénom</label>
                    <div class="input-with-icon">
                        <i class="fas fa-user"></i>
                        <input type="text" 
                               id="firstname" 
                               name="firstname" 
                               value="{{ old('firstname', $user->firstname) }}" 
                               placeholder="Votre prénom" 
                               required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="lastname" class="required">Nom</label>
                    <div class="input-with-icon">
                        <i class="fas fa-user"></i>
                        <input type="text" 
                               id="lastname" 
                               name="lastname" 
                               value="{{ old('lastname', $user->lastname) }}" 
                               placeholder="Votre nom" 
                               required>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="email" class="required">Email</label>
                <div class="input-with-icon">
                    <i class="fas fa-envelope"></i>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="{{ old('email', $user->email) }}" 
                           placeholder="votre@email.com" 
                           required>
                </div>
            </div>
            
            <div class="form-group">
                <label for="phone" class="required">Téléphone</label>
                <div class="input-with-icon">
                    <i class="fas fa-phone"></i>
                    <input type="tel" 
                           id="phone" 
                           name="phone" 
                           value="{{ old('phone', $user->phone) }}" 
                           placeholder="06 XX XX XX XX" 
                           required>
                </div>
            </div>
            
            <div class="form-group">
                <label for="role" class="required">Rôle</label>
                <div class="input-with-icon">
                    <i class="fas fa-user-tag"></i>
                    <select id="role" name="role" required>
                        <option value="Admin" {{ old('role', $user->role) == 'Admin' ? 'selected' : '' }}>Administrateur</option>
                        <option value="Client" {{ old('role', $user->role) == 'Client' ? 'selected' : '' }}>Client</option>
                        <option value="Moderator" {{ old('role', $user->role) == 'Moderator' ? 'selected' : '' }}>Modérateur</option>
                        <option value="Editor" {{ old('role', $user->role) == 'Editor' ? 'selected' : '' }}>Éditeur</option>
                    </select>
                </div>
            </div>
            
            <div class="password-note">
                <i class="fas fa-info-circle me-2"></i>
                Laissez les champs de mot de passe vides si vous ne souhaitez pas le modifier.
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="password">Nouveau mot de passe</label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               placeholder="Laisser vide pour ne pas changer"
                               minlength="8">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password_confirmation">Confirmer le mot de passe</label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" 
                               id="password_confirmation" 
                               name="password_confirmation" 
                               placeholder="Retapez le nouveau mot de passe">
                    </div>
                </div>
            </div>
            
            <div class="form-actions">
                <a href="{{ route('usersList.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Retour à la liste
                </a>
                
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Mettre à jour
                </button>
            </div>
        </form>
    </div>
    
    <script>
        // Vérification de la correspondance des mots de passe
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('password_confirmation');
        
        function checkPasswordMatch() {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;
            
            if (password && confirmPassword && password !== confirmPassword) {
                confirmPasswordInput.setCustomValidity("Les mots de passe ne correspondent pas");
                confirmPasswordInput.style.borderColor = '#e53935';
            } else {
                confirmPasswordInput.setCustomValidity("");
                confirmPasswordInput.style.borderColor = password ? '#4caf50' : '#e1e5eb';
            }
        }
        
        passwordInput.addEventListener('input', checkPasswordMatch);
        confirmPasswordInput.addEventListener('input', checkPasswordMatch);
        
        // Validation du formulaire
        document.getElementById('editForm').addEventListener('submit', function(e) {
            if (passwordInput.value && passwordInput.value.length < 8) {
                e.preventDefault();
                alert('Le mot de passe doit contenir au moins 8 caractères');
                passwordInput.focus();
                return false;
            }
            
            if (passwordInput.value !== confirmPasswordInput.value) {
                e.preventDefault();
                alert('Les mots de passe ne correspondent pas');
                return false;
            }
            
            return true;
        });
        
        // Afficher un message de confirmation
        @if(session('success'))
            alert('{{ session('success') }}');
        @endif
    </script>
</body>
</html>