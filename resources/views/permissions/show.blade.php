<!-- views/permissions/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">
        <i class="fas fa-list me-2"></i>Permissions du rôle: {{ $role->name }}
    </h2>
    
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Permissions attribuées</h5>
                </div>
                <div class="card-body">
                    @if($role->permissions->count() > 0)
                        <ul class="list-group">
                            @foreach($role->permissions as $permission)
                                <li class="list-group-item">
                                    <i class="fas fa-check text-success me-2"></i>
                                    {{ $permission->name }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="alert alert-info">
                            Aucune permission attribuée à ce rôle
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Actions</h5>
                </div>
                <div class="card-body">
                    <a href="{{ route('permissions.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>
                        Retour
                    </a>
                    
                    <a href="{{ route('permissions.index', ['role_id' => $role->id]) }}" 
                       class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>
                        Modifier les permissions
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection