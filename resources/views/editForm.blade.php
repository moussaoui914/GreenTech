<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - GreenTech Solutions</title>
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

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        /* ==================== CONTAINER ==================== */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* ==================== NAVBAR ==================== */
        .navbar {
            background: var(--white);
            box-shadow: var(--shadow);
            padding: 1rem 0;
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
        }

        .nav-link:hover,
        .nav-link.active {
            background: var(--secondary-color);
            color: var(--primary-dark);
        }

        /* ==================== ADMIN HEADER ==================== */
        .admin-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
            color: var(--white);
            padding: 3rem 0;
            text-align: center;
        }

        .admin-header h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .admin-header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* ==================== BREADCRUMB ==================== */
        .breadcrumb {
            background: var(--white);
            padding: 1rem 0;
            border-bottom: 1px solid var(--secondary-color);
        }

        .breadcrumb .container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-light);
        }

        .breadcrumb a {
            color: var(--primary-color);
            transition: var(--transition);
        }

        .breadcrumb a:hover {
            color: var(--primary-dark);
        }

        /* ==================== FORM CONTAINER ==================== */
        .form-container {
            padding: 3rem 0;
        }

        .form-card {
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 2rem;
        }

        .form-card h2 {
            color: var(--primary-color);
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--secondary-color);
        }

        /* ==================== FORM ==================== */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
            font-weight: 500;
        }

        .form-group label.required::after {
            content: " *";
            color: var(--danger-color);
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid var(--secondary-color);
            border-radius: var(--border-radius);
            font-size: 1rem;
            font-family: inherit;
            transition: var(--transition);
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        .form-group input[type="file"] {
            padding: 0.5rem;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--secondary-color);
        }

        /* ==================== BUTTONS ==================== */
        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: var(--border-radius);
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: var(--primary-color);
            color: var(--white);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        .btn-secondary {
            background: var(--text-light);
            color: var(--white);
        }

        .btn-secondary:hover {
            background: var(--text-dark);
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
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .admin-header h1 {
                font-size: 2rem;
            }

            .form-card {
                padding: 1.5rem;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                <a href="#" class="nav-link">
                    <i class="fas fa-cogs"></i> Administration
                </a>
                <a href="#" class="nav-link">
                    <i class="fas fa-store"></i> Catalogue
                </a>
            </div>
        </div>
    </nav>

    <!-- Admin Header -->
    <header class="admin-header">
        <div class="container">
            <h1><i class="fas fa-edit"></i> Modifier le produit</h1>
            <p>Modifiez les informations du produit existant</p>
        </div>
    </header>

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <a href="/"><i class="fas fa-home"></i> Accueil</a>
            <span>/</span>
            <span>Modifier le produit</span>
        </div>
    </div>

    <!-- Main Form -->
    <main class="form-container">
        <div class="container">
            <div class="form-card">
                <h2>Modifier les informations du produit</h2>
                
                <!-- Formulaire HTML pur -->
                <form method="POST" action="{{route('product.update', $produit->id)}}" enctype="multipart/form-data">
                    @csrf <!-- Pour Laravel, sinon supprimez cette ligne -->
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="productName" class="required">Nom du Produit</label>
                        <input value="{{$produit->name}}" type="text" id="productName" name="name" required 
                               placeholder="Ex: Panneau Solaire 100W">
                    </div>

                    <div class="form-group">
                        <label for="productCategory" class="required">Catégorie</label>
                        <select id="productCategory" name="category_id" required>
                            <option value="">Sélectionner une catégorie</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{$produit->category_id == $category->id ? 'selected' : ''}}>
                                    {{$category->name}}
                                </option>                            
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="productPrice" class="required">Prix (MAD)</label>
                        <input value="{{$produit->prix}}" type="number" id="productPrice" name="prix" step="0.01" min="0" required 
                               placeholder="Ex: 1499.99">
                    </div>

                    <div class="form-group">
                        <label for="productStock" class="required">Stock</label>
                        <input value="{{$produit->stock}}" type="number" id="productStock" name="stock" min="0" required 
                               placeholder="Ex: 25">
                    </div>

                    <div class="form-group">
                        <label for="productDescription" class="required">Description</label>
                        <textarea id="productDescription" name="description" rows="5" required 
                                  placeholder="Décrivez le produit en détail...">{{$produit->description}}</textarea>
                    </div>

                    <div class="form-actions">
                        <a href="{{route('homePage')}}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Annuler
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Mettre à jour
                        </button>
                    </div>
                </form>
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
                    <h4>Contact</h4>
                    <p><i class="fas fa-envelope"></i> contact@greentech.com</p>
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
                <p>&copy; 2024 GreenTech Solutions. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</body>
</html>