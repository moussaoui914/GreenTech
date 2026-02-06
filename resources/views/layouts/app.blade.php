<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GreenTech Solutions')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2d6a4f;
            --primary-dark: #1b4332;
            --primary-light: #52b788;
            --secondary-color: #95d5b2;
            --accent-color: #74c69d;
            --danger-color: #d62828;
            --warning-color: #f77f00;
            --success-color: #52b788;
            --text-dark: #212529;
            --text-light: #6c757d;
            --bg-light: #f8f9fa;
            --white: #ffffff;
            --shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            --border-radius: 8px;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background-color: var(--bg-light);
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* ==================== NAVBAR ==================== */
        .navbar {
            background: var(--white);
            box-shadow: var(--shadow);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-color);
        }

        .nav-brand i {
            font-size: 1.8rem;
        }

        .nav-links {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .nav-link {
            padding: 0.5rem 1rem;
            color: var(--text-dark);
            font-weight: 500;
            transition: var(--transition);
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .nav-link:hover {
            background: var(--secondary-color);
            color: var(--primary-dark);
        }

        .nav-link.admin {
            background: var(--primary-color);
            color: var(--white);
        }

        .nav-link.admin:hover {
            background: var(--primary-dark);
        }

        .logout-btn {
            background: none;
            border: none;
            padding: 0.5rem 1rem;
            color: var(--text-dark);
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-family: inherit;
            font-size: 1rem;
        }

        .logout-btn:hover {
            background: var(--secondary-color);
            color: var(--primary-dark);
        }

        @media (max-width: 768px) {
            .navbar .container {
                flex-direction: column;
                gap: 1rem;
            }

            .nav-links {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="container">
            <div class="nav-brand">
                <i class="fas fa-leaf"></i>
                <a href="/" style="color: inherit; text-decoration: none;">GreenTech Solutions</a>
            </div>
            
            <div class="nav-links">
                @auth
                    @if(Auth::user()->role === 'Admin')
                        <a href="{{ route('admin.dashboard') }}" class="nav-link admin">
                            <i class="fas fa-cogs"></i> Administration
                        </a>
                        <a href="{{ route('product.create') }}" class="nav-link">
                            <i class="fas fa-plus-circle"></i> Ajouter produit
                        </a>
                    @endif
                    
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <i class="fas fa-sign-out-alt"></i> Déconnexion
                        </button>
                    </form>
                @else
                    <a href="{{ route('login.show') }}" class="nav-link">
                        <i class="fas fa-sign-in-alt"></i> Connexion
                    </a>
                    <a href="{{ route('signup') }}" class="nav-link">
                        <i class="fas fa-user-plus"></i> Inscription
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer style="background: var(--primary-dark); color: var(--white); padding: 2rem 0; margin-top: 3rem;">
        <div class="container" style="text-align: center;">
            <p>&copy; 2024 GreenTech Solutions. Tous droits réservés.</p>
        </div>
    </footer>

    @yield('scripts')
</body>
</html>