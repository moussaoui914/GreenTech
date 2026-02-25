<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Permissions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container py-4">
        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3><i class="fas fa-key text-primary me-2"></i>Gestion des Permissions</h3>
            <a href="{{ route('usersList.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i>Retour
            </a>
        </div>

        {{-- Message --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Sélection rôle --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-light py-3">
                <h5 class="mb-0"><i class="fas fa-users me-2"></i>Sélectionner un rôle</h5>
            </div>
            <div class="card-body">
                <div class="d-flex flex-wrap gap-2">
                    @foreach($roles as $role)
                        <a href="{{ route('permissions.index', ['role_id' => $role->id]) }}" 
                           class="btn btn-outline-primary {{ $selectedRole?->id == $role->id ? 'active' : '' }}">
                            <i class="fas fa-user-tag me-1"></i>{{ $role->name }}
                            <span class="badge bg-secondary ms-2">{{ $role->permissions->count() }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Permissions --}}
        @if($selectedRole)
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0">
                        <i class="fas fa-lock me-2"></i>Permissions: {{ $selectedRole->name }}
                    </h5>
                </div>
                
                <form action="{{ route('permissions.assign') }}" method="POST">
                    @csrf
                    <input type="hidden" name="role_id" value="{{ $selectedRole->id }}">
                    
                    <div class="card-body">
                        @php
                            $groups = [];
                            foreach($permissions as $perm) {
                                $group = explode('.', $perm->name)[0] ?? 'autres';
                                $groups[$group][] = $perm;
                            }
                        @endphp

@foreach($groups as $group => $items)
    <div class="mb-4">
        <h6 class="text-uppercase text-muted border-bottom pb-2">
            <i class="fas fa-folder me-2"></i>{{ ucfirst($group) }}
        </h6>
        <div class="row">
            @foreach($items as $permission)
                <div class="col-md-4 col-sm-6 mb-2">
                    <div class="form-check">
                        <input class="form-check-input" 
                            type="checkbox" 
                            name="permissions[]" 
                            value="{{ $permission->name }}" 
                            id="perm_{{ $permission->id }}"
                            {{ $selectedRole->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                        <label class="form-check-label" for="perm_{{ $permission->id }}">
                            {{ $permission->name }} 
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endforeach
                    </div>

                    <div class="card-footer bg-light">
                        <form action="{{route('permissions.assign')}}" method="POST">
                            <button type="submit" class="btn btn-success px-4">
                                <i class="fas fa-save me-2"></i>Enregistrer
                            </button>
                        </form>
                        <a href="{{ route('permissions.index') }}" class="btn btn-secondary px-4">
                            <i class="fas fa-times me-2"></i>Annuler
                        </a>
                    </div>
                </form>
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-user-tag fa-4x text-muted mb-3"></i>
                <h4>Aucun rôle sélectionné</h4>
                <p class="text-muted">Cliquez sur un rôle pour gérer ses permissions</p>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>