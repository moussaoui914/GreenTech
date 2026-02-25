<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenTech Solutions - Produits Écologiques</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Votre CSS existant */
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

        .welcome-message {
            background: linear-gradient(135deg, #2d6a4f, #1b4332);
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
        }

        .add-product-btn {
            text-align: right;
            margin: 20px 0;
        }

        .btn-add {
            background: #2d6a4f;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-add:hover {
            background: #1b4332;
        }

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

        .product-actions {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 10;
            display: flex;
            gap: 5px;
        }

        .action-btn {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .edit-btn {
            background: #4CAF50;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .delete-form {
            display: inline;
        }

        .delete-btn {
            background: #f44336;
            color: white;
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
        .product-card {
    position: relative;
}

.favorite-icon {
    position: absolute;
    top: 15px;
    right: 15px;
    z-index: 20;
}

.favorite-btn {
    background: rgba(255, 255, 255, 0.9);
    border: none;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}

.favorite-btn:hover {
    background: white;
    transform: scale(1.1);
    box-shadow: 0 3px 8px rgba(0,0,0,0.3);
}

.favorite-btn.active {
    background: rgba(255, 105, 97, 0.1);
}

.favorite-btn.active i {
    color: #ff6961;
}

.favorite-btn i {
    font-size: 18px;
    color: #666;
    transition: color 0.3s ease;
}

.favorite-btn:hover i {
    color: #ff6961;
}

/* Ajustement pour ne pas chevaucher les actions admin */
.product-actions {
    position: absolute;
    top: 15px;
    left: 15px;
    z-index: 20;
    display: flex;
    gap: 8px;
}

/* Si l'utilisateur n'est pas connecté, cacher l'icône cœur */
@guest .favorite-icon { display: none; } @endguest

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

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 40px 0;
            list-style: none;
        }

        .pagination li {
            display: inline;
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

        .pagination .active a {
            background: #2d6a4f;
            color: white;
            border-color: #2d6a4f;
        }

        .pagination .disabled a {
            background: #f8f9fa;
            color: #6c757d;
            cursor: not-allowed;
        }
                /* ==================== VARIABLES ==================== */
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
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* ==================== NAVBAR ==================== */
.navbar {
    background: var(--white);
    box-shadow: var(--shadow);
    position: sticky;
    top: 0;
    z-index: 1000;
    padding: 1rem 0;
}

.navbar .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 2rem;
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

.nav-search {
    display: flex;
    flex: 1;
    max-width: 500px;
    gap: 0.5rem;
}

.nav-search input {
    flex: 1;
    padding: 0.75rem 1rem;
    border: 2px solid var(--secondary-color);
    border-radius: var(--border-radius);
    font-size: 1rem;
    transition: var(--transition);
    width: 300px;
}

.nav-search input:focus {
    outline: none;
    border-color: var(--primary-color);
}

.nav-search button {
    padding: 0.75rem 1.5rem;
    background: var(--primary-color);
    color: var(--white);
    border: none;
    border-radius: var(--border-radius);
    cursor: pointer;
    transition: var(--transition);
    position: absolute;
    left: 818px;
    top: 42px;
}

.nav-search button:hover {
    background: var(--primary-dark);
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

/* ==================== HERO SECTION ==================== */
.hero {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
    color: var(--white);
    padding: 4rem 0;
    text-align: center;
}

.hero h1 {
    font-size: 3rem;
    margin-bottom: 1rem;
}

.hero p {
    font-size: 1.3rem;
    opacity: 0.9;
}

/* ==================== FILTERS ==================== */
.filters {
    background: var(--white);
    padding: 2rem 0;
    box-shadow: var(--shadow);
}

.filters h2 {
    color: var(--primary-color);
    margin-bottom: 1.5rem;
    text-align: center;
}

.filter-buttons {
    display: flex;
    justify-content: center;
    gap: 1rem;
    flex-wrap: wrap;
}

.filter-btn {
    padding: 0.75rem 1.5rem;
    background: var(--bg-light);
    border: 2px solid var(--secondary-color);
    border-radius: var(--border-radius);
    cursor: pointer;
    font-size: 1rem;
    font-weight: 500;
    color: var(--text-dark);
    transition: var(--transition);
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.filter-btn:hover {
    background: var(--secondary-color);
    transform: translateY(-2px);
}

.filter-btn.active {
    background: var(--primary-color);
    color: var(--white);
    border-color: var(--primary-color);
}

/* ==================== PRODUCTS GRID ==================== */
.products {
    padding: 3rem 0;
}

.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
}

.product-card {
    background: var(--white);
    border-radius: var(--border-radius);
    overflow: hidden;
    box-shadow: var(--shadow);
    transition: var(--transition);
    cursor: pointer;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
}

.product-image {
    width: 100%;
    height: 250px;
    object-fit: cover;
    background: var(--bg-light);
}

.product-info {
    padding: 1.5rem;
}

.product-category {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    background: var(--secondary-color);
    color: var(--primary-dark);
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 500;
    margin-bottom: 0.5rem;
}

.product-name {
    font-size: 1.3rem;
    font-weight: bold;
    color: var(--text-dark);
    margin: 0.5rem 0;
}

.product-price {
    font-size: 1.5rem;
    color: var(--primary-color);
    font-weight: bold;
    margin: 0.5rem 0;
}

.product-stock {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--text-light);
    font-size: 0.9rem;
    margin-top: 0.5rem;
}

.stock-badge {
    padding: 0.25rem 0.5rem;
    border-radius: 4px;
    font-size: 0.85rem;
    font-weight: 500;
}

.stock-badge.in-stock {
    background: #d1f2d1;
    color: #1b5e20;
}

.stock-badge.low-stock {
    background: #fff3cd;
    color: #856404;
}

.stock-badge.out-stock {
    background: #f8d7da;
    color: #721c24;
}

.no-results {
    text-align: center;
    padding: 4rem 2rem;
    color: var(--text-light);
}

.no-results i {
    font-size: 4rem;
    margin-bottom: 1rem;
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

/* ==================== PRODUCT DETAILS ==================== */
.product-details {
    padding: 3rem 0;
}

.product-detail-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 3rem;
    background: var(--white);
    padding: 2rem;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow);
}

/* Images Product */
.product-detail-left {
    position: sticky;
    top: 100px;
    height: fit-content;
}

.product-images {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.product-detail-image {
    width: 100%;
    height: 500px;
    object-fit: cover;
    border-radius: var(--border-radius);
    border: 2px solid var(--secondary-color);
}

.image-thumbnails {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 0.75rem;
}

.thumbnail {
    width: 100%;
    height: 100px;
    object-fit: cover;
    border-radius: var(--border-radius);
    cursor: pointer;
    border: 2px solid var(--secondary-color);
    transition: var(--transition);
    opacity: 0.6;
}

.thumbnail:hover,
.thumbnail.active {
    border-color: var(--primary-color);
    opacity: 1;
    transform: scale(1.05);
}

/* Product Info */
.product-detail-info h1 {
    font-size: 2.5rem;
    color: var(--primary-color);
    margin-bottom: 1rem;
    line-height: 1.2;
}

.product-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
}

.product-sku {
    color: var(--text-light);
    font-size: 0.9rem;
}

/* Rating */
.product-rating {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin: 1rem 0;
}

.stars {
    color: #ffa500;
    font-size: 1.1rem;
}

.rating-count {
    color: var(--text-light);
    font-size: 0.95rem;
}

/* Price Section */
.product-price-section {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin: 1.5rem 0;
    flex-wrap: wrap;
}

.product-detail-info .product-price {
    font-size: 2.5rem;
    margin: 0;
}

.product-price-old {
    font-size: 1.5rem;
    color: var(--text-light);
    text-decoration: line-through;
}

.product-badge {
    background: var(--danger-color);
    color: var(--white);
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: bold;
}

.product-short-description {
    color: var(--text-dark);
    line-height: 1.7;
    margin: 1.5rem 0;
    font-size: 1.05rem;
}

.product-detail-info .product-stock {
    font-size: 1.1rem;
    margin: 1rem 0;
}

/* Quantity Selector */
.product-quantity {
    margin: 2rem 0;
}

.product-quantity label {
    display: block;
    margin-bottom: 0.75rem;
    font-weight: 500;
    color: var(--text-dark);
}

.quantity-selector {
    display: flex;
    align-items: center;
    gap: 0;
    width: fit-content;
    border: 2px solid var(--secondary-color);
    border-radius: var(--border-radius);
    overflow: hidden;
}

.qty-btn {
    background: var(--bg-light);
    border: none;
    padding: 0.75rem 1rem;
    cursor: pointer;
    transition: var(--transition);
    color: var(--text-dark);
}

.qty-btn:hover {
    background: var(--secondary-color);
    color: var(--primary-dark);
}

.quantity-selector input {
    width: 60px;
    text-align: center;
    border: none;
    border-left: 2px solid var(--secondary-color);
    border-right: 2px solid var(--secondary-color);
    padding: 0.75rem;
    font-size: 1rem;
    font-weight: bold;
}

.quantity-selector input:focus {
    outline: none;
}

/* Product Actions */
.product-actions {
    display: flex;
    gap: 1rem;
    margin: 2rem 0;
}

.btn-large {
    flex: 1;
    padding: 1rem 2rem;
    font-size: 1.1rem;
}

.btn-icon-only {
    width: 60px;
    padding: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

.wishlist-btn i {
    font-size: 1.3rem;
}

.add-to-cart {
    position: relative;
    overflow: hidden;
}

.add-to-cart:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

/* Product Features */
.product-features {
    display: grid;
    gap: 1rem;
    margin: 2rem 0;
    padding: 1.5rem;
    background: var(--bg-light);
    border-radius: var(--border-radius);
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.feature-item i {
    font-size: 2rem;
    color: var(--primary-color);
}

.feature-item strong {
    display: block;
    color: var(--text-dark);
    margin-bottom: 0.25rem;
}

.feature-item span {
    color: var(--text-light);
    font-size: 0.9rem;
}

/* Tabs */
.product-tabs {
    margin-top: 3rem;
    border-top: 2px solid var(--secondary-color);
    padding-top: 2rem;
}

.tabs-header {
    display: flex;
    gap: 0.5rem;
    margin-bottom: 2rem;
    border-bottom: 2px solid var(--secondary-color);
}

.tab-btn {
    padding: 1rem 1.5rem;
    background: transparent;
    border: none;
    cursor: pointer;
    color: var(--text-light);
    font-weight: 500;
    transition: var(--transition);
    border-bottom: 3px solid transparent;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.tab-btn:hover {
    color: var(--primary-color);
}

.tab-btn.active {
    color: var(--primary-color);
    border-bottom-color: var(--primary-color);
}

.tab-panel {
    display: none;
}

.tab-panel.active {
    display: block;
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.tab-panel h3 {
    color: var(--primary-color);
    margin-bottom: 1rem;
}

.tab-panel h4 {
    color: var(--primary-dark);
    margin: 1.5rem 0 0.75rem;
}

.tab-panel ul {
    list-style: none;
    padding: 0;
}

.tab-panel ul li {
    padding: 0.5rem 0;
    padding-left: 1.5rem;
    position: relative;
}

.tab-panel ul li:before {
    content: "✓";
    position: absolute;
    left: 0;
    color: var(--primary-color);
    font-weight: bold;
}

.care-section {
    margin: 1.5rem 0;
    padding: 1rem;
    background: var(--bg-light);
    border-radius: var(--border-radius);
}

.care-section h4 {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--primary-color);
    margin: 0 0 0.75rem 0;
}

.care-section i {
    color: var(--primary-light);
}

/* Shipping Info */
.shipping-info {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.shipping-option {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 1.5rem;
    background: var(--bg-light);
    border-radius: var(--border-radius);
    border: 2px solid var(--secondary-color);
    transition: var(--transition);
}

.shipping-option:hover {
    border-color: var(--primary-color);
    transform: translateX(5px);
}

.shipping-option i {
    font-size: 2rem;
    color: var(--primary-color);
}

.shipping-option h4 {
    margin: 0 0 0.5rem 0;
    color: var(--primary-dark);
}

.shipping-option p {
    margin: 0.25rem 0;
    color: var(--text-dark);
}

.shipping-option .price {
    color: var(--primary-color);
    font-weight: bold;
    font-size: 1.1rem;
}

.shipping-note {
    display: flex;
    gap: 1rem;
    padding: 1rem;
    background: #e8f5e9;
    border-radius: var(--border-radius);
    margin-top: 1rem;
    border-left: 4px solid var(--primary-color);
}

.shipping-note i {
    color: var(--primary-color);
    font-size: 1.5rem;
}

.shipping-note p {
    margin: 0;
    color: var(--text-dark);
}

.loading {
    text-align: center;
    padding: 4rem 2rem;
    color: var(--text-light);
}

.loading i {
    font-size: 3rem;
    margin-bottom: 1rem;
}

/* ==================== RELATED PRODUCTS ==================== */
.related-products {
    padding: 3rem 0;
}

.related-products h2 {
    color: var(--primary-color);
    margin-bottom: 2rem;
    text-align: center;
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

/* ==================== ADMIN CONTENT ==================== */
.admin-content {
    padding: 3rem 0;
}

.admin-actions {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 2rem;
}

/* ==================== STATS CARDS ==================== */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    margin-bottom: 3rem;
}

.stat-card {
    background: var(--white);
    padding: 2rem;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow);
    display: flex;
    align-items: center;
    gap: 1.5rem;
    transition: var(--transition);
}

.stat-card:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-lg);
}

.stat-card i {
    font-size: 3rem;
    color: var(--primary-color);
}

.stat-info h3 {
    font-size: 2.5rem;
    color: var(--primary-color);
    margin-bottom: 0.25rem;
}

.stat-info p {
    color: var(--text-light);
    font-size: 1rem;
}

/* ==================== ADMIN TABLE ==================== */
.admin-table-container {
    background: var(--white);
    padding: 2rem;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow);
}

.admin-table-container h2 {
    color: var(--primary-color);
    margin-bottom: 1.5rem;
}

.table-responsive {
    overflow-x: auto;
}

.admin-table {
    width: 100%;
    border-collapse: collapse;
}

.admin-table thead {
    background: var(--primary-color);
    color: var(--white);
}

.admin-table th,
.admin-table td {
    padding: 1rem;
    text-align: left;
    border-bottom: 1px solid var(--secondary-color);
}

.admin-table tbody tr {
    transition: var(--transition);
}

.admin-table tbody tr:hover {
    background: var(--bg-light);
}

.admin-table img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 4px;
}

.action-buttons {
    display: flex;
    gap: 0.5rem;
}

.btn-icon {
    padding: 0.5rem;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: var(--transition);
    font-size: 1rem;
}

.btn-edit {
    background: var(--primary-light);
    color: var(--white);
}

.btn-edit:hover {
    background: var(--primary-color);
}

.btn-delete {
    background: var(--danger-color);
    color: var(--white);
}

.btn-delete:hover {
    background: #a71d1d;
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

.btn-danger {
    background: var(--danger-color);
    color: var(--white);
}

.btn-danger:hover {
    background: #a71d1d;
}

/* ==================== MODAL ==================== */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 2000;
    align-items: center;
    justify-content: center;
}

.modal.active {
    display: flex;
}

.modal-content {
    background: var(--white);
    border-radius: var(--border-radius);
    max-width: 600px;
    width: 90%;
    max-height: 90vh;
    overflow-y: auto;
    box-shadow: var(--shadow-lg);
}

.modal-small {
    max-width: 400px;
}

.modal-header {
    padding: 1.5rem;
    border-bottom: 1px solid var(--secondary-color);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.modal-header h2 {
    color: var(--primary-color);
}

.close-btn,
.close-btn-delete {
    background: none;
    border: none;
    font-size: 2rem;
    cursor: pointer;
    color: var(--text-light);
    transition: var(--transition);
}

.close-btn:hover,
.close-btn-delete:hover {
    color: var(--danger-color);
}

.modal-body {
    padding: 2rem 1.5rem;
}

.modal-actions {
    padding: 1.5rem;
    border-top: 1px solid var(--secondary-color);
    display: flex;
    justify-content: flex-end;
    gap: 1rem;
}

/* ==================== FORM ==================== */
#productForm {
    padding: 1.5rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    color: var(--text-dark);
    font-weight: 500;
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

.warning-text {
    color: var(--danger-color);
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-top: 1rem;
}

/* ==================== TOAST ==================== */
.toast {
    position: fixed;
    bottom: 2rem;
    right: 2rem;
    background: var(--success-color);
    color: var(--white);
    padding: 1rem 1.5rem;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-lg);
    display: none;
    align-items: center;
    gap: 0.75rem;
    z-index: 3000;
    animation: slideIn 0.3s ease;
}

.toast.show {
    display: flex;
}

.toast.error {
    background: var(--danger-color);
}

@keyframes slideIn {
    from {
        transform: translateX(400px);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
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

    .nav-search {
        width: 100%;
        max-width: 100%;
    }

    .nav-links {
        width: 100%;
        justify-content: center;
    }

    .hero h1 {
        font-size: 2rem;
    }

    .hero p {
        font-size: 1rem;
    }

    .products-grid {
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 1.5rem;
    }

    .product-detail-content {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .product-detail-left {
        position: static;
    }

    .product-detail-image {
        height: 350px;
    }
    
    .image-thumbnails {
        grid-template-columns: repeat(4, 1fr);
    }
    
    .thumbnail {
        height: 80px;
    }

    .product-detail-info h1 {
        font-size: 2rem;
    }
    
    .product-price-section {
        flex-wrap: wrap;
    }
    
    .product-detail-info .product-price {
        font-size: 2rem;
    }
    
    .product-actions {
        flex-direction: column;
    }
    
    .btn-icon-only {
        width: 100%;
    }
    
    .tabs-header {
        flex-wrap: wrap;
    }
    
    .tab-btn {
        flex: 1;
        min-width: 120px;
        padding: 0.75rem 1rem;
        font-size: 0.9rem;
    }
    
    .shipping-option {
        flex-direction: column;
        text-align: center;
        align-items: center;
    }

    .stats-grid {
        grid-template-columns: 1fr;
    }

    .admin-table {
        font-size: 0.9rem;
    }

    .admin-table th,
    .admin-table td {
        padding: 0.75rem 0.5rem;
    }

    .modal-content {
        width: 95%;
    }
}

@media (max-width: 480px) {
    .filter-buttons {
        flex-direction: column;
    }

    .filter-btn {
        width: 100%;
        justify-content: center;
    }

    .products-grid {
        grid-template-columns: 1fr;
    }
    
    .product-detail-image {
        height: 300px;
    }
    
    .image-thumbnails {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .thumbnail {
        height: 100px;
    }
    
    .product-detail-info h1 {
        font-size: 1.5rem;
    }
    
    .tabs-header {
        flex-direction: column;
    }
    
    .tab-btn {
        width: 100%;
    }
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
                <div class="nav-search"> 
                    <form action="{{url('my_search')}}" method="GET"> 
                        <input type="search" name="search" id="searchInput" value="{{request('search')}}" placeholder="Rechercher un produit"> 
                        <button type="submit" value="search" id="searchBtn"> 
                            <i class="fas fa-search"></i> 
                        </button> 
                    </form> 
                </div>
                @auth
    <!-- Ajoutez ce lien dans votre navbar -->
    <a href="{{ route('favoris.index') }}" class="nav-link" style="color: #ff6b6b;">
        <i class="fas fa-heart"></i> Mes Favoris
    </a>
    <a href="{{ route('usersList.index') }}" class="nav-link" style="color: #151517;">
     Users
    </a>

@endauth
                    @auth
                        

                            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                <i class="fas fa-cogs"></i> Dashboard Admin
                            </a>
                            <a href="{{ route('product.create') }}" class="nav-link">
                                <i class="fas fa-plus"></i> Ajouter produit
                            </a>

                        
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

    <!-- Message de bienvenue -->
    @auth
        <div class="container">
            <div class="welcome-message">
                <h2>👋 Bienvenue, {{ Auth::user()->firstname }} !</h2>
                <p>Nous sommes ravis de vous revoir sur GreenTech Solutions.</p>
            </div>
        </div>
    @endauth

    <!-- Section des produits -->
    <div class="container">
        <!-- Messages de succès/erreur -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        <!-- Bouton pour ajouter un produit (visible seulement pour admin) -->
        @auth
                <div class="add-product-btn">
                    <a href="{{ route('product.create') }}" class="btn-add">
                        <i class="fas fa-plus"></i> Ajouter un nouveau produit
                    </a>
                </div>
        @endauth
        
    <div id="productsGrid" class="products-grid">
    @foreach ($products as $produit)
    <div class="product-card">
        @auth
                <div class="product-actions">
                    <a href="{{ route('product.edit', $produit->id) }}" 
                       class="action-btn edit-btn" 
                       onclick="event.stopPropagation();">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('product.destroy', $produit->id) }}" 
                          method="POST" 
                          class="delete-form"
                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-btn delete-btn" onclick="event.stopPropagation();">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
        @endauth
        
@auth
    <div class="favorite-icon">
        @php
            $user_id = Auth::user()->id;
            $user = App\Models\User::find($user_id);
            
            $isFavorite = $user->favoriteProducts()->where('produit_id', $produit->id)->exists();

            $favorisExist = $produit->isFavoritedBy($user_id);

            var_dump($favorisExist);




        @endphp
        
        <form action="{{ route('favoris.toggle', $produit->id) }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="favorite-btn @if($isFavorite) active @endif" 
                    onclick="event.stopPropagation();"
                    style="background: none; border: none; cursor: pointer;">
                <i class="fas @if($isFavorite) fa-heart @else fa-heart-o @endif" 
                   style="color: @if($isFavorite) #ff6b6b @else #666 @endif;"></i>

            </button>
        </form>
    </div>
@endauth
        
        <div onclick="window.location.href='{{ route('productDetails', ['id' => $produit->id]) }}'">
            <!-- Afficher l'image du produit depuis le stockage -->
            <img src="{{ asset('storage/' . $produit->image) }}" 
                 alt="{{ $produit->name }}" 
                 class="product-image"
                 onerror="this.src='https://images.unsplash.com/photo-1614594975525-e45190c55d0b?w=500'">
            
            <div class="product-info">
                <span class="product-category">
                    <i class="fas fa-seedling"></i> {{ $produit->category->name ?? 'Catégorie' }}
                </span>
                <h3 class="product-name">{{ $produit->name }}</h3>
                <p class="product-price">{{ number_format($produit->prix, 2) }} MAD</p>
                <div class="product-stock">
                    <span class="stock-badge {{ $produit->stock > 0 ? 'in-stock' : 'out-stock' }}">
                        <i class="fas {{ $produit->stock > 0 ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
                        {{ $produit->stock > 0 ? 'En stock (' . $produit->stock . ')' : 'Rupture de stock' }}
                    </span>
                </div>
            </div>
        </div>
    </div> 
    @endforeach
</div>

        <!-- Pagination -->
        @if($products instanceof \Illuminate\Pagination\LengthAwarePaginator && $products->hasPages())
            <div class="pagination">
                {{ $products->links() }}
            </div>
        @endif
    </div>

    <script>
        // Confirmation pour la suppression
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                if (!confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')) {
                    e.preventDefault();
                }
            });
        });

        // Empêcher la navigation quand on clique sur les boutons d'action
        document.querySelectorAll('.product-actions a, .product-actions button').forEach(button => {
            button.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        });
        function toggleFavorite(productId, button) {
    event.stopPropagation(); // Empêche la redirection vers la page du produit
    
    // Vérifier si l'utilisateur est connecté
    @if(!auth()->check())
        window.location.href = '{{ route("login") }}';
        return;
    @endif
    
    fetch(`/products/${productId}/toggle-favorite`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
        },
        body: JSON.stringify({})
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Erreur réseau');
        }
        return response.json();
    })
    .then(data => {
        if (data.status === 'added') {
            button.classList.add('active');
            button.querySelector('i').className = 'fas fa-heart';
            showNotification('✓ Produit ajouté aux favoris!', 'success');
        } else if (data.status === 'removed') {
            button.classList.remove('active');
            button.querySelector('i').className = 'fas fa-heart-o';
            showNotification('Produit retiré des favoris', 'info');
        }
    })
    .catch(error => {
        console.error('Erreur:', error);
        showNotification('❌ Une erreur est survenue!', 'error');
    });
}

// Fonction pour afficher des notifications temporaires
function showNotification(message, type = 'info') {
    // Vérifier si une notification existe déjà
    let existingNotification = document.querySelector('.notification');
    if (existingNotification) {
        existingNotification.remove();
    }
    
    // Créer la notification
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.textContent = message;
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 15px 20px;
        background: ${type === 'success' ? '#4CAF50' : type === 'error' ? '#f44336' : '#2196F3'};
        color: white;
        border-radius: 5px;
        z-index: 9999;
        animation: slideIn 0.3s ease;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    `;
    
    document.body.appendChild(notification);
    
    // Supprimer après 3 secondes
    setTimeout(() => {
        notification.style.animation = 'slideOut 0.3s ease';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// Animations CSS pour les notifications
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    
    @keyframes slideOut {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(100%); opacity: 0; }
    }
`;
document.head.appendChild(style);
    </script>
</body>
</html>