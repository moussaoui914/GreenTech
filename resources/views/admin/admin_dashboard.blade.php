<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord Admin - GreenTech Solutions</title>
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
            --shadow-lg: 0 5px 25px rgba(0, 0, 0, 0.15);
            --border-radius: 8px;
            --transition: all 0.3s ease;
        }

        /* ==================== RESET & BASE ==================== */
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

        a {
            text-decoration: none;
            color: inherit;
        }

        /* ==================== CONTAINER ==================== */
        .container {
            max-width: 1400px;
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
            gap: 1.5rem;
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
        }

        .nav-link:hover,
        .nav-link.active {
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

        /* ==================== DASHBOARD HEADER ==================== */
        .dashboard-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
            color: var(--white);
            padding: 3rem 0;
            margin-bottom: 2rem;
        }

        .dashboard-header h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .dashboard-header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* ==================== WELCOME CARD ==================== */
        .welcome-card {
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 2rem;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .admin-avatar {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: var(--white);
        }

        .welcome-text h2 {
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .welcome-text p {
            color: var(--text-light);
            margin-bottom: 1rem;
        }

        /* ==================== STATS GRID ==================== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 1.5rem;
            transition: var(--transition);
            border-top: 4px solid var(--primary-color);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .stat-card.products {
            border-top-color: var(--success-color);
        }

        .stat-card.users {
            border-top-color: var(--primary-color);
        }

        .stat-card.categories {
            border-top-color: var(--warning-color);
        }

        .stat-card.sales {
            border-top-color: var(--accent-color);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            background: var(--secondary-color);
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--primary-color);
        }

        .stat-value {
            font-size: 2rem;
            font-weight: bold;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        /* ==================== QUICK ACTIONS ==================== */
        .quick-actions {
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 2rem;
            margin-bottom: 3rem;
        }

        .quick-actions h2 {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--secondary-color);
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .action-btn {
            background: var(--white);
            border: 2px solid var(--secondary-color);
            border-radius: var(--border-radius);
            padding: 1.5rem 1rem;
            text-align: center;
            transition: var(--transition);
            cursor: pointer;
        }

        .action-btn:hover {
            background: var(--secondary-color);
            border-color: var(--primary-color);
            transform: translateY(-3px);
        }

        .action-btn i {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .action-btn span {
            display: block;
            font-weight: 500;
            color: var(--text-dark);
        }

        /* ==================== RECENT PRODUCTS ==================== */
        .recent-section {
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 2rem;
            margin-bottom: 3rem;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .section-header h2 {
            color: var(--primary-color);
        }

        .table-container {
            overflow-x: auto;
        }

        .dashboard-table {
            width: 100%;
            border-collapse: collapse;
        }

        .dashboard-table th {
            background: var(--secondary-color);
            color: var(--primary-dark);
            padding: 1rem;
            text-align: left;
            font-weight: 600;
        }

        .dashboard-table td {
            padding: 1rem;
            border-bottom: 1px solid var(--secondary-color);
        }

        .dashboard-table tr:hover {
            background: var(--bg-light);
        }

        .stock-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .stock-in {
            background: #d4edda;
            color: #155724;
        }

        .stock-out {
            background: #f8d7da;
            color: #721c24;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn-sm {
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius);
            font-size: 0.9rem;
            border: none;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
        }

        .btn-edit {
            background: var(--primary-color);
            color: var(--white);
        }

        .btn-edit:hover {
            background: var(--primary-dark);
        }

        .btn-delete {
            background: var(--danger-color);
            color: var(--white);
        }

        .btn-delete:hover {
            background: #c82333;
        }

        /* ==================== FOOTER ==================== */
        .footer {
            background: var(--primary-dark);
            color: var(--white);
            padding: 3rem 0 1rem;
            margin-top: 4rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3,
        .footer-section h4 {
            margin-bottom: 1rem;
            color: var(--secondary-color);
        }

        .footer-section p {
            margin: 0.5rem 0;
            opacity: 0.9;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            background: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .social-links a:hover {
            background: var(--primary-light);
            transform: translateY(-3px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid var(--primary-color);
            opacity: 0.8;
        }

        /* ==================== RESPONSIVE ==================== */
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

            .welcome-card {
                flex-direction: column;
                text-align: center;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .actions-grid {
                grid-template-columns: 1fr;
            }

            .dashboard-table {
                font-size: 0.9rem;
            }

            .action-buttons {
                flex-direction: column;
            }
        }

        @media (max-width: 480px) {
            .dashboard-header h1 {
                font-size: 2rem;
            }

            .dashboard-table th,
            .dashboard-table td {
                padding: 0.75rem 0.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="container">
            <div class="nav-brand">
                <i class="fas fa-leaf"></i>
                <span><a href="/">GreenTech Solutions</a></span>
            </div>
            
            <div class="nav-links">
                <a href="{{ route('admin.dashboard') }}" class="nav-link admin">
                    <i class="fas fa-cogs"></i> Administration
                </a>
                <a href="{{ route('homePage') }}" class="nav-link">
                    <i class="fas fa-store"></i> Voir le site
                </a>
                <a href="{{ route('product.create') }}" class="nav-link">
                    <i class="fas fa-plus-circle"></i> Ajouter un produit
                </a>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: none; border: none; cursor: pointer; font-size: 1rem;" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i> Déconnexion
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Dashboard Header -->
    <header class="dashboard-header">
        <div class="container">
            <h1>
                <i class="fas fa-tachometer-alt"></i>
                Tableau de bord Administrateur
            </h1>
            <p>Gérez votre boutique GreenTech Solutions</p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container">
        <!-- Welcome Card -->
        <div class="welcome-card">
            <div class="admin-avatar">
                <i class="fas fa-user-shield"></i>
            </div>
            <div class="welcome-text">
                <h2>Bonjour, {{ Auth::user()->firstname }} !</h2>
                <p>Vous êtes connecté en tant qu'administrateur. Gérez vos produits, catégories et surveillez les statistiques de votre boutique.</p>
                <p><i class="fas fa-calendar-check"></i> Dernière connexion : {{ now()->format('d/m/Y à H:i') }}</p>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card products">
                <div class="stat-header">
                    <div>
                        <div class="stat-value">{{ $totalProducts ?? 0 }}</div>
                        <div class="stat-label">Produits</div>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-box"></i>
                    </div>
                </div>
                <a href="{{ route('homePage') }}" style="color: var(--text-light); font-size: 0.9rem;">
                    <i class="fas fa-arrow-right"></i> Voir tous les produits
                </a>
            </div>

            <div class="stat-card users">
                <div class="stat-header">
                    <div>
                        <div class="stat-value">{{ $totalUsers ?? 0 }}</div>
                        <div class="stat-label">Utilisateurs</div>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
                <div style="color: var(--text-light); font-size: 0.9rem;">
                    <i class="fas fa-user-shield"></i> Admins : {{ $totalAdmins ?? 0 }}
                </div>
            </div>

            <div class="stat-card categories">
                <div class="stat-header">
                    <div>
                        <div class="stat-value">{{ $totalCategories ?? 0 }}</div>
                        <div class="stat-label">Catégories</div>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-tags"></i>
                    </div>
                </div>
                <div style="color: var(--text-light); font-size: 0.9rem;">
                    <i class="fas fa-chart-pie"></i> {{ $productsPerCategory ?? 0 }} produits/catégorie
                </div>
            </div>

            <div class="stat-card sales">
                <div class="stat-header">
                    <div>
                        <div class="stat-value">{{ $lowStockCount ?? 0 }}</div>
                        <div class="stat-label">Stock faible</div>
                    </div>
                    <div class="stat-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                </div>
                <div style="color: var(--text-light); font-size: 0.9rem;">
                    <i class="fas fa-box-open"></i> Produits à réapprovisionner
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <h2>Actions rapides</h2>
            <div class="actions-grid">
                <a href="{{ route('product.create') }}" class="action-btn">
                    <i class="fas fa-plus-circle"></i>
                    <span>Ajouter un produit</span>
                </a>
                <a href="{{ route('homePage') }}" class="action-btn">
                    <i class="fas fa-eye"></i>
                    <span>Voir le catalogue</span>
                </a>
                <a href="#" class="action-btn">
                    <i class="fas fa-chart-line"></i>
                    <span>Statistiques</span>
                </a>
                <a href="#" class="action-btn">
                    <i class="fas fa-users-cog"></i>
                    <span>Gérer utilisateurs</span>
                </a>
            </div>
        </div>

        <!-- Recent Products -->
        <div class="recent-section">
            <div class="section-header">
                <h2>Produits récents</h2>
                <a href="{{ route('homePage') }}" style="color: var(--primary-color);">
                    Voir tous <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <div class="table-container">
                <table class="dashboard-table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Catégorie</th>
                            <th>Prix</th>
                            <th>Stock</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentProducts ?? [] as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name ?? 'Non catégorisé' }}</td>
                            <td>{{ $product->prix }} MAD</td>
                            <td>
                                <span class="stock-badge {{ $product->stock > 10 ? 'stock-in' : 'stock-out' }}">
                                    {{ $product->stock }} unités
                                </span>
                            </td>
                            <td>{{ $product->created_at->format('d/m/Y') }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('product.edit', $product->id) }}" class="btn-sm btn-edit">
                                        <i class="fas fa-edit"></i> Modifier
                                    </a>
                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-sm btn-delete" 
                                                onclick="return confirm('Supprimer ce produit ?')">
                                            <i class="fas fa-trash"></i> Supprimer
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 2rem;">
                                <i class="fas fa-box-open" style="font-size: 2rem; color: #ccc; margin-bottom: 1rem;"></i>
                                <p>Aucun produit pour le moment</p>
                                <a href="{{ route('product.create') }}" style="color: var(--primary-color);">
                                    Ajouter votre premier produit
                                </a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3><i class="fas fa-leaf"></i> GreenTech Solutions</h3>
                    <p>Votre partenaire pour un jardinage durable et écologique.</p>
                </div>
                <div class="footer-section">
                    <h4>Contact Admin</h4>
                    <p><i class="fas fa-envelope"></i> admin@greentech.com</p>
                    <p><i class="fas fa-phone"></i> +212 5XX-XXXXXX</p>
                    <p><i class="fas fa-map-marker-alt"></i> Casablanca, Maroc</p>
                </div>
                <div class="footer-section">
                    <h4>Suivez-nous</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 GreenTech Solutions. Tous droits réservés. | Administration</p>
            </div>
        </div>
    </footer>

    <script>
        // Animation pour les cartes de stats
        document.querySelectorAll('.stat-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        // Confirmation pour la suppression
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function(e) {
                if (!confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>