<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Utilisateurs</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3a0ca3;
            --success-color: #4cc9f0;
            --warning-color: #f8961e;
            --danger-color: #f94144;
            --light-color: #f8f9fa;
            --dark-color: #212529;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background-color: #f5f7fb;
        }

        .sidebar {
            background: linear-gradient(180deg, var(--primary-color), var(--secondary-color));
            min-height: 100vh;
            position: fixed;
            width: 250px;
            z-index: 1000;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.85);
            padding: 0.8rem 1.5rem;
            margin: 0.2rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.15);
            color: white;
        }

        .sidebar .nav-link i {
            width: 24px;
            text-align: center;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .stat-card {
            border-radius: 12px;
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-active {
            background-color: #d1fae5;
            color: #065f46;
        }

        .status-inactive {
            background-color: #fee2e2;
            color: #991b1b;
        }
        .btn-icon {
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 6px;
    border: none;
}

.btn-edit { background: #e8f0fe; color: #0d6efd; }
.btn-delete { background: #fee; color: #dc3545; }
.btn-role { background: #e8f5e9; color: #198754; }

.user-avatar {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    font-weight: bold;
}

.role-badge {
    padding: 4px 12px;
    border-radius: 20px;
    background: #e9ecef;
    color: #495057;
}

.status-active {
    background: #d4edda;
    color: #155724;
}

        .status-pending {
            background-color: #fef3c7;
            color: #92400e;
        }

        .role-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .role-admin {
            background-color: #ede9fe;
            color: #5b21b6;
        }

        .role-user {
            background-color: #dbeafe;
            color: #1e40af;
        }

        .role-moderator {
            background-color: #fce7f3;
            color: #9d174d;
        }

        .btn-icon {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-edit {
            background-color: #dbeafe;
            width: 120px;
            font-weight: bold;
            color: var(--primary-color);
        }

        .btn-edit:hover {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-delete {
            background-color: #fee2e2;
            color: var(--danger-color);
        }

        .btn-delete:hover {
            background-color: var(--danger-color);
            color: white;
        }

        .table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .table thead th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
            font-weight: 600;
            color: var(--dark-color);
            padding: 1rem;
        }

        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #dee2e6;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            padding-left: 40px;
            border-radius: 8px;
            border: 1px solid #dee2e6;
        }

        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
            }
            
            .sidebar .nav-link span {
                display: none;
            }
            
            .main-content {
                margin-left: 70px;
            }
            
            .sidebar .nav-link {
                text-align: center;
                padding: 0.8rem 0.5rem;
                margin: 0.2rem 0.5rem;
            }
        }

        @media (max-width: 576px) {
            .main-content {
                margin-left: 0;
                padding: 10px;
            }
            
            .sidebar {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <div class="row g-0">


            <!-- Main Content -->
            <div class="col-lg-10 main-content">
                <!-- Top Bar -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center py-3">
                            <h1 class="h3 mb-0 text-primary">
                                <i class="fas fa-users me-2"></i>
                                Gestion des Utilisateurs
                            </h1>
                            <div class="d-flex align-items-center">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('permissions.index') }}">
                                        <i class="fas fa-key me-2"></i>
                                        Permissions
                                    </a>
                                </li>
                                <div class="user-avatar me-2">AD</div>
                                <span class="me-3">Administrateur</span>
                                <div class="dropdown">
                                    <button class="btn btn-link text-dark" type="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profil</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Paramètres</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-2"></i>Déconnexion</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Toolbar -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-4 mb-3 mb-md-0">
                                        <div class="search-box">
                                            <i class="fas fa-search"></i>
                                            <input type="text" class="form-control" placeholder="Rechercher un utilisateur...">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mb-md-0">
                                        <div class="d-flex gap-2">
                                            <select class="form-select">
                                                <option selected>Tous les statuts</option>
                                                <option value="active">Actif</option>
                                                <option value="inactive">Inactif</option>
                                                <option value="pending">En attente</option>
                                            </select>
                                            <select class="form-select">
                                                <option selected>Tous les rôles</option>
                                                <option value="admin">Administrateur</option>
                                                <option value="user">Utilisateur</option>
                                                <option value="moderator">Modérateur</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-md-end">
                                        <a href="{{route('users.index')}}">
                                            <button class="btn btn-primary">
                                            <i class="fas fa-user-plus me-2"></i>
                                            Ajouter un utilisateur
                                        </button>
                                        </a>
                                        <a href="{{route('role.index')}}">
                                            <button class="btn btn-primary">
                                            <i class="fas fa-user-plus me-2"></i>
                                            Ajouter un Role
                                        </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Users Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card table-container border-0">
                            <div class="card-header bg-white border-0 py-3">
                                <h5 class="mb-0">
                                    <i class="fas fa-list me-2"></i>
                                    Liste des utilisateurs
                                </h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>#ID</th>
                                                <th>Utilisateur</th>
                                                <th>Email</th>
                                                <th>Rôle</th>
                                                <th>Statut</th>
                                                <th>Date d'inscription</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
<tbody>
    @foreach($users as $user)
    <tr>
        <td class="fw-semibold">{{ $user->id }}</td>
        
        <td>
            <div class="d-flex align-items-center">
                <div class="user-avatar me-3">{{ substr($user->firstname,0,1) }}{{ substr($user->lastname,0,1) }}</div>
                <div>
                    <h6 class="mb-0">{{ $user->firstname }}</h6>
                    <small class="text-muted">{{ $user->lastname }}</small>
                </div>
            </div>
        </td>
        
        <td>{{ $user->email }}</td>
        
        <td>
            <span class="role-badge">{{ $user->roles->first()->name ?? 'Aucun' }}</span>
        </td>
        
        <td>
            <span class="status-badge status-active">Actif</span>
        </td>
        
        <td>{{ $user->created_at->format('d/m/Y') }}</td>
        
        <td>
            <div class="d-flex gap-2">
                <!-- Modifier -->
                <a href="{{ route('user.edit', $user->id) }}" class="btn-icon btn-edit" title="Modifier">
                    <i class="fas fa-edit"></i>
                </a>
                
                <!-- Supprimer -->
                <form action="{{ route('user.destroy', $user->id) }}" method="POST" 
                      onsubmit="return confirm('Supprimer ?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn-icon btn-delete" title="Supprimer">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
                
                <!-- Bouton Rôle -->
                <button type="button" class="btn-icon btn-role" 
                        data-bs-toggle="modal" 
                        data-bs-target="#roleModal{{ $user->id }}" 
                        title="Rôle">
                    <i class="fas fa-user-tag"></i>
                </button>
            </div>
        </td>
    </tr>
    
    <!-- POPUP RÔLE (1 par utilisateur) -->
    <div class="modal fade" id="roleModal{{ $user->id }}" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white py-2">
                    <h6 class="modal-title">
                        <i class="fas fa-user-tag me-2"></i>Rôle : {{ $user->firstname }}
                    </h6>
                    <button type="button" class="btn-close btn-close-white btn-sm" data-bs-dismiss="modal"></button>
                </div>
                
                <form action="{{ route('users.assign.role') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    
                    <div class="modal-body">
                        <select class="form-select" name="role" required>
                            <option value="" disabled selected>-- Choisir un rôle --</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}" 
                                    {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="modal-footer py-2">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-sm btn-success">
                            <i class="fas fa-check me-1"></i>Affecter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    {{-- <script>
        // Script pour la sidebar mobile
        document.addEventListener('DOMContentLoaded', function() {
            // Exemple de confirmation de suppression
            document.querySelectorAll('.btn-delete').forEach(button => {
                button.addEventListener('click', function() {
                    if (confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')) {
                        // Logique de suppression ici
                        alert('Utilisateur supprimé (simulation)');
                    }
                });
            });
        });
    </script> --}}
</body>
</html>