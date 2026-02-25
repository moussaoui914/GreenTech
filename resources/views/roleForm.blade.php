<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Rôles</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 800px;
            margin-top: 50px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .role-item {
            transition: all 0.3s;
        }
        .role-item:hover {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">
                    <i class="fas fa-user-tag"></i> Gestion des Rôles
                </h4>
            </div>
            
            <div class="card-body">
                <!-- Formulaire de création -->
                <h5 class="mb-3">Ajouter un nouveau rôle</h5>
                <form action="{{ route('role.store') }}" method="POST" class="mb-4">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <input type="text" 
                                   name="name" 
                                   class="form-control" 
                                   placeholder="Nom du rôle (ex: Administrateur)"
                                   required>
                        </div>
                        <div class="col-md-4">
                            <form action="{{route('role.store')}}">
                                <button type="submit" class="btn btn-success w-100">
                                    <i class="fas fa-plus"></i> Ajouter
                                </button>
                            </form>
                        </div>
                    </div>
                </form>

                <!-- Liste des rôles -->
                <h5 class="mb-3">Liste des rôles ({{ $roles->count() }})</h5>
                
                @if($roles->isEmpty())
                    <div class="alert alert-info">
                        Aucun rôle n'a été créé. Ajoutez-en un !
                    </div>
                @else
                    <div class="list-group">
                        @foreach($roles as $role)
                            <div class="list-group-item role-item d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="badge bg-primary me-2">#{{ $role->id }}</span>
                                    <strong>{{ $role->name }}</strong>
                                </div>
                                <div>
                                    <form action="{{route('role.destroy',$role->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" 
                                            onclick="confirmDelete({{ $role->id }}, '{{ $role->nom }}')">
                                        <i class="fas fa-trash"></i> Supprimer
                                    </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <!-- Bouton retour -->
                <div class="mt-4">
                    <a href="{{ route('usersList.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Retour aux utilisateurs
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulaire de suppression caché -->
    <form id="deleteForm" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

</body>
</html>