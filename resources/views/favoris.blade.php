<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Favoris - GreenTech Solutions</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Réutilisez votre CSS existant de homePage */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
        }

        .navbar {
            background: white;
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .nav-content {
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
            color: #2d6a4f;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .nav-link {
            padding: 0.5rem 1rem;
            color: #212529;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background: #95d5b2;
        }

        .btn-logout {
            background: none;
            border: none;
            padding: 0.5rem 1rem;
            color: #212529;
            cursor: pointer;
            font-family: inherit;
            font-size: 1rem;
            border-radius: 5px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-logout:hover {
            background: #95d5b2;
        }

        /* Header des favoris */
        .favoris-header {
            background: linear-gradient(135deg, #ff6b6b, #ff8e8e);
            color: white;
            padding: 40px 0;
            text-align: center;
            margin-bottom: 30px;
            border-radius: 10px;
        }

        .favoris-header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .favoris-header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .favoris-count {
            background: white;
            color: #ff6b6b;
            padding: 5px 15px;
            border-radius: 20px;
            display: inline-block;
            margin-top: 15px;
            font-weight: bold;
        }

        /* Message vide */
        .empty-favoris {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin: 40px 0;
        }

        .empty-favoris i {
            font-size: 4rem;
            color: #ddd;
            margin-bottom: 20px;
        }

        .empty-favoris h3 {
            color: #666;
            margin-bottom: 10px;
            font-size: 1.5rem;
        }

        .empty-favoris p {
            color: #888;
            margin-bottom: 20px;
        }

        /* Grid des produits (identique à homePage) */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }
        
        .product-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            cursor: pointer;
            position: relative;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
        }

        .remove-favori {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 10;
        }

        .remove-favori button {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ff6b6b;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .remove-favori button:hover {
            background: white;
            transform: scale(1.1);
        }

        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .product-info {
            padding: 1.5rem;
        }

        .product-category {
            color: #2d6a4f;
            font-size: 0.9rem;
            font-weight: 500;
            display: block;
            margin-bottom: 0.5rem;
        }

        .product-name {
            margin: 0.5rem 0;
            font-size: 1.25rem;
        }

        .product-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2d6a4f;
            margin: 0.5rem 0;
        }

        .stock-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .in-stock {
            background: #d4edda;
            color: #155724;
        }

        .out-stock {
            background: #f8d7da;
            color: #721c24;
        }

        /* Messages */
        .alert {
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 40px 0;
            list-style: none;
        }

        .pagination a {
            padding: 8px 16px;
            background: white;
            color: #2d6a4f;
            border: 1px solid #95d5b2;
            border-radius: 5px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .pagination a:hover {
            background: #2d6a4f;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <div class="nav-content">
                <a href="/" class="nav-brand">
                    <i class="fas fa-leaf"></i>
                    <span>GreenTech Solutions</span>
                </a>
                
                <div class="nav-links">
                    @auth
                        <span style="color: #2d6a4f; font-weight: 500;">
                            Bonjour, {{ Auth::user()->firstname }}!
                        </span>
                        
                        <!-- Lien vers les favoris -->
                        <a href="{{ route('favoris.index') }}" class="nav-link" style="color: #ff6b6b;">
                            <i class="fas fa-heart"></i> Mes Favoris
                            @php
                                $user_id = Auth::user()->id;
                                $user = App\Models\User::find($user_id);
                                $favorisCount = $user->favoriteProducts()->count();
                            @endphp
                            @if($favorisCount > 0)
                                <span style="background: #ff6b6b; color: white; padding: 2px 8px; border-radius: 10px; font-size: 0.8rem;">
                                    {{ $favorisCount }}
                                </span>
                            @endif
                        </a>
                        
                        @if(App\Models\User::find(Auth::user()->id)->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                <i class="fas fa-cogs"></i> Dashboard Admin
                            </a>
                        @endif
                        
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn-logout">
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
        </div>
    </nav>

    <!-- Header des favoris -->
    <div class="container">
        <div class="favoris-header">
            <h1><i class="fa-regular fa-heart"></i> Mes Favoris</h1>
            <p>Retrouvez ici tous vos produits coups de cœur</p>
            <div class="favoris-count">
                {{ $favoris->total() }} produit(s) favori(s)
            </div>
        </div>

        <!-- Messages -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Contenu -->
        @if($favoris->isEmpty())
            <div class="empty-favoris">
                <i class="far fa-heart"></i>
                <h3>Vous n'avez pas encore de favoris</h3>
                <p>Explorez notre catalogue et ajoutez des produits à vos favoris !</p>
                <a href="{{ route('homePage') }}" class="nav-link" style="background: #2d6a4f; color: white; display: inline-block;">
                    <i class="fas fa-store"></i> Voir les produits
                </a>
            </div>
        @else
            <div class="products-grid">
                @foreach($favoris as $produit)
                <div class="product-card">
                    <!-- Bouton pour retirer des favoris -->
                    <div class="remove-favori">
                        <form action="{{ route('favoris.destroy', $produit->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Retirer des favoris">
                                <i class="fas fa-times"></i>
                            </button>
                        </form>
                    </div>
                    
                    <div onclick="window.location.href='{{ route('productDetails', ['id' => $produit->id]) }}'">
                        <img src="https://images.unsplash.com/photo-1614594975525-e45190c55d0b?w=500" 
                             alt="{{ $produit->name }}" 
                             class="product-image">
                        <div class="product-info">
                            <span class="product-category">
                                <i class="fas fa-seedling"></i> {{ $produit->category->name ?? 'Non catégorisé' }}
                            </span>
                            <h3 class="product-name">{{ $produit->name }}</h3>
                            <p class="product-price">{{ number_format($produit->prix, 2) }} MAD</p>
                            <div class="product-stock">
                                <span class="stock-badge {{ $produit->stock > 0 ? 'in-stock' : 'out-stock' }}">
                                    <i class="fas {{ $produit->stock > 0 ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
                                    {{ $produit->stock > 0 ? 'En stock' : 'Rupture' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            @if($favoris->hasPages())
                <div class="pagination">
                    {{ $favoris->links() }}
                </div>
            @endif
        @endif
    </div>

</body>
</html>