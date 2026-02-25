<!-- resources/views/roles/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Rôles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    
    <h2>Gestion des Rôles</h2>
    
    <!-- Formulaire Ajout -->
    <form method="POST" action="{{ route('role.store') }}" class="mb-3">
        @csrf
        <div class="input-group">
            <input type="text" name="nom" class="form-control" placeholder="Nom du rôle" required>
            <button class="btn btn-primary">Ajouter</button>
        </div>
    </form>

    <!-- Liste -->
    <ul class="list-group">
        @foreach($roles as $role)
            <li class="list-group-item d-flex justify-content-between">
                {{ $role->nom }}
                <form method="POST" action="{{ route('role.destroy', $role->id) }}">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">X</button>
                </form>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('usersList.index') }}" class="btn btn-secondary mt-3">← Retour</a>

</body>
</html>